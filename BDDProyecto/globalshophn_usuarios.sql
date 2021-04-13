-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: localhost    Database: globalshophn
-- ------------------------------------------------------
-- Server version	8.0.23

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
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `UsuarioId` int NOT NULL AUTO_INCREMENT,
  `UsuarioEmail` varchar(80) NOT NULL,
  `UsuarioNombre` varchar(80) NOT NULL,
  `UsuarioPswd` varchar(128) NOT NULL,
  `UsuarioFching` datetime NOT NULL,
  `UsuarioPswdEst` char(3) NOT NULL,
  `UsuarioPswdExp` datetime NOT NULL,
  `UsuarioEst` char(3) NOT NULL,
  `UsuarioActCod` varchar(128) NOT NULL,
  `UsuarioPswdChg` varchar(128) NOT NULL,
  `UsuarioTipo` char(3) NOT NULL COMMENT 'Tipo de Usuario, Normal, Consultor o Cliente',
  `ClienteDireccion` varchar(180) DEFAULT NULL,
  `ClienteTelefono` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`UsuarioId`),
  UNIQUE KEY `useremail_UNIQUE` (`UsuarioEmail`) USING BTREE,
  KEY `usertipo` (`UsuarioTipo`,`UsuarioEmail`,`UsuarioId`,`UsuarioEst`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (3,'daniel130300@outlook.com','Héctor Daniel López Borjas','$2y$10$vdBcHEPwoutPAMOLCvdl7uc2F9A6rZcqhR3m5TGTp2UPJuwBjYnEq','2021-03-27 01:01:53','ACT','2021-06-25 00:00:00','ACT','c4e2c5b551f00290d0c624ec38f0130a43057fda5d0f6675eb79049b9e1be9b3','2021-03-27 23:59:36','ADM',NULL,NULL),(5,'carlosordonez@gmail.com','Carlos Ordoñez','$2y$10$FwH0gIay75/YeCcEE3M0fe/F7/Msd7y6y8sUs3KEoTNs0XLzURidu','2021-03-27 18:21:04','ACT','2021-06-25 00:00:00','ACT','fb95eb1b5c7ae8c3a44dbd71f50e30cfcbbebff7380a3aab7df43e15396a5228','2021-03-27 18:21:04','ADM',NULL,NULL),(15,'dereck@gmail.com','Dereck Rene','$2y$10$JY7YeSWzx2wPsC7lbKunSOQPLjp31pHi5MQyGTYljJye4lnvNDAKO','2021-03-28 02:23:13','ACT','2021-06-27 00:00:00','ACT','6477083e60c447846ded52d1c689d91a6e0f4364b9e7b09196d68f5835d57418','2021-03-29 00:44:15','PBL',NULL,NULL),(17,'derek@gmail.com','Dereck Rene','$2y$10$drDgXq1CXRFQY530l9q4lONmOluVzJNVbiOh0ZwRMavzgYsi2mxwu','2021-03-29 00:44:32','ACT','2021-06-27 00:00:00','ACT','def9f2a384598886c07d31917000db74af8442067fc66333824f9e467d38049e','2021-03-29 00:44:32','PBL',NULL,NULL),(18,'luisfesadi@gmail.com','Luis Salgado','$2y$10$z5hrdr5lqI739UdLMnlxQOTVj/S0ZwF7uTBgJUhAL8SGSdv4E3Uti','2021-03-29 20:03:09','ACT','2021-06-27 00:00:00','ACT','9a3c245e027fd48ec3e195847ff9680065313fb78b74055b3b02c073f572336e','2021-03-29 20:06:51','ADM',NULL,NULL),(22,'asap@gmail.com','Asap Rocky','$2y$10$/yjQ7LdlvioUHIDwYthuJ.dK7EzYm7iwQiO6Jo7Qxj00MD0dMA7zC','2021-03-30 00:08:27','ACT','2021-06-28 00:00:00','ACT','a0e1b79242e3ebd89386b9f0487940664b1bbf8f74cd0f2332b4373f12eb1ee6','2021-03-30 00:08:27','PBL',NULL,NULL),(23,'tyler@gmail.com','Tyler','$2y$10$656ybmiNovgkwz0tDBYSPuxrkjYzrjdkvxKBp0iUHDkWQ.f16ulwe','2021-04-01 23:50:40','ACT','2021-06-30 00:00:00','ACT','a224ebc58e82237c8ea7900cd11363f1336855fbb5e1e6538c77c8dbf3385eda','2021-04-01 23:50:40','PBL',NULL,NULL),(24,'fersen@gmail.com','Fersen Villatoro','$2y$10$qemGBQm5AmBUKy9oGOpYWuPKfxe9XZ2owBLDozdhFO4BMvrjsep3m','2021-04-08 19:45:39','ACT','2021-07-07 00:00:00','ACT','fc5f7b9bf696c052d7fa49d0545b6ddfae53b66c44e1c436f6226d1613ed9df2','2021-04-08 19:45:39','ADM',NULL,NULL),(25,'luijum@gmail.com','Luijum Martinez','$2y$10$qqJhcssFl4ci.rhT8AYn/.s4gC0ptKvvdgWvfPFR7RtDjvB2Nu2SO','2021-04-09 22:46:18','ACT','2021-07-08 00:00:00','ACT','29ab6d42734715b6040ce60e20e7e7f4bd989dcb87888c042dc157022c3de321','2021-04-09 22:46:18','PBL',NULL,NULL),(26,'juancarlos@gmail.com','Juan Carlos Ordoñez','$2y$10$4feFzpQwoK2mTtADwunWi.H2IJjA0FtNX0O8.y7GEKX4YKAUUNGhC','2021-04-12 22:15:45','ACT','2021-07-11 00:00:00','ACT','7200c874dafa419208fedc53947f5fdaf6e1fd8cc0ecfad666dbd30c988c3aa8','2021-04-12 22:15:45','PBL',NULL,NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-12 22:58:13
