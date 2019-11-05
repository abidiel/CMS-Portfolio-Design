-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.3.16-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura para tabela portfolio.tb_admin_usuarios
CREATE TABLE IF NOT EXISTS `tb_admin_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela portfolio.tb_admin_usuarios: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_admin_usuarios` DISABLE KEYS */;
INSERT INTO `tb_admin_usuarios` (`id`, `user`, `password`, `img`, `nome`, `cargo`) VALUES
	(1, 'admin', 'admin', 'aaaaaaaa.jpg', 'Taciano Balardin', 2),
	(2, 'abidiel', '123456', 'aaaaaaaa.jpg', 'Abidiel Bulsing', 0);
/*!40000 ALTER TABLE `tb_admin_usuarios` ENABLE KEYS */;

-- Copiando estrutura para tabela portfolio.tb_site_depoimentos
CREATE TABLE IF NOT EXISTS `tb_site_depoimentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `depoimento` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Copiando estrutura para tabela portfolio.tb_site_depoimentos
CREATE TABLE IF NOT EXISTS `tb_site_depoimentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `depoimento` text NOT NULL,
  `data` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela portfolio.tb_site_depoimentos: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_site_depoimentos` DISABLE KEYS */;
INSERT INTO `tb_site_depoimentos` (`id`, `nome`, `depoimento`, `data`) VALUES
	(16, 'Guilherme', 'teste', ''),
	(17, 'abdul', 'depoimento de teste', '');