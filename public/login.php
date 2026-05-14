<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Daft Punk Library</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    session_start();
    $mErr = '';
    if (isset($_GET['err']) && $_GET['err'] == 1) {
        // Alternate between two Daft Punk error messages
        if (!isset($_SESSION['error_toggle'])) {
            $_SESSION['error_toggle'] = 0;
        }
        if ($_SESSION['error_toggle'] == 0) {
            $mErr = 'Short Circuit! - wrong credentials';
        } else {
            $mErr = 'Instant Crush! - access denied';
        }
        $_SESSION['error_toggle'] = 1 - $_SESSION['error_toggle'];
    }
    if (isset($_GET['reg']) && $_GET['reg'] == 1) {
        $mErr = 'Veridis Quo! You can login now.';
    }
    if (isset($_GET['bye']) && $_GET['bye'] == 1) {
        $mErr = 'Human After All - you have been logged out.';
    }
    ?>
    <div class="container">
        <h1>Daft Punk Library</h1>
        <?php if ($mErr): ?>
            <div class="message <?= (strpos($mErr, '!') === false ? '' : (strpos($mErr, 'Veridis') !== false ? 'success' : '')) ?>">
                <?= $mErr; ?>
            </div>
        <?php endif; ?>
        <div class="info">
            <p><strong>Demo admin credentials</strong></p>
            <p>Username: <strong>admin</strong> &nbsp;&nbsp; Password: <strong>password</strong></p>
            <p style="font-size:12px;color:#ccc;">Use these to log in as the demo user and view seeded tracks.</p>
        </div>
        <form action="login_action.php" method="post">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Get Lucky</button>
            <button type="reset">Cancel</button>
        </form>
        <p style="text-align: center; margin-top: 20px;">
            Don't have an account? <a href="register.php">Register here</a>
        </p>
    </div>
</body>
</html>
