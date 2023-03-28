<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
// Dados para a conexão com o banco de dados
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "uniasselvi20230313";

// Cria a conexão com o banco de dados
$conexao = new mysqli($servidor, $usuario, $senha, $banco);

// Verifica se a conexão foi bem sucedida
if ($conexao->connect_error) {
    die("A conexão falhou: " . $conexao->connect_error);
}

// Verifica se o método de envio é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Obtém os dados do formulário
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $assunto = $_POST["assunto"];
    $mensagem = $_POST["mensagem"];

    // Query para atualizar os dados na tabela CONTATO
    $sql = "UPDATE CONTATO SET nome='$nome', email='$email', telefone='$telefone', assunto='$assunto', mensagem='$mensagem' WHERE id=$id";

    // Executa a query
    if ($conexao->query($sql) === TRUE) {
        // Redireciona para a página de exibição de dados
        header("Location: consumir.php");
        exit;
    } else {
        echo "Erro ao atualizar os dados: " . $conexao->error;
    }

}

// Fecha a conexão com o banco de dados
$conexao->close();
?>

    
</body>
</html>
