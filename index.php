<?php 
include 'assets/php/core/recebe_dados.php'; //RECEBE OS DADOS DO FORMULÁRIO
include 'assets/php/core/config.php'; // ARQUIVO DE CONFIGURAÇÃO
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link href="assets/img/logo.jpg" rel="icon">
    <link href="assets/style/globalstyle.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $appname;?> - Login</title>
</head>

<body id="body-login-page">
    <div class="login-container">
        <form action="" id="formlogin" method="post">
            <div class="appname">
                <h1><?php echo $appname;?></h1>
            </div>
            <!--appname-->
            <div class="title">
                <h2><strong>Login</strong></h2>
            </div>
            <!--title-->
            <label for="nomeusuario">Nome:<span>*</Nome:span></label><br>
            <input type="name" name="nomeusuario" required><br>
            <label for="senhausuario">Senha<span>*</span></label><br>
            <input type="password" name="senhausuario" required>
            <div class="buttonbox">
                <button id="loginbutton" type="submit">Entrar
                </button>
                <!--btn-login-->
            </div>
            <!--button-box-->
        </form>
        <!--form login-->
    </div>
    <!--login-container-->
    <!--inicio-popup-->
    <div id="popup" class="popup">
        <div class="closepop">
        </div>
        <p id="popup-message"></p>
        <div id="dadosaluno"></div>
    </div>
    <div class="overlay" id="overlay">
    </div>
    </div>
    <!--fim popup-->

    <!--Script do popup-->
    <script>
    document.getElementById('formlogin').addEventListener('submit', function(event) {
        event.preventDefault();
        const form = document.getElementById('formlogin');
        const formData = new FormData(form);
        fetch('/academy/assets/php/core/recebe_dados.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                setTimeout(function() {
                    closePopup();
                }, 1600);
                if (data.status === 'success') {
                    window.location.href = '/academy/assets/php/core/dashboard.php';
                } else if (data.status === 'error') {
                    document.getElementById('popup-message').innerHTML = data.message;
                    document.getElementById('popup').classList.add('show');
                    document.getElementById('overlay').classList.add('show');
                }
            })
            .catch(error => {
                console.error('Erro:', error);
            });
    });

    function closePopup() {
        document.getElementById('popup').classList.remove('show');
        document.getElementById('overlay').classList.remove('show');
    }
    </script>
    <!--Script do popup-->

</body>
</main>

</html>