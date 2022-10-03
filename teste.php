<?php

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';

$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->SMTPAuth = true;
$mail->Username = 'araceli.cris66@gmail.com';
$mail->Password = 'natjslijdvffogfg';
$mail->setFrom('araceli.melo@unidavi.edu.br', 'Araceli Cristina');
$mail->addAddress('araceli.cris66@gmail.com', 'Araceli');
$mail->msgHTML(file_get_contents('email.html'), __DIR__);
//$mail->addAttachment('images/phpmailer_mini.png');


if (!$mail->send()) {
    echo 'Erro ao e-mail ' . $mail->ErrorInfo;
} else {
    echo 'E-mail enviado!';
 
}


function save_mail($mail)
{
    $path = '{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail';
    
    $imapStream = imap_open($path, $mail->Username, $mail->Password);

    $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
    imap_close($imapStream);

    return $result;
}