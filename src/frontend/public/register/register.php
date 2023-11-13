<?php
session_start();
include '../../config/config.php';

# TODO  error handling this is insecure
$conn = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

if(isset($_POST['register'])){

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if($password === $confirm_password){
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            echo "Username already exists";
        }else{
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (username, password_hash, first_name, last_name, phone_number) VALUES ('$username', '$hashed_password', '$first_name', '$last_name', '$phone_number')";

            mysqli_query($conn, $sql);

            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;

            //header("location: welcome.php");
            echo "<script type='text/javascript'>alert(`Registered new user ${username} succesfully`);</script>";
        }
    }else{
        echo "Passwords do not match";
    }
}
?>
