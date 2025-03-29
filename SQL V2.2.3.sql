CREATE TABLE `alunos` (
  `idAluno` int(11) NOT NULL,
  `idPessoa` int(11) DEFAULT NULL,
  `profissao` varchar(100) DEFAULT 'Não Informado',
  `escolaridade` varchar(100) DEFAULT 'Não Informado',
  `estadoCivil` varchar(50) DEFAULT 'Não Informado',
  `tipoSanguineo` varchar(15) DEFAULT 'Não Informado',
  `modalidade` varchar(100) DEFAULT 'Não Informado',
  `comoSoubeAcademia` varchar(255) DEFAULT 'Não Informado',
  `objetivo` varchar(255) DEFAULT 'Não Informado',
  `idade` varchar(15) DEFAULT 'Não Informado',
  `peso` varchar(15) DEFAULT 'Não Informado',
  `altura` varchar(15) DEFAULT 'Não Informado',
  `fuma` varchar(15) DEFAULT 'Não Informado',
  `fazDieta` varchar(15) DEFAULT 'Não Informado',
  `usaBebidaAlcoolica` varchar(15) DEFAULT 'Não Informado',
  `sedentario` varchar(15) DEFAULT 'Não Informado',
  `modalidadeAnterior` varchar(100) DEFAULT 'Não Informado',
  `temVarizes` varchar(15) DEFAULT 'Não Informado',
  `pressaoArterial` varchar(50) DEFAULT 'Não Informado',
  `cirurgia` varchar(15) DEFAULT 'Não Informado',
  `dormeBem` varchar(15) DEFAULT 'Não Informado',
  `lesaoArticular` varchar(15) DEFAULT 'Não Informado',
  `problemaColuna` varchar(15) DEFAULT 'Não Informado',
  `tempoMedico` varchar(255) DEFAULT 'Não Informado',
  `medicamento` varchar(255) DEFAULT 'Não Informado',
  `problemaSaude` varchar(255) DEFAULT 'Não Informado',
  `parqProblemaCoracao` varchar(15) DEFAULT 'Não Informado',
  `parqDorPeitoComAtividade` varchar(15) DEFAULT 'Não Informado',
  `parqDorPeitoSemAtividade` varchar(15) DEFAULT 'Não Informado',
  `parqEquilibrio` varchar(15) DEFAULT 'Não Informado',
  `parqProblemaOsseo` varchar(15) DEFAULT 'Não Informado',
  `parqreceitaMedica` varchar(15) DEFAULT 'Não Informado',
  `parqRazao` varchar(255) DEFAULT 'Não Informado',
  `obesidade` varchar(15) DEFAULT 'Não Informado',
  `diabetes` varchar(15) DEFAULT 'Não Informado',
  `colesterolElevado` varchar(15) DEFAULT 'Não Informado',
  `infarto` varchar(15) DEFAULT 'Não Informado',
  `doencaCardiaca` varchar(15) DEFAULT 'Não Informado',
  `derrame` varchar(15) DEFAULT 'Não Informado',
  `pressaoAlta` varchar(15) DEFAULT 'Não Informado',
  `medidaTorax` varchar(15) DEFAULT 'Não Informado',
  `medidaCintura` varchar(15) DEFAULT 'Não Informado',
  `medidaAbdome` varchar(15) DEFAULT 'Não Informado',
  `medidaQuadril` varchar(15) DEFAULT 'Não Informado',
  `medidaBracos` varchar(15) DEFAULT 'Não Informado',
  `medidaAntebracos` varchar(15) DEFAULT 'Não Informado',
  `medidaPanturrilha` varchar(15) DEFAULT 'Não Informado',
  `medidaPernas` varchar(15) DEFAULT 'Não Informado',
  `observacoes` varchar(255) DEFAULT 'Não Informado',
  `percentualGordura` varchar(15) DEFAULT 'Não Informado',
  `imc` varchar(15) DEFAULT 'Não Informado',
  `valor` decimal(10,2) DEFAULT NULL,
  `data_pagamento` varchar(20) DEFAULT NULL,
  `situacao` enum('Ativo','Inativo') NOT NULL DEFAULT 'Ativo',
  `plano` enum('Mensal','Trimestral','Anual') DEFAULT 'Mensal'
);
CREATE TABLE `pagamentos` (
  `idPagamento` int(11) NOT NULL,
  `idAluno` int(11) DEFAULT NULL,
  `planoAluno` varchar(50) DEFAULT NULL,
  `dataReferencia` date DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `dataPagamento` date DEFAULT NULL,
  `dataVencimento` date DEFAULT NULL,
  `situacao` varchar(50) DEFAULT NULL
);
CREATE TABLE `pessoas` (
  `idPessoa` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(15) DEFAULT 'Não Informado',
  `rg` varchar(20) DEFAULT 'Não Informado',
  `email` varchar(100) DEFAULT 'nãoinformado@email.com',
  `telefone` varchar(15) DEFAULT 'Não Informado',
  `telefone_familiar` varchar(50) DEFAULT 'Não Informado',
  `dataNascimento` date DEFAULT NULL,
  `dataCadastro` datetime DEFAULT current_timestamp(),
  `endereco` varchar(255) DEFAULT 'Não Informado'
);
INSERT INTO `pessoas` (`idPessoa`, `nome`, `cpf`, `rg`, `email`, `telefone`, `telefone_familiar`, `dataNascimento`, `dataCadastro`, `endereco`) VALUES
(1, 'SUPORTE', NULL, NULL, NULL, NULL, '0', NULL, '2025-01-13 12:41:34', NULL);
CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `idPessoa` int(11) DEFAULT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo_usuario` enum('admin','funcionario') DEFAULT NULL,
  `fotoPerfil` varchar(255) DEFAULT NULL
);
INSERT INTO `usuarios` (`idUsuario`, `idPessoa`, `senha`, `tipo_usuario`, `fotoPerfil`) VALUES
(1, 1, '$2y$10$72Aun8rRTuTKjkcxGfjXSumJglXD4VmFXk55xiRldHFLzqPHtaVXa', 'admin', NULL);


ALTER TABLE `alunos`
  ADD PRIMARY KEY (`idAluno`),
  ADD KEY `idPessoa` (`idPessoa`);

--
-- Índices para tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD PRIMARY KEY (`idPagamento`),
  ADD KEY `idAluno` (`idAluno`);

--
-- Índices para tabela `pessoas`
--
ALTER TABLE `pessoas`
  ADD PRIMARY KEY (`idPessoa`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idPessoa` (`idPessoa`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `idAluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  MODIFY `idPagamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pessoas`
--
ALTER TABLE `pessoas`
  MODIFY `idPessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `alunos`
--
ALTER TABLE `alunos`
  ADD CONSTRAINT `alunos_ibfk_1` FOREIGN KEY (`idPessoa`) REFERENCES `pessoas` (`idPessoa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD CONSTRAINT `pagamentos_ibfk_1` FOREIGN KEY (`idAluno`) REFERENCES `alunos` (`idAluno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idPessoa`) REFERENCES `pessoas` (`idPessoa`) ON DELETE CASCADE ON UPDATE CASCADE;
