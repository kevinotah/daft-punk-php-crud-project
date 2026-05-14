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
    <title>Edit book</title>
</head>
<body>
    <?php include 'menu.php'; ?>
    <br>
    <form action="edit_book_action.php" method="post">
        Title: <input type="text" name="title" value="<?= $book->getTitle(); ?>"><br>
        Author: <input type="text" name="author" value="<?= $book->getAuthor(); ?>"><br>
        Genre: <input type="text" name="genre" value="<?= $book->getGenre(); ?>"><br>
        Published year: <input type="number" name="published_year" value="<?= $book->getPublishedYear(); ?>"><br>
        Description: <textarea name="description"><?= $book->getDescription(); ?></textarea><br>
        <input type="hidden" name="id" value="<?= $book->getId(); ?>">
        <input type="submit" value="Update book">
    </form>
</body>
</html>