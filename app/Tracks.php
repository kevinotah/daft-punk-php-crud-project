<?php
/*
 Tracks model — manages Daft Punk track CRUD operations
*/
require_once 'Db.php';

class Tracks
{
    private static ?PDO $con;

    private string $title;
    private string $artist;
    private string $album;
    private int $release_year;
    private string $notes;
    private ?int $user_id;
    private ?int $id;

    public function __construct(string $title,
                                string $artist,
                                string $album,
                                string $release_year,
                                string $notes,
                                ?int $user_id = null,
                                ?int $id = null)
    {
        $this->title = $title;
        $this->artist = $artist;
        $this->album = $album;
        $this->release_year = $release_year;
        $this->notes = $notes;
        $this->user_id = $user_id;
        $this->id = $id;
    }

    public static function initConnection()
    {
        if (!isset(self::$con)) {
            self::$con = Db::getConnection();
        }
    }

    public static function getAllTracks(int $user_id): ?array
    {
        self::initConnection();
        $sql = 'select * from tracks where user_id = :user_id order by id desc';
        $stmt = Tracks::$con->prepare($sql);
        $stmt->execute([':user_id' => $user_id]);
        $tracks = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $tracks;
    }

    public function add()
    {
        self::initConnection();
        $sql = 'insert into tracks(user_id, title, artist, album, release_year, notes) 
        values(:user_id, :title, :artist, :album, :release_year, :notes)';
        $stmt = Tracks::$con->prepare($sql);
        return $stmt->execute([
            ':user_id' => $this->user_id,
            ':title' => $this->title,
            ':artist' => $this->artist,
            ':album' => $this->album,
            ':release_year' => $this->release_year,
            ':notes' => $this->notes,
        ]);
    }

    public function delete()
    {
        self::initConnection();
        $sql = 'delete from tracks where id = :id and user_id = :user_id';
        $stmt = Tracks::$con->prepare($sql);
        $stmt->execute([
            ':id' => $this->id,
            ':user_id' => $this->user_id,
        ]);
    }

    public static function getTrackById(int $id, int $user_id): ?self
    {
        self::initConnection();
        $sql = 'select * from tracks where id = :id and user_id = :user_id';
        $stmt = Tracks::$con->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ':user_id' => $user_id,
        ]);
        $track = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$track) {
            return null;
        }

        return new Tracks($track['title'],
                        $track['artist'],
                        $track['album'],
                        $track['release_year'],
                        $track['notes'],
                        $track['user_id'],
                        $track['id']);
    }

    public function update()
    {
        self::initConnection();
        $sql = 'update tracks set title=:title, artist=:artist, album=:album, 
        release_year=:release_year, notes=:notes where id = :id and user_id = :user_id';
        $stmt = Tracks::$con->prepare($sql);
        return $stmt->execute([
            ':title' => $this->title,
            ':artist' => $this->artist,
            ':album' => $this->album,
            ':release_year' => $this->release_year,
            ':notes' => $this->notes,
            ':id' => $this->id,
            ':user_id' => $this->user_id,
        ]);
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getArtist(): string
    {
        return $this->artist;
    }

    public function getAlbum(): string
    {
        return $this->album;
    }

    public function getReleaseYear(): int
    {
        return $this->release_year;
    }

    public function getNotes(): string
    {
        return $this->notes;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}
