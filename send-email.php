<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);
    
    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    // Prepare email
    $to = "youremail@example.com"; // Replace with your email address
    $subject = "New Contact Form Submission";
    $body = "Name: $name\nEmail: $email\nPhone: $phone\nMessage: $message";
    $headers = "From: $email";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you for your submission!";
    } else {
        echo "There was an error processing your request.";
    }
} else {
    echo "Invalid request method.";
}
?>
