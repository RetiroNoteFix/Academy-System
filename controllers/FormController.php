<?php
 include_once '../models/Usuario.php';
 include_once '../models/Pessoa.php';
 include_once '../models/Pagamento.php';
 include_once '../models/Aluno.php';
 include_once '../config/database.php';
// RECEBE O FORMULÁRIO DO LOGIN
function recebeDadosLogin() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nomeusuario = $_POST['nomeusuario'];
        $senhausuario = $_POST['senhausuario'];
        Usuario::fazerLogin($nomeusuario, $senhausuario);
    }
}
// RECEBE O FORUMLÁRIO DO CADASTRO DE USUÁRIO
function recebeDadosUsuario() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nomeusuario = $_POST['nomeusuarionovo'];
        $nomeMaiusculo = strtoupper($nomeusuario);
        $senhausuario = $_POST['senhausuario'];
        $tipousuario = $_POST['tipousuario'];
        Usuario::criarNovo($nomeMaiusculo, $senhausuario, $tipousuario);
    }
}
// RECEBE O FORMULÁRIO DE PAGAMENTO NOTIFICADO
function recebedadospagamentonotificado() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $idpagarnotificado = $_POST['idpagarnotificado'];
        $data_pagamentonotificada = $_POST['data_pagamentonotificada'];
        $valornotificado = $_POST['valornotificado'];
        $valornotificado = str_replace('R$', '', $valornotificado);
$valornotificado = trim($valornotificado);
$valornotificado = str_replace(',', '.', $valornotificado);
$valor_decimal = (float) $valornotificado;
if ($valor_decimal === 0.00){
    echo "Valor Inválido!";
    exit;
}
        $datavencimentonotificada = $_POST['datavencimentonotificada'];
        $resposta_notificado = new Pagamento();
        $resposta_notificado -> atualizaPagamento($idpagarnotificado, $data_pagamentonotificada, $valor_decimal, $datavencimentonotificada);
        if ($resposta_notificado) {
            echo "Dados atualizados com sucesso.";
        } else {
            echo "Erro ao atualizar os dados.";
        }
    } else {
        echo "Método de requisição inválido. Use POST.";
    }
}

// RECEBE AS INFORMAÇÕES PARA IGNORAR O PAGAMENTO
function ignorarpagamentos() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $alunoId_ignorados = $_POST['alunoId_ignorados'];
        $vencimento_ignorados = $_POST['vencimento_ignorados'];
        $resposta_ignorada = new Pagamento();
        $resposta_ignorada -> ignorarPagamento($alunoId_ignorados, $vencimento_ignorados);
        if ($resposta_ignorada) {
        } else {
            echo "Erro ao atualizar os dados.";
        }
    } else {
        echo "Método de requisição inválido. Use POST.";
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








function cadastrarAluno() {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        function obterValorCampo($campo, $valorPadrao = 'Não Informado') {
            if (isset($_POST[$campo]) && $_POST[$campo] === 'Não') {
                return 'Não'; // Se o valor for "Não", retorna "Não"
            }
            
            // Caso o valor esteja preenchido ou vazio, retorna o valor padrão
            return isset($_POST[$campo]) && trim($_POST[$campo]) !== '' ? $_POST[$campo] : $valorPadrao;
        }
        
        
       
$nome = obterValorCampo('nome');
$nomeAlunoMaiusculo = strtoupper($nome);
$data_nascimento = obterValorCampo('data_nascimento');
$idade = obterValorCampo('idade');
$estado_civil = obterValorCampo('estado_civil');
$rg = obterValorCampo('rg');
$cpf = obterValorCampo('cpf');
$telefone = obterValorCampo('telefone');
$telefone_familia = obterValorCampo('telefone_familia');
$email = obterValorCampo('email');
$cep = obterValorCampo('cep');
$estado = obterValorCampo('estado');
$bairro = obterValorCampo('bairro');
$cidade = obterValorCampo('cidade');
$numero = obterValorCampo('numero');
$complemento = obterValorCampo('complemento');
$sexo = obterValorCampo('sexo');
$plano = obterValorCampo('plano');
$profissao = obterValorCampo('profissao');
$escolaridade = obterValorCampo('escolaridade');
$peso = obterValorCampo('peso');
$altura = obterValorCampo('altura');
$tipo_sanguineo = obterValorCampo('tipo_sanguineo');
$pressao_arterial = obterValorCampo('pressao_arterial');
$cirurgia = obterValorCampo('cirurgia');
$dorme_bem = obterValorCampo('dorme_bem');
$lesao_articular = isset($_POST['lesao_articular']) ? $_POST['lesao_articular'] : null;
$problema_coluna = obterValorCampo('problema_coluna');
$tempo_sem_medico = obterValorCampo('tempo_sem_medico');
$uso_medicamento = obterValorCampo('uso_medicamento');
$problema_saude = obterValorCampo('problema_saude');
$varizes = obterValorCampo('varizes');
$infarto = obterValorCampo('infarto');
$doenca_cardiaca = isset($_POST['doenca_cardiaca']) ? $_POST['doenca_cardiaca'] : null;
$derrame = obterValorCampo('derrame');
$diabetes = obterValorCampo('diabetes');
$obesidade = obterValorCampo('obesidade');
$colesterol_elevado = obterValorCampo('colesterol_elevado');
$fumar = obterValorCampo('fumar');
$faz_dieta = obterValorCampo('faz_dieta');
$bebida_alcoolica = obterValorCampo('bebida_alcoolica');
$sedentario = obterValorCampo('sedentario');
$jaFez_modalidade = obterValorCampo('jaFez_modalidade');
$modalidade_atual = obterValorCampo('modalidade_atual');
$objetivo_atividade_fisica = obterValorCampo('objetivo_atividade_fisica');
$soubeDa_academia = obterValorCampo('soubeDa_academia');
$par_q1 = obterValorCampo('par_q1');
$par_q2 = obterValorCampo('par_q2');
$par_q3 = obterValorCampo('par_q3');
$par_q4 = obterValorCampo('par_q4');
$par_q5 = obterValorCampo('par_q5');
$par_q6 = obterValorCampo('par_q6');
$par_q7 = obterValorCampo('par_q7');
$torax = obterValorCampo('torax');
$cintura = obterValorCampo('cintura');
$abdome = obterValorCampo('abdome');
$quadril = obterValorCampo('quadril');
$bracos = obterValorCampo('bracos');
$antebracos = obterValorCampo('antebracos');
$pernas = obterValorCampo('pernas');
$panturrilha = obterValorCampo('panturrilha');
$obsmedida = obterValorCampo('obsmedida');
$valor = obterValorCampo('valor');
$data_pagamento = obterValorCampo('data_pagamento');
$rua = obterValorCampo('rua');
$lesao_detalhes = $_POST['lesao_detalhes'];
$coluna_detalhes = obterValorCampo('coluna_detalhes');
$doenca_detalhes = $_POST['doenca_detalhes'];
$valor = str_replace('R$', '', $valor);
$valor = trim($valor);
$valor = str_replace(',', '.', $valor);
$valor_decimal = (float) $valor;
if ($valor_decimal === 0.00){
    echo "Valor Inválido!";
    exit;
}
if (!empty($lesao_detalhes)) {
    $lesao_articular = $lesao_detalhes;
}
if (!empty($coluna_detalhes)) {
    $problema_coluna = $coluna_detalhes;
}
if (!empty($doenca_detalhes)) {
    $doenca_cardiaca = $doenca_detalhes;
}
function criarEndereco($cep, $rua, $estado, $bairro, $cidade, $numero, $complemento) {
    $cep = !empty($cep) ? $cep : "Não Informado";
    $rua = !empty($rua) ? $rua : "Não Informado";
    $numero = !empty($numero) ? $numero : "Não Informado";
    $bairro = !empty($bairro) ? $bairro : "Não Informado";
    $cidade = !empty($cidade) ? $cidade : "Não Informado";
    $estado = !empty($estado) ? $estado : "Não Informado";
    $complemento = !empty($complemento) ? $complemento : "Não Informado";

    $endereco = $rua . ', ' . $numero . ', ' . $bairro . ', ' . $cidade . '-' . $estado . ', ' . $cep . ', ' . $complemento;
    return $endereco;
}
$endereco = criarEndereco($cep, $rua, $estado, $bairro, $cidade, $numero, $complemento);

        try {
            $database = new Database();
    $conn = $database->getConnection();
            ini_set('display_errors', 1);
            error_reporting(E_ALL);
            $pessoa = new Pessoa(
                $conn,
                null, 
                $nomeAlunoMaiusculo,
                $cpf,
                $rg,
                $email,
                $telefone,
                $telefone_familia,
                $data_nascimento,
                null,
                $endereco
                
            );
            $idPessoa = $pessoa->inserirPessoa();
            $query = "INSERT INTO alunos (idPessoa, profissao, escolaridade, estadoCivil, tipoSanguineo, modalidade, 
    comoSoubeAcademia, objetivo, idade, peso, altura, fuma, fazDieta, usaBebidaAlcoolica, 
    sedentario, modalidadeAnterior, temVarizes, pressaoArterial, cirurgia, dormeBem, 
    lesaoArticular, problemaColuna, tempoMedico, medicamento, problemaSaude, 
    parqProblemaCoracao, parqDorPeitoComAtividade, parqDorPeitoSemAtividade, parqEquilibrio, 
    parqProblemaOsseo, parqReceitaMedica, parqRazao, obesidade, diabetes, colesterolElevado, 
    infarto, doencaCardiaca, derrame, medidaTorax, medidaCintura, medidaAbdome, 
    medidaQuadril, medidaBracos, medidaAntebracos, medidaPanturrilha, medidaPernas, observacoes, 
    valor, data_pagamento, plano
) 
VALUES (:idPessoa, :profissao, :escolaridade, :estadoCivil, :tipoSanguineo, :modalidade, 
    :comoSoubeAcademia, :objetivo, :idade, :peso, :altura, :fuma, :fazDieta, :usaBebidaAlcoolica, 
    :sedentario, :modalidadeAnterior, :temVarizes, :pressaoArterial, :cirurgia, :dormeBem, 
    :lesaoArticular, :problemaColuna, :tempoMedico, :medicamento, :problemaSaude, 
    :parqProblemaCoracao, :parqDorPeitoComAtividade, :parqDorPeitoSemAtividade, :parqEquilibrio, 
    :parqProblemaOsseo, :parqReceitaMedica, :parqRazao, :obesidade, :diabetes, :colesterolElevado, 
    :infarto, :doencaCardiaca, :derrame, :medidaTorax, :medidaCintura, :medidaAbdome, 
    :medidaQuadril, :medidaBracos, :medidaAntebracos, :medidaPanturrilha, :medidaPernas, :observacoes, 
    :valor, :data_pagamento, :plano
);
";

            // Preparar a execução da query
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':idPessoa', $idPessoa);
            $stmt->bindParam(':profissao', $profissao);
            $stmt->bindParam(':escolaridade', $escolaridade);
            $stmt->bindParam(':estadoCivil', $estado_civil);
            $stmt->bindParam(':tipoSanguineo', $tipo_sanguineo);
            $stmt->bindParam(':modalidade', $modalidade_atual);
            $stmt->bindParam(':comoSoubeAcademia', $soubeDa_academia);
            $stmt->bindParam(':objetivo', $objetivo_atividade_fisica);
            $stmt->bindParam(':idade', $idade);
            $stmt->bindParam(':peso', $peso);
            $stmt->bindParam(':altura', $altura);
            $stmt->bindParam(':fuma', $fumar);
            $stmt->bindParam(':fazDieta', $faz_dieta);
            $stmt->bindParam(':usaBebidaAlcoolica', $bebida_alcoolica);
            $stmt->bindParam(':sedentario', $sedentario);
            $stmt->bindParam(':modalidadeAnterior', $jaFez_modalidade);
            $stmt->bindParam(':temVarizes', $varizes);
            $stmt->bindParam(':pressaoArterial', $pressao_arterial);
            $stmt->bindParam(':cirurgia', $cirurgia);
            $stmt->bindParam(':dormeBem', $dorme_bem);
            $stmt->bindParam(':lesaoArticular', $lesao_articular);
            $stmt->bindParam(':problemaColuna', $problema_coluna);
            $stmt->bindParam(':tempoMedico', $tempo_sem_medico);
            $stmt->bindParam(':medicamento', $uso_medicamento);
            $stmt->bindParam(':problemaSaude', $problema_saude);
            $stmt->bindParam(':parqProblemaCoracao', $par_q1);
            $stmt->bindParam(':parqDorPeitoComAtividade', $par_q2);
            $stmt->bindParam(':parqDorPeitoSemAtividade', $par_q3);
            $stmt->bindParam(':parqEquilibrio', $par_q4);
            $stmt->bindParam(':parqProblemaOsseo', $par_q5);
            $stmt->bindParam(':parqReceitaMedica', $par_q6);
            $stmt->bindParam(':parqRazao', $par_q7);
            $stmt->bindParam(':obesidade', $obesidade);
            $stmt->bindParam(':diabetes', $diabetes);
            $stmt->bindParam(':colesterolElevado', $colesterol_elevado);
            $stmt->bindParam(':infarto', $infarto);
            $stmt->bindParam(':doencaCardiaca', $doenca_cardiaca);
            $stmt->bindParam(':derrame', $derrame);
            $stmt->bindParam(':medidaTorax', $torax);
            $stmt->bindParam(':medidaCintura', $cintura);   
            $stmt->bindParam(':medidaAbdome', $abdome);
            $stmt->bindParam(':medidaQuadril', $quadril);
            $stmt->bindParam(':medidaBracos', $bracos);
            $stmt->bindParam(':medidaAntebracos', $antebracos);
            $stmt->bindParam(':medidaPanturrilha', $panturrilha);
            $stmt->bindParam(':medidaPernas', $pernas);    
            $stmt->bindParam(':observacoes', $obsmedida);     
            $stmt->bindParam(':valor', $valor_decimal);
            $stmt->bindParam(':data_pagamento', $data_pagamento);
            $stmt->bindParam(':plano', $plano);

            // Executar a query para inserir o aluno
            $stmt->execute();

            echo "Aluno <span id='alert'>" . $nomeAlunoMaiusculo   . "</span> Cadastrado com sucesso!";
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
}

function editarAluno() {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        function obterValorCampo($campo, $valorPadrao = 'Não Informado') {
            if (isset($_POST[$campo]) && $_POST[$campo] === 'Não') {
                return 'Não'; // Se o valor for "Não", retorna "Não"
            }

            return isset($_POST[$campo]) && trim($_POST[$campo]) !== '' ? $_POST[$campo] : $valorPadrao;
        }
        
    
        $idAlunoEditado = $_POST['idAlunoEditado'];
$nome = obterValorCampo('nomeEditado');
$nomeAlunoMaiusculo = strtoupper($nome);
$data_nascimento = obterValorCampo('data_nascimento');
$idade = obterValorCampo('idade');
$estado_civil = obterValorCampo('estado_civil');
$rg = obterValorCampo('rg');
$cpf = obterValorCampo('cpf');
$telefone = obterValorCampo('telefone');
$telefone_familia = obterValorCampo('telefone_familia');
$email = obterValorCampo('email');
$cep = obterValorCampo('cep');
$estado = obterValorCampo('estado');
$bairro = obterValorCampo('bairro');
$cidade = obterValorCampo('cidade');
$numero = obterValorCampo('numero');
$complemento = obterValorCampo('complemento');
$sexo = obterValorCampo('sexo');
$plano = $_POST['planoAlunoEditado'];
$profissao = obterValorCampo('profissao');
$escolaridade = obterValorCampo('escolaridade');
$peso = obterValorCampo('peso');
$altura = obterValorCampo('altura');
$tipo_sanguineo = obterValorCampo('tipo_sanguineo');
$pressao_arterial = obterValorCampo('pressao_arterial');
$cirurgia = obterValorCampo('cirurgia');
$dorme_bem = obterValorCampo('dorme_bem');
$lesao_articular = isset($_POST['lesao_articular']) ? $_POST['lesao_articular'] : null;
$problema_coluna = obterValorCampo('problema_coluna');
$tempo_sem_medico = obterValorCampo('tempo_sem_medico');
$uso_medicamento = obterValorCampo('uso_medicamento');
$problema_saude = obterValorCampo('problema_saude');
$varizes = obterValorCampo('varizes');
$infarto = obterValorCampo('infarto');
$doenca_cardiaca = isset($_POST['doenca_cardiaca']) ? $_POST['doenca_cardiaca'] : null;
$derrame = obterValorCampo('derrame');
$diabetes = obterValorCampo('diabetes');
$obesidade = obterValorCampo('obesidade');
$colesterol_elevado = obterValorCampo('colesterol_elevado');
$fumar = obterValorCampo('fumar');
$faz_dieta = obterValorCampo('faz_dieta');
$bebida_alcoolica = obterValorCampo('bebida_alcoolica');
$sedentario = obterValorCampo('sedentario');
$jaFez_modalidade = obterValorCampo('jaFez_modalidade');
$modalidade_atual = obterValorCampo('modalidade_atual');
$objetivo_atividade_fisica = obterValorCampo('objetivo_atividade_fisica');
$soubeDa_academia = obterValorCampo('soubeDa_academia');
$par_q1 = obterValorCampo('par_q1');
$par_q2 = obterValorCampo('par_q2');
$par_q3 = obterValorCampo('par_q3');
$par_q4 = obterValorCampo('par_q4');
$par_q5 = obterValorCampo('par_q5');
$par_q6 = obterValorCampo('par_q6');
$par_q7 = obterValorCampo('par_q7');
$torax = obterValorCampo('torax');
$cintura = obterValorCampo('cintura');
$abdome = obterValorCampo('abdome');
$quadril = obterValorCampo('quadril');
$bracos = obterValorCampo('bracos');
$antebracos = obterValorCampo('antebracos');
$pernas = obterValorCampo('pernas');
$panturrilha = obterValorCampo('panturrilha');
$obsmedida = obterValorCampo('obsmedida');
$data_pagamento = obterValorCampo('data_pagamento');
$rua = obterValorCampo('rua');
$lesao_detalhes = $_POST['lesao_detalhes'];
$coluna_detalhes = obterValorCampo('coluna_detalhes');
$doenca_detalhes = $_POST['doenca_detalhes'];
if (!empty($lesao_detalhes)) {
    $lesao_articular = $lesao_detalhes;
}
if (!empty($coluna_detalhes)) {
    $problema_coluna = $coluna_detalhes;
}
if (!empty($doenca_detalhes)) {
    $doenca_cardiaca = $doenca_detalhes;
}

function criarEndereco($cep, $rua, $estado, $bairro, $cidade, $numero, $complemento) {
    $cep = !empty($cep) ? $cep : "Não Informado";
    $rua = !empty($rua) ? $rua : "Não Informado";
    $numero = !empty($numero) ? $numero : "Não Informado";
    $bairro = !empty($bairro) ? $bairro : "Não Informado";
    $cidade = !empty($cidade) ? $cidade : "Não Informado";
    $estado = !empty($estado) ? $estado : "Não Informado";
    $complemento = !empty($complemento) ? $complemento : "Não Informado";

    $endereco = $rua . ', ' . $numero . ', ' . $bairro . ', ' . $cidade . '-' . $estado . ', ' . $cep . ', ' . $complemento;
    return $endereco;
}
$endereco = criarEndereco($cep, $rua, $estado, $bairro, $cidade, $numero, $complemento);

        try {
            $database = new Database();
    $conn = $database->getConnection();
            ini_set('display_errors', 1);
            error_reporting(E_ALL);
            $query = "START TRANSACTION;

-- Atualiza a tabela 'alunos'
UPDATE alunos
SET 
    profissao = :profissao,
    escolaridade = :escolaridade,
    estadoCivil = :estadoCivil,
    tipoSanguineo = :tipoSanguineo,
    modalidade = :modalidade,
    comoSoubeAcademia = :comoSoubeAcademia,
    objetivo = :objetivo,
    idade = :idade,
    peso = :peso,
    altura = :altura,
    fuma = :fuma,
    fazDieta = :fazDieta,
    usaBebidaAlcoolica = :usaBebidaAlcoolica,
    sedentario = :sedentario,
    modalidadeAnterior = :modalidadeAnterior,
    temVarizes = :temVarizes,
    pressaoArterial = :pressaoArterial,
    cirurgia = :cirurgia,
    dormeBem = :dormeBem,
    lesaoArticular = :lesaoArticular,
    problemaColuna = :problemaColuna,
    tempoMedico = :tempoMedico,
    medicamento = :medicamento,
    problemaSaude = :problemaSaude,
    parqProblemaCoracao = :parqProblemaCoracao,
    parqDorPeitoComAtividade = :parqDorPeitoComAtividade,
    parqDorPeitoSemAtividade = :parqDorPeitoSemAtividade,
    parqEquilibrio = :parqEquilibrio,
    parqProblemaOsseo = :parqProblemaOsseo,
    parqReceitaMedica = :parqReceitaMedica,
    parqRazao = :parqRazao,
    obesidade = :obesidade,
    diabetes = :diabetes,
    colesterolElevado = :colesterolElevado,
    infarto = :infarto,
    doencaCardiaca = :doencaCardiaca,
    derrame = :derrame,
    medidaTorax = :medidaTorax,
    medidaCintura = :medidaCintura,
    medidaAbdome = :medidaAbdome,
    medidaQuadril = :medidaQuadril,
    medidaBracos = :medidaBracos,
    medidaAntebracos = :medidaAntebracos,
    medidaPanturrilha = :medidaPanturrilha,
    medidaPernas = :medidaPernas,
    observacoes = :observacoes,
    plano = :plano
WHERE idPessoa = :idPessoa;

-- Atualiza a tabela 'pessoas'
UPDATE pessoas
SET 
    nome = :nome,
    cpf = :cpf,
    rg = :rg,
    email = :email,
    telefone = :telefone,
    telefone_familiar = :telefone_familiar,
    dataNascimento = :dataNascimento,
    endereco = :endereco
WHERE idPessoa = :idPessoa;

COMMIT;";


            // Preparar a execução da query
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':nome', $nomeAlunoMaiusculo);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':rg', $rg);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':telefone_familiar', $telefone_familia);
            $stmt->bindParam(':dataNascimento', $data_nascimento);
            $stmt->bindParam(':endereco', $endereco);
            $stmt->bindParam(':idPessoa', $idAlunoEditado);
            $stmt->bindParam(':profissao', $profissao);
            $stmt->bindParam(':escolaridade', $escolaridade);
            $stmt->bindParam(':estadoCivil', $estado_civil);
            $stmt->bindParam(':tipoSanguineo', $tipo_sanguineo);
            $stmt->bindParam(':modalidade', $modalidade_atual);
            $stmt->bindParam(':comoSoubeAcademia', $soubeDa_academia);
            $stmt->bindParam(':objetivo', $objetivo_atividade_fisica);
            $stmt->bindParam(':idade', $idade);
            $stmt->bindParam(':peso', $peso);
            $stmt->bindParam(':altura', $altura);
            $stmt->bindParam(':fuma', $fumar);
            $stmt->bindParam(':fazDieta', $faz_dieta);
            $stmt->bindParam(':usaBebidaAlcoolica', $bebida_alcoolica);
            $stmt->bindParam(':sedentario', $sedentario);
            $stmt->bindParam(':modalidadeAnterior', $jaFez_modalidade);
            $stmt->bindParam(':temVarizes', $varizes);
            $stmt->bindParam(':pressaoArterial', $pressao_arterial);
            $stmt->bindParam(':cirurgia', $cirurgia);
            $stmt->bindParam(':dormeBem', $dorme_bem);
            $stmt->bindParam(':lesaoArticular', $lesao_articular);
            $stmt->bindParam(':problemaColuna', $problema_coluna);
            $stmt->bindParam(':tempoMedico', $tempo_sem_medico);
            $stmt->bindParam(':medicamento', $uso_medicamento);
            $stmt->bindParam(':problemaSaude', $problema_saude);
            $stmt->bindParam(':parqProblemaCoracao', $par_q1);
            $stmt->bindParam(':parqDorPeitoComAtividade', $par_q2);
            $stmt->bindParam(':parqDorPeitoSemAtividade', $par_q3);
            $stmt->bindParam(':parqEquilibrio', $par_q4);
            $stmt->bindParam(':parqProblemaOsseo', $par_q5);
            $stmt->bindParam(':parqReceitaMedica', $par_q6);
            $stmt->bindParam(':parqRazao', $par_q7);
            $stmt->bindParam(':obesidade', $obesidade);
            $stmt->bindParam(':diabetes', $diabetes);
            $stmt->bindParam(':colesterolElevado', $colesterol_elevado);
            $stmt->bindParam(':infarto', $infarto);
            $stmt->bindParam(':doencaCardiaca', $doenca_cardiaca);
            $stmt->bindParam(':derrame', $derrame);
            $stmt->bindParam(':medidaTorax', $torax);
            $stmt->bindParam(':medidaCintura', $cintura);   
            $stmt->bindParam(':medidaAbdome', $abdome);
            $stmt->bindParam(':medidaQuadril', $quadril);
            $stmt->bindParam(':medidaBracos', $bracos);
            $stmt->bindParam(':medidaAntebracos', $antebracos);
            $stmt->bindParam(':medidaPanturrilha', $panturrilha);
            $stmt->bindParam(':medidaPernas', $pernas);    
            $stmt->bindParam(':observacoes', $obsmedida);     
            $stmt->bindParam(':plano', $plano);

            // Executar a query para inserir o aluno
            $stmt->execute();

            echo "Aluno <span id='alert'>" . $nomeAlunoMaiusculo  . "</span> Editado com sucesso!";
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

}




function desativarAluno() {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $idDesativarPessoa = $_POST['id'];

        try {
            $database = new Database();
            $conn = $database->getConnection();

            // Exibir erros para depuração
            ini_set('display_errors', 1);
            error_reporting(E_ALL);

            // Query para desativar o aluno
            $query = "UPDATE alunos
                      SET situacao = 'Inativo'
                      WHERE idPessoa = :idPessoa;";

            // Preparar e executar a query
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':idPessoa', $idDesativarPessoa, PDO::PARAM_INT);

            // Verificar se o ID é válido e se a execução ocorreu
            if ($stmt->execute()) {
                echo "Aluno desativado com sucesso!";
            } else {
                echo "Erro ao desativar o aluno. Verifique o ID.";
            }
        } catch (Exception $e) {
            // Retornar mensagem de erro em texto simples
            echo "Erro: " . $e->getMessage();
        }
    } else {
        // Retornar erro caso o método não seja POST
        echo "Método inválido. Use POST.";
    }
}

function ativarAluno() {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $idAtivarPessoa = $_POST['idativar'];

        try {
            $database = new Database();
            $conn = $database->getConnection();

            // Exibir erros para depuração
            ini_set('display_errors', 1);
            error_reporting(E_ALL);

            // Query para desativar o aluno
            $query = "UPDATE alunos
                      SET situacao = 'Ativo'
                      WHERE idPessoa = :idPessoa;";

            // Preparar e executar a query
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':idPessoa', $idAtivarPessoa, PDO::PARAM_INT);

            // Verificar se o ID é válido e se a execução ocorreu
            if ($stmt->execute()) {
                echo "Aluno Ativado com sucesso!";
            } else {
                echo "Erro ao desativar o aluno. Verifique o ID.";
            }
        } catch (Exception $e) {
            // Retornar mensagem de erro em texto simples
            echo "Erro: " . $e->getMessage();
        }
    } else {
        // Retornar erro caso o método não seja POST
        echo "Método inválido. Use POST.";
    }
}








if (isset($_POST['nomeusuario'])) {
    recebedadoslogin(); 
}

elseif (isset($_POST['nome'])) {
    cadastrarAluno();
} 
elseif (isset($_POST['nomeEditado'])) {
    editarAluno();
} 
elseif (isset($_POST['search'])) {
    recebepesquisa();
    
} 
elseif (isset($_POST['idpagar'])) {
    recebedadospagamento();
    
} 
elseif (isset($_POST['id'])) {
    desativarAluno();
    
} 
elseif (isset($_POST['idativar'])) {
    ativarAluno();
    
} 

elseif (isset($_POST['idpagarnotificado'])) {
    recebedadospagamentonotificado();
    
}
elseif (isset($_POST['nomeusuarionovo'])) {
    recebeDadosUsuario();
    
} 
elseif (isset($_POST['alunoId_ignorados'])) {
    ignorarpagamentos();
    
} 
?>
