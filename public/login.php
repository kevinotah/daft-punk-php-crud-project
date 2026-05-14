<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php
    $mErr = '';
    if (isset($_GET['err']) && $_GET['err'] == 1) {
        $mErr = 'Wrong username or password';
    }
    if (isset($_GET['err']) && $_GET['err'] == 2) {
        $mErr = 'You are not allowed';
    }
    if (isset($_GET['reg']) && $_GET['reg'] == 1) {
        $mErr = 'Registration successful. You can login now.';
    }
    echo $mErr;
    ?>
    <form action="login_action.php" method="post">
        Login: <input type="text" name="username">
        <br>
        Password: <input type="password" name="password">
        <br>
        <input type="submit" value="Validate">
        <input type="reset" value="Cancel">
    </form>
    <br>
    <a href="register.php">Register</a>
</body>
</html>
