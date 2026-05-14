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
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="page">
        <div class="card">
            <?php include 'menu.php'; ?>
            <h1><?= $book->getTitle(); ?></h1>
            <p><strong>Author:</strong> <?= $book->getAuthor(); ?></p>
            <p><strong>Genre:</strong> <?= $book->getGenre(); ?></p>
            <p><strong>Published year:</strong> <?= $book->getPublishedYear(); ?></p>
            <p><strong>Description:</strong> <?= $book->getDescription(); ?></p>
            <div class="actions">
                <a class="button" href="edit_book.php?id=<?= $book->getId(); ?>">Edit</a>
                <a class="button button-danger" href="delete_book.php?id=<?= $book->getId(); ?>">Delete</a>
            </div>
        </div>
    </div>
</body>
</html>