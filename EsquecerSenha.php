<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();
require 'contas.php';
require 'vendor/autoload.php';
date_default_timezone_set('America/Sao_Paulo');
$error = '';
$data = date('d/m/y');
$hora = date('h:i');

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $user_email = $_POST['email'] ?? ''; //Recebe o conteudo do form, e se não achar nenhum valor, ao invés de retornar null, retorna ''

    $user_email = strtoupper($user_email);

    //Verifica se na variavel users(users.php) há o usuario digitado(abacaxi) e descriptografa a senha e verifica se ela bate com o usuario dela
    if (isset($usuarios[$user_email])){
        $_SESSION['user_session'] = $user_mail; //Atribui o nome do usuário como uma variavel de sessão, tipo cookies, só que no servidor

        //Envio de email
        $email_destino = "marcos.sousa12@fatec.sp.gov.br";
        $assunto = "Senha Resetada com sucesso!";
        $mensagem = "Sua senha foi resetada no dia ".$data." as ".$hora." horas. <br><br> A sua nova senha agora é: Fatec2025SI";


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
            $mail -> setFrom('amauritestesapp@gmail.com', 'Senha Resetada!');
            $mail -> addAddress($email_destino);

            //Conteudo
        
            $mail -> isHTML(true);
            $mail -> Subject = $assunto;

         $mail -> Body = nl2br($mensagem);//No php é usada para converter quebras de linhas (/n) em <br> no html
        $mail -> AltBody = strip_tags($mensagem); //Remove todas as tags HTML da mensagem

            $mail -> send();
            $error = "Email enviado com sucesso!";
            header('Location: index.php');
            exit;

        } catch (Exception $e){
            echo "Erro ao enviar email <br> Código do erro: {$mail -> ErrorInfo}";
        }

        } else {
            $error = 'Email Inválido!';
        }
    }

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Recuperar Senha</title>
</head>
<body>
    <div class="container">
        <?php 
        echo "<h2 class='erro'>".$error."</h2><br>"
        ?>
        <h1>Recuperar senha</h1>
        <form method="post" action="">
        <label>Email</label><br>
        <input type="text" name="email"><br><br>

        <input type="submit" value="Resetar senha" class="btn btn-primary"><br><br><hr>
        </form>
       
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>