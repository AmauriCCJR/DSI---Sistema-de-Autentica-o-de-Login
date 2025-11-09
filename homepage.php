 <?php 
    session_start(); //Começa a sessão

    if (!isset($_SESSION['user_session'])){ //Se não achar o usuário de sessão, volta para a tela de login
        header('Location: index.php');
        exit;
    }
?>
 

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Pagina Restrita</title>
</head>
<body>
    <h1>Pagina Restrita</h1>
    <h2>Requisitos</h2>
    <figure class="link">
        <img src="img/requisitos.png">
    </figure>
    <div class="link">
        <a href="logout.php">Sair</a>
    </div>
    


</body>
</html>