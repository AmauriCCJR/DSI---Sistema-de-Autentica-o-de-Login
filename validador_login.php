<?php 
session_start();

if (!isset($_SESSION['user_session'])){ //Se não achar o usuário de sessão, volta para a tela de login
        header('Location: index.php');
        exit;
    }
date_default_timezone_set('UTC');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php'; //Autoload do composer - Autocarregamento

if ($_SERVER["REQUEST_METHOD"] === "POST"){ //Se o servidor receber um request via post
$hoje = date('d/m/Y');
$hora = date('H:i:s');

$email_destino = "amauricarlosdecarvalho@gmail.com";
$assunto = "Sistema acessado!";
$mensagem = "O sistema de Amauri foi acessado no dia ".$hoje." as ". $hora;


$mail = new PHPMailer(true);

try {
    //Configurações de servidor
    $mail -> isSMTP();
    $mail -> Host = 'smtp.gmail.com';
    $mail -> SMTPAuth = true;
    $mail -> Username = 'amauritestesapp@gmail.com'; //Email que vai enviar o email(geralmente do servidor ou da empresa)
    $mail -> Password = 'qwiw ajox puuy kzwj'; //Senha para uso do email em aplicações (aleatoria e unica de cada email)
    $mail -> SMTPSecure = PHPMailer:: ENCRYPTION_SMTPS;
    $mail -> Port = 465;


    //Remetente e destinatario
    $mail -> setFrom('amauritestesapp@gmail.com', 'Acesso de sistema');
    $mail -> addAddress($email_destino);

    //Conteudo

    $mail -> isHTML(true);
    $mail -> Subject = $assunto;

    $mail -> Body = nl2br($mensagem);//No php é usada para converter quebras de linhas (/n) em <br> no html
    $mail -> AltBody = strip_tags($mensagem); //Remove todas as tags HTML da mensagem

    $mail -> send();
    echo "Email enviado! redirecionando...";

    header('Location:homepage.php');
    exit;

} catch (Exception $e){
    echo "Erro ao enviar email <br> Código do erro: {$mail -> ErrorInfo}";
}

} else {
    echo "Requisição Inválida";
}



?>