@vite(['resources/js/usuarios/criar.js'])
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
</head>

<body>

    <div class="menu">
        <div id="linhamenu">
        <h4 id="appname">{{config('app.generalname')}}</h4>
        </div><!--linha menu-->
        <div class="options">
        <div class="user"><i id="usericon"  title="Adicionar foto de Perfil"></i><div class="userinfo"><p id="username">Olá, {{ $usuarioNome }} </p></i></u><p id="userjoin">Bom dia!</p>
        <div id="contextMenu">
    <div id="removePhoto"><h4>Remover Foto</h4></div>
  </div>
    </div><!--user info-->
        </div><!--user-->
        <a class="nostyle" href="{{route('inicio.index')}}"><div class="opt" id="optInicioOFF">
            <i data-opticon="true" id="opticon" class="fa-solid fa-house"></i> <p id="optname">Início</p>
        </div></a><!--optInicio-->
        <a class="nostyle" href="{{route('inicio.index')}}"><div  id="optInicioNOFF">
            <i data-opticon="true" id="opticon4" class="fa-solid fa-house"></i> <p id="optname4">Início</p>
        </div></a><!--optInicioN-->
        <a class="nostyle" href="{{route('alunos.index')}}"><div class="opt" id="optAlunosON">
            <i  data-opticon="true" id="opticon1" class="fa-solid fa-users-line"></i> <p id="optname">Alunos</p>
        </div></a><!--optAlunos-->
        <a class="nostyle" href="{{route('alunos.index')}}"><div class="opt" id="optAlunosNON">
            <i  data-opticon="true" id="opticon5" class="fa-solid fa-users-line"></i> <p id="optname4">Alunos</p>
</a></div><!--optAlunosN-->
        <div class="opt" id="optPagamentos">
            <i   data-opticon="true" id="opticon2"class="fa-solid fa-money-check-dollar"></i> <p id="optname">Pagamentos</p>
        </div><!--optPagamentos-->
        <div class="opt" id="optPagamentosN">
            <i   data-opticon="true" id="opticon6"class="fa-solid fa-money-check-dollar"></i> <p id="optname4">Pagamentos</p>
        </div><!--optPagamentos-->
        <div class="opt" id="optUsuarios">
            <i   data-opticon="true" id="opticon3"class="fa-solid fa-users"></i> <p id="optname">Usuários</p>
        </div><!--optUsuarios-->
        <div class="opt" id="optConfig">
            <i id="opticon8" class="fa-solid fa-gear"></i> <p id="optname">Configurações</p>
        </div><!--optConfig-->
        
        <div class="opt" id="optUsuariosN">
            <i   data-opticon="true" id="opticon7"class="fa-solid fa-users"></i> <p id="optname4">Usuários</p>
        </div><!--optUsuariosN-->
        <div class="opt" id="optConfigN">
            <i id="opticon9" class="fa-solid fa-gear"></i> <p id="optname">Configurações</p>
        </div><!--optConfigN-->
    </div><!--options-->
    <a href="{{route('logout')}}"><u id="useroutline"><h6 id="userout">Sair</h6></u></a>
       
    </div><!--menu-->
    <header id="mainheader" data-status="ativos">
        <p id="pagetitle"  >Alunos - Adicionar Novo</p> 
        <i id="nighttheme" title="Tema Escuro" class="fa-solid fa-moon"></i> 
        <i title="Tema Claro" id="themeday" class="fa-solid fa-sun"></i>
    </header>
    <main>
        <section id="sectionconfig">
            <div class="linetop" id="linetopconfig"><h1 id="h1config">Configurações</h1></div>
            <div class="optconfigs" id="optInicio" title="O Menu lateral se minimiza automaticamente para um melhor aproveitamento da tela. ativando essa opção o menu lateral passa a ter uma largura fixa mantendo as opções visíveis.">
                <i id="optconfigicon1on" class="fa-solid fa-toggle-on"></i>  <i id="optconfigicon1" class="fa-solid fa-toggle-off"></i> <p id="optconfigname">Minimizar menu automaticamente</p>
            </div><!--optInicio-->
        </section>
        <section id="maincontentform">
            <div id="linetop" class="linetop"><h1 id="h1alert">ADICIONAR USUÁRIO</h1></div>
           <section id="formaddalunos">
            <form action="{{ route('usuarios.cadastrar')}}" method="post">
            @csrf
            @if ($errors->any())
    <div id="popuplogin" class="popup show">
        <div class="closepop" onclick="closePopup()"></div>
        <p id="popup-messagelogin">{{ $errors->first() }}</p>
    </div>
@endif
            <div class="boxform" id="boxformusuario">
            
            <div class="form-group">
            <label for="nome">NOME DE USUÁRIO:</label>
            <input type="text" id="nome2" name="nome" required maxlenght="255" placeholder="Nome completo" >
        </div>
        <div class="compact">
        <div class="form-group">
            <label for="senhausuario">SENHA:</label>
            <input type="text" id="idade2" name="senhausuario" placeholder="Senha de Usuário"  >
        </div>
    </div><!--compact-->
    <div class="compact">
        <div class="form-group">
        <label for="tipousuario">TIPO DE USUÁRIO:</label>
            <select name="tipousuario" id="tipousuario">
            <option value="">Selecione</option>
            <option value="admin">Admin</option>
            <option value="funcionario">Funcionário</option>
            </select>
        </div>
</div>
            <div class="btnadc">
                <button class="addaluno" type="submit" id="btncadastraraluno">
                    <i id="cadastraralunoicon" class="fa-solid fa-user-plus"></i>
                    <h5 id="btnname">Cadastrar Usuario</h5>
                </button><!--addaluno-->
                <button class="addaluno" id="btnback">
                    <i id="cadastraralunoicon" class="fa-solid fa-rotate-left"></i>
                    <h5 id="btnname" >Voltar</h5>
                </button><!--voltar-->
               </div>
        </div><!--boxform-->
        
        </section>
        </section><!--maincontentform-->
    </main>
    <footer>
        <a href="https://www.instagram.com/retironotefix/" id="copy">&copy; 2025 Carlos Eduardo, Academy-System v3.0.0</a>
    </footer>
    <div id="popup" class="popup">
        <div class="popup-content">
            <p>Tem certeza de que deseja ignorar?</p>
            <button id="confirmar">Sim</button>
            <button id="fechar">Cancelar</button>
        </div>
    </div>
    <div id="popupficha" class="popupficha">
        <div class="conteudo-ficha">
        </div>
    </div>
    
    </form><!--formanamnese-->
        </div>
    </div>
    <div id="overlay" class="overlay"></div>
</body>
</html>