<?php

require_once '../model/DAO.php';
require_once '../model/user.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_POST['register'])) {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    /**
     * TODO html form should validate that fields are not null and
     * some basic validation but we should check all fields for things like
     * - password uses good practices
     * - no sql statements hidden in fields
     * - phone number is valid phone number pattern
     */
    if($password !== $confirm_password) {
        $_SESSION['error_msg'] = "passwords do not match";
        header("Location: index.php");
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $dao = new DAO();

    // check if user exists
    try {
        $existing_user = $dao->get_user_by_username($username);
        if ($existing_user !== null) {
            $_SESSION['error_msg'] = "user already exists";
            header("Location: index.php");
            exit();
        }
    } catch (NoSuchUserException $e) {
        // we want this exception to be thrown so the
        // main execution should go here
        try {
            $new_user = $dao->create_user(
                new User(
                    $username,
                    $hashed_password,
                    $first_name,
                    $last_name,
                    $phone_number
                )
            );
            // newly created users should be considered logged
            // bring them back to main page or rooms page
            $_SESSION["logged_in"] = $username;
            header("Location: ../index.php");
        } catch (Exception $e) {
            $_SESSION['error_msg'] = "could not create user";
            header("Location: index.php");
            exit();
        }
    }
}
?>
