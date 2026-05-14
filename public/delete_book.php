<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.php?err=2');
}
require_once '../app/Books.php';

$id = $_GET['id'];
$book = Books::getBookById($id, $_SESSION['user_id']);

if ($book) {
    $book->delete();
}
header('location: dashboard.php');