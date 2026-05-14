<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.php?err=2');
}
require_once '../app/Books.php';

$book = new Books($_POST['title'],
                  $_POST['author'],
                  $_POST['genre'],
                  $_POST['published_year'],
                  $_POST['description'],
                  $_SESSION['user_id']);
$book->add();
header('location: dashboard.php');