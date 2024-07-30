<?php

use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
header('Access-Control-Allow-Origin: *');


//  $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
$mail->isSMTP();                                            // Send using SMTP
$mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
$mail->Username   = 'dev@empoderandomocambique.org';                     // SMTP username
$mail->Password   = 'ftvgaothxofhlegj';                                  //SMTP password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
$mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

// Obtendo os dados de Formulario
$nomeF = $_REQUEST['name'];
$nomeE = $_REQUEST['email'];
$assunto = $_REQUEST['subject'];
$nomeMessage = $_REQUEST['message'];
$recaptcha =  $_REQUEST["g-recaptcha-response"];

$mail->setFrom($nomeE, 'Juris Website');
$mail->addAddress('info@juris.co.mz', 'Juris Info');  // O email que recebe as informacoes
$mail->addAddress('adamomahala@equipmoz.org', 'Adamo Chiambiro');  // O email que recebe as informacoes
$mail->isHTML(true);
$mail->CharSet = 'UTF-8';
$mail->Encoding = 'base64';


// Formatando o corpo da mensagem no email
$message = "Utilizador: " . $nomeF  . " <br> Email: " .  $nomeE . "<br> <br> Mensagem: "  . $nomeMessage;

// Estrutura do Email
$mail->Subject = "Assunto: " . $assunto;
$mail->Body    = $message;


if (empty($nomeF) || empty($nomeE) || empty($assunto) || empty($nomeMessage) || empty($recaptcha)) {
    echo 'Preencha todos campos do formulário!!! ';
} else {
    if (!$mail->send()) {
        echo 'Email Não Enviada. Tente Novamente: ' . $mail->ErrorInfo;
    } else {
        echo 'Mensagem enviada com sucesso.';
    }
}

// Check if form is submitted
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Get the reCAPTCHA response
//     $recaptchaResponse = $_POST['g-recaptcha-response'];

//     // Your secret key
//     $secretKey = "6LfCLpApAAAAAG6pir7atHqIhUTOuKb0N1FV-BrO";

//     // Verify the reCAPTCHA response
//     $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $secretKey . "&response=" . $recaptchaResponse);
//     $responseKeys = json_decode($response, true);

//     // Check if reCAPTCHA is valid
//     if ($responseKeys["success"]) {
//         // reCAPTCHA is valid, proceed with form processing
//         // Your form processing code here
//     } else {
//         // reCAPTCHA is not valid, show an error message
//         echo "reCAPTCHA verification failed.";
//     }
// }
