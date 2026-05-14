<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.php?err=2');
}
require_once '../app/Tracks.php';

$id = $_GET['id'];
$track = Tracks::getTrackById($id, $_SESSION['user_id']);

if ($track) {
    $track->delete();
}
header('location: dashboard.php');
