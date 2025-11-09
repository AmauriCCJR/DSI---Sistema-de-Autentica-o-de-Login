<?php 
use PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD']==='POST'){
    $email_destino = $_POST['email'] ?? '';

}




?>