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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'menu.php'; ?>
    <div class="container">
        <h1>Daft Punk Library</h1>
        <?php if (isset($_GET['welcome']) && $_GET['welcome'] == 1): ?>
            <div class="message success">Veridis Quo!</div>
        <?php endif; ?>
        <div class="info">
            <p class="welcome">Welcome back, <?= htmlspecialchars($_SESSION['username'] ?? ''); ?></p>
        </div>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Artist</th>
                    <th>Album</th>
                    <th>Release Year</th>
                    <th>Notes</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $rowNumber = 1;
                foreach ($tracks as $track) {
                    echo '<tr>';
                    echo '<td>' . $rowNumber . '</td>';
                    echo '<td>' . (int)$track['id'] . '</td>';
                    $rowNumber++;
                    echo '<td>' . htmlspecialchars($track['title']) . '</td>';
                    echo '<td>' . htmlspecialchars($track['artist']) . '</td>';
                    echo '<td>' . htmlspecialchars($track['album']) . '</td>';
                    echo '<td>' . $track['release_year'] . '</td>';
                    echo '<td>' . htmlspecialchars($track['notes']) . '</td>';
                    echo '<td>
                    <a href="track_view.php?id=' . $track['id'] . '">[View]</a>
                    <a href="edit_track.php?id=' . $track['id'] . '">[Edit]</a>
                    <a href="delete_track.php?id=' . $track['id'] . '" onclick="return confirm(\'Delete this track?\');">[Delete]</a>
                    </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php include 'partials/footer.php'; ?>
</body>
</html>