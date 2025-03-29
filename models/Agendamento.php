<?php

class Agendamento {
    private int $idAgendamento;
    private int $idAluno;
    private int $idUsuario;
    private string $dataAgendada;
    private string $horaInicio;
    private string $horaFim;
    private string $tipoAtividade;
    private string $status;
    private ?string $observacoes;

    public function __construct(int $idAgendamento, int $idAluno, int $idUsuario, string $dataAgendada, string $horaInicio, string $horaFim, string $tipoAtividade = 'treino', string $status = 'agendado', ?string $observacoes = null) {
        $this->idAgendamento = $idAgendamento;
        $this->idAluno = $idAluno;
        $this->idUsuario = $idUsuario;
        $this->dataAgendada = $dataAgendada;
        $this->horaInicio = $horaInicio;
        $this->horaFim = $horaFim;
        $this->tipoAtividade = $tipoAtividade;
        $this->status = $status;
        $this->observacoes = $observacoes;
    }

    public function exibirInformacoes(): string {
        return "ID Agendamento: {$this->idAgendamento}\n" .
               "Aluno ID: {$this->idAluno}\n" .
               "Usuário ID: {$this->idUsuario}\n" .
               "Data Agendada: {$this->dataAgendada}\n" .
               "Hora Início: {$this->horaInicio}\n" .
               "Hora Fim: {$this->horaFim}\n" .
               "Tipo de Atividade: {$this->tipoAtividade}\n" .
               "Status: {$this->status}\n" .
               "Observações: {$this->observacoes}\n";
    }

    public static function listarTodos(PDO $conexao): array {
        $sql = "SELECT * FROM agendamentos";
        $stmt = $conexao->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $agendamentos = [];
        foreach ($resultados as $resultado) {
            $agendamentos[] = new Agendamento(
                $resultado['idAgendamento'],
                $resultado['idAluno'],
                $resultado['idUsuario'],
                $resultado['dataAgendada'],
                $resultado['horaInicio'],
                $resultado['horaFim'],
                $resultado['tipoAtividade'],
                $resultado['status'],
                $resultado['observacoes']
            );
        }
        return $agendamentos;
    }

    public static function buscarPorId(int $idAgendamento, PDO $conexao): ?Agendamento {
        $sql = "SELECT * FROM agendamentos WHERE idAgendamento = :idAgendamento";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':idAgendamento', $idAgendamento, PDO::PARAM_INT);
        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($resultado) {
            return new Agendamento(
                $resultado['idAgendamento'],
                $resultado['idAluno'],
                $resultado['idUsuario'],
                $resultado['dataAgendada'],
                $resultado['horaInicio'],
                $resultado['horaFim'],
                $resultado['tipoAtividade'],
                $resultado['status'],
                $resultado['observacoes']
            );
        }
        return null;
    }

    public function salvar(PDO $conexao): void {
        $sql = "INSERT INTO agendamentos (idAluno, idUsuario, dataAgendada, horaInicio, horaFim, tipoAtividade, status, observacoes) 
                VALUES (:idAluno, :idUsuario, :dataAgendada, :horaInicio, :horaFim, :tipoAtividade, :status, :observacoes)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':idAluno', $this->idAluno);
        $stmt->bindParam(':idUsuario', $this->idUsuario);
        $stmt->bindParam(':dataAgendada', $this->dataAgendada);
        $stmt->bindParam(':horaInicio', $this->horaInicio);
        $stmt->bindParam(':horaFim', $this->horaFim);
        $stmt->bindParam(':tipoAtividade', $this->tipoAtividade);
        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':observacoes', $this->observacoes);
        $stmt->execute();
    }

    // Métodos Getters e Setters
    public function getIdAgendamento(): int {
        return $this->idAgendamento;
    }

    public function setIdAgendamento(int $idAgendamento): void {
        $this->idAgendamento = $idAgendamento;
    }

    public function getIdAluno(): int {
        return $this->idAluno;
    }

    public function setIdAluno(int $idAluno): void {
        $this->idAluno = $idAluno;
    }

    public function getIdUsuario(): int {
        return $this->idUsuario;
    }

    public function setIdUsuario(int $idUsuario): void {
        $this->idUsuario = $idUsuario;
    }

    public function getDataAgendada(): string {
        return $this->dataAgendada;
    }

    public function setDataAgendada(string $dataAgendada): void {
        $this->dataAgendada = $dataAgendada;
    }

    public function getHoraInicio(): string {
        return $this->horaInicio;
    }

    public function setHoraInicio(string $horaInicio): void {
        $this->horaInicio = $horaInicio;
    }

    public function getHoraFim(): string {
        return $this->horaFim;
    }

    public function setHoraFim(string $horaFim): void {
        $this->horaFim = $horaFim;
    }

    public function getTipoAtividade(): string {
        return $this->tipoAtividade;
    }

    public function setTipoAtividade(string $tipoAtividade): void {
        $this->tipoAtividade = $tipoAtividade;
    }

    public function getStatus(): string {
        return $this->status;
    }

    public function setStatus(string $status): void {
        $this->status = $status;
    }

    public function getObservacoes(): ?string {
        return $this->observacoes;
    }

    public function setObservacoes(?string $observacoes): void {
        $this->observacoes = $observacoes;
    }
}
?>
