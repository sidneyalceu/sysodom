-- MariaDB dump 10.19  Distrib 10.6.4-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: banco01
-- ------------------------------------------------------
-- Server version	10.6.4-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tb_anelfisico`
--

DROP TABLE IF EXISTS `tb_anelfisico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_anelfisico` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(30) COLLATE utf8mb3_bin NOT NULL,
  `DESCRICAO` varchar(255) COLLATE utf8mb3_bin DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_anelfisico`
--

LOCK TABLES `tb_anelfisico` WRITE;
/*!40000 ALTER TABLE `tb_anelfisico` DISABLE KEYS */;
INSERT INTO `tb_anelfisico` VALUES (1,'ANEL-01','Anel que passa'),(2,'ANEL-02','Anel que passa'),(3,'ANEL-03','Anel que passa'),(4,'RING04-ALtoSE','Anel que liga alagoas a sergipe');
/*!40000 ALTER TABLE `tb_anelfisico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_anellogico`
--

DROP TABLE IF EXISTS `tb_anellogico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_anellogico` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(30) COLLATE utf8mb3_bin NOT NULL,
  `DESCRICAO` varchar(255) COLLATE utf8mb3_bin DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_anellogico`
--

LOCK TABLES `tb_anellogico` WRITE;
/*!40000 ALTER TABLE `tb_anellogico` DISABLE KEYS */;
INSERT INTO `tb_anellogico` VALUES (1,'MCO-AIR-01','Anel que passa'),(2,'MCO-RCE-01','Anel que passa'),(3,'RCE-NTL-01','Anel que passa'),(4,'RING04-ALtoSE','Anel que ligaalagoas a sergipe'),(5,'RING06-PEtoCE','ANEL QUE LIGA PERNANBUCO AO CEARA');
/*!40000 ALTER TABLE `tb_anellogico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_asso_anellogico_host`
--

DROP TABLE IF EXISTS `tb_asso_anellogico_host`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_asso_anellogico_host` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_anel_logico` int(10) DEFAULT NULL,
  `id_host` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_asso_anellogico_host`
--

LOCK TABLES `tb_asso_anellogico_host` WRITE;
/*!40000 ALTER TABLE `tb_asso_anellogico_host` DISABLE KEYS */;
INSERT INTO `tb_asso_anellogico_host` VALUES (1,4,1),(2,4,2),(3,4,3),(4,4,4),(5,4,5),(6,4,6),(7,4,7),(8,4,8),(9,4,9),(10,5,10),(11,5,11),(12,5,12),(13,5,13),(14,5,14);
/*!40000 ALTER TABLE `tb_asso_anellogico_host` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_host`
--

DROP TABLE IF EXISTS `tb_host`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_host` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8mb3_bin DEFAULT NULL,
  `ip` varchar(50) COLLATE utf8mb3_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_host`
--

LOCK TABLES `tb_host` WRITE;
/*!40000 ALTER TABLE `tb_host` DISABLE KEYS */;
INSERT INTO `tb_host` VALUES (1,'EXT-AIR-GVT','10.7.0.16'),(2,'EXT01-PP1','10.7.0.22'),(3,'EXT01-ALOO-AJU','172.22.0.0'),(4,'EXT01-AJU-INTELIG','10.7.4.1'),(5,'EXT02-MRO','10.7.0.11'),(6,'EXT-ALOO-SEDE','10.7.0.1'),(7,'EXT02-JP-MCO','10.7.0.7'),(8,'EXT-GVT-MCO','10.7.0.8'),(9,'EXT-SMM-ALOO','10.7.0.9'),(10,'EXT02-RCE-GVT','10.7.1.4'),(11,'EXT02-RCE-TIM','10.7.1.2'),(12,'EXT02-CGE','10.7.2.3'),(13,'EXT-FLA-TIM','10.7.5.1'),(14,'EXT-FLA-GVT','10.7.5.8');
/*!40000 ALTER TABLE `tb_host` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-09-24  9:59:00
