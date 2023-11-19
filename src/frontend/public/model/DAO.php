<?php
require_once '../../config/config.php';
require_once '../model/user.php';
require_once '../exception/exceptions.php';
/**
 * this is the data access object that i think should hold most of our
 * data layer access logic instead of on the presentation components
 */
class DAO {
    private $host = MYSQL_HOST;
    private $username = MYSQL_USER;
    private $password = MYSQL_PASSWORD;
    private $database = MYSQL_DATABASE;
    private $conn;

    public function __construct() {

        $this->conn = mysqli_connect(
            $this->host,
            $this->username,
            $this->password,
            $this->database
        );

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function get_user_by_username(string $username): User {
        $sql = "SELECT * FROM users u WHERE u.username = '$username';";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return new User(
                $row['username'],
                $row['password_hash'],
                $row['first_name'],
                $row['last_name'],
                $row['phone_number'],
                $row['user_id']);
        } else {
            throw new NoSuchUserException("user by username $username does not exist");
        }
    }

    public function create_user(User $user): User {
        $username = $this->conn->real_escape_string($user->get_username());
        $password_hash = $this->conn->real_escape_string($user->get_password_hash());
        $first_name = $this->conn->real_escape_string($user->get_first_name());
        $last_name = $this->conn->real_escape_string($user->get_last_name());
        $phone_number = $this->conn->real_escape_string($user->get_phone_number());

        $sql = "INSERT INTO users (username, password_hash, first_name, last_name, phone_number) 
            VALUES ('$username', '$password_hash', '$first_name', '$last_name', '$phone_number')";

        try {
            $result = $this->conn->query($sql);
            if ($result) {
                return $this->get_user_by_username($username);
            } else {
                throw new Exception("query failed");
            }
        } catch (Exception $e) {
            $err_msg = $e->getMessage();
            throw new Exception("could not insert user $username, $err_msg");
        }
    }

    public function __destruct() {
        $this->conn->close();
    }
}



