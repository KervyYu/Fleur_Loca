<?php

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/config.php';

session_start();

// Basic check to make sure the form was submitted.
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    redirectWithError("The form must be submitted with POST data.");
}

if (empty($_POST['firstname']) || empty($_POST['lastname'])) {
    redirectWithError("Please enter your full name in the form.");
}

if (empty($_POST['email'])) {
    redirectWithError("Please enter your email address in the form.");
}

if (empty($_POST['subject'])) {
    redirectWithError("Please enter a subject for your message.");
}

if (empty($_POST['message'])) {
    redirectWithError("Please enter your message in the form.");
}

if (empty($_POST['number'])) {
    redirectWithError("Please enter your contact number in the form.");
}

if (empty($_POST['date'])) {
    redirectWithError("Please enter the date of the event in the form.");
}

if (empty($_POST['time'])) {
    redirectWithError("Please enter the ceremony & reception start time in the form.");
}

if (empty($_POST['color'])) {
    redirectWithError("Please specify if you have a color palette or theme in the form.");
}

if (empty($_POST['event'])) {
    redirectWithError("Please specify the type of event in the form.");
}

if (empty($_POST['location'])) {
    redirectWithError("Please specify the venue or location in the form.");
}

// Additional info and how they heard about you are not mandatory, so no check for them

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    redirectWithError("Please enter a valid email address.");
}

// Everything seems OK, time to send the email.

$mail = new \PHPMailer\PHPMailer\PHPMailer(true);

try {
    // Server settings
    $mail->setLanguage(CONTACTFORM_LANGUAGE);
    $mail->SMTPDebug = CONTACTFORM_PHPMAILER_DEBUG_LEVEL;
    $mail->isSMTP();
    $mail->Host = CONTACTFORM_SMTP_HOSTNAME;
    $mail->SMTPAuth = true;
    $mail->Username = CONTACTFORM_SMTP_USERNAME;
    $mail->Password = CONTACTFORM_SMTP_PASSWORD;
    $mail->SMTPSecure = CONTACTFORM_SMTP_ENCRYPTION;
    $mail->Port = CONTACTFORM_SMTP_PORT;
    $mail->CharSet = CONTACTFORM_MAIL_CHARSET;
    $mail->Encoding = CONTACTFORM_MAIL_ENCODING;

    // Recipients
    $mail->setFrom(CONTACTFORM_FROM_ADDRESS, CONTACTFORM_FROM_NAME);
    $mail->addAddress(CONTACTFORM_TO_ADDRESS, CONTACTFORM_TO_NAME);
    $mail->addReplyTo($_POST['email'], $_POST['firstname'] . ' ' . $_POST['lastname']);

    // Content
    $mail->Subject = "[Contact Form] ".$_POST['subject'];
    $mail->Body    = <<<EOT
First Name: {$_POST['firstname']}
Last Name: {$_POST['lastname']}
Email: {$_POST['email']}
Subject: {$_POST['subject']}
Contact Number: {$_POST['number']}
Date of Event: {$_POST['date']}
Time: {$_POST['time']}
Color: {$_POST['color']}
Event Type: {$_POST['event']}
Location: {$_POST['location']}
Additional Information: {$_POST['additional_info']}
How did you hear about us? {$_POST['advertise']}

Message:
{$_POST['message']}
EOT;

    $mail->send();
    redirectSuccess();
} catch (Exception $e) {
    redirectWithError("An error occurred while trying to send your message: ".$mail->ErrorInfo);
}
