<?php
include '../config/database.php';
function verificarEInserirPagamentos()
{
    $database = new Database();
    $conn = $database->getConnection();
    try {     
        echo "Buscando alunos com data de pagamento registrada...\n";
        $queryAlunos = "SELECT idAluno, data_pagamento, valor, plano FROM alunos WHERE data_pagamento IS NOT NULL";
        $stmtAlunos = $conn->prepare($queryAlunos);
        $stmtAlunos->execute();
        $alunos = $stmtAlunos->fetchAll(PDO::FETCH_ASSOC);
        if ($alunos) {
            foreach ($alunos as $aluno) {
                $idAluno = $aluno['idAluno'];
                $planoAluno = $aluno['plano'];
                $dataPagamento = $aluno['data_pagamento'];
                $valorAluno = $aluno['valor'];
                echo "Processando aluno ID: {$idAluno}, Data de Pagamento: {$dataPagamento}, com plano: {$planoAluno}\n";
                $queryUltimoVencimento = "SELECT MAX(dataVencimento) AS ultimoVencimento FROM pagamentos WHERE idAluno = :idAluno";
                $stmtUltimoVencimento = $conn->prepare($queryUltimoVencimento);
                $stmtUltimoVencimento->bindParam(':idAluno', $idAluno, PDO::PARAM_INT);
                $stmtUltimoVencimento->execute();
                $ultimoRegistro = $stmtUltimoVencimento->fetch(PDO::FETCH_ASSOC);
                $ultimoVencimento = $ultimoRegistro['ultimoVencimento'];
                if (!$ultimoVencimento) {
                    echo "Nenhum registro encontrado para o aluno ID {$idAluno}. Criando os registros iniciais...\n";
                    $queryInsertPago = "INSERT INTO pagamentos (idAluno, planoAluno, dataPagamento, dataVencimento, valor, situacao) 
                                        VALUES (:idAluno, :planoAluno, :dataPagamento, NULL, :valor, 'pago')";
                    $stmtInsertPago = $conn->prepare($queryInsertPago);
                    $stmtInsertPago->bindParam(':idAluno', $idAluno, PDO::PARAM_INT);
                    $stmtInsertPago->bindParam(':planoAluno', $planoAluno, PDO::PARAM_STR);
                    $stmtInsertPago->bindParam(':dataPagamento', $dataPagamento, PDO::PARAM_STR);
                    $stmtInsertPago->bindParam(':valor', $valorAluno, PDO::PARAM_STR);
                    $stmtInsertPago->execute();
                    echo "Registro 'pago' criado para o aluno ID {$idAluno} com data de pagamento: {$dataPagamento} e plano: {$planoAluno}\n";
                    $proximoVencimento = calcularProximaDataVencimento($dataPagamento, $dataPagamento, $planoAluno);
                    $queryInsertPendente = "INSERT INTO pagamentos (idAluno, planoAluno, dataPagamento, dataVencimento, valor, situacao) 
                                            VALUES (:idAluno, :planoAluno, NULL, :dataVencimento, :valor, 'pendente')";
                    $stmtInsertPendente = $conn->prepare($queryInsertPendente);
                    $stmtInsertPendente->bindParam(':idAluno', $idAluno, PDO::PARAM_INT);
                    $stmtInsertPendente->bindParam(':planoAluno', $planoAluno, PDO::PARAM_STR);
                    $stmtInsertPendente->bindParam(':dataVencimento', $proximoVencimento, PDO::PARAM_STR);
                    $stmtInsertPendente->bindParam(':valor', $valorAluno, PDO::PARAM_STR);
                    $stmtInsertPendente->execute();
                    echo "Registro 'pendente' criado para o aluno ID {$idAluno} com vencimento: {$proximoVencimento}\n";                   
                    $ultimoVencimento = $proximoVencimento;
                }
                $dataAtual = date('Y-m-d');
                while (strtotime($ultimoVencimento) < strtotime($dataAtual)) {
                    
                    $proximoVencimento = calcularProximaDataVencimento($ultimoVencimento, $dataPagamento, $planoAluno);
                    echo "Gerando novo pagamento para o aluno ID {$idAluno}, vencimento: {$proximoVencimento}\n";
                    $queryInsert = "INSERT INTO pagamentos (idAluno, planoAluno, dataPagamento, dataVencimento, valor, situacao) 
                                    VALUES (:idAluno, :planoAluno, NULL, :dataVencimento, :valor, 'pendente')";
                    $stmtInsert = $conn->prepare($queryInsert);
                    $stmtInsert->bindParam(':idAluno', $idAluno, PDO::PARAM_INT);
                    $stmtInsert->bindParam(':planoAluno', $planoAluno, PDO::PARAM_STR);
                    $stmtInsert->bindParam(':dataVencimento', $proximoVencimento, PDO::PARAM_STR);
                    $stmtInsert->bindParam(':valor', $valorAluno, PDO::PARAM_STR);
                    $stmtInsert->execute();

                    echo "Novo registro de pagamento criado para o aluno ID {$idAluno}, vencimento: {$proximoVencimento}\n";
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
function calcularProximaDataVencimento($dataAtual, $dataOriginal, $planoAluno)
{
    if ($planoAluno === 'Mensal') {
        $diaOriginal = (int)date('d', strtotime($dataOriginal));
        $mesAtual = (int)date('m', strtotime($dataAtual));
        $anoAtual = (int)date('Y', strtotime($dataAtual));
        $mesAtual++;
        if ($mesAtual > 12) {
            $mesAtual = 1;
            $anoAtual++;
        }
        $ultimoDiaDoMes = cal_days_in_month(CAL_GREGORIAN, $mesAtual, $anoAtual);
        $diaVencimento = min($diaOriginal, $ultimoDiaDoMes);
        return date('Y-m-d', strtotime("{$anoAtual}-{$mesAtual}-{$diaVencimento}"));
    } elseif  ($planoAluno === 'Semestral') {
        $diaOriginal = (int)date('d', strtotime($dataOriginal));
    $mesAtual = (int)date('m', strtotime($dataAtual));
    $anoAtual = (int)date('Y', strtotime($dataAtual));
    $mesAtual++;
    $mesAtual++;
    $mesAtual++;
    $mesAtual++;
    $mesAtual++;
    $mesAtual++;
    if ($mesAtual > 12) {
        $diferenca = $mesAtual - 12;
        $mesAtual = $diferenca;
        $anoAtual++;
        
    }
    $ultimoDiaDoMes = cal_days_in_month(CAL_GREGORIAN, $mesAtual, $anoAtual);
    $diaVencimento = min($diaOriginal, $ultimoDiaDoMes);
    return date('Y-m-d', strtotime("{$anoAtual}-{$mesAtual}-{$diaVencimento}"));
    }
    elseif  ($planoAluno === 'Anual') {
        $diaOriginal = (int)date('d', strtotime($dataOriginal));
    $mesAtual = (int)date('m', strtotime($dataAtual));
    $anoAtual = (int)date('Y', strtotime($dataAtual));
    $mesAtual++;
    $mesAtual++;
    $mesAtual++;
    $mesAtual++;
    $mesAtual++;
    $mesAtual++;
    $mesAtual++;
    $mesAtual++;
    $mesAtual++;
    $mesAtual++;
    $mesAtual++;
    $mesAtual++;
    if ($mesAtual > 12) {
        $diferenca = $mesAtual - 12;
        $mesAtual = $diferenca;
        $anoAtual++;
    }
    $ultimoDiaDoMes = cal_days_in_month(CAL_GREGORIAN, $mesAtual, $anoAtual);
    $diaVencimento = min($diaOriginal, $ultimoDiaDoMes);
    return date('Y-m-d', strtotime("{$anoAtual}-{$mesAtual}-{$diaVencimento}"));
    } 
}
verificarEInserirPagamentos();
?>
