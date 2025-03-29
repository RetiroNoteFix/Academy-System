
CREATE TABLE `alunos` (
  `idAluno` int(11) NOT NULL,
  `nomeAluno` varchar(100) NOT NULL,
  `rgAluno` varchar(12) DEFAULT NULL,
  `cpfAluno` varchar(14) DEFAULT NULL,
  `rua` varchar(255) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `cep` varchar(255) DEFAULT NULL,
  `numero` varchar(255) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `telefoneFamiliar` varchar(100) NOT NULL,
  `profissao` varchar(25) DEFAULT NULL,
  `dataNascimento` varchar(10) DEFAULT NULL,
  `escolaridade` varchar(55) DEFAULT NULL,
  `estadoCivil` varchar(25) DEFAULT NULL,
  `tipoSanguineo` varchar(4) DEFAULT NULL,
  `modalidade` varchar(255) DEFAULT NULL,
  `comoSoubeAcademia` varchar(20) DEFAULT NULL,
  `objetivo` varchar(20) DEFAULT NULL,
  `idade` varchar(20) DEFAULT NULL,
  `peso` varchar(20) DEFAULT NULL,
  `altura` varchar(20) DEFAULT NULL,
  `fuma` varchar(20) DEFAULT NULL,
  `fazDieta` varchar(20) DEFAULT NULL,
  `usaBebidaAlcoolica` varchar(20) DEFAULT NULL,
  `sedentario` varchar(50) DEFAULT NULL,
  `modalidadeAnterior` varchar(50) DEFAULT NULL,
  `temVarizes` varchar(50) DEFAULT NULL,
  `pressaoArterial` varchar(20) DEFAULT NULL,
  `cirurgia` varchar(100) DEFAULT NULL,
  `dormeBem` varchar(100) DEFAULT NULL,
  `lesaoArticular` varchar(100) DEFAULT NULL,
  `problemaColuna` varchar(100) DEFAULT NULL,
  `tempoMedico` varchar(100) DEFAULT NULL,
  `medicamento` varchar(100) DEFAULT NULL,
  `problemaSaude` varchar(100) DEFAULT NULL,
  `par_q_problemaCoracao` varchar(5) DEFAULT NULL,
  `par_q_dorPeitocomatividade` varchar(5) DEFAULT NULL,
  `par_q_dorPeitosematividade` varchar(5) DEFAULT NULL,
  `par_q_equilibrio` varchar(5) DEFAULT NULL,
  `par_q_problemaOsseo` varchar(5) DEFAULT NULL,
  `par_q_receitaMedica` varchar(5) DEFAULT NULL,
  `par_q_razao` varchar(5) DEFAULT NULL,
  `obesidade` varchar(50) DEFAULT NULL,
  `diabetes` varchar(50) DEFAULT NULL,
  `colesterolElevado` varchar(50) DEFAULT NULL,
  `infarto` varchar(50) DEFAULT NULL,
  `doencaCardiaca` varchar(50) DEFAULT NULL,
  `derrame` varchar(50) DEFAULT NULL,
  `pressaoAlta` varchar(50) DEFAULT NULL,
  `circunferencia` varchar(255) DEFAULT NULL,
  `torax` varchar(50) DEFAULT NULL,
  `cintura` varchar(50) DEFAULT NULL,
  `abdome` varchar(50) DEFAULT NULL,
  `quadril` varchar(50) DEFAULT NULL,
  `bracos` varchar(50) DEFAULT NULL,
  `antebracos` varchar(50) DEFAULT NULL,
  `coxas` varchar(50) DEFAULT NULL,
  `pernas` varchar(50) DEFAULT NULL,
  `observacoes` varchar(255) DEFAULT NULL,
  `valor` decimal(10,2) NOT NULL,
  `data_pagamento` date DEFAULT NULL,
  `status` enum('ativo','desativado') NOT NULL DEFAULT 'ativo',
  `data_cadastroficha` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `mensalidades` (
  `idPagamento` int(11) NOT NULL,
  `aluno_id` int(11) NOT NULL,
  `nomeAluno` varchar(30) NOT NULL,
  `data_pagamento` date DEFAULT NULL,
  `data_vencimento` date DEFAULT NULL,
  `valor` decimal(10,2) NOT NULL,
  `status` enum('pago','pendente','ignorado') DEFAULT 'pendente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo_usuario` enum('admin','funcionario') NOT NULL,
  `foto_perfil` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `usuarios` (`id`, `nome`, `senha`, `tipo_usuario`, `foto_perfil`) VALUES
(1, 'admin', '$2y$10$72Aun8rRTuTKjkcxGfjXSumJglXD4VmFXk55xiRldHFLzqPHtaVXa', 'admin', NULL);


ALTER TABLE `alunos`
  ADD PRIMARY KEY (`idAluno`);
ALTER TABLE `mensalidades`
  ADD PRIMARY KEY (`idPagamento`),
  ADD KEY `aluno_id` (`aluno_id`);

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `alunos`
  MODIFY `idAluno` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `mensalidades`
  MODIFY `idPagamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `mensalidades`
  ADD CONSTRAINT `mensalidades_ibfk_1` FOREIGN KEY (`aluno_id`) REFERENCES `alunos` (`idAluno`);
COMMIT;