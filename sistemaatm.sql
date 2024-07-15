-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Maio-2022 às 17:39
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistemaatm`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(230) NOT NULL,
  `idade` int(11) NOT NULL,
  `saldo` int(11) NOT NULL,
  `nacionalidade` varchar(230) NOT NULL,
  `id_us` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `idade`, `saldo`, `nacionalidade`, `id_us`) VALUES
(1, 'Helder Mucondo', 21, 27610, 'mocambicana', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimentos`
--

CREATE TABLE `movimentos` (
  `id` int(11) NOT NULL,
  `descricao` varchar(230) NOT NULL,
  `valor` int(11) NOT NULL,
  `data` date NOT NULL,
  `id_us` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `movimentos`
--

INSERT INTO `movimentos` (`id`, `descricao`, `valor`, `data`, `id_us`) VALUES
(1, 'efectuou ', 50, '2022-05-18', 1),
(2, 'efectuou ', 50, '2022-05-18', 1),
(3, 'efectuou ', 50, '2022-05-18', 1),
(4, 'efectuou ', 50, '2022-05-18', 1),
(5, 'efectuou o levantamento', 50, '2022-05-18', 1),
(6, 'efectuou o levantamento', 50, '2022-05-18', 1),
(7, 'efectuou o levantamento', 200, '2022-05-18', 1),
(8, 'efectuou o levantamento', 200, '2022-05-18', 1),
(9, 'efectuou compra de credelec', 100, '2022-05-18', 1),
(10, 'efectuou compra de credelec', 100, '2022-05-18', 1),
(11, 'efectuou compra de credelec', 100, '2022-05-18', 1),
(12, 'efectuou compra de credito', 100, '2022-05-18', 1),
(13, 'efectuou o levantamento', 1000, '2022-05-18', 1),
(14, 'efectuou o levantamento', 1000, '2022-05-18', 1),
(15, 'efectuou o levantamento', 1000, '2022-05-18', 1),
(16, 'efectuou o levantamento', 50, '2022-05-18', 1),
(17, 'efectuou o levantamento', 50, '2022-05-18', 1),
(18, 'efectuou o levantamento', 50, '2022-05-18', 1),
(19, 'efectuou compra de credito', 200, '2022-05-18', 1),
(20, 'efectuou uma compra de credelec', 50, '2022-05-18', 1),
(21, 'efectuou uma compra de credelec', 50, '2022-05-18', 1),
(22, 'efectuou uma compra de credito', 0, '2022-05-19', 1),
(23, 'efectuou uma compra de credito', 100, '2022-05-19', 1),
(24, 'efectuou uma compra de credito', 0, '2022-05-19', 1),
(25, 'efectuou uma compra de credito', 0, '2022-05-19', 1),
(26, 'efectuou uma compra de credito', 0, '2022-05-19', 1),
(27, 'efectuou uma compra de credito', 100, '2022-05-19', 1),
(28, 'efectuou uma compra de credito', 400, '2022-05-19', 1),
(29, 'efectuou uma compra de credito', 100, '2022-05-19', 1),
(30, 'efectuou uma compra de credito', 300, '2022-05-19', 1),
(31, 'efectuou uma compra de credito', 300, '2022-05-19', 1),
(32, 'efectuou uma compra de credito', 300, '2022-05-19', 1),
(33, 'efectuou uma compra de credito', 500, '2022-05-19', 1),
(34, 'efectuou uma compra de credelec', 200, '2022-05-19', 1),
(35, 'efectuou um levantamento', 50, '2022-05-19', 1),
(36, 'efectuou um levantamento', 50, '2022-05-19', 1),
(37, 'efectuou o levantamento', 5000, '2022-05-19', 1),
(38, 'efectuou o levantamento', 100, '2022-05-19', 1),
(39, 'efectuou um levantamento', 50, '2022-05-19', 1),
(40, 'efectuou um levantamento', 50, '2022-05-19', 1),
(41, 'efectuou um levantamento', 50, '2022-05-19', 1),
(42, 'efectuou uma compra de credelec', 50, '2022-05-20', 1),
(43, 'efectuou uma compra de credelec', 100, '2022-05-20', 1),
(44, 'efectuou uma compra de credelec', 100, '2022-05-20', 1),
(45, 'efectuou uma compra de credelec', 100, '2022-05-20', 1),
(46, 'efectuou uma compra de credito', 100, '2022-05-20', 1),
(47, 'efectuou uma compra de credito', 100, '2022-05-20', 1),
(48, 'efectuou uma compra de credito', 100, '2022-05-20', 1),
(49, 'efectuou uma compra de credelec', 100, '2022-05-20', 1),
(50, 'efectuou uma compra de credelec', 200, '2022-05-20', 1),
(51, 'efectuou uma compra de credelec', 100, '2022-05-20', 1),
(52, 'efectuou uma compra de credelec', 100, '2022-05-20', 1),
(53, 'efectuou uma compra de credelec', 100, '2022-05-20', 1),
(54, 'efectuou uma compra de credelec', 0, '2022-05-20', 1),
(55, 'efectuou uma compra de credelec', 0, '2022-05-20', 1),
(56, 'efectuou uma compra de credelec', 100, '2022-05-20', 1),
(57, 'efectuou uma compra de credelec', 100, '2022-05-20', 1),
(58, 'efectuou uma compra de credelec', 100, '2022-05-20', 1),
(59, 'efectuou uma compra de credelec', 100, '2022-05-20', 1),
(60, 'efectuou uma compra de credito', 100, '2022-05-20', 1),
(61, 'efectuou uma compra de credito', 100, '2022-05-20', 1),
(62, 'efectuou uma compra de credito', 150, '2022-05-20', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `numeroConta` int(10) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `tentativas` int(11) NOT NULL,
  `tempo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `numeroConta`, `senha`, `tentativas`, `tempo`) VALUES
(1, 15151515, '25d55ad283aa400af464c76d713c07ad', 3, 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_us` (`id_us`);

--
-- Índices para tabela `movimentos`
--
ALTER TABLE `movimentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_us` (`id_us`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `movimentos`
--
ALTER TABLE `movimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id_us`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `movimentos`
--
ALTER TABLE `movimentos`
  ADD CONSTRAINT `movimentos_ibfk_1` FOREIGN KEY (`id_us`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
