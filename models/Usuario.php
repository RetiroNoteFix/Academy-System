<?php
require 'Pessoa.php';
require __DIR__ . '/../config/database.php';
class Usuario extends Pessoa {
    private string $senha;
    private string $tipoUsuario;
    private ?string $fotoPerfil;

    public function __construct(int $idUsuario, int $id, string $nome, string $cpf, string $rg, string $email, string $telefone, string $dataNascimento, string $dataCadastro, string $endereco, string $senha, string $tipoUsuario, ?string $fotoPerfil = null) {
        parent::__construct($id, $nome, $cpf, $rg, $email, $telefone, $dataNascimento, $dataCadastro, $endereco);
        $this->senha = $senha;
        $this->tipoUsuario = $tipoUsuario;
        $this->fotoPerfil = $fotoPerfil;
    }

    public function exibirInformacoesCompleta(): string {
        return parent::retornarPessoa() . "\n" .
               "Senha: {$this->senha}\n" .
               "Tipo de Usuário: {$this->tipoUsuario}\n" .
               "Foto de Perfil: {$this->fotoPerfil}";
    }

public static function fazerLogin($nomeusuario, $senhausuario) {
    header('Content-Type: application/json');
    $database = new Database();
    $conn = $database->getConnection();

    try {
        $query = "SELECT p.idPessoa, p.nome, u.senha, u.tipo_usuario
FROM pessoas p
JOIN usuarios u ON p.idPessoa = u.idPessoa
WHERE p.nome = :nomeusuario;
";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':nomeusuario', $nomeusuario, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if (password_verify($senhausuario, $usuario['senha'])) {
                session_start();
                $_SESSION['usuario_id'] = $usuario['idPessoa'];
                $_SESSION['usuario_nome'] = $usuario['nome'];
                $_SESSION['usuario_tipo'] = $usuario['tipo_usuario'];

                echo json_encode([
                    'status' => 'success', 
                    'redirect' => '../views/dashboard/dashboard.php'
                ]);
                exit();
            } else {
                echo json_encode([
                    'status' => 'error', 
                    'message' => '<span id="alert">ERRO: Senha incorreta!</span>'
                ]);
                exit();
            }
        } else {
            echo json_encode([
                'status' => 'error', 
                'message' => '<span id="alert">ERRO: Usuário não encontrado!</span>'
            ]);
            exit();
        }
    } catch (PDOException $e) {
        echo json_encode([
            'status' => 'error', 
            'message' => 'Erro ao conectar com o banco de dados: ' . $e->getMessage()
        ]);
        exit();
    } finally {
        $conn = null; // Fecha a conexão
    }
}

public static function auth() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    // Verifica se o usuário está logado
    if (!isset($_SESSION['usuario_id'])) {
        echo 'Usuário não autenticado';
        header('Location: /academy/index.php'); // Redireciona para a página de login
        exit();
    }
    
    // Captura dados da sessão
    $usuario_nome = $_SESSION['usuario_nome'];
    $usuario_tipo = $_SESSION['usuario_tipo'];
    
    // Exemplo de restrição para diferentes tipos de usuário
    if ($usuario_tipo !== 'admin') {
        echo 'Usuário não autenticado';
        // Redireciona se o tipo de usuário não for permitido
        header('Location: /academy/core/403.php'); // Página de acesso negado
        exit();
    }
}
}

?>