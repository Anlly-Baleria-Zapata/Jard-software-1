-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: projard
-- ------------------------------------------------------
-- Server version	8.0.33

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
-- Table structure for table `ubicacion`
--

DROP TABLE IF EXISTS `ubicacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ubicacion` (
  `num_hoja_de_vida_equipo` int NOT NULL AUTO_INCREMENT,
  `id_equipo` varchar(50) NOT NULL,
  `ubicacion` varchar(100) DEFAULT 'Desconocido',
  PRIMARY KEY (`num_hoja_de_vida_equipo`),
  KEY `fk_ubicacion_rlhv_e` (`id_equipo`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ubicacion`
--

LOCK TABLES `ubicacion` WRITE;
/*!40000 ALTER TABLE `ubicacion` DISABLE KEYS */;
INSERT INTO `ubicacion` VALUES (2,'EQUIPO123','empleado'),(3,'equipo145','empleado'),(4,'44444','tecnico_sistemas'),(5,'44444','tecnico_sistemas'),(6,'44444','tecnico_sistemas'),(7,'44444','tecnico_sistemas'),(8,'77','gerencia'),(9,'97757999','gerencia'),(10,'97757999','gerencia'),(11,'97757999','gerencia'),(12,'97757999','gerencia'),(13,'97757999','gerencia'),(14,'97757999','gerencia'),(15,'97757999','gerencia'),(16,'97757999','gerencia'),(17,'97','empleado'),(18,'97','empleado'),(19,'97','empleado'),(20,'97','empleado'),(21,'9','Desconocido'),(22,'657736','Desconocido'),(23,'657736','Desconocido'),(24,'657736','Desconocido'),(25,'657736','Desconocido'),(26,'657736','Desconocido'),(27,'657736','Desconocido'),(28,'657736','Desconocido'),(29,'657736','Desconocido'),(30,'657736','Desconocido'),(31,'657736','Desconocido'),(32,'657736','Desconocido'),(33,'9','Desconocido'),(34,'657736','Desconocido'),(35,'657736','Desconocido'),(36,'657736','Desconocido'),(37,'657736','Desconocido'),(38,'657736','Desconocido'),(39,'9','Desconocido'),(40,'9','Desconocido'),(41,'9','Desconocido'),(42,'9','Desconocido'),(43,'9','Desconocido'),(44,'9','Desconocido'),(45,'9','Desconocido'),(46,'9','Desconocido'),(47,'9','Desconocido'),(48,'9','Desconocido'),(49,'9','Desconocido'),(50,'9','Desconocido'),(51,'9','Desconocido'),(52,'9','Desconocido'),(53,'9','Desconocido'),(54,'657736','Desconocido'),(55,'9','Desconocido'),(56,'9','Desconocido'),(57,'6385','Desconocido'),(58,'9','Desconocido'),(59,'9','Desconocido'),(60,'9','Desconocido'),(61,'1782','Desconocido'),(62,'9','Desconocido'),(63,'9','Desconocido'),(64,'9','Desconocido'),(65,'9','Desconocido'),(66,'9','Desconocido'),(67,'9','Desconocido'),(68,'9','Desconocido'),(69,'9','Desconocido'),(70,'9','Desconocido'),(71,'9','Desconocido'),(72,'9','Desconocido'),(73,'9','Desconocido'),(74,'9','Desconocido'),(75,'9','Desconocido'),(76,'9','Desconocido'),(77,'9','Desconocido'),(78,'9','Desconocido'),(79,'9','Desconocido'),(80,'9','Desconocido'),(81,'1782','Desconocido'),(82,'9','Desconocido'),(83,'9','Desconocido'),(84,'9','Desconocido'),(85,'9','Desconocido'),(86,'9','Desconocido'),(87,'9','Desconocido'),(88,'9','Desconocido'),(89,'9','Desconocido'),(90,'9','Desconocido'),(91,'9','Desconocido'),(92,'9','Desconocido'),(93,'9','Desconocido'),(94,'9','Desconocido'),(95,'9','Desconocido'),(96,'9','Desconocido'),(97,'9','Desconocido'),(98,'9','Desconocido'),(99,'9','Desconocido'),(100,'9','Desconocido'),(101,'9','Desconocido'),(102,'657736','Desconocido'),(103,'9','Desconocido'),(104,'657736','Desconocido'),(105,'9','Desconocido'),(106,'9','Desconocido'),(107,'9','Desconocido'),(108,'9','Desconocido'),(109,'9','Desconocido'),(110,'9','Desconocido'),(111,'9','Desconocido');
/*!40000 ALTER TABLE `ubicacion` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-01-18 15:25:04
