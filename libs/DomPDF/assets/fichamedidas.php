<?php
$path = '../logo.png'; 
$type = pathinfo($path, PATHINFO_EXTENSION); 
$data = file_get_contents($path); 
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
require '../../../vendor/autoload.php'; 
require_once '../../../config/config.php';
include '../../../models/Aluno.php'; 
include '../../../config/database.php';
use Dompdf\Dompdf;
$alunoId = isset($_GET['id']) && is_numeric($_GET['id']) ? (int) $_GET['id'] : null;

if ($alunoId === null) {
    die('ID do aluno inválido ou não fornecido.');
}
try {
    $database = new Database();
   $conexao = $database->getConnection();
    $aluno = Aluno::listarPorId($conexao, $alunoId);
    if ($aluno) {
        $data = $aluno->getDataCadastro();
        $dataFormatada = (new DateTime($data))->format('d/m/Y');
        $endereco = $aluno->getEndereco(); 
$partes = explode(',', $endereco);
$rua = isset($partes[0]) ? trim($partes[0]) : null;    
$bairro = isset($partes[1]) ? trim($partes[1]) : null;    
$cidade = isset($partes[2]) ? trim($partes[2]) : null;    
$estadoCep = isset($partes[3]) ? trim($partes[3]) : null; 
if (!empty($estadoCep)) {
    $estadoCepPartes = explode('CEP', $estadoCep);
    $estado = isset($estadoCepPartes[0]) ? trim($estadoCepPartes[0]) : null;
    $cep = isset($estadoCepPartes[1]) ? trim($estadoCepPartes[1]) : null; 
} else {
    $estado = $cep = null;
}
        $html = "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Medidas de " . $aluno->getNome() . "</title>
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
                <td>DATA INÍCIO: $dataFormatada<strong></strong></td>
                <td></td>
            </tr>
            <tr>
                <td>NOME: <strong>" . $aluno->getNome() . "</strong></td>
                <td>PESO CORPORAL<em>(em kg):</em><strong>" . $aluno->getPeso() . "</strong></td>
            </tr>
            <tr>
                <td>ENDEREÇO:<strong>$rua</strong></td>
                <td>ESTATURA<em>(em centímetros):</em><strong>" . $aluno->getAltura() . "</strong></td>
            </tr>
            <tr>
                <td>IDADE:<strong>" . $aluno->getIdade() . "</strong></td>
                <td>CIRCUNFERÊNCIA:</td>
            </tr>
            <tr>
                <td>TELEFONE:<strong>" . $aluno->getTelefone() . "</strong></td>
                <td>TORAX:<strong>" . $aluno->getMedidaTorax() . "</strong></td>
            </tr>
            <tr>
                <td>CIDADE:<strong>$cidade</strong></td>
                <td>CINTURA:<strong>" . $aluno->getMedidaCintura() . "</strong></td>
            </tr>
            <tr>
                <td rowspan='7' class='observacoes'>OBSERVAÇÕES:<br><strong>" . $aluno->getObservacoes() . "</strong></td>
                <td>ABDOME:<strong>" . $aluno->getMedidaAbdome() . "</strong></td>
            </tr>
            <tr>
                <td>QUADRIL:<strong>" . $aluno->getMedidaQuadril() . "</strong></td>
            </tr>
            <tr>
                <td>BRAÇOS<em> (direito e esquerdo):</em><strong>" . $aluno->getMedidaBracos() . "</strong></td>
            </tr>
            <tr>
                <td>ANTEBRAÇOS<em> (direito e esquerdo):</em><strong>" . $aluno->getMedidaAntebracos() . "</strong></td>
            </tr>
            <tr>
             <td id='perna'>PERNA<em> (direita e esquerda):</em><strong>" . $aluno->getMedidaPernas() . "</strong></td>
                
            </tr>
            <tr>
                <td>PANTURRILHA<em> (direita e esquerda):</em><strong>" . $aluno->getMedidaPanturrilha() . "</strong></td>
            </tr>
        </tbody>
    </table>
</body>
</html>
";
    } else {
        echo "Aluno não encontrado.";
    }

} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->render();
$dompdf->set_option('font', 'DejaVu Sans');
$dompdf->setPaper('A4', 'portrait');
header('Content-Type: application/pdf');
$dompdf->stream("Ficha_de_Alunos.pdf", ["Attachment" => false]);

?>
