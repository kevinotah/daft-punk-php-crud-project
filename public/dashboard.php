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
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="page">
        <div class="card">
            <?php include 'menu.php'; ?>
            <h1>Dashboard</h1>
            <p class="notice">Hello <?= $_SESSION['username'] ?? '' ?></p>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>Year</th>
                    <th>Description</th>
                    <th>Action</th>
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
                        echo '<td class="small-links">';
                    echo '<a href="book_view.php?id=' . $book['id'] . '">View</a>';
                    echo '<a href="edit_book.php?id=' . $book['id'] . '">Edit</a>';
                    echo '<a href="delete_book.php?id=' . $book['id'] . '">Delete</a>';
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>