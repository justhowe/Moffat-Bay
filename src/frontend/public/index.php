<?php
require_once 'components/navbar.php';
require_once 'components/error_modal.php';
require_once 'components/footer.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="index.css">
        <meta charset="ISO-8859-1" name="viewport" >
        <title>Moffat Bay Lodge Landing Page</title>
    </head>
    <body>
        <?php
        echo generate_navbar();
        echo generate_error_modal_container();
        ?>
        <div class="grid-container">
            <div class="item1"><img src="assets/Logo.png" height="150px" width="150px"></div>
            <div class="item2"><h1 style="padding-bottom:25px"> Welcome to Moffat Bay's Website!</h1></div>
            <div class="item3">
            <img src="assets/room.jpg" height="150px" width="150px"><br>
            <img src="assets/seafood1.jpg" height="150px" width="150px"><br>
            <img src="assets/seafood2.jpg" height="150px" width="150px">
            </div>
            <div class="item4">
                <h3>
                    Thank you for visiting our website. Here you will find all the information you need to help finalize your decision to choose us as your lodging destination.
                </h3>
                <br>
                <p>
                    Moffat Bay is a wonderful getaway site that offers something to do for all types of visitors. Come hike along one of the many trails for a lovely stroll or go for a lovely dip in the cool waters of the bay.Not here for the outdoors? No problem! We also offer many fun indoor activities and events as well!
                </p>
                <br>
                <p>
                	When you are done with a day of exploring of a leisurely day of rest, please come and enjoy the fine seafood cuisine that our restaurant has to offer. With a menu full of delicious and inspired dishes, it doesn't get any better when the ingredients come straight from the bay to guarantee a freshness that can't be beat! As always, we look to cater to all visitors and our menu is not limited to seafood, we also offer non-seafood based fare that is just as enticing and fulfilling. One less thing to worry about for your dream getaway.
                </p>
                <br>
                <p>
                    The real highlight of Moffat Bay though is renting a ship to go out onto the beautiful waters. Follow the Attractions Link on from the dropdown menu to learn more about everything we have to offer!
                <div class="tenor-gif-embed" data-postid="13938231" data-share-method="host" data-aspect-ratio="1" data-height="50%" style="float: right;"><a href="https://tenor.com/view/costa-costa-crociere-costa-cruises-costa-cruceros-costa-croisieres-gif-13938231">Costa Costa Crociere Sticker</a>from <a href="https://tenor.com/search/costa-stickers">Costa Stickers</a></div> <script type="text/javascript" async src="https://tenor.com/embed.js"></script>
                </p>
            </div>
            <div class="item5"><img src="assets/lodge.jpg" height="100%" width="100%"></div>
        </div>
        <?php
            echo generate_footer();
        ?>
    </body>
</html>