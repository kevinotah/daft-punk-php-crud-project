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
        $mErr = 'Short Circuit! - wrong credentials';
    }
    if (isset($_GET['err']) && $_GET['err'] == 2) {
        $mErr = 'Instant Crush! - access denied';
    }
    if (isset($_GET['reg']) && $_GET['reg'] == 1) {
        $mErr = 'Veridis Quo! You can login now.';
    }
    if (isset($_GET['bye']) && $_GET['bye'] == 1) {
        $mErr = 'Human After All - you have been logged out.';
    }
    echo $mErr;
    ?>
    <form action="login_action.php" method="post">
        Login: <input type="text" name="username">
        <br>
        Password: <input type="password" name="password">
        <br>
        <input type="submit" value="Get Lucky">
        <input type="reset" value="Cancel">
    </form>
    <br>
    <a href="register.php">Register</a>
</body>
</html>
