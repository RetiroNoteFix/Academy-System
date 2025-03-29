<?php
// consultas.php
include_once 'database.php';

class Consultas {
    private $conn;

    public function __construct() {
        // Obter a conexão com o banco de dados
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Buscar todos os alunos
    public function buscarAlunos() {
        try {
            $query = "SELECT * FROM alunos WHERE status = 'ativo' ORDER BY nomeAluno ASC"; // Ordena por nomeAluno em ordem alfabética
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao buscar alunos: " . $e->getMessage();
            return [];
        }
    }
    public function buscarPagamentos()
{
    try {
        $query = "
            SELECT DISTINCT a.* 
            FROM alunos a
            INNER JOIN mensalidades m ON a.idAluno = m.aluno_id
            WHERE m.status = 'pago'
            ORDER BY a.nomeAluno ASC
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna os dados completos dos alunos
    } catch (PDOException $e) {
        echo "Erro ao buscar alunos: " . $e->getMessage();
        return [];
    }
}
public function buscarUsuarios()
{
    try {
        $query = "SELECT * FROM usuarios";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna os dados completos dos alunos
    } catch (PDOException $e) {
        echo "Erro ao buscar alunos: " . $e->getMessage();
        return [];
    }
}
public function buscarPagamentosIgnorados()
{
    try {
        $query = "
            SELECT 
    mensalidades.aluno_id, 
    alunos.nomeAluno AS nomeAluno, 
    alunos.rua, 
    alunos.telefone, 
    mensalidades.data_pagamento, 
    mensalidades.data_vencimento, 
    mensalidades.valor
FROM 
    mensalidades
INNER JOIN 
    alunos 
ON 
    mensalidades.aluno_id = alunos.idAluno
WHERE 
    mensalidades.status = 'ignorado'
ORDER BY 
    alunos.nomeAluno ASC;

        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna os dados completos dos alunos
    } catch (PDOException $e) {
        echo "Erro ao buscar alunos: " . $e->getMessage();
        return [];
    }
}


    public function buscarAlunosDesativados() {
        try {
            $query = "SELECT * FROM alunos WHERE status = 'desativado' ORDER BY nomeAluno ASC"; // Ordena por nomeAluno em ordem alfabética
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao buscar alunos: " . $e->getMessage();
            return [];
        }
    }
    public function buscarPagamentosAtrasados() {
        try {
            // Query para buscar pagamentos pendentes
            $query = "
                SELECT alunos.idAluno, alunos.nomeAluno, alunos.rua, alunos.telefone, 
                       mensalidades.data_vencimento, mensalidades.valor, mensalidades.status
                FROM mensalidades
                INNER JOIN alunos ON mensalidades.aluno_id = alunos.idAluno
                WHERE mensalidades.status = 'pendente'
            ";
    
            // Prepara e executa a consulta
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
    
            // Recupera os resultados
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // A data atual para comparação
            $dataAtual = new DateTime(); // A data de hoje
    
            // Filtra os resultados para exibir apenas os pagamentos vencidos
            $resultadosFiltrados = [];
            foreach ($resultados as $resultado) {
                $dataVencimento = new DateTime($resultado['data_vencimento']);
    
                // Verifica se a data de vencimento já passou
                if ($dataVencimento < $dataAtual) {
                    // Adiciona o resultado ao array filtrado
                    $resultadosFiltrados[] = $resultado;
                }
            }
    
            // Retorna os resultados filtrados (apenas os vencidos)
            return $resultadosFiltrados;
    
        } catch (PDOException $e) {
            // Log do erro (opcional)
            error_log($e->getMessage());
    
            // Retorna um array vazio em caso de erro
            return [];
        }
    }
    
    
    
    
    
    
    
    
    
    
    
    

    // Buscar aluno por nome exato
    public function buscarAlunoPorNome($nomeAluno) {
        try {
            $query = "SELECT * FROM alunos WHERE nomeAluno = :nomeAluno";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':nomeAluno', $nomeAluno);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao buscar alunos: " . $e->getMessage();
            return [];
        }
    }

    // Buscar aluno por ID
    public function buscarAlunoPorId($id) {
        try {
            $query = "SELECT * FROM alunos WHERE idAluno = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC); // Retorna um único registro
        } catch (PDOException $e) {
            echo "Erro ao buscar aluno por ID: " . $e->getMessage();
            return null;
        }
    }
}
?>
