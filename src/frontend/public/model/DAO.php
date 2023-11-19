<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once '../../config/config.php';
require_once '../model/user.php';
require_once '../model/room.php';
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

    public function get_available_rooms_by_room_type($checkin_time, $checkout_time, $number_of_guests) {
        $rooms = [];

        $stmt = $this->conn->prepare("CALL GetAvailableRoomsByGuests(?, ?, ?)");
        $stmt->bind_param("ssi", $checkin_time, $checkout_time, $number_of_guests);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rooms[] = new Room(
                    $row['room_id'],
                    $row['bed_type'],
                    $row['number_of_beds'],
                    $row['max_guests'],
                    $row['price']
                );
            }
        } else {
            throw new NoVacancyException(
                "no available rooms for $number_of_guests guests within $checkin_time to $checkout_time"
            );
        }
        return $rooms;
    }

    public function create_reservation($user_id, $room_id, $checkin_date, $checkout_date) {
        $sql = "INSERT INTO reservations (user_id, room_id, check_in_date, check_out_date) 
                VALUES ($user_id, $room_id, '$checkin_date', '$checkout_date')";

        try {
            $result = $this->conn->query($sql);
            if (!$result) {
                throw new Exception("query failed");
            }
        } catch (Exception $e) {
            $err_msg = $e->getMessage();
            throw new Exception($e);
        }

    }

    public function __destruct() {
        $this->conn->close();
    }
}



