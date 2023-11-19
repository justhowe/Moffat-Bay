<?php
require_once '../components/navbar.php';
require_once '../components/error_modal.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Moffat Bay Lodge</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <?php
        echo generate_navbar();
        echo generate_error_modal_container();
        ?>
        <div class="login-container">
            <h1>Login Moffat Bay Lodge</h1>
            <form method="post" action="login.php">
                <label for="username">Email</label>
                <input type="email" id="username" name="username" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">Login</button>
            </form>
            <p>
                <a href="#">Forgot Password?</a>
                <br>
                <a href="#">New user? Register now</a>
            </p>
        </div>
    </body>
</html>
