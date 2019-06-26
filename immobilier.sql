-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 26 juin 2019 à 17:06
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `immobilier`
--
CREATE DATABASE IF NOT EXISTS `immobilier` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `immobilier`;

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

CREATE TABLE `logement` (
  `id_logement` int(10) UNSIGNED NOT NULL,
  `titre` varchar(127) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(127) COLLATE utf8_unicode_ci NOT NULL,
  `cp` mediumint(8) UNSIGNED NOT NULL,
  `surface` smallint(5) UNSIGNED NOT NULL,
  `prix` int(10) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `logement`
--

INSERT INTO `logement` (`id_logement`, `titre`, `adresse`, `ville`, `cp`, `surface`, `prix`, `photo`, `type`, `description`) VALUES
(1, 'Logement 1', 'Adresse 1', 'Ville 1', 69002, 120, 650, 'logement_.png', 'location', 'C\'est un joli Appartement.'),
(2, 'Logement 2', 'Adresse 2', 'Ville 3', 69004, 85, 250000, 'logement_.png', 'vente', 'Ici on a le deuxième.'),
(3, 'Logement 3', 'Adresse 3', 'Ville 3', 69005, 80, 700, 'art1.png', 'location', 'Voilà le troisième appart.'),
(4, 'Logement 3', 'Adresse 3', 'Ville 3', 69005, 80, 700, 'art1.png', 'location', 'Voilà le troisième appart.'),
(5, 'Logement 3', 'Adresse 3', 'Ville 3', 69005, 80, 700, 'art1.png', 'location', 'Voilà le troisième appart.'),
(6, 'dfm', 'klsdfgmls', 'Lyon', 45465, 300, 1200, 'art5.png', 'location', 'sqjmdfmdsgjkjfg drged'),
(7, 'dfm', 'klsdfgmls', 'Lyon', 45465, 300, 1200, 'art5.png', 'location', 'sqjmdfmdsgjkjfg drged'),
(8, 'fdnb', 'v cgert', 'Nantes', 65489, 69, 100000, 'art3.png', 'vente', 'cvqsp<oiuze^^poc.'),
(9, 'fdnb', 'v cgert', 'Nantes', 65489, 69, 100000, 'art3.png', 'vente', 'cvqsp<oiuze^^poc.');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `logement`
--
ALTER TABLE `logement`
  ADD PRIMARY KEY (`id_logement`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `logement`
--
ALTER TABLE `logement`
  MODIFY `id_logement` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
