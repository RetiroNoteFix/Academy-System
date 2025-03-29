<?php
class Pessoa {
    protected ?int $id;
    protected ?string $nome;
    protected ?string $cpf;
    protected ?string $rg;
    protected ?string $email;
    protected ?string $telefone;
    protected ?string $telefoneFamilia;
    protected ?string $dataNascimento;
    protected ?string $dataCadastro;
    protected ?string $endereco;
    protected $conn; // Conexão com o banco

    // Modifiquei o construtor para receber a conexão
    public function __construct(
        $conn,
        ?int $id = null,
        ?string $nome = null,
        ?string $cpf = null,
        ?string $rg = null,
        ?string $email = null,
        ?string $telefone = null,
        ?string $telefoneFamilia = null,
        ?string $dataNascimento = null,
        ?string $dataCadastro = null,
        ?string $endereco = null
    ) {
        $this->conn = $conn; // Armazenando a conexão
        $this->id = $id;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->rg = $rg;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->telefoneFamilia = $telefoneFamilia;
        $this->dataNascimento = $dataNascimento;
        $this->dataCadastro = $dataCadastro;
        $this->endereco = $endereco;
    }

    // Retorna informações sobre a pessoa de forma estruturada
    public function retornarPessoa(): string {
        return "ID: {$this->id}\nNome: {$this->nome}\nCPF: {$this->cpf}\nRG: {$this->rg}\nEmail: {$this->email}\nTelefone: {$this->telefone}\nTelefone Familiar: {$this->telefoneFamilia}\nData de Nascimento: {$this->dataNascimento}\nData de Cadastro: {$this->dataCadastro}\nEndereço: {$this->endereco}";
    }

    // Inserir dados na tabela "pessoas"
    public function inserirPessoa() {
        try {
            // Prepare a query de inserção
            $query = "INSERT INTO pessoas (nome, cpf, rg, email, telefone, telefone_familiar, dataNascimento, endereco) 
                      VALUES (:nome, :cpf, :rg, :email, :telefone, :telefoneFamiliar, :dataNascimento, :endereco)";
            
            // Preparar a execução da query
            $stmt = $this->conn->prepare($query);
            
            // Agora usamos os valores das variáveis da classe (this->)
            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':cpf', $this->cpf);
            $stmt->bindParam(':rg', $this->rg);
            $stmt->bindParam(':telefone', $this->telefone);
            $stmt->bindParam(':telefoneFamiliar', $this->telefoneFamilia);
            $stmt->bindParam(':dataNascimento', $this->dataNascimento);
            $stmt->bindParam(':endereco', $this->endereco);
            
            // Executa a query
            $stmt->execute();
    
            // Retorna o ID da pessoa inserida
            return $this->conn->lastInsertId();
        } catch (PDOException $e) {
            // Exibe a mensagem do erro para facilitar o diagnóstico
            echo "Erro SQL: " . $e->getMessage();
            error_log("Erro ao inserir pessoa: " . $e->getMessage());
            throw new Exception("Erro ao inserir pessoa.");
        }
    }
    
    public function editarPessoa($id, $nome, $cpf, $rg, $email, $telefone, $telefone_familia, $data_nascimento, $endereco) {
        try {
            // Query de atualização
            $query = "UPDATE pessoas SET 
                        nome = :nome,
                        cpf = :cpf,
                        rg = :rg,
                        email = :email,
                        telefone = :telefone,
                        telefone_familiar = :telefoneFamiliar,
                        dataNascimento = :dataNascimento,
                        endereco = :endereco
                      WHERE idPessoa = :id";
    
            // Preparar a execução da query
            $stmt = $this->conn->prepare($query);
    
            // Bind dos parâmetros
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':rg', $rg);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':telefoneFamiliar', $telefone_familia);
            $stmt->bindParam(':dataNascimento', $data_nascimento);
            $stmt->bindParam(':endereco', $endereco);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
            // Executa a query
            $stmt->execute();
    
            // Retorna verdadeiro para indicar sucesso
            return true;
        } catch (PDOException $e) {
            // Exibe a mensagem do erro para facilitar o diagnóstico
            echo "Erro SQL: " . $e->getMessage();
            error_log("Erro ao editar pessoa: " . $e->getMessage());
            throw new Exception("Erro ao editar pessoa.");
        }
    }
    
}
?>
