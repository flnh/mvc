-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 22 mai 2020 à 13:38
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `concert`
--

-- --------------------------------------------------------

--
-- Structure de la table `liste_groupes`
--

CREATE TABLE `liste_groupes` (
  `id_groupe` int(11) NOT NULL,
  `nom_groupe` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

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

CREATE TABLE `liste_groupes_avec_liste_musiciens` (
  `id_jointure` int(11) NOT NULL,
  `musicien_id` int(11) NOT NULL,
  `groupe_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL DEFAULT current_timestamp(),
  `del` tinyint(1) NOT NULL DEFAULT 0,
  `role_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `liste_groupes_avec_liste_musiciens`
--

INSERT INTO `liste_groupes_avec_liste_musiciens` (`id_jointure`, `musicien_id`, `groupe_id`, `created`, `updated`, `del`, `role_id`) VALUES
(1, 1, 1, '2020-04-03 10:50:00', '2020-04-03 11:00:00', 1, 0),
(2, 2, 1, '2020-04-07 12:00:00', '0000-00-00 00:00:00', 0, 1),
(3, 3, 2, '2020-04-16 05:00:00', '0000-00-00 00:00:00', 0, 2),
(4, 4, 2, '2020-04-21 05:00:00', '0000-00-00 00:00:00', 0, 3),
(5, 3, 1, '2020-04-18 08:00:00', '0000-00-00 00:00:00', 0, 4),
(6, 1, 2, '2020-04-13 03:28:00', '0000-00-00 00:00:00', 0, 1),
(7, 5, 1, '2020-05-18 01:12:03', '2020-05-18 13:12:03', 0, 5),
(8, 6, 1, '2020-05-18 02:42:43', '2020-05-18 14:42:43', 0, 7);

-- --------------------------------------------------------

--
-- Structure de la table `liste_musiciens`
--

CREATE TABLE `liste_musiciens` (
  `id_musicien` int(11) NOT NULL,
  `nom_musicien` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `prenom_musicien` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `liste_musiciens`
--

INSERT INTO `liste_musiciens` (`id_musicien`, `nom_musicien`, `prenom_musicien`) VALUES
(1, 'El rocker', 'Jérome'),
(2, 'Cule', 'Jean'),
(3, 'Dans Le Jardin', 'La Schtroumpfette'),
(4, 'Dupond', 'Elize'),
(5, 'test', 'test'),
(6, 'teeeeest', 'rrrrr');

-- --------------------------------------------------------

--
-- Structure de la table `liste_roles`
--

CREATE TABLE `liste_roles` (
  `id_role` int(11) NOT NULL,
  `nom_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `liste_roles`
--

INSERT INTO `liste_roles` (`id_role`, `nom_role`) VALUES
(1, 'Test'),
(2, 'Batteur'),
(3, 'Guitariste'),
(4, 'Chanteur'),
(5, 'Aaa'),
(6, 'Aaa2'),
(7, 'Zzz');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `liste_groupes`
--
ALTER TABLE `liste_groupes`
  ADD PRIMARY KEY (`id_groupe`);

--
-- Index pour la table `liste_groupes_avec_liste_musiciens`
--
ALTER TABLE `liste_groupes_avec_liste_musiciens`
  ADD PRIMARY KEY (`id_jointure`);

--
-- Index pour la table `liste_musiciens`
--
ALTER TABLE `liste_musiciens`
  ADD PRIMARY KEY (`id_musicien`);

--
-- Index pour la table `liste_roles`
--
ALTER TABLE `liste_roles`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `liste_groupes`
--
ALTER TABLE `liste_groupes`
  MODIFY `id_groupe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `liste_groupes_avec_liste_musiciens`
--
ALTER TABLE `liste_groupes_avec_liste_musiciens`
  MODIFY `id_jointure` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `liste_musiciens`
--
ALTER TABLE `liste_musiciens`
  MODIFY `id_musicien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `liste_roles`
--
ALTER TABLE `liste_roles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
