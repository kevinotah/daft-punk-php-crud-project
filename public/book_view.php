<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.php?err=2');
}
require_once '../app/Books.php';

$id = $_GET['id'];
$book = Books::getBookById($id, $_SESSION['user_id']);

if (!$book) {
    header('location: dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View book</title>
</head>
<body>
    <?php include 'menu.php'; ?>
    <br>
    <h1><?= $book->getTitle(); ?></h1>
    <p>Author: <?= $book->getAuthor(); ?></p>
    <p>Genre: <?= $book->getGenre(); ?></p>
    <p>Published year: <?= $book->getPublishedYear(); ?></p>
    <p>Description: <?= $book->getDescription(); ?></p>
    <a href="edit_book.php?id=<?= $book->getId(); ?>">Edit</a>
    <a href="delete_book.php?id=<?= $book->getId(); ?>">Delete</a>
</body>
</html>