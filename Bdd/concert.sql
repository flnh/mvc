-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 23 avr. 2020 à 15:11
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
-- Base de données :  `concert`
--

-- --------------------------------------------------------

--
-- Structure de la table `liste_groupes`
--

DROP TABLE IF EXISTS `liste_groupes`;
CREATE TABLE IF NOT EXISTS `liste_groupes` (
  `id_groupe` int(11) NOT NULL AUTO_INCREMENT,
  `nom_groupe` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id_groupe`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `liste_groupes`
--

INSERT INTO `liste_groupes` (`id_groupe`, `nom_groupe`) VALUES
(1, 'Les fous du rock'),
(2, 'Disco girls');

-- --------------------------------------------------------

--
-- Structure de la table `liste_groupes_avec_liste_musiciens`
--

DROP TABLE IF EXISTS `liste_groupes_avec_liste_musiciens`;
CREATE TABLE IF NOT EXISTS `liste_groupes_avec_liste_musiciens` (
  `id_jointure` int(11) NOT NULL AUTO_INCREMENT,
  `musicien_id` int(11) NOT NULL,
  `groupe_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `del` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_jointure`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `liste_groupes_avec_liste_musiciens`
--

INSERT INTO `liste_groupes_avec_liste_musiciens` (`id_jointure`, `musicien_id`, `groupe_id`, `created`, `updated`, `del`) VALUES
(1, 1, 1, '2020-04-03 10:50:00', '2020-04-03 11:00:00', 1),
(2, 2, 1, '2020-04-07 12:00:00', '0000-00-00 00:00:00', 0),
(3, 3, 2, '2020-04-16 05:00:00', '0000-00-00 00:00:00', 0),
(4, 4, 2, '2020-04-21 05:00:00', '0000-00-00 00:00:00', 0),
(5, 3, 1, '2020-04-18 08:00:00', '0000-00-00 00:00:00', 0),
(6, 1, 2, '2020-04-13 03:28:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `liste_musiciens`
--

DROP TABLE IF EXISTS `liste_musiciens`;
CREATE TABLE IF NOT EXISTS `liste_musiciens` (
  `id_musicien` int(11) NOT NULL AUTO_INCREMENT,
  `nom_musicien` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `prenom_musicien` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id_musicien`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `liste_musiciens`
--

INSERT INTO `liste_musiciens` (`id_musicien`, `nom_musicien`, `prenom_musicien`) VALUES
(1, 'El rocker', 'Jérome'),
(2, 'Cule', 'Jean'),
(3, 'Dans Le Jardin', 'La Schtroumpfette'),
(4, 'Dupond', 'Elize');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
