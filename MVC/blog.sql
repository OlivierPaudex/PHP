-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Client :  obol.myd.infomaniak.com
-- Généré le :  Mar 31 Juillet 2018 à 12:40
-- Version du serveur :  5.6.35-log
-- Version de PHP :  7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `obol_test`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `ID` int(11) NOT NULL,
  `ID_Post` int(11) NOT NULL,
  `Author` varchar(255) NOT NULL,
  `Comment` text NOT NULL,
  `Comment_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`ID`, `ID_Post`, `Author`, `Comment`, `Comment_date`) VALUES
(15, 4, 'Olivier', 'Na\'vi.......!!!!!!', '2018-07-30 16:40:49'),
(16, 4, 'Julien', 'Allez les bleus', '2018-07-31 10:47:44'),
(17, 4, 'Nathalie', 'Ici, c\'est l\'enfer et le paradis en même temps !', '2018-07-31 11:42:34'),
(18, 4, 'Martine', 'Ouvrir la boîte de Pendora', '2018-07-31 11:43:06'),
(19, 3, 'Jean-PIerre', 'c\'est beau', '2018-07-31 11:43:27'),
(20, 3, 'Olivier', 'J\'adore Ennio Morricone', '2018-07-31 11:44:41'),
(21, 2, 'Olivier', 'Heureusement, c\'est fini', '2018-07-31 11:45:05'),
(22, 2, 'Ludivine', 'Bravo la France !', '2018-07-31 11:45:19'),
(23, 2, 'Bernard', 'Dommage, j\'aimais bien le jeu des croates', '2018-07-31 11:45:59'),
(24, 2, 'Laura', 'Mais pourquoi ils courent tous après un ballon ?', '2018-07-31 11:52:50'),
(25, 2, 'Olivier', 'Le foot, ça se joue avec les pieds, le cœur, la tête, et aussi avec un ballon qu\'on a pas le droit de toucher avec les mains, si, si, j\'ai vérifié :-) ', '2018-07-31 11:54:52'),
(26, 4, 'Bernard', 'Mais que c\'est joli !', '2018-07-31 12:02:05'),
(27, 4, 'Aurélie', 'J\'adore Ellen Ripley', '2018-07-31 12:30:27'),
(28, 4, 'Bernard', 'Mais non, c\'est Sigourney Weaver. Ellen Ripley, c\'est dans Aliens', '2018-07-31 12:38:28');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `ID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Content` text NOT NULL,
  `Creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `posts`
--

INSERT INTO `posts` (`ID`, `Title`, `Content`, `Creation_date`) VALUES
(2, 'C\'est de la footaise', 'Eh oui, la Suisse est qualifée à la place du calife', '2018-06-28 17:16:44'),
(3, 'Musique', 'Jolie musique d\'accompagnement de ce film ', '2018-06-28 17:26:02'),
(4, 'Film Avatar', 'Ce film est d\'une beauté absolue. A voir absolument', '2018-06-28 17:26:35');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
