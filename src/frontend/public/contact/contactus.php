<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $name = htmlspecialchars(strip_tags($_POST['name']));
    $email = htmlspecialchars(strip_tags($_POST['email']));
    $subject = htmlspecialchars(strip_tags($_POST['subject']));
    $message = htmlspecialchars(strip_tags($_POST['message']));

    // Validate inputs
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        // Handle the error, e.g., set an error message
        $error_message = "All fields are required.";
    } else {
        // Process the data, for example, sending an email
        $to = 'your-receiving-email@example.com'; // Replace with your email address
        $headers = "From: " . $email;
        
        // Use mail function to send the email
        if (mail($to, $subject, $message, $headers)) {
            // Set a success message
            $success_message = "Message sent successfully!";
        } else {
            // Set an error message
            $error_message = "Message could not be sent.";
        }
    }
}
?>
