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
        <title>About Us - Moffat Bay Lodge</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
        <?php
            echo generate_navbar();
            echo generate_error_modal_container();
        ?>
        <div class="grid-container">
            <div class="header">
                <h1>About Moffat Bay Lodge</h1>
            </div>
            <div class="content">
                <h2>Welcome to Our Lodge</h2>
                <p>Welcome to Moffat Bay Lodge....</p>
                <p>Our lodge provides leisure activities and a selection of guided tours and adventures. </p>
                <p>
                <p>At Moffat Bay Lodge, we are committed to providing great experience. We hope that you will choose to join us
                    for unforgettable experience.</p>
                <!-- Image container for About Us page -->
                <div class="image-container">
                    <img src="../assets/Logo.png" alt="About Moffat Bay Lodge">
                </div>
                <section>
                    <h2>Our Facilities</h2>
                    <img src="pool.jpg" alt="Swimming pool at Moffat Bay Lodge">
                    <p>Moffat Bay Lodge ensue luxurious and comfortable stay. Some of our key features include:</p>
                    <ul>
                        <li>45 spacious and elegantly furnished guest rooms</li>
                        <li>An expansive, heated swimming pool with panoramic views</li>
                        <li>A stunning on-site restaurant serving fresh, locally sourced cuisine</li>
                        <li>An indoor bar and lounge area</li>
                        <li>A well-equipped fitness center</li>
                    </ul>
                </section>
            </div>
        </div>
        <h1>Top Rated Travel Five Stars Experience</h1>
        <div class="awards">
            <div class="award">&#9734;</div>
            <div class="award">&#9734;&#9734;</div>
            <div class="award">&#9734;&#9734;&#9734;</div>
            <div class="award">&#9734;&#9734;&#9734;&#9734;</div>
            <div class="award">&#9734;&#9734;&#9734;&#9734;&#9734;</div>
        </div>
        <?php
            echo generate_footer();
        ?>
    </body>
</html>
