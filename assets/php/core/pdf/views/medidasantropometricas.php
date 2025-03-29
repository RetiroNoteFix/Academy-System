

<?php

$path = '../logo.png';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);


// Autoload do Composer
require '../vendor/autoload.php';
require_once '../../config.php';

// Caminho ajustado para o arquivo de consultas
include '../../consultas.php';

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


$html = "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Medidas de " . (!empty($aluno['nomeAluno']) 
        ? htmlspecialchars($aluno['nomeAluno']) 
        : 'N/A') . "</title>
    <style>
        table {
            width: 720px;
            border-spacing: 0; /* Substitui border-collapse para o DOMPDF */
            border: 1px solid #000;
        }
        th, td {
            border: 1px solid #000;
            padding: 5px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .observacoes {
            height: 50px;
            vertical-align: top; /* Alinha o texto ao topo */
            border-bottom: 1px solid #000; /* Força a borda inferior */
             word-wrap: break-word; /* Quebra a linha automaticamente quando necessário */
             max-width: 300px;
        }
        #pessoais {
            width: 45%;
            text-align: center;
        }
        .logo {
            background-size: cover;
            background-position: center;
            width: 350px;
            height: 100px;
        }
        .logo img {
            width: 100%;
            height: 100%;
        }
        .BOX {
            display: flex;
        }
        body {
            height: auto;
            max-width: 720px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
        }
        #meio {
            text-align: center;
        }
        #perna {
            border-bottom: none;
        }
    </style>
</head>
<body>
    <div class='BOX'>
        <div class='logo'><img src='" . $base64 . "' alt='Exemplo' /></div>
    </div>
    <table>
        <thead>
            <tr>
                <th id='pessoais'><strong>DADOS PESSOAIS</strong></th>
                <th id='meio'><strong>MEDIDAS ANTROPOMÉTRICAS</strong></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>DATA INÍCIO: <strong>" . 
                (!empty($aluno['data_cadastroficha']) 
                    ? (new DateTime($aluno['data_cadastroficha']))->format('d/m/Y') 
                    : 'N/A') . 
            "</strong></td>
                <td></td>
            </tr>
            <tr>
                <td>NOME:<strong>" . 
                (!empty($aluno['nomeAluno']) 
                    ? htmlspecialchars($aluno['nomeAluno']) 
                    : 'N/A') . 
             "</strong></td>
                <td>PESO CORPORAL<em>(em kg):</em><strong>" . 
            (!empty($aluno['peso']) ? htmlspecialchars($aluno['peso']) : 'N/A') . 
        "</strong></td>
            </tr>
            <tr>
                <td>ENDEREÇO:<strong>" . 
        (!empty($aluno['rua']) ? htmlspecialchars($aluno['rua']) : 'N/A') . 
    "</strong></td>
                <td>ESTATURA<em>(em centímetros):</em><strong>" . 
            (!empty($aluno['altura']) ? htmlspecialchars($aluno['altura']) : 'N/A') . 
        "</strong></td>
            </tr>
            <tr>
                <td>IDADE:<strong>" . 
            (!empty($aluno['idade']) ? htmlspecialchars($aluno['idade']) : 'N/A') . 
        "</strong></td>
                <td>CIRCUNFERÊNCIA:</td>
            </tr>
            <tr>
                <td>TELEFONE:<strong>" . 
        (!empty($aluno['telefone']) ? htmlspecialchars($aluno['telefone']) : 'N/A') . 
    "</strong></td>
                <td>TORAX:<strong>" . 
        (!empty($aluno['torax']) ? htmlspecialchars($aluno['torax']) : 'N/A') . 
    "</strong></td>
            </tr>
            <tr>
                <td>CIDADE:<strong>" . 
        (!empty($aluno['cidade']) ? htmlspecialchars($aluno['cidade']) : 'N/A') . 
    "</strong></td>
                <td>CINTURA:<strong>" . 
        (!empty($aluno['cintura']) ? htmlspecialchars($aluno['cintura']) : 'N/A') . 
    "</strong></td>
            </tr>
            <tr>
                <td rowspan='7' class='observacoes'>OBSERVAÇÕES:<br><strong>" . 
        (!empty($aluno['observacoes']) ? htmlspecialchars($aluno['observacoes']) : 'N/A') . 
    "</strong></td>
                <td>ABDOME:<strong>" . 
        (!empty($aluno['abdome']) ? htmlspecialchars($aluno['abdome']) : 'N/A') . 
    "</strong></td>
            </tr>
            <tr>
                <td>QUADRIL:<strong>" . 
        (!empty($aluno['quadril']) ? htmlspecialchars($aluno['quadril']) : 'N/A') . 
    "</strong></td>
            </tr>
            <tr>
                <td>BRAÇOS<em> (direito e esquerdo):</em><strong>" . 
        (!empty($aluno['bracos']) ? htmlspecialchars($aluno['bracos']) : 'N/A') . 
    "</strong></td>
            </tr>
            <tr>
                <td>ANTEBRAÇOS<em> (direito e esquerdo):</em><strong>" . 
        (!empty($aluno['antebracos']) ? htmlspecialchars($aluno['antebracos']) : 'N/A') . 
    "</strong></td>
            </tr>
             <tr>
                <td id='perna'>PERNA<em> (direita e esquerda):</em><strong>" . 
        (!empty($aluno['pernas']) ? htmlspecialchars($aluno['pernas']) : 'N/A') . 
    "</strong></td>
            </tr>
            <tr>
                <td>PANTURRILHA<em> (direita e esquerda):</em><strong>" . 
        (!empty($aluno['coxas']) ? htmlspecialchars($aluno['coxas']) : 'N/A') . 
    "</strong></td>
            </tr>
           
        </tbody>
    </table>
</body>
</html>
";



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
