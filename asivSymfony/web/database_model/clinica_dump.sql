CREATE DATABASE  IF NOT EXISTS `db_nazareth_clinic` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_nazareth_clinic`;
-- MySQL dump 10.13  Distrib 5.5.38, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: db_nazareth_clinic
-- ------------------------------------------------------
-- Server version	5.5.38-0+wheezy1

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
-- Table structure for table `cita_comentario`
--

DROP TABLE IF EXISTS `cita_comentario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cita_comentario` (
  `id_cita_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `id_cita` int(11) NOT NULL,
  `comentario` text NOT NULL,
  PRIMARY KEY (`id_cita_comentario`),
  KEY `fk_cita_comentario_cita` (`id_cita`),
  CONSTRAINT `fk_cita_comentario_cita` FOREIGN KEY (`id_cita`) REFERENCES `cita` (`id_cita`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cita_comentario`
--

LOCK TABLES `cita_comentario` WRITE;
/*!40000 ALTER TABLE `cita_comentario` DISABLE KEYS */;
/*!40000 ALTER TABLE `cita_comentario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (1,'doctor',1),(2,'recepcion',1),(5,'paciente',1),(6,'root',1);
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paciente`
--

DROP TABLE IF EXISTS `paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paciente` (
  `id_paciente` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_sanguineo` varchar(10) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_paciente`),
  KEY `fk_paciente_usuario` (`id_usuario`),
  CONSTRAINT `fk_paciente_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paciente`
--

LOCK TABLES `paciente` WRITE;
/*!40000 ALTER TABLE `paciente` DISABLE KEYS */;
/*!40000 ALTER TABLE `paciente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleado`
--

DROP TABLE IF EXISTS `empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_posicion` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `fecha_contratacion` date NOT NULL,
  PRIMARY KEY (`id_empleado`),
  KEY `fk_empleado_posicion` (`id_posicion`),
  KEY `fk_empleado_depto` (`id_departamento`),
  KEY `fk_empleado_usuario` (`id_usuario`),
  CONSTRAINT `fk_empleado_depto` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_empleado_posicion` FOREIGN KEY (`id_posicion`) REFERENCES `posicion` (`id_posicion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_empleado_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleado`
--

LOCK TABLES `empleado` WRITE;
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_presentacion`
--

DROP TABLE IF EXISTS `tipo_presentacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_presentacion` (
  `id_tipo_presentacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_tipo_presentacion`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_presentacion`
--

LOCK TABLES `tipo_presentacion` WRITE;
/*!40000 ALTER TABLE `tipo_presentacion` DISABLE KEYS */;
INSERT INTO `tipo_presentacion` VALUES (1,'Pastilla',1),(2,'Jarabe',1),(3,'Inyeccion',1),(4,'Ampolleta',1),(5,'Suero',1),(6,'Supositorio',1),(7,'Ejemplo',1);
/*!40000 ALTER TABLE `tipo_presentacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado_cita`
--

DROP TABLE IF EXISTS `estado_cita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado_cita` (
  `id_estado_cita` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_estado_cita`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_cita`
--

LOCK TABLES `estado_cita` WRITE;
/*!40000 ALTER TABLE `estado_cita` DISABLE KEYS */;
INSERT INTO `estado_cita` VALUES (1,'Pendiente',1),(2,'Cancelada',1);
/*!40000 ALTER TABLE `estado_cita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `casa_medica`
--

DROP TABLE IF EXISTS `casa_medica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `casa_medica` (
  `id_casa_medica` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `nombre_contacto` varchar(100) DEFAULT NULL,
  `telefono` varchar(15) NOT NULL,
  `fecha_contrato` date NOT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id_casa_medica`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `casa_medica`
--

LOCK TABLES `casa_medica` WRITE;
/*!40000 ALTER TABLE `casa_medica` DISABLE KEYS */;
INSERT INTO `casa_medica` VALUES (2,'Laboratorios Lopez','Doctor Miguel Cubias','7985-1745','2010-02-01',1),(3,'Casa Medica 2','Casa Medica 2','2345-1234','2019-06-12',1),(4,'Laboratorios MK','Abner Torres','2345-1234','2014-12-15',1);
/*!40000 ALTER TABLE `casa_medica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamento`
--

DROP TABLE IF EXISTS `departamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departamento` (
  `id_departamento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_departamento`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamento`
--

LOCK TABLES `departamento` WRITE;
/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;
INSERT INTO `departamento` VALUES (1,'Recursos Humanos',1),(2,'Bodega',1),(3,'Finanzas',1),(4,'Ventas',1),(5,'Cobros',1),(6,'Sistemas',1);
/*!40000 ALTER TABLE `departamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `receta_cita`
--

DROP TABLE IF EXISTS `receta_cita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `receta_cita` (
  `id_receta_cita` int(11) NOT NULL AUTO_INCREMENT,
  `id_cita` int(11) NOT NULL,
  `id_medicina` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT '1',
  PRIMARY KEY (`id_receta_cita`),
  KEY `fk_receta_cita_cita` (`id_cita`),
  KEY `fk_receta_cita_medicina` (`id_medicina`),
  CONSTRAINT `fk_receta_cita_cita` FOREIGN KEY (`id_cita`) REFERENCES `cita` (`id_cita`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_receta_cita_medicina` FOREIGN KEY (`id_medicina`) REFERENCES `medicina` (`id_medicina`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receta_cita`
--

LOCK TABLES `receta_cita` WRITE;
/*!40000 ALTER TABLE `receta_cita` DISABLE KEYS */;
/*!40000 ALTER TABLE `receta_cita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `genero` tinyint(1) NOT NULL,
  `ultimo_ingreso` datetime DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `co_user_email` (`email`),
  UNIQUE KEY `co_user_username` (`username`),
  KEY `fk_usuario_rol` (`id_rol`),
  CONSTRAINT `fk_usuario_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'admin','admin@staff.com','0c7540eb7e65b553ec1ba6b20de79608','super','admin',1,'2014-10-27 23:12:42',6,1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posicion`
--

DROP TABLE IF EXISTS `posicion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posicion` (
  `id_posicion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id_posicion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posicion`
--

LOCK TABLES `posicion` WRITE;
/*!40000 ALTER TABLE `posicion` DISABLE KEYS */;
INSERT INTO `posicion` VALUES (1,'Gerente General',1);
/*!40000 ALTER TABLE `posicion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cita`
--

DROP TABLE IF EXISTS `cita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cita` (
  `id_cita` int(11) NOT NULL AUTO_INCREMENT,
  `id_paciente` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `fecha_cita` date NOT NULL,
  `inicio_hora_cita` time NOT NULL,
  `fin_hora_cita` time NOT NULL,
  `id_estado_cita` int(11) NOT NULL,
  PRIMARY KEY (`id_cita`),
  KEY `fk_cita_estado_cita` (`id_estado_cita`),
  KEY `fk_cita_empleado` (`id_empleado`),
  KEY `fk_cita_paciente` (`id_paciente`),
  CONSTRAINT `fk_cita_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cita_estado_cita` FOREIGN KEY (`id_estado_cita`) REFERENCES `estado_cita` (`id_estado_cita`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cita_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cita`
--

LOCK TABLES `cita` WRITE;
/*!40000 ALTER TABLE `cita` DISABLE KEYS */;
/*!40000 ALTER TABLE `cita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medicina`
--

DROP TABLE IF EXISTS `medicina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medicina` (
  `id_medicina` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `id_tipo_presentacion` int(11) NOT NULL,
  `id_casa_medica` int(11) NOT NULL,
  `limite_menor` int(11) NOT NULL,
  `limite_normal` int(11) NOT NULL,
  `limite_optimo` int(11) NOT NULL,
  `precio_unidad` decimal(10,2) NOT NULL,
  `existencia` int(11) DEFAULT '0',
  PRIMARY KEY (`id_medicina`),
  KEY `fk_medicina_tipo_presentacion` (`id_tipo_presentacion`),
  KEY `fk_medicina_casa_medica` (`id_casa_medica`),
  CONSTRAINT `fk_medicina_casa_medica` FOREIGN KEY (`id_casa_medica`) REFERENCES `casa_medica` (`id_casa_medica`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_medicina_tipo_presentacion` FOREIGN KEY (`id_tipo_presentacion`) REFERENCES `tipo_presentacion` (`id_tipo_presentacion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicina`
--

LOCK TABLES `medicina` WRITE;
/*!40000 ALTER TABLE `medicina` DISABLE KEYS */;
INSERT INTO `medicina` VALUES (1,'Metocarbamol',6,2,100,150,200,0.50,170),(2,'Acetaminofen',5,2,100,150,200,0.10,100);
/*!40000 ALTER TABLE `medicina` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-10-27 22:30:37
