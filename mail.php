<?php

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$to  = "@gmail.com";
$subject = "Mail From ChatSpace";

// $headers = "From : ".$name. "\r\n" ."CC : ";

$txt = "You have recived an e-mail from ".$name ."\r\nEmail : ".$email. "\r\n Message : ".$message;

if ($email != NULL) {
    mail($to, $subject, $txt, $headers);
}
header('Location:index.html');
?>