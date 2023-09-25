-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 25 sep. 2023 à 19:05
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `invitation`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `pseudo`, `pwd`) VALUES
(1, 'joe', '1234');

-- --------------------------------------------------------

--
-- Structure de la table `invite`
--

CREATE TABLE `invite` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `numPhone` varchar(15) DEFAULT NULL,
  `idCode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `invite`
--

INSERT INTO `invite` (`id`, `nom`, `prenom`, `numPhone`, `idCode`) VALUES
(1, 'ruth', 'kayembe', '+243998855354', 1),
(2, 'Maloba', 'Joel', '+243976960919', 2),
(3, 'ilunga', 'Eunice', '+243975510051', 3),
(4, 'Kalenga', 'Chris', '+243991005000', 4),
(5, 'Mpiana', 'Divin', '+243895552015', 5),
(6, 'Munga', 'Céclle', '+243975878190', 6),
(7, 'Banza', 'Hervé', '+243813501830', 7),
(8, 'Lukanda', 'Yvonne', '+243811699398', 8),
(9, 'Kunda', 'Bonheur', '+243808000550', 9),
(10, 'Ngoie', 'Gael', '+243906000500', 10),
(11, 'ilunga', 'Gaston', '+243917000100', 11),
(12, 'Banza', 'Donnel', '+243815000850', 12);

-- --------------------------------------------------------

--
-- Structure de la table `qrCode`
--

CREATE TABLE `qrCode` (
  `id` int(11) NOT NULL,
  `path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `qrCode`
--

INSERT INTO `qrCode` (`id`, `path`) VALUES
(1, '//localhost/QRinvitation/storage/ruth_kayembe_+243998855354.png'),
(2, '//localhost/QRinvitation/storage/Maloba_Joel_+243976960919.png'),
(3, '//localhost/QRinvitation/storage/ilunga_Eunice_+243975510051.png'),
(4, '//localhost/QRinvitation/storage/Kalenga_Chris_+243991005000.png'),
(5, '//localhost/QRinvitation/storage/Mpiana_Divin_+243895552015.png'),
(6, '//localhost/QRinvitation/storage/Munga_Céclle_+243975878190.png'),
(7, '//localhost/QRinvitation/storage/Banza_Hervé_+243813501830.png'),
(8, '//localhost/QRinvitation/storage/Lukanda_Yvonne_+243811699398.png'),
(9, '//localhost/QRinvitation/storage/Kunda_Bonheur_+243808000550.png'),
(10, '//localhost/QRinvitation/storage/Ngoie_Gael_+243906000500.png'),
(11, '//localhost/QRinvitation/storage/ilunga_Gaston_+243917000100.png'),
(12, '//localhost/QRinvitation/storage/Banza_Donnel_+243815000850.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `invite`
--
ALTER TABLE `invite`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `qrCode`
--
ALTER TABLE `qrCode`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `invite`
--
ALTER TABLE `invite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `qrCode`
--
ALTER TABLE `qrCode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
