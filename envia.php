<?php
require 'autenvio/src/PHPMailer.php';
require 'autenvio/src/SMTP.php';
require 'autenvio/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = htmlspecialchars($_POST['nome'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $telefone = htmlspecialchars($_POST['telefone'] ?? '');
    $genero = htmlspecialchars($_POST['genero'] ?? '');
    $assunto = htmlspecialchars($_POST['assunto'] ?? '');
    $mensagem = htmlspecialchars($_POST['mensagem'] ?? '');

    $mail = new PHPMailer(true);

    try {
        // SMTP
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = 'joocortezz18@gmail.com';
        $mail->Password = 'qrzzjtaseusiplde'; // senha de app
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Remetente e destinatário
        $mail->setFrom("joocortezz18@gmail.com", "Form do site");
        $mail->addAddress('joocortezz18@gmail.com', 'Contato do site');

        // Corpo do e-mail
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Subject = "Formulário de Contato - $assunto";
        $mail->Body = "
            <b>Nome:</b> $nome <br>
            <b>Email:</b> $email <br>
            <b>Telefone:</b> $telefone <br>
            <b>Gênero:</b> $genero <br>
            <b>Assunto:</b> $assunto <br>
            <b>Mensagem:</b> " . nl2br($mensagem);

        $mail->send();
        header("Location: contato.php?status=sucesso&msg=" . urlencode("Sua mensagem foi enviada com sucesso!"));
        exit;
    } catch (Exception $e) {
        header("Location: contato.php?status=erro&msg=" . urlencode("Erro ao enviar: {$mail->ErrorInfo}"));
        exit;
    }
} else {
    header("Location: contato.php");
    exit;
}