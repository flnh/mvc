-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 03 avr. 2020 à 16:06
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mvc`
--

-- --------------------------------------------------------

--
-- Structure de la table `groupes`
--

DROP TABLE IF EXISTS `groupes`;
CREATE TABLE IF NOT EXISTS `groupes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_groupe` varchar(255) NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_maj` datetime NOT NULL,
  `del` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `groupes`
--

INSERT INTO `groupes` (`id`, `nom_groupe`, `date_creation`, `date_maj`, `del`) VALUES
(1, 'groupe1', '2020-04-03 07:24:21', '2020-04-03 07:24:21', 0),
(2, 'groupe2', '2020-04-03 07:44:21', '2020-04-03 07:44:21', 0),
(3, 'groupe3', '2020-04-03 08:04:21', '2020-04-03 08:04:21', 0);

-- --------------------------------------------------------

--
-- Structure de la table `j_membres_groupes`
--

DROP TABLE IF EXISTS `j_membres_groupes`;
CREATE TABLE IF NOT EXISTS `j_membres_groupes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_groupe` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL,
  `del` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `j_membres_groupes`
--

INSERT INTO `j_membres_groupes` (`id`, `id_groupe`, `id_membre`, `del`) VALUES
(1, 1, 1, 0),
(2, 1, 2, 0),
(3, 1, 3, 0),
(4, 2, 4, 0),
(5, 2, 5, 0),
(6, 2, 6, 0),
(7, 3, 7, 0),
(8, 3, 8, 0),
(9, 3, 9, 0),
(10, 3, 10, 0);

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_maj` datetime NOT NULL,
  `del` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `nom`, `prenom`, `date_creation`, `date_maj`, `del`) VALUES
(1, 'Nom1', 'Prenom1', '2020-04-03 11:23:25', '2020-04-03 11:23:25', 0),
(2, 'Nom2', 'Prenom2', '2020-04-03 11:43:25', '2020-04-03 11:43:25', 0),
(3, 'Nom3', 'Prenom3', '2020-04-03 11:23:25', '2020-04-03 11:23:25', 0),
(4, 'Nom4', 'Prenom4', '2020-04-03 11:43:25', '2020-04-03 11:43:25', 0),
(5, 'Nom5', 'Prenom5', '2020-04-03 11:23:25', '2020-04-03 11:23:25', 0),
(6, 'Nom6', 'Prenom6', '2020-04-03 11:43:25', '2020-04-03 11:43:25', 0),
(7, 'Nom7', 'Prenom7', '2020-04-03 11:23:25', '2020-04-03 11:23:25', 0),
(8, 'Nom8', 'Prenom8', '2020-04-03 11:43:25', '2020-04-03 11:43:25', 0),
(9, 'Nom9', 'Prenom9', '2020-04-03 11:23:25', '2020-04-03 11:23:25', 0),
(10, 'Nom10', 'Prenom10', '2020-04-03 11:43:25', '2020-04-03 11:43:25', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
