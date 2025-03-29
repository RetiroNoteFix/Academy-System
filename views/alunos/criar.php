<?php
include '../../config/config.php';
include '../../models/Usuario.php';
include '../../controllers/AuthController.php';
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    $authController = new AuthController();
    $authController->logout();

    // Redireciona para a página de login após o logout
    header("Location: /Academy-System/");
    exit();
}
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <!--GERAIS-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../public/css/style.css" rel="stylesheet">
    <title><?php print_r("$appname");?> - Painel</title>
    <!--GOOGLE FONTS-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="menulateral">
        <div class="logo" style="background-color:<?php echo ("$corlinhasuperiormenu");?>">
            <h1><?php print_r("$appname");?></h1>
        </div><!--LOGO-->
        <div class="user">
            <div class="box">
                <div class="userimg">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 122.88" fill="#fff" xml:space="preserve"> <g> <path d="M61.44,0c8.32,0,16.25,1.66,23.5,4.66l0.11,0.05c7.47,3.11,14.2,7.66,19.83,13.3l0,0c5.66,5.65,10.22,12.42,13.34,19.95 c3.01,7.24,4.66,15.18,4.66,23.49c0,8.32-1.66,16.25-4.66,23.5l-0.05,0.11c-3.12,7.47-7.66,14.2-13.3,19.83l0,0 c-5.65,5.66-12.42,10.22-19.95,13.34c-7.24,3.01-15.18,4.66-23.49,4.66c-8.31,0-16.25-1.66-23.5-4.66l-0.11-0.05 c-7.47-3.11-14.2-7.66-19.83-13.29L18,104.87C12.34,99.21,7.78,92.45,4.66,84.94C1.66,77.69,0,69.76,0,61.44s1.66-16.25,4.66-23.5 l0.05-0.11c3.11-7.47,7.66-14.2,13.29-19.83L18.01,18c5.66-5.66,12.42-10.22,19.94-13.34C45.19,1.66,53.12,0,61.44,0L61.44,0z M16.99,94.47l0.24-0.14c5.9-3.29,21.26-4.38,27.64-8.83c0.47-0.7,0.97-1.72,1.46-2.83c0.73-1.67,1.4-3.5,1.82-4.74 c-1.78-2.1-3.31-4.47-4.77-6.8l-4.83-7.69c-1.76-2.64-2.68-5.04-2.74-7.02c-0.03-0.93,0.13-1.77,0.48-2.52 c0.36-0.78,0.91-1.43,1.66-1.93c0.35-0.24,0.74-0.44,1.17-0.59c-0.32-4.17-0.43-9.42-0.23-13.82c0.1-1.04,0.31-2.09,0.59-3.13 c1.24-4.41,4.33-7.96,8.16-10.4c2.11-1.35,4.43-2.36,6.84-3.04c1.54-0.44-1.31-5.34,0.28-5.51c7.67-0.79,20.08,6.22,25.44,12.01 c2.68,2.9,4.37,6.75,4.73,11.84l-0.3,12.54l0,0c1.34,0.41,2.2,1.26,2.54,2.63c0.39,1.53-0.03,3.67-1.33,6.6l0,0 c-0.02,0.05-0.05,0.11-0.08,0.16l-5.51,9.07c-2.02,3.33-4.08,6.68-6.75,9.31C73.75,80,74,80.35,74.24,80.7 c1.09,1.6,2.19,3.2,3.6,4.63c0.05,0.05,0.09,0.1,0.12,0.15c6.34,4.48,21.77,5.57,27.69,8.87l0.24,0.14 c6.87-9.22,10.93-20.65,10.93-33.03c0-15.29-6.2-29.14-16.22-39.15c-10-10.03-23.85-16.23-39.14-16.23 c-15.29,0-29.14,6.2-39.15,16.22C12.27,32.3,6.07,46.15,6.07,61.44C6.07,73.82,10.13,85.25,16.99,94.47L16.99,94.47L16.99,94.47z" /> </g></svg>
                </div><!--USER IMG-->
                <div class="username">
                    <p>Olá, <?php echo ($usuario_nome);?></p>
                </div><!--USERNAME-->
                <div class="status">
                     <div class="">
                     <a id="logout" href="?action=logout"><button class="sairbtn"><u>Sair</u></button></a>
                     </div><!--BTN SAIR-->
                </div><!--STATUS-->
            </div><!--FIM DO BOX DO USUARIO-->
        </div><!--FIM DO USUÁRIO-->
        <div class="box">
            <div class="options" id="optHomeA">
                <div class="img">
                <svg fill="#fff" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 495.398 495.398" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><g><g><g><path d="M487.083,225.514l-75.08-75.08V63.704c0-15.682-12.708-28.391-28.413-28.391c-15.669,0-28.377,12.709-28.377,28.391v29.941L299.31,37.74c-27.639-27.624-75.694-27.575-103.27,0.05L8.312,225.514c-11.082,11.104-11.082,29.071,0,40.158c11.087,11.101,29.089,11.101,40.172,0l187.71-187.729c6.115-6.083,16.893-6.083,22.976-0.018l187.742,187.747c5.567,5.551,12.825,8.312,20.081,8.312c7.271,0,14.541-2.764,20.091-8.312C498.17,254.586,498.17,236.619,487.083,225.514z"></path><path d="M257.561,131.836c-5.454-5.451-14.285-5.451-19.723,0L72.712,296.913c-2.607,2.606-4.085,6.164-4.085,9.877v120.401c0,28.253,22.908,51.16,51.16,51.16h81.754v-126.61h92.299v126.61h81.755c28.251,0,51.159-22.907,51.159-51.159V306.79c0-3.713-1.465-7.271-4.085-9.877L257.561,131.836z"></path></g></g></g></g></svg>
                </div><!--fim da imagem da opção-->
                <a href="../dashboard/dashboard.php">Início</a>
            </div><!--FIM DA OPÇÃO HOME-->
            <div class="options" id="optAlunosA">
                <div class="img">
                <svg fill="#fff" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="924 578 200 200" enable-background="new 924 578 200 200" xml:space="preserve" stroke="#fff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><g><g><path d="M984.585,638.942c0,13.999-9.609,25.348-21.462,25.348c-11.852,0-21.459-11.349-21.459-25.348c0-13.998,9.607-25.346,21.459-25.346C974.976,613.596,984.585,624.944,984.585,638.942z"></path><path d="M987.585,683.641c1.55-0.945,3.265-1.561,5.041-1.855c-3.606-5.088-6.161-10.546-7.637-17.078c-0.404-2.387-3.672-2.667-6.102-0.687c-4.546,3.706-9.849,6.186-15.765,6.186c-6.03,0-11.577-2.399-16.024-6.414c-1.419-1.282-3.51-1.476-5.143-0.479c-8.443,5.158-14.834,13.344-17.622,23.067c-0.749,2.605-0.223,5.42,1.411,7.588c1.636,2.166,4.192,3.443,6.906,3.443h38.668C975.947,692.072,981.41,687.41,987.585,683.641z"></path></g><g><path d="M1063.416,638.942c0,13.999,9.608,25.348,21.461,25.348c11.854,0,21.46-11.349,21.46-25.348c0-13.998-9.606-25.346-21.46-25.346C1073.024,613.596,1063.416,624.944,1063.416,638.942z"></path><path d="M1060.415,683.641c-1.55-0.945-3.266-1.561-5.041-1.855c3.606-5.088,6.161-10.546,7.637-17.078c0.405-2.387,3.673-2.667,6.103-0.687c4.546,3.706,9.848,6.186,15.764,6.186c6.029,0,11.577-2.399,16.025-6.414c1.419-1.282,3.509-1.476,5.142-0.479c8.444,5.158,14.836,13.344,17.622,23.067c0.748,2.605,0.223,5.42-1.41,7.588c-1.637,2.166-4.192,3.443-6.905,3.443h-38.67C1072.053,692.072,1066.591,687.41,1060.415,683.641z"></path></g><g><path d="M1082.475,725.451c-4.198-14.654-13.72-27.045-26.326-34.992c-2.487-1.566-5.715-1.313-7.921,0.631c-6.766,5.959-15.138,9.506-24.228,9.506c-9.269,0-17.791-3.686-24.626-9.855c-2.182-1.971-5.393-2.268-7.902-0.734c-12.977,7.924-22.799,20.504-27.082,35.445c-1.151,4.008-0.344,8.328,2.166,11.662c2.516,3.33,6.443,5.291,10.615,5.291h92.523c4.173,0,8.103-1.955,10.618-5.291C1082.823,733.779,1083.626,729.463,1082.475,725.451z"></path><path d="M1056.981,652.547c0,21.513-14.766,38.955-32.981,38.955c-18.214,0-32.979-17.442-32.979-38.955c0-21.515,14.765-38.951,32.979-38.951C1042.216,613.596,1056.981,631.033,1056.981,652.547z"></path></g></g></g></svg>
                </div><!--fim da imagem da opção-->
                <a href="index.php">Alunos</a>
            </div><!--FIM DA OPÇÃO ALUNOS-->
            <div class="options" id="optPagamento">
                <div class="img">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M19.5 12C19.5 16.1421 16.1421 19.5 12 19.5C7.85786 19.5 4.5 16.1421 4.5 12C4.5 7.85786 7.85786 4.5 12 4.5C16.1421 4.5 19.5 7.85786 19.5 12ZM21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12ZM10.5 9L9.75 9.75V12L10.5 12.75H12.75V13.5H9.75V15H11.25V15.75H12.75V15H13.5L14.25 14.25V12L13.5 11.25H11.25V10.5H14.25V9H12.75V8.25H11.25V9H10.5Z" fill="#ffffff"></path> </g></svg>
                </div><!--fim da imagem da opção-->
                <a href="../pagamentos/index.php">Pagamentos</a>
            </div><!--FIM DA OPÇÃO PAGAMENTO-->
            <div class="options" id="optUsuario">
                <div class="img">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M13 20V18C13 15.2386 10.7614 13 8 13C5.23858 13 3 15.2386 3 18V20H13ZM13 20H21V19C21 16.0545 18.7614 14 16 14C14.5867 14 13.3103 14.6255 12.4009 15.6311M11 7C11 8.65685 9.65685 10 8 10C6.34315 10 5 8.65685 5 7C5 5.34315 6.34315 4 8 4C9.65685 4 11 5.34315 11 7ZM18 9C18 10.1046 17.1046 11 16 11C14.8954 11 14 10.1046 14 9C14 7.89543 14.8954 7 16 7C17.1046 7 18 7.89543 18 9Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                </div><!--fim da imagem da opção-->
                <a href="../usuarios/index.php">Usuários</a>
            </div><!--FIM DA OPÇÃO USUÁRIOS-->
            <div class="options" id="optConfig">
                <div class="img">
                    <svg id="icon-config" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 8.25C9.92894 8.25 8.25 9.92893 8.25 12C8.25 14.0711 9.92894 15.75 12 15.75C14.0711 15.75 15.75 14.0711 15.75 12C15.75 9.92893 14.0711 8.25 12 8.25ZM9.75 12C9.75 10.7574 10.7574 9.75 12 9.75C13.2426 9.75 14.25 10.7574 14.25 12C14.25 13.2426 13.2426 14.25 12 14.25C10.7574 14.25 9.75 13.2426 9.75 12Z" fill="#ffffff"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M11.9747 1.25C11.5303 1.24999 11.1592 1.24999 10.8546 1.27077C10.5375 1.29241 10.238 1.33905 9.94761 1.45933C9.27379 1.73844 8.73843 2.27379 8.45932 2.94762C8.31402 3.29842 8.27467 3.66812 8.25964 4.06996C8.24756 4.39299 8.08454 4.66251 7.84395 4.80141C7.60337 4.94031 7.28845 4.94673 7.00266 4.79568C6.64714 4.60777 6.30729 4.45699 5.93083 4.40743C5.20773 4.31223 4.47642 4.50819 3.89779 4.95219C3.64843 5.14353 3.45827 5.3796 3.28099 5.6434C3.11068 5.89681 2.92517 6.21815 2.70294 6.60307L2.67769 6.64681C2.45545 7.03172 2.26993 7.35304 2.13562 7.62723C1.99581 7.91267 1.88644 8.19539 1.84541 8.50701C1.75021 9.23012 1.94617 9.96142 2.39016 10.5401C2.62128 10.8412 2.92173 11.0602 3.26217 11.2741C3.53595 11.4461 3.68788 11.7221 3.68786 12C3.68785 12.2778 3.53592 12.5538 3.26217 12.7258C2.92169 12.9397 2.62121 13.1587 2.39007 13.4599C1.94607 14.0385 1.75012 14.7698 1.84531 15.4929C1.88634 15.8045 1.99571 16.0873 2.13552 16.3727C2.26983 16.6469 2.45535 16.9682 2.67758 17.3531L2.70284 17.3969C2.92507 17.7818 3.11058 18.1031 3.28089 18.3565C3.45817 18.6203 3.64833 18.8564 3.89769 19.0477C4.47632 19.4917 5.20763 19.6877 5.93073 19.5925C6.30717 19.5429 6.647 19.3922 7.0025 19.2043C7.28833 19.0532 7.60329 19.0596 7.8439 19.1986C8.08452 19.3375 8.24756 19.607 8.25964 19.9301C8.27467 20.3319 8.31403 20.7016 8.45932 21.0524C8.73843 21.7262 9.27379 22.2616 9.94761 22.5407C10.238 22.661 10.5375 22.7076 10.8546 22.7292C11.1592 22.75 11.5303 22.75 11.9747 22.75H12.0252C12.4697 22.75 12.8407 22.75 13.1454 22.7292C13.4625 22.7076 13.762 22.661 14.0524 22.5407C14.7262 22.2616 15.2616 21.7262 15.5407 21.0524C15.686 20.7016 15.7253 20.3319 15.7403 19.93C15.7524 19.607 15.9154 19.3375 16.156 19.1985C16.3966 19.0596 16.7116 19.0532 16.9974 19.2042C17.3529 19.3921 17.6927 19.5429 18.0692 19.5924C18.7923 19.6876 19.5236 19.4917 20.1022 19.0477C20.3516 18.8563 20.5417 18.6203 20.719 18.3565C20.8893 18.1031 21.0748 17.7818 21.297 17.3969L21.3223 17.3531C21.5445 16.9682 21.7301 16.6468 21.8644 16.3726C22.0042 16.0872 22.1135 15.8045 22.1546 15.4929C22.2498 14.7697 22.0538 14.0384 21.6098 13.4598C21.3787 13.1586 21.0782 12.9397 20.7378 12.7258C20.464 12.5538 20.3121 12.2778 20.3121 11.9999C20.3121 11.7221 20.464 11.4462 20.7377 11.2742C21.0783 11.0603 21.3788 10.8414 21.6099 10.5401C22.0539 9.96149 22.2499 9.23019 22.1547 8.50708C22.1136 8.19546 22.0043 7.91274 21.8645 7.6273C21.7302 7.35313 21.5447 7.03183 21.3224 6.64695L21.2972 6.60318C21.0749 6.21825 20.8894 5.89688 20.7191 5.64347C20.5418 5.37967 20.3517 5.1436 20.1023 4.95225C19.5237 4.50826 18.7924 4.3123 18.0692 4.4075C17.6928 4.45706 17.353 4.60782 16.9975 4.79572C16.7117 4.94679 16.3967 4.94036 16.1561 4.80144C15.9155 4.66253 15.7524 4.39297 15.7403 4.06991C15.7253 3.66808 15.686 3.29839 15.5407 2.94759C15.2616 2.27376 14.7262 1.7384 14.0524 1.45929C13.762 1.33902 13.4625 1.29238 13.1454 1.27074C12.8407 1.24999 12.4697 1.24999 12.0252 1.25H11.9747Z" fill="#ffffff"></path></g></svg>
                </div><!--fim da imagem da opção-->
                <a>Configurações</a>
            </div><!--FIM DA OPÇÃO CONFIGURAÇÕES-->
        </div><!--FIM DO BOX DAS OPÇÕES-->
</div><!-- FIM DO MENU LATERAL-->
    <div class="linhasuperior" id="linhasuperiorf" style='background-color:<?php echo("$corlinhasuperior");?>'></div>
    <!--fim da linha superior-->
    <div class="painel" id=painelf>

        <div class="titulo" >

            <h1 id="h1titulof">Adicionar Aluno</h1>
        </div>
        <!--fim do titulo-->
        <div class="dashboard" id="dashboardcriaraluno">
        <div class="container">
            <div class="ladoesquerdoform">
            <form action="#" method="POST"  id="btncadastrar" autocomplete="off">
            <div class="form-titulo">
                <h1>Informações Pessoais</h1>
            </div>
            <div class="form-group">
                <label for="nome">Nome completo:</label>
                <input  style="text-transform: uppercase;" type="text" id="nome" name="nome" required maxlenght="255" placeholder="Nome completo">
            </div>
            <div class="form-group">
                <label for="data_nascimento">Data de nascimento:</label>
                <input type="date" id="data_nascimento" name="data_nascimento" >
            </div>
            <div class="form-group">
                <label for="idade">Idade:</label>
                <input type="text" id="idade" name="idade" placeholder="Idade" >
            </div>
            <div class="form-group">
                <label for="estado_civil">Estado Civil:</label>
                <select id="estado_civil" name="estado_civil" >
                    <option value="" disabled selected>Selecione</option>
                    <option value="Solteiro(a)">Solteiro(a)</option>
                    <option value="Casado(a)">Casado(a)</option>
                    <option value="Separado(a)">Separado(a)</option>
                    <option value="Divorciado(a)">Divorciado(a)</option>
                    <option value="Viúvo(a)">Viúvo(a)</option>
                    <option value="União Estável">União Estável</option>
                </select>
            </div>
            <div class="form-group">
                <label for="rg">Número do RG:</label>
                <input type="text"id="rg" name="rg" placeholder="00.000.000-00"  maxlength="13" pattern="\d{2}\.\d{3}\.\d{3}-[\d{2}]" >
            </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" maxlength="14" placeholder="000.000.000-00" >
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="tel" id="telefone" name="telefone" maxlength="15" placeholder="(00) 00000-0000" >
            </div>
            <div class="form-group">
                <label for="telefone_familia">Telefone de algum familiar:</label>
                <input type="tel" id="telefone_familia"  maxlength="15" name="telefone_familia" placeholder="(00) 00000-0000" >
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="email@email.com" >
            </div>
            <div class="form-group">
                <h1 id="h1endereco">Endereço</h1>
                <label for="cep">CEP:</label>
                <input type="text" id="cep" name="cep" placeholder="00000-000" maxlength="9">

            </div>
            <div class="form-group">
                <label for="estado">Estado:</label>
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
            <div class="form-group">
                <label for="rua">Rua:</label>
                <input type="text" id="rua" name="rua" placeholder="Digite sua rua">
            </div>
            <div class="form-group">
                <label for="bairro">Bairro:</label>
                <input type="text" id="bairro" name="bairro" placeholder="Digite seu bairro" >
            </div>
            <div class="form-group">
                <label for="cidade">Cidade:</label>
                <input type="text" id="cidade" name="cidade" placeholder="Digite sua cidade" >
            </div>
            <div class="form-group">
                <label for="numero">Número:</label>
                <input type="text" id="numero" name="numero" placeholder="Número da residência" >
            </div>
            <div class="form-group">
                <label for="complemento">Complemento:</label>
                <input type="text" id="complemento" name="complemento" placeholder="Apartamento, bloco, sala (opcional)">
            </div>
          
            <div class="form-group">
                <label for="profissão">Profissão:</label>
                <input type="text" id="profissao" name="profissao" placeholder="Profissão" >
            </div>
            <div class="form-group">
                <label for="escolaridade">Escolaridade:</label>
                <select id="escolaridade" name="escolaridade" >
                    <option value="" disabled selected>Selecione</option>
                    <option value="Ensino Fundamental Completo">Ensino Fundamental Completo</option>
                    <option value="Ensino Fundamental Incompleto">Ensino Fundamental Incompleto</option>
                    <option value="Ensino Médio Completo">Ensino Médio Completo</option>
                    <option value="Ensino Médio Incompleto">Ensino Médio Incompleto</option>
                    <option value="Ensino Técnico Completo">Ensino Técnico Completo</option>
                    <option value="Ensino Técnico Incompleto">Ensino Técnico Incompleto</option>
                    <option value="Ensino Superior Completo">Ensino Superior Completo</option>
                    <option value="Ensino Superior Incompleto">Ensino Superior Incompleto</option>
                    <option value="Pós-graduação Completa">Pós-graduação Completa</option>
                    <option value="Pós-graduação Incompleta">Pós-graduação Incompleta</option>
                    <option value="Mestrado Completo">Mestrado Completo</option>
                    <option value="Mestrado Incompleto">Mestrado Incompleto</option>
                    <option value="Doutorado Completo">Doutorado Completo</option>
                    <option value="Doutorado Incompleto">Doutorado Incompleto</option>
                </select>
            </div>
            <div class="form-group">
                <h1 id="h1dados">Dados Antropométricos <br><span id="edesaude">e de Saúde</span></h1>
                <label for="peso">Peso:</label>
                <input type="text" id="peso" name="peso" placeholder="Peso" >
            </div>
            <div class="form-group">
                <label for="tipo_sanguineo">Tipo Sanguíneo:</label>
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
                <label for="pressao_arterial">Pressão Arterial:</label>
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
            </div><!--lado esquerdo-->
            <div class="ladodireitoform">
            <div class="form-group">
        <h1 id="historicoS">Histórico de Saúde</h1>
        
        <label for="cirurgia">Já fez cirurgia? Qual?</label>
        <input type="text" id="cirurgia" name="cirurgia" placeholder="Descreva a cirurgia" >
    </div>
    <div class="form-group">
        <label for="dorme_bem">Quantas horas de sono?</label>
        <input type="number" id="dorme_bem" name="dorme_bem" placeholder="Quantidade de horas de sono" >
    </div>
    <div class="form-group">
        <label for="lesao_articular">Lesão articular?</label>
        <select id="lesao_articular" name="lesao_articular" onchange="toggleLesaoInput(this)" >
        <option value="" disabled selected>Selecione</option>
        <option value="Sim">Sim</option>
        <option value="Não">Não</option>
        </select>
        <div id="lesao_detalhes" style="display: none; margin-top: 10px;">
  <label for="lesao_detalhes_input">Descreva:</label>
  <input type="text" id="lesao_detalhes_input" name="lesao_detalhes" placeholder="Descreva a lesão">
</div>
    </div>
    <div class="form-group">
        <label for="problema_coluna">Problema de coluna?</label>
        <select id="problema_coluna" name="problema_coluna" onchange="togglecolunaInput(this)">
        <option value="">Selecione</option>
        <option value="Sim">Sim</option>
        <option value="Não">Não</option>
        </select>
        <div id="coluna_detalhes" style="display: none; margin-top: 10px;">
  <label for="coluna_detalhes_input">Descreva:</label>
  <input type="text" id="coluna_detalhes_input" name="coluna_detalhes" placeholder="Descreva o problema">
</div>
    </div>
    <div class="form-group">
        <label for="tempo_sem_medico">Quanto tempo faz que não vai ao médico?</label>
        <input type="text" id="tempo_sem_medico" name="tempo_sem_medico" placeholder="Ex: 6 meses, 1 ano" >
    </div>
    <div class="form-group">
        <label for="uso_medicamento">Usa algum medicamento? Qual?</label>
        <input type="text" id="uso_medicamento" name="uso_medicamento" placeholder="Medicamento usado">
    </div>
    <div class="form-group">
        <label for="problema_saude">Tem algum problema de saúde? Qual?</label>
        <input type="text" id="problema_saude" name="problema_saude" placeholder="Descreva o problema de saúde" >
    </div>
    <div class="form-group" id="infartoS">
        <label for="varizes">Tem varizes?</label>
        <select id="varizes" name="varizes" >
        <option value="" disabled selected>Selecione</option>
        <option value="Sim">Sim</option>
        <option value="Não">Não</option>
        </select>
    </div>
    
    <div class="form-group" >
        <label for="infarto">Infarto?</label>
        <select id="infarto" name="infarto" >
        <option value="" disabled selected>Selecione</option>
        <option value="Sim">Sim</option>
        <option value="Não">Não</option>
        </select>
    </div>
    <div class="form-group">
        <label for="doenca_cardiaca">Doença cardíaca?</label>
        <select id="doenca_cardiaca" name="doenca_cardiaca" onchange="toggledoencaInput(this)">
        <option value="" disabled selected>Selecione</option>
        <option value="Sim">Sim</option>
        <option value="Não">Não</option>>
        </select>
        <div id="doenca_detalhes" style="display: none; margin-top: 10px;">
  <label for="doenca_detalhes_input">Descreva:</label>
  <input type="text" id="doenca_detalhes_input" name="doenca_detalhes" placeholder="Descreva a doença">
</div>
    </div>
    <div class="form-group">
        <label for="derrame">Derrame?</label>
        <select id="derrame" name="derrame" >
        <option value="" disabled selected>Selecione</option>
        <option value="Sim">Sim</option>
        <option value="Não">Não</option>
        </select>
    </div>
    <div class="form-group">
        <label for="diabetes">Diabetes?</label>
        <select id="diabetes" name="diabetes" >
        <option value="" disabled selected>Selecione</option>
        <option value="Sim">Sim</option>
        <option value="Não">Não</option>
        </select>
    </div>
    <div class="form-group">
        <label for="obesidade">Obesidade?</label>
        <select id="obesidade" name="obesidade" >
        <option value="" disabled selected>Selecione</option>
        <option value="Sim">Sim</option>
        <option value="Não">Não</option>
        </select>
    </div>
    <div class="form-group">
        <label for="colesterol_elevado">Colesterol elevado?</label>
        <select id="colesterol_elevado" name="colesterol_elevado" >
        <option value="" disabled selected>Selecione</option>
        <option value="Sim">Sim</option>
        <option value="Não">Não</option>
        </select>
    </div>
    <div class="form-group">
        <h1 id="h1estilo">Estilo de vida</h1>
        <label for="fumar">Fuma?</label>
        <select id="fumar" name="fumar" >
        <option value="" disabled selected>Selecione</option>
        <option value="Sim">Sim</option>
        <option value="Não">Não</option>
        <option value="As Vezes">As Vezes</option>
        </select>
    </div>
    <div class="form-group">
        <label for="faz_dieta">Faz dieta?</label>
        <select id="faz_dieta" name="faz_dieta" >
        <option value="" disabled selected>Selecione</option>
        <option value="Sim">Sim</option>
        <option value="Não">Não</option>
        <option value="As Vezes">As Vezes</option>
        </select>
    </div>
    <div class="form-group">
        <label for="bebida_alcoolica">Você consome bebidas alcoólicas?</label>
        <select id="bebida_alcoolica" name="bebida_alcoolica" >
        <option value="" disabled selected>Selecione</option>
        <option value="Sim">Sim</option>
        <option value="Não">Não</option>
        <option value="As Vezes">As Vezes</option>
        </select>
    </div>
    <div class="form-group">
        <label for="sedentario">Você é sedentário?</label>
        <select id="sedentario" name="sedentario" >
        <option value="" disabled selected>Selecione</option>
        <option value="Sim">Sim</option>
        <option value="Não">Não</option>
        <option value="As Vezes">As Vezes</option>
        </select>
    </div>
    <div class="form-group">
        <h1 id="h1objetivo">Histórico e Objetivo <br> <span id="naacademia">na Academia</span></h1>
        <label for="jaFez_modalidade">Que modalidade faz ou já fez?</label>
        <input type="text" id="jaFez_modalidade" name="jaFez_modalidade" placeholder="Descreva quais modalidades já realizou" >
    </div>
    <div class="form-group">
        <label for="modalidade_atual">Que modalidade pratica atualmente?</label>
        <input type="text" id="modalidade_atual" name="modalidade_atual" placeholder="Descreva qual modalidade realiza atualmente" >
    </div>
    <div class="form-group">
        <label for="objetivo_atividade_fisica">Qual seu objetivo?</label>
        <input type="text" id="objetivo_atividade_fisica" name="objetivo_atividade_fisica" placeholder="Descreva qual seu objetivo com a atividade física" >
    </div>
    <div class="form-group">
        <label for="soubeDa_academia">Como soube da academia?</label>
        <input type="text" id="soubeDa_academia" name="soubeDa_academia" placeholder="Como conheceu nossa academia?" >
    </div>
    
    
        
            </div><!--lado direito-->
    </div>
    <div class="parq">
    <h1 id="titulo-parq">Questionário PAR-Q</h1>
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
    <br>
    <h1 id="titulo-parq">MEDIDAS ANTROPOMÉTRICAS</h1>
    <table id="tabela-medidas">
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
    <br>
    <h3 class="paga_titulo"><strong>PAGAMENTO</strong></h3>
    <table id="tabela-pagamento">
        <thead>
            <tr>
                <th id="th-valor">Valor</th>
                <th id="th-data-assinatura">Data de Assinatura</th>
                <th>Plano:</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input id="input-valor" name="valor" type="text" placeholder="R$0,00" required></td>
                <td><input id="input-data-assinatura" name="data_pagamento" type="date" required></td>
                <td><div class="form-group">
                <select id="plano" name="plano" required>
                    <option value="" >Selecione</option>
                    <option value="Mensal">Mensal</option>
                    <option value="Semestral">Semestral</option>
                    <option value="Anual">Anual</option>
                </select>
            </div></td>
            </tr>
        </tbody>
        
        
    </table>
    <div class="boxbtn">
    <button id="cadastraluno" type="submit"><svg id="iconbtn" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                    stroke="#ffffff">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M11 8C11 7.44772 11.4477 7 12 7C12.5523 7 13 7.44772 13 8V11H16C16.5523 11 17 11.4477 17 12C17 12.5523 16.5523 13 16 13H13V16C13 16.5523 12.5523 17 12 17C11.4477 17 11 16.5523 11 16V13H8C7.44771 13 7 12.5523 7 12C7 11.4477 7.44772 11 8 11H11V8Z"
                                            fill="#ffffff"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12ZM3.00683 12C3.00683 16.9668 7.03321 20.9932 12 20.9932C16.9668 20.9932 20.9932 16.9668 20.9932 12C20.9932 7.03321 16.9668 3.00683 12 3.00683C7.03321 3.00683 3.00683 7.03321 3.00683 12Z"
                                            fill="#ffffff"></path>
                                    </g>
                                </svg><p id="btntxt">Cadastrar</p></button>  <a id="cadastralunovoltar"><svg  id="iconbtn" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M4 10L3.29289 10.7071L2.58579 10L3.29289 9.29289L4 10ZM21 18C21 18.5523 20.5523 19 20 19C19.4477 19 19 18.5523 19 18L21 18ZM8.29289 15.7071L3.29289 10.7071L4.70711 9.29289L9.70711 14.2929L8.29289 15.7071ZM3.29289 9.29289L8.29289 4.29289L9.70711 5.70711L4.70711 10.7071L3.29289 9.29289ZM4 9L14 9L14 11L4 11L4 9ZM21 16L21 18L19 18L19 16L21 16ZM14 9C17.866 9 21 12.134 21 16L19 16C19 13.2386 16.7614 11 14 11L14 9Z"
                                            fill="#ffffff"></path>
                                    </g>
                                </svg><p id="btntxt">Voltar</p></a>
                                </div> </div>
                                <div class="centro"><a href="https://www.instagram.com/retironotefix/" id="copy">&copy; 2025 Carlos Eduardo, Academy-System <?php echo $versao?></a></div> 
                                </form>
        </div>
        <!--fim do dasboard-->
       
    </div>
    <!--FIM DO PAINEL-->
    <div id="popup" class="popup" style='top: 50%; left:60%;'>

        <div class="closepop">

            <a id="closepop" onclick="closePopup()"></a>
        </div>
        <p id="popup-message"></p>
    </div>
    <div class="overlay" id="overlay"></div>
    <script>



const inputValor = document.getElementById('input-valor');

inputValor.addEventListener('input', function (event) {
  let value = inputValor.value;

  // Remove caracteres não numéricos
  value = value.replace(/\D/g, '');

  // Adiciona os centavos
  value = (value / 100).toFixed(2);

  // Formata para o padrão "R$"
  value = value.replace('.', ',');

  inputValor.value = `R$ ${value}`;
});

// Remove o "R$" ao submeter o formulário (opcional)
inputValor.addEventListener('focusout', function () {
  inputValor.value = inputValor.value.replace('R$ ', '').trim();
});

function toggleLesaoInput(select) {
    const lesaoDetalhesDiv = document.getElementById('lesao_detalhes');
    const lesaoDetalhesInput = document.getElementById('lesao_detalhes_input');
    
    if (select.value === "Sim") {
      lesaoDetalhesDiv.style.display = "block"; // Mostra o campo de texto
      lesaoDetalhesInput.required = true; // Torna obrigatório
    } else {
      lesaoDetalhesDiv.style.display = "none"; // Oculta o campo de texto
      lesaoDetalhesInput.required = false; // Remove obrigatoriedade
      lesaoDetalhesInput.value = ""; // Limpa o campo
    }
  }

  function toggledoencaInput(select) {
    const doencaDetalhesDiv = document.getElementById('doenca_detalhes');
    const doencaDetalhesInput = document.getElementById('doenca_detalhes_input');
    
    if (select.value === "Sim") {
      doencaDetalhesDiv.style.display = "block"; // Mostra o campo de texto
      doencaDetalhesInput.required = true; // Torna obrigatório
    } else {
      doencaDetalhesDiv.style.display = "none"; // Oculta o campo de texto
      doencaDetalhesInput.required = false; // Remove obrigatoriedade
      doencaDetalhesInput.value = ""; // Limpa o campo
    }
}

  function togglecolunaInput(select) {
    const colunaDetalhesDiv = document.getElementById('coluna_detalhes');
    const colunaDetalhesInput = document.getElementById('coluna_detalhes_input');
    
    if (select.value === "Sim") {
      colunaDetalhesDiv.style.display = "block"; // Mostra o campo de texto
      colunaDetalhesInput.required = true; // Torna obrigatório
    } else {
      colunaDetalhesDiv.style.display = "none"; // Oculta o campo de texto
      colunaDetalhesInput.required = false; // Remove obrigatoriedade
      colunaDetalhesInput.value = ""; // Limpa o campo
    }
  }


document.getElementById('cep').addEventListener('input', function() {
    let cepValue = this.value;

    // Remove qualquer caractere não numérico
    cepValue = cepValue.replace(/\D/g, '');

    // Adiciona o traço automaticamente após os 5 primeiros números
    if (cepValue.length <= 5) {
      this.value = cepValue;  // Até 5 números, sem traço
    } else {
      this.value = cepValue.replace(/(\d{5})(\d{3})/, '$1-$2');  // Adiciona o traço após 5 números
    }
  });

    document.getElementById('btncadastrar').addEventListener('submit', function(event) {
        event.preventDefault();

       var form = document.getElementById('btncadastrar');
       var formData = new FormData(form);
        fetch('../../controllers/FormController.php', {
                method: 'POST',
                body: formData
         })
            .then(response => response.text())
            .then(data => {
                setTimeout(function() {
                    closePopup();
                }, 1600);
                document.getElementById('popup-message').innerHTML = data;
                document.getElementById('popup').classList.add('show');
                document.getElementById('overlay').classList.add('show');
            })
            .catch(error => console.error('Erro:', error));
    });

    function closePopup() {
        window.location.reload();
        document.getElementById('popup').classList.remove('show');
        document.getElementById('overlay').classList.remove('show');
    }
    </script>
    <script>
     var optHome = document.getElementById("optHomeA");
    var optAlunos = document.getElementById("optAlunosA");
    var optPagamento = document.getElementById("optPagamento");
    var optUsuario = document.getElementById("optUsuario");
    var optConfig = document.getElementById("optConfig");
    var menuConfig = document.getElementById("menuConfig");
    var btn = document.getElementById("cadastralunovoltar");

    //adição de eventos (transição ao passar o mouse sobre as opções do menu lateral)
    optHome.addEventListener("mouseover", function() {
        optAlunos.style.backgroundColor = "rgba(34,45,51,255)"
        optAlunos.style.border = "none"
    });
    optPagamento.addEventListener("mouseover", function() {
        optAlunos.style.backgroundColor = "rgba(34,45,51,255)"
        optAlunos.style.border = "none"
    });
    optUsuario.addEventListener("mouseover", function() {
        optAlunos.style.backgroundColor = "rgba(34,45,51,255)"
        optAlunos.style.border = "none"
    });
    optConfig.addEventListener("mouseover", function() {
        optAlunos.style.backgroundColor = "rgba(34,45,51,255)"
        optAlunos.style.border = "none"
    });
    //saída do mouse
    optAlunos.addEventListener("mouseout", function() {
        optAlunos.style.backgroundColor = "#0e1114";
        optAlunos.style.borderLeft = "2px solid red"
    });
    optHome.addEventListener("mouseout", function() {
        optAlunos.style.backgroundColor = "#0e1114";
        optAlunos.style.borderLeft = "2px solid red"
    });
    optPagamento.addEventListener("mouseout", function() {
        optAlunos.style.backgroundColor = "#0e1114";
        optAlunos.style.borderLeft = "2px solid red"
    });
    optUsuario.addEventListener("mouseout", function() {
        optAlunos.style.backgroundColor = "#0e1114";
        optAlunos.style.borderLeft = "2px solid red"
    });
    optConfig.addEventListener("mouseout", function() {
        optAlunos.style.backgroundColor = "#0e1114";
        optAlunos.style.borderLeft = "2px solid red"
    });
    //funções de clique
    optHome.addEventListener('click', function() {
        window.location.href = '../dashboard/dashboard.php';
    });
    optAlunos.addEventListener('click', function() {
        window.location.href = 'index.php';
    });
    optPagamento.addEventListener('click', function() {
        window.location.href = '../pagamentos/index.php';
    });
    optUsuario.addEventListener('click', function() {
        window.location.href = '../usuarios/index.php';
    });
    optConfig.addEventListener('click', function() {
        menuConfig.style.display = "block";
    });
    btn.addEventListener("click", function() {
        window.history.back();
    });
    
   
    </script>
    <script>
document.addEventListener('DOMContentLoaded', () => {
    const rgInput = document.getElementById('rg');

    if (rgInput) {
        rgInput.addEventListener('input', function(event) {
            let value = this.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos

            // Aplica a máscara corretamente para o formato 00.000.000-00
            if (value.length <= 2) {
                value = value.replace(/^(\d{2})/, '$1');
            }
            if (value.length > 2 && value.length <= 5) {
                value = value.replace(/^(\d{2})(\d{1,3})/, '$1.$2');
            }
            if (value.length > 5 && value.length <= 8) {
                value = value.replace(/^(\d{2})(\d{3})(\d{1,3})/, '$1.$2.$3');
            }
            if (value.length > 8 && value.length <= 12) {
                value = value.replace(/^(\d{2})(\d{3})(\d{3})(\d{1,3})/, '$1.$2.$3-$4');
            }
            if (value.length > 12) {
                value = value.replace(/^(\d{2})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
            }

            this.value = value; // Atualiza o valor do campo de entrada
        });
    }
});


document.addEventListener('DOMContentLoaded', () => {
    const cpfInput = document.getElementById('cpf');

    if (cpfInput) {
        cpfInput.addEventListener('input', function(event) {
            let value = this.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos

            // Aplica a máscara corretamente para o formato 000.000.000-00
            if (value.length <= 3) {
                value = value.replace(/^(\d{3})/, '$1');
            }
            if (value.length > 3 && value.length <= 6) {
                value = value.replace(/^(\d{3})(\d{1,3})/, '$1.$2');
            }
            if (value.length > 6 && value.length <= 9) {
                value = value.replace(/^(\d{3})(\d{3})(\d{1,3})/, '$1.$2.$3');
            }
            if (value.length > 9) {
                value = value.replace(/^(\d{3})(\d{3})(\d{3})(\d{1,2})/, '$1.$2.$3-$4');
            }

            this.value = value; // Atualiza o valor do campo de entrada
        });
    }
});
document.addEventListener('DOMContentLoaded', () => {
    const telefoneInput = document.getElementById('telefone');

    if (telefoneInput) {
        telefoneInput.addEventListener('input', function(event) {
            let value = this.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos

            // Aplica a máscara corretamente para o formato (00) 00000-0000
            if (value.length <= 2) {
                value = value.replace(/^(\d{2})/, '($1)');
            }
            if (value.length > 2 && value.length <= 6) {
                value = value.replace(/^(\d{2})(\d{5})(\d{1,4})/, '($1) $2-$3');
            }
            if (value.length > 6) {
                value = value.replace(/^(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
            }

            this.value = value; // Atualiza o valor do campo de entrada
        });
    }
});
document.addEventListener('DOMContentLoaded', () => {
    const telefoneFamiliaInput = document.getElementById('telefone_familia');

    if (telefoneFamiliaInput) {
        telefoneFamiliaInput.addEventListener('input', function(event) {
            let value = this.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos

            // Aplica a máscara corretamente para o formato (00) 00000-0000
            if (value.length <= 2) {
                value = value.replace(/^(\d{2})/, '($1)');
            }
            if (value.length > 2 && value.length <= 6) {
                value = value.replace(/^(\d{2})(\d{5})(\d{1,4})/, '($1) $2-$3');
            }
            if (value.length > 6) {
                value = value.replace(/^(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
            }

            this.value = value; // Atualiza o valor do campo de entrada
        });
    }
});
document.addEventListener('DOMContentLoaded', () => {
    const dataInput = document.getElementById('data');

    if (dataInput) {
        dataInput.addEventListener('input', function(event) {
            let value = this.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos

            // Aplica a máscara no formato dd/mm/aaaa
            if (value.length <= 2) {
                value = value.replace(/^(\d{2})/, '$1/');
            }
            if (value.length > 2 && value.length <= 4) {
                value = value.replace(/^(\d{2})(\d{2})/, '$1/$2');
            }
            if (value.length > 4) {
                value = value.replace(/^(\d{2})(\d{2})(\d{4})/, '$1/$2/$3');
            }

            this.value = value; // Atualiza o valor do campo de entrada
        });
    }
});
document.getElementById('idade').addEventListener('input', function (event) {
    const input = event.target;
    let valor = input.value.replace(/\D/g, ''); // Remove caracteres não numéricos

    // Verifica se há número para adicionar "anos"
    if (valor) {
        input.value = `${valor} Anos`;
    } else {
        input.value = ''; // Limpa o campo se não houver número
    }

    // Reposiciona o cursor corretamente
    const posicaoCursor = valor.length; // Mantém o cursor no lugar certo
    input.setSelectionRange(posicaoCursor, posicaoCursor);
});
document.getElementById('peso').addEventListener('input', function (event) {
    const input = event.target;
    let valor = input.value.replace(/[^0-9,\.]/g, ''); // Remove tudo, exceto números, vírgulas e pontos
    valor = valor.replace(',', '.'); // Substitui a vírgula por ponto

    // Verifica se há número para adicionar "Kg"
    if (valor) {
        input.value = `${valor} Kg`;
    } else {
        input.value = ''; // Limpa o campo se não houver número
    }

    // Reposiciona o cursor corretamente
    const posicaoCursor = valor.length; // +3 para considerar os 3 caracteres de " Kg"
    input.setSelectionRange(posicaoCursor, posicaoCursor);
});



const ids = [
    'input-torax',
    'input-cintura',
    'input-abdome',
    'input-quadril',
    'input-bracos',
    'input-antebracos',
    'input-panturrilha',
    'input-pernas'
];

// Função que aplica a máscara em cada campo
function aplicarMascara(id) {
    document.getElementById(id).addEventListener('input', function (event) {
    const input = event.target;
    let valor = input.value;

    // Substitui a vírgula por ponto
    valor = valor.replace(',', '.');

    // Remove caracteres não numéricos, exceto números, ponto, barra
    valor = valor.replace(/[^0-9\/\.]/g, '');

    // Verifica se o valor contém uma fração (por exemplo, "1/2")
    if (valor.includes('/')) {
        const partes = valor.split('/');
        if (partes.length > 2) {
            valor = partes[0] + '/' + partes[1].slice(0, 1); // Limita a parte após a barra para um único dígito
        }
    }

    // Adiciona o sufixo "CM" ao valor, se houver
    if (valor) {
        input.value = `${valor} CM`; // Adiciona "CM" somente se houver número ou fração
    } else {
        input.value = ''; // Permite apagar completamente o campo
    }

    // Permite apagar completamente o valor, incluindo "CM"
    if (input.selectionStart === input.value.length - 3) { // Se o cursor estiver antes do "CM"
        input.setSelectionRange(input.value.length - 3, input.value.length - 3); // Posiciona o cursor antes do "CM"
    } else if (input.selectionStart === input.value.length) { // Caso o cursor esteja no final (após o "CM")
        input.setSelectionRange(input.value.length - 3, input.value.length - 3); // Posiciona o cursor antes do "CM"
    }
});


}

// Aplica a máscara para todos os campos de entrada
ids.forEach(aplicarMascara);

        </script>
</body>

</html>