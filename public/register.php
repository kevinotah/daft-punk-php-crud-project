<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="page">
        <div class="card" style="max-width: 460px; margin: 0 auto;">
            <h1>Register</h1>
            <?php
            $mErr = '';
            if (isset($_GET['err']) && $_GET['err'] == 1) {
                $mErr = 'Username already exists';
            }
            if ($mErr !== '') {
                echo '<div class="notice">' . $mErr . '</div>';
            }
            ?>
            <form action="register_action.php" method="post">
                <div class="form-group">
                    <label for="username">Login</label>
                    <input type="text" id="username" name="username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password">
                </div>
                <div class="actions">
                    <input type="submit" value="Register">
                    <input type="reset" value="Cancel">
                </div>
            </form>
            <p><a href="login.php">Back to login</a></p>
        </div>
    </div>
</body>
</html>