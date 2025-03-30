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
            <h4 id="appname">Academia Ritmo Fitness</h4>
        </div><!--linha menu-->
        <div class="options">
        <div class="user"><i id="usericon" class="fa-solid fa-circle-user"></i><div class="userinfo"><p id="username">Olá, SUPORTE </p></i></u><p id="userjoin">Bom dia!</p>
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
        </div></a><!--optAlunosN-->
        <a class="nostyle" href="{{route('pagamentos.index')}}"><div class="opt" id="optPagamentos">
            <i   data-opticon="true" id="opticon2"class="fa-solid fa-money-check-dollar"></i> <p id="optname">Pagamentos</p>
        </div></a><!--optPagamentos-->
        <a class="nostyle" href="{{route('pagamentos.index')}}"><div class="opt" id="optPagamentosN">
            <i   data-opticon="true" id="opticon6"class="fa-solid fa-money-check-dollar"></i> <p id="optname4">Pagamentos</p>
        </div></a><!--optPagamentos-->
        <a class="nostyle" href="{{route('usuarios.index')}}"><div class="opt" id="optUsuarios">
            <i   data-opticon="true" id="opticon3"class="fa-solid fa-users"></i> <p id="optname">Usuários</p>
        </div></a><!--optUsuarios-->
        <div class="opt" id="optConfig">
            <i id="opticon8" class="fa-solid fa-gear"></i> <p id="optname">Configurações</p>
        </div><!--optConfig-->
        
        <a class="nostyle" href="{{route('usuarios.index')}}"><div class="opt" id="optUsuariosN">
            <i   data-opticon="true" id="opticon7"class="fa-solid fa-users"></i> <p id="optname4">Usuários</p>
        </div></a><!--optUsuariosN-->
        <div class="opt" id="optConfigN">
            <i id="opticon9" class="fa-solid fa-gear"></i> <p id="optname">Configurações</p>
        </div><!--optConfigN-->
    </div><!--options-->
     <a href="{{route('logout')}}"><u id="useroutline"><h6 id="userout">Sair</h6></u></a>
       
    </div><!--menu-->
    <header id="mainheader" data-status="ativos">
        <p id="pagetitle"  >Alunos - Ativos</p> 
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
        <section id="maincontent">
            <div id="linetop" class="linetop"><h1 id="h1alert">ALUNOS</h1></div>
            <div class="list">
                <div class="menutopcontent">
                    <section class="menutopleft">
                    <a class="a" href="{{route('alunos.criar')}}"><button  id="addaluno" class="addaluno">
                        <i  id="addalunoicon" class="fa-solid fa-user-plus"></i>
                        <h4 id="optmenutopname">Aluno</h4>
                    </button></a><!--add aluno-->
                    <button class="addaluno" id="alunosoff" data-status="ativos">
                        <i id="addalunoicon" class="fa-solid fa-users-slash"></i>
                        <h4 id="optmenutopname2">Desativados</h4>
                    </button><!--alunos off-->
                    <button class="addaluno" id="btnback">
                        <i id="addalunoicon" class="fa-solid fa-rotate-left"></i>
                        <h4 id="optmenutopname">Voltar</h4>
                    </button><!--Voltar-->
                </section>
                    <section class="menutopright">
                    <div class="pages">
                        <p id="pag">Pág:</p>
                        <button id="previouspage">
                            <i class="fa-solid fa-arrow-left"></i>
                        </button><!--previous page-->
                        <div class="pagenumber">
                            <p id="pagenumbercount">1</p>
                        </div><!--page number-->
                        <button id="nextpage">
                            <i class="fa-solid fa-arrow-right"></i>
                        </button><!--next page-->
                    </div><!--pages-->
                    <div class="search">
                        <input id="searchinput" type="text">
                        <div class="icon">
                            <i id="searchicon" class="fa-solid fa-magnifying-glass"></i>
                        </div><!--icon-->
                    </div><!--search-->
                </section>
                </div><!--menu top content-->
                <table border="1" style="margin-bottom:10px; width: 100%; border-collapse: collapse;">
    <thead>
        <tr>
            <th id="none">Nº.</th>
            <th id="nomealuno">Nome</th>
            <th>Endereço</th>
            <th>Telefone</th>
            <th id="thactions">AÇÕES</th>
        </tr>
    </thead>
    <tbody id="tbodyalunoson">
        @forelse ($alunos as $aluno)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $aluno->pessoa->nome ?? 'Sem Nome' }}</td>
                <td>{{ $aluno->pessoa->endereco ?? 'Sem Endereço' }}</td>
                <td>{{ $aluno->pessoa->telefone ?? 'Não informado' }}</td>
                <td>
                <div class="boxbuttons">
                                <button class="ficha" title="VER FICHA">
                                <i id="btnacticon" class="fa-solid fa-eye"></i>
                                </button>
                                <button class="editar" title="EDITAR ALUNO">
                                    <i id="btnacticon" class="fa-solid fa-pen-to-square"></i>
                                </button>
                                
                                <button class="desativar" title="DESATIVAR ALUNO">
                                    <i id="btnacticon" class="fa-solid fa-circle-xmark"></i>
                                </button>
                            </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">Nenhum aluno encontrado. <a href="{{ route('alunos.criar') }}">Cadastrar aluno.</a></td>
            </tr>
        @endforelse
    </tbody>
</table>
        </div><!--list-->
        </section>
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
    <div id="overlay" class="overlay"></div>
    <script src="{{ asset('script/alunos.js') }}"> </script>
</body>
</html>