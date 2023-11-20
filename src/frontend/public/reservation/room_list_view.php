<?php
require_once '../model/room.php';
require_once '../model/DAO.php';
require_once '../components/navbar.php';
require_once '../components/error_modal.php';

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
        $_SESSION['rooms'] = serialize($rooms);
        header("Location: room_list_view.php"); // go to room picker
        exit();

    } catch (NoVacancyException $e) {

        $_SESSION['error_msg'] = $e->getMessage();
        header("Location: index.php"); // go back to room picker
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room List</title>
    <link rel="stylesheet" type="text/css" href="styles/room_list_view.css">
</head>
<body>
<?php
echo generate_navbar();
echo generate_error_modal_container();
?>
<div class="room-list">
<?php
$serialized_rooms = $_SESSION["rooms"];
$rooms = unserialize($serialized_rooms);
?>

<?php foreach ($rooms as $room): ?>
    <div class="room-card">
        <?php
        $room_type = $room->bed_type;
        $room_beds = $room->number_of_beds;
        $img_uri = "../assets/$room_beds-$room_type.png"
        ?>

        <img class="room-image" src="<?php echo $img_uri?>" alt="Room Image" width="85%" height="auto">
        <h6>Room number # <?php echo $room->room_id; ?></h6>
        <div class="room-detail">Bed Type: <?php echo $room->bed_type; ?></div>
        <div class="room-detail">Number of Beds: <?php echo $room->number_of_beds; ?></div>
        <div class="room-detail">Max Guests: <?php echo $room->max_guests; ?></div>
        <div class="room-detail">Price: <?php echo $room->price; ?></div>

        <?php $_SESSION['room'] = serialize($room) ?>
        <form method="post" action="confirm_reservation.php">
            <input type="hidden" name="room_id" value="<?php echo $room->room_id; ?>">
            <button type="submit" class="confirm-button">Stay in this Room</button>
        </form>
    </div>
<?php endforeach; ?>
</div>
</body>
</html>



