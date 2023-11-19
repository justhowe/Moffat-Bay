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

        .navbar {
            background-color: #333;
            overflow: hidden;
        }

        .navbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
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

        .navbar a, .dropdown-content a {
            float: none;
            display: block;
            text-align: left;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
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
    </style>
    <div class="navbar">
        <div class="dropdown">
            <button class="dropbtn">&#9660; Explore</button>
            <div class="dropdown-content">
                <a href="../login/">Login</a>
                <a href="../register/">Register</a>
                <a href="../reservation/">Reservations</a>
                <a href="../about/#">About Moffat Bay</a>
                <a href="../#">Attractions</a>
                <a href="../index.php">Home</a>
            </div>
        </div>
        <div class="avatar">
        <span>$username</span>
<!--            <img src="' .  . '" alt="Avatar">-->
        </div>
    </div>
</div>
HTML;
    return $html_template;
}