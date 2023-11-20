<?php
require_once '../components/navbar.php';
require_once '../components/error_modal.php';
require_once '../model/DAO.php';
require_once '../model/room.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $serialized_room = $_SESSION["room"];
    $room = unserialize($serialized_room);


    $room_id = $room->get_room_id();
    $checkin_date = $_SESSION["checkin_date"];
    $checkout_date = $_SESSION["checkout_date"];
    $username = $_SESSION["logged_in"];

    $room_type = $room->get_bed_type();
    $room_beds = $room->get_number_of_beds();
    $img_uri = "../assets/$room_beds-$room_type.png";

    // make reservation in database
    $dao = new DAO();
    $user = $dao->get_user_by_username($username);
    $user_id = $user->get_user_id();
    $result = $dao->create_reservation($user_id, $room_id, $checkin_date, $checkout_date);

    if(!$result) {
        $_SESSION['error_msg'] = "failed to create reservation";
    }
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
        <h3>Success <?php echo $username ?>, your reservation is confirmed!<h3>

        <img class="room-image" src="<?php echo $img_uri?>" alt="Room Image" width="85%" height="auto">
        <h6>Room number # <?php echo $room->room_id; ?></h6>
        <div class="room-detail">Bed Type: <?php echo $room->bed_type; ?></div>
        <div class="room-detail">Number of Beds: <?php echo $room->number_of_beds; ?></div>
        <div class="room-detail">Max Guests: <?php echo $room->max_guests; ?></div>
        <div class="room-detail">Price: <?php echo $room->price; ?></div>
        <div class="room-detail">Check in: <?php echo $checkin_date; ?></div>
        <div class="room-detail">Check out: <?php echo $checkout_date; ?></div>

    </div>
</div>
</body>
</html>