<?php
include 'conexao.php'; /* Inclui o arquivo de conexão ao banco de dados */

if ($_SERVER['REQUEST_METHOD'] == 'POST') { /* Verfica se o formlário foi enviado via método POST */
    $nome = $_POST['nome']; /* Obetem o nome do formulário */
    $email = $_POST['email']; /* Obtem o e-mail do formulário  */
    $senha = password_has($_POST['senha'], PASSWORD_DEFAULT); /* Cria um hash da senha p/amarzenar de forma segura*/
    $sql = "INSERT INTO usuarios(nome, email, senha)" VALUES ('$nome', '$email', '$senha'); /* SQL para inserir um novo usuario na tabela usuários */

    if (mysqli_query($conn, $sql)){ /* Executa a consulta e verifica se a inserção foi bem sucedida */
        echo "Cadastro realizado com sucesso"; /* Exibe a mensagem de sucesso */
        else {
            echo "Erro:" . $sql ."<br>" . mysqli_error($conn); /* Exibe uma mensagem de erro se a inserção falhar, incluindo a mensagem de erro do banco de dados */
        }
    }
}
?>
