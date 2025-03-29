<?php
// Inclui arquivos essenciais
include '../core/config.php';  // Configurações gerais
include '../core/auth.php';    // Autenticação
include '../core/consultas.php'; // Outras consultas

// Define o cabeçalho da resposta como JSON
header('Content-Type: application/json; charset=utf-8');

// Recebe e decodifica os dados enviados via AJAX
$data = json_decode(file_get_contents('php://input'), true);

// Inicializa a resposta padrão
$response = [
    'success' => false,
    'message' => 'ID inválido ou não informado.'
];

// Verifica se o ID foi recebido corretamente e é numérico
if (isset($data['id']) && filter_var($data['id'], FILTER_VALIDATE_INT)) {
    $id = intval($data['id']); // Converte para inteiro

    // Cria a instância da classe Database e obtém a conexão
    $database = new Database();
    $pdo = $database->getConnection();

    // Tenta buscar o nome do aluno
    try {
        // Prepara a consulta para buscar o nome do aluno pelo ID
        $stmt = $pdo->prepare("SELECT nomeAluno, telefone, rua FROM alunos WHERE idAluno = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Verifica se o aluno foi encontrado
        $aluno = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($aluno) {
            // Retorna sucesso com os dados do aluno
            $response['success'] = true;
            $response['message'] = 'Aluno encontrado com sucesso.';
            $response['data'] = [
                'id' => $id,
                'nomeAluno' => $aluno['nomeAluno'],
                'telefone' => $aluno['telefone'],
                'rua' => $aluno['rua']
            ];
        } else {
            // Caso o ID não exista no banco
            $response['message'] = 'Aluno não encontrado.';
        }
    } catch (PDOException $e) {
        // Tratamento de erro no banco de dados
        $response['message'] = 'Erro ao acessar o banco de dados: ' . $e->getMessage();
    }
} else {
    // Caso o ID seja inválido
    $response['message'] = 'ID inválido ou não informado.';
}

// Retorna a resposta em formato JSON
echo json_encode($response);
exit;
?>
