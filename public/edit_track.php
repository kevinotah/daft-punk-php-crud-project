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
    <title>Edit Track - Daft Punk Library</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'menu.php'; ?>
    <div class="container">
        <h1>Edit Track</h1>
        <div class="info">
            <p>Harder, better, faster, stronger — tweak your track carefully.</p>
        </div>
        <form action="edit_track_action.php" method="post">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="<?= htmlspecialchars($track->getTitle()); ?>" required>
            
            <label for="artist">Artist</label>
            <input type="text" id="artist" name="artist" value="<?= htmlspecialchars($track->getArtist()); ?>" required>
            
            <label for="album">Album</label>
            <input type="text" id="album" name="album" value="<?= htmlspecialchars($track->getAlbum()); ?>" required>
            
            <label for="release_year">Release Year</label>
            <input type="number" id="release_year" name="release_year" value="<?= $track->getReleaseYear(); ?>" required>
            
            <label for="notes">Notes</label>
            <textarea id="notes" name="notes"><?= htmlspecialchars($track->getNotes()); ?></textarea>
            
            <input type="hidden" name="id" value="<?= $track->getId(); ?>">
            
            <button type="submit">Update Track</button>
            <a href="dashboard.php" class="btn">Cancel</a>
        </form>
    </div>
</body>
</html>
