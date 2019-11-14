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


-- Copiando estrutura do banco de dados para portfolio
CREATE DATABASE IF NOT EXISTS `portfolio` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `portfolio`;

-- Copiando estrutura para tabela portfolio.tb_admin_usuarios
CREATE TABLE IF NOT EXISTS `tb_admin_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela portfolio.tb_admin_usuarios: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_admin_usuarios` DISABLE KEYS */;
INSERT INTO `tb_admin_usuarios` (`id`, `user`, `password`, `img`, `nome`) VALUES
	(1, 'admin', 'admin', '5dbe30914d58f.jpg', 'Abidiel'),
	(13, 'teste', 'teste', '', 'teste');
/*!40000 ALTER TABLE `tb_admin_usuarios` ENABLE KEYS */;

-- Copiando estrutura para tabela portfolio.tb_site_categorias
CREATE TABLE IF NOT EXISTS `tb_site_categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela portfolio.tb_site_categorias: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_site_categorias` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_site_categorias` ENABLE KEYS */;

-- Copiando estrutura para tabela portfolio.tb_site_config
CREATE TABLE IF NOT EXISTS `tb_site_config` (
  `titulo` varchar(255) NOT NULL,
  `nome_autor` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `icone1` varchar(255) NOT NULL,
  `titulo1` varchar(255) NOT NULL,
  `descricao1` text NOT NULL,
  `icone2` varchar(255) NOT NULL,
  `titulo2` varchar(255) NOT NULL,
  `descricao2` text NOT NULL,
  `icone3` varchar(255) NOT NULL,
  `titulo3` varchar(255) NOT NULL,
  `descricao3` text NOT NULL,
  `icone4` varchar(255) NOT NULL,
  `titulo4` varchar(255) NOT NULL,
  `descricao4` text NOT NULL,
  `icone5` varchar(255) NOT NULL,
  `titulo5` varchar(255) NOT NULL,
  `descricao5` text NOT NULL,
  `icone6` varchar(255) NOT NULL,
  `titulo6` varchar(255) NOT NULL,
  `descricao6` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela portfolio.tb_site_config: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_site_config` DISABLE KEYS */;
INSERT INTO `tb_site_config` (`titulo`, `nome_autor`, `descricao`, `icone1`, `titulo1`, `descricao1`, `icone2`, `titulo2`, `descricao2`, `icone3`, `titulo3`, `descricao3`, `icone4`, `titulo4`, `descricao4`, `icone5`, `titulo5`, `descricao5`, `icone6`, `titulo6`, `descricao6`) VALUES
	('John Front-end e Designer', 'John Front-end e Designer', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae quis voluptas quidem. Nulla suscipit obcaecati error facilis, quam accusamus fuga maxime possimus, iure aut molestiae, sit commodi excepturi aspernatur rem at blanditiis doloremque ipsa quaerat inventore ea? Amet quibusdam tempore explicabo ducimus velit.', 'fab fa-html5', 'HTML5', 'Linguagem de marcação, utilizada na web para estruturar as páginas.', 'fab fa-css3-alt', 'CSS3', 'Utilizado para estilizar o site, desde cores e alinhamentos até efeitos de transição.', 'fab fa-js-square', 'JavaScript', 'Linguagem que permite implementar funções mais complexas em páginas web.', 'fa fa-pen-fancy', 'Design web', 'Criação de interfaces para produtos digitais, sites, aplicativos e sistemas.', 'fa fa-paint-brush', 'Design gráfico', 'Criação de artes para veículos de comunicação online e offline', 'fa fa-pencil-ruler', 'Marcas', 'Criação de marcas exclusivas, branding e re-design.');
/*!40000 ALTER TABLE `tb_site_config` ENABLE KEYS */;

-- Copiando estrutura para tabela portfolio.tb_site_depoimentos
CREATE TABLE IF NOT EXISTS `tb_site_depoimentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `depoimento` text NOT NULL,
  `data` varchar(50) NOT NULL DEFAULT '',
  `order_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela portfolio.tb_site_depoimentos: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_site_depoimentos` DISABLE KEYS */;
INSERT INTO `tb_site_depoimentos` (`id`, `nome`, `depoimento`, `data`, `order_id`) VALUES
	(1, 'Abidiel Bulsing', 'But testetetet oi mst explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of asgsa12551the truthtruth.', '09/11/2019', 4),
	(3, 'Janice Bulsing', 'Aestt vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qu.', '08/11/2019', 2),
	(4, 'Alice Bulsing', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that aaafa.', '07/11/2019', 3);
/*!40000 ALTER TABLE `tb_site_depoimentos` ENABLE KEYS */;

-- Copiando estrutura para tabela portfolio.tb_site_portfolio
CREATE TABLE IF NOT EXISTS `tb_site_portfolio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_id` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `conteudo` text DEFAULT NULL,
  `capa` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela portfolio.tb_site_portfolio: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_site_portfolio` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_site_portfolio` ENABLE KEYS */;

-- Copiando estrutura para tabela portfolio.tb_site_slides
CREATE TABLE IF NOT EXISTS `tb_site_slides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `slide` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela portfolio.tb_site_slides: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_site_slides` DISABLE KEYS */;
INSERT INTO `tb_site_slides` (`id`, `nome`, `slide`, `order_id`) VALUES
	(3, 'Banner 1', '5dcca796618a8.jpg', 3),
	(8, 'Banner 2', '5dcca3da3a25b.jpg', 8),
	(9, 'Banner 3', '5dcca3e024c92.jpg', 9);
/*!40000 ALTER TABLE `tb_site_slides` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
