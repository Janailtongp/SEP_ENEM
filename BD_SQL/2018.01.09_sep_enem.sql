-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09-Jan-2018 às 15:41
-- Versão do servidor: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sep_enem`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alternativa`
--

CREATE TABLE IF NOT EXISTS `alternativa` (
`idAlternativa` int(10) NOT NULL,
  `Questao_idQuestao` int(10) NOT NULL,
  `descricao` text,
  `correta` int(2) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Estrutura da tabela `assunto`
--

CREATE TABLE IF NOT EXISTS `assunto` (
`IdAssunto` int(20) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `disciplina` int(2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;


--
-- Estrutura da tabela `prova`
--

CREATE TABLE IF NOT EXISTS `prova` (
`idProva` int(10) NOT NULL,
  `Simulado_idSimulado` int(10) unsigned NOT NULL,
  `usuario_idAdmin` int(10) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `assunto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;


--
-- Estrutura da tabela `questao`
--

CREATE TABLE IF NOT EXISTS `questao` (
`idQuestao` int(10) NOT NULL,
  `enunciado` text,
  `disciplina` varchar(255) DEFAULT NULL,
  `assunto` varchar(255) DEFAULT NULL,
  `nivel` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;


--
-- Estrutura da tabela `questao_prova`
--

CREATE TABLE IF NOT EXISTS `questao_prova` (
  `Questao_idQuestao` int(10) NOT NULL,
  `Prova_idProva` int(10) NOT NULL,
  `Prova_Simulado_idSimulado` int(10) unsigned NOT NULL,
  `Prova_usuario_idAdmin` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `simulado`
--

CREATE TABLE IF NOT EXISTS `simulado` (
`idSimulado` int(10) unsigned NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `data_` varchar(12) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;


--
-- Estrutura da tabela `simulado_prova`
--

CREATE TABLE IF NOT EXISTS `simulado_prova` (
  `id_simulado` int(20) NOT NULL,
  `id_prova` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`idAdmin` int(10) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `nivel` int(10) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idAdmin`, `nome`, `email`, `senha`, `nivel`) VALUES
(1, 'Janailton', 'admin', '123', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternativa`
--
ALTER TABLE `alternativa`
 ADD PRIMARY KEY (`idAlternativa`,`Questao_idQuestao`), ADD KEY `Alternativa_FKIndex1` (`Questao_idQuestao`);

--
-- Indexes for table `assunto`
--
ALTER TABLE `assunto`
 ADD PRIMARY KEY (`IdAssunto`);

--
-- Indexes for table `prova`
--
ALTER TABLE `prova`
 ADD PRIMARY KEY (`idProva`,`Simulado_idSimulado`,`usuario_idAdmin`), ADD KEY `Prova_FKIndex1` (`Simulado_idSimulado`), ADD KEY `Prova_FKIndex2` (`usuario_idAdmin`);

--
-- Indexes for table `questao`
--
ALTER TABLE `questao`
 ADD PRIMARY KEY (`idQuestao`);

--
-- Indexes for table `questao_prova`
--
ALTER TABLE `questao_prova`
 ADD PRIMARY KEY (`Questao_idQuestao`,`Prova_idProva`,`Prova_Simulado_idSimulado`,`Prova_usuario_idAdmin`), ADD KEY `Questao_has_Prova_FKIndex1` (`Questao_idQuestao`), ADD KEY `Questao_has_Prova_FKIndex2` (`Prova_idProva`,`Prova_Simulado_idSimulado`,`Prova_usuario_idAdmin`);

--
-- Indexes for table `simulado`
--
ALTER TABLE `simulado`
 ADD PRIMARY KEY (`idSimulado`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`idAdmin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternativa`
--
ALTER TABLE `alternativa`
MODIFY `idAlternativa` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `assunto`
--
ALTER TABLE `assunto`
MODIFY `IdAssunto` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `prova`
--
ALTER TABLE `prova`
MODIFY `idProva` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `questao`
--
ALTER TABLE `questao`
MODIFY `idQuestao` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `simulado`
--
ALTER TABLE `simulado`
MODIFY `idSimulado` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
MODIFY `idAdmin` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
