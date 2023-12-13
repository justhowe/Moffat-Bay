<?php
require_once '../components/navbar.php';
require_once '../components/error_modal.php';
require_once '../model/DAO.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function generate_reservations_view(): string {
    $html_template = "";
    $username = null;
    $reservation = null;

    if(isset($_SESSION["logged_in"])) {
        $username = $_SESSION["logged_in"];
        $dao = new DAO();
        try {
            $reservation = $dao->get_active_reservations_for_user($username);
        } catch (NoSuchReservationForUser $e) {
            // no-op
        }
    }

    if($username != null && $reservation != null) {
        $room_id = $reservation->getRoom()->get_room_id();
        $room_type = $reservation->getRoom()->get_bed_type();
        $room_beds = $reservation->getRoom()->get_number_of_beds();
        $max_guests = $reservation->getRoom()->get_number_of_beds();
        $price = $reservation->getRoom()->get_price();

        $checkin_date = $reservation->getCheckinDate();
        $checkout_date = $reservation->getCheckoutDate();

        $img_uri = "../assets/$room_beds-$room_type.png";

        $name = $reservation->getUser()->get_first_name();
        $mesg = "Greetings $name, your upcoming reservation is confirmed";

        $html_template = <<<HTML
        <div class="room-list"> 
        <div class="room-card-confirmed">
            <span>$mesg</span>
            <img class="room-image" src="$img_uri" alt="Room Image" width="85%" height="auto">
            <h6>Room number # $room_id </h6>
            <div class="room-detail">Bed Type: $room_type </div>
            <div class="room-detail">Number of Beds: $room_beds </div>
            <div class="room-detail">Max Guests: $max_guests </div>
            <div class="room-detail">Price: $price </div>
            <div class="room-detail">Check in: $checkin_date </div>
            <div class="room-detail">Check out: $checkout_date </div>
        </div>
        </div>

HTML;
    } else {
        //TODO add a card for rooms available or something
        $html_template = <<<HTML
    
HTML;
    }
    return $html_template;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Reservations</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
    <body>
    <?php
        echo generate_navbar();
        echo generate_error_modal_container();
    ?>
    <div class="res-content-container">
        <div class="res-preview">
            <?php echo generate_reservations_view()?>
            <!-- put pretty much nothing in here, put all style in component-->
        </div>
        <div class="res-date-picker">
            <h4>Make a New Reservation</h4>
            <form method="post" action="room_list_view.php">

                <label for="checkin_date">Choose a check in date:</label>
                <input type="date" id="checkin_date" name="checkin_date">

                <label for="checkout_date">Choose a check out date:</label>
                <input type="date" id="checkout_date" name="checkout_date">

                <label for="number_of_guests">Select number of Guests:</label>
                <select id="number_of_guests" name="number_of_guests">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>

                <button type="submit">Find Available Rooms</button>
            </form>
        </div>
    </div>



    </body>
</html>
