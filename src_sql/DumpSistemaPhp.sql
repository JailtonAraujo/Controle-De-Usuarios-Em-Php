CREATE DATABASE  IF NOT EXISTS `sistema-php` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `sistema-php`;
-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: sistema-php
-- ------------------------------------------------------
-- Server version	8.0.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `idCliente` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `cpf` bigint NOT NULL,
  `rg` bigint NOT NULL,
  `dataNascimento` date NOT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (12,'jailton',8096036599,2185485,'1998-08-13'),(13,'555',555,5555,'0000-00-00'),(14,'fghfgd',556,656546,'2022-03-08'),(15,'5555',555,55555,'0000-00-00'),(16,'2222',222,222,'2022-03-11'),(17,'hgfh',554,5545,'2022-03-08'),(18,'jailton de Araujo santos',887988545,5555455,'0000-00-00'),(19,'fghfgh',5345,435345345,'2022-08-10'),(20,'hgfhgfh',54654,5465,'2022-03-09'),(21,'dfghf',56,56,'2022-03-09'),(22,'hgfdhgf',54645,45645,'2022-03-09'),(23,'hgfdhgf',54645,45645,'2022-03-09'),(24,'hgfdhggf',546445,456445,'2022-03-09'),(25,'gdfgfdfsg',55554,0,'2022-03-08'),(26,'gdfgdfsg',55554,0,'2022-03-08'),(27,'gdfgdfsg',55554,0,'2022-03-08'),(28,'gdfgdfsg',55554,0,'2022-03-08'),(29,'dfgdfg',45234,234234,'2022-03-11'),(30,'fghfdg',4880000,0,'2022-03-11');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `endereco`
--

DROP TABLE IF EXISTS `endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `endereco` (
  `idEndereco` int NOT NULL AUTO_INCREMENT,
  `idCliente` int NOT NULL,
  `cep` int NOT NULL,
  `logradouro` varchar(60) NOT NULL,
  `complemento` varchar(40) NOT NULL,
  `bairro` varchar(40) NOT NULL,
  `cidade` varchar(35) NOT NULL,
  `numero` int NOT NULL,
  `uf` varchar(3) NOT NULL,
  PRIMARY KEY (`idEndereco`),
  KEY `fk_endereco_cliente` (`idCliente`),
  CONSTRAINT `fk_endereco_cliente` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endereco`
--

LOCK TABLES `endereco` WRITE;
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
INSERT INTO `endereco` VALUES (8,12,48800000,'povoado mandaçaia','Zona Rural','Sem bairo','Monte Santo',0,'BA'),(9,13,48800000,'fghfgh','fghfdgh','dfghgfh','Monte Santo',554,'BA'),(10,14,48800000,'sdfgdf','sdfg','sdfg','Monte Santo',44,'BA'),(11,15,48500000,'sdfgdf','dfg','dfg','Euclides da Cunha',444,'BA'),(12,16,48800000,'222','222','222','Monte Santo',222,'BA'),(13,17,48800000,'trytr','rtytry','trytry','Monte Santo',55,'BA'),(14,18,48800000,'fsdfsad','sdfsdf','fdfsdf','Monte Santo',22,'BA'),(15,19,48800000,'dfggg','fgdf','dfgdfg','Monte Santo',33,'BA'),(16,20,48800000,'45645','565','56565','Monte Santo',666,'BA'),(17,21,48800000,'ghjghj','jghjfghj','hgjhgjgh','Monte Santo',55,'BA'),(18,22,48800000,'456456','456','456','Monte Santo',6,'BA'),(19,23,48800000,'456456','456','456','Monte Santo',6,'BA'),(20,24,48800000,'4564456','4456','4546','Monte Santo',64,'BA'),(21,25,48800000,'ertert','gfdsg','retert','Monte Santo',4443,'BA'),(22,26,48800000,'ertert','gfdsg','retert','Monte Santo',4443,'BA'),(23,27,48800000,'ertert','gfdsg','retert','Monte Santo',4443,'BA'),(24,28,48800000,'ertert','gfdsg','retert','Monte Santo',4443,'BA'),(25,29,48800000,'dsfg','dfgdfg','dfgdfg','Monte Santo',43543,'BA'),(26,30,48500000,'gsdf','sdfgfdg','sdfgdsfg','Euclides da Cunha',44,'BA');
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `idusuario` int NOT NULL AUTO_INCREMENT,
  `login` varchar(40) NOT NULL,
  `senha` varchar(30) NOT NULL,
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `login_UNIQUE` (`login`),
  UNIQUE KEY `senha_UNIQUE` (`senha`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'admin','admin'),(2,'jailton','1234');
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

-- Dump completed on 2022-03-11 20:39:17
