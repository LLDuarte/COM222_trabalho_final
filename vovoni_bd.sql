-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19-Nov-2017 às 19:03
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
-- Database: `vovoni_bd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `id` int(11) NOT NULL,
  `id_vinho` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `review` text,
  `data` datetime NOT NULL,
  `avaliacao` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `avaliacao`
--

INSERT INTO `avaliacao` (`id`, `id_vinho`, `id_usuario`, `review`, `data`, `avaliacao`) VALUES
(11, 22, 1, 'Excelente vinho.								\r\n										', '2017-11-17 19:34:36', 2.9),
(12, 22, 2, 'Ótimo custo benefício.								\r\n											', '2017-11-17 19:50:37', 1.7),
(13, 29, 1, 'Champanhe para o ano novo.								\r\n										', '2017-11-17 20:33:03', 2.5),
(14, 28, 1, 'Muito amargo.								\r\n										', '2017-11-16 21:20:03', 2.1),
(15, 21, 1, '								\r\n										', '2017-11-19 02:33:41', 1.3),
(16, 26, 1, 'O mais caro champanhe brasileiro.								\r\n										', '2017-11-19 12:51:26', 5),
(17, 24, 1, 'Amazing. One of the best wines I tasted lately. A blend of 50% Cabernet Sauvignon, 50% Carmenère, fermented in open tanks, then 18 months in new French oak barrels. 15% alcohol. Ripe dark fruits together with black pepper, chocolate, herbs. In mouth, tannins well present (too young), but not unpleasant at all, bell pepper discrete, cassis. Long long end. Outstanding wine, 4.5 in Vivino. Don\'t miss it.								\r\n										', '2017-11-19 13:47:04', 2.6),
(18, 30, 1, 'Saboroso								\r\n										', '2017-11-19 19:02:11', 2.8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `rotulo`
--

CREATE TABLE `rotulo` (
  `id` int(11) NOT NULL,
  `id_vinho` int(11) NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `rotulo`
--

INSERT INTO `rotulo` (`id`, `id_vinho`, `url`) VALUES
(13, 14, '8647f6c50b684c3b7753229583fe5731.jpeg'),
(18, 19, '9fbf06822ae018d41354d75e8465be6d.jpeg'),
(19, 15, '61151c0379ecbe12bb4a474a45196da9.jpeg'),
(20, 21, 'e4cdf56aa7bf7a2bf69f3a04d59cf2c0.jpeg'),
(21, 22, 'e71db6cc97ca914236ffb1f618bd5b89.jpeg'),
(22, 23, '798a61730c1e8ffcd729391eb8eb66a1.jpeg'),
(23, 24, '11b62e803ffa118278d8fed9021c4db4.jpeg'),
(24, 25, '46fba43d06d5d67125fe00cd8d9d120c.jpeg'),
(25, 26, 'ffbb9ee241b1978201e10111cd5bddc2.jpeg'),
(26, 27, '2eb31adc6680d59dbe6341588395649c.jpeg'),
(27, 28, '660de32f0c86075eeb7862091c994aea.jpeg'),
(28, 29, '73a90ddb57ad17969963661f2ceb5209.jpeg'),
(29, 30, 'e3596ad69a9085a219ac95c086b0374d.jpeg'),
(30, 31, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipovinho`
--

CREATE TABLE `tipovinho` (
  `nome` enum('Tinto','Branco','Rosé','Porto','Espumante','Sobremesa') NOT NULL DEFAULT 'Tinto',
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipovinho`
--

INSERT INTO `tipovinho` (`nome`, `id`) VALUES
('Tinto', 13),
('Tinto', 17),
('Tinto', 18),
('Tinto', 19),
('Tinto', 20),
('Tinto', 21),
('Tinto', 22),
('Branco', 23),
('Branco', 24),
('Espumante', 25),
('Rosé', 26),
('Rosé', 27),
('Espumante', 28),
('Tinto', 29),
('Rosé', 30);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `nome` varchar(15) NOT NULL,
  `sobrenome` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `id` int(11) NOT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`nome`, `sobrenome`, `email`, `senha`, `id`, `foto`) VALUES
('Victor ', 'Rodrigues da Silva', 'vitor1908@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 'b002df2f4e32d6acd0f177c45d537c8c.jpeg'),
('testador', 'mor', 't@gmail.com', '202cb962ac59075b964b07152d234b70', 2, '498ba4ac4f61327bc45703e8d2a17901.jpeg'),
('João Pedro ', 'Rodrigues', 'joao.9174@gmail.com', '2446eec2bfc17ca48862ff050bc669d7', 3, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vinho`
--

CREATE TABLE `vinho` (
  `tipo_uva` enum('Cabernet Sauvignon','Merlot','Malbec','Carménère','Pinot Noir','Syrah','Tannat','Tempranillo','Chardonnay','Sauvignon Blanc','Blend') DEFAULT 'Cabernet Sauvignon',
  `pais` varchar(20) DEFAULT NULL,
  `vinicola` varchar(30) DEFAULT NULL,
  `preco` double DEFAULT NULL,
  `regiao` varchar(20) DEFAULT NULL,
  `estilo` varchar(40) DEFAULT NULL,
  `comidas` enum('Peixes','Comida apimentada','Sobremesas doces','Aves','Aperitivos','Queijos','Massas','Porco','Comida vegetariana','Cordeiro','Carne','Comida japonesa') DEFAULT NULL,
  `nome` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_tipoVinho` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `vinho`
--

INSERT INTO `vinho` (`tipo_uva`, `pais`, `vinicola`, `preco`, `regiao`, `estilo`, `comidas`, `nome`, `id`, `id_usuario`, `id_tipoVinho`) VALUES
('Pinot Noir', 'Itália', 'Masi', 64, 'Delle Venezie', 'Meio Seco/Demi-Sec', 'Queijos', 'Masi Modello I.G.T. Delle Venezie ', 21, 1, 20),
('Pinot Noir', 'Itália', 'Masi', 64, 'Delle Venezie', 'Meio Seco/Demi-Sec', 'Queijos', 'Masi Modello I.G.T. Delle Venezie ', 22, 1, 21),
('Pinot Noir', 'Itália', 'Masi', 64, 'Delle Venezie', 'Meio Seco/Demi-Sec', 'Queijos', 'Masi Modello I.G.T. Delle Venezie ', 23, 1, 22),
('Pinot Noir', 'Itália', 'Masi', 64, 'Delle Venezie', 'Meio Seco/Demi-Sec', 'Queijos', 'Masi Modello I.G.T. Delle', 24, 1, 23),
('Pinot Noir', 'Itália', 'Masi', 64, 'Delle Venezie', 'Meio Seco/Demi-Sec', 'Queijos', 'Masi Modello I.G.T. Delle Venezie ', 25, 1, 24),
('Pinot Noir', 'Itália', 'Masi', 64, 'Delle Venezie', 'Meio Seco/Demi-Sec', 'Queijos', 'Masi Modello I.G.T. Delle Venezie ', 26, 1, 25),
('Pinot Noir', 'Itália', 'Masi', 64, 'Delle Venezie', 'Meio Seco/Demi-Sec', 'Queijos', 'Masi Modello I.G.T. Delle Venezie ', 27, 1, 26),
('Pinot Noir', 'Itália', 'Masi', 64, 'Delle Venezie', 'Meio Seco/Demi-Sec', 'Queijos', 'Masi Modello I.G.T. Delle Venezie ', 28, 1, 27),
('Pinot Noir', 'Itália', 'Masi', 64, 'Delle Venezie', 'Meio Seco/Demi-Sec', 'Queijos', 'Masi Modello I.G.T. Delle Venezie ', 29, 1, 28),
('Carménère', 'França', 'Fortant de France', 652, 'Languedoc', 'Suave', 'Aves', 'Fortant De France Reserve Des Grands Monts', 30, 2, 29);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_name` (`id_vinho`);

--
-- Indexes for table `rotulo`
--
ALTER TABLE `rotulo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_vinho` (`id_vinho`);

--
-- Indexes for table `tipovinho`
--
ALTER TABLE `tipovinho`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vinho`
--
ALTER TABLE `vinho`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `rotulo`
--
ALTER TABLE `rotulo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `tipovinho`
--
ALTER TABLE `tipovinho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `vinho`
--
ALTER TABLE `vinho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `fk_name` FOREIGN KEY (`id_vinho`) REFERENCES `vinho` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;