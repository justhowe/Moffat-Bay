<?php
require_once '../components/navbar.php';
require_once '../components/error_modal.php';
require_once 'generate_calendar.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Reservation</title>
    <link rel="stylesheet" href="styles.css">
</head>
    <body>
        <?php
        echo generate_navbar();
        echo generate_error_modal_container();
        ?>

        <h2>Select Check-in and Check-out Dates</h2>

        <form action="reservation.php" method="post">
            <!-- Calendar for Check-in Date -->
            <label for="checkInDate">Check-in Date:</label>
            <?php generate_calendar('checkInDate'); ?>

            <!-- Calendar for Check-out Date -->
            <label for="checkOutDate">Check-out Date:</label>
            <?php generate_calendar('checkOutDate'); ?>

            <button type="submit" name="submit">Submit Reservation</button>
        </form>

        <?php
        // Handle form submission
        if (isset($_POST['submit'])) {
            $checkInDate = $_POST['checkInDate'];
            $checkOutDate = $_POST['checkOutDate'];

            // Add your logic to handle the reservation data
            // For example, store the reservation details in a database
            echo "<p>Reservation Successful! Check-in: $checkInDate, Check-out: $checkOutDate</p>";
        }
        ?>
    </body>
</html>
