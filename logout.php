<?php 
session_start();//Começa a sessão
session_destroy();//Fecha a sessão e 'apaga' os dados dessa sessão e reencaminha para a tela de login
header('Location: index.php');
exit;


?>