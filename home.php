 <?php 
    session_start(); //Começa a sessão

    if (!isset($_SESSION['user_session'])){ //Se não achar o usuário de sessão, volta para a tela de login
        header('Location: login.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Menu principal</title>
</head>
<body>
    <div class="link">
        <h1>Olá</h1>
        <p>Veja os requisitos da P2:</p>
        <picture class="link">
            <img src="img/requisitos.png">
        </picture>
        <div class="link">
            <a href="logout.php" >Sair</a>
        </div>
    </div>
</body>
</html>