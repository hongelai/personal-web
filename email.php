<?php

if(isset($_GET['sendEmail'])){
   sendEmail();
}

function sendEmail(){
	$name = $_POST['name'];
    $from = $_POST['mail'];
    $to = 'HongeLai@gmail.com';
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $headers = 'From: '.$from . "\r\n";

    mail($to,$subject,$message,$headers);
}

?>