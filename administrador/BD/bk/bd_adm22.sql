-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 22-Nov-2023 às 18:11
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
  `senha` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `bairro` varchar(200) NOT NULL,
  `rua` varchar(200) NOT NULL,
  `numero` varchar(200) NOT NULL,
  `tipo` int NOT NULL,
  `situacao` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tbl_cadastro`
--

INSERT INTO `tbl_cadastro` (`id`, `nome`, `sobrenome`, `email`, `senha`, `bairro`, `rua`, `numero`, `tipo`, `situacao`) VALUES
(2, 'Kauã', 'Venezia', 'kaua@gmail.com', '$2y$10$BaWUqEX4LifNav/1V8jygua.bbuWabv5xTsQjtFXJi3dyqb3DEADa', 'bairrolivre', 'rualivre', '12', 0, ''),
(3, 'a', 'a', 'a@gmail.com', '$2y$10$FNm9Hy1IHlnnGOBAb05bBunc6nD2HVOxq1.hXSODtVUGyk1di6vVi', 'a', 'a', '1', 0, ''),
(4, 'Joao', 'marcos', 'joaowalker2112@gmail.com', '$2y$10$ub0ROVWQpTy4p935/bifW.iSf80dD/zT2QBGY.wMyqw0yyS5w2R26', 'Buenos AIres', 'Torindo Perocco ', '192', 0, ''),
(5, 'a', 'a', 'a@gmail.com', '$2y$10$gsMbeA/TeRVrVQpu0GmHleKGvp8OlnFxWxsVdnlpf7A/8F/emKHca', 'aa', 'aaa', '12', 0, ''),
(6, 'Kauã', 'Venezia', 'kauayago111@gmail.com', '$2y$10$2d.9ptXyRO0Ue.I8kdbYIe/SxpaLTy1lzOBJtlbuTudU22de2f.uC', 'Domingo de Syllos', 'Roque Pelegrini', '507', 0, ''),
(7, 'Kaua', 'nasd', 'kaa@gmail.com', '$2y$10$moSOWoNqV.kVCOmX.Kum9eTj8rcKssoy/510C4CPap2DJYRQiemMu', 'bairro', 'rua', '12', 0, ''),
(8, 'Mateus', 'mateus', 'mateus@gmail.com', '$2y$10$8xjBhlMm.MwxYJ/Ja8LR/O3HLj5ehKerRNKuTyHg3PvMMJTd3pq8O', 'bairro', 'rua', '12', 0, ''),
(12, 'kaua', '', 'kaua.bertolini@etec.sp.gov.br', '$2y$10$1XoGtpHUDRCV5HG/rmkHOebPwylGG2NPCmYuV2e2uKT/pal5jskI2', '', '', '', 1, ''),
(13, 'Joao Marcos ', 'Moreira de Paula', 'joaowalker2112@gmail.com', '$2y$10$1gtCIaaNsQDKnn1/8NqQce1PuxT9V6EZs4J5NJL/n2YuPVnG.lFYu', 'Bostero', 'Rua Torindo Perocco ', '192', 0, ''),
(14, 'Pablo Nogueira Benedito', '', 'pablo.benedito@etec.sp.gov.br', '$2y$10$9nNr9it6T1P3I/gHdFMogONnzMLuIO48Dm0xuD1nxQ.RCwcWExAA6', '', '', '', 1, '');

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tbl_cardapio`
--

INSERT INTO `tbl_cardapio` (`id`, `ctgcardapio`, `imagem`, `idcategoria`) VALUES
(8, 'Lanches', 'img/imagem_25-10-2023_14-19-59_415033459.png', 'Pão De Forma'),
(9, 'Lanches', 'img/imagem_08-11-2023_17-35-13_3007820328.png', 'Bauru');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_carrinho`
--

DROP TABLE IF EXISTS `tbl_carrinho`;
CREATE TABLE IF NOT EXISTS `tbl_carrinho` (
  `idcarrinho` int NOT NULL AUTO_INCREMENT,
  `produto` int NOT NULL,
  `nome_produto` varchar(500) NOT NULL,
  `desc_produto` varchar(1000) NOT NULL,
  `qtd_produto` int NOT NULL,
  `valor_produto` int NOT NULL,
  `pagamento` varchar(80) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `num_telefone` varchar(15) NOT NULL,
  PRIMARY KEY (`idcarrinho`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tbl_categoria`
--

INSERT INTO `tbl_categoria` (`idcat`, `categoria`, `arquivo`) VALUES
(3, 'Lanches', 0),
(4, 'Bebidas', 0),
(9, 'Porções', 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tbl_produtos`
--

INSERT INTO `tbl_produtos` (`id`, `categoria`, `descricao`, `preco`, `produtoimg`, `produto`) VALUES
(26, 'Lanches', 'Hambúrguer, queijo, maionese, tomate, alface, presunto, ovo e bacon', 'R$ 21,00', 'imgs/lanche.png', 'X-TUDO'),
(25, 'Lanches', 'Hambúrguer, queijo, maionese, tomate, alface e catupiry', 'R$ 17,00', 'imgs/lanche.png', ' X-CATUPIRY'),
(23, 'Lanches', 'Hambúrguer, queijo, maionese, tomate, alface e bacon', 'R$ 17,00', 'imgs/lanche.png', 'X-BACON'),
(22, 'Lanches', 'Hambúrguer, queijo e maionese', 'R$ 12,00	', 'imgs/lanche.png', 'X-BURGUER'),
(24, 'Lanches', 'Hambúrguer, queijo, maionese, tomate, alface e presunto', 'R$ 15,00', 'imgs/lanche.png', 'X-SALADÃO'),
(27, 'Lanches', '2 Hambúrguer, queijo, maionese, tomate, alface', 'R$ 20,00', 'imgs/lanche.png', ' BAURU BURGUER'),
(28, 'Lanches', 'Hambúrguer, queijo, maionese, tomate, alface, milho, ovo, presunto e bacon no pão francês grande', 'R$ 35,00', 'imgs/lanche.png', ' BAURUZÃO BURGUER TUDO'),
(29, 'Lanches', 'Hambúrguer, queijo, maionese, tomate e alface', 'R$ 13,00', 'imgs/lanche.png', 'X-SALADA'),
(30, 'Lanches', 'Hambúrguer, queijo, maionese, tomate, alface e milho', '  R$ 15,00', 'imgs/lanche.png', ' X-MILHO'),
(31, 'Lanches', 'Hambúrguer, queijo, maionese, tomate, alface e ovo  ', 'R$ 15,00', 'imgs/lanche.png', 'X-EGG'),
(32, 'Lanches', 'Hambúrguer, queijo, maionese, tomate, alface ovo e presunto  ', 'R$ 19,00', 'imgs/lanche.png', 'X-AMERICANO'),
(33, 'Lanches', 'Hambúrguer, queijo, maionese, tomate, alface, milho e catupiry  ', 'R$ 19,00', 'imgs/lanche.png', 'X-ESPECIAL'),
(34, 'Lanches', 'Hambúrguer, queijo, maionese, tomate, alface no pão francês grande com DIREITO A 1 INGREDIENTE GRATIS', 'R$ 27,00', 'imgs/lanche.png', ' BAURUZÃO BURGUER'),
(35, 'Porções', '', 'R$ 21,00', 'imgs/lanche.png', 'BATATA FRITA MEDIA'),
(36, 'Porções', '', 'R$ 27,00', 'imgs/lanche.png', 'BATATA FRITA GRANDE '),
(37, 'Porções', '', 'R$ 33,00', 'imgs/lanche.png', 'BATATA FRITA COM CATUPIRY '),
(38, 'Porções', '', 'R$ 28,00', 'imgs/lanche.png', ' QUEIJO FRITO MÉDIA '),
(39, 'Porções', 'COM TOMATE E ACEBOLADA  ', 'R$ 43,00', 'imgs/lanche.png', 'CONTRA-FILÉ MEDIA '),
(40, 'Porções', ' COM TOMATE E ACEBOLADA ', ' R$ 38,00', 'imgs/lanche.png', 'LOMBO MÉDIA'),
(41, 'Porções', 'COM TOMATE E ACEBOLADA ', ' R$ 38,00', 'imgs/lanche.png', 'FRANGO MÉDIA '),
(42, 'Porções', '', 'R$ 7,00', 'imgs/lanche.png', 'BATATA FRITA INDIVIDUAL '),
(43, 'Porções', '', 'R$ 33,00', 'imgs/lanche.png', 'BATATA FRITA COM CHEDDAR '),
(44, 'Porções', '', ' R$ 28,00', 'imgs/lanche.png', 'BATATA FRITA COM QUEIJO'),
(45, 'Lanches', '', 'R$ 39,00', 'imgs/lanche.png', 'QUEIJO FRITO GRANDE '),
(48, 'Bebidas', 'Lata 350ml', 'R$ 6,50', 'imgs/skol.png', 'SKOL'),
(47, 'Bebidas', 'Lata 350ml  x', 'R$ 6,50', 'imgs/brahma.png', 'BRAHMA SEM ÁLCOOL '),
(49, 'Bebidas', 'Lata 350ml  ', 'R$ 6,50', 'imgs/antarctica.png', 'ANTÁRCTICA ');

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tbl_promocao`
--

INSERT INTO `tbl_promocao` (`idpromo`, `nomeproduto`, `categoria`, `arquivo`) VALUES
(1, 'Semanal', '', 'imagens/imagem_04-10-2023_14-46-55_5825260102.jpg'),
(2, 'aa', '', 'imagens/imagem_08-10-2023_23-12-47_8725597138.png'),
(3, 'A', '', 'imagens/imagem_25-10-2023_14-33-16_7865778225.png'),
(4, 'a av', '', 'imagens/imagem_25-10-2023_14-34-01_4984765950.png'),
(5, 'Pão com 12', '', 'imagens/imagem_25-10-2023_14-34-28_3900877337.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
