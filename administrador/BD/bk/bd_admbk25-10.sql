-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 20-Out-2023 às 18:04
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_adm`
--
CREATE DATABASE IF NOT EXISTS `bd_adm` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `bd_adm`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_cadastro`
--

DROP TABLE IF EXISTS `tbl_cadastro`;
CREATE TABLE IF NOT EXISTS `tbl_cadastro` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `sobrenome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `bairro` varchar(200) NOT NULL,
  `rua` varchar(200) NOT NULL,
  `numero` varchar(200) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `situacao` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tbl_cadastro`
--

INSERT INTO `tbl_cadastro` (`id`, `nome`, `sobrenome`, `email`, `senha`, `bairro`, `rua`, `numero`, `tipo`, `situacao`) VALUES
(1, 'a', 'a', 'a@gmail.com', '$2y$10$0WOcWeSUDmzVOiIR0IGSLOSe5dBIX1fUu.6aFuIXEMP6TtkT5eLIa', 'as', 'ra', '1', '', ''),
(2, 'Kauã', 'Venezia', 'kaua@gmail.com', '$2y$10$BaWUqEX4LifNav/1V8jygua.bbuWabv5xTsQjtFXJi3dyqb3DEADa', 'bairrolivre', 'rualivre', '12', '', ''),
(3, 'a', 'a', 'a@gmail.com', '$2y$10$FNm9Hy1IHlnnGOBAb05bBunc6nD2HVOxq1.hXSODtVUGyk1di6vVi', 'a', 'a', '1', '', ''),
(4, 'Joao', 'marcos', 'joaowalker2112@gmail.com', '$2y$10$ub0ROVWQpTy4p935/bifW.iSf80dD/zT2QBGY.wMyqw0yyS5w2R26', 'Buenos AIres', 'Torindo Perocco ', '192', '', ''),
(5, 'a', 'a', 'a@gmail.com', '$2y$10$gsMbeA/TeRVrVQpu0GmHleKGvp8OlnFxWxsVdnlpf7A/8F/emKHca', 'aa', 'aaa', '12', '', ''),
(6, 'Kauã', 'Venezia', 'kauayago111@gmail.com', '$2y$10$2d.9ptXyRO0Ue.I8kdbYIe/SxpaLTy1lzOBJtlbuTudU22de2f.uC', 'Domingo de Syllos', 'Roque Pelegrini', '507', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_cardapio`
--

DROP TABLE IF EXISTS `tbl_cardapio`;
CREATE TABLE IF NOT EXISTS `tbl_cardapio` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ctgcardapio` varchar(200) NOT NULL,
  `imagem` varchar(1000) NOT NULL,
  `idcategoria` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tbl_cardapio`
--

INSERT INTO `tbl_cardapio` (`id`, `ctgcardapio`, `imagem`, `idcategoria`) VALUES
(5, 'Bebidas', 'img/imagem_20-10-2023_13-56-48_3390204720.jpg', 'a a');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_categoria`
--

DROP TABLE IF EXISTS `tbl_categoria`;
CREATE TABLE IF NOT EXISTS `tbl_categoria` (
  `idcat` int NOT NULL AUTO_INCREMENT,
  `categoria` varchar(220) NOT NULL,
  `arquivo` int NOT NULL,
  PRIMARY KEY (`idcat`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tbl_categoria`
--

INSERT INTO `tbl_categoria` (`idcat`, `categoria`, `arquivo`) VALUES
(3, 'Lanches', 0),
(4, 'Bebidas', 0),
(5, 'porções', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_produtos`
--

DROP TABLE IF EXISTS `tbl_produtos`;
CREATE TABLE IF NOT EXISTS `tbl_produtos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `categoria` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `preco` varchar(200) NOT NULL,
  `produtoimg` varchar(200) NOT NULL,
  `produto` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tbl_produtos`
--

INSERT INTO `tbl_produtos` (`id`, `categoria`, `descricao`, `preco`, `produtoimg`, `produto`) VALUES
(8, 'cat3', 'Feito de Frango', '18.9', 'img/imagem_04-10-2023_14-46-20_1061783196.jpg', 'Bauru de Frango');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_promocao`
--

DROP TABLE IF EXISTS `tbl_promocao`;
CREATE TABLE IF NOT EXISTS `tbl_promocao` (
  `idpromo` int NOT NULL AUTO_INCREMENT,
  `nomeproduto` varchar(200) NOT NULL,
  `categoria` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `arquivo` varchar(200) NOT NULL,
  PRIMARY KEY (`idpromo`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tbl_promocao`
--

INSERT INTO `tbl_promocao` (`idpromo`, `nomeproduto`, `categoria`, `arquivo`) VALUES
(1, 'Semanal', '', 'imagens/imagem_04-10-2023_14-46-55_5825260102.jpg'),
(2, 'aa', '', 'imagens/imagem_08-10-2023_23-12-47_8725597138.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
