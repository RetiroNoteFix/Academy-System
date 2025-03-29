<?php
require '../config/config.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title><?php echo $appname?> - Login</title>

</head>

<body>

    <div class="indexContainer">
        <div class="ladodireito">
            <div class="loginContainer">
                <form action="" id="formLogin" method="post">
                    <div class="appname">
                        <h2><?php echo $appname?></h2>
                    </div>
                    <div class="title">
                        <h2><strong>Login</strong></h2>
                    </div>
                    <label for="nomeusuario">Nome:<span>*</span></label>
                    <input type="name" name="nomeusuario" required>
                    <label for="senhausuario">Senha:<span>*</span></label>
                    <input type="password" name="senhausuario" required>
                    <div class="buttonbox">
                        <button id="loginbutton" type="submit">Entrar</button>
                    </div>
                    <a href="https://www.instagram.com/retironotefix/" id="copy">&copy; 2025 Carlos Eduardo, Academy-System <?php echo $versao?></a>
                </form>
            </div>
        </div>
        <div class="ladoesquerdo"></div>
    </div>
    <!-- Popup -->
    
</body>
<div id="popuplogin" class="popup">
        <div class="closepop" onclick="closePopup()"></div>
        <p id="popup-messagelogin"></p>
    </div>
    <div class="overlay" id="overlay"></div>
    <script>
    document.getElementById('formLogin').addEventListener('submit', function(event) {
        event.preventDefault();
        const form = document.getElementById('formLogin');
        const formData = new FormData(form);
        fetch('../controllers/FormController.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    window.location.href = '../views/dashboard/dashboard.php';
                } else if (data.status === 'error') {
                    document.getElementById('popuplogin').classList.add('show');
                    document.getElementById('popup-messagelogin').innerHTML = data.message;
                    setTimeout(() => {
                closePopup();
            }, 5000);
                }
            })
            .catch(error => {
                console.error('Erro:', error);
            });
    });

    function closePopup() {
        document.getElementById('popuplogin').classList.remove('show');
    }
</script>
<script>
    // Lista de papéis de parede (imagens de fundo)
    const papeisDeParede = [
        'assets/img/login_background.jpg',
        'assets/img/login_background1.jpg'
    ];

    let indiceAtual = 0;

    // Função para mudar o papel de parede
    function mudarPapelParede() {
        // Seleciona o primeiro elemento com a classe 'indexContainer'
        const container = document.querySelector('.indexContainer');
        
        if (container) {
            // Incrementa o índice para selecionar a próxima imagem
            indiceAtual = (indiceAtual + 1) % papeisDeParede.length;

            // Aplica o novo papel de parede com transição suave
            container.style.backgroundImage = `url(${papeisDeParede[indiceAtual]})`;
        }
    }

    // Muda o papel de parede automaticamente a cada 5 segundos (5000ms)
    setInterval(mudarPapelParede, 10000);

    // Definindo o papel de parede inicial
    mudarPapelParede();
</script>


</html>
