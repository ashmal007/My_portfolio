<?php
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone = strip_tags(trim($_POST["phone"]));
    $subject = strip_tags(trim($_POST["subject"]));
    $message = trim($_POST["message"]);

    $recipient = "ashmal.m9404@gmail.com";

    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Phone: $phone\n\n";
    $email_content .= "Message:\n$message\n";

    $email_headers = "From: $name <$email>";

    if (mail($recipient, $subject, $email_content, $email_headers)) {
        echo json_encode(["status" => "success", "message" => "Your message has been sent successfully!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Oops! Something went wrong. Please try again later."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}
?>