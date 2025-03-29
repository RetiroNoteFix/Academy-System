<?php
session_start();
session_unset();
session_destroy();
header('Location: /academy/index.php'); // Redireciona para a página de login
exit();
