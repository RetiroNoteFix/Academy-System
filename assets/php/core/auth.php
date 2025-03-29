<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header('Location: /academy/index.php'); // Redireciona para a página de login
    exit();
}

// Captura dados da sessão
$usuario_nome = $_SESSION['usuario_nome'];
$usuario_tipo = $_SESSION['usuario_tipo'];

// Exemplo de restrição para diferentes tipos de usuário
if ($usuario_tipo !== 'admin') {
    // Redireciona se o tipo de usuário não for permitido
    header('Location: /academy/core/403.php'); // Página de acesso negado
    exit();
}
?>
