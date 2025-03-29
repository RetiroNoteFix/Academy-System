<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Conectar ao banco de dados
    $mysqli = new mysqli('localhost', 'root', '', 'academy');

    if ($mysqli->connect_error) {
        die('Erro ao conectar ao banco de dados: ' . $mysqli->connect_error);
    }

    // Obter dados do formulário
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $tipo_usuario = $_POST['tipo_usuario'];

    // Validar senha
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    // Inserir novo usuário no banco de dados
    $stmt = $mysqli->prepare('INSERT INTO usuarios (nome, senha, tipo_usuario) VALUES (?, ?, ?)');
    $stmt->bind_param('sss', $nome, $senha_hash, $tipo_usuario);
    
    if ($stmt->execute()) {
        echo "Usuário registrado com sucesso!";
    } else {
        echo "Erro ao registrar o usuário!";
    }

    $stmt->close();
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Registrar Usuário</title>
</head>
<body>
    <h2>Criar Novo Usuário</h2>
    <form method="POST">
        <label for="nome">Nome: </label>
        <input type="text" name="nome" required>
        <br><br>
      
        <label for="senha">Senha: </label>
        <input type="password" name="senha" required>
        <br><br>
        <label for="tipo_usuario">Tipo de Usuário: </label>
        <select name="tipo_usuario" required>
            <option value="admin">Admin</option>
            <option value="funcionario">Funcionário</option>
        </select>
        <br><br>
        <button type="submit">Registrar</button>
    </form>
</body>
</html>
