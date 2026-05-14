<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.php?err=2');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Track - Daft Punk Library</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'menu.php'; ?>
    <div class="container">
        <h1>Add Track</h1>
        <div class="info">
            <p>One more time? Add a track and let the robots dance.</p>
        </div>
        <form action="add_track_action.php" method="post">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" required>
            
            <label for="artist">Artist</label>
            <input type="text" id="artist" name="artist" required>
            
            <label for="album">Album</label>
            <input type="text" id="album" name="album" required>
            
            <label for="release_year">Release Year</label>
            <input type="number" id="release_year" name="release_year" required>
            
            <label for="notes">Notes</label>
            <textarea id="notes" name="notes"></textarea>
            
            <button type="submit">Add Track</button>
            <a href="dashboard.php" class="btn">Cancel</a>
        </form>
    </div>
</body>
</html>
