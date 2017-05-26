-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 26, 2017 at 12:43 PM
-- Server version: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 7.0.19-1+deb.sury.org~xenial+2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `efetivo`
--

-- --------------------------------------------------------

--
-- Table structure for table `especialidade`
--

CREATE TABLE `especialidade` (
  `id_esp` int(2) NOT NULL,
  `esp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `especialidade`
--

INSERT INTO `especialidade` (`id_esp`, `esp`) VALUES
(1, 'SIN'),
(2, 'SAD'),
(3, 'BET'),
(4, 'SDE'),
(5, 'AV'),
(6, 'INT'),
(7, 'INF'),
(8, 'PED'),
(9, 'SVA'),
(10, 'SVI'),
(11, 'N/P'),
(12, 'TAR'),
(13, 'BCT'),
(18, 'SJU'),
(19, 'BSP'),
(20, 'BCT'),
(21, 'CCO'),
(22, 'SEM'),
(23, 'SSG'),
(24, 'SGS'),
(25, 'PSC'),
(26, 'ANS'),
(27, 'BIB'),
(28, 'EST'),
(29, 'AQV'),
(30, 'BCO'),
(31, 'Esp Com '),
(32, 'REP'),
(33, 'BMA'),
(35, 'TAD'),
(36, 'AR'),
(37, 'ADM');

-- --------------------------------------------------------

--
-- Table structure for table `login_user`
--

CREATE TABLE `login_user` (
  `id` int(11) UNSIGNED NOT NULL,
  `nome_completo` varchar(50) NOT NULL,
  `nome_usuario` varchar(25) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `ativo` int(11) NOT NULL DEFAULT '0',
  `data_cadastro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_user`
--

NSERT INTO `militar` (`id_militar`, `id_post_grad`, `id_esp`, `id_quadro`, `id_secao`, `nome_completo`, `nome_guerra`, `situacao`, `ramal`, `rtcaer`, `data_nasc`, `data_ult_prom`, `email`, `saram`, `antiguidade_turma`, `ativo`) VALUES
(1, 14, 1, 5, 1, 'Ciclano de Tal', 'Ciclano', '1', '0123', NULL, '1925-03-24', '2015-11-26', 'ciclano@fab.mil.br', 1234567, 1, 1),
(2, 18, 7, 18, 1, 'Fulano de Tal', 'Tal', '1', '3210', NULL, '2014-01-24', '2015-01-30', 'fulandotal@gmail.com', 1234567, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `militar`
--

CREATE TABLE `militar` (
  `id_militar` int(3) NOT NULL,
  `id_post_grad` int(2) NOT NULL,
  `id_esp` int(2) NOT NULL,
  `id_quadro` int(2) NOT NULL,
  `id_secao` int(2) NOT NULL,
  `nome_completo` varchar(60) NOT NULL,
  `nome_guerra` varchar(40) NOT NULL,
  `situacao` varchar(4) NOT NULL,
  `ramal` varchar(10) NOT NULL,
  `rtcaer` int(4) DEFAULT NULL,
  `data_nasc` date NOT NULL,
  `data_ult_prom` date NOT NULL,
  `email` varchar(40) NOT NULL,
  `saram` int(7) DEFAULT NULL,
  `antiguidade_turma` int(1) DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Dumping data for table `militar`
--

INSERT INTO `login_user` (`id`, `nome_completo`, `nome_usuario`, `senha`, `email`, `ativo`, `data_cadastro`) VALUES
(1, 'Fulano de Tal', 'fulanoft', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'fulanoft@fab.mil.br', 1, '2017-05-26 00:00:00');

-- --------------------------------------------------------
--
-- Table structure for table `posto_grad`
--

CREATE TABLE `posto_grad` (
  `id_posto_grad` int(2) NOT NULL,
  `posto_grad` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posto_grad`
--

INSERT INTO `posto_grad` (`id_posto_grad`, `posto_grad`) VALUES
(1, 'TB'),
(2, 'MB'),
(3, 'BR'),
(4, 'CL'),
(5, 'TC'),
(6, 'MJ'),
(7, 'CP'),
(8, '1T'),
(9, '2T'),
(10, 'ASP'),
(11, 'SO'),
(12, '1S'),
(13, '2S'),
(14, '3S'),
(15, 'CB'),
(16, 'S1'),
(17, 'S2'),
(18, 'CV');

-- --------------------------------------------------------

--
-- Table structure for table `quadro`
--

CREATE TABLE `quadro` (
  `id_quadro` int(2) NOT NULL,
  `quadro` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quadro`
--

INSERT INTO `quadro` (`id_quadro`, `quadro`) VALUES
(1, 'QOAV'),
(2, 'QOINT'),
(3, 'QOAP'),
(4, 'QOCon'),
(5, 'QSS'),
(6, 'QOEA'),
(7, 'QOF'),
(8, 'N/P'),
(9, 'QOINF'),
(10, 'QTA'),
(11, 'QCOA'),
(12, 'QSCon'),
(13, 'QCB'),
(14, 'QSD'),
(15, 'QOESUP'),
(16, 'QESA'),
(17, 'QOECOM'),
(18, 'QFG');

-- --------------------------------------------------------

--
-- Table structure for table `secao`
--

CREATE TABLE `secao` (
  `id_secao` int(2) NOT NULL,
  `secao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `secao`
--

INSERT INTO `secao` (`id_secao`, `secao`) VALUES
(1, 'SEÇÃO1'),
(2, 'SEÇÃO2'),
(3, 'SEÇÃO3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `especialidade`
--
ALTER TABLE `especialidade`
  ADD PRIMARY KEY (`id_esp`);

--
-- Indexes for table `login_user`
--
ALTER TABLE `login_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`nome_usuario`);

--
-- Indexes for table `militar`
--
ALTER TABLE `militar`
  ADD PRIMARY KEY (`id_militar`),
  ADD KEY `id_post_grad` (`id_post_grad`),
  ADD KEY `id_esp` (`id_esp`),
  ADD KEY `id_quadro` (`id_quadro`),
  ADD KEY `id_secao` (`id_secao`);

--
-- Indexes for table `posto_grad`
--
ALTER TABLE `posto_grad`
  ADD PRIMARY KEY (`id_posto_grad`);

--
-- Indexes for table `quadro`
--
ALTER TABLE `quadro`
  ADD PRIMARY KEY (`id_quadro`);

--
-- Indexes for table `secao`
--
ALTER TABLE `secao`
  ADD PRIMARY KEY (`id_secao`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `especialidade`
--
ALTER TABLE `especialidade`
  MODIFY `id_esp` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `login_user`
--
ALTER TABLE `login_user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `militar`
--
ALTER TABLE `militar`
  MODIFY `id_militar` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;
--
-- AUTO_INCREMENT for table `posto_grad`
--
ALTER TABLE `posto_grad`
  MODIFY `id_posto_grad` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `quadro`
--
ALTER TABLE `quadro`
  MODIFY `id_quadro` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `secao`
--
ALTER TABLE `secao`
  MODIFY `id_secao` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `militar`
--
ALTER TABLE `militar`
  ADD CONSTRAINT `militar_ibfk_1` FOREIGN KEY (`id_post_grad`) REFERENCES `posto_grad` (`id_posto_grad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `militar_ibfk_2` FOREIGN KEY (`id_esp`) REFERENCES `especialidade` (`id_esp`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `militar_ibfk_3` FOREIGN KEY (`id_quadro`) REFERENCES `quadro` (`id_quadro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `militar_ibfk_4` FOREIGN KEY (`id_secao`) REFERENCES `secao` (`id_secao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
