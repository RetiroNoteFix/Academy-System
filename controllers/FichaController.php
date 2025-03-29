<?php
include '../config/config.php';
include '../config/database.php';
include 'AuthController.php';
header('Content-Type: application/json; charset=utf-8');
$data = json_decode(file_get_contents('php://input'), true);
$response = [
    'success' => false,
    'message' => 'ID inválido ou não informado.'
];
if (isset($data['id']) && filter_var($data['id'], FILTER_VALIDATE_INT)) {
    $id = intval($data['id']);
    $database = new Database();
    $pdo = $database->getConnection();
    try {
        $stmt = $pdo->prepare("SELECT 
    pessoas.nome, 
    pessoas.telefone, 
    pessoas.endereco
FROM alunos
INNER JOIN pessoas ON alunos.idPessoa = pessoas.idPessoa
WHERE alunos.idAluno = :id;
");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $aluno = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($aluno) {
            $response['success'] = true;
            $response['message'] = 'Aluno encontrado com sucesso.';
            $response['data'] = [
                'id' => $id,
                'nomeAluno' => $aluno['nome'],
                'telefone' => $aluno['telefone'],
                'rua' => $aluno['endereco']
            ];
        } else {
            $response['message'] = 'Aluno não encontrado.';
        }
    } catch (PDOException $e) {
        $response['message'] = 'Erro ao acessar o banco de dados: ' . $e->getMessage();
    }
} else {
    $response['message'] = 'ID inválido ou não informado.';
}
echo json_encode($response);
exit;
?>
