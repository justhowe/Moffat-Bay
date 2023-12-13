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
<title>Contact Us - Moffat Bay Lodge</title>
<style>
  body {
    font-family: 'Arial', sans-serif;
    background: #f5f5f5;
    color: #333;
    line-height: 1.6;
  }

  .container {
    width: 80%;
    margin: auto;
    overflow: hidden;
  }

  header {
    background: #333;
    color: #fff;
    padding-top: 30px;
    min-height: 70px;
    border-bottom: #bbb 1px solid;
  }

  header a {
    color: #fff;
    text-decoration: none;
    text-transform: uppercase;
    font-size: 16px;
  }

  header ul {
    padding: 0;
    list-style: none;
  }

  header ul li {
    display: inline;
    margin-right: 10px;
  }

  .contact-title {
    font-size: 24px;
    color: #333;
    text-align: center;
    padding: 10px 0;
  }

  .contact-form {
    max-width: 500px;
    margin: 20px auto;
    padding: 20px;
    background: #fff;
    border: 1px solid #ddd;
  }

  .contact-form label {
    display: block;
    margin-bottom: 5px;
  }

  .contact-form input[type="text"],
  .contact-form input[type="email"],
  .contact-form textarea {
    width: 94%;
    padding: 5px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
  }

  .contact-form button {
    display: block;
    width: 100%;
    padding: 10px;
    background: #333;
    color: #fff;
    border: 0;
    cursor: pointer;
  }

  .contact-form button:hover {
    background: #555;
  }

  .social-icons {
    text-align: center;
    margin-top: 20px;
  }

  .social-icons a {
    display: inline-block;
    margin-right: 10px;
  }

  .social-icons img {
    width: 32px;
    height: 32px;
  }
</style>
</head>
<body>
  <?php
    echo generate_navbar();
    echo generate_error_modal_container();
  ?>

<div class="contact-form">
  <h2 class="contact-title">Contact Us</h2>
    <form method="post">
  <label for="name">Name</label>
  <input type="text" id="name" name="name" placeholder="Enter Your Name">

  <label for="email">Email</label>
  <input type="email" id="email" name="email" placeholder="Enter Your Email">

  <label for="message">Message</label>
  <textarea id="message" name="message" placeholder="Enter Your Message"></textarea>

  <button type="submit">Submit</button>
</form>
</div>

<div class="social-icons">
  <!-- our own image paths -->
  <a href="#"><img src="facebook-icon.png" alt="Facebook"></a>
  <a href="#"><img src="twitter-icon.png" alt="Twitter"></a>
  <a href="#"><img src="snapchat-icon.png" alt="Snapchat"></a>
  <a href="#"><img src="instagram-icon.png" alt="Instagram"></a>
</div>
<?php
  echo generate_footer();
?>
</body>
</html>
