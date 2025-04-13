@vite(['resources/js/login.js'])
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>{{ config('app.name') }}</title>

</head>

<body>

    <div class="indexContainer">
        <div class="ladodireito">
            <div class="loginContainer">
                <form action="{{ route('login.autenticar')}}" id="formLogin" method="post">
                    @csrf
                    <div class="appname">
                        <h2>{{ config('app.generalname') }}</h2>
                    </div>
                    <div class="title">
                        <h2><strong>Login</strong></h2>
                    </div>
                    <label for="nomeusuario">Nome:<span>*</span></label>
                    <input class="@error('nomeusuario') error-field @enderror" type="name" name="nomeusuario" required>
                    <label for="senhausuario">Senha:<span>*</span></label>
                    <input class="@error('senhausuario') error-field @enderror" type="password" name="senhausuario" required>
                    <div class="buttonbox">
                        <button id="loginbutton" type="submit">Entrar</button>
                    </div>
                    <a id="abranco" href="https://www.instagram.com/retironotefix/">&copy; 2025 Carlos Eduardo, Academy-System V3.0.0</a>
                    @if ($errors->any())
    <div id="popuplogin" class="popup show">
        <div class="closepop" onclick="closePopup()"></div>
        <p id="popup-messagelogin">{{ $errors->first() }}</p>
    </div>
@endif

                </form>
            </div>
        </div>
        <div class="ladoesquerdo"></div>
   </div> 
   
</body>

    <script>
    

    

    function closePopup() {
        document.getElementById('popuplogin').classList.remove('show');
    }
</script>
<script>
     const papeisDeParede = [
        "{{ asset('img/background.png') }}",
        "{{ asset('img/background.png') }}"
    ];
    let indiceAtual = 0;
    function mudarPapelParede() {
        const container = document.querySelector('.indexContainer');
        
        if (container) {
            indiceAtual = (indiceAtual + 1) % papeisDeParede.length;

            container.style.backgroundImage = `url(${papeisDeParede[indiceAtual]})`;
        }
    }
    setInterval(mudarPapelParede, 10000);

    mudarPapelParede();
</script>
<script>
   function closePopup() {
    document.getElementById('popuplogin').classList.remove('show');
   
}

// Mostrar popup se houver erros
document.addEventListener('DOMContentLoaded', function() {
    const popup = document.getElementById('popuplogin');

    
    @if ($errors->any() || session('error'))
        popup.classList.add('show');
        setTimeout(() => {
                closePopup();
            }, 3000);
    @endif
});
</script>


</html>
