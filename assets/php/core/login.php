<?php
include_once 'recebe_dados.php';


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    
    <?php if (isset($erro)) { echo "<p style='color: red;'>$erro</p>"; } ?>
    
    <form action="recebe_dados.php" method="POST">
        <label for="nomeusuario">E-mail: </label>
        <input type="name" name="nomeusuario" required>
        <br><br>
        <label for="senha">Senha: </label>
        <input type="password" name="senhausuario" required>
        <br><br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>
