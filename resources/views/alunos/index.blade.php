@vite(['resources/js/alunos/index.js'])
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
</head>

<body>
    <div class="menu">
        <div id="linhamenu">
            <h4 id="appname">{{ config('app.generalname') }}</h4>
        </div><!--linha menu-->
        <div class="options">
            <div class="user"><i id="usericon" title="Adicionar foto de Perfil"></i>
                <div class="userinfo">
                    <p id="username">Olá, {{ $usuarioNome }} </p></i></u>
                    <p id="userjoin">Bom dia!</p>
                    <div id="contextMenu">
                        <div id="removePhoto">
                            <h4>Remover Foto</h4>
                        </div>
                    </div>
                </div><!--user info-->
            </div><!--user-->
            <a class="nostyle" href="{{ route('inicio.index') }}">
                <div class="opt" id="optInicioOFF">
                    <i data-opticon="true" id="opticon" class="fa-solid fa-house"></i>
                    <p id="optname">Início</p>
                </div>
            </a><!--optInicio-->
            <a class="nostyle" href="{{ route('inicio.index') }}">
                <div class="opt" id="optInicioNOFF">
                    <i data-opticon="true" id="opticon4" class="fa-solid fa-house"></i>
                    <p id="optname4">Início</p>
                </div>
            </a><!--optInicioN-->
            <a class="nostyle" href="{{ route('alunos.index') }}">
                <div class="opt" id="optAlunosON">
                    <i data-opticon="true" id="opticon1" class="fa-solid fa-users-line"></i>
                    <p id="optname">Alunos</p>
                </div>
            </a><!--optAlunos-->
            <a class="nostyle" href="{{ route('alunos.index') }}">
                <div class="opt" id="optAlunosNON">
                    <i data-opticon="true" id="opticon5" class="fa-solid fa-users-line"></i>
                    <p id="optname4">Alunos</p>
                </div>
            </a><!--optAlunosN-->
            <a class="nostyle" href="{{ route('pagamentos.index') }}">
                <div class="opt" id="optPagamentos">
                    <i data-opticon="true" id="opticon2"class="fa-solid fa-money-check-dollar"></i>
                    <p id="optname">Pagamentos</p>
                </div>
            </a><!--optPagamentos-->
            <a class="nostyle" href="{{ route('pagamentos.index') }}">
                <div class="opt" id="optPagamentosN">
                    <i data-opticon="true" id="opticon6"class="fa-solid fa-money-check-dollar"></i>
                    <p id="optname4">Pagamentos</p>
                </div>
            </a><!--optPagamentos-->
            <a class="nostyle" href="{{ route('usuarios.index') }}">
                <div class="opt" id="optUsuarios">
                    <i data-opticon="true" id="opticon3"class="fa-solid fa-users"></i>
                    <p id="optname">Usuários</p>
                </div>
            </a><!--optUsuarios-->
            <div class="opt" id="optConfig">
                <i id="opticon8" class="fa-solid fa-gear"></i>
                <p id="optname">Configurações</p>
            </div><!--optConfig-->

            <a class="nostyle" href="{{ route('usuarios.index') }}">
                <div class="opt" id="optUsuariosN">
                    <i data-opticon="true" id="opticon7"class="fa-solid fa-users"></i>
                    <p id="optname4">Usuários</p>
                </div>
            </a><!--optUsuariosN-->
            <div class="opt" id="optConfigN">
                <i id="opticon9" class="fa-solid fa-gear"></i>
                <p id="optname">Configurações</p>
            </div><!--optConfigN-->
        </div><!--options-->
        <a href="{{ route('logout') }}"><u id="useroutline">
                <h6 id="userout">Sair</h6>
            </u></a>

    </div><!--menu-->
    <header id="mainheader" data-status="ativos">
        <p id="pagetitle">Alunos - Ativos</p>
        <i id="nighttheme" title="Tema Escuro" class="fa-solid fa-moon"></i>
        <i title="Tema Claro" id="themeday" class="fa-solid fa-sun"></i>
    </header>
    <main>
        <section id="sectionconfig">
            <div class="linetop" id="linetopconfig">
                <h1 id="h1config">Configurações</h1>
            </div>
            <div class="optconfigs" id="optInicio"
                title="O Menu lateral se minimiza automaticamente para um melhor aproveitamento da tela. ativando essa opção o menu lateral passa a ter uma largura fixa mantendo as opções visíveis.">
                <i id="optconfigicon1on" class="fa-solid fa-toggle-on"></i> <i id="optconfigicon1"
                    class="fa-solid fa-toggle-off"></i>
                <p id="optconfigname">Minimizar menu automaticamente</p>
            </div><!--optInicio-->
        </section>
        <section id="maincontent">
            <div id="linetop" class="linetop">
                <h1 id="h1alert">ALUNOS</h1>
            </div>
            <div class="list">
                <div class="menutopcontent">
                    <section class="menutopleft">
                        <a class="a" href="{{ route('alunos.criar') }}"><button id="addaluno"
                                class="addaluno">
                                <i id="addalunoicon" class="fa-solid fa-user-plus"></i>
                                <h4 id="optmenutopname">Aluno</h4>
                            </button></a><!--add aluno-->
                        <button class="addaluno" id="refresh">
                            <i id="addalunoicon" class="fa-solid fa-rotate-left"></i>
                            <h4 id="optmenutopname">Atualizar</h4>
                        </button><!--refresh-->
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
                <table border="1"
                    style="margin-bottom:10px; margin-top:3px; width: 100%; border-collapse: collapse;">
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
                                        <button class="ficha" title="VER FICHA" data-id="{{ $aluno->id }}">
                                            <i id="btnacticon" class="fa-solid fa-eye"></i>
                                        </button>
                                        <button class="editar" title="EDITAR ALUNO" data-id="{{ $aluno->id }}">
                                            <i id="btnacticon" class="fa-solid fa-pen-to-square"></i>
                                        </button>

                                        <button class="desativar" title="DESATIVAR ALUNO"
                                            data-id="{{ $aluno->id }}">
                                            <i id="btnacticon" class="fa-solid fa-circle-xmark"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">Nenhum aluno encontrado. <a
                                        href="{{ route('alunos.criar') }}">Cadastrar aluno.</a></td>
                            </tr>
                        @endforelse
                    </tbody>

                    <tbody id="tbodyalunosoff">
                        @forelse ($alunosoff as $alunooff)
                            <tr>

                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $alunooff->pessoa->nome ?? 'Sem dados' }}</td>
                                <td>{{ $alunooff->pessoa->endereco ?? 'Sem dados' }}</td>
                                <td>{{ $alunooff->pessoa->telefone ?? 'Sem dados' }}</td>
                                <td>
                                    <div class="boxbuttons">
                                        <button class="ficha" data-id="{{ $alunooff->id }}" title="VER FICHA">
                                            <i id="btnacticon" class="fa-solid fa-eye"></i>
                                        </button>
                                        <button class="editar" title="EDITAR ALUNO">
                                            <i id="btnacticon" class="fa-solid fa-pen-to-square"></i>
                                        </button>

                                        <button class="ativar" title="ATIVAR ALUNO" data-id="{{ $alunooff->id }}">
                                            <i id="btnacticon" class="fa-solid fa-user-check"></i>
                                        </button>
                                        <button class="apagar" title="EXCLUIR ALUNO" data-id="{{ $alunooff->id }}">
                                            <i id="btnacticon" class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">Nenhum aluno encontrado. <a
                                        href="{{ route('alunos.criar') }}">Cadastrar aluno.</a></td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>

            </div><!--list-->
        </section>
    </main>
    <footer>
        <a href="https://www.instagram.com/retironotefix/" id="copy">&copy; 2025 Carlos Eduardo, Academy-System
            v3.0.0</a>
    </footer>
    <div id="popup" class="popup">
        <div class="popup-content">
            <p></p>
            <div class="boxbtn">
                <button id="confirmar">Sim</button>
                <button id="confirmarativar">Sim</button>
                <button id="confirmarapagar">Sim</button>

                <button id="fechar">Cancelar</button>
            </div>
        </div>
    </div>
    <div id="popupficha" class="popupficha">
        <div class="conteudo-ficha">
            <div class="form-titulo" id="titulopopup">
                <h4 id="nomealunoficha">VISUALIZAR ALUNO:</h4>
                <div class="btnamnese">
                    <button class="addaluno" id="save" onclick="fecharAnamnese()">
                        <i class="fa-solid fa-floppy-disk"></i>
                        Salvar
                    </button>
                    <button class="addaluno" id="close" onclick="fecharAnamnese()">
                        <i class="fa-solid fa-xmark"></i>Fechar</button>
                </div>
            </div>
            <div class="conteudo-anamnese" id="conteudoficha">
                <div class="ladoesquerdoform">
                    <div class="form-titulo">
                        <h1 id="h1tituloinfo">INFOMAÇÕES PESSOAIS</h1>
                    </div>
                    <div class="form-group">
                        <label for="nome">NOME COMPLETO:</label>
                        <input type="text" id="nome" name="nome" required maxlenght="255"
                            placeholder="Nome completo" readonly>
                    </div>
                    <div class="compact">
                        <div class="form-group" id="inputdata">
                            <label for="data_nascimento">DATA DE NASCIMENTO:</label>
                            <input type="date" id="data_nascimento" name="data_nascimento" maxlength="10"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="idade">IDADE:</label>
                            <input type="text" id="idade" name="idade" placeholder="Idade" readonly>
                        </div>
                    </div><!--compact-->
                    <div class="compact">
                        <div class="form-group">
                            <label for="cpf">CPF:</label>
                            <input type="text" id="cpf" name="cpf" maxlength="14"
                                placeholder="000.000.000-00" readonly>
                        </div>
                        <div class="form-group">
                            <label for="rg">RG:</label>
                            <input type="text"id="rg" name="rg" placeholder="00.000.000-00" maxlength="13"
                                pattern="\d{2}\.\d{3}\.\d{3}-[\d{2}]" readonly>
                        </div>
                    </div><!--compact-->
                    <div class="compact">
                        <div class="form-group">
                            <label for="telefone">TELEFONE:</label>
                            <input class="smallinput" type="tel" id="telefone" name="telefone" maxlength="15"
                                placeholder="(00) 00000-0000" readonly>
                        </div>
                        <div class="form-group">
                            <label for="telefone_familia">TELEFONE FAMILIAR:</label>
                            <input type="tel" id="telefone_familia" maxlength="15" name="telefone_familia"
                                placeholder="(00) 00000-0000" readonly>
                        </div>
                    </div><!--compact-->
                    <div class="form-group">
                        <label for="email">EMAIL:</label>
                        <input type="email" id="email" name="email" placeholder="email@email.com" readonly>
                    </div>
                    <br><br><br><br>
                    <div class="form-titulo">
                        <h5>HISTÓRICO DE SAÚDE</h5>
                    </div>
                    <div class="compact">
                        <div class="form-group">
                            <label for="cirurgia">QUAL CIRURGIA JÁ FEZ:</label>
                            <input type="text" id="cirurgia" name="cirurgia" placeholder="Descreva a cirurgia"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="dorme_bem">QUANTAS HORAS DE SONO:</label>
                            <input type="text" id="dorme_bem" name="dorme_bem"
                                placeholder="Quantidade de horas de sono" readonly>
                        </div>
                    </div><!--compact-->
                    <div class="compact">
                        <div class="form-group">
                            <label for="lesao_detalhes">LESÃO ARTICULAR:</label>
                            <input type="text" id="lesao_detalhes_input2" readonly name="lesao_detalhes"
                                placeholder="Descreva a lesão">
                        </div>
                        <div class="form-group">
                            <label for="coluna_detalhes">PROBLEMA DE COLUNA:</label>
                            <input type="text" id="coluna_detalhes_input2" readonly name="coluna_detalhes"
                                placeholder="Descreva o problema">

                        </div>
                    </div><!--compact-->
                    <div class="form-group">
                        <label for="tempo_sem_medico">ÚLTIMA VEZ QUE FOI AO MÉDICO:</label>
                        <input type="text" id="tempo_sem_medico" readonly name="tempo_sem_medico"
                            placeholder="Ex: 6 meses, 1 ano">
                    </div>
                    <div class="form-group">
                        <label for="uso_medicamento">USA QUAL MEDICAMENTO:</label>
                        <input type="text" id="uso_medicamento" readonly name="uso_medicamento"
                            placeholder="Medicamento usado">
                    </div>

                    <div class="form-group">
                        <label for="problema_saude">TEM QUAL PROBLEMA DE SAÚDE</label>
                        <input type="text" id="problema_saude" readonly name="problema_saude"
                            placeholder="Descreva o problema de saúde">
                    </div>
                    <div class="compact">
                        <div class="form-group" id="infartoS">
                            <label for="varizes">TEM VARIZES:</label>
                            <input type="text" class="smallinput" readonly id="varizes" name="varizes">
                        </div>
                        <div class="form-group">
                            <label for="infarto">INFARTO:</label>
                            <input type="text "id="infarto" readonly name="infarto">
                        </div>
                    </div><!--compact-->
                    <div class="compact">
                        <div class="form-group">
                            <label for="doenca_detalhes">DOENÇA CARDÍACA:</label>
                            <input type="text" id="doenca_detalhes_input2" readonly name="doenca_detalhes"
                                placeholder="Descreva a doença">

                        </div>
                        <div class="form-group">
                            <label for="derrame">DERRAME:</label>
                            <input type="text" id="derrame" readonly name="derrame">
                        </div>
                    </div>
                    <div class="compact">
                        <div class="form-group">
                            <label for="diabetes">DIABETES:</label>
                            <input type="text" class="smallinput" id="diabetes" readonly name="diabetes">
                        </div>
                        <div class="form-group">
                            <label for="obesidade">OBESIDADE:</label>
                            <input type="text" id="obesidade" readonly name="obesidade">
                        </div>
                    </div><!--compact-->
                    <div class="form-group">
                        <label for="colesterol_elevado">COLESTEROL ALTO:</label>
                        <input type="text" id="colesterol_elevado" readonly name="colesterol_elevado">

                    </div>
                    <h2 id="titulo-parq">QUESTIONÁRIO PAR-Q</h2>
                    <table id="tabela-parq">
                        <tr id="cabecalho-tabela">
                            <th id="sim-header">SIM</th>
                            <th id="nao-header">NÃO</th>
                            <th id="questao-header">QUESTÕES</th>
                        </tr>
                        <tr id="linha-1">
                            <td class="sim" id="sim1"><label id="label-sim1"><input type="radio"
                                        name="par_q1" id="input-sim1"></label></td>
                            <td class="nao" id="nao1"><label id="label-nao1"><input type="radio"
                                        name="par_q1" id="input-nao1"></label></td>
                            <td class="questao" id="questao1">1- Seu médico alguma vez disse que você tem problema no
                                coração e que deve apenas praticar atividades físicas recomendadas por médico?</td>
                        </tr>
                        <tr id="linha-2">
                            <td class="sim" id="sim2"><label id="label-sim2"><input type="radio"
                                        name="par_q2" id="input-sim2"></label></td>
                            <td class="nao" id="nao2"><label id="label-nao2"><input type="radio"
                                        name="par_q2" id="input-nao2"></label></td>
                            <td class="questao" id="questao2">2- Você sente dor no peito quanto pratica atividade
                                física?</td>
                        </tr>
                        <tr id="linha-3">
                            <td class="sim" id="sim3"><label id="label-sim3"><input type="radio"
                                        name="par_q3" id="input-sim3"></label></td>
                            <td class="nao" id="nao3"><label id="label-nao3"><input type="radio"
                                        name="par_q3" id="input-nao3"></label></td>
                            <td class="questao" id="questao3">3- No mês passado, você teve dor no peito quanto não
                                estava praticando atividade física?</td>
                        </tr>
                        <tr id="linha-4">
                            <td class="sim" id="sim4"><label id="label-sim4"><input type="radio"
                                        name="par_q4" id="input-sim4"></label></td>
                            <td class="nao" id="nao4"><label id="label-nao4"><input type="radio"
                                        name="par_q4" id="input-nao4"></label></td>
                            <td class="questao" id="questao4">4- Você perde o equilíbrio devido a tonturas ou alguma
                                vez perdeu a consciência?</td>
                        </tr>
                        <tr id="linha-5">
                            <td class="sim" id="sim5"><label id="label-sim5"><input type="radio"
                                        name="par_q5" id="input-sim5"></label></td>
                            <td class="nao" id="nao5"><label id="label-nao5"><input type="radio"
                                        name="par_q5" id="input-nao5"></label></td>
                            <td class="questao" id="questao5">5- Você tem problema ósseo ou articular que poderia
                                ficar pior por alguma mudança em sua atividade física?</td>
                        </tr>
                        <tr id="linha-6">
                            <td class="sim" id="sim6"><label id="label-sim6"><input type="radio"
                                        name="par_q6" id="input-sim6"></label></td>
                            <td class="nao" id="nao6"><label id="label-nao6"><input type="radio"
                                        name="par_q6" id="input-nao6"></label></td>
                            <td class="questao" id="questao6">6- Seu médico está atualmente receitando algum remédio
                                (por exemplo, diuréticos) para pressão arterial ou problema cardíaco?</td>
                        </tr>
                        <tr id="linha-7">
                            <td class="sim" id="sim7"><label id="label-sim7"><input type="radio"
                                        name="par_q7" id="input-sim7"></label></td>
                            <td class="nao" id="nao7"><label id="label-nao7"><input type="radio"
                                        name="par_q7" id="input-nao7"></label></td>
                            <td class="questao" id="questao7">7- Você sabe de qualquer outra razão pela qual não deva
                                praticar atividade física?</td>
                        </tr>
                    </table>

                </div><!--ladoesquerdoform-->
                <div class="ladodireitoform">
                    <div class="form-titulo">
                        <h1>ENDEREÇO</h1>
                    </div>
                    <div class="compact">
                        <div class="form-group">
                            <label for="endereco[rua]">RUA:</label>
                            <input type="text" id="rua" name="endereco[rua]" placeholder="Digite sua rua"
                                value="" readonly>
                        </div>
                        <div class="form-group">
                            <label for="endereco[numero]">Nº:</label>
                            <input type="text" id="numero" name="endereco[numero]"
                                placeholder="Número da residência" value="" readonly>
                        </div>


                    </div><!--compact-->
                    <div class="compact">
                        <div class="form-group">
                            <label for="endereco[complemento]">COMPLEMENTO:</label>
                            <input type="text" id="complemento" name="endereco[complemento]"
                                placeholder="Apartamento, bloco, sala (opcional)" value="" readonly>
                        </div>
                        <div class="form-group">
                            <label for="endereco[bairro]">BAIRRO:</label>
                            <input type="text" id="bairro" name="endereco[bairro]"
                                placeholder="Digite seu bairro" value="" readonly>
                        </div>

                    </div><!--compact-->
                    <div class="compact">
                        <div class="form-group">
                            <label for="endereco[cidade]">CIDADE:</label>
                            <input type="text" id="cidade" name="endereco[cidade]"
                                placeholder="Digite sua cidade" value="" readonly>
                        </div>
                        <div class="form-group">
                            <label for="endereco[cep]">CEP:</label>
                            <input type="text" id="cep" name="endereco[cep]" placeholder="00000-000"
                                value="" maxlength="9" readonly>
                        </div>

                    </div><!--compact-->
                    <div class="form-titulo">
                        <h1>PAGAMENTO</h1>
                    </div>
                    <div class="form-group">
                        <label for="valor">VALOR:</label>
                        <input type="text" id="valor" name="valor" placeholder="R$0,00" maxlength="100"
                            required readonly>
                    </div>
                    <div class="compact">

                        <div class="form-group">
                            <label for="data_pagamento">DATA DE PAGAMENTO:</label>
                            <input type="date" id="data_pagamento" name="data_pagamento" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="plano">Plano:</label>
                            <input id="plano" name="plano" required value="" readonly>
                        </div>
                    </div><!--compact-->
                    <br><br>
                    <div class="form-titulo">
                        <h4 id="h5form">HISTÓRICO E OBJETIVO NA ACADEMIA</h4>
                    </div>
                    <div class="form-group">
                        <label for="modalidade_anterior">QUE MODALIDADE JÁ FEZ:</label>
                        <input type="text" readonly id="modalidade_anterior" name="modalidade_anterior"
                            placeholder="Descreva quais modalidades já realizou">
                    </div>
                    <div class="form-group">
                        <label for="modalidade_atual">QUE MODALIDADE PRATICA ATUALMENTE:</label>
                        <input type="text" id="modalidade_atual" readonly name="modalidade_atual"
                            placeholder="Descreva qual modalidade realiza atualmente">
                    </div>
                    <div class="form-group">
                        <label for="objetivo_atividade_fisica">QUAL O SEU OBJETIVO:</label>
                        <input type="text" id="objetivo_atividade_fisica" readonly
                            name="objetivo_atividade_fisica"
                            placeholder="Descreva qual seu objetivo com a atividade física">
                    </div>
                    <div class="form-group">
                        <label for="como_soube_da_academia">COMO SOUBE DA ACADEMIA:</label>
                        <input type="text" id="como_soube_da_academia" readonly name="como_soube_da_academia"
                            placeholder="Como conheceu nossa academia?">
                    </div>
                    <div class="form-titulo">
                        <h5>DADOS ANTROPOMÉTRICOS E DE SAÚDE</h5>
                    </div>
                    <div class="compact">
                        <div class="form-group">
                            <label for="peso">PESO:</label>
                            <input type="text" id="peso" name="peso" readonly placeholder="Peso">
                        </div>
                        <div class="form-group">
                            <label for="tipo_sanguineo">TIPO SANGUÍNEO:</label>
                            <input type="text" id="tipo_sanguineo" readonly name="tipo_sanguineo">
                        </div>
                        <div class="form-group">
                            <label id="labe" for="pressao_arterial">PRESSÃO:</label>
                            <input type="text" id="pressao_arterial" readonly name="pressao_arterial">
                        </div>
                    </div><!--compact-->
                    <div class="form-titulo">
                        <h5>ESTILO DE VIDA</h5>
                    </div>
                    <div class="compact">
                        <div class="form-group">
                            <label for="fuma">FUMA:</label>
                            <input type="text" class="smallinput" id="fumar" readonly name="fuma">
                        </div>
                        <div class="form-group">
                            <label for="faz_dieta">FAZ DIETA:</label>
                            <input id="faz_dieta" readonly name="faz_dieta">
                        </div>
                    </div><!--compact-->
                    <div class="compact">
                        <div class="form-group">
                            <label for="usa_bebida_alcoolica">CONSOME ÁLCOOL:</label>
                            <input id="bebida_alcoolica" readonly name="usa_bebida_alcoolica">
                        </div>
                        <div class="form-group">
                            <label for="sedentario">SEDENTÁRIO:</label>
                            <input id="sedentario" readonly name="sedentario">
                        </div>
                    </div><!--compact-->
                    <div class="form-titulo" id="titulomedida">
                        <h4 id="titilo-parq">MEDIDAS ANTROPOMÉTRICAS</h4>
                    </div>
                    <table id="tabela-medidas">
                        <tr id="linha-altura">
                            <th id="th-torax">ALTURA:</th>
                            <td class="input-coluna" id="td-altura"><input id="input-altura" type="text"
                                    name="medida[altura]" readonly placeholder="Metros"></td>
                        </tr>
                        <tr id="linha-torax">
                            <th id="th-torax">TÓRAX:</th>
                            <td class="input-coluna" id="td-torax"><input id="input-torax" type="text"
                                    name="medida[torax]" readonly placeholder="Centímetros"></td>
                        </tr>
                        <tr id="linha-cintura">
                            <th id="th-cintura">CINTURA:</th>
                            <td class="input-coluna" id="td-cintura"><input id="input-cintura" type="text"
                                    name="medida[cintura]" readonly placeholder="Centímetros"></td>
                        </tr>
                        <tr id="linha-abdome">
                            <th id="th-abdome">ABDOME:</th>
                            <td class="input-coluna" id="td-abdome"><input id="input-abdome" type="text"
                                    name="medida[abdome]" readonly placeholder="Centímetros"></td>
                        </tr>
                        <tr id="linha-quadril">
                            <th id="th-quadril">QUADRIL:</th>
                            <td class="input-coluna" id="td-quadril"><input id="input-quadril" type="text"
                                    name="medida[quadril]" readonly placeholder="Centímetros"></td>
                        </tr>
                        <tr id="linha-bracos">
                            <th id="th-bracos">BRAÇOS (direito e esquerdo):</th>
                            <td class="input-coluna" id="td-bracos"><input id="input-bracos" type="text"
                                    name="medida[bracos]" readonly placeholder="Centímetros"></td>
                        </tr>
                        <tr id="linha-antebracos">
                            <th id="th-antebracos">ANTEBRAÇOS (direito e esquerdo):</th>
                            <td class="input-coluna" id="td-antebracos"><input id="input-antebracos" type="text"
                                    name="medida[antebracos]" readonly placeholder="Centímetros"></td>
                        </tr>
                        <tr id="linha-pernas">
                            <th id="th-pernas">PERNA (direita e esquerda):</th>
                            <td class="input-coluna" id="td-pernas"><input id="input-pernas" type="text"
                                    name="medida[pernas]" readonly placeholder="Centímetros"></td>
                        </tr>
                        <tr id="linha-panturrilha">
                            <th id="th-panturrilha">PANTURRILHA (direita e esquerda):</th>
                            <td class="input-coluna" id="td-panturrilha"><input id="input-panturrilha"
                                    type="text" readonly name="medida[panturrilha]" placeholder="Centímetros">
                            </td>
                        </tr>
                        <tr id="linha-observacoes">
                            <th id="th-observacoes">OBSERVAÇÕES:</th>
                            <td class="input-coluna" id="td-observacoes"><input id="input-observacoes"
                                    type="text" readonly name="medida[obs]" placeholder="Observações"></td>
                        </tr>
                    </table>
                </div><!--ladodireitoform-->
            </div>
        </div>
    </div>
    </div>
    <div id="popup" class="popup">
        <p></p>
    </div>
    <div id="popupeditar" class="popupficha">

    </div>
    <div id="overlay" class="overlay"></div>
</body>

</html>
