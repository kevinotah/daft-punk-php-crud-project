<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.php?err=2');
}
require_once '../app/Books.php';
$books = Books::getAllBooks($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <?php include 'menu.php'; ?>
    <br>
    <?php echo 'Hello ' . ($_SESSION['username'] ?? ''); ?><br><br>
    <table border="1">
        <tr>
            <td>ID</td>
            <td>Title</td>
            <td>Author</td>
            <td>Genre</td>
            <td>Year</td>
            <td>Description</td>
            <td>Action</td>
        </tr>
        <?php
        foreach ($books as $book) {
            echo '<tr>';
            echo '<td>' . $book['id'] . '</td>';
            echo '<td>' . $book['title'] . '</td>';
            echo '<td>' . $book['author'] . '</td>';
            echo '<td>' . $book['genre'] . '</td>';
            echo '<td>' . $book['published_year'] . '</td>';
            echo '<td>' . $book['description'] . '</td>';
            echo '<td>
            <a href="book_view.php?id=' . $book['id'] . '">[View]</a>
            <a href="edit_book.php?id=' . $book['id'] . '">[Edit]</a>
            <a href="delete_book.php?id=' . $book['id'] . '">[Delete]</a>
            </td>';
            echo '</tr>';
        }
        ?>
    </table>
</body>
</html>