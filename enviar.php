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
    die("A conexão falhou: " + $conexao->connect_error);
    }
	
	$sql = "INSERT INTO CONTATO 
	(NOME, EMAIL, MENSAGEM, ASSUNTO, TELEFONE) VALUES 
	('".$nome."','".$email."','".$mensagem."','".$assunto."','".$telefone."') ";
	
	if (!($conexao->query($sql) === TRUE)) {
        
        die("Erro: " . $sql . "<br>" . $conexao->error);
    }else{
        echo "Dados enviados com sucesso para o Mysql";
    }
	
    $conexao->close();
?>