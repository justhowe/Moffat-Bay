<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function generate_navbar(): string {

    if(isset($_SESSION["logged_in"])) {
        $username = $_SESSION["logged_in"];
        $avatar = '';
    } else {
        $username = "Guest";
        $avatar = '';
    }

    // heredocs
    $html_template = <<<HTML
<div>
    <style>

        #navbar {
            background-color: #333;
            overflow: hidden;
        }

        #navbar a {
            float: left;
            display: block;
            background-color: #333;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        #navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .dropdown {
            float: left;
            overflow: hidden;
        }

        .dropdown .dropbtn {
            font-size: 16px;
            border: none;
            outline: none;
            color: white;
            padding: 14px 16px;
            background-color: inherit;
            margin: 0;
        }

        #navbar a, #navbar-content a {
            float: none;
            display: block;
            text-align: left;
        }

        #navbar-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        #navbar-content a {
            color: #f2f2f2;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        #navbar-content a:hover {
            background-color: #ddd;
        }

        .dropdown:hover #navbar-content {
            display: block;
        }

        .avatar {
            float: right;
            margin-right: 20px;
        }

        .avatar img {
            border-radius: 50%;
            width: 40px;
            height: 40px;
        }

        .sticky {
            position: fixed;
            top: 0;
            width: 100%;
        }

        .sticky-dropdown {
            position: fixed !important;
        }
    </style>
    <div id="navbar">
        <div class="dropdown">
            <button class="dropbtn">&#9660; Explore</button>
            <div id="navbar-content">
                <a href="../login/">Login</a>
                <a href="../register/">Register</a>
                <a href="../reservation/">Reservations</a>
                <a href="../about/#">About Moffat Bay</a>
                <a href="../Attractions/">Attractions</a>
                <a href="../contact/">Contact Us</a>
                <a href="../index.php">Home</a>
            </div>
        </div>
        <div class="avatar">
        <span>$username</span>
<!--            <img src="' .  . '" alt="Avatar">-->
        </div>
    </div>
    <script>
        // Sticky navbar from w3schools
        // https://www.w3schools.com/howto/howto_js_navbar_sticky.asp
        // When user scrolls, execute
        window.onscroll = function() {makeSticky()};

        // Get navbar
        var navbar = document.getElementById("navbar");
        var bottom = navbar.offsetHeight + "px";
        console.log(bottom);
        var dropdown = document.getElementById("navbar-content");

        // Get offset position of the navbar
        var sticky = navbar.offsetTop;

        // Add the sticky class to the navbar when you reach its scroll position
        // Remove sticky when you leave the scroll position
        function makeSticky() {
            if (window.pageYOffset >= sticky) {
                navbar.classList.add("sticky");
                dropdown.classList.add("sticky-dropdown");
                dropdown.style.top = bottom;
            } else {
                navbar.classList.remove("sticky");
                dropdown.classList.remove("sticky-dropdown");
                dropdown.style.top = null;
            }
        }
    </script>
</div>
HTML;
    return $html_template;
}