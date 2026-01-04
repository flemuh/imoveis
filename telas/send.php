<?php


ini_set('SMTP','smtp.umbler.com');
ini_set('smtp_port',587);
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);
//EMAIL

$nome = $_POST["nome"];
$email = $_POST["email"];
$telfone = $_POST["telefone"];
$msg = $_POST["mensagem"];

$to = 'fhumel@hotmail.com';

$subject = 'Contato de Cliente';

$message = 'Email do Cliente : '. $email .' <br> Telefone do Cliente '. $telfone .'<br> Msg: '. $msg;


require "PHPMailerAutoload.php";// it will be in PHPMailer
require_once('class.smtp.php');
require_once('class.phpmailer.php');

$from  = "fhumel@hotmail.com";
function sendmail($to,$from,$subject,$message, $nome)  {


    $namefrom =$nome;
  $mail = new PHPMailer();
  $mail->CharSet = 'UTF-8';
  $mail->isSMTP();   // by SMTP
  $mail->SMTPAuth   = true;   // user and password
  $mail->Host       = "smtp-mail.outlook.com";
  $mail->Port       = 587;
  $mail->Username   = "fhumel@hotmail.com";
  $mail->Password   = "";
  $mail->SMTPSecure = "";    // options: 'ssl', 'tls' , ''
  $mail->setFrom($from,$namefrom);   // From (origin)
  $mail->addCC($from,$namefrom);      // There is also addBCC
  $mail->Subject  = $subject;
  $mail->AltBody  = $message;
  $mail->Body = $message;
  $mail->isHTML();   // Set HTML type
//$mail->addAttachment("attachment");
  $mail->addAddress($to);
  $mail->send();
}


sendmail($to,$from,$subject,$message, $nome);

    echo json_encode('ok');

    return ;



?>
