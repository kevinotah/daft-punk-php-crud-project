<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.php?err=2');
}
require_once '../app/Tracks.php';

$releaseYear = filter_input(INPUT_POST, 'release_year', FILTER_VALIDATE_INT);
$minYear = 1900;
$maxYear = (int)date('Y') + 1;
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

if ($releaseYear === false || $releaseYear < $minYear || $releaseYear > $maxYear) {
    header('location: edit_track.php?id=' . urlencode((string)$_POST['id']) . '&err=year');
    exit;
}

if ($id === false || $id === null) {
    header('location: dashboard.php');
    exit;
}

$track = new Tracks($_POST['title'],
                    $_POST['artist'],
                    $_POST['album'],
                    (string)$releaseYear,
                    $_POST['notes'],
                    $_SESSION['user_id'],
                    $id);
$track->update();
header('location: dashboard.php');
exit;
