<?php
include 'database.php';

// Função para calcular a próxima data de vencimento com base no maior dia de vencimento registrado
// Função para calcular a próxima data de vencimento com base no maior dia de vencimento registrado



// Função para verificar e criar novos registros de mensalidades para todos os alunos
function verificarEInserirPagamentos()
{
    $database = new Database();
    $conn = $database->getConnection();

    try {
        // Buscar alunos com data de pagamento registrada
        echo "Buscando alunos com data de pagamento registrada...\n";
        $queryAlunos = "SELECT idAluno, nomeAluno, data_pagamento, valor FROM alunos WHERE data_pagamento IS NOT NULL";
        $stmtAlunos = $conn->prepare($queryAlunos);
        $stmtAlunos->execute();
        $alunos = $stmtAlunos->fetchAll(PDO::FETCH_ASSOC);

        if ($alunos) {
            foreach ($alunos as $aluno) {
                $idAluno = $aluno['idAluno'];
                $nomeAluno = $aluno['nomeAluno'];
                $dataPagamento = $aluno['data_pagamento'];
                $valorAluno = $aluno['valor'];

                echo "Processando aluno ID: {$idAluno}, Nome: {$nomeAluno}, Data de Pagamento: {$dataPagamento}\n";

                // Buscar a última data de vencimento registrada
                $queryUltimoVencimento = "SELECT MAX(data_vencimento) AS ultimoVencimento FROM mensalidades WHERE aluno_id = :idAluno";
                $stmtUltimoVencimento = $conn->prepare($queryUltimoVencimento);
                $stmtUltimoVencimento->bindParam(':idAluno', $idAluno, PDO::PARAM_INT);
                $stmtUltimoVencimento->execute();
                $ultimoRegistro = $stmtUltimoVencimento->fetch(PDO::FETCH_ASSOC);
                $ultimoVencimento = $ultimoRegistro['ultimoVencimento'];

                if (!$ultimoVencimento) {
                    // Nenhum registro encontrado, criar o primeiro pagamento (pago)
                    echo "Nenhum registro encontrado para o aluno ID {$idAluno}. Criando os registros iniciais...\n";

                    // Criar o primeiro registro com status 'pago'
                    $queryInsertPago = "INSERT INTO mensalidades (aluno_id, nomeAluno, data_pagamento, data_vencimento, valor, status) 
                    VALUES (:idAluno, :nomeAluno, :dataPagamento, NULL, '$valorAluno', 'pago')";

                    $stmtInsertPago = $conn->prepare($queryInsertPago);
                    $stmtInsertPago->bindParam(':idAluno', $idAluno, PDO::PARAM_INT);
                    $stmtInsertPago->bindParam(':nomeAluno', $nomeAluno, PDO::PARAM_STR);
                    $stmtInsertPago->bindParam(':dataPagamento', $dataPagamento, PDO::PARAM_STR);

                    $stmtInsertPago->execute();

                    echo "Registro 'pago' criado para o aluno ID {$idAluno} com data de pagamento: {$dataPagamento}\n";

                    // Calcular a próxima data de vencimento
                    $proximoVencimento = calcularProximaDataVencimento($dataPagamento, $dataPagamento);

                    // Criar o segundo registro com status 'pendente'
                    $queryInsertPendente = "INSERT INTO mensalidades (aluno_id, nomeAluno, data_pagamento, data_vencimento, status) 
                                            VALUES (:idAluno, :nomeAluno, NULL, :dataVencimento, 'pendente')";
                    $stmtInsertPendente = $conn->prepare($queryInsertPendente);
                    $stmtInsertPendente->bindParam(':idAluno', $idAluno, PDO::PARAM_INT);
                    $stmtInsertPendente->bindParam(':nomeAluno', $nomeAluno, PDO::PARAM_STR);
                    $stmtInsertPendente->bindParam(':dataVencimento', $proximoVencimento, PDO::PARAM_STR);
                    $stmtInsertPendente->execute();

                    echo "Registro 'pendente' criado para o aluno ID {$idAluno} com vencimento: {$proximoVencimento}\n";

                    // Atualizar o último vencimento para começar a gerar os próximos
                    $ultimoVencimento = $proximoVencimento;
                }

                // Continuar gerando vencimentos enquanto a última data de vencimento for menor que a data atual
                $dataAtual = date('Y-m-d');
                while (strtotime($ultimoVencimento) < strtotime($dataAtual)) {
                    // Calcular a próxima data de vencimento
                    $proximoVencimento = calcularProximaDataVencimento($ultimoVencimento, $dataPagamento);

                    echo "Gerando novo pagamento para o aluno ID {$idAluno}, vencimento: {$proximoVencimento}\n";

                    // Inserir novo registro de pagamento com status 'pendente'
                    $queryInsert = "INSERT INTO mensalidades (aluno_id, nomeAluno, data_pagamento, data_vencimento, status) 
                                    VALUES (:idAluno, :nomeAluno, NULL, :dataVencimento, 'pendente')";
                    $stmtInsert = $conn->prepare($queryInsert);
                    $stmtInsert->bindParam(':idAluno', $idAluno, PDO::PARAM_INT);
                    $stmtInsert->bindParam(':nomeAluno', $nomeAluno, PDO::PARAM_STR);
                    $stmtInsert->bindParam(':dataVencimento', $proximoVencimento, PDO::PARAM_STR);
                    $stmtInsert->execute();

                    echo "Novo registro de pagamento criado para o aluno ID {$idAluno}, vencimento: {$proximoVencimento}\n";

                    // Atualizar a última data de vencimento
                    $ultimoVencimento = $proximoVencimento;
                }
            }
        } else {
            echo "Nenhum aluno com data de pagamento registrada foi encontrado.\n";
        }
    } catch (PDOException $e) {
        echo "Erro ao processar pagamentos: " . $e->getMessage() . "\n";
    }
}

// Função para calcular a próxima data de vencimento
function calcularProximaDataVencimento($dataAtual, $dataOriginal)
{
    $diaOriginal = (int)date('d', strtotime($dataOriginal)); // Dia original de vencimento
    $mesAtual = (int)date('m', strtotime($dataAtual));
    $anoAtual = (int)date('Y', strtotime($dataAtual));

    // Incrementar o mês
    $mesAtual++;
    if ($mesAtual > 12) {
        $mesAtual = 1;
        $anoAtual++;
    }

    // Ajustar para o último dia do mês, se necessário
    $ultimoDiaDoMes = cal_days_in_month(CAL_GREGORIAN, $mesAtual, $anoAtual);
    $diaVencimento = min($diaOriginal, $ultimoDiaDoMes);

    // Retornar a próxima data de vencimento
    return date('Y-m-d', strtotime("{$anoAtual}-{$mesAtual}-{$diaVencimento}"));
}



// Chamar a função para verificar e criar pagamentos para todos os alunos
verificarEInserirPagamentos();
?>
