<?php
session_start(); /* Inicia uma sessão ou resume a sessão existente */

include 'conexao.php'; /* Inclui o arquivo de conexão ao banco de dados  */

if ($_SERVER['REQUEST_METHOD'] == 'POST') { /* Verifica se o método de requisição é POST */
    $emial = $_POST['email']; /* Obtém o valor do campo 'email' do formulário  */
    $senha = $_POST['senha'; /*  obtém o valor de campo 'senha' do formilário */
    $sql = "SELECT * FROM usuarios WHERE email = '$emial'"; /* Consulta o banco de dados p/encontrar o usuário c/o email fornecido */
    $result = mysqli_query($conn, $sql); /* Execulta a consulta no banco de dados */

    if (mysqli_num_rows($result) > 0) {/* Verifica se a consulta retornou algum resultado */
        $user = mysqli_fetch_assoc($result) /* Obtém dados do usuário encontrado */
        
        if (password_verify($senha, $user['senha'])){ /* Verifica se a senha fornecida corresponde à senha armazenada no banco de dados e compara com a que foi digitada */
        $_SESSION['usuario_id'] = $user['id'];
        $_SESSION['usuario_nome'] = $user['nome'];

        header("Location : pagina_principal.php"); /* Redireciona o usuário p/página principal  */
        exit; /* Termina a execução do script */
        
        } else {
            echo "Senha incorreta!"; /* Exibe mensagem de erro se a senha estiver incorreta */
        }
    } else {
        echo " Usuário não encontrado!"; /* Exibe mensagem de erro se o usuário não for encontrado */
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <img src="imagens/login.jpeg" alt="Login Imagem">
        <form method ="post">
            Email: <input type="email" name = "email" required><br><br>
            Senha: <input type="password" name = "senha" required><br><br>
            <input type="submit" valule = "Entrar">
        </form>
        <a href="cadastro.php" class = "cadastro-link"> Fazer Cadastro</a>
    </div>
</body>
</html>


    

    