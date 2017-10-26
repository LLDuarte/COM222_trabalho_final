-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26-Out-2017 às 19:53
-- Versão do servidor: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vovoni`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `my_wines`
--

CREATE TABLE `my_wines` (
  `email_usuario` tinyint(4) NOT NULL,
  `review` varchar(200) DEFAULT NULL,
  `avaliacao` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `primeiro_nome` varchar(15) NOT NULL,
  `ultimo_nome` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vinho`
--

CREATE TABLE `vinho` (
  `rotulo` blob NOT NULL,
  `tipo_uva` enum('Cabernet Sauvignon','Merlot','Malbec','Carménère','Pinot Noir','Syrah','Tannat','Tempranillo','Chardonnay','Sauvignon Blanc','Blend') DEFAULT 'Cabernet Sauvignon',
  `tipo_vinho` enum('Tinto','Branco','Rosé') NOT NULL DEFAULT 'Tinto',
  `pais` varchar(20) DEFAULT NULL,
  `vinicola` varchar(30) DEFAULT NULL,
  `preco` decimal(10,0) DEFAULT NULL,
  `regiao` varchar(20) DEFAULT NULL,
  `estilo` varchar(20) DEFAULT NULL,
  `nome` varchar(50) NOT NULL,
  `comidas` varchar(40) DEFAULT NULL,
  `email_usuario` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `vinho`
--
ALTER TABLE `vinho`
  ADD PRIMARY KEY (`nome`,`tipo_vinho`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
