<?php
 if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuario_id'])) {
    header('Location: /Academy-System/');
    exit();
}
$usuario_nome = $_SESSION['usuario_nome'];
$usuario_tipo = $_SESSION['usuario_tipo'];
if ($usuario_tipo !== 'admin') {
    header('Location: ../views/403.php');
    exit();
}
class AuthController {
    public function logout() {
        session_unset();
        session_destroy();
        header('Location: /Academy-System/');
    }
}
?>