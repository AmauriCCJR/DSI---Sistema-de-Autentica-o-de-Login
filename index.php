<?php
session_start();
require 'users.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $user_login = $_POST['usuario'] ?? ''; //Recebe o conteudo do form, e se não achar nenhum valor, ao invés de retornar null, retorna ''
    $senha = $_POST['senha'] ?? '';

    $user_login = strtoupper($user_login);

    //Verifica se na variavel users(users.php) há o usuario digitado(abacaxi) e descriptografa a senha e verifica se ela bate com o usuario dela
    if (isset($usuarios[$user_login]) && password_verify($senha, $usuarios[$user_login])){
        $_SESSION['user_session'] = $user_login; //Atribui o nome do usuário como uma variavel de sessão, tipo cookies, só que no servidor
        header('Location: validador_login.php'); //Encaminha direto para a pagina home
        exit;
    } else {
        $error = 'Usuário ou Senha Inválidos!';
    }

}
?>
 

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Pagina de Login</title>
</head>
<body>
       <h1>Realizar Login</h1>


       <?php 
        echo "<h2 class='erro'>".$error."</h2><br>";

        ?>
     <form method="POST" action="validador_login.php">
        <label>Usuário: </label><input type="text" name="usuario" required><br><br>
        <label>Senha: </label><input type="password" name="senha" required><br><br>

        <input type="submit" value="Entrar"><br><br>

        <a href="forgotPassword.php">Esqueci minha senha</a>

     </form>
        
     <?php 
      
     ?>






    
</body>
</html>