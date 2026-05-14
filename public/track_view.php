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
    <title>View Track - Daft Punk Library</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'menu.php'; ?>
    <div class="container">
        <h1><?= htmlspecialchars($track->getTitle()); ?></h1>
        <div class="info">
            <p>Feeling lucky? This track might be your anthem.</p>
        </div>
        <div class="track-details">
            <p><strong>Artist:</strong> <?= htmlspecialchars($track->getArtist()); ?></p>
            <p><strong>Album:</strong> <?= htmlspecialchars($track->getAlbum()); ?></p>
            <p><strong>Release Year:</strong> <?= $track->getReleaseYear(); ?></p>
            <p><strong>Notes:</strong> <?= htmlspecialchars($track->getNotes()); ?></p>
        </div>
        <div style="margin-top: 20px;">
            <a href="edit_track.php?id=<?= $track->getId(); ?>" class="btn">Edit</a>
            <a href="delete_track.php?id=<?= $track->getId(); ?>" class="btn" style="border-color: #ff006e; color: #ff006e; text-shadow: 0 0 5px #ff006e;">Delete</a>
            <a href="dashboard.php" class="btn">Back</a>
        </div>
    </div>
    <?php include 'partials/footer.php'; ?>
</body>
</html>
