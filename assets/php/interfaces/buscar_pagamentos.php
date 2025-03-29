<?php
include '../core/database.php';

header('Content-Type: application/json');

$database = new Database();
$conn = $database->getConnection();

try {
    // Busca pagamentos com data de vencimento hoje ou passada
    $query = "SELECT id, aluno_id, data_vencimento, valor 
              FROM pagamentos 
              WHERE status = 'pago' AND data_vencimento = CURDATE()";

    $stmt = $conn->prepare($query);
    $stmt->execute();

    $pagamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode(['success' => true, 'pagamentos' => $pagamentos]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
?>
