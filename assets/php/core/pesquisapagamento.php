<?php
// pesquisaaluno.php

require_once 'database.php'; // Inclui a conexão com o banco de dados

// Função para buscar alunos com base na pesquisa
function pesquisapago($pesquisapago) {
    try {
        $database = new Database();
        $conn = $database->getConnection();
        $query = "SELECT 
    alunos.idAluno, 
    alunos.nomeAluno, 
    alunos.rua, 
    alunos.telefone
FROM 
    mensalidades
INNER JOIN 
    alunos 
ON 
    mensalidades.aluno_id = alunos.idAluno
WHERE 
    alunos.nomeAluno LIKE '$pesquisapago%' 
    AND mensalidades.status = 'pago'
GROUP BY 
    alunos.idAluno, alunos.nomeAluno, alunos.rua, alunos.telefone";
        $stmt = $conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erro ao buscar alunos: " . $e->getMessage();
        return [];
    }
}
function pesquisaignorado($pesquisaignorado) {
    try {
        $database = new Database();
        $conn = $database->getConnection();
        $query = "SELECT 
    mensalidades.data_vencimento, 
    alunos.idAluno, 
    alunos.nomeAluno, 
    alunos.rua, 
    alunos.telefone
FROM 
    mensalidades
INNER JOIN 
    alunos 
ON 
    mensalidades.aluno_id = alunos.idAluno
WHERE 
    alunos.nomeAluno LIKE '$pesquisaignorado%' 
    AND mensalidades.status = 'ignorado'
ORDER BY 
    alunos.nomeAluno ASC, mensalidades.data_vencimento ASC";
        $stmt = $conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erro ao buscar alunos: " . $e->getMessage();
        return [];
    }
}
?>

<?php
include 'config.php';
include 'auth.php';
?>

<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <!--GERAIS-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/academy/assets/style/globalstyle.css" rel="stylesheet">
    <title><?php print_r("$appname");?> - Alunos</title>
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
            <div class="options" id="optHomeP">
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
                <a href="painel.php">Início</a>
            </div>
            <!--FIM DAS OPÇÕES-->
            <div class="options" id="optAlunosP">
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
            <div class="options" id="optPagamentoP">
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
                <a href="../usuarios/usuarios.php">Usuários</a>
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
    <div class="menulateral" id="menuConfig">
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
                    <a href="../../../core/logout.php"><button class="sairbtn"><u>Sair</u></button></a>
                    </div>
                </div>
            </div>
            <!--FIM DO BOX DO USUARIO-->
        </div>
        <!--FIM DO USUÁRIO-->
        <div class="config-box">
            <div class="config-title">
                <p>Configurações</p>
            </div>
            <!--FIM DO TÍTULO DAS CONFIGURAÇÕES-->
            <form id="config-form" action="#" method="post" enctype="multipart/form-data">
                <label class="config-label" for="appname">Nome do sistema:</label><br>
                <input type="text" name="appname" value="<?php echo $appname?>">
                <label class="config-label" for="corlinhasuperior">Cor da linha superior:</label><br>
                <input type="text" name="corlinhasuperior" value="<?php echo $corlinhasuperior?>">
                <label class="config-label" for="corlinhasuperiormenu">Cor da linha superior do menu:</label><br>
                <input type="text" name="corlinhasuperiormenu" value="<?php echo $corlinhasuperiormenu?>">
                <label class="config-label" for="foto">Mudar foto de Perfil:</label><br>
                <input class="config-input" type="file" name="foto" id="foto" accept="image/*">
                <div class="button-box"><button class="save-btn" id="save-btn" type="submit">Salvar</button></div>
                <!--FIM DO BOX DO BOTÃO DE SALVAR-->
            </form>
            <div class="button-box"> <button class="back-btn" id="back-btn">Voltar</button></div>
        </div>
</div>
    <div class="linhasuperior" id="linhasuperiorf" style='background-color:<?php echo("$corlinhasuperior");?>'></div>
    <!--fim da linha superior-->
    <div class="painel" id=painelf>

        <div class="titulo" id="titulof">

            <h1 id="h1titulof">Resultados da Busca</h1>
        </div>
        <!--fim do titulo-->
        <div class="dashboardalunos" id="dashboard">
            <div class="linhasuperiorcadastro">
                <div class="alinharbtn">
                    <a href="../cadastros/cadastraraluno.php">
                        <div class="cadastro" id="btncadastro">
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

                        </div>
                        <!--FIM DO CADASTRO-->
                        <a id="btnrefresh" class="cadastro">
                            <div class="icon">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M21 12C21 16.9706 16.9706 21 12 21C9.69494 21 7.59227 20.1334 6 18.7083L3 16M3 12C3 7.02944 7.02944 3 12 3C14.3051 3 16.4077 3.86656 18 5.29168L21 8M3 21V16M3 16H8M21 3V8M21 8H16"
                                            stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </g>
                                </svg>
                            </div>
                            <!--fim do icone-->
                            <div class="texto">
                                <p>Atualizar</p>
                            </div>
                        </a>
                    </a>
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
                  

 <!-- Onde o resultado será mostrado -->
                </div>
            </div>
            <!--fim da linha superior do cadastro-->
            <div class="listafornecedores">
            <table border="1" style="margin-bottom:10px;>
            <div id="resultado"></div>
    <thead>
        <tr>
            <th>Cód.</th>
            <th id="nomealuno">Nome</th>
            <th>Endereço</th>
            <th>Telefone</th>
            <th>Data de Vencimento</th>
            <th>Situação</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php

if (isset($_POST['searchpago'])) {
    pesquisaPagamentopago();
} 
elseif (isset($_POST['searchignorado'])) {
    pesquisaPagamentoIgnorado();
}
function pesquisaPagamentopago(){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $pesquisapago = $_POST['searchpago'];
    if (!empty($pesquisapago)) {
        $resultados = pesquisapago($pesquisapago);

        if (!empty($resultados)) {
            echo "<ul>";
            foreach ($resultados as $aluno) {

                echo "<tr class='linha-aluno1' data-id='{$aluno['idAluno']}' data-nome='{$aluno['nomeAluno']}' data-rua='{$aluno['rua']}' data-telefone='{$aluno['telefone']}'>
                        <td data-id='{$aluno['idAluno']}' class='selected'>{$aluno['idAluno']}</td>
                        <td  class='nomealuno' id='nomealuno'>{$aluno['nomeAluno']}</td>
                        <td>{$aluno['rua']}</td>
                        <td>{$aluno['telefone']}</td>
                        <td><span id='good'>POSSUI PAGAMENTOS<BR>PAGOS</span></td>
                        <td><div class='actions' style='display:none;' alt='Ver Detalhes'><button class='ver-detalhes 'id='acticons' title='Ver Detalhes'> <svg alt='Ver Detalhes' id='svgiconsact' fill='#ffffff' version='1.1' id='Capa_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' viewBox='0 0 442.04 442.04' xml:space='preserve' stroke='#ffffff'><g id='SVGRepo_bgCarrier' stroke-width='0'></g><g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g><g id='SVGRepo_iconCarrier'> <g> <g> <path d='M221.02,341.304c-49.708,0-103.206-19.44-154.71-56.22C27.808,257.59,4.044,230.351,3.051,229.203 c-4.068-4.697-4.068-11.669,0-16.367c0.993-1.146,24.756-28.387,63.259-55.881c51.505-36.777,105.003-56.219,154.71-56.219 c49.708,0,103.207,19.441,154.71,56.219c38.502,27.494,62.266,54.734,63.259,55.881c4.068,4.697,4.068,11.669,0,16.367 c-0.993,1.146-24.756,28.387-63.259,55.881C324.227,321.863,270.729,341.304,221.02,341.304z M29.638,221.021 c9.61,9.799,27.747,27.03,51.694,44.071c32.83,23.361,83.714,51.212,139.688,51.212s106.859-27.851,139.688-51.212 c23.944-17.038,42.082-34.271,51.694-44.071c-9.609-9.799-27.747-27.03-51.694-44.071 c-32.829-23.362-83.714-51.212-139.688-51.212s-106.858,27.85-139.688,51.212C57.388,193.988,39.25,211.219,29.638,221.021z'></path> </g> <g> <path d='M221.02,298.521c-42.734,0-77.5-34.767-77.5-77.5c0-42.733,34.766-77.5,77.5-77.5c18.794,0,36.924,6.814,51.048,19.188 c5.193,4.549,5.715,12.446,1.166,17.639c-4.549,5.193-12.447,5.714-17.639,1.166c-9.564-8.379-21.844-12.993-34.576-12.993 c-28.949,0-52.5,23.552-52.5,52.5s23.551,52.5,52.5,52.5c28.95,0,52.5-23.552,52.5-52.5c0-6.903,5.597-12.5,12.5-12.5 s12.5,5.597,12.5,12.5C298.521,263.754,263.754,298.521,221.02,298.521z'></path> </g> <g> <path d='M221.02,246.021c-13.785,0-25-11.215-25-25s11.215-25,25-25c13.786,0,25,11.215,25,25S234.806,246.021,221.02,246.021z'></path> </g> </g> </g>
                        </svg>
                        </button>
                        <button class='editar'  style='display:none;'id='acticonsedit' title='Editar Aluno'>
                        <svg id='svgiconsact' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg' stroke='#ffffff'><g id='SVGRepo_bgCarrier' stroke-width='0'></g><g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g><g id='SVGRepo_iconCarrier'> <path d='M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z' stroke='#ffffff' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path> <path d='M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13' stroke='#ffffff' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path> </g>
                        </svg>
                        </button>
                        </td>
                    </tr>";
            }
            echo "</ul>";
        } else {
            echo "Nenhum aluno encontrado.";
        }
    } else {
        echo "Por favor, digite um termo de pesquisa.";
    }
}
}

function pesquisaPagamentoIgnorado(){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $pesquisaignorado = $_POST['searchignorado'];
    if (!empty($pesquisaignorado)) {
        $resultados = pesquisaignorado($pesquisaignorado);

        if (!empty($resultados)) {
            echo "<ul>";
            foreach ($resultados as $aluno) {
                $dataVencimento = date('d/m/Y', strtotime($aluno['data_vencimento'])); 
                echo "<tr class='linha-aluno' data-id='{$aluno['idAluno']}' data-nome='{$aluno['nomeAluno']}' data-vencimento='{$dataVencimento}'>
               <td>{$aluno['idAluno']}</td>
                <td class='nomealuno' id='nomealuno'>{$aluno['nomeAluno']}</td>
                <td>{$aluno['rua']}</td>
                <td>{$aluno['telefone']}</td>
                <td>{$dataVencimento}</td>  <!-- Exibindo a data formatada -->
                <td><span>PAGAMENTO <br> IGNORADO</span></td>
                <td id='acoespainel'>
                    <div class='actionspainel'>
                        <button class='finalizarpagamento' id='acticonsfinalizar'>
                           <svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg' stroke='#ffffff'><g id='SVGRepo_bgCarrier' stroke-width='0'></g><g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g><g id='SVGRepo_iconCarrier'> <path fill-rule='evenodd' clip-rule='evenodd' d='M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM16.0303 8.96967C16.3232 9.26256 16.3232 9.73744 16.0303 10.0303L11.0303 15.0303C10.7374 15.3232 10.2626 15.3232 9.96967 15.0303L7.96967 13.0303C7.67678 12.7374 7.67678 12.2626 7.96967 11.9697C8.26256 11.6768 8.73744 11.6768 9.03033 11.9697L10.5 13.4393L12.7348 11.2045L14.9697 8.96967C15.2626 8.67678 15.7374 8.67678 16.0303 8.96967Z' fill='#00a832'></path> </g></svg>
                        </button>
                        <button class='medidas' id='acticonszap'>
                            <svg id='svgiconsact'viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg' stroke='#f7f7f7'><g id='SVGRepo_bgCarrier' stroke-width='0'></g><g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g><g id='SVGRepo_iconCarrier'> <path d='M7 9H17M7 13H17M21 20L17.6757 18.3378C17.4237 18.2118 17.2977 18.1488 17.1656 18.1044C17.0484 18.065 16.9277 18.0365 16.8052 18.0193C16.6672 18 16.5263 18 16.2446 18H6.2C5.07989 18 4.51984 18 4.09202 17.782C3.71569 17.5903 3.40973 17.2843 3.21799 16.908C3 16.4802 3 15.9201 3 14.8V7.2C3 6.07989 3 5.51984 3.21799 5.09202C3.40973 4.71569 3.71569 4.40973 4.09202 4.21799C4.51984 4 5.0799 4 6.2 4H17.8C18.9201 4 19.4802 4 19.908 4.21799C20.2843 4.40973 20.5903 4.71569 20.782 5.09202C21 5.51984 21 6.0799 21 7.2V20Z' stroke='#ffffff' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'></path> </g></svg>
                        </button>
                        <button class='editar' id='acticonsignorar'>
                           <svg viewBox='0 0 512 512' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' fill='#000000'><g id='SVGRepo_bgCarrier' stroke-width='0'></g><g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g><g id='SVGRepo_iconCarrier'> <title>error-filled</title> <g id='Page-1' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'> <g id='add' fill='#d60000' transform='translate(42.666667, 42.666667)'> <path d='M213.333333,3.55271368e-14 C331.136,3.55271368e-14 426.666667,95.5306667 426.666667,213.333333 C426.666667,331.136 331.136,426.666667 213.333333,426.666667 C95.5306667,426.666667 3.55271368e-14,331.136 3.55271368e-14,213.333333 C3.55271368e-14,95.5306667 95.5306667,3.55271368e-14 213.333333,3.55271368e-14 Z M262.250667,134.250667 L213.333333,183.168 L164.416,134.250667 L134.250667,164.416 L183.168,213.333333 L134.250667,262.250667 L164.416,292.416 L213.333333,243.498667 L262.250667,292.416 L292.416,262.250667 L243.498667,213.333333 L292.416,164.416 L262.250667,134.250667 Z' id='Combined-Shape'> </path> </g> </g> </g></svg>
                        </button>
                    </div>
                </td>
            </tr>";
            }
            echo "</ul>";
        } else {
            echo "Nenhum aluno encontrado.";
        }
    } else {
        echo "Por favor, digite um termo de pesquisa.";
    }
}
}
        ?>
    </tbody>
</table>

</div>

<!-- Modal para Exibir Detalhes -->
<div id="modal-aluno" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); padding: 20px; background-color: white; border: 1px solid black; z-index: 1000;">
    <h3>Detalhes do Aluno</h3>
    <p><strong>ID:</strong> <span id="detalhe-id"></span></p>
    <p><strong>Nome:</strong> <span id="detalhe-nome"></span></p>
    <p><strong>Endereço:</strong> <span id="detalhe-endereco"></span></p>
    <p><strong>Telefone:</strong> <span id="detalhe-telefone"></span></p>
    <button onclick="fecharModal()">Fechar</button>
</div>
<div id="modal-bg" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 999;" onclick="fecharModal()"></div>

            </div>
            <!--fim da lista dos fornecedores-->
        </div>
        <!--fim do dasboard-->
    </div>
    <!--FIM DO PAINEL-->
    <div id="popupignorado" class="popup">
<div class="closepop"></div>
<p id="popup-messageoff"></p>
<div id="dadosaluno"></div>
</div>
<div class="overlay" id="overlayoff"></div>

<div id="popupalunos" class="popup">
<div class="closepop"></div>
<p id="popup-message"></p>
<div id="dadosaluno"></div>
<div class="boxopcficha">
<button id="atualizar"><p>Atualizar</p></button><button id="fecharpagamento"><p>Fechar</p></button>
</div>
</div>
<div class="overlay" id="overlay"></div>
<script>
   var optHome = document.getElementById("optHomeP");
    var fecharPagamento = document.getElementById("fecharpagamento");
    var optAlunos = document.getElementById("optAlunosP");
    var optPagamentos = document.getElementById("optPagamentoP");
    var optUsuario = document.getElementById("optUsuario");
    var optConfig = document.getElementById("optConfig");
    var menuConfig = document.getElementById("menuConfig");
    var backBtn = document.getElementById("back-btn");
    var btn = document.getElementById("btnvoltar");
    var btnRefresh = document.getElementById("btnrefresh");
    //adição de eventos (transição ao passar o mouse sobre as opções do menu lateral)
    optHome.addEventListener("mouseover", function() {
        optPagamentos.style.backgroundColor = "rgba(34,45,51,255)"
        optPagamentos.style.border = "none"
    });
    optAlunos.addEventListener("mouseover", function() {
        optPagamentos.style.backgroundColor = "rgba(34,45,51,255)"
        optPagamentos.style.border = "none"
    });
    optUsuario.addEventListener("mouseover", function() {
        optPagamentos.style.backgroundColor = "rgba(34,45,51,255)"
        optPagamentos.style.border = "none"
    });
    optConfig.addEventListener("mouseover", function() {
        optPagamentos.style.backgroundColor = "rgba(34,45,51,255)"
        optPagamentos.style.border = "none"
    });
    //saída do mouse
    optPagamentos.addEventListener("mouseout", function() {
        optPagamentos.style.backgroundColor = "#0e1114";
        optPagamentos.style.borderLeft = "2px solid red"
    });
    
    optHome.addEventListener("mouseout", function() {
        optPagamentos.style.backgroundColor = "#0e1114";
        optPagamentos.style.borderLeft = "2px solid red"
    });
    optAlunos.addEventListener("mouseout", function() {
        optPagamentos.style.backgroundColor = "#0e1114";
        optPagamentos.style.borderLeft = "2px solid red"
    });
    optUsuario.addEventListener("mouseout", function() {
        optPagamentos.style.backgroundColor = "#0e1114";
        optPagamentos.style.borderLeft = "2px solid red"
    });
    optConfig.addEventListener("mouseout", function() {
        optPagamentos.style.backgroundColor = "#0e1114";
        optPagamentos.style.borderLeft = "2px solid red"
    });
    //funções de clique
    fecharPagamento.addEventListener('click', function() {
       closePopup();
    });
    optHome.addEventListener('click', function() {
        window.location.href = '/academy/assets/php/interfaces/painel.php';
    });
    optAlunos.addEventListener('click', function() {
        window.location.href = '/academy/assets/php/interfaces/alunos.php';
    });
    optPagamentos.addEventListener('click', function() {
        window.location.href = '/academy/assets/php/interfaces/pagamentos.php';
    });
    optUsuario.addEventListener('click', function() {
        window.location.href = '/academy/assets/php/interfaces/usuarios.php';
    });
    optConfig.addEventListener('click', function() {
        menuConfig.style.display = "block";
    });
    backBtn.addEventListener('click', function() {
        menuConfig.style.display = "none";
    });
    btn.addEventListener("click", function() {
        window.history.back();
    });
    btnRefresh.addEventListener("click", function() {
        location.reload();
    });
 
document.addEventListener("DOMContentLoaded", function() {
        var btn = document.getElementById("btnvoltar");
        if (btn) {
            btn.addEventListener("click", function() {
                window.history.back();
            });
        } else {
            console.log("Botão não encontrado!");
        }
    });
    document.addEventListener("DOMContentLoaded", function() {
        var btn = document.getElementById("btnrefresh");
        if (btn) {
            btn.addEventListener("click", function() {
                location.reload();
            });
        } else {
            console.log("Botão não encontrado!");
        }
    });
    </script>
    <script>
document.addEventListener('DOMContentLoaded', () => {
    const linhasAlunos = document.querySelectorAll('.linha-aluno1');
    const botaoAtualizar = document.getElementById('atualizar');
    let idAlunoSelecionado = null;

    // Função para gerar a tabela de mensalidades
    function montarTabelaMensalidades(mensalidades) {
        const meses = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
        let tabelaHTML = '';
        const pagamentosPorMes = {};

        mensalidades.forEach(mensalidade => {
            const mes = new Date(mensalidade.data_pagamento).getMonth();
            if (!pagamentosPorMes[mes]) {
                pagamentosPorMes[mes] = [];
            }
            pagamentosPorMes[mes].push(mensalidade);
        });

        for (let i = 0; i < 12; i++) {
            const pagamentos = pagamentosPorMes[i] || [];
            if (pagamentos.length > 0) {
                pagamentos.forEach(pagamento => {
                    tabelaHTML += `
                        <tr>
                            <td>${meses[i]}</td>
                            <td>R$ ${parseFloat(pagamento.valor).toFixed(2)}</td>
                            <td class="status ${pagamento.status.toLowerCase()}">${pagamento.status}</td>
                        </tr>
                    `;
                });
            } else {
                tabelaHTML += `
                    <tr>
                        <td>${meses[i]}</td>
                        <td colspan="2">Sem pagamento</td>
                    </tr>
                `;
            }
        }

        return tabelaHTML;
    }

    // Função para calcular o total das mensalidades
    function calcularTotal(mensalidades) {
        let total = 0;
        const pagamentosPorMes = {};

        mensalidades.forEach(mensalidade => {
            const mes = new Date(mensalidade.data_pagamento).getMonth();
            if (!pagamentosPorMes[mes]) {
                pagamentosPorMes[mes] = [];
            }
            pagamentosPorMes[mes].push(mensalidade);
        });

        for (let i = 0; i < 12; i++) {
            const pagamentos = pagamentosPorMes[i] || [];
            pagamentos.forEach(pagamento => {
                total += parseFloat(pagamento.valor);
            });
        }

        return `R$ ${total.toFixed(2)}`;
    }

    // Função para fechar o popup
    function closePopup() {
        document.getElementById('popupalunos').classList.remove('show');
        document.getElementById('overlay').classList.remove('show');
    }

    // Adicionar um evento de clique em cada linha de aluno
    linhasAlunos.forEach(linha => {
        linha.addEventListener('click', () => {
            const dados = linha.dataset;  // Obtém os dados da linha
            const idAluno = dados.id;  // Extrai o id do aluno da linha clicada

            if (!idAluno) {
                console.error("ID do aluno não encontrado.");
                return;
            }
 idAlunoSelecionado = idAluno;
            // Quando o aluno é clicado, podemos fazer qualquer ação com o ID
            console.log("ID do aluno:", idAlunoSelecionado);  // Exibe o ID no console, você pode usar isso em outras ações

            // Aqui você pode chamar uma função para carregar a ficha de pagamento ou qualquer outra coisa
            fetch("fichapagamentoaluno.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ id: idAluno, ano: new Date().getFullYear() })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Processar os dados recebidos, por exemplo, montar a tabela de mensalidades
                    document.getElementById("popup-message").innerHTML = `
                        <div class='ficha'>
                            <div class='ano-seletor'>
                                <form id='formanopagamento'>
                                    <label for='ano'>Ano:</label>
                                    <select id='ano'>
                                        <option value='2023'>2023</option>
                                        <option value='2024' >2024</option>
                                        <option value='2025' selected>2025</option>
                                        <option value='2026'>2026</option>
                                    </select>
                                </form>
                            </div>
                            <h3>Ficha de Pagamento - <span id='ano-titulo'>2025</span></h3>
                            <p><strong>Nome:</strong> ${data.data.nomeAluno}</p>
                            <p><strong>Endereço:</strong> ${data.data.rua}</p>
                            <p><strong>Telefone:</strong> ${data.data.telefone}</p>
                            <table class='tabelaPagamento'>
                                <thead>
                                    <tr>
                                        <th>Mês</th>
                                        <th>Valor</th>
                                        <th>Situação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ${montarTabelaMensalidades(data.data.mensalidades)}
                                </tbody>
                            </table>
                        </div>
                    `;

                    // Atualiza o total fora da tabela
                    const total = calcularTotal(data.data.mensalidades);
                    const totalElemento = document.querySelector('.total');

                    if (!totalElemento) {
                        const novoTotal = document.createElement('div');
                        novoTotal.classList.add('total');
                        novoTotal.innerHTML = `<strong>Total: </strong>${total}`;
                        document.getElementById("popup-message").appendChild(novoTotal);
                    } else {
                        totalElemento.innerHTML = `<strong>Total: </strong>${total}`;
                    }
                } else {
                    document.getElementById("popup-message").innerHTML = `<p>${data.message || "Dados do aluno não encontrados."}</p>`;
                }

                document.getElementById("popupalunos").classList.add("show");
                document.getElementById("overlay").classList.add("show");
            })
            .catch(error => {
                console.error('Erro:', error);
                document.getElementById("popup-message").innerHTML = `<p>Erro ao carregar os dados do aluno.</p>`;
                document.getElementById("popupalunos").classList.add("show");
                document.getElementById("overlay").classList.add("show");
            });
        });
    });

    // Evento de clique para atualizar os dados de pagamento
    botaoAtualizar.addEventListener('click', () => {
        // Identifica a linha selecionada
        const alunoSelecionado = document.querySelector('.linha-aluno1.selected'); // Aqui a linha deve ter a classe 'selected'
        if (!idAlunoSelecionado) {
            console.error("Nenhuma linha de aluno selecionada.");
            return;
        }

       

        if (!idAlunoSelecionado) {
            console.error("ID do aluno não encontrado.");
            return;
        }

        // Obtém o ano selecionado no formulário
        const anoSelect = document.getElementById('ano');
        const anoSelecionado = anoSelect.value;

        // Atualiza o título com o ano selecionado
        document.getElementById('ano-titulo').textContent = anoSelecionado;

        // Envia a requisição ao servidor com o ID do aluno e o ano selecionado
        fetch("fichapagamentoaluno.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ id: idAlunoSelecionado, ano: anoSelecionado })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const tabela = document.querySelector('.tabelaPagamento tbody');
                tabela.innerHTML = montarTabelaMensalidades(data.data.mensalidades);

                // Atualiza o total fora da tabela
                const total = calcularTotal(data.data.mensalidades);
                const totalElemento = document.querySelector('.total');

                if (!totalElemento) {
                    const novoTotal = document.createElement('div');
                    novoTotal.classList.add('total');
                    novoTotal.innerHTML = `<strong>Total: </strong>${total}`;
                    document.getElementById("popup-message").appendChild(novoTotal);
                } else {
                    totalElemento.innerHTML = `<strong>Total: </strong>${total}`;
                }
            } else {
                console.error('Erro ao carregar os dados:', data.message);
            }
        })
        .catch(error => {
            console.error('Erro ao enviar dados para o servidor:', error);
        });
    });
});


function closePopup() {
        document.getElementById('popupalunos').classList.remove('show');
        document.getElementById('overlay').classList.remove('show');
    }
    
    adicionarEventosBotoes();
function adicionarEventosBotoes() {
  
    const linhas = document.querySelectorAll('.linha-aluno');
    linhas.forEach(function(linha) {
    const button = linha.querySelector('.finalizarpagamento');
    const dados = linha.dataset;
    console.log(dados.id);
    console.log(dados.nome);
    console.log(dados.vencimento);
    const message = linha.querySelector('.medidas');
    const ignorar = linha.querySelector('.editar');
    ignorar.addEventListener('click', function() {
    const vencimento = dados.vencimento;
    
    console.log(`Ignorar: Vencimento: ${vencimento}, ID do Aluno: ${dados.id}`);
});
// função para gerar link do whatsapp
    message.addEventListener('click', function() {
    const telefone = linha.getAttribute('data-telefone');
    function gerarLinkWhatsApp(telefone) {
    var telefoneFormatado = telefone.replace(/\D/g, '');
    var telefoneCompleto = '+55' + telefoneFormatado;
    return 'https://api.whatsapp.com/send/?phone=' + encodeURIComponent(telefoneCompleto) + '&text&type=phone_number&app_absent=0';
}
    const link = gerarLinkWhatsApp(telefone);
    window.open(link, '_blank');
});
 // Evento do botão "Finalizar Pagamento"
    button.addEventListener('click', function() {
    const alunoId = dados.id;
    const vencimento = dados.vencimento;
    if (!alunoId) {
        console.error("Atributo data-id não encontrado no elemento .linha-aluno");
        return;
}
    fetch("/academy/assets/php/interfaces/fichapagamento.php", {
        method: "POST",
        headers: {
        "Content-Type": "application/json",
},
        body: JSON.stringify({ id: alunoId })
})
        .then((response) => response.json())
        .then((data) => {
    if (data.success && data.data && data.data.id) {
        document.getElementById("popup-messageoff").innerHTML = `<link href="/academy/assets/style/globalstyle.css" rel="stylesheet">
                        <div class="boxpagamento">
                            <form id="formpagamentos">
                                <p>Nome: ${data.data.nomeAluno} <br><span id='alert'>PAGAMENTO REFERENTE A DATA DE:</span> <u>${vencimento}</u><input style="display: none;"type: text name="idpagarnotificado" value="${data.data.id}"><input style="display:none ;"type: text name="datavencimentonotificada" value="${vencimento}"></p>
                                    <table border="1" style="width: 750px; border-collapse: collapse; text-align: left; margin: 0 auto; font-size: 14px;">
                                        <thead>
                                            <tr>
                                   
                                                <th style="padding: 5px;width:250px;">Valor</th>
                                                <th style="padding: 5px;width:250px;">Data de Pagamento</th>
                                            </tr>
                                        </thead>
                                       <tbody>
        <tr>
         
            <td style="padding: 5px;"><input  name="valornotificado" required style="padding:5px; transform: translate(0px, 0px);height:25px;"id="janeiro" placeholder="R$0,00" type="text"></td>
            <td style="padding: 5px;"><input  name="data_pagamentonotificada" style="padding:5px; transform: translate(0px, 0px);height:25px;" placeholder="" type="date"></td>
        </tr>
    </tbody>
                                    </table>
                                    <div class="boxbotoes" style=" display: flex;
        width: 100%;
        height: 100%;
         flex-direction: row;">
                                        <button style:"width: 30%;
        border: none;
        transition: 0.6s ease;
        cursor: pointer;
        background-color: #00aeff;
        "type="submit" id="btnpagar" class="cadastro">
                                         <div class="icon">
                           <svg fill="#ffffff" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="a"></g> <g id="b"> <path d="M26.5,51c1.3789,0,2.5-1.1211,2.5-2.5s-1.1211-2.5-2.5-2.5-2.5,1.1211-2.5,2.5,1.1211,2.5,2.5,2.5Zm0-4c.8271,0,1.5,.6729,1.5,1.5s-.6729,1.5-1.5,1.5-1.5-.6729-1.5-1.5,.6729-1.5,1.5-1.5Zm1.0254-18.9443c-.6943-.46-1.0898-.7627-1.1455-.8086-.0186-.127,.0234-.2441,.0703-.2969,.0156-.0186,.0303-.0352,.1006-.04,.1572-.002,.2617,.1045,.2676,.1113,.4609,.6377,1.3604,.8164,2.0488,.4062,.6826-.4043,.8916-1.25,.4854-1.9678-.3096-.5462-1.1729-1.2924-2.4286-1.4048-.0156-.0726-.0285-.1354-.0327-.1725-.0724-.444-.7509-.436-.8206,0l-.0422,.2158c-.7497,.1201-1.421,.4658-1.9034,1.0188-.6045,.6904-.874,1.6113-.7402,2.5264,.1904,1.292,1.4189,2.1074,2.4072,2.7637,.3105,.2061,.9561,.6348,1.0645,.8047,.0928,.1523,.1816,.3721,.0762,.5537-.085,.1455-.2637,.2373-.4971,.2539-.1924,.0078-.5342-.291-.6699-.498-.4258-.6729-1.3262-.8975-2.0449-.5068-.6699,.3633-.9062,1.1299-.5869,1.9072,.3528,.8613,1.5208,1.7751,2.8857,1.934l.0511,.2616c.0697,.436,.7482,.4439,.8206,0,.0062-.0555,.0311-.1678,.0576-.29,1.1255-.1612,2.1003-.7606,2.6313-1.6771,.6045-1.043,.5654-2.2734-.1074-3.376-.4355-.7168-1.2041-1.2256-1.9473-1.7188Zm1.1895,4.5928c-.4102,.71-1.2041,1.1709-2.1182,1.2344l-.1699,.0059c-1.125,0-2.1377-.7842-2.3672-1.3467-.0586-.1406-.1611-.4863,.1367-.6475,.085-.0459,.1787-.0684,.2715-.0684,.1826,0,.3613,.085,.458,.2373,.0059,.0098,.6982,1.0029,1.584,.9531,.5635-.0391,1.0322-.3115,1.2871-.748,.2715-.4688,.2393-1.0439-.0869-1.5781-.2012-.3291-.6924-.6699-1.3662-1.1172-.8643-.5742-1.8447-1.2246-1.9688-2.0742-.0928-.626,.0908-1.2539,.5029-1.7236,.3721-.4268,.9131-.6855,1.5215-.7285,1.1299-.0791,1.8955,.5742,2.083,.9053,.1055,.1875,.1367,.46-.126,.6152-.2393,.1416-.5723,.084-.7383-.1465-.1016-.1289-.4688-.5527-1.1348-.5088-.3203,.0234-.585,.1504-.7861,.3789-.251,.2881-.3662,.6992-.3076,1.1006,.0557,.3809,.4258,.7314,1.583,1.498,.6523,.4316,1.3262,.8789,1.6465,1.4053,.4766,.7803,.5107,1.6377,.0957,2.3535Zm26.0879-12.5459c-.123-.0938-.2822-.124-.4355-.085-.0156,.0059-1.6318,.4346-3.3975-.3428-.5264-.2314-1.127-.5078-1.7568-.7969-1.9437-.8945-3.9327-1.8059-5.2129-2.1177v-2.2603c0-2.4814-2.0186-4.5-4.5-4.5H13.5c-2.4814,0-4.5,2.0186-4.5,4.5V49.5c0,2.4814,2.0186,4.5,4.5,4.5h26c2.4814,0,4.5-2.0186,4.5-4.5v-15.8103c.3678,.1519,.7612,.3335,1.1855,.533,1.6982,.7969,3.8115,1.7891,6.4727,1.7891,2.1777,0,3.1797-1.1377,3.2207-1.1855,.0781-.0908,.1211-.207,.1211-.3262v-14c0-.1562-.0732-.3027-.1973-.3975Zm-.8027,14.1836c-.2754,.2324-1.0186,.7256-2.3418,.7256-2.4375,0-4.4395-.9395-6.0479-1.6943-1.0498-.4932-1.957-.9189-2.7715-.9893-.5498-.0479-1.1416-.0752-1.7471-.1025-2.2402-.1035-4.7783-.2217-5.752-1.4678-.3682-.4717-.4424-1.1826-.1895-1.8135,.3125-.7754,1.0566-1.3018,2.043-1.4434,.7441-.1074,1.6709-.1426,2.6533-.1807,2.3857-.0908,5.0898-.1943,6.9961-1.3281,.2373-.1406,.3154-.4482,.1738-.6855-.1426-.2373-.4492-.3145-.6855-.1738-1.6865,1.0039-4.2559,1.1016-6.5225,1.1885-.4174,.0157-.8212,.0326-1.2123,.0535-1.4095-5.455-6.4222-9.3748-12.0963-9.3748-6.8926,0-12.5,5.6074-12.5,12.5s5.6074,12.5,12.5,12.5c5.582,0,10.4257-3.6604,11.9813-8.9614,.8444,.1016,1.7225,.1468,2.5646,.186,.5918,.0273,1.1699,.0537,1.707,.0996,.0767,.0066,.1649,.0322,.2471,.048v16.1277c0,1.9297-1.5703,3.5-3.5,3.5H13.5c-1.9297,0-3.5-1.5703-3.5-3.5V14.5c0-1.9297,1.5703-3.5,3.5-3.5h26c1.9297,0,3.5,1.5703,3.5,3.5v2.1494c-1.6783,.1625-5.3053,2.1736-5.7402,2.4122-.2422,.1328-.3311,.4365-.1982,.6787,.1338,.2432,.4385,.3301,.6787,.1982,1.6641-.9111,4.6211-2.3096,5.5303-2.2979,.9609,.0459,3.4912,1.21,5.5244,2.1455,.6348,.292,1.2412,.5713,1.7725,.8047,1.3877,.6094,2.6914,.5908,3.4326,.5039v13.1914Zm-19.4482-2.9131c.6519,.8354,1.7186,1.2675,2.9341,1.5099-1.4708,4.8082-5.8954,8.1171-10.9859,8.1171-6.3408,0-11.5-5.1592-11.5-11.5s5.1592-11.5,11.5-11.5c5.1597,0,9.7238,3.5217,11.0817,8.4492-.1823,.0181-.3618,.0373-.5309,.0616-1.3486,.1943-2.3789,.9453-2.8281,2.0605-.3896,.9697-.2637,2.043,.3291,2.8018Z"></path> </g> </g></svg></div>
                        <!--fim do icone--><p style="color: #fff;">Enviar Pagamento</p>
                                        </button>
                                        <button type="button" id="btnfechar" class="cadastro" onclick="closePopupIgnorado()">
                                           <div class="icon">
                           <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM8.96963 8.96965C9.26252 8.67676 9.73739 8.67676 10.0303 8.96965L12 10.9393L13.9696 8.96967C14.2625 8.67678 14.7374 8.67678 15.0303 8.96967C15.3232 9.26256 15.3232 9.73744 15.0303 10.0303L13.0606 12L15.0303 13.9696C15.3232 14.2625 15.3232 14.7374 15.0303 15.0303C14.7374 15.3232 14.2625 15.3232 13.9696 15.0303L12 13.0607L10.0303 15.0303C9.73742 15.3232 9.26254 15.3232 8.96965 15.0303C8.67676 14.7374 8.67676 14.2625 8.96965 13.9697L10.9393 12L8.96963 10.0303C8.67673 9.73742 8.67673 9.26254 8.96963 8.96965Z" fill="#ffffff"></path> </g></svg>
                        </div>
                        <!--fim do icone--> <p style="color: #fff;">Fechar</p>
                                        </button>
                                    </div>
                                </div>
                            </form>`;
    // Adiciona evento de submit ao formulário
    document.getElementById('formpagamentos').addEventListener('submit', function(event) {
    event.preventDefault();       
    const valorNotificado = event.target.valornotificado.value;
    const dataNotificada = event.target.data_pagamentonotificada.value;
    const alunoId = event.target.idpagarnotificado.value;
    const vencimento = event.target.datavencimentonotificada.value;
    console.log("Valor: ", valorNotificado);
    console.log("Data de Pagamento: ", dataNotificada);
    console.log("ID do Aluno: ", alunoId);
    console.log("Data de Vencimento: ", vencimento);
    fetch("../core/recebe_dados.php", {
    method: "POST",
    headers: {
    "Content-Type": "application/x-www-form-urlencoded",
},
    body: new URLSearchParams({
    valornotificado: valorNotificado,
    data_pagamentonotificada: dataNotificada,
    idpagarnotificado: alunoId,
    datavencimentonotificada: vencimento
})
})
    .then((response) => response.json())
    .then((data) => {
    if (data.success) {
        console.log("Dados enviados com sucesso.");
        closePopupIgnorado();
        console.log(data);
} else {
        console.log("Dados enviados com sucesso.");
        closePopup();
        console.log(data);
}
})
        .catch((error) => {
        console.log("Dados enviados com sucesso. porém em catch de erro kkk");
        document.getElementById("popup-messageoff").innerHTML = `<p>Pagamento de <span id='alert'>${data.data.nomeAluno}</span> atualizado com sucesso!</p>`;
        // Defina o tempo de espera para fechar o popup (1000 ms = 1 segundo)
    setTimeout(function() {
        window.location.reload();
    closePopupIgnorado();
}, 1800);
});
});
} else {
    document.getElementById("popup-messageoff").innerHTML = `<p>${data.message || "Dados do aluno não encontrados."}</p>`;
}
    document.getElementById("popupignorado").classList.add("show");
    document.getElementById("overlayoff").classList.add("show");
})
        .catch((error) => {
        console.error("Erro:", error);
        document.getElementById("popup-messageoff").innerHTML = `<p>Erro ao carregar os dados do aluno.</p>`;
        document.getElementById("popupignorado").classList.add("show");
        document.getElementById("overlayoff").classList.add("show");
});
});
});
}
</script>
</body>
</html>
