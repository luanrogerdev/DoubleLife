-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01/12/2024 às 18:46
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `doublelife`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `assinaturas`
--

CREATE TABLE `assinaturas` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_plano` int(11) NOT NULL,
  `dt_inicio` date NOT NULL,
  `dt_exp` date NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `assinaturas`
--

INSERT INTO `assinaturas` (`id`, `id_usuario`, `id_plano`, `dt_inicio`, `dt_exp`, `status`) VALUES
(18, 1, 1, '2022-10-18', '2022-11-17', 'expirada'),
(19, 1, 1, '2022-10-18', '2022-11-17', 'expirada'),
(20, 1, 1, '2022-10-18', '2022-11-17', 'expirada'),
(31, 57, 3, '2022-10-21', '2023-10-21', 'expirado'),
(48, 47, 3, '2022-10-26', '2023-10-26', 'pago'),
(51, 46, 1, '2022-10-28', '2022-11-27', 'pago');

-- --------------------------------------------------------

--
-- Estrutura para tabela `consultas`
--

CREATE TABLE `consultas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(40) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `data` datetime DEFAULT NULL,
  `id_medico` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_laudo` int(11) DEFAULT 0,
  `color` varchar(30) NOT NULL DEFAULT 'azul',
  `status` varchar(30) NOT NULL DEFAULT 'agendada'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `consultas`
--

INSERT INTO `consultas` (`id`, `titulo`, `descricao`, `data`, `id_medico`, `id_usuario`, `id_laudo`, `color`, `status`) VALUES
(0, NULL, NULL, '2022-10-27 08:40:00', 56, 46, 43, 'azul', 'concluida'),
(72, NULL, NULL, '2022-10-26 15:20:00', 53, 46, 0, 'azul', 'concluida'),
(75, NULL, NULL, '2022-10-27 10:40:00', 63, 46, 0, 'azul', 'concluida'),
(76, NULL, NULL, '2022-10-28 10:00:00', 63, 46, 0, 'azul', 'concluida'),
(77, NULL, NULL, '2022-10-27 13:20:00', 54, 46, 0, 'azul', 'concluida'),
(78, NULL, NULL, '2022-10-27 12:00:00', 56, 46, 45, 'azul', 'concluida'),
(80, NULL, NULL, '2022-10-28 10:40:00', 65, 46, 0, 'azul', 'concluida'),
(82, NULL, NULL, '2022-10-28 17:20:00', 65, 46, 0, 'azul', 'concluida');

-- --------------------------------------------------------

--
-- Estrutura para tabela `contato`
--

CREATE TABLE `contato` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `assunto` varchar(30) NOT NULL,
  `mensagem` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `contato`
--

INSERT INTO `contato` (`id`, `nome`, `email`, `assunto`, `mensagem`) VALUES
(24, 'admin', 'aaaaaa@aaaaaaa', 'aaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaa'),
(31, 'a', 'diegotassoneto@hotmail.com', 'sei lá ', 'sssssssss'),
(36, 'aaaaaaa', 'aaaaaaaaa@aaaaaaa', 'aaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaa');

-- --------------------------------------------------------

--
-- Estrutura para tabela `eventos`
--

CREATE TABLE `eventos` (
  `title` varchar(40) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `color` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `eventos`
--

INSERT INTO `eventos` (`title`, `description`, `start`, `end`, `color`, `usuario_id`) VALUES
('Evento', 'Evento marcado por Felipe', '2022-09-08', '2022-09-08', 'blue', 6);

-- --------------------------------------------------------

--
-- Estrutura para tabela `laudos`
--

CREATE TABLE `laudos` (
  `id` int(11) NOT NULL,
  `titulo` tinytext NOT NULL,
  `texto` text NOT NULL,
  `data` datetime DEFAULT NULL,
  `id_consulta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `laudos`
--

INSERT INTO `laudos` (`id`, `titulo`, `texto`, `data`, `id_consulta`) VALUES
(43, 'dadasjdawdiowa', 'dsadsadawdwds', '2022-10-26 08:41:00', 73),
(44, 'dadasjdawdiowa', 'dsadsadawdwds', '2022-10-26 08:42:00', 73),
(45, 'Laudo Emitido ', 'O homem se demonstrou doente.', '2022-10-27 11:43:00', 78);

-- --------------------------------------------------------

--
-- Estrutura para tabela `permissoes`
--

CREATE TABLE `permissoes` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `plano`
--

CREATE TABLE `plano` (
  `ID_plano` int(11) NOT NULL,
  `Nome_plano` varchar(50) NOT NULL,
  `Preco` double NOT NULL,
  `descricao` text DEFAULT NULL,
  `limite_consultas` int(11) DEFAULT NULL,
  `suporte_prioritario` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `plano`
--

INSERT INTO `plano` (`ID_plano`, `Nome_plano`, `Preco`, `descricao`, `limite_consultas`, `suporte_prioritario`) VALUES
(1, 'Mensal', 200, NULL, NULL, 0),
(2, 'Semestral', 1000, NULL, NULL, 0),
(3, 'Anual', 1800, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(75) NOT NULL,
  `senha` text NOT NULL,
  `cpf` text DEFAULT NULL,
  `cep` text DEFAULT NULL,
  `telefone` text DEFAULT NULL,
  `endereco` varchar(40) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `especialidade` varchar(30) DEFAULT NULL,
  `data_entrada` date DEFAULT NULL,
  `faculdade` varchar(10) DEFAULT NULL,
  `consulta` int(2) DEFAULT NULL,
  `tipo` varchar(10) NOT NULL DEFAULT 'c',
  `status` varchar(30) NOT NULL DEFAULT 'ativo',
  `pfp` varchar(100) DEFAULT NULL,
  `id_permissao` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `cpf`, `cep`, `telefone`, `endereco`, `data_nascimento`, `especialidade`, `data_entrada`, `faculdade`, `consulta`, `tipo`, `status`, `pfp`, `id_permissao`) VALUES
(11, 'Ana', 'aaa@aaa', '546', '2342412', '1324324', '143242341', '1432412', NULL, NULL, NULL, NULL, NULL, 'a', 'ativo', NULL, NULL),
(18, 'Lucas Castelano', 'sss@sss', '', '', '', '', '', NULL, 'Cardiologia', '2022-10-19', 'UFRJ', 0, 'm', 'ativo', '../imagens/pfp/lucas.jpg', NULL),
(46, 'Felipe', 'gamesf130@gmail.com', '$2y$10$l.tw0zk/ayzN9WnTeN3ih.V307enpqxTtESbzI9CPzbFDCioj5Ooi', '177.228.277-42', '20770245', '985478616', 'dasdawds', '2000-02-23', NULL, NULL, NULL, NULL, 'c', 'ativo', NULL, NULL),
(41, 'Diego ✤', 'diego@hotmail.com', '$2y$10$IfydgyWZuXN0xc7ycL4soeWSNNwoZrQQczLU2L4F7IeL7kffiniTm', '254.321.111-21', '32121-333', '99504-1885', 'Rua gomez', NULL, NULL, NULL, NULL, NULL, 'a', 'ativo', NULL, NULL),
(47, 'Diego', 'dtf@gmail.com', '$2y$10$OL7Y.O2MycWvwDwDyMUGPu6dPjGKAQrmFRQOv3qwKarQR.ugQ9J5G', '122.002.333-43', '18381398', '212121212', 'Rua gomez AA', '2005-03-04', NULL, NULL, NULL, NULL, 'a', 'ativo', NULL, NULL),
(69, 'Felipe Martins', 'fff@fff', '$2y$10$2oAFQ.EGwy3DK4BPju2nP.tEEwuAVdx3LxWK/ffqsc5lfxAxBpRUK', NULL, NULL, NULL, NULL, NULL, 'Cardiologia', '2005-02-22', 'UVA', 0, 'm', 'ativo', '../imagens/pfp/felipe1.jpg', NULL),
(56, 'Luan Roger', 'jas@gmail.com', '$2y$10$0vQWLgT9d7bpHli/nDxFYekh.xOmIEMxWMbpEh1sKiFzhcoRdfz2i', NULL, NULL, NULL, NULL, NULL, 'Psiquiatria', '1986-12-12', 'UFRJ', 0, 'm', 'ativo', '../imagens/pfp/luan.jpg\r\n', NULL),
(72, 'Gabriel Tavares', 'gpl@gmail.c1om', '$2y$10$yTHqzKqMWhlJQG2C/POqn.4.ziURq8heESnibqyGaA6loTDJBdsx6', NULL, NULL, NULL, NULL, NULL, 'Pediatria', '1999-02-22', 'Double Lif', 0, 'm', 'ativo', '../imagens/pfp/gpl.png', NULL),
(73, 'Ana Eduarda', 'anaa@gmail.com', '$2y$10$SLnsQygMaX7n86.y8pXRquiCLqNdqByGqUnQ2Wpi.IRLmH5MGs3ti', NULL, NULL, NULL, NULL, NULL, 'Psiquiatria', '2009-02-22', 'Puc-RJ', 0, 'm', 'ativo', '../imagens/pfp/Ana.png', NULL),
(65, 'Diego Tasso', 'diegotassoneto@hotmail.com', '$2y$10$FuY0yIEAcf.w9W3ivjiy3.P0rPK4AGfv30AZ9O.hVNRriv8/kh3NO', NULL, NULL, NULL, NULL, NULL, 'Ortopedia', '2022-10-13', 'UERJ', 0, 'm', 'ativo', '../imagens/pfp/Diego.jpg', NULL),
(67, 'Isabel Marinho', 'isabelms@gmail.com', '$2y$10$Xd6NbB1tohCi/Y86ILZbv.HJKhx5KWtwAwwR/JDfC2B4VU7lyyKby', NULL, NULL, NULL, NULL, NULL, 'Cardiologia', '2005-08-22', 'UNI-RIO', 0, 'm', 'ativo', '../imagens/pfp/Isabel.jpg', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `assinaturas`
--
ALTER TABLE `assinaturas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`usuario_id`);

--
-- Índices de tabela `laudos`
--
ALTER TABLE `laudos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `permissoes`
--
ALTER TABLE `permissoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `plano`
--
ALTER TABLE `plano`
  ADD PRIMARY KEY (`ID_plano`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_usuarios_permissoes` (`id_permissao`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `assinaturas`
--
ALTER TABLE `assinaturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de tabela `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT de tabela `contato`
--
ALTER TABLE `contato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de tabela `eventos`
--
ALTER TABLE `eventos`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `laudos`
--
ALTER TABLE `laudos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de tabela `permissoes`
--
ALTER TABLE `permissoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `plano`
--
ALTER TABLE `plano`
  MODIFY `ID_plano` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
