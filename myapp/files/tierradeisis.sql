-- MySQL dump 10.13  Distrib 5.5.38, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: tierradeisis
-- ------------------------------------------------------
-- Server version	5.5.38-0ubuntu0.14.04.1

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
  `technique` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `dimension` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `state` tinyint(1) DEFAULT NULL,
  `img` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (3,1,9,'In Rainbows','',2014,'Acrílico sobre canvas','Diámetro  ',0,'tierra_de_isis08.jpg'),(59,5,5,'Hostal Ecoart','Viña del mar, Chile',2014,'Esmalte al agua sobre muro, Rocanegra, Termas de Chillan',',,,',0,'533878_10151839052487729_1814570923_n.jpg'),(50,1,4,'Hug your Fears','Barcelona ',2015,'Acrilicos sobre madera','2,40 mts x 2 mts',1,'FullSizeRender(2).jpg'),(4,1,10,'Ella baila sola','',2014,'Acrílico y rotuladores sobre canvas','28 x 22 cm',0,'tierra_de_isis11.jpg'),(5,1,11,'El monstruito','',2014,'Acrílico y rotuladores sobre canson','28 x 22 cm',0,'monstrito_web.jpg'),(6,1,12,'Carrusel','',2013,'Acrílico sobre canvas','Diámetro  50 cm',0,'circular_tres_web.jpg'),(7,1,13,'Guerrera de la luz l','',2015,'Oleo sobre canvas','1.20 mt x 80 cm',1,'guerrera_de_luz_web.jpg'),(26,5,9,'Makeup art studio.','Escuela de maquillaje Makeup Art Studio, Santiago de Chile',2012,'Esmalte al agua sobre muro','3 mts 12 mts',0,'makeupartstudioweb.jpg'),(11,1,16,'Panorama','',2012,'Acrílico sobre canvas','70 x 50 cm',0,'panorama_web.jpg'),(12,1,17,'Silvestre','',2014,'Acrílico sobre canvas','Diámetro  50 cm',0,'circular_dos_web.jpg'),(13,1,14,'El embotellado','',2012,'Acrílico y rotuladores sobre papel','28 x 22 cm',0,'el_embotellado_web.jpg'),(14,1,15,'Esperanza','',2014,'Acrílico sobre madera','3 x 2 mt',0,'mural_dos_web.jpg'),(15,1,20,'Cinco y media','',2015,'Acrílico sobre canvas','Diámetro  50 cm',0,'cinco_y_media_web.jpg'),(16,1,21,'Ventana al Infinito','',2014,'Acrílico sobre canvas','0.7 x 2.35 mt ',0,'bg_1280x380.jpg'),(17,1,18,'La Muerte','',2014,'Acrílico sobre canvas','70 x 45 cm',0,'elefante_web.jpg'),(22,5,7,'EL TERCER OJO','',2013,'Esmalte al agua sobre muro, Ecoart Hostal, Viña del Mar','4 mtsx 1,50mts',1,'mural_web.jpg'),(19,1,19,'Sonqo y mantra','',2015,'Acrílico y rotuladores sobre canson','80 x 40 cm',0,'tierra_de_isis02.jpg'),(24,5,6,'braquiosaurio Del Tercer ojo','',2014,'Esmalte al agua sobre muro, Ecoart Hostal, Viña del Mar','4 mtsx 1,50mts',1,'braqueosauriodeltercerojoweb.jpg'),(25,5,8,'Makeup art studio ',' Escuela de maquillaje Makeup art Studio,Santiago chile',2012,'Esmalte al agua sobre muro','3 mts 12 mts',1,'makeartstudioweb.jpg'),(27,5,10,'Cafe Dominica 54','Santiago de Chile',2010,'Esmalte al agua sobre muro texturado','2,40 mts x 5 mts aprox',0,'dominica54cafeweb.jpg'),(28,5,11,'Pepper\'s Cafe','Santiago de Chile',2010,'Esmalte al agua sobre muro','2,40 mts x 2 mts aprox',0,'Pepper\'scafeweb.jpg'),(29,6,NULL,'Cosa de Piratas','Mesa lateral de madera',2012,'Acrilicos sobre mesa de madera','...',0,'293755_10150877700362729_715741840_n.jpg'),(30,6,NULL,'Cosa de Piratas.','',2012,'Acrilicos sobre mesa de madera','...',0,'374108_10150874318727729_656249713_n.jpg'),(31,6,NULL,'Golden dream','',2012,'Acrilicos sobre mesa de madera','...',0,'198371_10151204820697729_820093934_n.jpg'),(32,6,NULL,'Cierva reina','',2014,'Acrilicos sobre sillon de madera','...',0,'10330485_10152778833552729_4644458845075816495_n.jpg'),(33,6,NULL,'Cierva reina lateral','',2012,'Acrilicos sobre sillon de madera','...',0,'1002690_10152778833362729_7660981727275132247_n.jpg'),(34,6,NULL,'Cierva reina lateral.','',2012,'Acrilicos sobre sillon de madera','...',0,'10269428_10152778833162729_6598086970696253468_n.jpg'),(35,6,NULL,'Telon','',2012,'Acrilicos sobre mesa de madera normando','...',0,'525774_10151138650697729_514439181_n.jpg'),(36,6,NULL,'Dream a little dream','',2013,'Acrilicos sobre mesa de madera','...',0,'577082_10151381181032729_2107579488_n.jpg'),(37,6,NULL,'Afro','',2012,'Acrilicos sobre mesa de madera','...',0,'576549_10150987662522729_1772264708_n.jpg'),(38,6,NULL,'Dress in red','',2012,'Acrilicos sobre mesa de madera normando','...',0,'525797_10151098140572729_1166111921_n.jpg'),(39,6,NULL,'Love island','',2012,'Acrilicos sobre mesa de madera','...',0,'401573_10150938210842729_1311043503_n.jpg'),(40,6,NULL,'Elephant','',2012,'Acrilicos sobre mesa de madera','...',0,'577136_10151447954227729_1535143086_n.jpg'),(53,9,8,'Botas de cuero','Santiago, Chile',2010,'acrilico y rotuladores sobre cuero','talla 38',0,'40980_426553747170_2300088_n.jpg'),(52,9,10,'zapatillas tipo victoria','Formentera ',2007,'acrilico y rotuladores sobre lona','talla 37',0,'1910443_38522302728_6106_n(1).jpg'),(51,5,1,'Despierta ',' Barcelona, espai jove Bocanord',0,'pintura plastica sobre muro','...',1,'muralespaijovebocanorddip.jpg'),(54,9,11,'zapatillas ','santiago, chile',2010,'acrilico y rotuladores sobre lona','talla 37',0,'148285_480825977170_3025781_n.jpg'),(55,9,13,'botas cuero','Santiago,Chile',2010,'acrilico y rotuladores sobre cuero','talla 38',1,'44717_428363107170_8110536_n.jpg'),(56,9,9,'Botas cuero','Concepcion, Chile',2011,'acrilico  rotuladores y barniz sobre cuero','talla 39',0,'40980_426553737170_3439082_n.jpg'),(57,9,12,'zapatillas lona','Barcelona',2008,'acrilico y rotuladores sobre lona','talla 40',0,'1910443_38522252728_2943_n.jpg'),(58,9,15,'Zapatillas lona','Barcelona',2007,'acrilico y rotuladores sobre lona','talla 37',0,'1910443_38522337728_8244_n.jpg'),(60,9,14,'zapatillas lona tipo botines','Santiago, Chile',2010,'acrilico y rotuladores sobre lona','talla 39',0,'62569_439262372170_6546193_n.jpg'),(61,5,2,'Mural \"murs lliures\", Barcelona, (selva de mar-peru)','Barcelona, España',2015,'pintura plastica sobre muro','...',1,'muralweb.jpg'),(62,5,3,'Flor de la vida','Kaia, Urubamaba, Valle Sagrado, Peru',2015,'pintura plastica sobre muro','...',1,'muralkaiawebperu.jpg'),(63,5,4,'Flor de la vida en Kaia','Urumabamba, Valle Sagrado, Peru',2015,'pintura plastica sobre muro','...',1,'kaia1detalleflordelavidaweb.jpg'),(64,1,3,'Mujer Infinta','Barcelona, España',2015,'Acrilicos sobre papel reciclado','..',1,'mujerinfinitaweb.jpg'),(65,1,5,'Universo','Viña del Mar, Chile',2013,'Acrilicos sobre lienzo','70 cm diametro',0,'universo.jpg'),(66,1,6,'Ella','Concon,Chile',2014,'Acrilicos sobre madera','30x30 cm',1,'ellaweb.jpg'),(67,1,7,'Fantasia','Viña del Mar, Chile',2013,'Acrilicos sobre lienzo','120x80cm',0,'carruselweb.jpg'),(68,1,8,'Renacer entre las Hierbas','Concon, Chile',2015,'Oleo sobre lienzo','1mtx1mt',1,'Renacerentrelashierbasweb.jpg'),(69,5,NULL,'Mural Rocanegra','Las Trancas, Termas de Chillan',2014,'Esmalte al agua sobre muro','...',1,'muralrocanegraweb.jpg'),(70,5,NULL,'Madre Tierra','Ocholoco, Las Trancas, Termas de Chillan',2014,'Esmalte al agua sobre muro','...',1,'muralocholocoweb.jpg'),(71,1,1,'Transformacion','con-con, Chile',2015,'Acrilicos sobre lienzo','...',0,'Prism-Port.png'),(72,9,1,'zapas','Barcelona, España',2007,'acrilico y rotuladores sobre lona','talla 38',0,'2426_80151817728_7142_n.jpg'),(73,9,4,'mas zapas','Barcelona',2007,'acrilico y rotuladores sobre lona','talla 39',0,'2529_55408417170_1162349_n.jpg'),(74,9,3,'more zapas','Barcelona',2007,'acrilico y rotuladores sobre lona','talla 40',0,'2426_80151812728_6648_n.jpg'),(75,9,2,'zapas mas','Barcelona',2007,'acrilico y rotuladores sobre lona','talla 39',0,'2426_80151807728_6216_n.jpg'),(76,9,5,'tillas','Barcelona',2007,'acrilico y rotuladores sobre lona','talla 37',0,'163024_479797292170_558708_n.jpg'),(77,9,7,'zapaa','Santiago, Chile',2008,'acrilico y rotuladores sobre cuero','talla 37',0,'39509_417483827170_4231596_n.jpg'),(78,9,6,'zapatillas enchuladas','Santiago,Chile',2010,'acrilico y rotuladores sobre lona','talla 38',0,'207754_10150130861972171_5497114_n.jpg'),(79,1,2,'zapas tipo bota','Santiago,chile',2011,'acrilico y rotuladores sobre lona',',,,',0,'76861_463187212170_4214457_n.jpg');
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
  `category` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Pinturas'),(6,'Muebles Pintados'),(5,'Murales'),(9,'Kaminart');
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,3,'Christopher','Troc Soto','christopher.troc@gmail.com','2015-07-29 19:27:02'),(2,4,'Isidora ','Celis','tierradeisis@gmail.com','2015-07-30 00:15:40');
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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_login`
--

LOCK TABLES `users_login` WRITE;
/*!40000 ALTER TABLE `users_login` DISABLE KEYS */;
INSERT INTO `users_login` VALUES (1,'tierradeisis','1fb2113633acf7fc6b78fc306f86c371','',5,1),(3,'christopher.troc@gmail.com','2d4d0ca1f415b15cda7dca0a5742d997','1bdb7c8914',1,1),(4,'tierradeisis@gmail.com','8e30f319886949761df8060aab4182eb','986caf2ebb',1,1);
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

-- Dump completed on 2015-12-21 16:28:44
