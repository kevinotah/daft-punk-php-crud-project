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
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="page">
        <div class="card">
            <?php include 'menu.php'; ?>
            <h1>Add book</h1>
            <form action="add_book_action.php" method="post">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title">
                </div>
                <div class="form-group">
                    <label>Author</label>
                    <input type="text" name="author">
                </div>
                <div class="form-group">
                    <label>Genre</label>
                    <input type="text" name="genre">
                </div>
                <div class="form-group">
                    <label>Published year</label>
                    <input type="number" name="published_year">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description"></textarea>
                </div>
                <div class="actions">
                    <input type="submit" value="Add book">
                </div>
            </form>
        </div>
    </div>
</body>
</html>