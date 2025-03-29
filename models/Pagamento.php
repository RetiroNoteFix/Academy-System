<?php


class Pagamento {
    private $conn;

 
    private ?int $idPagamento;
    private ?int $idAluno;
    private ?string $planoAluno;
    private ?string $nomeAluno;
    private ?string $valor;
    private ?string $dataPagamento;
    private ?string $dataVencimento;
    private ?string $situacao;

    public function __construct(
        
        ?int $idPagamento = null,
        ?int $idAluno = null,
        ?string $planoAluno = null,
        ?string $nomeAluno = null,
        ?string $valor = null,
        ?string $dataPagamento = null,
        ?string $dataVencimento = null,
        ?string $situacao = null
    ) {
        $database = new Database();
        $this->conn = $database->getConnection();
        $this->idPagamento = $idPagamento;
        $this->idAluno = $idAluno;
        $this->planoAluno = $planoAluno;
        $this->nomeAluno = $nomeAluno;
        $this->valor = $valor;
        $this->dataPagamento = $dataPagamento;
        $this->dataVencimento = $dataVencimento;
        $this->situacao = $situacao;
    }

    // Getters
    public function getIdPagamento(): ?int {
        return $this->idPagamento;
    }

    public function getIdAluno(): ?int {
        return $this->idAluno;
    }

    public function getPlanoAluno(): ?string {
        return $this->planoAluno;
    }

    public function getNomeAluno(): ?string {
        return $this->nomeAluno;
    }

    public function getValor(): ?float {
        return $this->valor;
    }

    public function getDataPagamento(): ?string {
        return $this->dataPagamento;
    }

    public function getDataVencimento(): ?string {
        return $this->dataVencimento;
    }

    public function getSituacao(): ?string {
        return $this->situacao;
    }

    // Setters
    public function setIdPagamento(?int $idPagamento): void {
        $this->idPagamento = $idPagamento;
    }

    public function setIdAluno(?int $idAluno): void {
        $this->idAluno = $idAluno;
    }

    public function setPlanoAluno(?string $planoAluno): void {
        $this->planoAluno = $planoAluno;
    }

    public function setNomeAluno(?string $nomeAluno): void {
        $this->nomeAluno = $nomeAluno;
    }

    public function setValor(?float $valor): void {
        $this->valor = $valor;
    }

    public function setDataPagamento(?string $dataPagamento): void {
        $this->dataPagamento = $dataPagamento;
    }

    public function setDataVencimento(?string $dataVencimento): void {
        $this->dataVencimento = $dataVencimento;
    }

    public function setSituacao(?string $situacao): void {
        $this->situacao = $situacao;
    }


    public function exibirInformacoes(): string {
        return "ID Pagamento: {$this->idPagamento}\n" .
               "ID Aluno: {$this->idAluno}\n" .
               "Plano: {$this->planoAluno}\n" .
               "Nome do Aluno: {$this->nomeAluno}\n" .
               "Valor: R$ " . number_format($this->valor, 2, ',', '.') . "\n" .
               "Data de Pagamento: {$this->dataPagamento}\n" .
               "Data de Vencimento: {$this->dataVencimento}\n" .
               "Situação: {$this->situacao}";
    }
    public function listarTodos(int $pagina = 1, int $limite = 100) {
        try {
            // Calcula o deslocamento (OFFSET)
            $offset = ($pagina - 1) * $limite;
    
            // Query para buscar o último pagamento de cada aluno, com paginação
            $query = "
                SELECT 
                    a.idAluno, 
                    a.data_pagamento,
                    p.nome, 
                    p.telefone, 
                    p.endereco, 
                    pag.valor, 
                    pag.situacao
                FROM pagamentos pag
                INNER JOIN alunos a ON pag.idAluno = a.idAluno
                INNER JOIN pessoas p ON a.idPessoa = p.idPessoa
                WHERE pag.idPagamento = (
                    SELECT MAX(pag2.idPagamento) 
                    FROM pagamentos pag2 
                    WHERE pag2.idAluno = pag.idAluno
                )
                ORDER BY p.nome ASC
                LIMIT :limite OFFSET :offset;
            ";
    
            // Prepara e executa a consulta
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':limite', $limite, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
    
            // Recupera todos os resultados
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // Retorna os resultados ou um array vazio
            return $resultados ?: [];
    
        } catch (PDOException $e) {
            // Log do erro (opcional)
            error_log($e->getMessage());
    
            // Retorna um array vazio em caso de erro
            return [];
        }
    }
    
    public function listarTodosFuturos(int $pagina = 1, int $limite = 100) {
        try {
            // Calcula o deslocamento (OFFSET)
            $offset = ($pagina - 1) * $limite;
    
            // Query para buscar o último pagamento de cada aluno, com paginação
            $query = "
                SELECT 
    a.idAluno, 
    p.nome, 
    p.telefone, 
    p.endereco, 
    pag.valor, 
    pag.situacao, 
    pag.dataVencimento
FROM pagamentos pag
INNER JOIN alunos a ON pag.idAluno = a.idAluno
INNER JOIN pessoas p ON a.idPessoa = p.idPessoa
WHERE pag.idPagamento = (
    SELECT MAX(pag2.idPagamento) 
    FROM pagamentos pag2 
    WHERE pag2.idAluno = pag.idAluno
    AND pag2.situacao = 'pendente' -- Apenas pagamentos pendentes mais recentes
)
ORDER BY p.nome ASC, pag.dataVencimento ASC
LIMIT :limite OFFSET :offset;

            ";
    
            // Prepara e executa a consulta
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':limite', $limite, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
    
            // Recupera todos os resultados
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // Retorna os resultados ou um array vazio
            return $resultados ?: [];
    
        } catch (PDOException $e) {
            // Log do erro (opcional)
            error_log($e->getMessage());
    
            // Retorna um array vazio em caso de erro
            return [];
        }
    }

    

    public function listarTodosIgnorados(int $pagina = 1, int $limite = 100) {
        try {
            // Calcula o deslocamento (OFFSET)
            $offset = ($pagina - 1) * $limite;
    
            // Query para buscar o último pagamento de cada aluno, com paginação
            $query = "
                SELECT 
    a.idAluno, 
    p.nome, 
    p.telefone, 
    p.endereco, 
    pag.valor, 
    pag.situacao, 
    pag.dataVencimento
FROM pagamentos pag
INNER JOIN alunos a ON pag.idAluno = a.idAluno
INNER JOIN pessoas p ON a.idPessoa = p.idPessoa
WHERE pag.idPagamento = (
    SELECT MAX(pag2.idPagamento) 
    FROM pagamentos pag2 
    WHERE pag2.idAluno = pag.idAluno
    AND pag2.situacao = 'ignorado' -- Apenas pagamentos pendentes mais recentes
)
ORDER BY p.nome ASC, pag.dataVencimento ASC
LIMIT :limite OFFSET :offset;

            ";
    
            // Prepara e executa a consulta
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':limite', $limite, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
    
            // Recupera todos os resultados
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // Retorna os resultados ou um array vazio
            return $resultados ?: [];
    
        } catch (PDOException $e) {
            // Log do erro (opcional)
            error_log($e->getMessage());
    
            // Retorna um array vazio em caso de erro
            return [];
        }
    }
    
    public static function buscaPendente(PDO $conexao, $nome): array {
        // Query SQL corrigida
        $sql = "
  SELECT 
    p.idPessoa,
    p.nome,
    p.telefone,
    p.endereco,
    a.idAluno, -- Selecionando o idAluno da tabela alunos
    pa.valor AS valor_pagamento, -- Valor individual do pagamento
    pa.idPagamento, -- ID do pagamento
    pa.dataVencimento -- Adicionando a data de vencimento
FROM 
    pessoas p
JOIN 
    alunos a ON p.idPessoa = a.idPessoa
JOIN 
    pagamentos pa ON a.idAluno = pa.idAluno
WHERE 
    p.nome LIKE :nome
    AND pa.situacao = 'pendente' -- Filtra apenas pagamentos pendentes
ORDER BY 
    p.nome ASC;
";
        
        // Preparação e execução da query
        $stmt = $conexao->prepare($sql);
        $nome = "$nome%"; // Busca nomes que começam com o valor fornecido
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->execute();
    
        // Retorna os resultados diretamente como um array associativo
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function buscaIgnorado(PDO $conexao, $nome): array {
        // Query SQL corrigida
        $sql = "
  SELECT 
    p.idPessoa,
    p.nome,
    p.telefone,
    p.endereco,
    a.idAluno, -- Selecionando o idAluno da tabela alunos
    pa.valor AS valor_pagamento, -- Valor individual do pagamento
    pa.idPagamento, -- ID do pagamento
    pa.dataVencimento -- Adicionando a data de vencimento
FROM 
    pessoas p
JOIN 
    alunos a ON p.idPessoa = a.idPessoa
JOIN 
    pagamentos pa ON a.idAluno = pa.idAluno
WHERE 
    p.nome LIKE :nome
    AND pa.situacao = 'ignorado' -- Filtra apenas pagamentos pendentes
ORDER BY 
    p.nome ASC;
";
        
        // Preparação e execução da query
        $stmt = $conexao->prepare($sql);
        $nome = "$nome%"; // Busca nomes que começam com o valor fornecido
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->execute();
    
        // Retorna os resultados diretamente como um array associativo
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function buscaPago(PDO $conexao, $nome): array {
        // Query SQL corrigida
        $sql = "
          SELECT 
    p.idPessoa,
    p.nome,
    p.telefone,
    p.endereco,
    a.idAluno,
    a.data_pagamento, -- Selecionando o idAluno da tabela alunos
    SUM(pa.valor) AS total_pago,
    COUNT(pa.idPagamento) AS quantidade_pagamentos
FROM 
    pessoas p
JOIN 
    alunos a ON p.idPessoa = a.idPessoa
JOIN 
    pagamentos pa ON a.idAluno = pa.idAluno
WHERE 
    p.nome LIKE :nome
    AND pa.situacao = 'pago'
GROUP BY 
    p.idPessoa, p.nome, p.telefone, p.endereco, a.idAluno -- Incluindo a.idAluno no GROUP BY
ORDER BY 
    p.nome ASC;
        ";
        
        // Preparação e execução da query
        $stmt = $conexao->prepare($sql);
        $nome = "$nome%"; // Busca nomes que começam com o valor fornecido
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->execute();
    
        // Retorna os resultados diretamente como um array associativo
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarPorId($idAluno) {
        try {
            // Query para buscar o pagamento mais recente baseado no ID do aluno
            $query = "
                SELECT 
                    a.idAluno, 
                    p.nome, 
                    p.telefone, 
                    p.endereco, 
                    pag.dataVencimento, 
                    pag.valor, 
                    pag.situacao
                FROM pagamentos pag
                INNER JOIN alunos a ON pag.idAluno = a.idAluno
                INNER JOIN pessoas p ON a.idPessoa = p.idPessoa
                WHERE a.idAluno = :idAluno  -- Filtra pela ID do aluno
                ORDER BY pag.dataVencimento DESC
                LIMIT 1;
            ";
        
            // Prepara e executa a consulta
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':idAluno', $idAluno, PDO::PARAM_INT);  // Vincula o parâmetro ID
            $stmt->execute();
        
            // Recupera o pagamento mais recente
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        
            // Se não encontrar pagamento, retorna um array vazio
            if (!$resultado) {
                return [];
            }
        
            // Se não encontrar data válida, busca o pagamento com data válida
            if (empty($resultado['dataVencimento']) || $resultado['dataVencimento'] === '0000-00-00') {
                $query2 = "
                    SELECT 
                        a.idAluno, 
                        p.nome, 
                        p.telefone, 
                        p.endereco, 
                        pag.dataVencimento, 
                        pag.valor, 
                        pag.situacao
                    FROM pagamentos pag
                    INNER JOIN alunos a ON pag.idAluno = a.idAluno
                    INNER JOIN pessoas p ON a.idPessoa = p.idPessoa
                    WHERE a.idAluno = :idAluno
                    AND pag.dataVencimento IS NOT NULL
                    ORDER BY pag.dataVencimento DESC
                    LIMIT 1;
                ";
        
                // Prepara e executa a segunda consulta
                $stmt = $this->conn->prepare($query2);
                $stmt->bindParam(':idAluno', $idAluno, PDO::PARAM_INT);  // Vincula o parâmetro ID
                $stmt->execute();
        
                // Recupera o resultado da segunda consulta
                $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            }
        
            // Se ainda não encontrar nenhum pagamento, retorna um array vazio
            if (!$resultado) {
                return [];
            }
        
            // Retorna os dados encontrados
            return [$resultado];  // Retorna o pagamento como um array
        
        } catch (PDOException $e) {
            // Log do erro (opcional)
            error_log($e->getMessage());
        
            // Retorna um array vazio em caso de erro
            return [];
        }
    }

    
    

    public function buscarPagamentosAtrasados() {
        try {
            // Query para buscar pagamentos pendentes
            $query = "
              SELECT 
    alunos.idAluno, 
    pessoas.nome, 
    pessoas.telefone, 
    pessoas.endereco, 
    pagamentos.dataVencimento, 
    pagamentos.valor, 
    pagamentos.situacao
FROM pagamentos
INNER JOIN alunos ON pagamentos.idAluno = alunos.idAluno
INNER JOIN pessoas ON alunos.idPessoa = pessoas.idPessoa
WHERE pagamentos.situacao = 'pendente';

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
                $dataVencimento = new DateTime($resultado['dataVencimento']);
    
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

    public function atualizaPagamento($idAluno, $data_pagamento, $valor, $data_vencimento) {
        $data_pagamento = date('Y-m-d', strtotime(str_replace('/', '-', $data_pagamento)));
        $data_vencimento = date('Y-m-d', strtotime(str_replace('/', '-', $data_vencimento)));
    
        try {
            // Query para verificar se o pagamento pendente existe
            $query = "SELECT * FROM pagamentos 
                      WHERE idAluno = :idAluno 
                      AND dataVencimento = :data_vencimento 
                      AND situacao != 'pago'";
            
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':idAluno', $idAluno, PDO::PARAM_INT);
            $stmt->bindParam(':data_vencimento', $data_vencimento, PDO::PARAM_STR);
            $stmt->execute();
    
            // Verifica se há registros
            if ($stmt->rowCount() > 0) {
                // Atualiza o pagamento
                $query_update = "UPDATE pagamentos 
                                 SET dataPagamento = :data_pagamento, 
                                     valor = :valor, 
                                     situacao = 'pago' 
                                 WHERE idAluno = :idAluno 
                                 AND dataVencimento = :data_vencimento";
                
                $stmt_update = $this->conn->prepare($query_update);
                $stmt_update->bindParam(':idAluno', $idAluno, PDO::PARAM_INT);
                $stmt_update->bindParam(':data_pagamento', $data_pagamento, PDO::PARAM_STR);
                $stmt_update->bindParam(':valor', $valor, PDO::PARAM_STR);
                $stmt_update->bindParam(':data_vencimento', $data_vencimento, PDO::PARAM_STR);
                $stmt_update->execute();
    
                echo $valor;
            } else {
                echo "Não há pagamento pendente com a data de vencimento informada.";
            }
        } catch (PDOException $e) {
            // Log de erro e mensagem ao usuário
            error_log("Erro ao atualizar pagamento: " . $e->getMessage());
            echo "Erro ao atualizar pagamento: " . $e->getMessage();
        }
    }
    
    
    public function ignorarPagamento($idAluno, $data_vencimento) {
        // Converte a data de vencimento para o formato yyyy-mm-dd
        $data_vencimento = date('Y-m-d', strtotime(str_replace('/', '-', $data_vencimento)));
    
        try {
            // Verificar se existe um pagamento pendente para o aluno e a data de vencimento
            $query = "SELECT * FROM pagamentos 
                      WHERE idAluno = :idAluno 
                      AND dataVencimento = :data_vencimento 
                      AND situacao = 'pendente'";
            
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':idAluno', $idAluno, PDO::PARAM_INT);
            $stmt->bindParam(':data_vencimento', $data_vencimento, PDO::PARAM_STR);
            $stmt->execute();
    
            // Verifica se há registros
            if ($stmt->rowCount() > 0) {
                // Atualiza o situacao para "ignorado"
                $query_update = "UPDATE pagamentos 
                                 SET situacao = 'ignorado' 
                                 WHERE idAluno = :idAluno 
                                 AND dataVencimento = :data_vencimento 
                                 AND situacao = 'pendente'";
                
                $stmt_update = $this->conn->prepare($query_update);
                $stmt_update->bindParam(':idAluno', $idAluno, PDO::PARAM_INT);
                $stmt_update->bindParam(':data_vencimento', $data_vencimento, PDO::PARAM_STR);
                $stmt_update->execute();
    
                echo "Pagamento Ignorado Com Sucesso!";
            } else {
                echo "Não há pagamento pendente com a data de vencimento informada.";
            }
        } catch (PDOException $e) {
            // Log de erro e mensagem ao usuário
            error_log("Erro ao ignorar pagamento: " . $e->getMessage());
            echo "Erro ao ignorar pagamento: " . $e->getMessage();
        }
    }
    


}
?>