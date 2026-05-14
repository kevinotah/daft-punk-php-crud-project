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
    <title>Add track</title>
</head>
<body>
    <?php include 'menu.php'; ?>
    <br>
    <p>One more time? Add a track and let the robots dance.</p>
    <form action="add_track_action.php" method="post">
        Title: <input type="text" name="title"><br>
        Artist: <input type="text" name="artist"><br>
        Album: <input type="text" name="album"><br>
        Release year: <input type="number" name="release_year"><br>
        Notes: <textarea name="notes"></textarea><br>
        <input type="submit" value="Add track">
    </form>
</body>
</html>
