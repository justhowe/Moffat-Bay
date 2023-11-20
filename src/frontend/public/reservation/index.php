<?php
require_once '../components/navbar.php';
require_once '../components/error_modal.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
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

    </body>
</html>
