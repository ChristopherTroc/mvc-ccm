-- MySQL dump 10.13  Distrib 5.5.47, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: ccm
-- ------------------------------------------------------
-- Server version	5.5.47-0ubuntu0.14.04.1

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
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_category` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `title` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `description` text COLLATE utf8_spanish_ci,
  `date` smallint(6) DEFAULT NULL,
  `img` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `url` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (4,2,1,'Foto 1','  ',2014,'11.jpg',''),(5,3,NULL,'Titulo 2','  ',2015,'1.jpg',''),(9,3,NULL,'Foto 2','',2016,'9.jpg',''),(8,2,NULL,'Foto 2',' ',2016,'11.jpg',''),(10,5,NULL,'Foto 1 album 4','',2016,'4.jpg',''),(13,4,NULL,'articulo 3',' ',2016,'8.jpg',''),(15,5,NULL,'Titulo ab 4','',2014,'2.jpg',''),(16,2,NULL,'nada','     ',2015,NULL,'https://player.vimeo.com/video/138523086'),(17,2,NULL,'foto 4','',2016,'5.jpg','');
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idFront` int(11) DEFAULT NULL,
  `category` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (2,4,'Album 1'),(3,5,'Album 2'),(4,13,'Album 3'),(5,15,'Album 4');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_login` bigint(20) DEFAULT NULL,
  `name` varchar(200) NOT NULL DEFAULT '',
  `last_name` varchar(200) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `date_income` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_login`
--

DROP TABLE IF EXISTS `users_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_login` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `activation_key` varchar(100) NOT NULL DEFAULT '',
  `user_level` int(1) NOT NULL DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_login`
--

LOCK TABLES `users_login` WRITE;
/*!40000 ALTER TABLE `users_login` DISABLE KEYS */;
INSERT INTO `users_login` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3','',5,1);
/*!40000 ALTER TABLE `users_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `web`
--

DROP TABLE IF EXISTS `web`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `web` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `footer` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `aboutme` text COLLATE utf8_spanish_ci,
  `link_facebook` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `link_instagram` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `key_words` varchar(400) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `web`
--

LOCK TABLES `web` WRITE;
/*!40000 ALTER TABLE `web` DISABLE KEYS */;
INSERT INTO `web` VALUES (1,'Tierra de Isis','Copyright © Isis Art. 2015 ','Crear, imaginar, fantasear, y sanar. Viajan a través de los pinceles sobre diferentes superficies, sorprendiendo con mensajes mágicos y misteriosos.\r<br>\r<br>Isis viene de mi nombre original Isidora, se refugia en la idea de generar un mundo paralelo de fantasías e imágenes surrealistas que te invitan a despertar tu propia imaginación, entendiendo que todo es posible en tu mente universo.\r<br>\r<br>Tierra de Isis nace de una trayectoria autodidacta con el apoyo inicial de Sergio Martinez, pintor Chileno nacido en Concepción en los años 1998-2002. Trabajando en esa época en la técnica de figura humana sobre cansón con carboncillos, Dando lugar a una expo colectiva en el charles de Gaulle el año 2002.\r<br>\r<br>El año 2003 trabajé en el taller de Carlos Salazar conociendo la técnica del acrílico sobre tela, plasmando con el concepto de transparencias, dando lugar a una expo en el estadio Palestino de Santiago de Chile, el mismo año.\r<br>\r<br>Entre los años 2003-2008 me dedique a viajar observar y llenarme de arte urbano, un recorrido por diferentes lugares de América del sur y Europa Dando lugar a diferentes exposiciones tales como El Despertar, Punta Ayampe(Montañita), Ecuador en el 2003. Colorinjection en la ciudad de Concepción en el año 2006. Isis ART en la tienda de diseño Tonik, Barcelona, España. Kaminart en La Mola en la isla Formentera, España.\r<br>\r<br>El 2006 en la ciudad de Barcelona nace Kaminart, caminar con arte, una propuesta que nació como forma de llegar a viajeros a los amantes de la calle, caminatas y travesía. Utilizando un formato práctico y más que nada necesario, zapatillas botas y otros. Minimundos plasmados en los pies pintados con acrílicos y rotuladores.\r<br>\r<br>En el año 2008 aterrizando en chile logro centralizar mi obra en muebles y telas. Dando lugar a Fantasía una expo en el Centro de Arte alameda el año 2013 en Santiago de Chile, inaugurando en lo que hoy se focaliza mi obra.\r<br>\r<br>Actualmente continúo trabajando y comercializando mi obra, para comenzar una nueva etapa en septiembre de este año residiendo en Barcelona.\r<br>\r<br>','https://www.facebook.com/pages/Tierra-de-Isis/756914714352810?fref=ts','https://instagram.com/tierradeisis','pinturas, oleos, acrilicos, surealismo, arte, lowbrou,surrealismo magico,zapatillas pintadas,muebles pintados');
/*!40000 ALTER TABLE `web` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-01-28 11:34:23
