<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.php?err=2');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add book</title>
</head>
<body>
    <?php include 'menu.php'; ?>
    <br>
    <form action="add_book_action.php" method="post">
        Title: <input type="text" name="title"><br>
        Author: <input type="text" name="author"><br>
        Genre: <input type="text" name="genre"><br>
        Published year: <input type="number" name="published_year"><br>
        Description: <textarea name="description"></textarea><br>
        <input type="submit" value="Add book">
    </form>
</body>
</html>