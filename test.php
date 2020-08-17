<form method="POST" enctype="multipart/form-data" action="send-mail.php">
    <p>
	Send to:
	<input type="text" name="receiver">
    </p>

    <p>
	Subject:
	<input type="text" name="subject">
    </p>

    <p>
	Message:
	<textarea name="message"></textarea>
    </p>

    <p>
	Select file:
	<input type="file" name="file">
    </p>

    <input type="submit">
</form>

<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'php-mailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $Email = 'pongpichan.ns57@kru.ac.th';
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = $Email;                     // Your gmail address
    $mail->Password   = 'black0988738261';                               // Your gmail password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($Email, 'Pongpichan');
    $mail->addAddress($_POST["receiver"]);

    $file_name = $_FILES["file"]["name"];
    move_uploaded_file($_FILES["file"]["tmp_name"], $file_name);
    $mail->addAttachment($file_name);

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $_POST["subject"];
    $mail->Body    = $_POST["message"];

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
