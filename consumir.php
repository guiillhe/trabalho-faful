<!DOCTYPE html>
<html>
<head>
	<title>Exibição de Dados</title>
    <!-- CSS do Bootstrap 5.1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
    
    // Query para selecionar os dados da tabela CONTATO
    $sql = "SELECT * FROM CONTATO";
    
    // Executa a query
    $resultado = $conexao->query($sql);
    
    // Verifica se a query foi bem sucedida
    if (!$resultado) {
        die("Erro: " . $conexao->error);
    }
    
    
    // Exibe os resultados da query
    if ($resultado->num_rows > 0) {
        // Início da tabela
        echo "<table class='table'>";
        echo "<thead class='thead-dark'><tr><th>ID</th><th>Nome</th><th>Email</th><th>Telefone</th><th>Assunto</th><th>Mensagem</th><th>Excluir</th><th>Editar</th></tr></thead>";
        
        // Loop para exibir os dados
        while($linha = $resultado->fetch_assoc()) {
            echo "<tr><td>".$linha["id"]."</td><td>".$linha["nome"]."</td><td>".$linha["email"]."</td><td>".$linha["telefone"]."</td><td>".$linha["assunto"]."</td><td>".$linha["mensagem"]."</td><td><button type='button' class='btn btn-danger' onclick=\"location.href='excluir.php?id=".$linha['id']."'\">Excluir</button></td><td><button type='button' class='btn btn-primary' onclick=\"location.href='editar.php?id=".$linha["id"]."'\">Editar</button></td></tr>";
        }
        
        
        
        // Fim da tabela
        echo "</table>";
    } else {
        echo "Nenhum resultado encontrado.";
    }
    
    // Fecha a conexão com o banco de dados
    $conexao->close();
    ?>
    
</body>
</html>
