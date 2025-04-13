@vite(['resources/js/alunos/criar.js'])
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
        <div class="user"><i id="usericon"  title="Adicionar foto de Perfil"></i><div class="userinfo"><p id="username">Olá, SUPORTE </p></i></u><p id="userjoin">Bom dia!</p>
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
            <div id="linetop" class="linetop"><h1 id="h1alert">ADICIONAR ALUNO</h1></div>
           <section id="formaddalunos">
            <form action="{{ route('alunos.cadastrar')}}" method="post">
            @csrf
            @if ($errors->any())
    <div id="popuplogin" class="popup show">
        <div class="closepop" onclick="closePopup()"></div>
        <p id="popup-messagelogin">{{ $errors->first() }}</p>
    </div>
@endif
            <div class="boxform">
            <div class="ladoesquerdoform">
                <div class="form-titulo">
                    <h1 id="h1tituloinfo">INFOMAÇÕES PESSOAIS</h1>
                </div>
                <div class="form-group">
                    <label for="nome">NOME COMPLETO:</label>
                    <input type="text" id="nome" name="nome" required maxlenght="255" placeholder="Nome completo">
                </div>
                <div class="compact">
                <div class="form-group" id="inputdata">
                    <label for="data_nascimento">DATA DE NASCIMENTO:</label>
                    <input type="date" id="data_nascimento" name="data_nascimento" maxlength="10" >
                </div>
                <div class="form-group">
                    <label for="idade">IDADE:</label>
                    <input type="text" id="idade" name="idade" placeholder="Idade" >
                </div>
            </div><!--compact-->
            <div class="compact">
                <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <input type="text" id="cpf" name="cpf" maxlength="14" placeholder="000.000.000-00" >
                </div>
                <div class="form-group">
                    <label for="rg">RG:</label>
                    <input type="text"id="rg" name="rg" placeholder="00.000.000-00"  maxlength="13" pattern="\d{2}\.\d{3}\.\d{3}-[\d{2}]" >
                </div>
            </div><!--compact-->
            <div class="compact">
                <div class="form-group">
                    <label for="telefone">TELEFONE:</label>
                    <input class="smallinput"  type="tel" id="telefone" name="telefone" maxlength="15" placeholder="(00) 00000-0000" >
                </div>
                <div class="form-group">
                    <label for="telefone_familia">TELEFONE FAMILIAR:</label>
                    <input type="tel" id="telefone_familia"  maxlength="15" name="telefone_familia" placeholder="(00) 00000-0000" >
                </div>
            </div><!--compact-->
                <div class="form-group">
                    <label for="email">EMAIL:</label>
                    <input type="email" id="email" name="email" placeholder="email@email.com" >
                </div>
           
            </div><!--ladoesquerdoform-->
           <div class="ladodireitoform">
            <div class="form-titulo">
                <h1>ENDEREÇO</h1>
            </div>
            <div class="compact">
                <div class="form-group">
                    <label for="cep">CEP:</label>
                    <input type="text" id="cep" name="cep" placeholder="00000-000" maxlength="9">
                </div>
                <div class="form-group">
                    <label for="estado">ESTADO:</label>
                    <select id="estado" name="estado" >
                        <option value="">Selecione seu estado</option>
                        <option value="AC">Acre (AC)</option>
                        <option value="AL">Alagoas (AL)</option>
                        <option value="AP">Amapá (AP)</option>
                        <option value="AM">Amazonas (AM)</option>
                        <option value="BA" selected >Bahia (BA)</option>
                        <option value="CE">Ceará (CE)</option>
                        <option value="DF">Distrito Federal (DF)</option>
                        <option value="ES">Espírito Santo (ES)</option>
                        <option value="GO">Goiás (GO)</option>
                        <option value="MA">Maranhão (MA)</option>
                        <option value="MT">Mato Grosso (MT)</option>
                        <option value="MS">Mato Grosso do Sul (MS)</option>
                        <option value="MG">Minas Gerais (MG)</option>
                        <option value="PA">Pará (PA)</option>
                        <option value="PB">Paraíba (PB)</option>
                        <option value="PR">Paraná (PR)</option>
                        <option value="PE">Pernambuco (PE)</option>
                        <option value="PI">Piauí (PI)</option>
                        <option value="RJ">Rio de Janeiro (RJ)</option>
                        <option value="RN">Rio Grande do Norte (RN)</option>
                        <option value="RS">Rio Grande do Sul (RS)</option>
                        <option value="RO">Rondônia (RO)</option>
                        <option value="RR">Roraima (RR)</option>
                        <option value="SC">Santa Catarina (SC)</option>
                        <option value="SP">São Paulo (SP)</option>
                        <option value="SE">Sergipe (SE)</option>
                        <option value="TO">Tocantins (TO)</option>
                    </select>
                </div>
            </div><!--compact-->
            <div class="compact">
                <div class="form-group">
                    <label for="rua">RUA:</label>
                    <input type="text" id="rua" name="rua" placeholder="Digite sua rua">
                </div>
                <div class="form-group">
                    <label for="bairro">BAIRRO:</label>
                    <input type="text" id="bairro" name="bairro" placeholder="Digite seu bairro" >
                </div>
                <div class="form-group">
                    <label for="cidade">CIDADE:</label>
                    <input type="text" id="cidade" name="cidade" placeholder="Digite sua cidade" value="RETIROLÂNDIA-BA" >
                </div>
            </div><!--compact-->
            <div class="compact">
                <div class="form-group">
                    <label for="numero">Nº:</label>
                    <input type="text" id="numero" name="numero" placeholder="Número da residência" >
                </div>
                <div class="form-group">
                    <label for="complemento">COMPLEMENTO:</label>
                    <input type="text" id="complemento" name="complemento" placeholder="Apartamento, bloco, sala (opcional)">
                </div>
            </div><!--compact-->
            <div class="form-titulo">
                <h1>PAGAMENTO</h1>
            </div>
            <div class="form-group">
                <label for="valor">VALOR:</label>
                <input type="text" id="valor" name="valor" placeholder="R$0,00" maxlength="10" required>
            </div>
            <div class="compact">
            
            <div class="form-group">
                <label for="dataPagamento">DATA DE PAGAMENTO:</label>
                <input type="date" id="dataPagamento" name="dataPagamento" required>
            </div>
            <div class="form-group">
                <label for="plano">Plano:</label>
                <select id="plano" name="plano" required>
                    <option value="">Selecione</option>
                    <option value="Mensal">Mensal</option>
                    <option value="Semestral">Semestral</option>
                    <option value="Anual">Anual</option>
                </select>
            </div>
            </div><!--compact-->
            <div class="btnadc">
                <button class="addaluno" type="submit" id="btncadastraraluno">
                    <i id="cadastraralunoicon" class="fa-solid fa-user-plus"></i>
                    <h5 id="btnname">Cadastrar Aluno</h5>
                </button><!--addaluno-->
                <button class="addaluno" id="anamnesebtn">
                    <i id="cadastraralunoicon" class="fa-solid fa-clipboard"></i>
                    <h5 id="btnname">Anamnese</h5>
                </button><!--voltar-->
                <button class="addaluno" id="btnback">
                    <i id="cadastraralunoicon" class="fa-solid fa-rotate-left"></i>
                    <h5 id="btnname" >Voltar</h5>
                </button><!--voltar-->
               </div>
           </div><!--ladodireitoform-->
        
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
    <div id="popupanamnese" class="popup">
        
        <div class="form-titulo" id="titulopopup">
            <h4>FICHA ANAMNESE</h4>  <div class="btnamnese">
                <button  class="addaluno" id="save"  onclick="fecharAnamnese()">
                    <i class="fa-solid fa-floppy-disk"></i>
                     Salvar
                    </button>
                    <button class="addaluno" id="close"  onclick="fecharAnamnese()">
                        <i class="fa-solid fa-xmark"></i>Fechar</button>
                    </div>
        </div>
        <div class="conteudo-anamnese">
<div class="ladoesquerdoform">

        <div class="form-titulo">
            <h5>HISTÓRICO DE SAÚDE</h5>
        </div>
        <div class="compact">
        <div class="form-group">
            <label for="cirurgia">QUAL CIRURGIA JÁ FEZ:</label>
            <input type="text" id="cirurgia" name="cirurgia" placeholder="Descreva a cirurgia" >
        </div>
        <div class="form-group">
            <label for="dorme_bem">QUANTAS HORAS DE SONO:</label>
            <input type="number" id="dorme_bem" name="dorme_bem" placeholder="Quantidade de horas de sono" >
        </div>
    </div><!--compact-->
    <div class="compact">
        <div class="form-group">
            <label for="lesao_articular">LESÃO ARTICULAR:</label>
            <select class="smallinput" id="lesao_articular" name="lesao_articular" onchange="toggleLesaoInput(this)" >
            <option value="" disabled selected>Selecione</option>
            <option value="Sim - ">Sim</option>
            <option value="Não">Não</option>
            </select>
            <div id="lesao_detalhes" style="display: none; margin-top: 10px;">
      <label for="lesao_detalhes_input">DESCREVA:</label>
      <input type="text" id="lesao_detalhes_input" name="lesao_detalhes" placeholder="Descreva a lesão">
    </div>
        </div>
        <div class="form-group">
            <label for="problema_coluna">PROBLEMA DE COLUNA:</label>
            <select id="problema_coluna" name="problema_coluna" onchange="togglecolunaInput(this)">
            <option value="">Selecione</option>
            <option value="Sim - ">Sim</option>
            <option value="Não">Não</option>
            </select>
            <div id="coluna_detalhes" style="display: none; margin-top: 8px;">
      <label for="coluna_detalhes_input">DESCREVA:</label>
      <input type="text" id="coluna_detalhes_input" name="coluna_detalhes" placeholder="Descreva o problema">
    </div>
        </div>
    </div><!--compact-->
    <div class="form-group">
        <label for="tempo_sem_medico">ÚLTIMA VEZ QUE FOI AO MÉDICO:</label>
        <input type="text" id="tempo_sem_medico" name="tempo_sem_medico" placeholder="Ex: 6 meses, 1 ano" >
    </div>
    <div class="form-group">
        <label for="uso_medicamento">USA QUAL MEDICAMENTO:</label>
        <input type="text" id="uso_medicamento" name="uso_medicamento" placeholder="Medicamento usado">
    </div>

    <div class="form-group">
        <label for="problema_saude">TEM QUAL PROBLEMA DE SAÚDE</label>
        <input type="text" id="problema_saude" name="problema_saude" placeholder="Descreva o problema de saúde" >
    </div>
    <div class="compact">
    <div class="form-group" id="infartoS">
        <label for="varizes">TEM VARIZES:</label>
        <select class="smallinput" id="varizes" name="varizes" >
        <option value="" disabled selected>Selecione</option>
        <option value="Sim">Sim</option>
        <option value="Não">Não</option>
        </select>
    </div>
    <div class="form-group" >
        <label for="infarto">INFARTO:</label>
        <select id="infarto" name="infarto" >
        <option value="" disabled selected>Selecione</option>
        <option value="Sim">Sim</option>
        <option value="Não">Não</option>
        </select>
    </div>
</div><!--compact-->
<div class="compact">
    <div class="form-group">
        <label for="doenca_cardiaca">DOENÇA CARDÍACA:</label>
        <select class="smallinput" id="doenca_cardiaca" name="doenca_cardiaca" onchange="toggledoencaInput(this)">
        <option value="" disabled selected>Selecione</option>
        <option value="Sim - ">Sim</option>
        <option value="Não">Não</option>>
        </select>
        <div id="doenca_detalhes" style="display: none; margin-top: 10px;">
  <label for="doenca_detalhes_input">DESCREVA:</label>
  <input type="text" id="doenca_detalhes_input" name="doenca_detalhes" placeholder="Descreva a doença">
</div>
    </div>
    <div class="form-group">
        <label for="derrame">DERRAME:</label>
        <select id="derrame" name="derrame" >
        <option value="" disabled selected>Selecione</option>
        <option value="Sim">Sim</option>
        <option value="Não">Não</option>
        </select>
    </div>
</div>
<div class="compact">
    <div class="form-group">
        <label for="diabetes">DIABETES:</label>
        <select class="smallinput" id="diabetes" name="diabetes" >
        <option value="" disabled selected>Selecione</option>
        <option value="Sim">Sim</option>
        <option value="Não">Não</option>
        </select>
    </div>
    <div class="form-group">
        <label for="obesidade">OBESIDADE:</label>
        <select id="obesidade" name="obesidade" >
        <option value="" disabled selected>Selecione</option>
        <option value="Sim">Sim</option>
        <option value="Não">Não</option>
        </select>
    </div>
</div><!--compact-->
    <div class="form-group">
        <label for="colesterol_elevado">COLESTEROL ALTO:</label>
        <select id="colesterol_elevado" name="colesterol_elevado" >
        <option value="" disabled selected>Selecione</option>
        <option value="Sim">Sim</option>
        <option value="Não">Não</option>
        </select>
    </div>
        <h2 id="titulo-parq">QUESTIONÁRIO PAR-Q</h2>
        <table id="tabela-parq">
            <tr id="cabecalho-tabela">
                <th id="sim-header">SIM</th>
                <th id="nao-header">NÃO</th>
                <th id="questao-header">QUESTÕES</th>
            </tr>
            <tr id="linha-1">
                <td class="sim" id="sim1"><label id="label-sim1"><input type="radio" value="Sim" name="par_q1" id="input-sim1"></label></td>
                <td class="nao" id="nao1"><label id="label-nao1"><input type="radio" value="Não" name="par_q1" id="input-nao1"></label></td>
                <td class="questao" id="questao1">1- Seu médico alguma vez disse que você tem problema no coração e que deve apenas praticar atividades físicas recomendadas por médico?</td>
            </tr>
            <tr id="linha-2">
                <td class="sim" id="sim2"><label id="label-sim2"><input type="radio" value="Sim" name="par_q2" id="input-sim2"></label></td>
                <td class="nao" id="nao2"><label id="label-nao2"><input type="radio" value="Não" name="par_q2" id="input-nao2"></label></td>
                <td class="questao" id="questao2">2- Você sente dor no peito quanto pratica atividade física?</td>
            </tr>
            <tr id="linha-3">
                <td class="sim" id="sim3"><label id="label-sim3"><input type="radio" value="Sim" name="par_q3" id="input-sim3"></label></td>
                <td class="nao" id="nao3"><label id="label-nao3"><input type="radio" value="Não" name="par_q3" id="input-nao3"></label></td>
                <td class="questao" id="questao3">3- No mês passado, você teve dor no peito quanto não estava praticando atividade física?</td>
            </tr>
            <tr id="linha-4">
                <td class="sim" id="sim4"><label id="label-sim4"><input type="radio" value="Sim" name="par_q4" id="input-sim4"></label></td>
                <td class="nao" id="nao4"><label id="label-nao4"><input type="radio" value="Não" name="par_q4" id="input-nao4"></label></td>
                <td class="questao" id="questao4">4- Você perde o equilíbrio devido a tonturas ou alguma vez perdeu a consciência?</td>
            </tr>
            <tr id="linha-5">
                <td class="sim" id="sim5"><label id="label-sim5"><input type="radio" value="Sim" name="par_q5" id="input-sim5"></label></td>
                <td class="nao" id="nao5"><label id="label-nao5"><input type="radio" value="Não" name="par_q5" id="input-nao5"></label></td>
                <td class="questao" id="questao5">5- Você tem problema ósseo ou articular que poderia ficar pior por alguma mudança em sua atividade física?</td>
            </tr>
            <tr id="linha-6">
                <td class="sim" id="sim6"><label id="label-sim6"><input type="radio" value="Sim" name="par_q6" id="input-sim6"></label></td>
                <td class="nao" id="nao6"><label id="label-nao6"><input type="radio" value="Não" name="par_q6" id="input-nao6"></label></td>
                <td class="questao" id="questao6">6- Seu médico está atualmente receitando algum remédio (por exemplo, diuréticos) para pressão arterial ou problema cardíaco?</td>
            </tr>
            <tr id="linha-7">
                <td class="sim" id="sim7"><label id="label-sim7"><input type="radio" value="Sim" name="par_q7" id="input-sim7"></label></td>
                <td class="nao" id="nao7"><label id="label-nao7"><input type="radio" value="Não" name="par_q7" id="input-nao7"></label></td>
                <td class="questao" id="questao7">7- Você sabe de qualquer outra razão pela qual não deva praticar atividade física?</td>
            </tr>
        </table>
    </div><!--ladoesquerdoform-->
    
    <div class="ladodireitoform">
        
      
    <div class="form-titulo">
        <h4 id="h5form">HISTÓRICO E OBJETIVO NA ACADEMIA</h4>
    </div>
        <div class="form-group">
            <label for="jaFez_modalidade">QUE MODALIDADE FAZ OU JÁ FEZ:</label>
            <input type="text" id="jaFez_modalidade" name="jaFez_modalidade" placeholder="Descreva quais modalidades já realizou" >
        </div>
        <div class="form-group" style="display:none;">
            <label for="modalidade_atual">QUE MODALIDADE PRATICA ATUALMENTE:</label>
            <input type="text" value="Musculação" id="modalidade_atual" name="modalidade_atual" placeholder="Descreva qual modalidade realiza atualmente" >
        </div>
        <div class="form-group">
            <label for="objetivo_atividade_fisica">QUAL O SEU OBJETIVO:</label>
            <input type="text" id="objetivo_atividade_fisica" name="objetivo_atividade_fisica" placeholder="Descreva qual seu objetivo com a atividade física" >
        </div>
        <div class="form-group">
            <label for="soubeDa_academia">COMO SOUBE DA ACADEMIA:</label>
            <input type="text" id="soubeDa_academia" name="soubeDa_academia" placeholder="Como conheceu nossa academia?" >
        </div>
        <div class="form-titulo">
            <h5>DADOS ANTROPOMÉTRICOS E DE SAÚDE</h5>
        </div>
        <div class="compact">
            <div class="form-group">
                <label for="peso">PESO:</label>
                <input type="text" id="peso" name="peso" placeholder="Peso" >
            </div>
            <div class="form-group">
                <label for="tipo_sanguineo">TIPO SANGUÍNEO:</label>
                <select id="tipo_sanguineo" name="tipo_sanguineo" >
                    <option value="" disabled selected>Selecione</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
            </div>
            <div class="form-group">
                <label id="labe" for="pressao_arterial">PRESSÃO:</label>
                <select id="pressao_arterial" name="pressao_arterial" >
                    <option value="" disabled selected>Selecione</option>
                    <option value="Baixa">Baixa</option>
                    <option value="Normal">Normal</option>
                    <option value="Alta">Alta</option>
                    <option value="Pré Hipertensão">Pré-hipertensão</option>
                    <option value="Hipertensão Estágio 1">Hipertensão Estágio 1</option>
                    <option value="Hipertensão Estágio 2">Hipertensão Estágio 2</option>
                    <option value="Crise Hipertensiva">Crise Hipertensiva</option>
                </select>
            </div>
        </div><!--compact-->
        <div class="form-titulo">
            <h5>ESTILO DE VIDA</h5>
        </div>
        <div class="compact">
        <div class="form-group">
            <label for="fumar">FUMA:</label>
            <select class="smallinput" id="fumar" name="fumar" >
            <option value="" disabled selected>Selecione</option>
            <option value="Sim">Sim</option>
            <option value="Não">Não</option>
            <option value="As Vezes">As Vezes</option>
            </select>
        </div>
        <div class="form-group">
            <label for="faz_dieta">FAZ DIETA:</label>
            <select id="faz_dieta" name="faz_dieta" >
            <option value="" disabled selected>Selecione</option>
            <option value="Sim">Sim</option>
            <option value="Não">Não</option>
            <option value="As Vezes">As Vezes</option>
            </select>
        </div>
    </div><!--compact-->
    <div class="compact">
        <div class="form-group">
            <label for="bebida_alcoolica">CONSOME ÁLCOOL:</label>
            <select  id="bebida_alcoolica" name="bebida_alcoolica" >
            <option value="" disabled selected>Selecione</option>
            <option value="Sim">Sim</option>
            <option value="Não">Não</option>
            <option value="As Vezes">As Vezes</option>
            </select>
        </div>
        <div class="form-group">
            <label for="sedentario">SEDENTÁRIO:</label>
            <select id="sedentario" name="sedentario" >
            <option value="" disabled selected>Selecione</option>
            <option value="Sim">Sim</option>
            <option value="Não">Não</option>
            <option value="As Vezes">As Vezes</option>
            </select>
        </div>
    </div><!--compact-->
    <div class="form-titulo" id="titulomedida">
        <h4 id="titilo-parq">MEDIDAS ANTROPOMÉTRICAS</h4>
    </div>
<table id="tabela-medidas">
<tr id="linha-altura">
    <th id="th-torax">ALTURA:</th>
    <td class="input-coluna" id="td-altura"><input id="input-altura" type="text" name="altura" placeholder="Metros"></td>
</tr>
<tr id="linha-torax">
    <th id="th-torax">TÓRAX:</th>
    <td class="input-coluna" id="td-torax"><input id="input-torax" type="text" name="torax" placeholder="Centímetros"></td>
</tr>
<tr id="linha-cintura">
    <th id="th-cintura">CINTURA:</th>
    <td class="input-coluna" id="td-cintura"><input id="input-cintura" type="text" name="cintura" placeholder="Centímetros"></td>
</tr>
<tr id="linha-abdome">
    <th id="th-abdome">ABDOME:</th>
    <td class="input-coluna" id="td-abdome"><input id="input-abdome" type="text" name="abdome" placeholder="Centímetros"></td>
</tr>
<tr id="linha-quadril">
    <th id="th-quadril">QUADRIL:</th>
    <td class="input-coluna" id="td-quadril"><input id="input-quadril" type="text" name="quadril" placeholder="Centímetros"></td>
</tr>
<tr id="linha-bracos">
    <th id="th-bracos">BRAÇOS (direito e esquerdo):</th>
    <td class="input-coluna" id="td-bracos"><input id="input-bracos" type="text" name="bracos" placeholder="Centímetros"></td>
</tr>
<tr id="linha-antebracos">
    <th id="th-antebracos">ANTEBRAÇOS (direito e esquerdo):</th>
    <td class="input-coluna" id="td-antebracos"><input id="input-antebracos" type="text" name="antebracos" placeholder="Centímetros"></td>
</tr>
<tr id="linha-pernas">
    <th id="th-pernas">PERNA (direita e esquerda):</th>
    <td class="input-coluna" id="td-pernas"><input id="input-pernas" type="text" name="pernas" placeholder="Centímetros"></td>
</tr>
<tr id="linha-panturrilha">
    <th id="th-panturrilha">PANTURRILHA (direita e esquerda):</th>
    <td class="input-coluna" id="td-panturrilha"><input id="input-panturrilha" type="text" name="panturrilha" placeholder="Centímetros"></td>
</tr>
<tr id="linha-observacoes">
    <th id="th-observacoes">OBSERVAÇÕES:</th>
    <td class="input-coluna" id="td-observacoes"><input id="input-observacoes" type="text" name="obsmedida" placeholder="Observações"></td>
</tr>
</table>
       </div><!--ladodireitoform-->
    </form><!--formanamnese-->
        </div>
    </div>
    <div id="overlay" class="overlay"></div>
</body>
</html>