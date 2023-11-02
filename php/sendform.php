<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $subject = $_POST['subject'];
    
    $to = 'mercurys1030@gmail.com'; // Replace with your Gmail address
    $subject = 'Contact Form Submission from ' . $name;
    $headers = 'From: ' . $email;
    
    $mailBody = "Name: $name\nEmail: $email\n\n$message";
    
    if (mail($to, $subject, $mailBody, $headers)) {
        echo 'Message sent successfully.';
    } else {
        echo 'Message sending failed.';
    }
} else {
    echo 'Invalid request.';
}
?>
