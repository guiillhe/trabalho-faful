<?php
// Dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$assunto = $_POST['assunto'];
$mensagem = $_POST['mensagem'];

    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $bancodedados = "uniasselvi20230313";
	
	$conexao = new mysqli($servidor, $usuario, $senha, $bancodedados);
	
	if ($conexao->connect_error) {
    die("A conexão falhou: " + $conexao->conexaoect_error);
    }
	
	$sql = "INSERT INTO CONTATO 
	(CODIGO, NOME, EMAIL, MENSAGEM) VALUES 
	(coalesce((SELECT MAX(c2.CODIGO) FROM CONTATO c2), 0) + 1,'".$nome."','".$email."','".$mensagem."') ";
	
	if (!($conexao->query($sql) === TRUE)) {
        $conexao->close();
        die("Erro: " . $sql . "<br>" . $conexao->error);
    }
	
    // Tratar sucesso no envio dos dados
    echo "Dados enviados com sucesso para o Mysql";
?>