<?php
require_once '../components/navbar.php';
require_once '../components/error_modal.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Moffat Bay Lodge User Registration</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
        <?php
        echo generate_navbar();
        echo generate_error_modal_container();
        ?>
        <div class="header">
            <h2>Moffat Bay Lodge User Registration</h2>
        </div>

        <form method="post" action="register.php">
            <div class="input-group">
                <label>First name</label>
                <input type="text" name="first_name" required>
            </div>
            <div class="input-group">
                <label>Last name</label>
                <input type="text" name="last_name" required>
            </div>
            <div class="input-group">
                <label>Email / Username</label>
                <input type="email" name="username" required>
            </div>
            <div class="input-group">
                <label>Phone number</label>
                <input type="number" name="phone_number" required>
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <div class="input-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" required>
            </div>
            <div class="input-group">
                <button type="submit" name="register" class="btn">Register</button>
            </div>
            <p>
                Already a member? <a href="../login/">Sign in</a>
            </p>
        </form>
    </body>
</html>
