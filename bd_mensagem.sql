-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.6.17 - MySQL Community Server (GPL)
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para projeto_mensagem_usuario
CREATE DATABASE IF NOT EXISTS `projeto_mensagem_usuario` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `projeto_mensagem_usuario`;

-- Copiando estrutura para tabela projeto_mensagem_usuario.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela projeto_mensagem_usuario.categoria: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` (`id`, `nome`) VALUES
	(1, 'Geral'),
	(2, 'Segurança'),
	(3, 'Transporte');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;

-- Copiando estrutura para tabela projeto_mensagem_usuario.mensagem
CREATE TABLE IF NOT EXISTS `mensagem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) DEFAULT '1',
  `id_usuario` int(11) DEFAULT '0',
  `mensagem` text,
  `data_hora` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela projeto_mensagem_usuario.mensagem: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `mensagem` DISABLE KEYS */;
INSERT INTO `mensagem` (`id`, `id_categoria`, `id_usuario`, `mensagem`, `data_hora`) VALUES
	(1, 1, 2, 'Teste de mensagem para usuário específico editado', '2018-01-15 14:37:55'),
	(2, 2, 0, 'Teste de mensagem para todos os usuários', '2018-01-15 14:37:54'),
	(7, 3, 0, 'Os ônibus sairá 10 minutos mais tarde essa semana.', '2018-01-15 14:37:53'),
	(8, 1, 2, 'Você terá transporte executivo esta semana.', '2018-01-15 14:37:51'),
	(9, 2, 3, 'Mantenha seus pertences longe das janelas.', '2018-01-15 14:37:50'),
	(13, 3, 1, 'Teste de mensagem administrador', '2018-01-15 14:37:49'),
	(14, 1, 1, 'Teste de mensagem', '2018-01-15 14:37:47'),
	(15, 3, 2, 'Teste de Data Hora de novo\r\n', '2018-01-15 14:37:36');
/*!40000 ALTER TABLE `mensagem` ENABLE KEYS */;

-- Copiando estrutura para tabela projeto_mensagem_usuario.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL,
  `nivel` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela projeto_mensagem_usuario.usuario: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `nivel`) VALUES
	(1, 'Admin', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
	(2, 'Fulano de Tal', 'fulano@hotmail.com', '202cb962ac59075b964b07152d234b70', 0),
	(3, 'Cicrano da Silva Sauro', 'cicrano@hotmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0),
	(14, 'Gerente', 'gerente@gmail.com', '202cb962ac59075b964b07152d234b70', 1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
