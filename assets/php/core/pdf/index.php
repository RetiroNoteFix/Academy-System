

<?php

$path = 'logo.png';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);


// Autoload do Composer
require 'vendor/autoload.php';
require_once '../config.php';

// Caminho ajustado para o arquivo de consultas
include '../consultas.php';

use Dompdf\Dompdf;

// Instanciar classe Consultas
$clientes = new Consultas();

// Validar e obter o ID
$alunoId = isset($_GET['id']) && is_numeric($_GET['id']) ? (int) $_GET['id'] : null;

if ($alunoId === null) {
    die('ID do aluno inválido ou não fornecido.');
}

// Buscar os dados do aluno
$aluno = $clientes->buscarAlunoPorId($alunoId);

// Verificar retorno
if (!$aluno) {
    die('Nenhum dado encontrado para o ID fornecido.');
}


$html = "<!DOCTYPE html>" .
     "<head>" .
     "<meta charset='UTF-8'>" .
     "<meta name='viewport' content='width=device-width, initial-scale=1.0'>" .
"<link rel='icon' type='image/jpeg' href='/academy/assets/img/logo.jpg'>" .
"<title>Ficha de " . (!empty($aluno['nomeAluno']) 
? htmlspecialchars($aluno['nomeAluno']) 
: 'N/A') .  "</title>" .
"</head>" .
"<style>
        * { font-family: Arial, Helvetica, sans-serif; font-size: 12px;}
        body { line-height: 1.2; width: 720px; height: 842px; }
        table { width: 100%; border-collapse: collapse; font-size: 12px; }
        th, td { padding: 4px; text-align: left; }
        th { background-color: #f2f2f2; }
        #cpf { width: 115px; text-align: right; }
        #rg { width: 100px; }
        #bairro { width: 120px; }
        #escolaridade {width: 250px;}
        #modalidadefisica { width: 20px }
        #modalidadeF { text-align:right;width: 250px; }
        #profissao { width: 200px;}
        #objetivo {width: 260px;}
        #idade { width: 120px; }
        #peso { width: 120px; }
        #h1parq { font-size: 12px; margin-left: 130px; }
        #par_q {
        height: 10px;
        }
        #par{

        }
        #situacao {
            width: 20px;
        }
        #questoes {
            width: 1000px;
        }
        #parqinfo {
            text-align: center;
        }
            #txt{
            margin-left: 20px;
            }
        #fazdieta {
            text-align: right;
        }
        #fuma {
            text-align: center;
        }
        #nome {
            width: 200px;
        }
        .logo {
            width: 400px;
            height: 30px;
        }
        .logo img {
            max-width: 400px;
            max-height: 90px;
        }
        #sedentario {
            text-align: right;
        }
        #varizes {
            text-align: right;
        }
        #articular {
            text-align: right;
        }
        #r {
            text-align: right;
        }
              #par_q {
              margin-right: 40px;
    width: 100%;
    height: 20px;
    border-collapse: collapse;
 /* Necessário para que as larguras do colgroup sejam respeitadas */
  }

  #par_q th, #par_q td {
    border: 1px solid black;
    padding: 1px;
    text-align: left;
  }

  #par_q colgroup col:nth-child(1) {
    width: 30px; /* Largura da coluna SITUAÇÃO */
  }

  #par_q colgroup col:nth-child(2) {
    width: 80px; /* Largura da coluna QUESTÕES */
  }
    .caixaparq{
    width: 100%;
    height: 172.8px;
    border-right: 2px  solid #000;
    display: flex;
    overflow: hidden;
    }
    #sangue{
text-align: left;
    }
.linha{
width: 60px;
margin-left: 42px;
height: 0.1px;
border: 0.1px solid black;
transform: translate(0px, 18px);
position: bottom;
}
#linhafinal{
width: 460px;
border: 0.5px solid #000;
transform: translate(0px, 18px);
margin-left: 135px;
}
.boxtermos{
display: flex;
width: 720px;
height: 110px;
margin-top: 20px;
}
.boxtermos h1{
font-size: 12px;
margin-left:36%;

}
.boxtermos p{
font-size: 12px;

}
.boxtermos p span{
font-size: 12px;
margin-left: 1.27cm;

}
.historico{
width: 720px;
height: 10px;
border: 2px solid #000;
}
.logo{
width: 100px;
height: 40px;
position: fixed;
background-size: cover;
background-position: center;
transform: translate(616px, 0px);
}
.logo img{
width: 100%;
height: 100%;
}
    </style>" .
"</head>" .
"<div class='logo'>
        <img src='" . $base64 . "' alt='Exemplo' />
    </div>" . 
"<body>" . 
    "<table>" . 
        "<tr>" . 
            "<td>DATA: <strong>" . 
                (!empty($aluno['data_cadastroficha']) 
                    ? (new DateTime($aluno['data_cadastroficha']))->format('d/m/Y') 
                    : 'N/A') . 
            "</strong></td>" . 
        "</tr>" . 
        "<tr>" . 
            "<td id='nome'>NOME: <strong>" . 
                (!empty($aluno['nomeAluno']) 
                    ? htmlspecialchars($aluno['nomeAluno']) 
                    : 'N/A') . 
             "</strong></td>" . 
        "</tr>" .
        "<tr>" . 
    "<td>RG: <strong>" . 
        (!empty($aluno['rgAluno']) ? htmlspecialchars($aluno['rgAluno']) : 'N/A') . 
    "</strong></td>" . 
    "<td id='rg'></td>" . 
    "<td id='cpf'>CPF: <strong>" . 
        (!empty($aluno['cpfAluno']) ? htmlspecialchars($aluno['cpfAluno']) : 'N/A') . 
    "</strong></td>" . 
"</tr>" . 
 "<tr>" . 
    "<td>ENDEREÇO: <strong>" . 
        (!empty($aluno['rua']) ? htmlspecialchars($aluno['rua']) : 'N/A') . 
    "</strong></td>" . 
"</tr>" . 
"<tr>" . 
    "<td id='bairro'>BAIRRO: <strong>" . 
        (!empty($aluno['bairro']) ? htmlspecialchars($aluno['bairro']) : 'N/A') . 
    "</strong></td>" . 
    "<td>CIDADE: <strong>" . 
        (!empty($aluno['cidade']) ? htmlspecialchars($aluno['cidade']) : 'N/A') . 
    "</strong></td>" . 
    "<td id='r'>CEP: <strong><u>" . 
        (!empty($aluno['cep']) ? htmlspecialchars($aluno['cep']) : 'N/A') . 
    "</u></strong></td>" . 
"</tr>" . 
"<tr>" . 
    "<td>TELEFONE: <strong>" . 
        (!empty($aluno['telefone']) ? htmlspecialchars($aluno['telefone']) : 'N/A') . 
    "</strong></td>" . 
    "<td ID='profissao'>PROFISSÃO: <strong>" . 
        (!empty($aluno['profissao']) ? htmlspecialchars($aluno['profissao']) : 'N/A') . 
    "</strong></td>" . 
    "<td id='r'>Nasc.: <strong><u>" . 
        (!empty($aluno['dataNascimento']) ? htmlspecialchars($aluno['dataNascimento']) : 'N/A') . 
    "</u></strong></td>" . 
"</tr>" . 
"<tr>" . 
    "<td id='escolaridade'>ESCOLARIDADE: <strong>" . 
        (!empty($aluno['escolaridade']) ? htmlspecialchars($aluno['escolaridade']) : 'N/A') . 
    "</strong></td>" . 
    "<td></td>" . 
    "<td id='r'>ESTADO CIVIL: <strong><u>" . 
        (!empty($aluno['estadoCivil']) ? htmlspecialchars($aluno['estadoCivil']) : 'N/A') . 
    "</u></strong></td>" . 
"</tr>" . 
"<tr>" . 
    "<td id='sangue'>TIPO SANGUÍNEO: <strong><u>" . 
        (!empty($aluno['tipoSanguineo']) ? htmlspecialchars($aluno['tipoSanguineo']) : 'N/A') . 
    "</u></strong></td>" . 
    "<td id='modalidadefisica'></td>" . 
    "<td id='modalidadeF'>Modalidade(Atividade Física): <strong><u>" . 
        (!empty($aluno['modalidade']) ? htmlspecialchars($aluno['modalidade']) : 'N/A') . 
    "</u></strong></td>" . 
"</tr>" . 
"<tr>" . 
    "<td>COMO SOUBE DA ACADEMIA: <strong>" . 
        (!empty($aluno['comoSoubeAcademia']) ? htmlspecialchars($aluno['comoSoubeAcademia']) : 'N/A') . 
    "</strong></td>" . 
"</tr>" . 
"<tr>" . 
    "<td id='objetivo'>OBJETIVO (ATIVIDADE FÍSICA): <strong>" . 
        (!empty($aluno['objetivo']) ? htmlspecialchars($aluno['objetivo']) : 'N/A') . 
    "</strong></td>" . 
"</tr>" .
    "</table>" . 
    "<table>" . 
    "<tr>" . 
        "<td id='idade'>IDADE: <strong>" . 
            (!empty($aluno['idade']) ? htmlspecialchars($aluno['idade']) : 'N/A') . 
        "</strong></td>" . 
        "<td id='peso'>PESO: <strong>" . 
            (!empty($aluno['peso']) ? htmlspecialchars($aluno['peso']) : 'N/A') . 
        "</strong></td>" . 
        "<td>ALTURA: <strong>" . 
            (!empty($aluno['altura']) ? htmlspecialchars($aluno['altura']) : 'N/A') . 
        "</strong></td>" . 
        "<td id='fuma'>FUMA: <strong>" . 
            (!empty($aluno['fuma']) ? htmlspecialchars($aluno['fuma']) : 'N/A') . 
        "</strong></td>" . 
        "<td id='fazdieta'>FAZ DIETA: <strong><u>" . 
            (!empty($aluno['fazDieta']) ? htmlspecialchars($aluno['fazDieta']) : 'N/A') . 
        "</u></strong></td>" . 
    "</tr>" . 
"</table>" .
"<table>" . 
    "<tr>" . 
        "<td>FAZ USO DE BEBIDA ALCOÓLICA: <strong>" . 
            (!empty($aluno['usaBebidaAlcoolica']) ? htmlspecialchars($aluno['usaBebidaAlcoolica']) : 'N/A') . 
        "</strong></td>" . 
        "<td id='sedentario'>SEDENTÁRIO: <strong><u>" . 
            (!empty($aluno['sedentario']) ? htmlspecialchars($aluno['sedentario']) : 'N/A') . 
        "</u></strong></td>" . 
    "</tr>" . 
    "<tr>" . 
        "<td>PRESSÃO ARTERIAL: <strong>" . 
            (!empty($aluno['pressaoArterial']) ? htmlspecialchars($aluno['pressaoArterial']) : 'N/A') . 
        "</strong></td>" . 
        "<td id='varizes'>TEM VARIZES: <strong><u>" . 
            (!empty($aluno['temVarizes']) ? htmlspecialchars($aluno['temVarizes']) : 'N/A') . 
        "</u></strong></td>" . 
    "</tr>" . 
    "<tr>" . 
        "<td>JÁ FEZ CIRURGIA, QUAL: <strong><u>" . 
            (!empty($aluno['cirurgia']) ? htmlspecialchars($aluno['cirurgia']) : 'N/A') . 
        "</u></strong></td>" . 
        "<td></td>" . 
    "</tr>" . 
    "<tr>" . 
        "<td>DORME BEM: <strong>" . 
            (!empty($aluno['dormeBem']) ? htmlspecialchars($aluno['dormeBem']) : 'N/A') . 
        "</strong></td>" . 
        "<td id='articular'>LESÃO ARTICULAR: <strong><u>" . 
            (!empty($aluno['lesaoArticular']) ? htmlspecialchars($aluno['lesaoArticular']) : 'N/A') . 
        "</u></strong></td>" . 
    "</tr>" . 
    "<tr>" . 
        "<td>PROBLEMA DE COLUNA: <strong>" . 
            (!empty($aluno['problemaColuna']) ? htmlspecialchars($aluno['problemaColuna']) : 'N/A') . 
        "</strong></td>" . 
        "<td></td>" . 
    "</tr>" . 
    "<tr>" . 
        "<td>QUANTO TEMPO FAZ QUE NÃO VAI AO MÉDICO: <strong>" . 
            (!empty($aluno['tempoMedico']) ? htmlspecialchars($aluno['tempoMedico']) : 'N/A') . 
        "</strong></td>" . 
        "<td></td>" . 
    "</tr>" . 
    "<tr>" . 
        "<td>USA ALGUM MEDICAMENTO: <strong>" . 
            (!empty($aluno['medicamento']) ? htmlspecialchars($aluno['medicamento']) : 'N/A') . 
        "</strong></td>" . 
        "<td></td>" . 
    "</tr>" . 
    "<tr>" . 
        "<td>TEM ALGUM PROBLEMA DE SAÚDE, QUAL: <strong><u>" . 
            (!empty($aluno['problemaSaude']) ? htmlspecialchars($aluno['problemaSaude']) : 'N/A') . 
        "</u></strong></td>" . 
        "<td></td>" . 
    "</tr>" . 
"</table>" .
"<h1 id='h1parq'>PAR-Q (QUESTIONÁRIO PARA PESSOAS COM IDADE ENTRE 15 E 69 ANOS)</h1>" . 
"<div class='caixaparq'>" .
"<table id='par_q' border='1'>" . 
    "<tr>" . 
        "<th id='situacao'>SITUAÇÃO</th>" . 
        "<th id='questoes'>QUESTÕES</th>" . 
    "</tr>" . 
    "<tr>" . 
        "<td id='parqinfo'><strong><u id='txt'>" . 
            (!empty($aluno['par_q_problemaCoracao']) ? htmlspecialchars($aluno['par_q_problemaCoracao']) : 'N/A') . 
        "</u></strong></td>" . 
        "<td>1- Seu médico alguma vez disse que você tem problema no coração e que deve apenas praticar atividades físicas<br> recomendadas por médico?</td>" . 
    "</tr>" . 
    "<tr>" . 
        "<td id='parqinfo'><strong><u id='txt'>" . 
            (!empty($aluno['par_q_dorPeitocomatividade']) ? htmlspecialchars($aluno['par_q_dorPeitocomatividade']) : 'N/A') . 
        "</u></strong></td>" . 
        "<td>2- Você sente dor no peito quando pratica atividade física?</td>" . 
    "</tr>" . 
    "<tr>" . 
        "<td id='parqinfo'><strong><u id='txt'>" . 
            (!empty($aluno['par_q_dorPeitosematividade']) ? htmlspecialchars($aluno['par_q_dorPeitosematividade']) : 'N/A') . 
        "</u></strong></td>" . 
        "<td>3- No mês passado, você teve dor no peito quanto não estava praticando atividade física?</td>" . 
    "</tr>" . 
    "<tr>" . 
        "<td id='parqinfo'><strong><u id='txt'>" . 
            (!empty($aluno['par_q_equilibrio']) ? htmlspecialchars($aluno['par_q_equilibrio']) : 'N/A') . 
        "</u></strong></td>" . 
        "<td>4- Você perde o equilíbrio devido a tonturas ou alguma vez perdeu a consciência?</td>" . 
    "</tr>" . 
    "<tr>" . 
        "<td id='parqinfo'><strong><u id='txt'>" . 
            (!empty($aluno['par_q_problemaOsseo']) ? htmlspecialchars($aluno['par_q_problemaOsseo']) : 'N/A') . 
        "</u></strong></td>" . 
        "<td>5- Você tem problema ósseo ou articular que poderia ficar pior por alguma mudança em sua atividade física?</td>" . 
    "</tr>" . 
    "<tr>" . 
        "<td id='parqinfo'><strong><u id='txt'>" . 
            (!empty($aluno['par_q_receitaMedica']) ? htmlspecialchars($aluno['par_q_receitaMedica']) : 'N/A') . 
        "</u></strong></td>" . 
        "<td>6- Seu médico está atualmente receitando algum remédio (por exemplo, diuréticos) para pressão arterial ou<br> problema  cardíaco?</td>" . 
    "</tr>" . 
    "<tr>" . 
        "<td id='parqinfo'><strong><u id='txt'>" . 
            (!empty($aluno['par_q_razao']) ? htmlspecialchars($aluno['par_q_razao']) : 'N/A') . 
        "</u></strong></td>" . 
        "<td>7- Você sabe de qualquer outra razão pela qual não deva praticar atividade física?</td>" . 
    "</tr>" . 
"</table>" .
"</div>".
"<h1><u id='txt'>HISTÓRICO FAMILIAR:</u></h1>" .
"<table border='1' style='border-collapse: collapse; width: 100%; text-align: left;'>" .
    "<tr>" .
        "<td id='obesidade'>OBESIDADE: <strong><u>" . 
            (!empty($aluno['obesidade']) ? htmlspecialchars($aluno['obesidade']) : 'N/A') . 
        "</u></strong></td>" .
        "<td id='diabetes'>DIABETES: <strong><u>" . 
            (!empty($aluno['diabetes']) ? htmlspecialchars($aluno['diabetes']) : 'N/A') . 
        "</u></strong></td>" .
        "<td id='colesterolElevado'>COLESTEROL ELEVADO: <strong><u>" . 
            (!empty($aluno['colesterolElevado']) ? htmlspecialchars($aluno['colesterolElevado']) : 'N/A') . 
        "</u></strong></td>" .
        "<td id='infarto'>INFARTO: <strong><u>" . 
            (!empty($aluno['infarto']) ? htmlspecialchars($aluno['infarto']) : 'N/A') . 
        "</u></strong></td>" .
        "<td id='doencaCardiaca'>DOENÇA CARDÍACA: <strong><u>" . 
            (!empty($aluno['doencaCardiaca']) ? htmlspecialchars($aluno['doencaCardiaca']) : 'N/A') . 
        "</u></strong></td>" .
        "<td id='derrame'>DERRAME: <strong><u>" . 
            (!empty($aluno['derrame']) ? htmlspecialchars($aluno['derrame']) : 'N/A') . 
        "</u></strong></td>" .
        "<td id='pressaoAlta'>PRESSÃO ALTA: <strong><u>" . 
            (!empty($aluno['pressaoAlta']) ? htmlspecialchars($aluno['pressaoAlta']) : 'N/A') . 
        "</u></strong></td>" .
    "</tr>" .
"</table>" . 
"<div class='boxtermos'>".

"<h1>TERMO DE RESPONSABILIDADE</h1>".
"<p><span>Declaro não possuir qualquer deficiência fisica ou orgânica impeditiva para a prática de qualquer  modalidade esportiva como </span> também <br> farei os exercicios estabelecidos pelos professores, me  responsabilizando por qualquer consequência  que vier acontecer comigo fora <br> do controle da academia. <br> <span>Comprometo-me em trazer o mais breve possível um atestado de saúde, liberando para atividade física.</span></p>" .
"</div>".
"<div id='linhafinal'></div><br>" .
"<p style='margin-left:42%; margin-bottom: 20px;-'>ASS: DO(A) ALUNO(A)</p>" .
"<p style='margin-top: -10px;  margin-left: 25%;'> Rua Tiradentes n° 188, Centro - Retirolândia - BA - CEP 48.750-000 </p>" .
"</body>";

$nomealuno = (!empty($aluno['nomeAluno']) 
? htmlspecialchars($aluno['nomeAluno']) 
: 'N/A');

// Continuar com a geração do PDF
$dompdf = new Dompdf();
$dompdf->loadHtml("$html
");
$dompdf->render();
header('Content-Type: application/pdf');

$dompdf->stream("Ficha de $nomealuno.pdf", ["Attachment" => false]);
?>
