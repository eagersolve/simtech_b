<?php
require_once 'connect_db.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$user_name = trim($_REQUEST['user_name']);
$email = trim($_REQUEST['email']);
$subject = trim($_REQUEST['subject']);
$message = trim($_REQUEST['message']);
$gender = $_REQUEST['gender'];
$device = $_REQUEST['device'];
$file = $_FILES["filename"];
$fileSize = $file['size'];



if ($fileSize > 5000000) {
    header('location:index.php?error_size');
    exit;
}

$email_verification = mysqli_query($link, "SELECT * FROM users WHERE email =  '$email'");

if ($user_name == "" || $subject == "" || $message == "") {
    header('location:index.php?error');
    die;
} else {
    if ((mysqli_affected_rows($link) > 0)) {
        header('location:index.php?error_email');
        die;
    } else {
        if (!empty($_FILES['filename']['tmp_name'])) {
            $fileSaveDB = NULL;
            $fileName = time() . $file["name"];
            $pathTOfile =  'files' . "\\\\" . $fileName;
            move_uploaded_file($file["tmp_name"], $pathTOfile);
        } else {
            $pathTOfile = NULL;
        }

        $sql = "INSERT INTO users (user_name, email, subject, message, gender, device, pathTOfile) VALUES 
                ('$user_name', '$email', '$subject', '$message', '$gender', '$device', '$pathTOfile')";

        $user_is_created = mysqli_query($link, $sql);


        // SMTP
        $mail = new PHPMailer;
        $mail->CharSet = 'UTF-8';
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Port = "587";

        //Account
        $mail->Username = 'simtechtestmail@gmail.com';
        $mail->Password = 'rfrltkf151127';
        $mail->setFrom('simtechtestmail@gmail.com');
        $mail->addAddress($config['mailto']);

        //Message
        $mail->isHTML(true);
        $mail->Subject = "$subject";
        $mail->Body = "<u>$message</u> " . "<br>" . "С уважением, " . "<b>$user_name</b>";


        if ($mail->Send()) {
            header("location:index.php?success");
        }

        $mail->smtpClose();
    }
}
