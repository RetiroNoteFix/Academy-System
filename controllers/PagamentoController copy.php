<?php
include '../config/database.php';

function buscarPagamentosAlunos()
{
    $database = new Database();
    $conn = $database->getConnection();

    try {
        echo "Buscando pagamentos dos alunos...\n";

        // Buscar os alunos ativos com pagamento registrado
        $queryAlunos = "SELECT a.idAluno, a.valor, a.data_pagamento, a.situacao, a.plano
                        FROM alunos a
                        WHERE a.data_pagamento IS NOT NULL AND a.situacao = 'Ativo'";
        $stmtAlunos = $conn->prepare($queryAlunos);
        $stmtAlunos->execute();
        $alunos = $stmtAlunos->fetchAll(PDO::FETCH_ASSOC);

        if ($alunos) {
            echo "Pagamentos encontrados:\n";

            foreach ($alunos as $aluno) {
                $idAluno = $aluno['idAluno'];
                $valor = $aluno['valor'];
                $dataPagamento = $aluno['data_pagamento'];
                $situacao = $aluno['situacao'];
                $plano = $aluno['plano'];

                echo "ID Aluno: {$idAluno}, Valor: {$valor}, Data Pagamento: {$dataPagamento}, Situação: {$situacao}, Plano: {$plano}\n";

                echo "Buscando pagamentos existentes para o ID Aluno: {$idAluno}...\n";

                // Verificar se já existem pagamentos para este aluno
                $queryPagamentos = "SELECT * FROM pagamentos WHERE idAluno = :idAluno";
                $stmtPagamentos = $conn->prepare($queryPagamentos);
                $stmtPagamentos->bindParam(':idAluno', $idAluno, PDO::PARAM_INT);
                $stmtPagamentos->execute();
                $pagamentosExistentes = $stmtPagamentos->fetchAll(PDO::FETCH_ASSOC);

                if (!$pagamentosExistentes) {
                    echo "Nenhum pagamento encontrado para o ID Aluno: {$idAluno}. Criando novo pagamento...\n";

                    // Calcular a data de vencimento com base no plano
                    $dataVencimento = calcularUltimoDiaMes($dataPagamento, $plano);

                    // Criar novo pagamento
                    $queryInsert = "INSERT INTO pagamentos (idAluno, planoAluno, dataReferencia, valor, dataPagamento, dataVencimento, situacao)
                                    VALUES (:idAluno, :planoAluno, :dataReferencia, :valor, NULL, :dataVencimento, 'pago')";
                    $stmtInsert = $conn->prepare($queryInsert);
                    $stmtInsert->bindParam(':idAluno', $idAluno, PDO::PARAM_INT);
                    $stmtInsert->bindParam(':planoAluno', $plano, PDO::PARAM_STR);
                    $stmtInsert->bindParam(':dataReferencia', $dataPagamento, PDO::PARAM_STR);
                    $stmtInsert->bindParam(':valor', $valor, PDO::PARAM_STR);
                    $stmtInsert->bindParam(':dataVencimento', $dataVencimento, PDO::PARAM_STR);
                    $stmtInsert->execute();

                    echo "Novo pagamento criado para o ID Aluno: {$idAluno}, Vencimento: {$dataVencimento}\n";
                } else {
                    echo "Pagamentos já existentes para o ID Aluno: {$idAluno}.\n";
                }
            }
        } else {
            echo "Nenhum aluno ativo com pagamento registrado foi encontrado.\n";
        }
    } catch (PDOException $e) {
        echo "Erro ao buscar ou criar pagamento: " . $e->getMessage() . "\n";
    }
}

// Função para calcular o último dia do mês com base no plano
function calcularUltimoDiaMes($dataAtual, $plano)
{
    $periodoMeses = 0;

    switch (strtolower($plano)) {
        case 'mensal':
            $periodoMeses = 1;
            break;
        case 'semestral':
            $periodoMeses = 6;
            break;
        case 'anual':
            $periodoMeses = 12;
            break;
        default:
            throw new Exception("Plano inválido: {$plano}");
    }

    // Converter a data atual para DateTime
    $data = new DateTime($dataAtual);

    // Se o plano for mensal, não adicionamos meses, apenas ajustamos para o próximo mês
    if ($plano === 'Mensal') {
        $data->modify('first day of next month');  // Vai para o primeiro dia do mês seguinte
    } elseif  ($plano === 'Semestral') {
        $data->modify('first day of this month');
        $data->modify("+{$periodoMeses} months");  // Agora adicionamos o número de meses para os planos semestrais ou anuais
    }
    elseif  ($plano === 'Anual') {
        $data->modify('first day of this month');
        $data->modify("+{$periodoMeses} months");  // Agora adicionamos o número de meses para os planos semestrais ou anuais
    }
    
    
    // Ajustar para o último dia do mês
    $ultimoDiaDoMes = $data->format('t'); // 't' retorna o último dia do mês
    $data->setDate($data->format('Y'), $data->format('m'), $ultimoDiaDoMes); // Ajusta para o último dia do mês

    return $data->format('Y-m-d');
}

buscarPagamentosAlunos();
?>
