-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: localhost    Database: bd_proyecto
-- ------------------------------------------------------
-- Server version	8.0.27

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
-- Table structure for table `contenidos`
--

DROP TABLE IF EXISTS `contenidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contenidos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tema` varchar(100) NOT NULL,
  `recursoUrl` varchar(200) NOT NULL,
  `cursos_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_contenidos_cursos1_idx` (`cursos_id`),
  CONSTRAINT `fk_contenidos_cursos1` FOREIGN KEY (`cursos_id`) REFERENCES `cursos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contenidos`
--

LOCK TABLES `contenidos` WRITE;
/*!40000 ALTER TABLE `contenidos` DISABLE KEYS */;
INSERT INTO `contenidos` VALUES (1,'Introducción','https://es.wikipedia.org/wiki/Idioma_inglés',2),(2,'Introducción','https://es.wikipedia.org/wiki/Introducción_(música)',1),(3,'Historia del inglés','https://englishlive.ef.com/es-mx/blog/ingles-en-la-vida-real/de-donde-viene-el-idioma-ingles/',2),(4,'prueba de Inglés','https://www.fluentu.com/blog/english-esp/aprender-ingles-en-casa-2/',2);
/*!40000 ALTER TABLE `contenidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cursos`
--

DROP TABLE IF EXISTS `cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cursos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `curso` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `curso_UNIQUE` (`curso`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos`
--

LOCK TABLES `cursos` WRITE;
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
INSERT INTO `cursos` VALUES (2,'Inglés'),(1,'Música'),(4,'Neurología');
/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notas`
--

DROP TABLE IF EXISTS `notas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notas` (
  `nota` decimal(2,0) DEFAULT NULL,
  `contenidos_id` int NOT NULL,
  `usuarios_cursos_usuarios_id` int NOT NULL,
  `usuarios_cursos_cursos_id` int NOT NULL,
  PRIMARY KEY (`usuarios_cursos_cursos_id`,`usuarios_cursos_usuarios_id`,`contenidos_id`),
  KEY `fk_notas_contenidos1_idx` (`contenidos_id`),
  KEY `fk_notas_usuarios_cursos1_idx` (`usuarios_cursos_usuarios_id`,`usuarios_cursos_cursos_id`),
  CONSTRAINT `fk_notas_contenidos1` FOREIGN KEY (`contenidos_id`) REFERENCES `contenidos` (`id`),
  CONSTRAINT `fk_notas_usuarios_cursos1` FOREIGN KEY (`usuarios_cursos_usuarios_id`, `usuarios_cursos_cursos_id`) REFERENCES `usuarios_cursos` (`usuarios_id`, `cursos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notas`
--

LOCK TABLES `notas` WRITE;
/*!40000 ALTER TABLE `notas` DISABLE KEYS */;
INSERT INTO `notas` VALUES (10,1,1,1),(5,2,1,2),(6,3,1,2),(4,4,2,4);
/*!40000 ALTER TABLE `notas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personas`
--

DROP TABLE IF EXISTS `personas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Identificacion` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personas`
--

LOCK TABLES `personas` WRITE;
/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
INSERT INTO `personas` VALUES (1,'Joaquin','administrador','0000000001'),(2,'Joaquin','estudiante','0000000002'),(3,'Joaquin','profesor','0000000003'),(4,'María','cajas','0000000000');
/*!40000 ALTER TABLE `personas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rol` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `rolescol_UNIQUE` (`rol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Administrador'),(2,'Estudiante'),(3,'Profesor');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(25) NOT NULL,
  `passw` varchar(25) NOT NULL,
  `token` varchar(100) DEFAULT NULL,
  `roles_id` int NOT NULL,
  `personas_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario_UNIQUE` (`usuario`),
  KEY `fk_usuarios_roles_idx` (`roles_id`),
  KEY `fk_usuarios_personas1_idx` (`personas_id`),
  CONSTRAINT `fk_usuarios_personas1` FOREIGN KEY (`personas_id`) REFERENCES `personas` (`id`),
  CONSTRAINT `fk_usuarios_roles` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'admin','admin','y8omowr4ufqSV-yM8w63oWJ26B4X-wfz',1,1),(2,'estudiante','estudiante','K8r5B87_HRup7uO23jVYXZYlQbGU3p8E',2,2),(3,'profesor','profesor','Dpi_6oyPfk_A9n71kwi_w99EJLWIhaqI',3,3),(5,'estudiante2','maria','',2,4);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios_cursos`
--

DROP TABLE IF EXISTS `usuarios_cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios_cursos` (
  `cursos_id` int NOT NULL,
  `usuarios_id` int NOT NULL,
  PRIMARY KEY (`usuarios_id`,`cursos_id`),
  KEY `fk_usuarios_cursos_cursos1_idx` (`cursos_id`),
  KEY `fk_usuarios_cursos_usuarios1_idx` (`usuarios_id`),
  CONSTRAINT `fk_usuarios_cursos_cursos1` FOREIGN KEY (`cursos_id`) REFERENCES `cursos` (`id`),
  CONSTRAINT `fk_usuarios_cursos_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios_cursos`
--

LOCK TABLES `usuarios_cursos` WRITE;
/*!40000 ALTER TABLE `usuarios_cursos` DISABLE KEYS */;
INSERT INTO `usuarios_cursos` VALUES (1,1),(2,1),(4,2);
/*!40000 ALTER TABLE `usuarios_cursos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-05 17:20:29
