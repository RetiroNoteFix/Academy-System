<?php
// Inclui arquivos essenciais
include '../config/config.php';  // Configurações gerais
include 'AuthController.php';    // Autenticação
include_once '../config/database.php';
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
    $ano = isset($data['ano']) ? intval($data['ano']) : date('Y'); // Obtém o ano ou usa o ano atual

    // Cria a instância da classe Database e obtém a conexão
    $database = new Database();
    $pdo = $database->getConnection();

    try {
        // Prepara a consulta para buscar informações do aluno (ID fixo 2)
        $stmtAluno = $pdo->prepare("SELECT p.nome, p.telefone, p.endereco
FROM alunos a
INNER JOIN pessoas p ON a.idPessoa = p.idPessoa
WHERE a.idAluno = :id
");
        $stmtAluno->bindParam(':id', $id, PDO::PARAM_INT);
        $stmtAluno->execute();

        $aluno = $stmtAluno->fetch(PDO::FETCH_ASSOC);

        if ($aluno) {
            // Busca as mensalidades do aluno filtradas pelo ano (ID fixo 1)
            $stmtMensalidades = $pdo->prepare("
                SELECT valor, situacao, dataPagamento 
                FROM pagamentos
                WHERE idAluno = :id AND YEAR(dataPagamento) = :ano
            ");
            $stmtMensalidades->bindParam(':id', $id, PDO::PARAM_INT);
            $stmtMensalidades->bindParam(':ano', $ano, PDO::PARAM_INT);
            $stmtMensalidades->execute();

            // Armazena todas as mensalidades em um array
            $mensalidades = $stmtMensalidades->fetchAll(PDO::FETCH_ASSOC);

            $response['success'] = true;
            $response['message'] = 'Dados encontrados com sucesso.';
            $response['data'] = [
                'id' => $id,
                'nomeAluno' => $aluno['nome'],
                'telefone' => $aluno['telefone'],
                'rua' => $aluno['endereco'],
                'ano' => $ano, // Inclui o ano selecionado
                'mensalidades' => $mensalidades // Envia as mensalidades como um array
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

// Retorna a resposta em formato JSON
echo json_encode($response);
exit;
?>
