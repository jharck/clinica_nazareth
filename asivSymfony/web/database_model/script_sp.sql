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
  `fecha_comentario` date NOT NULL,
  PRIMARY KEY (`id_cita_comentario`),
  KEY `fk_cita_comentario_cita` (`id_cita`),
  CONSTRAINT `fk_cita_comentario_cita` FOREIGN KEY (`id_cita`) REFERENCES `cita` (`id_cita`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cita_comentario`
--

LOCK TABLES `cita_comentario` WRITE;
/*!40000 ALTER TABLE `cita_comentario` DISABLE KEYS */;
INSERT INTO `cita_comentario` VALUES (1,1,'Paciente demuestra sintomas de Hernia del hiato esofágico','2014-10-31'),(2,2,'Paciente ha mejorado en relacion a su Hernia, seguir recetando Penicilina','2014-11-09'),(3,5,'Paciente sera dado de alta del tratamiento actual','2014-11-11'),(7,1,'pcomentario','2014-11-23');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paciente`
--

LOCK TABLES `paciente` WRITE;
/*!40000 ALTER TABLE `paciente` DISABLE KEYS */;
INSERT INTO `paciente` VALUES (1,'ORH+','1991-02-15',2),(2,'ORH-','1934-09-15',3);
/*!40000 ALTER TABLE `paciente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `calendar_excepcion`
--

DROP TABLE IF EXISTS `calendar_excepcion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `calendar_excepcion` (
  `id_calendar_exception` int(11) NOT NULL AUTO_INCREMENT,
  `inicio_excepcion` time NOT NULL,
  `fin_excepcion` time NOT NULL,
  `status` tinyint(4) DEFAULT '1',
  `fecha_excepcion` date DEFAULT NULL,
  `motivo_excepcion` varchar(45) NOT NULL,
  PRIMARY KEY (`id_calendar_exception`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calendar_excepcion`
--

LOCK TABLES `calendar_excepcion` WRITE;
/*!40000 ALTER TABLE `calendar_excepcion` DISABLE KEYS */;
INSERT INTO `calendar_excepcion` VALUES (1,'12:30:00','13:30:00',1,NULL,'Almuerzo'),(2,'08:00:00','12:00:00',1,'2014-11-14','Capacitacion de Personal'),(3,'13:35:00','18:00:00',1,'2014-11-13','Asueto Nacional'),(4,'00:00:00','07:30:00',1,NULL,'Fuera de Horario de Atencion'),(5,'18:45:00','23:59:59',1,NULL,'Fuera de Horario de Atencion'),(6,'08:00:00','12:30:00',1,'2014-11-15','Vacaciones, Todo cerrado'),(7,'13:30:00','18:00:00',1,'2014-11-25','Cerrado por auditoria');
/*!40000 ALTER TABLE `calendar_excepcion` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamento`
--

LOCK TABLES `departamento` WRITE;
/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;
INSERT INTO `departamento` VALUES (1,'Recursos Humanos',1),(2,'Bodega',1),(3,'Finanzas',1),(4,'Ventas',1),(5,'Cobros',1),(6,'Sistemas',1),(7,'Medicina General',1);
/*!40000 ALTER TABLE `departamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `tiempos_paciente`
--

DROP TABLE IF EXISTS `tiempos_paciente`;
/*!50001 DROP VIEW IF EXISTS `tiempos_paciente`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `tiempos_paciente` (
  `paciente_id` tinyint NOT NULL,
  `año_cita` tinyint NOT NULL,
  `paciente` tinyint NOT NULL,
  `tiempo_total_citas` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `medicina_paciente`
--

DROP TABLE IF EXISTS `medicina_paciente`;
/*!50001 DROP VIEW IF EXISTS `medicina_paciente`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `medicina_paciente` (
  `Medicina_ID` tinyint NOT NULL,
  `Paciente_ID` tinyint NOT NULL,
  `Paciente` tinyint NOT NULL,
  `Nombre de Medicina` tinyint NOT NULL,
  `Marca` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_cita`
--

LOCK TABLES `estado_cita` WRITE;
/*!40000 ALTER TABLE `estado_cita` DISABLE KEYS */;
INSERT INTO `estado_cita` VALUES (1,'Pendiente',1),(2,'Cancelada',1),(3,'Confirmada',1),(4,'En Consulta',1);
/*!40000 ALTER TABLE `estado_cita` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posicion`
--

LOCK TABLES `posicion` WRITE;
/*!40000 ALTER TABLE `posicion` DISABLE KEYS */;
INSERT INTO `posicion` VALUES (1,'Gerente General',1),(2,'Medico',1);
/*!40000 ALTER TABLE `posicion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `informacion_cita`
--

DROP TABLE IF EXISTS `informacion_cita`;
/*!50001 DROP VIEW IF EXISTS `informacion_cita`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `informacion_cita` (
  `cita_id` tinyint NOT NULL,
  `paciente` tinyint NOT NULL,
  `empleado` tinyint NOT NULL,
  `fecha_de_cita` tinyint NOT NULL,
  `hora_de_inicio` tinyint NOT NULL,
  `hora_de_fin` tinyint NOT NULL,
  `estado_cita` tinyint NOT NULL,
  `fecha_creacion` tinyint NOT NULL,
  `duracion_minutos` tinyint NOT NULL,
  `duracion_horas` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `donaciones_por_paciente`
--

DROP TABLE IF EXISTS `donaciones_por_paciente`;
/*!50001 DROP VIEW IF EXISTS `donaciones_por_paciente`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `donaciones_por_paciente` (
  `Paciente_ID` tinyint NOT NULL,
  `paciente` tinyint NOT NULL,
  `total_donado` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleado`
--

LOCK TABLES `empleado` WRITE;
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
INSERT INTO `empleado` VALUES (1,1,2,7,'2013-01-01'),(2,4,2,7,'2014-10-11');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'admin','admin@staff.com','0c7540eb7e65b553ec1ba6b20de79608','super','admin',1,'2014-11-23 15:36:23',6,1),(2,'paulMcCartney','sirJames@the4.org','0c7540eb7e65b553ec1ba6b20de79608','Sir James Paul','McCartney',1,'2014-11-04 21:07:50',5,1),(3,'ringoStarkey','ringo@gmail.com','0c7540eb7e65b553ec1ba6b20de79608','Richard','Starkey',1,'2014-10-31 12:12:12',5,1),(4,'McCubo','cubiascaceres@gmail.com','0c7540eb7e65b553ec1ba6b20de79608','Miguel','Cubias',1,'2014-11-09 15:04:45',6,1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuotas_cita`
--

DROP TABLE IF EXISTS `cuotas_cita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuotas_cita` (
  `id_cuotas_cita` int(11) NOT NULL AUTO_INCREMENT,
  `id_cita` int(11) NOT NULL,
  `monto_donacion` decimal(3,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id_cuotas_cita`),
  KEY `fk_cuotas_cita_cita_id` (`id_cita`),
  CONSTRAINT `fk_cuotas_cita_cita_id` FOREIGN KEY (`id_cita`) REFERENCES `cita` (`id_cita`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='cuotas voluntarias realizadas por el paciente';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuotas_cita`
--

LOCK TABLES `cuotas_cita` WRITE;
/*!40000 ALTER TABLE `cuotas_cita` DISABLE KEYS */;
/*!40000 ALTER TABLE `cuotas_cita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horario_empleado`
--

DROP TABLE IF EXISTS `horario_empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horario_empleado` (
  `id_horario_empleado` int(11) NOT NULL AUTO_INCREMENT,
  `id_empleado` int(11) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `dia_horario` int(11) NOT NULL,
  PRIMARY KEY (`id_horario_empleado`),
  KEY `fk_horario_empleado_empleado` (`id_empleado`),
  CONSTRAINT `fk_horario_empleado_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horario_empleado`
--

LOCK TABLES `horario_empleado` WRITE;
/*!40000 ALTER TABLE `horario_empleado` DISABLE KEYS */;
/*!40000 ALTER TABLE `horario_empleado` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receta_cita`
--

LOCK TABLES `receta_cita` WRITE;
/*!40000 ALTER TABLE `receta_cita` DISABLE KEYS */;
INSERT INTO `receta_cita` VALUES (1,1,1,2),(2,2,2,3),(3,2,3,6);
/*!40000 ALTER TABLE `receta_cita` ENABLE KEYS */;
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
  `fecha_creacion` date NOT NULL,
  `peso_pacientel` decimal(4,2) NOT NULL,
  `temperatura_paciente` decimal(3,2) NOT NULL,
  `presion_paciente` decimal(3,2) NOT NULL,
  `altura_paciente` decimal(3,2) NOT NULL,
  PRIMARY KEY (`id_cita`),
  KEY `fk_cita_estado_cita` (`id_estado_cita`),
  KEY `fk_cita_empleado` (`id_empleado`),
  KEY `fk_cita_paciente` (`id_paciente`),
  CONSTRAINT `fk_cita_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cita_estado_cita` FOREIGN KEY (`id_estado_cita`) REFERENCES `estado_cita` (`id_estado_cita`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cita_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cita`
--

LOCK TABLES `cita` WRITE;
/*!40000 ALTER TABLE `cita` DISABLE KEYS */;
INSERT INTO `cita` VALUES (1,1,1,'2013-11-23','09:15:00','10:30:00',1,'2014-10-25',0.00,0.00,0.00,0.00),(2,1,1,'2014-11-23','10:35:00','11:40:00',1,'2014-10-31',0.00,0.00,0.00,0.00),(3,2,1,'2014-11-23','13:30:00','15:30:00',2,'2014-11-01',0.00,0.00,0.00,0.00),(4,2,2,'2014-11-23','13:30:00','14:30:00',4,'2014-10-21',0.00,0.00,0.00,0.00),(5,1,2,'2014-11-23','08:45:00','09:15:00',1,'2014-10-21',0.00,0.00,0.00,0.00),(6,1,1,'2014-11-28','11:00:00','12:00:00',1,'2014-11-01',0.00,0.00,0.00,0.00),(7,1,1,'2014-11-26','13:40:00','14:30:00',3,'2014-11-01',0.00,0.00,0.00,0.00);
/*!40000 ALTER TABLE `cita` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `db_nazareth_clinic`.`disable_cita`
BEFORE DELETE ON `db_nazareth_clinic`.`cita`
FOR EACH ROW
BEGIN
    /* este trigger va a eliminar toda posible relacion dependiente
    de cita en otras. */
    DECLARE vid_comentario INT(11) DEFAULT 0;
    DECLARE vfinalizado INTEGER DEFAULT 0;    
    DECLARE cursor_comentario CURSOR FOR SELECT cc.id_cita_comentario FROM cita_comentario cc WHERE cc.id_cita = OLD.id_cita;
    /* Manejador de excepciones para el cursor */
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET vfinalizado = 1;
    OPEN cursor_comentario;
    comentario_loop: LOOP
        FETCH cursor_comentario INTO vid_comentario;
        IF (vfinalizado = 1) THEN
            LEAVE comentario_loop;
        END IF;
        DELETE FROM cita_comentario WHERE id_cita = OLD.id_cita;
    END LOOP comentario_loop;
    CLOSE cursor_comentario;
    DELETE FROM cuotas_cita WHERE id_cita = OLD.id_cita;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicina`
--

LOCK TABLES `medicina` WRITE;
/*!40000 ALTER TABLE `medicina` DISABLE KEYS */;
INSERT INTO `medicina` VALUES (1,'Metocarbamol',6,2,100,150,200,0.50,170),(2,'Acetaminofen',5,2,100,150,200,0.10,100),(3,'Metanfetamina',2,4,500,1500,1000,1.00,100);
/*!40000 ALTER TABLE `medicina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `tiempos_paciente`
--

/*!50001 DROP TABLE IF EXISTS `tiempos_paciente`*/;
/*!50001 DROP VIEW IF EXISTS `tiempos_paciente`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `tiempos_paciente` AS select `c`.`id_paciente` AS `paciente_id`,year(`c`.`fecha_cita`) AS `año_cita`,concat(`up`.`nombre`,' ',`up`.`apellido`) AS `paciente`,sum(((time_to_sec(`c`.`fin_hora_cita`) - time_to_sec(`c`.`inicio_hora_cita`)) / 60)) AS `tiempo_total_citas` from (((`cita` `c` join `paciente` `p` on((`p`.`id_paciente` = `c`.`id_paciente`))) join `usuario` `up` on((`up`.`id_usuario` = `p`.`id_usuario`))) join `estado_cita` `ec` on((`ec`.`id_estado_cita` = `c`.`id_estado_cita`))) group by `c`.`id_paciente`,year(`c`.`fecha_cita`) order by 4 desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `medicina_paciente`
--

/*!50001 DROP TABLE IF EXISTS `medicina_paciente`*/;
/*!50001 DROP VIEW IF EXISTS `medicina_paciente`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `medicina_paciente` AS select `m`.`id_medicina` AS `Medicina_ID`,`p`.`id_paciente` AS `Paciente_ID`,concat(`u`.`nombre`,' ',`u`.`apellido`) AS `Paciente`,`m`.`nombre` AS `Nombre de Medicina`,`cm`.`nombre` AS `Marca` from (((((`medicina` `m` join `receta_cita` `rc` on((`rc`.`id_medicina` = `m`.`id_medicina`))) join `cita` `c` on((`c`.`id_cita` = `rc`.`id_cita`))) join `paciente` `p` on((`p`.`id_paciente` = `c`.`id_paciente`))) join `usuario` `u` on((`u`.`id_usuario` = `p`.`id_usuario`))) join `casa_medica` `cm` on((`cm`.`id_casa_medica` = `m`.`id_casa_medica`))) order by `p`.`id_paciente` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `informacion_cita`
--

/*!50001 DROP TABLE IF EXISTS `informacion_cita`*/;
/*!50001 DROP VIEW IF EXISTS `informacion_cita`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `informacion_cita` AS select `c`.`id_cita` AS `cita_id`,`getPacienteNombre`(`p`.`id_paciente`) AS `paciente`,concat(`ue`.`nombre`,' ',`ue`.`apellido`) AS `empleado`,`c`.`fecha_cita` AS `fecha_de_cita`,`c`.`inicio_hora_cita` AS `hora_de_inicio`,`c`.`fin_hora_cita` AS `hora_de_fin`,`ec`.`nombre` AS `estado_cita`,`c`.`fecha_creacion` AS `fecha_creacion`,((time_to_sec(`c`.`fin_hora_cita`) - time_to_sec(`c`.`inicio_hora_cita`)) / 60) AS `duracion_minutos`,timediff(`c`.`fin_hora_cita`,`c`.`inicio_hora_cita`) AS `duracion_horas` from (((((`cita` `c` join `paciente` `p` on((`p`.`id_paciente` = `c`.`id_paciente`))) join `usuario` `up` on((`up`.`id_usuario` = `p`.`id_usuario`))) join `estado_cita` `ec` on((`ec`.`id_estado_cita` = `c`.`id_estado_cita`))) join `empleado` `emp` on((`emp`.`id_empleado` = `c`.`id_empleado`))) join `usuario` `ue` on((`ue`.`id_usuario` = `emp`.`id_usuario`))) order by `c`.`inicio_hora_cita` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `donaciones_por_paciente`
--

/*!50001 DROP TABLE IF EXISTS `donaciones_por_paciente`*/;
/*!50001 DROP VIEW IF EXISTS `donaciones_por_paciente`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `donaciones_por_paciente` AS select `p`.`id_paciente` AS `Paciente_ID`,concat(`up`.`nombre`,' ',`up`.`apellido`) AS `paciente`,sum(`cc`.`monto_donacion`) AS `total_donado` from (((`cuotas_cita` `cc` join `cita` `c` on((`c`.`id_cita` = `cc`.`id_cita`))) join `paciente` `p` on((`p`.`id_paciente` = `c`.`id_paciente`))) join `usuario` `up` on((`up`.`id_usuario` = `p`.`id_usuario`))) order by `p`.`id_paciente` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Dumping events for database 'db_nazareth_clinic'
--

--
-- Dumping routines for database 'db_nazareth_clinic'
--
/*!50003 DROP FUNCTION IF EXISTS `getPacienteEdad` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `getPacienteEdad`(paciente_id INT) RETURNS int(11)
BEGIN
    DECLARE i_edad_paciente INT(11);
    SELECT 
        DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(p.fecha_nacimiento)), '%Y')+0 AS edad 
        INTO
        i_edad_paciente
    FROM paciente p LIMIT 1;
    RETURN i_edad_paciente;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `getPacienteNombre` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `getPacienteNombre`(id_paciente INT) RETURNS varchar(250) CHARSET latin1
BEGIN
    DECLARE genero INT;
    DECLARE edad INT;
    DECLARE titulo VARCHAR(250) DEFAULT "";
    DECLARE nombre VARCHAR(250);
    SET edad = getPacienteEdad(id_paciente);
    SELECT u.genero, CONCAT(u.nombre, " ", u.apellido) 
        INTO genero, nombre 
    FROM paciente p inner join usuario u ON u.id_usuario = p.id_usuario
        WHERE p.id_paciente = id_paciente LIMIT 1;
    IF (genero = 1) THEN /* Masculino */
        IF (edad >= 18) THEN
            SET titulo = "Sr.";
        END IF;
    ELSE    /* paciente femenino */
        SET titulo = "Sra.";
        IF(edad <= 35) THEN
            SET titulo = "Srita.";
        END IF;
    END IF;
    return CONCAT(titulo, " ", nombre);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `insertar_cita_comentatio` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertar_cita_comentatio`(pid_cita INT, pcomentatio TEXT)
BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION, SQLWARNING
    BEGIN
        ROLLBACK;
    END;
START TRANSACTION;
    INSERT INTO cita_comentario(id_cita, comentario, fecha_comentario) 
    VALUES(pid_cita, pcomentario, NOW());
COMMIT;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-11-23 22:59:50
