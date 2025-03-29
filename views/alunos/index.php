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
    <div class="menulateral" id="menuConfig">
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
                          <a href=""><button class="sairbtn"><u>Sair</u></button></a>
                     </div><!--BTN SAIR-->
                </div><!--STATUS-->
            </div><!--FIM DO BOX DO USUARIO-->
        </div><!--FIM DO USUÁRIO-->
        <div class="config-box">
            <div class="config-title">
                <p>Configurações</p>
            </div><!--FIM DO TÍTULO DAS CONFIGURAÇÕES-->
            <form id="config-form" action="#" method="post" enctype="multipart/form-data">
                <label class="config-label" for="appname">Nome do sistema:</label><br>
                <input type="text" name="appname" value="<?php echo $appname?>">
                <label class="config-label" for="corlinhasuperior">Cor da linha superior:</label><br>
                <input type="text" name="corlinhasuperior" value="<?php echo $corlinhasuperior?>">
                <label class="config-label" for="corlinhasuperiormenu">Cor da linha superior do menu:</label><br>
                <input type="text" name="corlinhasuperiormenu" value="<?php echo $corlinhasuperiormenu?>">
                <label class="config-label" for="foto">Mudar foto de Perfil:</label><br>
                <input class="config-input" type="file" name="foto" id="foto" accept="image/*">
                <div class="button-box"><button class="save-btn" id="save-btn" type="submit">Salvar</button>
            </div><!--FIM DO BOX DO BOTÃO DE SALVAR-->
            </form>
            <div class="button-box"> <button class="back-btn" id="back-btn">Voltar</button>
        </div><!--BACK BTN-->
        </div><!--CONFIG FORM-->
</div><!-- FIM DO MENU DE CONFIGURAÇÕES-->
    <div class="linhasuperior" id="linhasuperiorf" style='background-color:<?php echo("$corlinhasuperior");?>'></div><!--fim da linha superior-->
    <div class="painel" id=painelf>
        <div class="titulo" id="titulof">
            <h1 id="h1titulof">Alunos - Ativos</h1>
        </div><!--fim do titulo-->
        <div class="dashboardalunos" id="dashboard">
            <div class="linhasuperiorcadastro">
                <div class="alinharbtn">
                    <a href="criar.php">
                        <div class="cadastro" id="btncadastro">
                            <div class="icon">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M11 8C11 7.44772 11.4477 7 12 7C12.5523 7 13 7.44772 13 8V11H16C16.5523 11 17 11.4477 17 12C17 12.5523 16.5523 13 16 13H13V16C13 16.5523 12.5523 17 12 17C11.4477 17 11 16.5523 11 16V13H8C7.44771 13 7 12.5523 7 12C7 11.4477 7.44772 11 8 11H11V8Z" fill="#ffffff"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12ZM3.00683 12C3.00683 16.9668 7.03321 20.9932 12 20.9932C16.9668 20.9932 20.9932 16.9668 20.9932 12C20.9932 7.03321 16.9668 3.00683 12 3.00683C7.03321 3.00683 3.00683 7.03321 3.00683 12Z" fill="#ffffff"></path></g></svg>
                            </div><!--fim do icone-->
                            <div class="texto">
                                <p>Aluno</p>
                            </div><!--texto-->
                        </div><!--FIM DO CADASTRO-->
                    </a>
                    <a id="btndesativados" class="cadastro">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="-0.5 -0.5 24 24" id="Group-Off--Streamline-Outlined-Material-Symbols" height="24" width="24"><desc>Group Off Streamline Icon: https://streamlinehq.com</desc><path fill="#ffffff" d="m19.957195833333333 22.017804166666668 -3.713541666666667 -3.713541666666667v0.8625h-15.333333333333334v-2.2520833333333337c0 -0.5590437500000001 0.14375 -1.0661458333333333 0.43125 -1.5213541666666666 0.2875 -0.4552083333333333 0.6868087500000001 -0.7946020833333334 1.1979166666666667 -1.0182291666666667 1.1659754166666667 -0.5111270833333333 2.2161458333333335 -0.87845625 3.1505208333333337 -1.1020833333333333 0.9343750000000001 -0.22362708333333334 1.8966854166666667 -0.33541666666666664 2.886979166666667 -0.33541666666666664 0.44720625 0 0.88248125 0.023958333333333335 1.3057291666666668 0.071875 0.42324791666666667 0.04791666666666667 0.84251875 0.11178958333333334 1.2578125 0.19166666666666668l-1.796875 -1.796875c-0.12779375 0.031960416666666665 -0.2555395833333333 0.051893749999999995 -0.38333333333333336 0.059895833333333336 -0.12779375 0.008002083333333333 -0.2555395833333333 0.011979166666666667 -0.38333333333333336 0.011979166666666667 -1.0541666666666667 0 -1.9166666666666667 -0.33541666666666664 -2.5875000000000004 -1.00625 -0.6708333333333333 -0.6708333333333333 -1.00625 -1.5333333333333334 -1.00625 -2.5875000000000004 0 -0.12779375 0.003977083333333333 -0.2555395833333333 0.011979166666666667 -0.38333333333333336 0.008002083333333333 -0.12779375 0.027935416666666667 -0.2555395833333333 0.059895833333333336 -0.38333333333333336l-4.432291666666667 -4.432291666666667 1.0302083333333334 -1.0302083333333334 19.334375 19.334375 -1.0302083333333334 1.0302083333333334Zm-5.007291666666666 -9.128125c1.1020833333333333 0.12779375 2.1322916666666667 0.31145833333333334 3.090625 0.5510416666666667 0.9583333333333334 0.23958333333333334 1.7409562500000002 0.5190812499999999 2.347916666666667 0.8385416666666667 0.5430395833333334 0.2875 0.9623104166666668 0.6588541666666667 1.2578125 1.1140625000000002 0.29550208333333333 0.4552083333333333 0.44322916666666673 0.9623104166666668 0.44322916666666673 1.5213541666666666v2.2520833333333337h-0.8625l-3.809375 -3.809375c-0.22362708333333334 -0.5590437500000001 -0.5470645833333333 -1.0421875 -0.9703125 -1.4494791666666667 -0.42324791666666667 -0.40729166666666666 -0.9223958333333334 -0.7466854166666667 -1.4973958333333335 -1.0182291666666667Zm-6.372916666666668 1.4854166666666668c-0.9104166666666667 0 -1.7609375 0.08783125 -2.5515625 0.2635416666666667 -0.790625 0.17571041666666667 -1.7609375 0.5190812499999999 -2.9109375 1.0302083333333334 -0.22360791666666668 0.09583333333333334 -0.40729166666666666 0.2635416666666667 -0.5510416666666667 0.503125 -0.14375 0.23958333333333334 -0.215625 0.48716875 -0.215625 0.7427083333333334v0.8145833333333333h12.458333333333334v-0.8625l-1.509375 -1.509375c-0.9423770833333334 -0.38333333333333336 -1.7609375 -0.6428979166666666 -2.455729166666667 -0.7786458333333334 -0.6947916666666667 -0.13574791666666666 -1.4494791666666667 -0.20364583333333333 -2.2640625 -0.20364583333333333Zm4.264583333333333 -3.59375c0.2555395833333333 -0.36737708333333335 0.44720625 -0.7986270833333334 0.575 -1.2937500000000002 0.12779375 -0.49512291666666675 0.19166666666666668 -1.0302083333333334 0.19166666666666668 -1.6052083333333333 0 -0.71875 -0.09981041666666668 -1.3536458333333334 -0.2994791666666667 -1.9046875 -0.19966875 -0.5510416666666667 -0.49114583333333334 -1.05814375 -0.8744791666666667 -1.5213541666666666 0.17571041666666667 -0.04791666666666667 0.3713541666666667 -0.08785041666666667 0.5869791666666667 -0.11979166666666667 0.215625 -0.03194604166666667 0.41126875 -0.04791666666666667 0.5869791666666667 -0.04791666666666667 1.0541666666666667 0 1.9166666666666667 0.33541666666666664 2.5875000000000004 1.00625 0.6708333333333333 0.6708333333333333 1.00625 1.5333333333333334 1.00625 2.5875000000000004s-0.34739583333333335 1.9166666666666667 -1.0421875 2.5875000000000004c-0.6947916666666667 0.6708333333333333 -1.5692708333333334 1.00625 -2.6234375 1.00625l-0.6947916666666667 -0.6947916666666667Zm-1.1020833333333333 -1.1020833333333333 -1.1020833333333333 -1.1020833333333333c0.031960416666666665 -0.11178958333333334 0.05591875 -0.22362708333333334 0.071875 -0.33541666666666664 0.01595625 -0.11178958333333334 0.023958333333333335 -0.23158125000000002 0.023958333333333335 -0.359375 0 -0.6229166666666667 -0.20364583333333333 -1.1380208333333335 -0.6109375 -1.5453125 -0.40729166666666666 -0.40729166666666666 -0.9223958333333334 -0.6109375 -1.5453125 -0.6109375 -0.12779375 0 -0.2475854166666667 0.008002083333333333 -0.359375 0.023958333333333335 -0.11178958333333334 0.01595625 -0.22362708333333334 0.03991458333333334 -0.33541666666666664 0.071875l-1.1020833333333333 -1.1020833333333333c0.2555395833333333 -0.14375 0.5350854166666666 -0.2515625 0.8385416666666667 -0.32343750000000004 0.30345625 -0.071875 0.6229166666666667 -0.1078125 0.9583333333333334 -0.1078125 1.0541666666666667 0 1.9166666666666667 0.33541666666666664 2.5875000000000004 1.00625 0.6708333333333333 0.6708333333333333 1.00625 1.5333333333333334 1.00625 2.5875000000000004 0 0.33541666666666664 -0.0359375 0.6548770833333334 -0.1078125 0.9583333333333334 -0.071875 0.30345625 -0.1796875 0.5830020833333333 -0.32343750000000004 0.8385416666666667Z" stroke-width="1"></path></svg>
                            </div><!--fim do icone-->
                            <div class="texto">
                                <p>Desativados</p>
                            </div><!--texto-->
                        </a>
                    </a>
                    <a id="btnvoltar" class="cadastro">
                        <div class="icon">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M4 10L3.29289 10.7071L2.58579 10L3.29289 9.29289L4 10ZM21 18C21 18.5523 20.5523 19 20 19C19.4477 19 19 18.5523 19 18L21 18ZM8.29289 15.7071L3.29289 10.7071L4.70711 9.29289L9.70711 14.2929L8.29289 15.7071ZM3.29289 9.29289L8.29289 4.29289L9.70711 5.70711L4.70711 10.7071L3.29289 9.29289ZM4 9L14 9L14 11L4 11L4 9ZM21 16L21 18L19 18L19 16L21 16ZM14 9C17.866 9 21 12.134 21 16L19 16C19 13.2386 16.7614 11 14 11L14 9Z" fill="#ffffff"></path></g></svg>
                        </div><!--fim do icone-->
                        <div class="texto">
                            <p>Voltar</p>
                        </div><!--texto-->
                    </a>
                   

                    <form id="formBusca" action="../core/pesquisaaluno.php" method="post">
                    <div class="boxpesquisa">
    <input id="inputpesquisa" placeholder="Digite o nome do aluno" type="text" name="search" required>
    <div class="button">
        <button id="buttonpesquisa" type="button">
            <svg id='svgiconssearch' fill="#000000" height="20px" width="20px" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 490.4 490.4">
                <g>
                    <path d="M484.1,454.796l-110.5-110.6c29.8-36.3,47.6-82.8,47.6-133.4c0-116.3-94.3-210.6-210.6-210.6S0,94.496,0,210.796 
                    s94.3,210.6,210.6,210.6c50.8,0,97.4-18,133.8-48l110.5,110.5c12.9,11.8,25,4.2,29.2,0C492.5,475.596,492.5,463.096,484.1,454.796z 
                    M41.1,210.796c0-93.6,75.9-169.5,169.5-169.5s169.6,75.9,169.6,169.5s-75.9,169.5-169.5,169.5S41.1,304.396,41.1,210.796z">
                    </path>
                </g>
            </svg>
        </button>
    </div>
    <!-- Botões para navegação entre páginas -->

</div>
                    </form>
                </div><!--alinhar btn-->
               <div class="paginas"> <p>Pág:</p><button class='btnDiminuir' id='btnDiminuir'><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M6 12H18M6 12L11 7M6 12L11 17" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg></button> <input type='name' class='quantidade' id='quantidade' value='1' >
<button  class='btnAumentar' id='btnAumentar'><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M6 12H18M18 12L13 7M18 12L13 17" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg></button></div>
            </div><!--linha superior cadastro-->
            
            <div id="resultado"class="listafornecedores"></div><!--resultado-->
       
            <div id="resultado2"class="listafornecedores"></div><!--resultado-->
        </div><!--fim do dasboard-->
        
        <div class="centro"><a href="https://www.instagram.com/retironotefix/" id="copy">&copy; 2025 Carlos Eduardo, Academy-System <?php echo $versao?></a></div>  
    </div><!--painel-->
    <div class="painel" id="paineldesativado">
        <div class="titulo" id="titulof">
        <h1 id="h1titulof">Alunos - Desativados</h1>
        </div><!--fim do titulo-->
    <div class="dashboardalunos" id="dashboard">
        <div class="linhasuperiorcadastro">
            <div class="alinharbtn">
                <a href="criar.php">
                    <div class="cadastro" id="btncadastro2">
                        <div class="icon">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M11 8C11 7.44772 11.4477 7 12 7C12.5523 7 13 7.44772 13 8V11H16C16.5523 11 17 11.4477 17 12C17 12.5523 16.5523 13 16 13H13V16C13 16.5523 12.5523 17 12 17C11.4477 17 11 16.5523 11 16V13H8C7.44771 13 7 12.5523 7 12C7 11.4477 7.44772 11 8 11H11V8Z" fill="#ffffff"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12ZM3.00683 12C3.00683 16.9668 7.03321 20.9932 12 20.9932C16.9668 20.9932 20.9932 16.9668 20.9932 12C20.9932 7.03321 16.9668 3.00683 12 3.00683C7.03321 3.00683 3.00683 7.03321 3.00683 12Z" fill="#ffffff"></path></g></svg>
                        </div><!--fim do icone-->
                    <div class="texto">
                        <p>Aluno</p>
                    </div><!--texto-->
                </div><!--FIM DO CADASTRO-->
            <a id="btnativos" class="cadastro">
                    <div class="icon">
                    <svg fill="#ffffff" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M735.385 336.094c218.24 0 395.977 177.624 395.977 395.976v113.137c0 121.96-56.568 229.78-143.57 302.526 94.13 13.916 187.354 34.959 278.315 64.6 122.414 39.825 204.664 155.676 204.664 288.159v200.364l-26.814 16.63c-148.434 92.32-392.017 202.515-708.572 202.515-174.795 0-439.76-35.186-708.685-202.514L0 1700.856v-189.39c0-140.629 89.264-263.042 221.973-304.79 85.418-26.7 172.533-46.498 260.327-59.509-86.55-72.746-142.891-180.339-142.891-301.96V732.07c0-218.352 177.623-395.976 395.976-395.976ZM1183.405 0c218.24 0 395.976 177.624 395.976 395.977v113.136c0 121.96-56.568 229.893-143.57 302.526 94.13 13.916 187.241 35.072 278.316 64.6 122.413 40.051 204.663 155.79 204.663 288.272v200.364l-26.7 16.631c-77.612 48.31-181.81 101.03-308.183 140.742v-21.723c0-181.696-113.589-340.766-282.727-395.75a1720.133 1720.133 0 0 0-111.553-32.244c35.751-69.805 54.871-147.416 54.871-227.29V732.104c0-250.483-182.036-457.975-420.414-500.175C886.762 95.487 1023.656 0 1183.404 0Z" fill-rule="evenodd"></path> </g></svg>
                    </div><!--fim do icone-->
                    <div class="texto">
                        <p>Ativos</p>
                    </div><!--texto-->
                </a>
            </a>
            <div class="boxpesquisa2">
            <input id="inputpesquisadesativado" placeholder="Digite o nome do aluno" type="text" name="search" required>
                        <div class="button">
                            <button id="buttonpesquisa" type="submit">
                            <svg id='svgiconssearch' fill="#000000" height="200px" width="200px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 490.4 490.4" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M484.1,454.796l-110.5-110.6c29.8-36.3,47.6-82.8,47.6-133.4c0-116.3-94.3-210.6-210.6-210.6S0,94.496,0,210.796 s94.3,210.6,210.6,210.6c50.8,0,97.4-18,133.8-48l110.5,110.5c12.9,11.8,25,4.2,29.2,0C492.5,475.596,492.5,463.096,484.1,454.796z M41.1,210.796c0-93.6,75.9-169.5,169.5-169.5s169.6,75.9,169.6,169.5s-75.9,169.5-169.5,169.5S41.1,304.396,41.1,210.796z"></path> </g> </g></svg>
                            </button>
                        </div><!--button-->
            </div><!--box pesquisa-->
        </div><!--alinharbtn-->
        <div class="paginas"><button class='btnDiminuir' id='btnDiminuirDesativado'><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M6 12H18M6 12L11 7M6 12L11 17" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg></button> <input type='name' class='quantidade' id='quantidadedesativado' value='1' >
        <button class='btnAumentar' id='btnAumentarDesativado'><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M6 12H18M18 12L13 7M18 12L13 17" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg></button></div>
    </div><!--linha superior cadastro-->
    <div id="resultadodesativado" class="listafornecedores"></div><!--resultado-->
    <div id="resultadodesativado2" class="listafornecedores"></div><!--resultado-->
    </div><!--fim do dasboard-->
    <div class="centro"><a href="https://www.instagram.com/retironotefix/" id="copy">&copy; 2025 Carlos Eduardo, Academy-System <?php echo $versao?></a></div>  
    </div><!--FIM DO PAINEL-->
    <div id="popupalunos" class="popup">
        <div class="closepop"></div>
        <p id="popup-message"></p>
        <div id="dadosaluno"></div>
    </div><!--popupalunos-->
    <div class="overlay" id="overlay"></div><!--overlay-->
    <div id="resultados">
    <!-- Resultados aparecerão aqui -->
</div>
<script>
  




  function atualizaDesativados(pagina) {
    // Garante que 'pagina' seja um número válido
    pagina = parseInt(pagina) || 1;

    console.log("Valor enviado para a função:", pagina); // Debug para verificar se o valor está dobrando antes do envio

    var xhr = new XMLHttpRequest();
    xhr.open('GET', '../../controllers/AlunoController.php?mostrarDesativado=true&pagina=' + pagina, true);

    xhr.onload = function () {
        if (xhr.status === 200) {
            document.getElementById('resultadodesativado').innerHTML = xhr.responseText;

            if (typeof adicionarEventosBotoes === 'function') {
                adicionarEventosBotoes();
            }

            history.pushState({ pagina: pagina }, "Página " + pagina, "?pagina=" + pagina);
        } else {
            console.log('Erro na requisição AJAX: ' + xhr.statusText);
        }
    };

    xhr.onerror = function () {
        console.log('Erro de conexão ou requisição AJAX.');
    };

    xhr.send();
}

// Atualiza a tabela automaticamente a cada 5 segundos


// Chama a função uma vez ao carregar a página



</script>
<script>
    var optHome = document.getElementById("optHomeA");
    var optAlunos = document.getElementById("optAlunosA");
    var optPagamento = document.getElementById("optPagamento");
    var optUsuario = document.getElementById("optUsuario");
    var optConfig = document.getElementById("optConfig");
    var menuConfig = document.getElementById("menuConfig");
    var btnVoltar = document.getElementById("btnvoltar");
    var btnDesativados = document.getElementById("btndesativados");
    var painelPrincipal = document.getElementById("painelf");
    var painelDesativado = document.getElementById("paineldesativado");
    var btnAtivos = document.getElementById("btnativos");
    
    console.log(optHome, optAlunos, optPagamento, optUsuario, optConfig, menuConfig, btnVoltar,);
</script>
<script>
    btnVoltar.addEventListener("click", function() {
        window.history.back();
    });
    optHome.addEventListener("click", function() {
        window.location.href = "../dashboard/dashboard.php";
    });
    optPagamento.addEventListener("click", function() {
        window.location.href = "../pagamentos/index.php";
    });
    optUsuario.addEventListener("click", function() {
        window.location.href = "../usuarios/index.php";
    });
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
    btnDesativados.addEventListener('click', function() {
       painelDesativado.style.display = "block"
        painelPrincipal.style.display = "none"
    });
    btnAtivos.addEventListener('click', function() {
       painelDesativado.style.display = "none"
        painelPrincipal.style.display = "block"
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    var inputPagina = document.getElementById('quantidade');
    var btnAumentar = document.getElementById('btnAumentar');
    var btnDiminuir = document.getElementById('btnDiminuir');
    var inputPagina2 = document.getElementById('quantidadedesativado');
    var btnAumentar2 = document.getElementById('btnAumentarDesativado');
    var btnDiminuir2 = document.getElementById('btnDiminuirDesativado');

    // Definir um valor inicial seguro (evita valores inválidos)
    inputPagina.value = parseInt(inputPagina.value) || 1;
    inputPagina2.value = parseInt(inputPagina2.value) || 1;
    // Evento para aumentar a página
    btnAumentar.addEventListener('click', function () {
        var paginaAtual = parseInt(inputPagina.value) || 1;
        inputPagina.value = paginaAtual + 1;
        atualizaAtivados(inputPagina.value);
    });
    btnAumentar2.addEventListener('click', function () {
        var paginaAtual2 = parseInt(inputPagina2.value) || 1;
        inputPagina2.value = paginaAtual2 + 1;
        atualizaDesativados(inputPagina2.value);
    });

    // Evento para diminuir a página (evita valores negativos ou zero)
    btnDiminuir.addEventListener('click', function () {
        var paginaAtual = parseInt(inputPagina.value) || 1;
        if (paginaAtual > 1) {
            inputPagina.value = paginaAtual - 1;
            atualizaAtivados(inputPagina.value);
        }
    });
    btnDiminuir2.addEventListener('click', function () {
        var paginaAtual2 = parseInt(inputPagina2.value) || 1;
        if (paginaAtual2 > 1) {
            inputPagina2.value = paginaAtual2 - 1;
            atualizaDesativados(inputPagina2.value);
        }
    });
});

function atualizaAtivados(pagina) {
    // Garante que 'pagina' seja um número válido
    pagina = parseInt(pagina) || 1;

    console.log("Valor enviado para a função:", pagina); // Debug para verificar se o valor está dobrando antes do envio

    var xhr = new XMLHttpRequest();
    xhr.open('GET', '../../controllers/AlunoController.php?mostrarAtivado=true&pagina=' + pagina, true);

    xhr.onload = function () {
        if (xhr.status === 200) {
            document.getElementById('resultado').innerHTML = xhr.responseText;

            if (typeof adicionarEventosBotoes === 'function') {
                adicionarEventosBotoes();
            }

            history.pushState({ pagina: pagina }, "Página " + pagina, "?pagina=" + pagina);
        } else {
            console.log('Erro na requisição AJAX: ' + xhr.statusText);
        }
    };

    xhr.onerror = function () {
        console.log('Erro de conexão ou requisição AJAX.');
    };

    xhr.send();
}

   function adicionarEventosBotoes() {
  
    const linhasAlunos = document.querySelectorAll('.linha-aluno');
    linhasAlunos.forEach(linha => {
    linha.querySelector('.ver-detalhes').addEventListener('click', () => {
     const dados = linha.dataset;

            // Construindo a URL para redirecionamento
            const queryParams = new URLSearchParams({
                id: dados.id,
            });

            // Redirecionando para o arquivo detalhes.php
            window.location.href = `../../libs/DomPDF/index.php?${queryParams.toString()}`;
        });
        linha.querySelector('.medidas').addEventListener('click', () => {
     const dados = linha.dataset;

            // Construindo a URL para redirecionamento
            const queryParams = new URLSearchParams({
                id: dados.id,
            });

           

            window.location.href = `../../libs/DomPDF/assets/fichamedidas.php?${queryParams.toString()}`;
        });
        linha.querySelector('.editar').addEventListener('click', () => {
     const dados = linha.dataset;

            // Construindo a URL para redirecionamento
            const queryParams = new URLSearchParams({
                id: dados.id,
            });

           

            window.location.href = `editar.php?${queryParams.toString()}`;
        });

        linha.querySelector('.apagar').addEventListener('click', (event) => {
    event.preventDefault(); // Previne o comportamento padrão do botão

    // Obtendo os dados do elemento
    const dados = linha.dataset;

    // Criando os dados para enviar na requisição
    const formData = new FormData();
    formData.append('id', dados.id);

    // Enviando a requisição para o servidor
    fetch('../../controllers/FormController.php', {
        method: 'POST',
        body: formData,
    })
        .then((response) => response.text()) // Interpretar o retorno como texto
        .then((data) => {
            // Exibir a mensagem de retorno no popup
            document.getElementById('popup-message').innerHTML = data;

            // Mostrar o popup
            document.getElementById('popupalunos').classList.add('show');
            document.getElementById('overlay').classList.add('show');
atualizaAtivados();
            setTimeout(function () {
                closePopup();
            }, 1800);
        })
        .catch((error) => {
            console.error('Erro:', error);
            document.getElementById('popup-message').innerHTML = 'Erro na comunicação com o servidor.';
            document.getElementById('popupalunos').classList.add('show');
            document.getElementById('overlay').classList.add('show');
        });
});

// Função para fechar o popup
function closePopup() {
   
    document.getElementById('popupalunos').classList.remove('show');
    document.getElementById('overlay').classList.remove('show');
}


linha.querySelector('.ativar').addEventListener('click', (event) => {
    event.preventDefault(); // Previne o comportamento padrão do botão

    // Obtendo os dados do elemento
    const dados = linha.dataset;

    // Criando os dados para enviar na requisição
    const formData = new FormData();
    formData.append('idativar', dados.id);

    // Enviando a requisição para o servidor
    fetch('../../controllers/FormController.php', {
        method: 'POST',
        body: formData,
    })
        .then((response) => response.text()) // Interpretar o retorno como texto
        .then((data) => {
            // Exibir a mensagem de retorno no popup
            document.getElementById('popup-message').innerHTML = data;

            // Mostrar o popup
            document.getElementById('popupalunos').classList.add('show');
            document.getElementById('overlay').classList.add('show');
atualizaDesativados();
            // Fechar o popup automaticamente após 1.6 segundos
            setTimeout(function () {
                closePopup();
            }, 1800);
        })
        .catch((error) => {
            console.error('Erro:', error);
            document.getElementById('popup-message').innerHTML = 'Erro na comunicação com o servidor.';
            document.getElementById('popupalunos').classList.add('show');
            document.getElementById('overlay').classList.add('show');
        });
});

// Função para fechar o popup



       
    });
   }
</script>

<script>
    // Referências ao DOM
    const inputPesquisa = document.getElementById("inputpesquisa");
    const resultados = document.getElementById("resultado");
    const resultado = document.getElementById("resultado2");

    // Função para atualizar os resultados dinamicamente
    inputPesquisa.addEventListener("input", () => {
        if (inputPesquisa.value.trim() === "") {
            window.location.reload ();
        }
        const termoPesquisa = inputPesquisa.value.toLowerCase();
        resultados.style.display = "none";
        resultado.style.display = "block";

        // Cria o objeto de dados para enviar com a requisição POST
        const data = new FormData();
        data.append('pesquisa', termoPesquisa); // Passa o termo de pesquisa

        // Requisição POST para o arquivo PHP que retorna o HTML
        fetch('../../controllers/AlunoController.php', {
            method: 'POST',
            body: data
        })
        .then(response => response.text()) // Espera a resposta como texto (HTML)
        .then(html => {
            // Limpa o conteúdo anterior
            resultado.innerHTML = html;

           
          
        })
        .catch(error => {
            resultado.innerHTML = "<p>Ocorreu um erro ao carregar os dados.</p>";
        });
    });

    // Função para recarregar o CSS
   
</script>



<script>
    // Referências ao DOM
    const inputPesquisa2 = document.getElementById("inputpesquisadesativado");
    const resultados2 = document.getElementById("resultadodesativado");
    const resultado2 = document.getElementById("resultadodesativado2");
    var painelDesativado = document.getElementById("paineldesativado");
    var btnAtivos = document.getElementById("btnativos");
    // Função para atualizar os resultados dinamicamente
    inputPesquisa2.addEventListener("input", () => {
        if (inputPesquisa2.value.trim() === "") {
            
                   painelDesativado.style.display = "block"
        painelPrincipal.style.display = "none"
             
        }
        const termoPesquisa2 = inputPesquisa2.value.toLowerCase();
        resultados2.style.display = "none";
        resultado2.style.display = "block";

        // Cria o objeto de dados para enviar com a requisição POST
        const data2 = new FormData();
        data2.append('pesquisadesativado', termoPesquisa2); // Passa o termo de pesquisa

        // Requisição POST para o arquivo PHP que retorna o HTML
        fetch('../../controllers/AlunoController.php', {
            method: 'POST',
            body: data2
        })
        .then(response => response.text()) // Espera a resposta como texto (HTML)
        .then(html => {
           
            resultado2.innerHTML = html;

          
        })
        .catch(error => {
            resultado2.innerHTML = "<p>Ocorreu um erro ao carregar os dados.</p>";
        });
    });

    // Função para recarregar o CSS
    function recarregarCSS() {
        // Seleciona todos os links de estilos
        const links = document.querySelectorAll('link[rel="stylesheet"]');

        links.forEach(link => {
            // Adiciona um timestamp como parâmetro para evitar cache
            const href = link.getAttribute('href').split('?')[0]; // Remove parâmetros anteriores
            link.setAttribute('href', `${href}?v=${Date.now()}`);
        });
    }



// Chama a função uma vez ao carregar a página



resultado.addEventListener('click', (event) => {
    if (event.target.classList.contains('ativar')) { // Verifica se o elemento clicado tem a classe "ativar"
        event.preventDefault();

        const linha = event.target.closest('.linha'); // Seleciona o elemento "linha" mais próximo
        const dados = linha.dataset;

        const formData = new FormData();
        formData.append('idativar', dados.id);

        fetch('../../controllers/FormController.php', {
            method: 'POST',
            body: formData,
        })
            .then((response) => response.text())
            .then((data) => {
                document.getElementById('popup-message').innerHTML = data;

                document.getElementById('popupalunos').classList.add('show');
                document.getElementById('overlay').classList.add('show');

                setTimeout(function () {
                    closePopup();
                }, 1800);

              
            })
            .catch((error) => {
                console.error('Erro:', error);
                document.getElementById('popup-message').innerHTML = 'Erro na comunicação com o servidor.';
                document.getElementById('popupalunos').classList.add('show');
                document.getElementById('overlay').classList.add('show');
            });
    }
});
atualizaAtivados(1);
atualizaDesativados(1);
</script>


</body>
</html>