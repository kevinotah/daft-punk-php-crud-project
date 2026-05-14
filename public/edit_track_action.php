<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.php?err=2');
}
require_once '../app/Tracks.php';

$track = new Tracks($_POST['title'],
                    $_POST['artist'],
                    $_POST['album'],
                    $_POST['release_year'],
                    $_POST['notes'],
                    $_SESSION['user_id'],
                    $_POST['id']);
$track->update();
header('location: dashboard.php');
