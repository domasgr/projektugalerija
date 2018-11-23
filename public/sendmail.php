<?php
date_default_timezone_set('Etc/UTC');
require_once('../gmail/PHPMailerAutoload.php');

if(isset($_POST['submitEmail'])) {

    $usersName = $_POST['usersName'];
    $usersEmail = $_POST['usersEmail'];
    $usersMsg = $_POST['usersMessage'];

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = '465';
    $mail->isHTML();
    $mail->Username = 'medzio.restauracija@gmail.com';
    $mail->Password = 'domasjonas';
    $mail->SetFrom('domasg209@gmail.com');
    $mail->Subject = 'Pranesimas is projektu galerijos puslapio';
    $mail->Body = 'Lankytojas '.$usersName.', kurio pašto adresas :     '.$usersEmail." atsiuntė jums žinutę : \n\n".$usersMsg;
    $mail->AddAddress('lina.grubiene@gmail.com');

    $mail->Send();

    header('Location: /public/index.php');
}
?>