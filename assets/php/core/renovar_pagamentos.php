<?php
include 'config.php';
include 'database.php';

function renovarPagamentos() {
    $database = new Database();
    $conn = $database->getConnection();

    try {
        // Data de hoje
        $hoje = date('Y-m-d');

        // 1. Seleciona todos os pagamentos com data de vencimento igual a hoje
        $query_select = "SELECT aluno_id, valor FROM pagamentos 
                         WHERE data_vencimento = :hoje AND status = 'pendente'";
        $stmt_select = $conn->prepare($query_select);
        $stmt_select->bindParam(':hoje', $hoje, PDO::PARAM_STR);
        $stmt_select->execute();

        $pagamentos = $stmt_select->fetchAll(PDO::FETCH_ASSOC);

        // 2. Processa cada pagamento e cria um novo registro
        foreach ($pagamentos as $pagamento) {
            $idAluno = $pagamento['aluno_id'];
            $valor = $pagamento['valor'];

            // Calcula a nova data de vencimento (mesmo dia do mês seguinte)
            $nova_data_vencimento = date('Y-m-d', strtotime($hoje . ' +1 month'));

            // Insere o novo pagamento com status "pendente"
            $query_insert = "INSERT INTO pagamentos (aluno_id, data_pagamento, data_vencimento, valor, status)
                             VALUES (:aluno_id, NULL, :nova_data_vencimento, :valor, 'pendente')";
            $stmt_insert = $conn->prepare($query_insert);

            $stmt_insert->bindParam(':aluno_id', $idAluno, PDO::PARAM_INT);
            $stmt_insert->bindParam(':nova_data_vencimento', $nova_data_vencimento, PDO::PARAM_STR);
            $stmt_insert->bindParam(':valor', $valor, PDO::PARAM_STR);

            $stmt_insert->execute();
        }

        echo "Pagamentos renovados com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao renovar pagamentos: " . $e->getMessage();
    }
}

// Chama a função para executar o processo
renovarPagamentos();
?>
