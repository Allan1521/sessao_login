<?php
session_start(); //Inicia uma nova sessão ou retorn a sessão existente.
//Verifica se o usuário está logado
//Verifica se a avriável de sessão usuario_id está definida.
//Se não tiver, significa que o usuário não está logado.
if (!isset($_SESSION['usuario_id'])){ //Esta função é usada para enviar cabeçalhos HTTP brutos diretamente ao navegador.
    header("Location: index.php"); // O servidor envia um cabeçalho ao navegador, instruindo-o a carregar a página index.php  
    
    exit; //Finaliza o script. Por segurança.  
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Painel</title>
</head>
<body>
    <h1>Bem Vindo <?php echo htmlspecialchars($_SESSION['usuario_nome']); ?></h1>
    <p>Você está logado.</p>
    <a href="logout.php">Sair</a>
    
</body>
</html>