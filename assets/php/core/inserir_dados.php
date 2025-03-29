

<?php
include_once 'database.php';
function fazerLogin($nomeusuario, $senhausuario) {
    $database = new Database();
    $conn = $database->getConnection();

    try {
        $query = "SELECT id, nome, senha, tipo_usuario FROM usuarios WHERE nome = :nomeusuario";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':nomeusuario', $nomeusuario, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if (password_verify($senhausuario, $usuario['senha'])) {
                session_start();
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nome'] = $usuario['nome'];
                $_SESSION['usuario_tipo'] = $usuario['tipo_usuario'];

                echo json_encode([
                    'status' => 'success', 
                    'redirect' => '/academy/core/dashboard.php'
                ]);
                exit();
            } else {
                echo json_encode([
                    'status' => 'error', 
                    'message' => '<span id="alert">ERRO: Senha incorreta!</span>'
                ]);
                exit();
            }
        } else {
            echo json_encode([
                'status' => 'error', 
                'message' => '<span id="alert">ERRO: Usuário não encontrado!</span>'
            ]);
            exit();
        }
    } catch (PDOException $e) {
        echo json_encode([
            'status' => 'error', 
            'message' => 'Erro ao conectar com o banco de dados: ' . $e->getMessage()
        ]);
        exit();
    } finally {
        $conn = null; // Fecha a conexão
    }
}


function inserirAluno(
    $nomealuno, $rg, $cpf, $endereco, $bairro, $cidade, $cep, $telefone, $telefone2, $profissao, $datanascimento, 
    $escolaridade, $estadocivil, $tiposanguineo, $modalidade, $comosoubedaacademia, $objetivo, $idade, 
    $infarto, $doencacardiaca, $derrame, $peso, $altura, $fuma, $dieta, $bebidalcoolica, $sedentario, 
    $quemodalidadejafez, $pressao, $varizes, $cirurgia, $dormebem, $lesaoarticular, $problemadecoluna, 
    $tempomedico, $medicamento, $problemasaude, $diabetes, $obesidade, $colesterol, $pressaoalta, $par_q1,$par_q2,$par_q3,$par_q4,$par_q5,$par_q6,$par_q7, $circunferencia, $torax, $cintura, $abdome, $quadril, $bracos, $antebracos, $coxas, $pernas, $data_pagamento, $valor
) {
    $database = new Database();
    $conn = $database->getConnection();

    try {
        $query = "INSERT INTO alunos (
                    nomeAluno, rgAluno, cpfAluno, rua, bairro, cidade, cep, telefone, telefoneFamiliar, profissao, dataNascimento, escolaridade, 
                    estadoCivil, tipoSanguineo, modalidade, comoSoubeAcademia, objetivo, idade, infarto, doencaCardiaca, derrame, 
                    peso, altura, fuma, fazDieta, usaBebidaAlcoolica, sedentario, modalidadeAnterior, pressaoArterial, temVarizes, 
                    cirurgia, dormeBem, lesaoArticular, problemaColuna, tempoMedico, medicamento, problemaSaude, diabetes, obesidade, 
                    colesterolElevado, pressaoAlta, par_q_problemaCoracao, par_q_dorPeitocomatividade, par_q_dorPeitosematividade, par_q_equilibrio, par_q_problemaOsseo, par_q_receitaMedica, par_q_razao, torax, cintura, abdome, quadril, bracos, antebracos, coxas, pernas, data_pagamento, valor) 
                  VALUES ('$nomealuno', '$rg', '$cpf', '$endereco', '$bairro', '$cidade', '$cep', '$telefone', '$telefone2', '$profissao', '$datanascimento', 
                    '$escolaridade', '$estadocivil', '$tiposanguineo', '$modalidade', '$comosoubedaacademia', '$objetivo', '$idade', 
                    '$infarto', '$doencacardiaca', '$derrame', '$peso', '$altura', '$fuma', '$dieta', '$bebidalcoolica', '$sedentario', 
                    '$quemodalidadejafez', '$pressao', '$varizes', '$cirurgia', '$dormebem', '$lesaoarticular', '$problemadecoluna', 
                    '$tempomedico', '$medicamento', '$problemasaude', '$diabetes', '$obesidade', '$colesterol', '$pressaoalta' , '$par_q1' , '$par_q2' , '$par_q3' , '$par_q4' , '$par_q5' , '$par_q6' , '$par_q7', '$torax', '$cintura', '$abdome', '$quadril', '$bracos', '$antebracos', '$coxas', '$pernas', '$data_pagamento', '$valor')";

        // Preparar a consulta
        $stmt = $conn->prepare($query);


        // Executar a consulta
        $stmt->execute();

     echo "Aluno <span>$nomealuno</span> <br> Cadastrado com sucesso!";
    } catch (PDOException $e) {
        // Exibir erro e retornar false
        echo "Erro ao cadastrar aluno: " . $e->getMessage();
        return false;
    }
}


function alterarAluno(
    $id, $edit_nomealuno, $edit_rg, $edit_cpf, $edit_endereco, $edit_bairro, $edit_cidade, $edit_cep, $edit_telefone, 
    $edit_profissao, $edit_datanascimento, $edit_escolaridade, $edit_estadocivil, $edit_tiposanguineo, $edit_modalidade, 
    $edit_comosoubedaacademia, $edit_objetivo, $edit_idade, $edit_infarto, $edit_doencacardiaca, $edit_derrame, $edit_peso, 
    $edit_altura, $edit_fuma, $edit_dieta, $edit_bebidalcoolica, $edit_sedentario, $edit_quemodalidadejafez, $edit_pressao, 
    $edit_varizes, $edit_cirurgia, $edit_dormebem, $edit_lesaoarticular, $edit_problemadecoluna, $edit_tempomedico, 
    $edit_medicamento, $edit_problemasaude, $edit_diabetes, $edit_obesidade, $edit_colesterol, $edit_pressaoalta, 
    $edit_par_q1, $edit_par_q2, $edit_par_q3, $edit_par_q4, $edit_par_q5, $edit_par_q6, $edit_par_q7, $torax, $cintura, $abdome, $quadril, $bracos, $antebracos, $coxas, $pernas, $circunferencia
) {
    $database = new Database();
    $conn = $database->getConnection();

    try {
        // Montando a query com as variáveis prefixadas com 'edit_'
        $query = "UPDATE alunos SET 
                    nomeAluno = '$edit_nomealuno', 
                    rgAluno = '$edit_rg', 
                    cpfAluno = '$edit_cpf', 
                    rua = '$edit_endereco', 
                    bairro = '$edit_bairro', 
                    cidade = '$edit_cidade', 
                    cep = '$edit_cep', 
                    telefone = '$edit_telefone', 
                    profissao = '$edit_profissao', 
                    dataNascimento = '$edit_datanascimento', 
                    escolaridade = '$edit_escolaridade', 
                    estadoCivil = '$edit_estadocivil', 
                    tipoSanguineo = '$edit_tiposanguineo', 
                    modalidade = '$edit_modalidade', 
                    comoSoubeAcademia = '$edit_comosoubedaacademia', 
                    objetivo = '$edit_objetivo', 
                    idade = '$edit_idade', 
                    infarto = '$edit_infarto', 
                    doencaCardiaca = '$edit_doencacardiaca', 
                    derrame = '$edit_derrame', 
                    peso = '$edit_peso', 
                    altura = '$edit_altura', 
                    fuma = '$edit_fuma', 
                    fazDieta = '$edit_dieta', 
                    usaBebidaAlcoolica = '$edit_bebidalcoolica', 
                    sedentario = '$edit_sedentario', 
                    modalidadeAnterior = '$edit_quemodalidadejafez', 
                    pressaoArterial = '$edit_pressao', 
                    temVarizes = '$edit_varizes', 
                    cirurgia = '$edit_cirurgia', 
                    dormeBem = '$edit_dormebem', 
                    lesaoArticular = '$edit_lesaoarticular', 
                    problemaColuna = '$edit_problemadecoluna', 
                    tempoMedico = '$edit_tempomedico', 
                    medicamento = '$edit_medicamento', 
                    problemaSaude = '$edit_problemasaude', 
                    diabetes = '$edit_diabetes', 
                    obesidade = '$edit_obesidade', 
                    colesterolElevado = '$edit_colesterol', 
                    pressaoAlta = '$edit_pressaoalta', 
                    par_q_problemaCoracao = '$edit_par_q1',
                    par_q_dorPeitocomatividade = '$edit_par_q2', 
                    par_q_dorPeitosematividade = '$edit_par_q3', 
                    par_q_equilibrio = '$edit_par_q4', 
                    par_q_problemaOsseo = '$edit_par_q5', 
                    par_q_receitaMedica = '$edit_par_q6', 
                    par_q_razao = '$edit_par_q7',
                    torax = '$torax',
                    cintura = '$cintura',
                    abdome = '$abdome',
                    quadril = '$quadril',
                    bracos = '$bracos',
                    antebracos = '$antebracos',
                    coxas = '$coxas',
                    pernas = '$pernas',
                    observacoes = '$circunferencia'
                  WHERE idAluno = '$id'";

        // Preparar e executar a consulta diretamente
        $stmt = $conn->prepare($query);
        $stmt->execute();

        echo "Aluno <span>$edit_nomealuno</span> alterado com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao alterar aluno: " . $e->getMessage();
        return false;
    }
}


function realizarPagamento($nomepagar, $idpagar, $data_pagamento, $valor) {
    $database = new Database();
    $conn = $database->getConnection();

    try {
        // Converte a data de pagamento para o formato YYYY-MM-DD
        $data_pagamento = date('Y-m-d', strtotime($data_pagamento));
        $data_pagamento_obj = new DateTime($data_pagamento);

        $diaPagamento = (int)$data_pagamento_obj->format('d');
        $mesAtual = (int)$data_pagamento_obj->format('m');
        $anoAtual = (int)$data_pagamento_obj->format('Y');

        // Calcula o próximo mês
        $proximoMes = $mesAtual + 1;
        if ($proximoMes > 12) {
            $proximoMes = 1; // Ajusta para janeiro se passar de dezembro
            $anoAtual++;
        }

        // Obter o último dia do próximo mês
        $ultimoDiaDoProximoMes = cal_days_in_month(CAL_GREGORIAN, $proximoMes, $anoAtual);

        // Ajustar o dia de vencimento
        $proximoDia = $diaPagamento;
        if ($proximoDia > $ultimoDiaDoProximoMes) {
            $proximoDia = $ultimoDiaDoProximoMes; // Ajusta para o último dia do próximo mês, se necessário
        }

        // Define a data de vencimento final
        $data_vencimento = date("Y-m-d", strtotime("$anoAtual-$proximoMes-$proximoDia"));

        // Inserir o pagamento como "pago"
        $query_insert = "INSERT INTO mensalidades (aluno_id, nomeAluno, data_pagamento, valor, status) 
                         VALUES (:idpagar, :nomepagar, :data_pagamento, :valor, 'pago')";

        $stmt_insert = $conn->prepare($query_insert);

        // Bind dos parâmetros
        $stmt_insert->bindParam(':idpagar', $idpagar, PDO::PARAM_INT);
        $stmt_insert->bindParam(':nomepagar', $nomepagar, PDO::PARAM_STR);
        $stmt_insert->bindParam(':data_pagamento', $data_pagamento, PDO::PARAM_STR);
        $stmt_insert->bindParam(':valor', $valor, PDO::PARAM_STR);

        // Executa a primeira inserção com status "pago"
        $stmt_insert->execute();

        // Alterar o status para "pendente" e inserir um segundo registro
        $query_insert_pendente = "INSERT INTO mensalidades (aluno_id, nomeAluno, data_vencimento, valor, status) 
                                  VALUES (:idpagar, :nomepagar, :data_vencimento, :valor, 'pendente')";

        $stmt_insert_pendente = $conn->prepare($query_insert_pendente);

        // Bind dos parâmetros novamente para o segundo insert
        $stmt_insert_pendente->bindParam(':idpagar', $idpagar, PDO::PARAM_INT);
        $stmt_insert_pendente->bindParam(':nomepagar', $nomepagar, PDO::PARAM_STR);
        $stmt_insert_pendente->bindParam(':data_vencimento', $data_vencimento, PDO::PARAM_STR);
        $stmt_insert_pendente->bindParam(':valor', $valor, PDO::PARAM_STR);

        // Executa a segunda inserção com status "pendente"
        $stmt_insert_pendente->execute();

        echo "Pagamento de <span id='alert'>$nomepagar</span> enviado com sucesso!";
        return true;
    } catch (PDOException $e) {
        echo "Erro ao registrar pagamento: " . $e->getMessage();
        return false;
    }
}







function atualizaPagamento($idAluno, $data_pagamento, $valor, $data_vencimento) {
    $database = new Database();
    $conn = $database->getConnection();

    // Converte as datas para o formato yyyy-mm-dd
    $data_pagamento = date('Y-m-d', strtotime(str_replace('/', '-', $data_pagamento)));

    // Não modifica a data de vencimento, usa a data fornecida como está
    $data_vencimento = date('Y-m-d', strtotime(str_replace('/', '-', $data_vencimento)));

    try {
        // Verifica se o pagamento existe
        $query_select = "SELECT * FROM mensalidades WHERE aluno_id = :idAluno AND data_vencimento = :data_vencimento AND status != 'pago'";
        $stmt_select = $conn->prepare($query_select);
        $stmt_select->bindParam(':idAluno', $idAluno, PDO::PARAM_INT);
        $stmt_select->bindParam(':data_vencimento', $data_vencimento, PDO::PARAM_STR);
        $stmt_select->execute();

        if ($stmt_select->rowCount() > 0) {
            // Se encontrado, atualiza o pagamento
            $query_update = "UPDATE mensalidades SET data_pagamento = :data_pagamento, valor = :valor, status = 'pago' WHERE aluno_id = :idAluno AND data_vencimento = :data_vencimento";
            $stmt_update = $conn->prepare($query_update);
            $stmt_update->bindParam(':idAluno', $idAluno, PDO::PARAM_INT);
            $stmt_update->bindParam(':data_pagamento', $data_pagamento, PDO::PARAM_STR);
            $stmt_update->bindParam(':valor', $valor, PDO::PARAM_STR);
            $stmt_update->bindParam(':data_vencimento', $data_vencimento, PDO::PARAM_STR);
            $stmt_update->execute();

            // Exibe a mensagem de sucesso
            echo "Pagamento atualizado com sucesso!";
        } else {
            // Exibe a mensagem de erro
            echo "Não há pagamento pendente com a data de vencimento informada.";
        }
    } catch (PDOException $e) {
        // Exibe o erro
        echo "Erro ao atualizar pagamento: " . $e->getMessage();
    }
}





function ignorarPagamento($alunoId_ignorados, $vencimento_ignorados) { 
    $database = new Database();
    $conn = $database->getConnection();

    // Converte a data de vencimento para o formato yyyy-mm-dd
    $data_vencimento = date('Y-m-d', strtotime(str_replace('/', '-', $vencimento_ignorados)));

    // Adiciona um mês à data de vencimento
    $data_vencimento_obj = new DateTime($data_vencimento); // Cria um objeto DateTime a partir da data de vencimento
    $data_vencimento = $data_vencimento_obj->format('Y-m-d'); // Converte a data de volta para o formato yyyy-mm-dd

    try {
        // Verificar se existe um pagamento pendente para o aluno e data de vencimento ajustada
        $query_select = "SELECT * FROM mensalidades WHERE aluno_id = :alunoId_ignorados AND data_vencimento = :data_vencimento AND status = 'pendente'";
        $stmt_select = $conn->prepare($query_select);

        // Bind dos parâmetros
        $stmt_select->bindParam(':alunoId_ignorados', $alunoId_ignorados, PDO::PARAM_INT);
        $stmt_select->bindParam(':data_vencimento', $data_vencimento, PDO::PARAM_STR);

        // Executa a consulta
        $stmt_select->execute();

        // Verifica se existe algum pagamento pendente
        if ($stmt_select->rowCount() > 0) {
            // Se encontrado, atualizar o status para "ignorados"
            $query_update = "UPDATE mensalidades SET status = 'ignorado' WHERE aluno_id = :alunoId_ignorados AND data_vencimento = :data_vencimento AND status = 'pendente'";
            $stmt_update = $conn->prepare($query_update);

            // Bind dos parâmetros
            $stmt_update->bindParam(':alunoId_ignorados', $alunoId_ignorados, PDO::PARAM_INT);
            $stmt_update->bindParam(':data_vencimento', $data_vencimento, PDO::PARAM_STR);

            // Executa a atualização
            $stmt_update->execute();

            echo "Pagamento marcado como ignorado com sucesso!";
            return true;
        } else {
            echo "Não há pagamento pendente com a data de vencimento informada.";
            return false;
        }
    } catch (PDOException $e) {
        echo "Erro ao ignorar pagamento: " . $e->getMessage();
        return false;
    }
}

















?>
