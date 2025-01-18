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
-- Table structure for table `depreciacion`
--

DROP TABLE IF EXISTS `depreciacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `depreciacion` (
  `num_hoja_de_vida_equipo` int NOT NULL AUTO_INCREMENT,
  `Costo_computador` decimal(10,2) DEFAULT '0.00',
  `Valor_de_rescate` decimal(10,2) DEFAULT '0.00',
  `total_de_unidades_estimadas_durante_la_vida_útil_del_computador` int DEFAULT '0',
  `resultado` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`num_hoja_de_vida_equipo`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `depreciacion`
--

LOCK TABLES `depreciacion` WRITE;
/*!40000 ALTER TABLE `depreciacion` DISABLE KEYS */;
INSERT INTO `depreciacion` VALUES (2,444.00,300000.00,1,-299556.00),(3,340000.00,100000.00,9,26666.67),(4,44.00,23.00,2,10.50),(5,67376.00,7283.00,342,175.71),(6,64665.00,64345.00,62375,0.01),(7,0.00,0.00,0,NULL),(8,0.00,0.00,0,NULL),(9,0.00,0.00,0,NULL),(10,0.00,0.00,0,NULL),(11,0.00,0.00,0,NULL),(12,0.00,0.00,0,NULL),(13,0.00,0.00,0,NULL),(14,0.00,0.00,0,NULL),(15,0.00,0.00,0,NULL),(16,0.00,0.00,0,NULL),(17,0.00,0.00,0,NULL),(18,0.00,0.00,0,NULL),(19,0.00,0.00,0,NULL),(20,0.00,0.00,0,NULL),(21,0.00,0.00,0,NULL),(22,0.00,0.00,0,NULL),(23,0.00,0.00,0,NULL),(24,0.00,0.00,0,NULL),(25,0.00,0.00,0,NULL),(26,0.00,0.00,0,NULL),(27,0.00,0.00,0,NULL),(28,0.00,0.00,0,NULL),(29,0.00,0.00,0,NULL),(30,0.00,0.00,0,NULL),(31,0.00,0.00,0,NULL),(32,0.00,0.00,0,NULL),(33,0.00,0.00,0,NULL),(34,0.00,0.00,0,NULL),(35,0.00,0.00,0,NULL),(36,0.00,0.00,0,NULL),(37,0.00,0.00,0,NULL),(38,0.00,0.00,0,NULL),(39,0.00,0.00,0,NULL),(40,0.00,0.00,0,NULL),(41,0.00,0.00,0,NULL),(42,0.00,0.00,0,NULL),(43,0.00,0.00,0,NULL),(44,0.00,0.00,0,NULL),(45,0.00,0.00,0,NULL),(46,0.00,0.00,0,NULL),(47,0.00,0.00,0,NULL),(48,0.00,0.00,0,NULL),(49,0.00,0.00,0,NULL),(50,0.00,0.00,0,NULL),(51,0.00,0.00,0,NULL),(52,0.00,0.00,0,NULL),(53,0.00,0.00,0,NULL),(54,0.00,0.00,0,NULL),(55,0.00,0.00,0,NULL),(56,0.00,0.00,0,NULL),(57,0.00,0.00,0,NULL),(58,0.00,0.00,0,NULL),(59,0.00,0.00,0,NULL),(60,0.00,0.00,0,NULL),(61,0.00,0.00,0,NULL),(62,0.00,0.00,0,NULL),(63,0.00,0.00,0,NULL),(64,0.00,0.00,0,NULL),(65,0.00,0.00,0,NULL),(66,0.00,0.00,0,NULL),(67,0.00,0.00,0,NULL),(68,0.00,0.00,0,NULL),(69,0.00,0.00,0,NULL),(70,0.00,0.00,0,NULL),(71,0.00,0.00,0,NULL),(72,0.00,0.00,0,NULL),(73,0.00,0.00,0,NULL),(74,0.00,0.00,0,NULL),(75,0.00,0.00,0,NULL),(76,0.00,0.00,0,NULL),(77,0.00,0.00,0,NULL),(78,0.00,0.00,0,NULL),(79,0.00,0.00,0,NULL),(80,0.00,0.00,0,NULL),(81,0.00,0.00,0,NULL),(82,0.00,0.00,0,NULL),(83,0.00,0.00,0,NULL),(84,0.00,0.00,0,NULL),(85,0.00,0.00,0,NULL),(86,0.00,0.00,0,NULL),(87,0.00,0.00,0,NULL),(88,0.00,0.00,0,NULL),(89,0.00,0.00,0,NULL),(90,0.00,0.00,0,NULL),(91,0.00,0.00,0,NULL),(92,0.00,0.00,0,NULL),(93,0.00,0.00,0,NULL),(94,0.00,0.00,0,NULL),(95,0.00,0.00,0,NULL),(96,0.00,0.00,0,NULL),(97,0.00,0.00,0,NULL),(98,0.00,0.00,0,NULL),(99,0.00,0.00,0,NULL),(100,0.00,0.00,0,NULL),(101,0.00,0.00,0,NULL),(102,0.00,0.00,0,NULL),(103,0.00,0.00,0,NULL),(104,0.00,0.00,0,NULL),(105,0.00,0.00,0,NULL),(106,0.00,0.00,0,NULL),(107,0.00,0.00,0,NULL),(108,0.00,0.00,0,NULL),(109,0.00,0.00,0,NULL),(110,0.00,0.00,0,NULL),(111,0.00,0.00,0,NULL);
/*!40000 ALTER TABLE `depreciacion` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-01-18 15:25:03
