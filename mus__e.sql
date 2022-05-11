-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mer. 11 mai 2022 à 15:05
-- Version du serveur : 5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `musée`
--

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `id_utilisateur` int(11) NOT NULL,
  `id_oeuvre` int(11) NOT NULL,
  `commentaire` varchar(300) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `collections`
--

CREATE TABLE `collections` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `caracteristique` varchar(300) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `collections`
--

INSERT INTO `collections` (`id`, `nom`, `caracteristique`) VALUES
(6, 'du caca', 'n\'importe quoi'),
(5, 'fond d\'écran', 'pas besoin d\'expliquer'),
(12, 'test', ''),
(14, 'yahoo', '');

-- --------------------------------------------------------

--
-- Structure de la table `oeuvre`
--

CREATE TABLE `oeuvre` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `date_publication` date NOT NULL,
  `description` varchar(300) DEFAULT NULL,
  `chemin_image` varchar(50) NOT NULL,
  `id_collections` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `oeuvre`
--

INSERT INTO `oeuvre` (`id`, `nom`, `date_publication`, `description`, `chemin_image`, `id_collections`) VALUES
(17, 'nicolas', '2022-03-22', 'nicolas la pute', '6.jpg', 6),
(16, 'adam ', '2022-04-01', 'belavogui', '5.png', 6),
(28, 'grand', '2022-05-11', '', '18.jpg', 5),
(14, '3eme', '2022-03-31', 'dream', '3.png', 5),
(13, '2eme', '2022-03-31', 'apple', '2.jpg', 5),
(12, '1er', '2022-03-30', 'apple', '1.png', 5),
(25, 'macron', '2022-05-11', 'juste', '15.jpg', 6),
(20, 'tgrzgr', '2022-03-30', '', '10.png', 5),
(21, 'gtfdrbvtgfds', '2022-03-30', '', '11.png', 5),
(22, 'encire un test', '2022-04-20', 'ceci est un test pour faire zehma', '12.png', 6),
(27, 'maman', '2022-05-10', 'jen', '17.jpg', 12),
(29, 'squid game', '2022-05-11', 'net pour Adam', '19.jpg', 6),
(30, 'alex6', '2022-05-12', '', '20.png', 14),
(31, 'pascal', '2022-05-11', 'pascal el homo', '21.png', 14);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `mdp` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `pseudo`, `mdp`) VALUES
(1, 'nasaxsupercool', 'onvatoutcasser'),
(2, 'todd', 'zizicaca'),
(9, 'test', 'motdepasse');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id_utilisateur`,`id_oeuvre`),
  ADD KEY `id_oeuvre` (`id_oeuvre`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `oeuvre`
--
ALTER TABLE `oeuvre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_collections` (`id_collections`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pseudo` (`pseudo`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `oeuvre`
--
ALTER TABLE `oeuvre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
