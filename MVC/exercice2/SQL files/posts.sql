-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 30 juil. 2018 à 21:59
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `creation_date`) VALUES
(1, 'Premier article', 'Un article avec peu de contenu.', '2018-07-24 00:02:00'),
(2, 'Second article', 'Bonjour, bienvenue sur mon blog. Pour le moment, il y a assez peu de contenu, mais n\'hésitez pas à revenir, vous ne serez pas déçus. ;)', '2018-07-25 05:24:33'),
(3, 'Troisième article', 'Je procède à quelques améliorations. Vous pouvez à présent poster vos propres commentaires sur le blog. J\'attends vos impressions.', '2018-07-26 08:23:20'),
(4, 'Quatrième article', 'Salut, comment allez-vous ? Je continue de programmer ce blog pour le rendre encore meilleur ! :)', '2018-07-27 14:26:17'),
(5, 'Cinquième article', 'Bonsoir, je vous annonce qu\'une nouvelle fonctionnalité a été ajoutée pour le blog. Vous pouvez à présent éditer vos commentaires.', '2018-07-28 18:05:25');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
