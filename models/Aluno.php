<?php
// Incluindo a classe Pessoa
require_once 'Pessoa.php';

class Aluno extends Pessoa {
    private ?string $profissao;
    private ?string $escolaridade;
    private ?string $estadoCivil;
    private ?string $tipoSanguineo;
    private ?string $modalidade;
    private ?string $comoSoubeAcademia;
    private ?string $objetivo;
    private ?string $idade;
    private ?string $peso;
    private ?string $altura;
    private ?string $fuma;
    private ?string $fazDieta;
    private ?string $usaBebidaAlcoolica;
    private ?string $sedentario;
    private ?string $modalidadeAnterior;
    private ?string $temVarizes;
    private ?string $pressaoArterial;
    private ?string $cirurgia;
    private ?string $dormeBem;
    private ?string $lesaoArticular;
    private ?string $problemaColuna;
    private ?string $tempoMedico;
    private ?string $medicamento;
    private ?string $problemaSaude;
    private ?string $parqProblemaCoracao;
    private ?string $parqDorPeitoComAtividade;
    private ?string $parqDorPeitoSemAtividade;
    private ?string $parqEquilibrio;
    private ?string $parqProblemaOsseo;
    private ?string $parqReceitaMedica;
    private ?string $parqRazao;
    private ?string $obesidade;
    private ?string $diabetes;
    private ?string $colesterolElevado;
    private ?string $infarto;
    private ?string $doencaCardiaca;
    private ?string $derrame;
    private ?string $pressaoAlta;
    private ?string $medidaTorax;
    private ?string $medidaCintura;
    private ?string $medidaAbdome;
    private ?string $medidaQuadril;
    private ?string $medidaBracos;
    private ?string $medidaAntebracos;
    private ?string $medidaPanturrilha;
    private ?string $medidaPernas;
    private ?string $observacoes;
    private ?string $percentualGordura;
    private ?string $imc;
    private ?string $situacao;
    private ?string $plano;

    // Construtor para inicializar os atributos
    public function __construct(
        int $id = null,
        string $nome = null,
        string $cpf = null,
        string $rg = null,
        string $email = null,
        string $telefone = null,
        string $telefoneFamilia = null,
        string $dataNascimento = null,
        string $dataCadastro = null,
        string $endereco = null,
        string $profissao = null,
        string $escolaridade = null,
        string $estadoCivil = null,
        string $tipoSanguineo = null,
        string $modalidade = null,
        string $comoSoubeAcademia = null,
        string $objetivo = null,
        string $idade = null,
        string $peso = null,
        string $altura = null,
        string $fuma = null,
        string $fazDieta = null,
        string $usaBebidaAlcoolica = null,
        string $sedentario = null,
        string $modalidadeAnterior = null,
        string $temVarizes = null,
        string $pressaoArterial = null,
        string $cirurgia = null,
        string $dormeBem = null,
        string $lesaoArticular = null,
        string $problemaColuna = null,
        string $tempoMedico = null,
        string $medicamento = null,
        string $problemaSaude = null,
        string $parqProblemaCoracao = null,
        string $parqDorPeitoComAtividade = null,
        string $parqDorPeitoSemAtividade = null,
        string $parqEquilibrio = null,
        string $parqProblemaOsseo = null,
        string $parqReceitaMedica = null,
        string $parqRazao = null,
        string $obesidade = null,
        string $diabetes = null,
        string $colesterolElevado = null,
        string $infarto = null,
        string $doencaCardiaca = null,
        string $derrame = null,
        string $pressaoAlta = null,
        string $medidaTorax = null,
        string $medidaCintura = null,
        string $medidaAbdome = null,
        string $medidaQuadril = null,
        string $medidaBracos = null,
        string $medidaAntebracos = null,
        string $medidaPanturrilha = null,
        string $medidaPernas = null,
        string $observacoes = null,
        string $percentualGordura = null,
        string $imc = null,
        string $situacao = 'ativo',
        string $plano = null
    ) {
        parent::__construct(null, (int)$id, $nome, $cpf, $rg, $email, $telefone, $telefoneFamilia, $dataNascimento, $dataCadastro, $endereco);
        $this->profissao = $profissao;
        $this->escolaridade = $escolaridade;
        $this->estadoCivil = $estadoCivil;
        $this->tipoSanguineo = $tipoSanguineo;
        $this->modalidade = $modalidade;
        $this->comoSoubeAcademia = $comoSoubeAcademia;
        $this->objetivo = $objetivo;
        $this->idade = $idade;
        $this->peso = $peso;
        $this->altura = $altura;
        $this->fuma = $fuma;
        $this->fazDieta = $fazDieta;
        $this->usaBebidaAlcoolica = $usaBebidaAlcoolica;
        $this->sedentario = $sedentario;
        $this->modalidadeAnterior = $modalidadeAnterior;
        $this->temVarizes = $temVarizes;
        $this->pressaoArterial = $pressaoArterial;
        $this->cirurgia = $cirurgia;
        $this->dormeBem = $dormeBem;
        $this->lesaoArticular = $lesaoArticular;
        $this->problemaColuna = $problemaColuna;
        $this->tempoMedico = $tempoMedico;
        $this->medicamento = $medicamento;
        $this->problemaSaude = $problemaSaude;
        $this->parqProblemaCoracao = $parqProblemaCoracao;
        $this->parqDorPeitoComAtividade = $parqDorPeitoComAtividade;
        $this->parqDorPeitoSemAtividade = $parqDorPeitoSemAtividade;
        $this->parqEquilibrio = $parqEquilibrio;
        $this->parqProblemaOsseo = $parqProblemaOsseo;
        $this->parqReceitaMedica = $parqReceitaMedica;
        $this->parqRazao = $parqRazao;
        $this->obesidade = $obesidade;
        $this->diabetes = $diabetes;
        $this->colesterolElevado = $colesterolElevado;
        $this->infarto = $infarto;
        $this->doencaCardiaca = $doencaCardiaca;
        $this->derrame = $derrame;
        $this->pressaoAlta = $pressaoAlta;
        $this->medidaTorax = $medidaTorax;
        $this->medidaCintura = $medidaCintura;
        $this->medidaAbdome = $medidaAbdome;
        $this->medidaQuadril = $medidaQuadril;
        $this->medidaBracos = $medidaBracos;
        $this->medidaAntebracos = $medidaAntebracos;
        $this->medidaPanturrilha = $medidaPanturrilha;
        $this->medidaPernas = $medidaPernas;
        $this->observacoes = $observacoes;
        $this->percentualGordura = $percentualGordura;
        $this->imc = $imc;
        $this->situacao = $situacao;
        $this->plano = $plano;
    }

    


    public static function listarTodos(PDO $conexao): array {
        // Query SQL corrigida
        $sql = "
    SELECT *
FROM pessoas p
JOIN alunos a ON p.idPessoa = a.idPessoa
WHERE a.situacao = 'Ativo'
ORDER BY p.nome ASC;

";
        
        // Preparação e execução da query
        $stmt = $conexao->prepare($sql);
        $stmt->execute();
    
        // Obtenção dos resultados
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $alunos = [];
    
        // Iteração para transformar resultados em objetos Aluno
        foreach ($resultados as $resultado) {
            $alunos[] = new Aluno(
            $resultado['idPessoa'],
            $resultado['nome'],
            $resultado['cpf'],
            $resultado['rg'],
            $resultado['email'],
            $resultado['telefone'],
            $resultado['telefone_familiar'],
            $resultado['dataNascimento'],
            $resultado['dataCadastro'],
            $resultado['endereco'],
            $resultado['profissao'],
            $resultado['escolaridade'],
            $resultado['estadoCivil'],
$resultado['tipoSanguineo'],
$resultado['modalidade'],
$resultado['comoSoubeAcademia'],
$resultado['objetivo'],
$resultado['idade'],
$resultado['peso'],
$resultado['altura'],
$resultado['fuma'],
$resultado['fazDieta'],
$resultado['usaBebidaAlcoolica'],
$resultado['sedentario'],
$resultado['modalidadeAnterior'],
$resultado['temVarizes'],
$resultado['pressaoArterial'],
$resultado['cirurgia'],
$resultado['dormeBem'],
$resultado['lesaoArticular'],
$resultado['problemaColuna'],
$resultado['tempoMedico'],
$resultado['medicamento'],
$resultado['problemaSaude'],
$resultado['parqProblemaCoracao'],
$resultado['parqDorPeitoComAtividade'],
$resultado['parqDorPeitoSemAtividade'],
$resultado['parqEquilibrio'],
$resultado['parqProblemaOsseo'],
$resultado['parqreceitaMedica'],
$resultado['parqRazao'],
$resultado['obesidade'],
$resultado['diabetes'],
$resultado['colesterolElevado'],
$resultado['infarto'],
$resultado['doencaCardiaca'],
$resultado['derrame'],
$resultado['pressaoAlta'],
$resultado['medidaTorax'],
$resultado['medidaCintura'],
$resultado['medidaAbdome'],
$resultado['medidaQuadril'],
$resultado['medidaBracos'],
$resultado['medidaAntebracos'],
$resultado['medidaPanturrilha'],
$resultado['medidaPernas'],
$resultado['observacoes'],
$resultado['percentualGordura'],
$resultado['imc'],
$resultado['situacao'],
$resultado['plano']
            
        );
    }

    return $alunos;
   
}
public function getId() {
    return $this->id;
}

public function getNome() {
    return $this->nome;
}

public function getCpf() {
    return $this->cpf;
}

public function getRg() {
    return $this->rg;
}

public function getEmail() {
    return $this->email;
}

public function getTelefone() {
    return $this->telefone;
}
public function getTelefoneFamilia() {
    return $this->telefoneFamilia;
}

public function getDataNascimento() {
    return $this->dataNascimento;
}

public function getDataCadastro() {
    return $this->dataCadastro;
}

public function getEndereco() {
    return $this->endereco;
}

public function getProfissao() {
    return $this->profissao;
}

public function getEscolaridade() {
    return $this->escolaridade;
}

public function getEstadoCivil() {
    return $this->estadoCivil;
}

public function getTipoSanguineo() {
    return $this->tipoSanguineo;
}

public function getModalidade() {
    return $this->modalidade;
}

public function getComoSoubeAcademia() {
    return $this->comoSoubeAcademia;
}

public function getObjetivo() {
    return $this->objetivo;
}

public function getIdade() {
    return $this->idade;
}

public function getPeso() {
    return $this->peso;
}

public function getAltura() {
    return $this->altura;
}

public function getFuma() {
    return $this->fuma;
}

public function getFazDieta() {
    return $this->fazDieta;
}

public function getUsaBebidaAlcoolica() {
    return $this->usaBebidaAlcoolica;
}

public function getSedentario() {
    return $this->sedentario;
}

public function getModalidadeAnterior() {
    return $this->modalidadeAnterior;
}

public function getTemVarizes() {
    return $this->temVarizes;
}

public function getPressaoArterial() {
    return $this->pressaoArterial;
}

public function getCirurgia() {
    return $this->cirurgia;
}

public function getDormeBem() {
    return $this->dormeBem;
}

public function getLesaoArticular() {
    return $this->lesaoArticular;
}

public function getProblemaColuna() {
    return $this->problemaColuna;
}

public function getTempoMedico() {
    return $this->tempoMedico;
}

public function getMedicamento() {
    return $this->medicamento;
}

public function getProblemaSaude() {
    return $this->problemaSaude;
}

public function getParqProblemaCoracao() {
    return $this->parqProblemaCoracao;
}

public function getParqDorPeitoComAtividade() {
    return $this->parqDorPeitoComAtividade;
}

public function getParqDorPeitoSemAtividade() {
    return $this->parqDorPeitoSemAtividade;
}

public function getParqEquilibrio() {
    return $this->parqEquilibrio;
}

public function getParqProblemaOsseo() {
    return $this->parqProblemaOsseo;
}

public function getParqReceitaMedica() {
    return $this->parqReceitaMedica;
}

public function getParqRazao() {
    return $this->parqRazao;
}

public function getObesidade() {
    return $this->obesidade;
}

public function getDiabetes() {
    return $this->diabetes;
}

public function getColesterolElevado() {
    return $this->colesterolElevado;
}

public function getInfarto() {
    return $this->infarto;
}

public function getDoencaCardiaca() {
    return $this->doencaCardiaca;
}

public function getDerrame() {
    return $this->derrame;
}

public function getPressaoAlta() {
    return $this->pressaoAlta;
}

public function getMedidaTorax() {
    return $this->medidaTorax;
}

public function getMedidaCintura() {
    return $this->medidaCintura;
}

public function getMedidaAbdome() {
    return $this->medidaAbdome;
}

public function getMedidaQuadril() {
    return $this->medidaQuadril;
}

public function getMedidaBracos() {
    return $this->medidaBracos;
}

public function getMedidaAntebracos() {
    return $this->medidaAntebracos;
}

public function getmedidaPanturrilha() {
    return $this->medidaPanturrilha;
}

public function getMedidaPernas() {
    return $this->medidaPernas;
}

public function getObservacoes() {
    return $this->observacoes;
}

public function getPercentualGordura() {
    return $this->percentualGordura;
}

public function getImc() {
    return $this->imc;
}

public function getSituacao() {
    return $this->situacao;
}

public function getPlano() {
    return $this->plano;
}



public static function listarTodosDesativados(PDO $conexao): array {
    // Query SQL corrigida
    $sql = "
SELECT *
FROM pessoas p
JOIN alunos a ON p.idPessoa = a.idPessoa
WHERE a.situacao = 'Inativo'
ORDER BY p.nome ASC;

";
    
    // Preparação e execução da query
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    // Obtenção dos resultados
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $alunos = [];

    // Iteração para transformar resultados em objetos Aluno
    foreach ($resultados as $resultado) {
        $alunos[] = new Aluno(
        $resultado['idPessoa'],
        $resultado['nome'],
        $resultado['cpf'],
        $resultado['rg'],
        $resultado['email'],
        $resultado['telefone'],
        $resultado['telefone_familiar'],
        $resultado['dataNascimento'],
        $resultado['dataCadastro'],
        $resultado['endereco'],
        $resultado['profissao'],
        $resultado['escolaridade'],
        $resultado['estadoCivil'],
$resultado['tipoSanguineo'],
$resultado['modalidade'],
$resultado['comoSoubeAcademia'],
$resultado['objetivo'],
$resultado['idade'],
$resultado['peso'],
$resultado['altura'],
$resultado['fuma'],
$resultado['fazDieta'],
$resultado['usaBebidaAlcoolica'],
$resultado['sedentario'],
$resultado['modalidadeAnterior'],
$resultado['temVarizes'],
$resultado['pressaoArterial'],
$resultado['cirurgia'],
$resultado['dormeBem'],
$resultado['lesaoArticular'],
$resultado['problemaColuna'],
$resultado['tempoMedico'],
$resultado['medicamento'],
$resultado['problemaSaude'],
$resultado['parqProblemaCoracao'],
$resultado['parqDorPeitoComAtividade'],
$resultado['parqDorPeitoSemAtividade'],
$resultado['parqEquilibrio'],
$resultado['parqProblemaOsseo'],
$resultado['parqreceitaMedica'],
$resultado['parqRazao'],
$resultado['obesidade'],
$resultado['diabetes'],
$resultado['colesterolElevado'],
$resultado['infarto'],
$resultado['doencaCardiaca'],
$resultado['derrame'],
$resultado['pressaoAlta'],
$resultado['medidaTorax'],
$resultado['medidaCintura'],
$resultado['medidaAbdome'],
$resultado['medidaQuadril'],
$resultado['medidaBracos'],
$resultado['medidaAntebracos'],
$resultado['medidaPanturrilha'],
$resultado['medidaPernas'],
$resultado['observacoes'],
$resultado['percentualGordura'],
$resultado['imc'],
$resultado['situacao'],
$resultado['plano']
        
    );
}

return $alunos;
}



public static function listarPorId(PDO $conexao, $alunoId): ?Aluno {
    // Query SQL para buscar aluno pelo idPessoa
    $sql = "
        SELECT *
        FROM pessoas p
        JOIN alunos a ON p.idPessoa = a.idPessoa
        WHERE p.idPessoa = :idPessoa
        ORDER BY p.nome ASC;
    ";
    
    // Preparação e execução da query
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':idPessoa', $alunoId, PDO::PARAM_INT);
    $stmt->execute();
    
    // Obtenção do resultado
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($resultado) {
        // Retorna o objeto Aluno
        return new Aluno(
            $resultado['idPessoa'],
            $resultado['nome'],
            $resultado['cpf'],
            $resultado['rg'],
            $resultado['email'],
            $resultado['telefone'],
            $resultado['telefone_familiar'],
            $resultado['dataNascimento'],
            $resultado['dataCadastro'],
            $resultado['endereco'],
            $resultado['profissao'],
            $resultado['escolaridade'],
            $resultado['estadoCivil'],
            $resultado['tipoSanguineo'],
            $resultado['modalidade'],
            $resultado['comoSoubeAcademia'],
            $resultado['objetivo'],
            $resultado['idade'],
            $resultado['peso'],
            $resultado['altura'],
            $resultado['fuma'],
            $resultado['fazDieta'],
            $resultado['usaBebidaAlcoolica'],
            $resultado['sedentario'],
            $resultado['modalidadeAnterior'],
            $resultado['temVarizes'],
            $resultado['pressaoArterial'],
            $resultado['cirurgia'],
            $resultado['dormeBem'],
            $resultado['lesaoArticular'],
            $resultado['problemaColuna'],
            $resultado['tempoMedico'],
            $resultado['medicamento'],
            $resultado['problemaSaude'],
            $resultado['parqProblemaCoracao'],
            $resultado['parqDorPeitoComAtividade'],
            $resultado['parqDorPeitoSemAtividade'],
            $resultado['parqEquilibrio'],
            $resultado['parqProblemaOsseo'],
            $resultado['parqreceitaMedica'],
            $resultado['parqRazao'],
            $resultado['obesidade'],
            $resultado['diabetes'],
            $resultado['colesterolElevado'],
            $resultado['infarto'],
            $resultado['doencaCardiaca'],
            $resultado['derrame'],
            $resultado['pressaoAlta'],
            $resultado['medidaTorax'],
            $resultado['medidaCintura'],
            $resultado['medidaAbdome'],
            $resultado['medidaQuadril'],
            $resultado['medidaBracos'],
            $resultado['medidaAntebracos'],
            $resultado['medidaPanturrilha'],
            $resultado['medidaPernas'],
            $resultado['observacoes'],
            $resultado['percentualGordura'],
            $resultado['imc'],
            $resultado['situacao'],
            $resultado['plano']
        );
    }
    
    // Retorna null caso não encontre o aluno
    return null;
}


public static function desativarAluno(PDO $conexao, $alunoId): ?Aluno {
    // Query SQL para buscar aluno pelo idPessoa
    $sql = "
       UPDATE alunos
            SET situacao = 'Inativo'
            WHERE idPessoa = :idPessoa;
    ";
    
    // Preparação e execução da query
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':idPessoa', $alunoId, PDO::PARAM_INT);
    $stmt->execute();
    
    // Obtenção do resultado
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($resultado) {
        return new Aluno();
    }
    
    return null;
}

public static function pesquisaAluno(PDO $conexao, $nome): array {
    // Query SQL corrigida
    $sql = "
SELECT *
FROM pessoas p
JOIN alunos a ON p.idPessoa = a.idPessoa
WHERE p.nome LIKE :nome
ORDER BY p.nome ASC;
";
    
    // Preparação e execução da query
    $stmt = $conexao->prepare($sql);
    $nome = "$nome%";
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->execute();

    // Obtenção dos resultados
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $alunos = [];

    // Iteração para transformar resultados em objetos Aluno
    foreach ($resultados as $resultado) {
        $alunos[] = new Aluno(
        $resultado['idPessoa'],
        $resultado['nome'],
        $resultado['cpf'],
        $resultado['rg'],
        $resultado['email'],
        $resultado['telefone'],
        $resultado['telefone_familiar'],
        $resultado['dataNascimento'],
        $resultado['dataCadastro'],
        $resultado['endereco'],
        $resultado['profissao'],
        $resultado['escolaridade'],
        $resultado['estadoCivil'],
$resultado['tipoSanguineo'],
$resultado['modalidade'],
$resultado['comoSoubeAcademia'],
$resultado['objetivo'],
$resultado['idade'],
$resultado['peso'],
$resultado['altura'],
$resultado['fuma'],
$resultado['fazDieta'],
$resultado['usaBebidaAlcoolica'],
$resultado['sedentario'],
$resultado['modalidadeAnterior'],
$resultado['temVarizes'],
$resultado['pressaoArterial'],
$resultado['cirurgia'],
$resultado['dormeBem'],
$resultado['lesaoArticular'],
$resultado['problemaColuna'],
$resultado['tempoMedico'],
$resultado['medicamento'],
$resultado['problemaSaude'],
$resultado['parqProblemaCoracao'],
$resultado['parqDorPeitoComAtividade'],
$resultado['parqDorPeitoSemAtividade'],
$resultado['parqEquilibrio'],
$resultado['parqProblemaOsseo'],
$resultado['parqreceitaMedica'],
$resultado['parqRazao'],
$resultado['obesidade'],
$resultado['diabetes'],
$resultado['colesterolElevado'],
$resultado['infarto'],
$resultado['doencaCardiaca'],
$resultado['derrame'],
$resultado['pressaoAlta'],
$resultado['medidaTorax'],
$resultado['medidaCintura'],
$resultado['medidaAbdome'],
$resultado['medidaQuadril'],
$resultado['medidaBracos'],
$resultado['medidaAntebracos'],
$resultado['medidaPanturrilha'],
$resultado['medidaPernas'],
$resultado['observacoes'],
$resultado['percentualGordura'],
$resultado['imc'],
$resultado['situacao'],
$resultado['plano']
        
    );
}

return $alunos;
}

public static function pesquisaAlunoDesativado(PDO $conexao, $nome): array {
    // Query SQL corrigida
    $sql = "
SELECT *
FROM pessoas p
JOIN alunos a ON p.idPessoa = a.idPessoa
WHERE p.nome LIKE :nome AND a.situacao = 'Inativo'
ORDER BY p.nome ASC;
";
    
    // Preparação e execução da query
    $stmt = $conexao->prepare($sql);
    $nome = "$nome%";
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->execute();

    // Obtenção dos resultados
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $alunos = [];

    // Iteração para transformar resultados em objetos Aluno
    foreach ($resultados as $resultado) {
        $alunos[] = new Aluno(
        $resultado['idPessoa'],
        $resultado['nome'],
        $resultado['cpf'],
        $resultado['rg'],
        $resultado['email'],
        $resultado['telefone'],
        $resultado['telefone_familiar'],
        $resultado['dataNascimento'],
        $resultado['dataCadastro'],
        $resultado['endereco'],
        $resultado['profissao'],
        $resultado['escolaridade'],
        $resultado['estadoCivil'],
$resultado['tipoSanguineo'],
$resultado['modalidade'],
$resultado['comoSoubeAcademia'],
$resultado['objetivo'],
$resultado['idade'],
$resultado['peso'],
$resultado['altura'],
$resultado['fuma'],
$resultado['fazDieta'],
$resultado['usaBebidaAlcoolica'],
$resultado['sedentario'],
$resultado['modalidadeAnterior'],
$resultado['temVarizes'],
$resultado['pressaoArterial'],
$resultado['cirurgia'],
$resultado['dormeBem'],
$resultado['lesaoArticular'],
$resultado['problemaColuna'],
$resultado['tempoMedico'],
$resultado['medicamento'],
$resultado['problemaSaude'],
$resultado['parqProblemaCoracao'],
$resultado['parqDorPeitoComAtividade'],
$resultado['parqDorPeitoSemAtividade'],
$resultado['parqEquilibrio'],
$resultado['parqProblemaOsseo'],
$resultado['parqreceitaMedica'],
$resultado['parqRazao'],
$resultado['obesidade'],
$resultado['diabetes'],
$resultado['colesterolElevado'],
$resultado['infarto'],
$resultado['doencaCardiaca'],
$resultado['derrame'],
$resultado['pressaoAlta'],
$resultado['medidaTorax'],
$resultado['medidaCintura'],
$resultado['medidaAbdome'],
$resultado['medidaQuadril'],
$resultado['medidaBracos'],
$resultado['medidaAntebracos'],
$resultado['medidaPanturrilha'],
$resultado['medidaPernas'],
$resultado['observacoes'],
$resultado['percentualGordura'],
$resultado['imc'],
$resultado['situacao'],
$resultado['plano']
        
    );
}

return $alunos;
}



}
