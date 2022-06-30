<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpMailer/src/Exception.php';
require 'phpMailer/src/PHPMailer.php';
require 'phpMailer/src/SMTP.php';



$request = json_decode(file_get_contents('php://input'));

$mail = new PHPMailer(true);

try {
$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->isSMTP(); 
$mail->SMTPAuth   = true;
$mail->CharSet = 'UTF-8';
$mail->setLanguage('ru', './language/');
$mail->Host = 'smtp.mail.ru';
$mail->Username   = 'serg.brai@mail.ru';
$mail->Password   = 'kMxAhZ8WeSMzrUBdKaZw';
$mail->SMTPSecure = 'ssl';
$mail->Port       = 465;
$mail->SMTPOptions = array(
	'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
	)
);
// // от кого письмо

$mail->setFrom('serg.brai@mail.ru', 'Бухгалтер в ресурсе');

// // кому отправить

$mail->addAddress('Mark76267@gmail.com', 'Иван Петров');

// // тема письма

$mail->Subject = 'Новая заявка';

$body = "
<h2>Запрос:</h2>
<b>Имя:</b> $request->name<br>
<b>Номер телефона:</b> $request->phone<br><br>
<b>Email:</b> $request->email<br><br>
";  

// Отправка сообщения
$mail->isHTML(true);
$mail->Body = $body;    


// Проверяем отравленность сообщения
$mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}