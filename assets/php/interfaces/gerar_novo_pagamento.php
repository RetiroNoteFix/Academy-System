<?php
include '../core/database.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['aluno_id']) && isset($data['valor'])) {
    $aluno_id = $data['aluno_id'];
    $valor = $data['valor'];

    // Gera a nova data de vencimento (próximo mês no mesmo dia)
    $nova_data_vencimento = date('Y-m-d', strtotime('+1 month'));

    $database = new Database();
    $conn = $database->getConnection();

    try {
        // Cria o novo pagamento com status "pendente"
        $query = "INSERT INTO pagamentos (aluno_id, data_pagamento, data_vencimento, valor, status)
                  VALUES (:aluno_id, NULL, :data_vencimento, :valor, 'pendente')";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':aluno_id', $aluno_id);
        $stmt->bindParam(':data_vencimento', $nova_data_vencimento);
        $stmt->bindParam(':valor', $valor);
        $stmt->execute();

        echo json_encode(['success' => true, 'message' => 'Novo pagamento gerado.']);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Dados inválidos fornecidos.']);
}
?>
