<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "fleurloca_db";

$conn = mysqli_connect($server, $username, $password, $database);

if(!$conn){
    die("<script>alert('Connection Failed.')</script>");
}


?>


<?php

/**
 * REQUIRED SETTINGS
 *
 * You will probably need to change all of these settings for your own site.
 */

// The name and address which should be used for the sender details.
// The name can be anything you want, the address should be something in your own domain. It does not need to exist as a mailbox.
define('CONTACTFORM_FROM_ADDRESS', 'mailer@example.com');
define('CONTACTFORM_FROM_NAME', 'Contact Form on example.com');

// The name and address to which the contact message should be sent.
// These details should NOT be the same as the sender details.
define('CONTACTFORM_TO_ADDRESS', 'you@gmail.com');
define('CONTACTFORM_TO_NAME', 'Your Name');

// The details of your SMTP service, e.g. Gmail.
define('CONTACTFORM_SMTP_HOSTNAME', 'smtp.gmail.com');
define('CONTACTFORM_SMTP_USERNAME', 'you@gmail.com');
define('CONTACTFORM_SMTP_PASSWORD', 'hunter2');

// The reCAPTCHA credentials for your site. You can get these at https://www.google.com/recaptcha/admin
define('CONTACTFORM_RECAPTCHA_SITE_KEY', '');
define('CONTACTFORM_RECAPTCHA_SECRET_KEY', '');

/**
 * Optional Settings
 */

// The debug level for PHPMailer. Default is 0 (off), but can be increased from 1-4 for more verbose logging.
define('CONTACTFORM_PHPMAILER_DEBUG_LEVEL', 0);

// Which SMTP port and encryption type to use. The default is probably fine for most use cases.
define('CONTACTFORM_SMTP_PORT', 587);
define('CONTACTFORM_SMTP_ENCRYPTION', 'tls');

// Character encoding settings. The default is probably fine for most use cases.
define('CONTACTFORM_MAIL_CHARSET', 'iso-8859-1'); // Can be: us-ascii, iso-8859-1, utf-8. Default: iso-8859-1.
define('CONTACTFORM_MAIL_ENCODING', '8bit'); // Can be: 7bit, 8bit, base64, binary, quoted-printable. Default: 8bit.

// The language used for error message and the like.
// Supports 2 letter language codes, e.g. en, fr, es, cn. Default: en.
define('CONTACTFORM_LANGUAGE', 'en');

?>