-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 25-Out-2023 às 20:46
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
