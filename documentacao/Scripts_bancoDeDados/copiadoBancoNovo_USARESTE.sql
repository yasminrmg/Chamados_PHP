CREATE DATABASE  IF NOT EXISTS `dbSCO` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `dbSCO`;
-- MySQL dump 10.13  Distrib 5.7.28, for Win32 (AMD64)
--
-- Host: localhost    Database: chamado_rapido
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.8-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `apartamento`
--

DROP TABLE IF EXISTS `apartamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apartamento` (
  `id_apartamento` int(11) NOT NULL AUTO_INCREMENT,
  `id_condominio` int(11) DEFAULT NULL,
  `bloco` varchar(20) DEFAULT NULL,
  `n_apartamento` int(11) DEFAULT NULL,
  `n_vaga` int(11) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT current_timestamp(),
  `id_operador` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_apartamento`),
  KEY `id_condominio` (`id_condominio`),
  CONSTRAINT `apartamento_ibfk_1` FOREIGN KEY (`id_condominio`) REFERENCES `condominio` (`id_condominio`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `condominio`
--

DROP TABLE IF EXISTS `condominio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `condominio` (
  `id_condominio` int(11) NOT NULL AUTO_INCREMENT,
  `nome_condominio` varchar(200) DEFAULT NULL,
  `endereco` varchar(200) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `uf` char(2) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT current_timestamp(),
  `id_operador` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_condominio`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `solicitacao`
--

DROP TABLE IF EXISTS `solicitacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solicitacao` (
  `id_solicitacao` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_solicitacao` int(11) DEFAULT NULL,
  `titulo_solicitacao` varchar(50) DEFAULT NULL,
  `descricao_solicitacao` text DEFAULT NULL,
  `id_solicitante` int(11) DEFAULT NULL,
  `id_atendente` int(11) DEFAULT NULL,
  `data_solicitacao` datetime DEFAULT current_timestamp(),
  `data_evento` datetime DEFAULT NULL,
  `duracao_evento` time DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `data_atendimento` datetime DEFAULT NULL,
  PRIMARY KEY (`id_solicitacao`),
  KEY `id_tipo_solicitacao` (`id_tipo_solicitacao`),
  KEY `id_solicitante` (`id_solicitante`),
  KEY `id_atendente` (`id_atendente`),
  CONSTRAINT `solicitacao_ibfk_1` FOREIGN KEY (`id_tipo_solicitacao`) REFERENCES `tipo_solicitacao` (`id_tipo_solicitacao`),
  CONSTRAINT `solicitacao_ibfk_2` FOREIGN KEY (`id_solicitante`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `solicitacao_ibfk_3` FOREIGN KEY (`id_atendente`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `solicitacao_status`
--

DROP TABLE IF EXISTS `solicitacao_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solicitacao_status` (
  `id_status_solicitacao` int(11) NOT NULL,
  `titulo` varchar(30) DEFAULT NULL,
  `descricao` varchar(60) DEFAULT NULL,
  `operador` int(11) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT current_timestamp(),
  `classe_html` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_status_solicitacao`),
  KEY `operador` (`operador`),
  CONSTRAINT `operador` FOREIGN KEY (`operador`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tipo_solicitacao`
--

DROP TABLE IF EXISTS `tipo_solicitacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_solicitacao` (
  `id_tipo_solicitacao` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_tipo_solicitacao` varchar(30) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT current_timestamp(),
  `id_operador` int(11) DEFAULT NULL,
  `ativo` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id_tipo_solicitacao`),
  KEY `id_operador` (`id_operador`),
  CONSTRAINT `tipo_solicitacao_ibfk_1` FOREIGN KEY (`id_operador`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_tipo` varchar(50) DEFAULT NULL,
  `id_operador` int(11) DEFAULT NULL,
  `ativo` bit(1) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id_tipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_usuario` int(11) DEFAULT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `data_nascimento` datetime DEFAULT NULL,
  `nome_usuario` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `login` varchar(30) NOT NULL,
  `senha` varchar(15) NOT NULL,
  `id_apartamento` int(11) DEFAULT NULL,
  `id_operador` int(11) DEFAULT NULL,
  `aprovado` bit(1) DEFAULT NULL,
  `data_aprovacao` datetime DEFAULT current_timestamp(),
  `sexo` enum('M','F') NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_tipo_usuario` (`id_tipo_usuario`),
  KEY `id_apartamento` (`id_apartamento`),
  KEY `id_operador` (`id_operador`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`),
  CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_apartamento`) REFERENCES `apartamento` (`id_apartamento`),
  CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`id_operador`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,1,NULL,NULL,'Admin',NULL,'admin','root',NULL,NULL,_binary '','0000-00-00 00:00:00','M');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;


/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;


