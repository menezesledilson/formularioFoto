-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 09-Abr-2022 às 19:59
-- Versão do servidor: 8.0.27
-- versão do PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `celke`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_usuario` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_usuario` varchar(220) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome_usuario`, `email_usuario`, `foto_usuario`, `created`, `modified`) VALUES
(1, 'Cesar', 'cesar@celke.com.br', 'celke.jpg', '2022-04-09 15:55:40', NULL),
(2, 'Cesar 2', 'cesar2@celke.com.br', 'celke.jpg', '2022-04-09 15:56:00', NULL),
(3, 'Cesar', 'cesar@celke.com.br', '', '2022-04-09 16:03:30', NULL),
(4, 'Cesar', 'cesar4@celke.com.br', 'celke.jpg', '2022-04-09 16:11:58', '2022-04-23 16:34:12'),
(5, 'Cesar5', 'cesar5@celke.com.br', 'capa_exemplo.jpg', '2022-04-09 16:38:45', NULL),
(6, 'Cesar 6', 'cesar6@celke.com.br', 'celke.jpg', '2022-04-09 16:56:25', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
