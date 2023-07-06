<?php
// Configuração do banco de dados
$host = "localhost"; // Endereço do servidor do banco de dados
$usuario = "admin"; // Nome de usuário do banco de dados
$senha = "123"; // Senha do banco de dados
$banco = "banco"; // Nome do banco de dados

// Conexão com o banco de dados
$conexao = mysqli_connect($host, $usuario, $senha, $banco);

// Verifica se a conexão foi estabelecida corretamente
if (!$conexao) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}

// Obtém os valores do formulário de login
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

// Consulta SQL para verificar o login
$query = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";
$resultado = mysqli_query($conexao, $query);

// Verifica se o login é válido
if (mysqli_num_rows($resultado) == 1) {
    // Login válido, redireciona para a página inicial ou exibe uma mensagem de sucesso
    echo "Login bem-sucedido!";
} else {
    // Login inválido, exibe uma mensagem de erro
    echo "Usuário ou senha incorretos!";
}

// Fecha a conexão com o banco de dados
mysqli_close($conexao);
?>
