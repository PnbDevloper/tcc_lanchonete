-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 17-Out-2023 às 15:51
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tbl_cadastro`
--

INSERT INTO `tbl_cadastro` (`id`, `nome`, `sobrenome`, `email`, `senha`, `bairro`, `rua`, `numero`) VALUES
(1, 'a', 'a', 'a@gmail.com', '$2y$10$0WOcWeSUDmzVOiIR0IGSLOSe5dBIX1fUu.6aFuIXEMP6TtkT5eLIa', 'as', 'ra', '1'),
(2, 'Kauã', 'Venezia', 'kaua@gmail.com', '$2y$10$BaWUqEX4LifNav/1V8jygua.bbuWabv5xTsQjtFXJi3dyqb3DEADa', 'bairrolivre', 'rualivre', '12');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tbl_cardapio`
--

INSERT INTO `tbl_cardapio` (`id`, `ctgcardapio`, `imagem`, `idcategoria`) VALUES
(3, 'cat1', 'img/imagem_04-10-2023_14-18-48_4206657957.png', 'Lanche'),
(4, 'cat3', 'img/imagem_04-10-2023_14-19-21_314318517.jpg', 'bebida');

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
(5, 'porções', 0),
(6, 'a', 0);

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
