<?php

require_once '../model/DAO.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $dao = new DAO();

    try {
        // use this error message, telling the user that is attempting
        // to login that the username is correct but not the password
        // without any sort of throttle is probably welcoming to brute force
        $ambiguous_err_msg = "Login Credentials not valid";

        $existing_user = $dao->get_user_by_username($username);
        if ($existing_user && password_verify($password, $existing_user->get_password_hash())) {

            // we should use this superglobal $_SESSION["logged_in"]
            // throughout the app to check if the user is logged in or not
            $_SESSION["logged_in"] = $username;
            if (isset($_SESSION["referrer"])) {
                $referrer = $_SESSION["referrer"];
                header("Location: $referrer");
            } else {
                header("Location: ../index.php");
            }
        } else {
            // this superglobal we can use to check if any expected
            // errors arise from our logic
            $_SESSION['error_msg'] = $ambiguous_err_msg;
            header("Location: index.php");
        }
    } catch (NoSuchUserException $e) {
        $_SESSION['error_msg'] = $ambiguous_err_msg;
        header("Location: index.php");
        // any other exception will bubble up to web page
    } finally {
        exit();
    }
}

