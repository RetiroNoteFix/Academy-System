<?php
include '../core/config.php';
include '../core/auth.php';
?>

<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <!--GERAIS-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/academy/assets/style/globalstyle.css" rel="stylesheet">
    <title><?php echo("$appname");?> - Cadastrar Aluno</title>
    <!--FIM DOS GERAIS-->
    <!--GOOGLE FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <!--FIM DO GOOGLE FONTS-->
</head>

<body>
<div class="menulateral">
        <div class="logo" style="background-color:<?php echo ("$corlinhasuperiormenu");?>">
            <h1><?php print_r("$appname");?></h1>
        </div>
        <!--FIM DA LOGO-->
        <div class="user">
            <div class="box">
                <div class="userimg">
                    <?xml version="1.0" encoding="utf-8"?><svg version="1.1" id="Layer_1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 122.88 122.88" fill="#fff" xml:space="preserve">
                        <g>
                            <path
                                d="M61.44,0c8.32,0,16.25,1.66,23.5,4.66l0.11,0.05c7.47,3.11,14.2,7.66,19.83,13.3l0,0c5.66,5.65,10.22,12.42,13.34,19.95 c3.01,7.24,4.66,15.18,4.66,23.49c0,8.32-1.66,16.25-4.66,23.5l-0.05,0.11c-3.12,7.47-7.66,14.2-13.3,19.83l0,0 c-5.65,5.66-12.42,10.22-19.95,13.34c-7.24,3.01-15.18,4.66-23.49,4.66c-8.31,0-16.25-1.66-23.5-4.66l-0.11-0.05 c-7.47-3.11-14.2-7.66-19.83-13.29L18,104.87C12.34,99.21,7.78,92.45,4.66,84.94C1.66,77.69,0,69.76,0,61.44s1.66-16.25,4.66-23.5 l0.05-0.11c3.11-7.47,7.66-14.2,13.29-19.83L18.01,18c5.66-5.66,12.42-10.22,19.94-13.34C45.19,1.66,53.12,0,61.44,0L61.44,0z M16.99,94.47l0.24-0.14c5.9-3.29,21.26-4.38,27.64-8.83c0.47-0.7,0.97-1.72,1.46-2.83c0.73-1.67,1.4-3.5,1.82-4.74 c-1.78-2.1-3.31-4.47-4.77-6.8l-4.83-7.69c-1.76-2.64-2.68-5.04-2.74-7.02c-0.03-0.93,0.13-1.77,0.48-2.52 c0.36-0.78,0.91-1.43,1.66-1.93c0.35-0.24,0.74-0.44,1.17-0.59c-0.32-4.17-0.43-9.42-0.23-13.82c0.1-1.04,0.31-2.09,0.59-3.13 c1.24-4.41,4.33-7.96,8.16-10.4c2.11-1.35,4.43-2.36,6.84-3.04c1.54-0.44-1.31-5.34,0.28-5.51c7.67-0.79,20.08,6.22,25.44,12.01 c2.68,2.9,4.37,6.75,4.73,11.84l-0.3,12.54l0,0c1.34,0.41,2.2,1.26,2.54,2.63c0.39,1.53-0.03,3.67-1.33,6.6l0,0 c-0.02,0.05-0.05,0.11-0.08,0.16l-5.51,9.07c-2.02,3.33-4.08,6.68-6.75,9.31C73.75,80,74,80.35,74.24,80.7 c1.09,1.6,2.19,3.2,3.6,4.63c0.05,0.05,0.09,0.1,0.12,0.15c6.34,4.48,21.77,5.57,27.69,8.87l0.24,0.14 c6.87-9.22,10.93-20.65,10.93-33.03c0-15.29-6.2-29.14-16.22-39.15c-10-10.03-23.85-16.23-39.14-16.23 c-15.29,0-29.14,6.2-39.15,16.22C12.27,32.3,6.07,46.15,6.07,61.44C6.07,73.82,10.13,85.25,16.99,94.47L16.99,94.47L16.99,94.47z" />
                        </g>
                    </svg>
                </div>
                <!--imagem do usuário-->
                <div class="username">
                    <p>Olá, <?php echo ($usuario_nome);?></p>
                </div>
                <div class="status">
                    <div class="">
                    <a href="../core/logout.php"><button class="sairbtn"><u>Sair</u></button></a>
                    </div>
                </div>
            </div>
            <!--FIM DO BOX DO USUARIO-->
        </div>
        <!--FIM DO USUÁRIO-->
        <div class="box">
            <div class="options" id="optHomeA">
                <div class="img">
                    <svg fill="#fff" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 495.398 495.398" xml:space="preserve">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <g>
                                <g>
                                    <g>
                                        <path
                                            d="M487.083,225.514l-75.08-75.08V63.704c0-15.682-12.708-28.391-28.413-28.391c-15.669,0-28.377,12.709-28.377,28.391 v29.941L299.31,37.74c-27.639-27.624-75.694-27.575-103.27,0.05L8.312,225.514c-11.082,11.104-11.082,29.071,0,40.158 c11.087,11.101,29.089,11.101,40.172,0l187.71-187.729c6.115-6.083,16.893-6.083,22.976-0.018l187.742,187.747 c5.567,5.551,12.825,8.312,20.081,8.312c7.271,0,14.541-2.764,20.091-8.312C498.17,254.586,498.17,236.619,487.083,225.514z">
                                        </path>
                                        <path
                                            d="M257.561,131.836c-5.454-5.451-14.285-5.451-19.723,0L72.712,296.913c-2.607,2.606-4.085,6.164-4.085,9.877v120.401 c0,28.253,22.908,51.16,51.16,51.16h81.754v-126.61h92.299v126.61h81.755c28.251,0,51.159-22.907,51.159-51.159V306.79 c0-3.713-1.465-7.271-4.085-9.877L257.561,131.836z">
                                        </path>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
                <!--fim da imagem da opção-->
                <a href="../interfaces/painel.php">Início</a>
            </div>
            <!--FIM DAS OPÇÕES-->
            <div class="options" id="optAlunosA">
                <div class="img">
                <svg fill="#fff" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="924 578 200 200"
                            enable-background="new 924 578 200 200" xml:space="preserve" stroke="#fff">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g>
                                    <g>
                                        <path
                                            d="M984.585,638.942c0,13.999-9.609,25.348-21.462,25.348c-11.852,0-21.459-11.349-21.459-25.348 c0-13.998,9.607-25.346,21.459-25.346C974.976,613.596,984.585,624.944,984.585,638.942z">
                                        </path>
                                        <path
                                            d="M987.585,683.641c1.55-0.945,3.265-1.561,5.041-1.855c-3.606-5.088-6.161-10.546-7.637-17.078 c-0.404-2.387-3.672-2.667-6.102-0.687c-4.546,3.706-9.849,6.186-15.765,6.186c-6.03,0-11.577-2.399-16.024-6.414 c-1.419-1.282-3.51-1.476-5.143-0.479c-8.443,5.158-14.834,13.344-17.622,23.067c-0.749,2.605-0.223,5.42,1.411,7.588 c1.636,2.166,4.192,3.443,6.906,3.443h38.668C975.947,692.072,981.41,687.41,987.585,683.641z">
                                        </path>
                                    </g>
                                    <g>
                                        <path
                                            d="M1063.416,638.942c0,13.999,9.608,25.348,21.461,25.348c11.854,0,21.46-11.349,21.46-25.348 c0-13.998-9.606-25.346-21.46-25.346C1073.024,613.596,1063.416,624.944,1063.416,638.942z">
                                        </path>
                                        <path
                                            d="M1060.415,683.641c-1.55-0.945-3.266-1.561-5.041-1.855c3.606-5.088,6.161-10.546,7.637-17.078 c0.405-2.387,3.673-2.667,6.103-0.687c4.546,3.706,9.848,6.186,15.764,6.186c6.029,0,11.577-2.399,16.025-6.414 c1.419-1.282,3.509-1.476,5.142-0.479c8.444,5.158,14.836,13.344,17.622,23.067c0.748,2.605,0.223,5.42-1.41,7.588 c-1.637,2.166-4.192,3.443-6.905,3.443h-38.67C1072.053,692.072,1066.591,687.41,1060.415,683.641z">
                                        </path>
                                    </g>
                                    <g>
                                        <path
                                            d="M1082.475,725.451c-4.198-14.654-13.72-27.045-26.326-34.992c-2.487-1.566-5.715-1.313-7.921,0.631 c-6.766,5.959-15.138,9.506-24.228,9.506c-9.269,0-17.791-3.686-24.626-9.855c-2.182-1.971-5.393-2.268-7.902-0.734 c-12.977,7.924-22.799,20.504-27.082,35.445c-1.151,4.008-0.344,8.328,2.166,11.662c2.516,3.33,6.443,5.291,10.615,5.291h92.523 c4.173,0,8.103-1.955,10.618-5.291C1082.823,733.779,1083.626,729.463,1082.475,725.451z">
                                        </path>
                                        <path
                                            d="M1056.981,652.547c0,21.513-14.766,38.955-32.981,38.955c-18.214,0-32.979-17.442-32.979-38.955 c0-21.515,14.765-38.951,32.979-38.951C1042.216,613.596,1056.981,631.033,1056.981,652.547z">
                                        </path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                </div>
                <!--fim da imagem da opção-->
                <a href="../interfaces/alunos.php">Alunos</a>
            </div>
            <div class="options" id="optPagamento">
                <div class="img">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M19.5 12C19.5 16.1421 16.1421 19.5 12 19.5C7.85786 19.5 4.5 16.1421 4.5 12C4.5 7.85786 7.85786 4.5 12 4.5C16.1421 4.5 19.5 7.85786 19.5 12ZM21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12ZM10.5 9L9.75 9.75V12L10.5 12.75H12.75V13.5H9.75V15H11.25V15.75H12.75V15H13.5L14.25 14.25V12L13.5 11.25H11.25V10.5H14.25V9H12.75V8.25H11.25V9H10.5Z" fill="#ffffff"></path> </g></svg>
                </div>
                <!--fim da imagem da opção-->
                <a href="../interfaces/pagamentos.php">Pagamentos</a>
            </div>
            <div class="options" id="optUsuario">
                <div class="img">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M13 20V18C13 15.2386 10.7614 13 8 13C5.23858 13 3 15.2386 3 18V20H13ZM13 20H21V19C21 16.0545 18.7614 14 16 14C14.5867 14 13.3103 14.6255 12.4009 15.6311M11 7C11 8.65685 9.65685 10 8 10C6.34315 10 5 8.65685 5 7C5 5.34315 6.34315 4 8 4C9.65685 4 11 5.34315 11 7ZM18 9C18 10.1046 17.1046 11 16 11C14.8954 11 14 10.1046 14 9C14 7.89543 14.8954 7 16 7C17.1046 7 18 7.89543 18 9Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                </div>
                <!--fim da imagem da opção-->
                <a href="../interfaces/usuarios.php">Usuários</a>
</div>
<div class="options" id="optConfig">
                <div class="img">
                    <svg id="icon-config" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12 8.25C9.92894 8.25 8.25 9.92893 8.25 12C8.25 14.0711 9.92894 15.75 12 15.75C14.0711 15.75 15.75 14.0711 15.75 12C15.75 9.92893 14.0711 8.25 12 8.25ZM9.75 12C9.75 10.7574 10.7574 9.75 12 9.75C13.2426 9.75 14.25 10.7574 14.25 12C14.25 13.2426 13.2426 14.25 12 14.25C10.7574 14.25 9.75 13.2426 9.75 12Z"
                                fill="#ffffff"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M11.9747 1.25C11.5303 1.24999 11.1592 1.24999 10.8546 1.27077C10.5375 1.29241 10.238 1.33905 9.94761 1.45933C9.27379 1.73844 8.73843 2.27379 8.45932 2.94762C8.31402 3.29842 8.27467 3.66812 8.25964 4.06996C8.24756 4.39299 8.08454 4.66251 7.84395 4.80141C7.60337 4.94031 7.28845 4.94673 7.00266 4.79568C6.64714 4.60777 6.30729 4.45699 5.93083 4.40743C5.20773 4.31223 4.47642 4.50819 3.89779 4.95219C3.64843 5.14353 3.45827 5.3796 3.28099 5.6434C3.11068 5.89681 2.92517 6.21815 2.70294 6.60307L2.67769 6.64681C2.45545 7.03172 2.26993 7.35304 2.13562 7.62723C1.99581 7.91267 1.88644 8.19539 1.84541 8.50701C1.75021 9.23012 1.94617 9.96142 2.39016 10.5401C2.62128 10.8412 2.92173 11.0602 3.26217 11.2741C3.53595 11.4461 3.68788 11.7221 3.68786 12C3.68785 12.2778 3.53592 12.5538 3.26217 12.7258C2.92169 12.9397 2.62121 13.1587 2.39007 13.4599C1.94607 14.0385 1.75012 14.7698 1.84531 15.4929C1.88634 15.8045 1.99571 16.0873 2.13552 16.3727C2.26983 16.6469 2.45535 16.9682 2.67758 17.3531L2.70284 17.3969C2.92507 17.7818 3.11058 18.1031 3.28089 18.3565C3.45817 18.6203 3.64833 18.8564 3.89769 19.0477C4.47632 19.4917 5.20763 19.6877 5.93073 19.5925C6.30717 19.5429 6.647 19.3922 7.0025 19.2043C7.28833 19.0532 7.60329 19.0596 7.8439 19.1986C8.08452 19.3375 8.24756 19.607 8.25964 19.9301C8.27467 20.3319 8.31403 20.7016 8.45932 21.0524C8.73843 21.7262 9.27379 22.2616 9.94761 22.5407C10.238 22.661 10.5375 22.7076 10.8546 22.7292C11.1592 22.75 11.5303 22.75 11.9747 22.75H12.0252C12.4697 22.75 12.8407 22.75 13.1454 22.7292C13.4625 22.7076 13.762 22.661 14.0524 22.5407C14.7262 22.2616 15.2616 21.7262 15.5407 21.0524C15.686 20.7016 15.7253 20.3319 15.7403 19.93C15.7524 19.607 15.9154 19.3375 16.156 19.1985C16.3966 19.0596 16.7116 19.0532 16.9974 19.2042C17.3529 19.3921 17.6927 19.5429 18.0692 19.5924C18.7923 19.6876 19.5236 19.4917 20.1022 19.0477C20.3516 18.8563 20.5417 18.6203 20.719 18.3565C20.8893 18.1031 21.0748 17.7818 21.297 17.3969L21.3223 17.3531C21.5445 16.9682 21.7301 16.6468 21.8644 16.3726C22.0042 16.0872 22.1135 15.8045 22.1546 15.4929C22.2498 14.7697 22.0538 14.0384 21.6098 13.4598C21.3787 13.1586 21.0782 12.9397 20.7378 12.7258C20.464 12.5538 20.3121 12.2778 20.3121 11.9999C20.3121 11.7221 20.464 11.4462 20.7377 11.2742C21.0783 11.0603 21.3788 10.8414 21.6099 10.5401C22.0539 9.96149 22.2499 9.23019 22.1547 8.50708C22.1136 8.19546 22.0043 7.91274 21.8645 7.6273C21.7302 7.35313 21.5447 7.03183 21.3224 6.64695L21.2972 6.60318C21.0749 6.21825 20.8894 5.89688 20.7191 5.64347C20.5418 5.37967 20.3517 5.1436 20.1023 4.95225C19.5237 4.50826 18.7924 4.3123 18.0692 4.4075C17.6928 4.45706 17.353 4.60782 16.9975 4.79572C16.7117 4.94679 16.3967 4.94036 16.1561 4.80144C15.9155 4.66253 15.7524 4.39297 15.7403 4.06991C15.7253 3.66808 15.686 3.2984 15.5407 2.94762C15.2616 2.27379 14.7262 1.73844 14.0524 1.45933C13.762 1.33905 13.4625 1.29241 13.1454 1.27077C12.8407 1.24999 12.4697 1.24999 12.0252 1.25H11.9747ZM10.5216 2.84515C10.5988 2.81319 10.716 2.78372 10.9567 2.76729C11.2042 2.75041 11.5238 2.75 12 2.75C12.4762 2.75 12.7958 2.75041 13.0432 2.76729C13.284 2.78372 13.4012 2.81319 13.4783 2.84515C13.7846 2.97202 14.028 3.21536 14.1548 3.52165C14.1949 3.61826 14.228 3.76887 14.2414 4.12597C14.271 4.91835 14.68 5.68129 15.4061 6.10048C16.1321 6.51968 16.9974 6.4924 17.6984 6.12188C18.0143 5.9549 18.1614 5.90832 18.265 5.89467C18.5937 5.8514 18.9261 5.94047 19.1891 6.14228C19.2554 6.19312 19.3395 6.27989 19.4741 6.48016C19.6125 6.68603 19.7726 6.9626 20.0107 7.375C20.2488 7.78741 20.4083 8.06438 20.5174 8.28713C20.6235 8.50382 20.6566 8.62007 20.6675 8.70287C20.7108 9.03155 20.6217 9.36397 20.4199 9.62698C20.3562 9.70995 20.2424 9.81399 19.9397 10.0041C19.2684 10.426 18.8122 11.1616 18.8121 11.9999C18.8121 12.8383 19.2683 13.574 19.9397 13.9959C20.2423 14.186 20.3561 14.29 20.4198 14.373C20.6216 14.636 20.7107 14.9684 20.6674 15.2971C20.6565 15.3799 20.6234 15.4961 20.5173 15.7128C20.4082 15.9355 20.2487 16.2125 20.0106 16.6249C19.7725 17.0373 19.6124 17.3139 19.474 17.5198C19.3394 17.72 19.2553 17.8068 19.189 17.8576C18.926 18.0595 18.5936 18.1485 18.2649 18.1053C18.1613 18.0916 18.0142 18.045 17.6983 17.8781C16.9973 17.5075 16.132 17.4803 15.4059 17.8995C14.68 18.3187 14.271 19.0816 14.2414 19.874C14.228 20.2311 14.1949 20.3817 14.1548 20.4784C14.028 20.7846 13.7846 21.028 13.4783 21.1549C13.4012 21.1868 13.284 21.2163 13.0432 21.2327C12.7958 21.2496 12.4762 21.25 12 21.25C11.5238 21.25 11.2042 21.2496 10.9567 21.2327C10.716 21.2163 10.5988 21.1868 10.5216 21.1549C10.2154 21.028 9.97201 20.7846 9.84514 20.4784C9.80512 20.3817 9.77195 20.2311 9.75859 19.874C9.72896 19.0817 9.31997 18.3187 8.5939 17.8995C7.86784 17.4803 7.00262 17.5076 6.30158 17.8781C5.98565 18.0451 5.83863 18.0917 5.73495 18.1053C5.40626 18.1486 5.07385 18.0595 4.81084 17.8577C4.74458 17.8069 4.66045 17.7201 4.52586 17.5198C4.38751 17.314 4.22736 17.0374 3.98926 16.625C3.75115 16.2126 3.59171 15.9356 3.4826 15.7129C3.37646 15.4962 3.34338 15.3799 3.33248 15.2971C3.28921 14.9684 3.37828 14.636 3.5801 14.373C3.64376 14.2901 3.75761 14.186 4.0602 13.9959C4.73158 13.5741 5.18782 12.8384 5.18786 12.0001C5.18791 11.1616 4.73165 10.4259 4.06021 10.004C3.75769 9.81389 3.64385 9.70987 3.58019 9.62691C3.37838 9.3639 3.28931 9.03149 3.33258 8.7028C3.34348 8.62001 3.37656 8.50375 3.4827 8.28707C3.59181 8.06431 3.75125 7.78734 3.98935 7.37493C4.22746 6.96253 4.3876 6.68596 4.52596 6.48009C4.66055 6.27983 4.74468 6.19305 4.81093 6.14222C5.07395 5.9404 5.40636 5.85133 5.73504 5.8946C5.83873 5.90825 5.98576 5.95483 6.30173 6.12184C7.00273 6.49235 7.86791 6.51962 8.59394 6.10045C9.31998 5.68128 9.72896 4.91837 9.75859 4.12602C9.77195 3.76889 9.80512 3.61827 9.84514 3.52165C9.97201 3.21536 10.2154 2.97202 10.5216 2.84515Z"
                                fill="#ffffff"></path>
                        </g>
                    </svg>
                </div>
                <!--fim da imagem da opção-->
                <a>Configurações</a>
            </div>
</div>
            <!--FIM DAS OPÇÕES-->
        <!--FIM DO BOX DAS OPÇÕES-->
    </div><!-- FIM DO MENU LATERAL-->
    <div class="linhasuperior" id="linhasuperiorf" style='background-color:<?php echo("$corlinhasuperior");?>'></div>
    <!--fim da linha superior-->
    <div class="painel" id=painelf>

        <div class="titulo" id="titulof">

            <h1 id="h1titulof">Adicionar Aluno</h1>
        </div>
        <!--fim do titulo-->
        <div class="dashboard" id="dashboardf">
            <div class="login">
                <form action="" id="btncadastrar" method="POST">
                    <div class="fieldsetcontainer">
                        <fieldset>
                            <label for="nomealuno">NOME:<span>*</span></label>
                            <div class="alinharinput">
                                <input type="name" name="nomealuno" maxlength="255" required><br>
                            </div>
                            <!--fim do alinharinput-->
                            <label for="rg">RG Nº:</label>
                            <div class="alinharinput">
                                <input id="rg" type="text" name="rg" placeholder="00.000.000-00" maxlength="13"><br>
                            </div>
                            <!--fim do alinharinput-->
                            <label for="cpf">CPF Nº:</label>
                            <div class="alinharinput">
                                <input id="cpf" type="text" name="cpf"  maxlength="14" placeholder="000.000.000-00"><br>
                            </div>
                            <!--fim do alinharinput-->
                            <label for="endereco">ENDEREÇO:</label>
                            <div class="alinharinput">
                                <input type="text" name="endereco" maxlength="255"><br>
                            </div>
                            <!--fim do alinharinput-->
                            <label for="bairro">BAIRRO:</label>
                            <div class="alinharinput">
                                <input type="text" name="bairro"><br>
                            </div>
                            <!--fim do alinharinput-->
                            <label for="cidade">CIDADE:</label>
                            <div class="alinharinput">
                                <input type="text" value="Retirolândia" name="cidade">
</div>
                            <label for="cep">CEP:</label>
                            <div class="alinharinput">
                                <input type="text" placeholder="0000-0000"name="cep"><br>
                            </div>
                            <!--fim do alinharinput-->
                            <label for="telefone">TELEFONE:</label>
                            <div class="alinharinput">
                                <input type="text" id="telefone" placeholder="(00)00000-0000" name="telefone"><br>
                            </div>
                            <label for="telefone2">TELEFONE DE ALGUM FAMILIAR:</label>
                            <div class="alinharinput">
                                <input type="text" id="telefone2" placeholder="(00)00000-0000" name="telefone2"><br>
                            </div>
                            <!--fim do alinharinput-->
                            <label for="profissao">PROFISSÃO:</label>
                            <div class="alinharinput">
                                <input type="text" name="profissao" maxlength="25"><br>
                            </div>
                            <!--fim do alinharinput-->
                            <label for="datanascimento">DATA DE NASCIMENTO:</label>
                            <div class="alinharinput">
                                <input type="text" id="data" placeholder="00/00/0000" maxlength="10" name="datanascimento"><br>
                            </div>
                            <!--fim do alinharinput-->
                            <label for="escolaridade">ESCOLARIDADE:</label>
                            <div class="alinharinput">
                                <input type="text" name="escolaridade"><br>
                            </div>
                            <!--fim do alinharinput-->
                            <label for="estadocivil">ESTADO CIVIL:</label>
                            <div class="alinharinput">
                            <select id="cidadef" name="estadocivil"><br>
                            <option value="">Selecione...</option>
                            <option value="Solteiro(a)">Solteiro(a)</option>
                            <option value="Casado(a)">Casado(a)</option>
                            <option value="Divorciado(a)">Divorciado(a)</option>
                            <option value="Viúvo(a)">Viúvo(a)</option>
                            <option value="Separado Judicialmente">Separado Judicialmente</option>
</select>
                            </div>
                            <!--fim do alinharinput-->
                            <label for="tiposanguineo">TIPO SANGUÍNEO:</label>
                            <div class="alinharinput">
                            <select id="cidadef" name="tiposanguineo"><br>
                            <option value="">Selecione...</option>
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
                            <!--fim do alinharinput-->
                            <label for="modalidade">MODALIDADE DA ATIVIDADE FÍSICA:</label>
                            <div class="alinharinput">
                            <select id="cidadef" name="modalidade"><br>
                            <option value="">Selecione...</option>
                            <option value="MUSCULAÇÃO">MUSCULAÇÃO</option>
                            <option value="PILATES">PILATES</option>
</select>
                            </div>
                            <!--fim do alinharinput-->
                            <label for="comosoubedaacademia">COMO SOUBE DA ACADEMIA:</label>
                            <div class="alinharinput">
                                <input type="text" name="comosoubedaacademia"><br>
                            </div>
                            <!--fim do alinharinput-->
                            <label for="objetivo">OBJETIVO DA ATIVIDADE FÍSICA:</label>
                            <div class="alinharinput">
                                <input type="text" name="objetivo"><br>
                            </div>
                            <!--fim do alinharinput-->
                            <label for="idade">IDADE:</label>
                            <div class="alinharinput">
                                <input id="idade"type="text" name="idade"><br>
                            </div>
                            <!--fim do alinharinput-->
                            <label for="infarto">INFARTO:</label>
                            <div class="alinharinput">
                            <select id="cidadef" name="infarto"><br>
                            <option value="">Selecione...</option>
                            <option value="SIM">SIM</option>
                            <option value="NÃO">NÃO</option>
</select>
                            </div>
                            <!--fim do alinharinput-->
                            <label for="doencacardiaca">DOENÇA CARDÍACA:</label>
                            <div class="alinharinput">
                         <input type="text" name="doencacardiaca">
                            </div>
                            <!--fim do alinharinput-->
                            <label for="derrame">DERRAME:</label>
                            <div class="alinharinput">
                            <select id="cidadef" name="derrame"><br>
                            <option value="">Selecione...</option>
                            <option value="SIM">SIM</option>
                            <option value="NÃO">NÃO</option>
</select>
                            </div>
                            <!--fim do alinharinput-->
                           
                            
                        </fieldset>
                        <fieldset id="ladodireito">
                        <label for="peso">PESO:</label>
                            <div class="alinharinput">
                                <input class="ajustainput" id="peso" type="text" name="peso"><br>
                            </div>
                            <!--fim do alinharinput-->
                            <label for="altura">ALTURA</label>
                            <div class="alinharinput">
                                <input  class="ajustainput" id="altura" type="text" name="altura"><br>
                            </div>
                            <!--fim do alinharinput-->
                            
                            <label for="quemodalidadejafez">QUE MODALIDADE FAZ OU JÁ FEZ:</label>
                            <div class="alinharinput">
                                <input  class="ajustainput" type="text" name="quemodalidadejafez" maxlength="255"><br>
                            </div>
                           
                            <label for="cirurgia">JÁ FEZ CIRURGIA, QUAL:</label>
                            <div class="alinharinput">
                                <input  class="ajustainput" type="text" name="cirurgia"><br>
                            </div>
                            <!--fim do alinharinput-->
                            <label for="dormebem">DORME BEM, QUANTAS HORAS:</label>
                            <div class="alinharinput">
                                <input  class="ajustainput" type="text" name="dormebem"><br>
                            </div>
                            <!--fim do alinharinput-->
                            <label for="lesaoarticular">LESÃO ARTICULAR:</label>
                            <div class="alinharinput">
                                <input class="ajustainput" type="text" name="lesaoarticular"><br>
                            </div>
                            <!--fim do alinharinput-->
                            <label for="problemadecoluna">PROBLEMA DE COLUNA:</label>
                            <div class="alinharinput">
                                <input  class="ajustainput" type="text" name="problemadecoluna"><br>
                            </div>
                            <!--fim do alinharinput-->
                            <label for="tempomedico">QUANTO TEMPO FAZ QUE NÃO VAI AO MÉDICO:</label>
                            <div class="alinharinput">
                                <input   class="ajustainput" type="text" name="tempomedico"><br>
                            </div>
                            <!--fim do alinharinput-->
                            <label for="medicamento">USA ALGUM MEDICAMENTO:</label>
                            <div class="alinharinput">
                                <input  class="ajustainput" type="text" name="medicamento"><br>
                            </div>
                            <!--fim do alinharinput-->
                            <label for="problemasaude">TEM ALGUM PROBLEMA DE SAÚSE, QUAL:</label>
                            <div class="alinharinput">
                                <input  class="ajustainput" type="text" name="problemasaude"><br>
                            </div>
                            <label for="pressao">PRESSÃO ARTERIAL:</label>
<div class="alinharinput">
    <select name="pressao">
        <option value="" selected>Selecione...</option>
        <option value="BAIXA">BAIXA</option>
        <option value="NORMAL">NORMAL</option>
        <option value="ALTA">ALTA</option>
    </select><br>
</div>

<label for="varizes">TEM VARIZES:</label>
<div class="alinharinput">
    <select name="varizes">
        <option value="" selected>Selecione...</option>
        <option value="SIM">SIM</option>
        <option value="NÃO">NÃO</option>
    </select><br>
</div>

<label for="fuma">FUMA:</label>
<div class="alinharinput">
    <select name="fuma">
        <option value="" selected>Selecione...</option>
        <option value="SIM">SIM</option>
        <option value="NÃO">NÃO</option>
    </select><br>
</div>

<label for="dieta">FAZ DIETA:</label>
<div class="alinharinput">
    <select name="dieta">
        <option value="" selected>Selecione...</option>
        <option value="SIM">SIM</option>
        <option value="NÃO">NÃO</option>
        <option value="AS VEZES">AS VEZES</option>
    </select><br>
</div>

<label for="bebidaalcoolica">FAZ USO DE BEBIBA ALCOÓLICA:</label>
<div class="alinharinput">
    <select name="bebidaalcoolica">
        <option value="" selected>Selecione...</option>
        <option value="SIM">SIM</option>
        <option value="NÃO">NÃO</option>
        <option value="AS VEZES">AS VEZES</option>
    </select><br>
</div>

<label for="sedentario">SEDENTÁRIO:</label>
<div class="alinharinput">
    <select name="sedentario">
        <option value="" selected>Selecione...</option>
        <option value="SIM">SIM</option>
        <option value="NÃO">NÃO</option>
        <option value="MAIS OU MENOS">MAIS OU MENOS</option>
    </select><br>
</div>

<label for="diabetes">DIABETES:</label>
<div class="alinharinput">
    <select name="diabetes">
        <option value="" selected>Selecione...</option>
        <option value="SIM">SIM</option>
        <option value="NÃO">NÃO</option>
    </select><br>
</div>

<label for="obesidade">OBESIDADE:</label>
<div class="alinharinput">
    <select name="obesidade">
        <option value="" selected>Selecione...</option>
        <option value="SIM">SIM</option>
        <option value="NÃO">NÃO</option>
    </select><br>
</div>

<label for="colesterol">COLESTEROL ELEVADO:</label>
<div class="alinharinput">
    <select name="colesterol">
        <option value="" selected>Selecione...</option>
        <option value="SIM">SIM</option>
        <option value="NÃO">NÃO</option>
    </select><br>
</div>


<div class="alinharinput" style="display: none;">
    <select name="pressaoalta">
        <option value="" selected>Selecione...</option>
        <option value="SIM">SIM</option>
        <option value="NÃO">NÃO</option>
    </select><br>
</div>


                        </fieldset>
                            </div>
                            <br>
<h1 id="h1parq">PAR-Q (QUESTIONÁRIO PARA PESSOAS COM IDADE ENTRE 15 E 69 ANOS)</h1>
<table id="par_q" border="1">
<tr>
<th>SIM</th>
<th>NÃO</th>
<th>QUESTÕES</th>
</tr>
<tr>
<td><label>
      <input type="checkbox" value="sim" name="par_q1">
    </label></td>
<td>

<label>
      <input type="checkbox" value="não" name="par_q1">
    </label>

</td>
<td>1- Seu médico alguma vez disse que você tem problema no coração e que deve apenas praticar atividades físicas recomendadas por médico?</td>
</tr>
<tr>
<td><label>
      <input type="checkbox" value="sim" name="par_q2">
    </label></td>
<td>

<label>
      <input type="checkbox" value="não" name="par_q2">
    </label>

</td>
<td>2- Você sente dor no peito quanto pratica atividade física?</td>
</tr>
<tr>
<td><label>
      <input type="checkbox"  value="sim" name="par_q3">
    </label></td>
<td>

<label>
      <input type="checkbox" value="não" name="par_q3">
    </label>

</td>
<td>3- No mês passado, você teve dor no peito quanto não estava praticando atividade física?</td>
</tr>
<tr>
<td><label>
      <input type="checkbox" value="sim" name="par_q4">
    </label></td>
<td>

<label>
      <input type="checkbox" value="não" name="par_q4">
    </label>

</td>
<td>4- Você perde o equilíbrio devido a tonturas ou alguma vez perdeu a consciência?</td>
</tr>
<tr>
<td><label>
      <input type="checkbox" value="sim" name="par_q5">
    </label></td>
<td>

<label>
      <input type="checkbox" value="não" name="par_q5">
    </label>

</td>
<td>5- Você tem problema ósseo ou articular que poderia ficar pior por alguma mudança em sua atividade física?</td>
</tr>
<tr>
<td><label>
      <input type="checkbox" value="sim" name="par_q7">
    </label></td>
<td>

<label>
      <input type="checkbox" value="não" name="par_q6">
    </label>

</td>
<td>6- Seu médico está atualmente receitando algum remédio (por exemplo, diuréticos) para pressão arterial ou problema cardíaco?</td>
</tr>
<tr>
<td>

<label>
      <input type="checkbox" value="sim" name="par_q7">
    </label>
</td>
<td>

<label>
      <input type="checkbox" value="não" name="par_q7">
    </label>

</td>
<td>7- Você sabe de qualquer outra razão pela qual não deva praticar atividade física?</td>
</tr>
</table>
<br>
<h1 id=h1medidas>MEDIDAS ANTROPOMÉTRICAS</h1>

<table id="par_q" border="1">
  <tr>
    <th id="th">OBSERVAÇÕES:</th>
    <td><input id="circunferencia"style="margin-right: 100px;" type="text" name="circunferencia" placeholder=""></td>
  </tr>
  <tr>
    <th>TÓRAX:</th>
    <td><input id="torax"style="margin-right: 100px;" type="text" name="torax" placeholder="Centímetros"></td>
  </tr>
  <tr>
    <th>CINTURA:</th>
    <td><input id="cintura"style="margin-right: 100px;" type="text" name="cintura" placeholder="Centímetros"></td>
  </tr>
  <tr>
    <th>ABDOME:</th>
    <td><input id="abdome"style="margin-right: 100px;" type="text" name="abdome" placeholder="Centímetros"></td>
  </tr>
  <tr>
    <th>QUADRIL:</th>
    <td><input id="quadril"style="margin-right: 100px;" type="text" name="quadril" placeholder="Centímetros"></td>
  </tr>
  <tr>
    <th>BRAÇOS (direito e esquerdo):</th>
    <td><input id="bracos"style="margin-right: 100px;" type="text" name="bracos" placeholder="Centímetros"></td>
  </tr>
  <tr>
    <th>ANTEBRAÇOS (direito e esquerdo):</th>
    <td><input id="antebracos"style="margin-right: 100px;" type="text" name="antebracos" placeholder="Centímetros"></td>
  </tr>
  <tr>
    <th>PERNA (direita e esquerda):</th>
    <td><input id="pernas" style="margin-right: 100px;" type="text" name="pernas" placeholder="Centímetros"></td>
  </tr>
  <tr>
    <th>PANTURRILHA (direita e esquerda):</th>
    <td><input id="coxas" style="margin-right: 100px;" type="text" name="coxas" placeholder="Centímetros"></td>
  </tr>
  
</table>
</body>
</html>
                     <BR><BR>
                     <P STYLE="margin-left:45%">PAGAMENTO</P>
                                    <table border="1" style="width: 750px; border-collapse: collapse; text-align: left; margin: 0 auto; font-size: 14px;">
                                       
                                    <thead>
                                            <tr>
                                   
                                                <th style="padding: 5px;width:250px;">Valor</th>
                                                <th style="padding: 5px;width:250px;">Data de Assinatura</th>
                                            </tr>
                                        </thead>
                                       <tbody>
        <tr>
         
            <td style="padding: 5px;"><input  required name="valor" style="padding:5px; transform: translate(0px, 0px);height:25px;"id="janeiro" placeholder="R$0,00" type="text"></td>
            <td style="padding: 5px;"><input  required name="data_pagamento" style="padding:5px; transform: translate(0px, 0px);height:25px;" placeholder="" type="date"></td>
        </tr>
    </tbody>
                                    </table>
                                   
                                
                            
                    <div class="alinharbtn">


                        <button type="submit" id="btncadastro" class="cadastro">
                            <div class="icon">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
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
                                </svg>
                            </div>
                            <!--fim do icone-->
                            <div class="texto">
                                <p>Aluno</p>
                            </div>
                        </button>
                        <a id="btnvoltar" class="cadastro">
                            <div class="icon">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M4 10L3.29289 10.7071L2.58579 10L3.29289 9.29289L4 10ZM21 18C21 18.5523 20.5523 19 20 19C19.4477 19 19 18.5523 19 18L21 18ZM8.29289 15.7071L3.29289 10.7071L4.70711 9.29289L9.70711 14.2929L8.29289 15.7071ZM3.29289 9.29289L8.29289 4.29289L9.70711 5.70711L4.70711 10.7071L3.29289 9.29289ZM4 9L14 9L14 11L4 11L4 9ZM21 16L21 18L19 18L19 16L21 16ZM14 9C17.866 9 21 12.134 21 16L19 16C19 13.2386 16.7614 11 14 11L14 9Z"
                                            fill="#ffffff"></path>
                                    </g>
                                </svg>
                            </div>
                            <!--fim do icone-->
                            <div class="texto">
                                <p>Voltar</p>
                            </div>
                        </a>
                    </div>
                </form>
            </div>
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



    document.getElementById('btncadastrar').addEventListener('submit', function(event) {
        event.preventDefault();

       var form = document.getElementById('btncadastrar');
       var formData = new FormData(form);
        fetch('/academy/assets/php/core/recebe_dados.php', {
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
    var btn = document.getElementById("btnvoltar");
    var btnRefresh = document.getElementById("btnrefresh");
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
        window.location.href = '/academy/assets/php/interfaces/painel.php';
    });
    optAlunos.addEventListener('click', function() {
        window.location.href = '/academy/assets/php/interfaces/alunos.php';
    });
    optPagamento.addEventListener('click', function() {
        window.location.href = '/academy/assets/php/interfaces/pagamentos.php';
    });
    optUsuario.addEventListener('click', function() {
        window.location.href = '/academy/assets/php/interfaces/usuarios.php';
    });
    optConfig.addEventListener('click', function() {
        menuConfig.style.display = "block";
    });
    btn.addEventListener("click", function() {
        window.history.back();
    });
    
    btnRefresh.addEventListener("click", function() {
        location.reload();
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
    const telefoneInput = document.getElementById('telefone2');

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
    let valor = input.value.replace(/\D/g, ''); // Remove caracteres não numéricos

    // Verifica se há número para adicionar "anos"
    if (valor) {
        input.value = `${valor}Kg`;
    } else {
        input.value = ''; // Limpa o campo se não houver número
    }

    // Reposiciona o cursor corretamente
    const posicaoCursor = valor.length; // Mantém o cursor no lugar certo
    input.setSelectionRange(posicaoCursor, posicaoCursor);
});
document.getElementById('altura').addEventListener('input', function (event) {
    const input = event.target;
    let valor = input.value.replace(/[^0-9]/g, ''); // Remove caracteres que não sejam números

    if (valor.length > 1) {
        // Insere o ponto após o primeiro dígito
        valor = valor.slice(0, 1) + '.' + valor.slice(1);
    }

    // Atualiza o campo
    if (valor) {
        input.value = `${valor}M`; // Adiciona "M" somente se houver número
    } else {
        input.value = ''; // Permite que o campo fique vazio
    }

    // Permite apagar completamente, sem interferir no comportamento do cursor
    if (event.inputType === 'deleteContentBackward' && !valor) {
        input.value = ''; // Remove o "M" ao apagar completamente
    }
});
const ids = [
    'torax',
    'cintura',
    'abdome',
    'quadril',
    'bracos',
    'antebracos',
    'coxas',
    'pernas'
];

// Função que aplica a máscara em cada campo
function aplicarMascara(id) {
    document.getElementById(id).addEventListener('input', function (event) {
        const input = event.target;
        let valor = input.value
            .replace(/[^0-9.,]/g, '')  // Remove caracteres que não são números, vírgula ou ponto
            .replace(/,/g, '.');       // Substitui vírgulas por pontos (opcional, para padronizar)

        // Garante que só haja um ponto decimal
        valor = valor.replace(/(\..*?)\..*/g, '$1'); // Remove pontos adicionais após o primeiro

        // Adiciona o sufixo "CM"
        if (valor) {
            input.value = `${valor} CM`; // Adiciona "CM" somente se houver um número válido
        } else {
            input.value = ''; // Permite apagar completamente o campo
        }

        // Ajusta a posição do cursor antes do "CM"
        if (input.selectionStart >= input.value.length - 3) { // Se o cursor estiver no final ou antes do "CM"
            input.setSelectionRange(input.value.length - 3, input.value.length - 3); // Posiciona o cursor antes do "CM"
        }
    });
}

// Aplica a máscara para todos os campos de entrada
ids.forEach(aplicarMascara);

        </script>
</body>

</html>