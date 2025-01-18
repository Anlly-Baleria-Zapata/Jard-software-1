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
-- Table structure for table `informacion_roles`
--

DROP TABLE IF EXISTS `informacion_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `informacion_roles` (
  `id_rol` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `identificacion` varchar(45) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  PRIMARY KEY (`id_rol`),
  UNIQUE KEY `identificacion_UNIQUE` (`identificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `informacion_roles`
--

LOCK TABLES `informacion_roles` WRITE;
/*!40000 ALTER TABLE `informacion_roles` DISABLE KEYS */;
INSERT INTO `informacion_roles` VALUES (1,'anlly','123','$2y$10$PBI2/HdGSHbHHWGWGAPQzO0s3zKvnIvqDbmBxK9dN6VaW1jCyyNZ6'),(2,'mailove','345','$2y$10$Bq73.q09RDHKvUVqdFnXMO/ZMtoggVFJ9G2di7VygG3jJCF3d9QIm'),(4,'anlly','0','$2y$10$FUh2yF.Lm4z/EJHbs4Z34eaUuRXknVe6CORQ6jTHNcmOsxxXvDICK'),(5,'verde melon','56','$2y$10$uCL1RQGtxJiz9LCnRn5w6ebBqs4vvZaj1xgGdELyj6vbUyXGCDJie'),(6,'aqua','3','$2y$10$NehEcouC1tQLr5ZATCt4PegGygrACFm4ltZilhC0cV6fZg17oF./m'),(7,'maika','9','$2y$10$XkvtpgpC/PgtlsxSheqMYOf9o5stuheP8O520ICjmumsHMD/DAl9K'),(8,'2','2','$2y$10$YTOcc.QiOwA5Dxx.SDeose9SurOO4WOMCqU3dRv8Wy300iBYxToH2'),(9,'e','7','$2y$10$oj4R3dk4ZAYBpYqJPSm1BunB1G20d/K2e9QejS2tQb05eoh40Adwe'),(11,'mari','12','$2y$10$Q0krfLKK0W2Kb8eGqLf65ufTj7PJ0naRpwA/kzpNUnrqm7fTxFzHO');
/*!40000 ALTER TABLE `informacion_roles` ENABLE KEYS */;
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
