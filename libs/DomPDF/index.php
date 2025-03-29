<?php
$path = 'logo.png'; 
$type = pathinfo($path, PATHINFO_EXTENSION); 
$data = file_get_contents($path); 
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
require '../../vendor/autoload.php'; 
require_once '../../config/config.php';
include '../../models/Aluno.php'; 
include '../../config/database.php';
use Dompdf\Dompdf;
$alunoId = isset($_GET['id']) && is_numeric($_GET['id']) ? (int) $_GET['id'] : null;
if ($alunoId === null) {
    die("ERRO Interno.");
}
try {
   $database = new Database();
   $conexao = $database->getConnection();
    $aluno = Aluno::listarPorId($conexao, $alunoId);
    if ($aluno) {
    
        function formatarDataParaBR($data) {
            try {
                // Cria um objeto DateTime a partir da string de data
                $dateTime = new DateTime($data);
        
                // Retorna a data formatada para o formato 'dd/mm/yyyy'
                return $dateTime->format('d/m/Y');
            } catch (Exception $e) {
                // Caso a data não seja válida, retorna uma string de erro ou vazio
                return 'Data inválida';
            }
        }
        $html = "<!DOCTYPE html>" .
        "<head>" .
        "<meta charset='UTF-8'>" .
        "<meta name='viewport' content='width=device-width, initial-scale=1.0'>" .
        "<link rel='icon' type='image/jpeg' href='/academy/assets/img/logo.jpg'>" .
        "<title>Ficha de " . $aluno->getNome() . "</title>" .
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
       
        }
        
        #par_q th, #par_q td {
        border: 1px solid black;
        padding: 1px;
        text-align: left;
        }
        
        #par_q colgroup col:nth-child(1) {
        width: 30px; 
        }
        
        #par_q colgroup col:nth-child(2) {
        width: 80px;
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
               "<td>DATA: <strong>" . formatarDataParaBR($aluno->getDataCadastro()) . "</strong></td>" . 
           "</tr>" . 
           "<tr>" . 
               "<td id='nome'>NOME: " . $aluno->getNome() . "<strong></strong></td>" . 
           "</tr>" .
           "<tr>" . 
        "<td>RG: <strong>" . $aluno->getRg() . "</strong></td>" . 
        "<td id='rg'></td>" . 
        "<td id='cpf'>CPF: <strong>" . $aluno->getCpf() . "</strong></td>" . 
        "</tr>" . 
        "<tr>" . 
        "<td>ENDEREÇO: <strong></strong></td>" . 
        "</tr>" . 
        "<tr>" . 
        "<td id='bairro'>BAIRRO: <strong></strong></td>" . 
        "<td>CIDADE: <strong><strong></td>" . 
        "<td id='r'>CEP: <strong></strong></td>" . 
        "</tr>" . 
        "<tr>" . 
        "<td>TELEFONE: <strong>" . $aluno->getTelefone() . "</strong></td>" . 
        "<td ID='profissao'>PROFISSÃO: <strong>" . $aluno->getProfissao() . "</strong></td>" . 
        "<td id='r'>Nasc.: <strong>" . formatarDataParaBR($aluno->getDataNascimento()) . "</strong></td>" . 
        "</tr>" . 
        "<tr>" . 
        "<td id='escolaridade'>ESCOLARIDADE: <strong>" . $aluno->getEscolaridade() . "</strong></td>" . 
        "<td></td>" . 
        "<td id='r'>ESTADO CIVIL: <strong>" . $aluno->getEstadoCivil() . "</strong></td>" . 
        "</tr>" . 
        "<tr>" . 
        "<td id='sangue'>TIPO SANGUÍNEO: <strong>" . $aluno->getTipoSanguineo() . "</strong></td>" . 
        "<td id='modalidadefisica'></td>" . 
        "<td id='modalidadeF'>Modalidade(Atividade Física): <strong>" . $aluno->getModalidade() . "<strong><u></u></strong></td>" . 
        "</tr>" . 
        "<tr>" . 
        "<td>COMO SOUBE DA ACADEMIA: <strong>" . $aluno->getComoSoubeAcademia() . "</strong></td>" . 
        "</tr>" . 
        "<tr>" . 
        "<td id='objetivo'>OBJETIVO (ATIVIDADE FÍSICA): <strong>" . $aluno->getObjetivo() . "</strong></td>" . 
        "</tr>" .
        "</table>" . 
        "<table>" . 
        "<tr>" . 
           "<td id='idade'>IDADE: <strong>" . $aluno->getIdade() . "</strong></td>" . 
           "<td id='peso'>PESO: <strong>" . $aluno->getPeso() . "</strong></td>" . 
           "<td>ALTURA: <strong>" . $aluno->getAltura() . "</strong></td>" . 
           "<td id='fuma'>FUMA: <strong>" . $aluno->getFuma() . "</strong></td>" . 
           "<td id='fazdieta'>FAZ DIETA: <strong>" . $aluno->getFazDieta() . "</strong></td>" . 
        "</tr>" . 
        "</table>" .
        "<table>" . 
        "<tr>" . 
           "<td>FAZ USO DE BEBIDA ALCOÓLICA: <strong>" . $aluno->getUsaBebidaAlcoolica() . "</strong></td>" . 
           "<td id='sedentario'>SEDENTÁRIO: <strong>" . $aluno->getSedentario() . "</strong></td>" . 
        "</tr>" . 
        "<tr>" . 
           "<td>PRESSÃO ARTERIAL: <strong>" . $aluno->getPressaoArterial() . "</strong></td>" . 
           "<td id='varizes'>TEM VARIZES: <strong>" . $aluno->getTemVarizes() . "</strong></td>" . 
        "</tr>" . 
        "<tr>" . 
           "<td>JÁ FEZ CIRURGIA, QUAL: <strong>" . $aluno->getCirurgia() . "</strong></td>" . 
           "<td></td>" . 
        "</tr>" . 
        "<tr>" . 
           "<td>DORME BEM: <strong>" . $aluno->getDormeBem() . "</strong></td>" . 
           "<td id='articular'>LESÃO ARTICULAR: <strong>" . $aluno->getLesaoArticular() . "</strong></td>" . 
        "</tr>" . 
        "<tr>" . 
           "<td>PROBLEMA DE COLUNA: <strong>" . $aluno->getProblemaColuna() . "</strong></td>" . 
           "<td></td>" . 
        "</tr>" . 
        "<tr>" . 
           "<td>QUANTO TEMPO FAZ QUE NÃO VAI AO MÉDICO: <strong>" . $aluno->getTempoMedico() . "</strong></td>" . 
           "<td></td>" . 
        "</tr>" . 
        "<tr>" . 
           "<td>USA ALGUM MEDICAMENTO: <strong>" . $aluno->getMedicamento() . "</strong></td>" . 
           "<td></td>" . 
        "</tr>" . 
        "<tr>" . 
           "<td>TEM ALGUM PROBLEMA DE SAÚDE, QUAL: <strong>" . $aluno->getProblemaSaude() . "</strong></td>" . 
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
        "<td id='parqinfo'><strong>" . $aluno->getParqProblemaCoracao() . "</strong></td>" . 
        "<td>1- Seu médico alguma vez disse que você tem problema no coração e que deve apenas praticar atividades físicas<br> recomendadas por médico?</td>" . 
    "</tr>" . 
           "<td id='parqinfo'><strong>" . $aluno->getParqDorPeitoComAtividade() . "</strong></td>" . 
           "<td>2- Você sente dor no peito quando pratica atividade física?</td>" . 
        "</tr>" . 
        "<tr>" . 
           "<td id='parqinfo'><strong>" . $aluno->getParqDorPeitoSemAtividade() . "</strong></td>" . 
           "<td>3- No mês passado, você teve dor no peito quanto não estava praticando atividade física?</td>" . 
        "</tr>" . 
        "<tr>" . 
           "<td id='parqinfo'><strong>" . $aluno->getParqEquilibrio() . "</strong></td>" . 
           "<td>4- Você perde o equilíbrio devido a tonturas ou alguma vez perdeu a consciência?</td>" . 
        "</tr>" . 
        "<tr>" . 
           "<td id='parqinfo'><strong>" . $aluno->getParqProblemaOsseo() . "</strong></td>" . 
           "<td>5- Você tem problema ósseo ou articular que poderia ficar pior por alguma mudança em sua atividade física?</td>" . 
        "</tr>" . 
        "<tr>" . 
           "<td id='parqinfo'><strong>" . $aluno->getParqReceitaMedica() . "</strong></td>" . 
           "<td>6- Seu médico está atualmente receitando algum remédio (por exemplo, diuréticos) para pressão arterial ou<br> problema  cardíaco?</td>" . 
        "</tr>" . 
        "<tr>" . 
           "<td id='parqinfo'><strong>" . $aluno->getParqRazao() . "</strong></td>" . 
           "<td>7- Você sabe de qualquer outra razão pela qual não deva praticar atividade física?</td>" . 
        "</tr>" . 
        "</table>" .
        "</div>".
        "<h1><u id='txt'>HISTÓRICO FAMILIAR:</u></h1>" .
        "<table border='1' style='border-collapse: collapse; width: 100%; text-align: left;'>" .
        "<tr>" .
           "<td id='obesidade'>OBESIDADE: <strong>" . $aluno->getObesidade() . "</strong></td>" .
           "<td id='diabetes'>DIABETES: <strong>" . $aluno->getDiabetes() . "</strong></td>" .
           "<td id='colesterolElevado'>COLESTEROL ELEVADO: <strong>" . $aluno->getColesterolElevado() . "</strong></td>" .
           "<td id='infarto'>INFARTO: <strong>" . $aluno->getInfarto() . "</strong></td>" .
           "<td id='doencaCardiaca'>DOENÇA CARDÍACA: <strong>" . $aluno->getDoencaCardiaca() . "</strong></td>" .
           "<td id='derrame'>DERRAME: <strong>" . $aluno->getDerrame() . "</strong></td>" .
           "<td id='pressaoAlta'>PRESSÃO ALTA: <strong>" . $aluno->getPressaoAlta() . "</strong></td>" .
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
