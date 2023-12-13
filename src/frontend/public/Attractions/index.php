<?php
require_once '../components/navbar.php';
require_once '../components/error_modal.php';
require_once '../components/footer.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moffat Bay Lodge Attractions</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        echo generate_navbar();
        echo generate_error_modal_container();
    ?>
    <header>
        <h1>Welcome to Moffat Bay Lodge Attractions</h1>

     </header>   
   
    <section id="hiking">
        <h2>Hiking</h2>
        <img src="path_to_hiking_image.jpg" alt="Hiking">
        <p>Enjoy stunning views of the islands while hiking along our beautiful trails. Suitable for all ages and fitness levels...</p>
        <button onclick="book('hiking')">Book Hiking</button>
    </section>

    <section id="kayaking">
        <h2>Kayaking</h2>
        <img src="path_to_kayaking_image.jpg" alt="Kayaking">
        <p>Discover the beautiful islands and marine life up close with our guided kayaking tours. Our experienced guides will ensure a safe and enjoyable experience...</p>
        <button onclick="book('kayaking')">Book Kayaking</button>
    </section>

    <section id="whale-watching">
        <h2>Whale Watching</h2>
        <img src="path_to_whale_watching_image.jpg" alt="Whale Watching">
        <p>Whale watching is a joyful experience during your stay with us. Join our expert guides for an unforgettable experience of watching humpback whales, dolphins, and more...</p>
        <button onclick="book('whale-watching')">Book Whale Watching</button>
    </section>

    <section id="scuba-diving">
        <h2>Scuba Diving</h2>
        <img src="path_to_scuba_diving_image.jpg" alt="Scuba Diving">
        <p>Explore the underwater world and experience the stunning marine life in our coastal waters. Our experienced scuba instructors will ensure a safe and enjoyable dive...</p>
        <button onclick="book('scuba-diving')">Book Scuba Diving</button>
    </section>
    <?php
            echo generate_footer();
    ?>
    <script src="script.js"></script>
    </body>
</html>   
