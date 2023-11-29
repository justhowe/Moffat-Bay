<?php
require_once '../model/room.php';
require_once '../components/navbar.php';
require_once '../components/error_modal.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

/**
 * when this page loads if the user is not logged in they should be
 * redirected to login and given a referral back here
 */

if (isset($_SESSION['room'])) {

    // if they arent logged in, send to login and maintain reference to this page
    if (!isset($_SESSION["logged_in"])) {
        $_SESSION["referrer"] = "../reservation/confirm_reservation.php";
        header("Location: ../login/index.php");
        exit();
    }

    $serialized_room = $_SESSION["room"];
    $room = unserialize($serialized_room);

    $room_id = $room->get_room_id();
    $room_type = $room->get_bed_type();
    $room_beds = $room->get_number_of_beds();

    $checkin_date = $_SESSION["checkin_date"];
    $checkout_date = $_SESSION["checkout_date"];
    $username = $_SESSION["logged_in"];

    $img_uri = "../assets/$room_beds-$room_type.png";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Reservation</title>
    <link rel="stylesheet" type="text/css" href="styles/room_list_view.css">
</head>
<body>
<?php
echo generate_navbar();
echo generate_error_modal_container();
?>
<div class="room-list">
        <div class="room-card-confirmed">

            <img class="room-image" src="<?php echo $img_uri?>" alt="Room Image" width="85%" height="auto">
            <h6>Room number # <?php echo $room->room_id; ?></h6>
            <div class="room-detail">Bed Type: <?php echo $room->bed_type; ?></div>
            <div class="room-detail">Number of Beds: <?php echo $room->number_of_beds; ?></div>
            <div class="room-detail">Max Guests: <?php echo $room->max_guests; ?></div>
            <div class="room-detail">Price: <?php echo $room->price; ?></div>
            <div class="room-detail">Check in: <?php echo $checkin_date; ?></div>
            <div class="room-detail">Check out: <?php echo $checkout_date; ?></div>

            <form method="post" action="confirmation.php">
                <?php $_SESSION['room'] = serialize($room) ?>
                <button type="submit" class="confirm-button">Confirm Reservation</button>
            </form>
        </div>
</div>
</body>
</html>

