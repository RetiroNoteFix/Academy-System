@vite(['resources/js/inicio/index.js'])
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
</head>
<body id="body">

<div class="menu">
        <div id="linhamenu">
            <h4 id="appname">{{config('app.generalname')}}</h4>
        </div><!--linha menu-->
        <div class="options">
       <div class="user"><i id="usericon"  title="Adicionar foto de Perfil"></i><div class="userinfo"><p id="username">Olá, {{ $usuarioNome }}</p></i></u><p id="userjoin">Bom dia!</p>
        <div id="contextMenu">
    <div id="removePhoto"><h4>Remover Foto</h4></div>
  </div>
    </div><!--user info-->
        </div><!--user-->
        <a class="nostyle" href="{{route('inicio.index')}}"><div class="opt" id="optInicio">
            <i data-opticon="true" id="opticon" class="fa-solid fa-house"></i> <p id="optname">Início</p>
        </div></a><!--optInicio-->
        <a class="nostyle" href="{{route('inicio.index')}}"><div class="opt" id="optInicioN">
            <i data-opticon="true" id="opticon4" class="fa-solid fa-house"></i> <p id="optname4">Início</p>
        </div></a><!--optInicioN-->
        <a class="nostyle" href="{{route('alunos.index')}}"><div class="opt" id="optAlunos">
            <i  data-opticon="true" id="opticon1" class="fa-solid fa-users-line"></i> <p id="optname">Alunos</p>
        </div></a><!--optAlunos-->
        <a class="nostyle" href="{{route('alunos.index')}}"><div class="opt" id="optAlunosN">
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
    <header id="mainheader">
        <p id="pagetitle">Início - Página Incial</p> <i id="nighttheme" title="Tema Escuro" class="fa-solid fa-moon"></i> <i title="Tema Claro" id="themeday" class="fa-solid fa-sun"></i>
    </header>
    <main>
        <section id="sectionconfig">
            <div class="linetop" id="linetopconfig"><h1 id="h1config">Configurações</h1></div>
            <div class="optconfigs" id="optInicio" title="O Menu lateral se minimiza automaticamente para um melhor aproveitamento da tela. ativando essa opção o menu lateral passa a ter uma largura fixa mantendo as opções visíveis.">
                <i id="optconfigicon1on" class="fa-solid fa-toggle-on"></i>  <i id="optconfigicon1" class="fa-solid fa-toggle-off"></i> <p id="optconfigname">Minimizar menu automaticamente</p>
            </div><!--optInicio-->
            <div class="optconfigs" id="optCobranca" title="Definir a mensagem de cobrança do aluno quando ele aparecer nas notificações">
                <i  id="optconfigicon" class="fa-solid fa-pen-to-square"></i> <p id="optconfigname">Definir mensagem de cobrança</p>
            </div><!--optInicio-->
        </section>
        <section id="maincontent">
            <div id="linetop" class="linetop"><h1 id="h1alert">NOTIFICAÇÕES</h1></div>
            <div class="list">
                <div class="menutopcontent">
                    <div class="pages" id="pages"><p id="pag">Pág:</p><button id="previouspage"><i class="fa-solid fa-arrow-left"></i></button><div class="pagenumber"><p id="pagenumbercount">1</p></div><button id="nextpage"><i class="fa-solid fa-arrow-right"></i></button></div>
                    <div class="search" id="search"><input id="searchinput" type="text"><div class="icon"><i id="searchicon" class="fa-solid fa-magnifying-glass"></i></div></div>
                </div><!--menu top content-->
                <table border="1" style="margin-bottom:10px;">
                <thead>
                    <tr>
                    <th id="none">Nº.</th>
                    <th id="nomealuno">Nome</th>
                    <th>Endereço</th>
                    <th>Telefone</th>
                    <th>Data de Vencimento</th>
                    <th>SITUAÇÃO</th>
                    <th>AÇÕES</th>
                    </tr>
                </thead>
                <tbody id="tbodyalunoson">
    @forelse ($pagamentos as $pagamento)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $pagamento->aluno->pessoa->nome ?? 'Sem Dados' }}</td>
            <td>{{ $pagamento->aluno->pessoa->endereco ?? 'Sem Dados' }}</td>
            <td>{{ $pagamento->aluno->pessoa->telefone ?? 'Sem Dados' }}</td>
            <td>{{ \Carbon\Carbon::parse($pagamento->data_vencimento)->format('d/m/Y') ?? 'Sem Dados' }}</td>
            <td><h4 class="pendente">{{$pendente ?? 'Sem Dados' }}</h4></td>
            <td>
                <div class="boxbuttons">
                    <button class="ficha" title="ATUALIZAR PAGAMENTO" data-id="{{ $pagamento->id_aluno ?? 'N/A' }}" data-idpgt="{{ $pagamento->id ?? 'N/A' }}">
                    <i id="btnacticon" class="fa-solid fa-circle-check"></i>
                    </button>
                    <button class="msg" title="ENVIAR MENSAGEM"  data-vencimento="{{$pagamento->data_vencimento}}"data-valor="{{$pagamento->valor}}" data-nomealuno="{{$pagamento->aluno->pessoa->nome}}" data-telefone="{{ $pagamento->aluno->pessoa->telefone ?? 'N/A' }}">
                    <i id="btnacticon" class="fa-solid fa-comment"></i>
                    </button>
                    <button class="desativar" title="IGNORAR COBRANÇA" data-id="{{ $pagamento->id_aluno ?? 'N/A' }}">
                        <i id="btnacticon" class="fa-solid fa-circle-xmark"></i>
                    </button>
                </div>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="7">Nenhum pagamento pendente encontrado.</td>
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
            <h4 id="h4confimar">Tem certeza?</h4>
            <div class="boxbtn">
            <button id="confirmarpagar">Sim</button>
            <button id="fecharpagar">Não</button>
            <button id="fechar" style="display: none;" >Cancelar</button>
            </div>
        </div>
    </div>
    <div id="popupficha" class="popupficha">
        <div class="conteudoficha2" id="conteudofichapgt">
        <div class="form-titulo" id="titulopopup">
                <h4 id="h4titulopgt">NOTIFICAÇÃO DE COBRANÇA</h4>  <div class="btnamnese">
                        <button class="addaluno" id="close"  onclick="fecharAnamnese()">
                            Fechar</button>
                        </div>
            </div>
            <div class="conteudo-anamnese" id='conteudo-anamnese2'>
            <h4 id="loading">CARREGANDO...</h4>
    </div>
</div>
</div>
<div id="popupconfig" class="popup">
        <div class="popup-content">
            <h2 id="h4confimar">NOVA MENSAGEM</h2>
            <h5 id="h4confimar2">${nomealuno} é o nome do aluno. <br> ${datavencimento} é a data de vencimento do pagamento. <br> ${valor} é o valor da cobrança.</h5>
            <div class="boxmsgcobranca">
           <textarea name="" id="msgcobranca" cols="50" rows="10">Olá ${nomealuno}! Esperamos que esteja tudo bem com você. Verificamos que a sua mensalidade com vencimento em ${datavencimento}, e valor de ${valor} ainda está pendente. Caso já tenha feito o pagamento, por favor, desconsidere esta mensagem. Qualquer dúvida, estamos à disposição!</textarea>
</div>
<div class="boxbtn">
           <button class="save" id="savemsg">Salvar</button>
           <button class="msg" id="resetmmsg">Resetar</button>
           <button class="fechar" id="fecharcobranca">Cancelar</button>
            </div>
        </div>
    </div>
    <div id="overlay" class="overlay"></div>
</body>
</html>