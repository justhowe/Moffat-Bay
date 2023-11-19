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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selected_room = $_SESSION["room"];
    if (!isset($_SESSION["logged_in"])) {
        $_SESSION["referer"] = "Location ../reservation/confirm_reservation.php";
        header("Location: ../login/index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Reservation</title>
    <link rel="stylesheet" type="text/css" href="room_list_view.css">
</head>
<body>
<?php
echo generate_navbar();
echo generate_error_modal_container();
?>
<div class="room-list">
        <div class="room-card">
            <?php
            $room = $_SESSION["room"];
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
            <div class="room-detail">Check in: <?php echo $_SESSION["checkin_date"]; ?></div>
            <div class="room-detail">Check out: <?php echo $_SESSION["checkout_date"]; ?></div>

            <!-- Form button with "Confirm Reservation" action -->
            <form method="post" action="confirmation.php">
                <?php $_SESSION['room'] = $room ?>
                <input type="hidden" name="room_id" value="<?php echo $room->room_id; ?>">
                <button type="submit" class="confirm-button">Confirm Reservation</button>
            </form>
        </div>
</div>
</body>
</html>

