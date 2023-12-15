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

  .input-group{
    margin: 10px 0;
  }
  .input-group label{
      display: block;
      text-align: center;
      margin: 10px 0;
  }
  .input-group input{
      width: 100%;
      padding: 10px;
  }

  .contact-form {
    max-width: 300px;
    margin: 50px auto;
    padding: 20px;
    background: #fff;
    border: 1px solid #ddd;
    box-shadow: 0px 0px 10px 0px grey;
  }

  .contact-form h1 {
    text-align: center;
    margin-bottom: 24px;
  }

  .contact-form label {
    display: block;
    margin-bottom: 4px;
  }

  .contact-form input[type="text"],
  .contact-form input[type="email"],
  .contact-form textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 16px;
    border: 1px solid #ddd;
    box-sizing: border-box;
  }

  .contact-form button {
    width: 100%;
    padding: 8px;
    background: #007BFF;
    color: white;
    border: none;
    cursor: pointer;
  }

  .contact-form button:hover {
    background: #0056b3;
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
    <div class="header">
      <h1 class="contact-title">Contact Us</h1>
    </div>
    <form method="post">
      <div class="input-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Enter Your Name">
      </div>
      <div class="input-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter Your Email">
      </div>
      <div class="input-group">
        <label for="message">Message</label>
        <textarea id="message" name="message" placeholder="Enter Your Message"></textarea>
      </div>
      <div class="input-group">
        <button type="submit">Submit</button>
      </div>

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
