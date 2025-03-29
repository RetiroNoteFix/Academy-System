<?php
include 'auth.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel de Controle</title>
</head>
<body>
    <?php if ($usuario_tipo == 'admin') { ?>
        <?php include '../interfaces/painel.php';?>
    <?php } else { ?>
        <?php include '../interfaces/no-adm/painel.php';?>
    <?php } ?>

</body>
</html>
