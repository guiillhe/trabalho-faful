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

// Recupera o ID passado via GET
$id = $_GET['id'];

// Query para excluir o registro correspondente ao ID informado
$sql = "DELETE FROM CONTATO WHERE id = $id";

// Executa a query
if ($conexao->query($sql) === TRUE) {
    echo "<div><h1> Registro excluído com sucesso.</h1><a href='consumir.php?>Excluir</a></div>";
} else {
    echo "Erro ao excluir registro: " . $conexao->error;
}

// Fecha a conexão com o banco de dados
$conexao->close();
?>
