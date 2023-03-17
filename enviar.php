<?php

// Dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$assunto = $_POST['assunto'];
$mensagem = $_POST['mensagem'];

// Configuração da conexão com o Supabase
$url = 'https://esbloxxkfsrwjnmpsswv.supabase.co/rest/v1/paper202301';
$chave_api = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImVzYmxveHhrZnNyd2pubXBzc3d2Iiwicm9sZSI6ImFub24iLCJpYXQiOjE2Nzg4MjgyNTQsImV4cCI6MTk5NDQwNDI1NH0.hPvE1u80K-xbr71VTzlPnlww_eA1_zjCWylKUWPaJus';

if (extension_loaded('openssl')) {
    echo 'OpenSSL está habilitado';
} else {
    echo 'OpenSSL não está habilitado';
}
$dados = [
    'nome' => $nome,
    'email' => $email,
    'telefone' => $telefone,
    'assunto' => $assunto,
    'mensagem' => $mensagem
];
$options = [
    'http' => [
        'header'  => "Content-type: application/json\r\nAuthorization: Bearer " . $chave_api,
        'method'  => 'POST',
        'content' => json_encode($dados),
    ],
];

// Envio dos dados para o Supabase
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

if ($result === false) {
    // Tratar erro na conexão
    echo "Erro na conexão com o Supabase";
} else {
    // Tratar sucesso no envio dos dados
    echo "Dados enviados com sucesso para o Supabase";
}
