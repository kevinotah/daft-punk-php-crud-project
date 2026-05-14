<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <?php
    $mErr = '';
    if (isset($_GET['err']) && $_GET['err'] == 1) {
        $mErr = 'Username already exists';
    }
    echo $mErr;
    ?>
    <form action="register_action.php" method="post">
        Login: <input type="text" name="username">
        <br>
        Password: <input type="password" name="password">
        <br>
        <input type="submit" value="Register">
        <input type="reset" value="Cancel">
    </form>
    <br>
    <a href="login.php">Back to login</a>
</body>
</html>