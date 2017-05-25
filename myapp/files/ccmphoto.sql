-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 25, 2017 at 02:29 PM
-- Server version: 5.7.17
-- PHP Version: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ccmphoto`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `id_category` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `title` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `description` text COLLATE utf8_spanish_ci,
  `date` smallint(6) DEFAULT NULL,
  `img` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `url` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `id_category`, `position`, `title`, `description`, `date`, `img`, `url`) VALUES
(4, 2, 1, 'Foto 1', '  ', 2014, '11.jpg', ''),
(5, 3, NULL, 'Titulo 2', '  ', 2015, '1.jpg', ''),
(9, 3, NULL, 'Foto 2', '', 2016, '9.jpg', ''),
(8, 2, NULL, 'Foto 2', ' ', 2016, '11.jpg', ''),
(10, 5, NULL, 'Foto 1 album 4', '', 2016, '4.jpg', ''),
(13, 4, NULL, 'articulo 3', ' ', 2016, '8.jpg', ''),
(15, 5, NULL, 'Titulo ab 4', '', 2014, '2.jpg', ''),
(16, 2, NULL, 'nada', '     ', 2015, NULL, 'https://player.vimeo.com/video/138523086'),
(17, 2, NULL, 'foto 4', '', 2016, '5.jpg', ''),
(19, 2, NULL, 'Probando', 'vos vela !!!', 2014, 'controler_dead.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `idFront` int(11) DEFAULT NULL,
  `category` varchar(200) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `idFront`, `category`) VALUES
(2, 4, 'Album 1'),
(3, 5, 'Album 2'),
(4, 13, 'Album 3'),
(5, 15, 'Album 4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_login` bigint(20) DEFAULT NULL,
  `name` varchar(200) NOT NULL DEFAULT '',
  `last_name` varchar(200) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `date_income` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users_login`
--

CREATE TABLE `users_login` (
  `id` bigint(10) UNSIGNED NOT NULL,
  `login` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `activation_key` varchar(100) NOT NULL DEFAULT '',
  `user_level` int(1) NOT NULL DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_login`
--

INSERT INTO `users_login` (`id`, `login`, `password`, `activation_key`, `user_level`, `active`) VALUES
(2, 'root', 'fd5ba907392066bc4fc27723a350b573', '', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `web`
--

CREATE TABLE `web` (
  `id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `footer` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `aboutme` text COLLATE utf8_spanish_ci,
  `link_facebook` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `link_instagram` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `key_words` varchar(400) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `web`
--

INSERT INTO `web` (`id`, `title`, `footer`, `aboutme`, `link_facebook`, `link_instagram`, `key_words`) VALUES
(1, 'CCM Photo', 'Copyright © CCM PHOTO 2017 ', 'Crear, imaginar, fantasear, y sanar. Viajan a través de los pinceles sobre diferentes superficies, sorprendiendo con mensajes mágicos y misteriosos.\r<br>\r<br>Isis viene de mi nombre original Isidora, se refugia en la idea de generar un mundo paralelo de fantasías e imágenes surrealistas que te invitan a despertar tu propia imaginación, entendiendo que todo es posible en tu mente universo.\r<br>\r<br>Tierra de Isis nace de una trayectoria autodidacta con el apoyo inicial de Sergio Martinez, pintor Chileno nacido en Concepción en los años 1998-2002. Trabajando en esa época en la técnica de figura humana sobre cansón con carboncillos, Dando lugar a una expo colectiva en el charles de Gaulle el año 2002.\r<br>\r<br>El año 2003 trabajé en el taller de Carlos Salazar conociendo la técnica del acrílico sobre tela, plasmando con el concepto de transparencias, dando lugar a una expo en el estadio Palestino de Santiago de Chile, el mismo año.\r<br>\r<br>Entre los años 2003-2008 me dedique a viajar observar y llenarme de arte urbano, un recorrido por diferentes lugares de América del sur y Europa Dando lugar a diferentes exposiciones tales como El Despertar, Punta Ayampe(Montañita), Ecuador en el 2003. Colorinjection en la ciudad de Concepción en el año 2006. Isis ART en la tienda de diseño Tonik, Barcelona, España. Kaminart en La Mola en la isla Formentera, España.\r<br>\r<br>El 2006 en la ciudad de Barcelona nace Kaminart, caminar con arte, una propuesta que nació como forma de llegar a viajeros a los amantes de la calle, caminatas y travesía. Utilizando un formato práctico y más que nada necesario, zapatillas botas y otros. Minimundos plasmados en los pies pintados con acrílicos y rotuladores.\r<br>\r<br>En el año 2008 aterrizando en chile logro centralizar mi obra en muebles y telas. Dando lugar a Fantasía una expo en el Centro de Arte alameda el año 2013 en Santiago de Chile, inaugurando en lo que hoy se focaliza mi obra.\r<br>\r<br>Actualmente continúo trabajando y comercializando mi obra, para comenzar una nueva etapa en septiembre de este año residiendo en Barcelona.\r<br>\r<br>', 'https://www.facebook.com/pages/Tierra-de-Isis/756914714352810?fref=ts', 'https://instagram.com/tierradeisis', 'pinturas, oleos, acrilicos, surealismo, arte, lowbrou,surrealismo magico,zapatillas pintadas,muebles pintados');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_login`
--
ALTER TABLE `users_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web`
--
ALTER TABLE `web`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users_login`
--
ALTER TABLE `users_login`
  MODIFY `id` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `web`
--
ALTER TABLE `web`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
