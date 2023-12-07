-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/12/2023 às 19:15
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tccbd`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `horario_escolar`
--

CREATE TABLE `horario_escolar` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `dia_da_semana` varchar(20) NOT NULL,
  `horario_inicio` time NOT NULL,
  `horario_fim` time NOT NULL,
  `materia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `lembretes`
--

CREATE TABLE `lembretes` (
  `lembrete_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `Titulo` varchar(220) NOT NULL,
  `Conteudo` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `sits_usuario`
--

CREATE TABLE `sits_usuario` (
  `sit_id` int(11) NOT NULL,
  `nome_sit` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `sits_usuario`
--

INSERT INTO `sits_usuario` (`sit_id`, `nome_sit`) VALUES
(1, 'Ativo'),
(2, 'Inativo'),
(3, 'Aguardando');

-- --------------------------------------------------------

--
-- Estrutura para tabela `trabalhos`
--

CREATE TABLE `trabalhos` (
  `trabalho_id` int(11) NOT NULL,
  `Titulo` varchar(200) NOT NULL,
  `DataEntrega` datetime NOT NULL,
  `Materia` varchar(200) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `chave` varchar(220) DEFAULT NULL,
  `sits_usuario_id` int(11) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `horario_escolar`
--
ALTER TABLE `horario_escolar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices de tabela `lembretes`
--
ALTER TABLE `lembretes`
  ADD PRIMARY KEY (`lembrete_id`),
  ADD KEY `a` (`usuario_id`);

--
-- Índices de tabela `sits_usuario`
--
ALTER TABLE `sits_usuario`
  ADD PRIMARY KEY (`sit_id`);

--
-- Índices de tabela `trabalhos`
--
ALTER TABLE `trabalhos`
  ADD PRIMARY KEY (`trabalho_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `horario_escolar`
--
ALTER TABLE `horario_escolar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `lembretes`
--
ALTER TABLE `lembretes`
  MODIFY `lembrete_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `sits_usuario`
--
ALTER TABLE `sits_usuario`
  MODIFY `sit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `trabalhos`
--
ALTER TABLE `trabalhos`
  MODIFY `trabalho_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `horario_escolar`
--
ALTER TABLE `horario_escolar`
  ADD CONSTRAINT `horario_escolar_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`);

--
-- Restrições para tabelas `lembretes`
--
ALTER TABLE `lembretes`
  ADD CONSTRAINT `a` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`);

--
-- Restrições para tabelas `trabalhos`
--
ALTER TABLE `trabalhos`
  ADD CONSTRAINT `trabalhos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
