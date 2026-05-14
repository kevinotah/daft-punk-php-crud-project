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
    <title>View track</title>
</head>
<body>
    <?php include 'menu.php'; ?>
    <br>
    <p>Feeling lucky? This track might be your anthem.</p>
    <h1><?= $track->getTitle(); ?></h1>
    <p>Artist: <?= $track->getArtist(); ?></p>
    <p>Album: <?= $track->getAlbum(); ?></p>
    <p>Release year: <?= $track->getReleaseYear(); ?></p>
    <p>Notes: <?= $track->getNotes(); ?></p>
    <a href="edit_track.php?id=<?= $track->getId(); ?>">Edit</a>
    <a href="delete_track.php?id=<?= $track->getId(); ?>">Delete</a>
</body>
</html>
