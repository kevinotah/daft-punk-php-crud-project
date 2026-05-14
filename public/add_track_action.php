<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.php?err=2');
}
require_once '../app/Tracks.php';

$releaseYear = filter_input(INPUT_POST, 'release_year', FILTER_VALIDATE_INT);
$minYear = 1900;
$maxYear = (int)date('Y') + 1;

if ($releaseYear === false || $releaseYear < $minYear || $releaseYear > $maxYear) {
    header('location: add_track.php?err=year');
    exit;
}

$track = new Tracks($_POST['title'],
                    $_POST['artist'],
                    $_POST['album'],
                    (string)$releaseYear,
                    $_POST['notes'],
                    $_SESSION['user_id']);
$track->add();
header('location: dashboard.php');
exit;
