<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.php?err=2');
}
require_once '../app/Tracks.php';

$id = $_GET['id'];
$track = Tracks::getTrackById($id, $_SESSION['user_id']);

if (!$track) {
    header('location: dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit track</title>
</head>
<body>
    <?php include 'menu.php'; ?>
    <br>
    <p>Harder, better, faster, stronger — tweak your track carefully.</p>
    <form action="edit_track_action.php" method="post">
        Title: <input type="text" name="title" value="<?= $track->getTitle(); ?>"><br>
        Artist: <input type="text" name="artist" value="<?= $track->getArtist(); ?>"><br>
        Album: <input type="text" name="album" value="<?= $track->getAlbum(); ?>"><br>
        Release year: <input type="number" name="release_year" value="<?= $track->getReleaseYear(); ?>"><br>
        Notes: <textarea name="notes"><?= $track->getNotes(); ?></textarea><br>
        <input type="hidden" name="id" value="<?= $track->getId(); ?>">
        <input type="submit" value="Update track">
    </form>
</body>
</html>
