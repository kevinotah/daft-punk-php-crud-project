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
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="page">
        <div class="card">
            <?php include 'menu.php'; ?>
            <h1>Edit book</h1>
            <form action="edit_book_action.php" method="post">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" value="<?= $book->getTitle(); ?>">
                </div>
                <div class="form-group">
                    <label>Author</label>
                    <input type="text" name="author" value="<?= $book->getAuthor(); ?>">
                </div>
                <div class="form-group">
                    <label>Genre</label>
                    <input type="text" name="genre" value="<?= $book->getGenre(); ?>">
                </div>
                <div class="form-group">
                    <label>Published year</label>
                    <input type="number" name="published_year" value="<?= $book->getPublishedYear(); ?>">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description"><?= $book->getDescription(); ?></textarea>
                </div>
                <input type="hidden" name="id" value="<?= $book->getId(); ?>">
                <div class="actions">
                    <input type="submit" value="Update book">
                </div>
            </form>
        </div>
    </div>
</body>
</html>