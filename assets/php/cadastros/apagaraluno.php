<?php
include '../core/config.php';
include '../core/auth.php';
include '../core/consultas.php';

// Recebe os dados enviados via AJAX
$data = json_decode(file_get_contents('php://input'), true);

// Verifica se o ID foi recebido corretamente
if (isset($data['id'])) {
    $id = $data['id'];

    // Conectar ao banco de dados
    $database = new Database();
    $conn = $database->getConnection();

    try {
        // Consulta SQL para alterar o status do aluno para desativado com base no ID
        $query = "UPDATE alunos SET status = 'desativado' WHERE idAluno = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Executa a consulta de atualização
        if ($stmt->execute()) {
            // Retorna sucesso com uma mensagem
            echo json_encode(['success' => true, 'message' => 'Status do aluno atualizado para desativado com sucesso!']);
        } else {
            // Caso haja erro na execução da consulta
            echo json_encode(['success' => false, 'message' => 'Erro ao atualizar status do aluno.']);
        }
    } catch (PDOException $e) {
        // Em caso de erro, retorna falha e o erro
        echo json_encode(['success' => false, 'message' => 'Erro na consulta: ' . $e->getMessage()]);
    }
} else {
    // Se o ID não for passado corretamente
    echo json_encode(['success' => false, 'message' => 'ID não informado.']);
}
?>
