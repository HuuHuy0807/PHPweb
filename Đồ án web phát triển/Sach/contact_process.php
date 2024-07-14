<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $to = "huynho0807@gmail.com";
    $subject = "Liên hệ từ " . $name;
    $body = "Tên: " . $name . "\n";
    $body .= "Email: " . $email . "\n";
    $body .= "Nội dung:\n" . $message;

    $headers = "From: " . $email;

    if (mail($to, $subject, $body, $headers)) {
        header("Location: contact.php?message=Gửi thành công!");
        exit();
    } else {

        header("Location: contact.php?error=Gửi không thành công. Vui lòng thử lại.");
        exit();
    }
} else {
    header("Location: contact.php");
    exit();
}
