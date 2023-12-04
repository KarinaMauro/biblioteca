-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Dez-2023 às 18:27
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `crud-biblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro`
--

CREATE TABLE `cadastro` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(100) NOT NULL,
  `telefone` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `cadastro`
--

INSERT INTO `cadastro` (`id`, `nome`, `cpf`, `telefone`, `senha`, `criado_em`) VALUES
(1, 's', 's', 's', 's', '2023-11-17 13:06:50'),
(2, 'teste', 'qas', 'as', 'as', '2023-11-17 13:07:19'),
(3, 'a', 'A', 'a', 'as', '2023-11-17 13:08:43'),
(4, 'ajbsab', 'sjasa', 'a', 'a', '2023-11-17 13:22:52'),
(5, 'r', 'r', 'r', 'r', '2023-11-17 13:23:52'),
(6, 'w ', 'w', 'w', 'w', '2023-11-17 13:26:13'),
(7, 'h', 'gggg', 'hhh', 'h', '2023-11-17 13:27:28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `msg` varchar(225) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `entrar`
--

CREATE TABLE `entrar` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `entrar`
--

INSERT INTO `entrar` (`id`, `nome`, `senha`, `criado_em`) VALUES
(1, 'nome', '123', '2023-11-17 14:30:33');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fantasia`
--

CREATE TABLE `fantasia` (
  `id` int(11) NOT NULL,
  `livro` varchar(255) NOT NULL,
  `dreserva` int(100) NOT NULL,
  `vreserva` int(100) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `fantasia`
--

INSERT INTO `fantasia` (`id`, `livro`, `dreserva`, `vreserva`, `criado_em`) VALUES
(6, '0', 2222, 12, '2023-11-27 12:17:23'),
(7, '0', 2022, 2, '2023-11-27 12:22:09'),
(8, '0', 2020, 12, '2023-11-27 12:41:11'),
(9, 'livro', 2020, 12, '2023-11-27 12:42:16'),
(10, 'livro', 2002, 13, '2023-11-27 12:42:27'),
(11, '', 2002, 13, '2023-11-27 12:47:55'),
(12, 'Biblioteca da Meia-Noite', 1011, 12, '2023-11-27 12:52:51'),
(13, 'O Homem de Giz', 2222, 23, '2023-11-27 12:54:43'),
(14, 'As Crônicas de Nárnia', 9999, 9, '2023-11-27 12:58:33'),
(15, 'Amor & Gelato', 234, 9132, '2023-11-27 13:17:38'),
(16, 'O Ladrão de Raios', 1111, 1, '2023-11-27 13:26:51'),
(17, 'Corte de Espinhos e Rosas', 55555, 5, '2023-11-27 13:34:10'),
(18, 'Corte de Espinhos e Rosas', 275760, 55, '2023-11-27 13:34:35'),
(19, 'O Ladrão de Raios', 5, 5, '2023-11-27 13:35:57'),
(20, 'O gambito da rainha', 55555, 5, '2023-11-27 13:37:49');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cadastro`
--
ALTER TABLE `cadastro`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `entrar`
--
ALTER TABLE `entrar`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `fantasia`
--
ALTER TABLE `fantasia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastro`
--
ALTER TABLE `cadastro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `contato`
--
ALTER TABLE `contato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `entrar`
--
ALTER TABLE `entrar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `fantasia`
--
ALTER TABLE `fantasia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
