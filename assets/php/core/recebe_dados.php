<?php
include_once 'inserir_dados.php';
// RECEBE O FORMULÁRIO DO LOGIN
function recebeDadosLogin() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nomeusuario = $_POST['nomeusuario'];
        $senhausuario = $_POST['senhausuario'];
        fazerLogin($nomeusuario, $senhausuario);
    }
}

//RECEBE O FORMULÁRIO DE PESQUISA
function recebepesquisa() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $pesquisaluno = $_POST['search'];
        pesquisarAluno($pesquisaluno);
    }
}


function recebedadospagamento() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Receber os dados diretamente do formulário
        $nomepagar = $_POST['nomepagar'];
        $idpagar = $_POST['idpagar'];  // ID do aluno
        $data_pagamento = $_POST['data_pagamento'];  // Valor referente a Janeiro
        $valor = $_POST['valor'];  // Valor referente a Fevereiro
        realizarPagamento($nomepagar, $idpagar, $data_pagamento, $valor);
    }
}

function ignorarpagamentos() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Receber os dados diretamente do formulário
        $alunoId_ignorados = $_POST['alunoId_ignorados'];  // ID do aluno
        $vencimento_ignorados = $_POST['vencimento_ignorados'];  // Valor referente a Janeiro
        ignorarPagamento($alunoId_ignorados, $vencimento_ignorados);
    }
}

function recebedadospagamentonotificado() {
    // Verifica se a requisição é do tipo POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recebe os dados do formulário
        $idpagarnotificado = $_POST['idpagarnotificado'];
        $data_pagamentonotificada = $_POST['data_pagamentonotificada'];
        $valornotificado = $_POST['valornotificado'];
        $datavencimentonotificada = $_POST['datavencimentonotificada'];

        // Chama a função para atualizar os dados no banco de dados
        $resposta_notificado = atualizaPagamento($idpagarnotificado, $data_pagamentonotificada, $valornotificado, $datavencimentonotificada);

        // Exibe uma resposta simples sem usar JSON
        if ($resposta_notificado) {
            echo "Dados atualizados com sucesso.";
        } else {
            echo "Erro ao atualizar os dados.";
        }
    } else {
        // Se o método não for POST
        echo "Método de requisição inválido. Use POST.";
    }
}

// Chama a função para processar a requisição





function recebedadosaluno() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Receber os dados diretamente do formulário
        $nomealuno = $_POST['nomealuno'];
        $rg = $_POST['rg'];
        $cpf = $_POST['cpf'];
        $endereco = $_POST['endereco'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $cep = $_POST['cep'];
        $telefone = $_POST['telefone'];
        $telefone2 = $_POST['telefone2'];
        $profissao = $_POST['profissao'];
        $datanascimento = $_POST['datanascimento'];
        $escolaridade = $_POST['escolaridade'];
        $estadocivil = $_POST['estadocivil'];
        $tiposanguineo = $_POST['tiposanguineo'];
        $modalidade = $_POST['modalidade'];
        $comosoubedaacademia = $_POST['comosoubedaacademia'];
        $objetivo = $_POST['objetivo'];
        $idade = $_POST['idade'];
        $infarto = $_POST['infarto'];
        $doencacardiaca = $_POST['doencacardiaca'];
        $derrame = $_POST['derrame'];
        $peso = $_POST['peso'];
        $altura = $_POST['altura'];
        $fuma = $_POST['fuma'];
        $dieta = $_POST['dieta'];
        $bebidalcoolica = $_POST['bebidaalcoolica'];
        $sedentario = $_POST['sedentario'];
        $quemodalidadejafez = $_POST['quemodalidadejafez'];
        $pressao = $_POST['pressao'];
        $varizes = $_POST['varizes'];
        $cirurgia = $_POST['cirurgia'];
        $dormebem = $_POST['dormebem'];
        $lesaoarticular = $_POST['lesaoarticular'];
        $problemadecoluna = $_POST['problemadecoluna'];
        $tempomedico = $_POST['tempomedico'];
        $medicamento = $_POST['medicamento'];
        $problemasaude = $_POST['problemasaude'];
        $diabetes = $_POST['diabetes'];
        $obesidade = $_POST['obesidade'];
        $colesterol = $_POST['colesterol'];
        $pressaoalta = $_POST['pressaoalta'];
        $par_q1 = isset($_POST['par_q1']) ? $_POST['par_q1'] : null;
        $par_q2 = isset($_POST['par_q2']) ? $_POST['par_q2'] : null;
        $par_q3 = isset($_POST['par_q3']) ? $_POST['par_q3'] : null;
        $par_q4 = isset($_POST['par_q4']) ? $_POST['par_q4'] : null;
        $par_q5 = isset($_POST['par_q5']) ? $_POST['par_q5'] : null;
        $par_q6 = isset($_POST['par_q6']) ? $_POST['par_q6'] : null;
        $par_q7 = isset($_POST['par_q7']) ? $_POST['par_q7'] : null;
        $circunferencia = $_POST['circunferencia'];
        $torax = $_POST['torax'];
        $cintura = $_POST['cintura'];
        $abdome = $_POST['abdome'];
        $quadril = $_POST['quadril'];
        $bracos = $_POST['bracos'];
        $antebracos = $_POST['antebracos'];
        $coxas = $_POST['coxas'];
        $pernas = $_POST['pernas'];
        $data_pagamento = $_POST['data_pagamento'];  // Valor referente a Janeiro
        $valor = $_POST['valor'];
        

        // Chama a função que irá inserir no banco de dados
        inserirAluno($nomealuno, $rg, $cpf, $endereco, $bairro, $cidade, $cep, $telefone,  $telefone2, $profissao, $datanascimento, 
                     $escolaridade, $estadocivil, $tiposanguineo, $modalidade, $comosoubedaacademia, $objetivo, $idade, 
                     $infarto, $doencacardiaca, $derrame, $peso, $altura, $fuma, $dieta, $bebidalcoolica, $sedentario, 
                     $quemodalidadejafez, $pressao, $varizes, $cirurgia, $dormebem, $lesaoarticular, $problemadecoluna, 
                     $tempomedico, $medicamento, $problemasaude, $diabetes, $obesidade, $colesterol, $pressaoalta, $par_q1, $par_q2, $par_q3, $par_q4, $par_q5, $par_q6, $par_q7,
                    $circunferencia, $torax, $cintura, $abdome, $quadril, $bracos, $antebracos, $coxas, $pernas, $data_pagamento, $valor);
    }
}




function editaraluno() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $edit_nomealuno = $_POST['nomealunoedit'];
        $edit_rg = $_POST['rg'];
        $edit_cpf = $_POST['cpf'];
        $edit_endereco = $_POST['endereco'];
        $edit_bairro = $_POST['bairro'];
        $edit_cidade = $_POST['cidade'];
        $edit_cep = $_POST['cep'];
        $edit_telefone = $_POST['telefone'];
        $edit_profissao = $_POST['profissao'];
        $edit_datanascimento = $_POST['datanascimento'];
        $edit_escolaridade = $_POST['escolaridade'];
        $edit_estadocivil = $_POST['estadocivil'];
        $edit_tiposanguineo = $_POST['tiposanguineo'];
        $edit_modalidade = $_POST['modalidade'];
        $edit_comosoubedaacademia = $_POST['comosoubedaacademia'];
        $edit_objetivo = $_POST['objetivo'];
        $edit_idade = $_POST['idade'];
        $edit_infarto = $_POST['infarto'];
        $edit_doencacardiaca = $_POST['doencacardiaca'];
        $edit_derrame = $_POST['derrame'];
        $edit_peso = $_POST['peso'];
        $edit_altura = $_POST['altura'];
        $edit_fuma = $_POST['fuma'];
        $edit_dieta = $_POST['dieta'];
        $edit_bebidalcoolica = $_POST['bebidaalcoolica'];
        $edit_sedentario = $_POST['sedentario'];
        $edit_quemodalidadejafez = $_POST['quemodalidadejafez'];
        $edit_pressao = $_POST['pressao'];
        $edit_varizes = $_POST['varizes'];
        $edit_cirurgia = $_POST['cirurgia'];
        $edit_dormebem = $_POST['dormebem'];
        $edit_lesaoarticular = $_POST['lesaoarticular'];
        $edit_problemadecoluna = $_POST['problemadecoluna'];
        $edit_tempomedico = $_POST['tempomedico'];
        $edit_medicamento = $_POST['medicamento'];
        $edit_problemasaude = $_POST['problemasaude'];
        $edit_diabetes = $_POST['diabetes'];
        $edit_obesidade = $_POST['obesidade'];
        $edit_colesterol = $_POST['colesterol'];
        $edit_pressaoalta = $_POST['pressaoalta'];
        $edit_par_q1 = isset($_POST['par_q1']) ? $_POST['par_q1'] : null;
        $edit_par_q2 = isset($_POST['par_q2']) ? $_POST['par_q2'] : null;
        $edit_par_q3 = isset($_POST['par_q3']) ? $_POST['par_q3'] : null;
        $edit_par_q4 = isset($_POST['par_q4']) ? $_POST['par_q4'] : null;
        $edit_par_q5 = isset($_POST['par_q5']) ? $_POST['par_q5'] : null;
        $edit_par_q6 = isset($_POST['par_q6']) ? $_POST['par_q6'] : null;
        $edit_par_q7 = isset($_POST['par_q7']) ? $_POST['par_q7'] : null;
        $circunferencia = $_POST['circunferencia'];
        $torax = $_POST['torax'];
        $cintura = $_POST['cintura'];
        $abdome = $_POST['abdome'];
        $quadril = $_POST['quadril'];
        $bracos = $_POST['bracos'];
        $antebracos = $_POST['antebracos'];
        $coxas = $_POST['coxas'];
        $pernas = $_POST['pernas'];
        
        // Chama a função que irá inserir no banco de dados
        alteraraluno($id,
            $edit_nomealuno, $edit_rg, $edit_cpf, $edit_endereco, $edit_bairro, $edit_cidade, $edit_cep, $edit_telefone,
            $edit_profissao, $edit_datanascimento, $edit_escolaridade, $edit_estadocivil, $edit_tiposanguineo,
            $edit_modalidade, $edit_comosoubedaacademia, $edit_objetivo, $edit_idade, $edit_infarto, $edit_doencacardiaca,
            $edit_derrame, $edit_peso, $edit_altura, $edit_fuma, $edit_dieta, $edit_bebidalcoolica, $edit_sedentario,
            $edit_quemodalidadejafez, $edit_pressao, $edit_varizes, $edit_cirurgia, $edit_dormebem, $edit_lesaoarticular,
            $edit_problemadecoluna, $edit_tempomedico, $edit_medicamento, $edit_problemasaude, $edit_diabetes,
            $edit_obesidade, $edit_colesterol, $edit_pressaoalta, $edit_par_q1, $edit_par_q2, $edit_par_q3, $edit_par_q4,
            $edit_par_q5, $edit_par_q6, $edit_par_q7, $torax, $cintura, $abdome, $quadril, $bracos, $antebracos, $coxas, $pernas, $circunferencia
        );
    }
}
        



if (isset($_POST['nomeusuario'])) {
    recebedadoslogin(); 
}

elseif (isset($_POST['nomealuno'])) {
    recebedadosaluno();
} 
elseif (isset($_POST['nomealunoedit'])) {
    editaraluno();
} 
elseif (isset($_POST['search'])) {
    recebepesquisa();
    
} 
elseif (isset($_POST['idpagar'])) {
    recebedadospagamento();
    
} 

elseif (isset($_POST['idpagarnotificado'])) {
    recebedadospagamentonotificado();
    
} 
elseif (isset($_POST['alunoId_ignorados'])) {
    ignorarpagamentos();
    
} 
?>
