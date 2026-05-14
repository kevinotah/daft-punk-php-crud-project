<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="page">
        <div class="card" style="max-width: 460px; margin: 0 auto;">
            <h1>Login</h1>
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
            if ($mErr !== '') {
                echo '<div class="notice">' . $mErr . '</div>';
            }
            ?>
            <form action="login_action.php" method="post">
                <div class="form-group">
                    <label for="username">Login</label>
                    <input type="text" id="username" name="username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password">
                </div>
                <div class="actions">
                    <input type="submit" value="Validate">
                    <input type="reset" value="Cancel">
                </div>
            </form>
            <p><a href="register.php">Register</a></p>
        </div>
    </div>
</body>
</html>
