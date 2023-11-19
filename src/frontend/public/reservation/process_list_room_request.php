<?php
require_once '../model/DAO.php';
require_once '../model/room.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $checkin_date = $_POST["checkin_date"];
    $checkout_date = $_POST["checkout_date"];
    $number_of_guests = $_POST["number_of_guests"];

    // make them sql TIMESTAMP compatible
    $checkin_date .= " 13:00:00";
    $checkout_date .= " 11:00:00";

    $_SESSION["checkin_date"] = $checkin_date;
    $_SESSION["checkout_date"] = $checkout_date;

    $dao = new DAO();

    try {
        $rooms = $dao->get_available_rooms_by_room_type($checkin_date, $checkout_date, $number_of_guests);
        $_SESSION['rooms'] = $rooms;
        header("Location: room_list_view.php"); // go to room picker
        exit();

    } catch (NoVacancyException $e) {

        $_SESSION['error_msg'] = $e->getMessage();
        header("Location: index.php"); // go back to room picker
        exit();
    }
}
?>
