-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.38-MariaDB


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema bd_momento_doe
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ bd_momento_doe;
USE bd_momento_doe;

--
-- Table structure for table `bd_momento_doe`.`arquivo`
--

DROP TABLE IF EXISTS `arquivo`;
CREATE TABLE `arquivo` (
  `id_arq` int(11) NOT NULL AUTO_INCREMENT,
  `desc_arq` varchar(70) DEFAULT NULL,
  `legenda_arq` varchar(60) DEFAULT NULL,
  `url_arq` varchar(60) DEFAULT NULL,
  `ext_arq` varchar(60) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_arq`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `arquivo_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bd_momento_doe`.`arquivo`
--

/*!40000 ALTER TABLE `arquivo` DISABLE KEYS */;
/*!40000 ALTER TABLE `arquivo` ENABLE KEYS */;


--
-- Table structure for table `bd_momento_doe`.`depoimentos`
--

DROP TABLE IF EXISTS `depoimentos`;
CREATE TABLE `depoimentos` (
  `cod_depoimentos` int(11) NOT NULL AUTO_INCREMENT,
  `desc_conteudo_depoimentos` varchar(60) DEFAULT NULL,
  `data_hora_depoimentos` varchar(60) DEFAULT NULL,
  `cod_status_depoimentos` varchar(60) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`cod_depoimentos`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `depoimentos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bd_momento_doe`.`depoimentos`
--

/*!40000 ALTER TABLE `depoimentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `depoimentos` ENABLE KEYS */;


--
-- Table structure for table `bd_momento_doe`.`doacao`
--

DROP TABLE IF EXISTS `doacao`;
CREATE TABLE `doacao` (
  `id_doacao` int(11) NOT NULL AUTO_INCREMENT,
  `desc_doacao` varchar(90) DEFAULT NULL,
  `url_foto_doacao` varchar(60) DEFAULT NULL,
  `data_hora_doacao` datetime DEFAULT NULL,
  `cod_status_doacao` varchar(10) NOT NULL DEFAULT '1',
  `id_usuario` int(11) NOT NULL,
  `id_tipo_doa` int(11) NOT NULL,
  PRIMARY KEY (`id_doacao`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_tipo_doa` (`id_tipo_doa`),
  CONSTRAINT `doacao_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `doacao_ibfk_2` FOREIGN KEY (`id_tipo_doa`) REFERENCES `tipo_doacao` (`id_tipo_doa`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bd_momento_doe`.`doacao`
--

/*!40000 ALTER TABLE `doacao` DISABLE KEYS */;
INSERT INTO `doacao` (`id_doacao`,`desc_doacao`,`url_foto_doacao`,`data_hora_doacao`,`cod_status_doacao`,`id_usuario`,`id_tipo_doa`) VALUES 
 (2,'estou doando roupa',NULL,NULL,'1',2,1),
 (3,'doando tempo','view/imagens/doacao/1571600958.jpg',NULL,'1',2,1),
 (4,'                    Estou doando esse livro pois ja terminei de lê-lo','view/imagens/doacao/1571605866.jpg',NULL,'1',2,5);
/*!40000 ALTER TABLE `doacao` ENABLE KEYS */;


--
-- Table structure for table `bd_momento_doe`.`operacao`
--

DROP TABLE IF EXISTS `operacao`;
CREATE TABLE `operacao` (
  `cod_ope` int(11) NOT NULL AUTO_INCREMENT,
  `nome_ope` varchar(20) DEFAULT NULL,
  `cod_status_ope` varchar(60) DEFAULT NULL,
  `link_da_operacao` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`cod_ope`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bd_momento_doe`.`operacao`
--

/*!40000 ALTER TABLE `operacao` DISABLE KEYS */;
INSERT INTO `operacao` (`cod_ope`,`nome_ope`,`cod_status_ope`,`link_da_operacao`) VALUES 
 (1,'operacao1','1','operacao/operacao1');
/*!40000 ALTER TABLE `operacao` ENABLE KEYS */;


--
-- Table structure for table `bd_momento_doe`.`operacao_tipo_usuario`
--

DROP TABLE IF EXISTS `operacao_tipo_usuario`;
CREATE TABLE `operacao_tipo_usuario` (
  `cod_ope` int(11) NOT NULL,
  `id_tipo_us` int(11) NOT NULL,
  KEY `cod_ope` (`cod_ope`),
  KEY `id_tipo_us` (`id_tipo_us`),
  CONSTRAINT `operacao_tipo_usuario_ibfk_1` FOREIGN KEY (`cod_ope`) REFERENCES `operacao` (`cod_ope`),
  CONSTRAINT `operacao_tipo_usuario_ibfk_2` FOREIGN KEY (`id_tipo_us`) REFERENCES `tipo_usuario` (`id_tipo_us`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bd_momento_doe`.`operacao_tipo_usuario`
--

/*!40000 ALTER TABLE `operacao_tipo_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `operacao_tipo_usuario` ENABLE KEYS */;


--
-- Table structure for table `bd_momento_doe`.`publicacao`
--

DROP TABLE IF EXISTS `publicacao`;
CREATE TABLE `publicacao` (
  `id_publi` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_publi` varchar(30) DEFAULT NULL,
  `url_foto_publi` varchar(60) DEFAULT NULL,
  `cod_status_publi` varchar(10) DEFAULT NULL,
  `desc_publi` varchar(90) DEFAULT NULL,
  `data_hora_publi` datetime DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_publi`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `publicacao_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bd_momento_doe`.`publicacao`
--

/*!40000 ALTER TABLE `publicacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `publicacao` ENABLE KEYS */;


--
-- Table structure for table `bd_momento_doe`.`tipo_doacao`
--

DROP TABLE IF EXISTS `tipo_doacao`;
CREATE TABLE `tipo_doacao` (
  `id_tipo_doa` int(11) NOT NULL AUTO_INCREMENT,
  `cod_status_tipo_doa` varchar(60) DEFAULT NULL,
  `desc_tipo_doa` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_doa`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bd_momento_doe`.`tipo_doacao`
--

/*!40000 ALTER TABLE `tipo_doacao` DISABLE KEYS */;
INSERT INTO `tipo_doacao` (`id_tipo_doa`,`cod_status_tipo_doa`,`desc_tipo_doa`) VALUES 
 (1,'1','Tempo'),
 (2,'1','Roupa'),
 (3,'1','Comida'),
 (4,'1','Dinheiro'),
 (5,'1','Outros');
/*!40000 ALTER TABLE `tipo_doacao` ENABLE KEYS */;


--
-- Table structure for table `bd_momento_doe`.`tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
CREATE TABLE `tipo_usuario` (
  `id_tipo_us` int(11) NOT NULL AUTO_INCREMENT,
  `desc_tipo_us` varchar(30) DEFAULT NULL,
  `cod_status_tipo_us` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_us`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bd_momento_doe`.`tipo_usuario`
--

/*!40000 ALTER TABLE `tipo_usuario` DISABLE KEYS */;
INSERT INTO `tipo_usuario` (`id_tipo_us`,`desc_tipo_us`,`cod_status_tipo_us`) VALUES 
 (1,'Ongs','1'),
 (2,'Pessoa','1'),
 (3,'Empresa','1');
/*!40000 ALTER TABLE `tipo_usuario` ENABLE KEYS */;


--
-- Table structure for table `bd_momento_doe`.`usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(60) DEFAULT NULL,
  `senha_usuario` varchar(64) DEFAULT NULL,
  `tel_usuario` varchar(12) DEFAULT NULL,
  `id_doc` varchar(15) DEFAULT NULL,
  `email_usuario` varchar(40) DEFAULT NULL,
  `url_foto_usuario` varchar(40) DEFAULT NULL,
  `cod_status_usuario` varchar(10) NOT NULL DEFAULT '1',
  `id_tipo_us` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_tipo_us` (`id_tipo_us`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_tipo_us`) REFERENCES `tipo_usuario` (`id_tipo_us`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bd_momento_doe`.`usuario`
--

/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id_usuario`,`nome_usuario`,`senha_usuario`,`tel_usuario`,`id_doc`,`email_usuario`,`url_foto_usuario`,`cod_status_usuario`,`id_tipo_us`) VALUES 
 (2,'Felipe','8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92',NULL,'510','felipe@gmail.com',NULL,'1',2),
 (3,'teste','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3',NULL,'201','teste@teste.com',NULL,'1',2),
 (4,'teste2','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3',NULL,'0','teste2@teste.com',NULL,'1',2),
 (5,'teste3','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3',NULL,NULL,'teste3@teste.com',NULL,'1',2),
 (6,'teste4','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3',NULL,NULL,'teste4@teste.com',NULL,'0',2),
 (7,'teste5','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3',NULL,NULL,'teste5@teste.com',NULL,'0',2),
 (8,'teste04','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3',NULL,'0','teste04@teste.com',NULL,'1',2),
 (9,'teste05','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3',NULL,'123','test05@teste.com',NULL,'1',2);
INSERT INTO `usuario` (`id_usuario`,`nome_usuario`,`senha_usuario`,`tel_usuario`,`id_doc`,`email_usuario`,`url_foto_usuario`,`cod_status_usuario`,`id_tipo_us`) VALUES 
 (10,'teste7','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3',NULL,'88888888888','teste7@teste.com',NULL,'1',2);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
