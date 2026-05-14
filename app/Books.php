<?php
require_once 'Db.php';

class Books
{
    private static ?PDO $con;

    private string $title;
    private string $author;
    private string $genre;
    private int $published_year;
    private string $description;
    private ?int $user_id;
    private ?int $id;

    public function __construct(string $title,
                                string $author,
                                string $genre,
                                string $published_year,
                                string $description,
                                ?int $user_id = null,
                                ?int $id = null)
    {
        $this->title = $title;
        $this->author = $author;
        $this->genre = $genre;
        $this->published_year = $published_year;
        $this->description = $description;
        $this->user_id = $user_id;
        $this->id = $id;
    }

    public static function initConnection()
    {
        if (!isset(self::$con)) {
            self::$con = Db::getConnection();
        }
    }

    public static function getAllBooks(int $user_id): ?array
    {
        self::initConnection();
        $sql = 'select * from books where user_id = :user_id order by id desc';
        $stmt = Books::$con->prepare($sql);
        $stmt->execute([':user_id' => $user_id]);
        $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $books;
    }

    public function add()
    {
        self::initConnection();
        $sql = 'insert into books(user_id, title, author, genre, published_year, description) 
        values(:user_id, :title, :author, :genre, :published_year, :description)';
        $stmt = Books::$con->prepare($sql);
        return $stmt->execute([
            ':user_id' => $this->user_id,
            ':title' => $this->title,
            ':author' => $this->author,
            ':genre' => $this->genre,
            ':published_year' => $this->published_year,
            ':description' => $this->description,
        ]);
    }

    public function delete()
    {
        self::initConnection();
        $sql = 'delete from books where id = :id and user_id = :user_id';
        $stmt = Books::$con->prepare($sql);
        $stmt->execute([
            ':id' => $this->id,
            ':user_id' => $this->user_id,
        ]);
    }

    public static function getBookById(int $id, int $user_id): ?self
    {
        self::initConnection();
        $sql = 'select * from books where id = :id and user_id = :user_id';
        $stmt = Books::$con->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ':user_id' => $user_id,
        ]);
        $book = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$book) {
            return null;
        }

        return new Books($book['title'],
                        $book['author'],
                        $book['genre'],
                        $book['published_year'],
                        $book['description'],
                        $book['user_id'],
                        $book['id']);
    }

    public function update()
    {
        self::initConnection();
        $sql = 'update books set title=:title, author=:author, genre=:genre, 
        published_year=:published_year, description=:description where id = :id and user_id = :user_id';
        $stmt = Books::$con->prepare($sql);
        return $stmt->execute([
            ':title' => $this->title,
            ':author' => $this->author,
            ':genre' => $this->genre,
            ':published_year' => $this->published_year,
            ':description' => $this->description,
            ':id' => $this->id,
            ':user_id' => $this->user_id,
        ]);
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getGenre(): string
    {
        return $this->genre;
    }

    public function getPublishedYear(): int
    {
        return $this->published_year;
    }

    public function getDescription(): string
    {
        return $this->description;
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