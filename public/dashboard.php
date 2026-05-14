<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.php?err=2');
}
require_once '../app/Tracks.php';
$tracks = Tracks::getAllTracks($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daft Punk Library</title>
</head>
<body>
    <?php include 'menu.php'; ?>
    <br>
    <h1>Daft Punk Library</h1>
    <?php if (isset($_GET['welcome']) && $_GET['welcome'] == 1): ?>
        <p><strong>Veridis Quo!</strong></p>
    <?php endif; ?>
    <p>Welcome back, <?= $_SESSION['username'] ?? '' ?></p>
    <table border="1">
        <tr>
            <td>#</td>
            <td>Title</td>
            <td>Artist</td>
            <td>Album</td>
            <td>Release year</td>
            <td>Notes</td>
            <td>Action</td>
        </tr>
        <?php
        $i = 1;
        foreach ($tracks as $track) {
            echo '<tr>';
            echo '<td>' . $i . '</td>';
            echo '<td>' . $track['title'] . '</td>';
            echo '<td>' . $track['artist'] . '</td>';
            echo '<td>' . $track['album'] . '</td>';
            echo '<td>' . $track['release_year'] . '</td>';
            echo '<td>' . $track['notes'] . '</td>';
            echo '<td>
            <a href="track_view.php?id=' . $track['id'] . '">[View]</a>
            <a href="edit_track.php?id=' . $track['id'] . '">[Edit]</a>
            <a href="delete_track.php?id=' . $track['id'] . '">[Delete]</a>
            </td>';
            echo '</tr>';
            $i++;
        }
        ?>
    </table>
</body>
</html>