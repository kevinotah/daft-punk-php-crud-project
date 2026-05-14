<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Daft Punk Library</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Register</h1>
        <?php
        $mErr = '';
        if (isset($_GET['err']) && $_GET['err'] == 1) {
            $mErr = 'Robot Rock - username already exists';
        }
        if ($mErr): ?>
            <div class="message"><?= $mErr; ?></div>
        <?php endif; ?>
        <form action="register_action.php" method="post">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">One More Time</button>
            <button type="reset">Cancel</button>
        </form>
        <p style="text-align: center; margin-top: 20px;">
            Already have an account? <a href="login.php">Login here</a>
        </p>
    </div>
</body>
</html>