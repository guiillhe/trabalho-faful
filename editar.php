<!DOCTYPE html>
<html>
<head>
	<title>Editar Contato</title>
    <link rel="stylesheet" href="styles.css">
	<meta charset="utf-8">
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

	// Obtém o ID do contato a ser editado
	$id = $_GET['id'];

	// Query para selecionar o contato com o ID desejado
	$sql = "SELECT * FROM CONTATO WHERE id = $id";

	// Executa a query
	$resultado = $conexao->query($sql);

	// Verifica se a query foi bem sucedida
	if (!$resultado) {
		die("Erro: " . $conexao->error);
	}

	// Obtém os dados do contato
	$linha = $resultado->fetch_assoc();
	$nome = $linha['nome'];
	$email = $linha['email'];
	$telefone = $linha['telefone'];
	$assunto = $linha['assunto'];
	$mensagem = $linha['mensagem'];

	// Fecha a conexão com o banco de dados
	$conexao->close();
	?>

    <div class="formulario">
        <h1>Editar Contato</h1>
        <form method="post" action="salvar.php">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <label>Nome:</label><br>
            <input type="text" name="nome" value="<?php echo $nome ?>"><br><br>
            <label>Email:</label><br>
            <input type="email" name="email" value="<?php echo $email ?>"><br><br>
            <label>Telefone:</label><br>
            <input type="tel" name="telefone" value="<?php echo $telefone ?>"><br><br>
            <label>Assunto:</label><br>
            <input type="text" name="assunto" value="<?php echo $assunto ?>"><br><br>
            <label>Mensagem:</label><br>
            <textarea name="mensagem"><?php echo $mensagem ?></textarea><br><br>
            <input type="submit" value="Salvar">
            <input type="button"  onclick="history.back()" value="Voltar">

        </form>
    </div>

</body>
</html>
