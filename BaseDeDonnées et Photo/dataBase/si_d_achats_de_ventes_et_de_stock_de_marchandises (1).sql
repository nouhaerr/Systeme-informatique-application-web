-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 12 juin 2022 à 23:30
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `si d'achats de ventes et de stock de marchandises`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `Client_num` int NOT NULL AUTO_INCREMENT,
  `Client_civilité` varchar(15) NOT NULL,
  `Client_nom` varchar(30) NOT NULL,
  `Client_prénom` varchar(30) NOT NULL,
  PRIMARY KEY (`Client_num`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`Client_num`, `Client_civilité`, `Client_nom`, `Client_prénom`) VALUES
(1, 'Monsieur', 'El Alaoui', 'Jad'),
(2, 'Madame', 'Fiqhi', 'Yassmine'),
(5, 'Monsieur', 'Hajaj', 'Badr'),
(6, 'Madame', 'Farid', 'Ines');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `IdCommande` int NOT NULL AUTO_INCREMENT,
  `Com_Client` int NOT NULL,
  `DateCommande` date NOT NULL,
  `DateLivraison` date NOT NULL,
  `Com_Montant` float NOT NULL,
  PRIMARY KEY (`IdCommande`),
  KEY `Com_Client` (`Com_Client`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`IdCommande`, `Com_Client`, `DateCommande`, `DateLivraison`, `Com_Montant`) VALUES
(1, 1, '2022-06-10', '2022-06-14', 2000),
(2, 1, '2022-06-12', '2022-06-15', 550),
(3, 2, '2022-06-12', '2022-06-15', 4300),
(7, 5, '2022-06-12', '2022-06-16', 2160),
(8, 6, '2022-06-12', '2022-06-15', 5000),
(9, 6, '2022-06-12', '2022-06-15', 5000),
(10, 6, '2022-06-12', '2022-06-15', 5000);

-- --------------------------------------------------------

--
-- Structure de la table `detail`
--

DROP TABLE IF EXISTS `detail`;
CREATE TABLE IF NOT EXISTS `detail` (
  `Detail_num` int NOT NULL AUTO_INCREMENT,
  `Detail_com` int NOT NULL,
  `Detail_idP` varchar(20) NOT NULL,
  `Detail_qte` int NOT NULL,
  PRIMARY KEY (`Detail_num`),
  KEY `Detail_com` (`Detail_com`,`Detail_idP`),
  KEY `Detail_idP` (`Detail_idP`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `detail`
--

INSERT INTO `detail` (`Detail_num`, `Detail_com`, `Detail_idP`, `Detail_qte`) VALUES
(8, 7, 'A0028', 1),
(10, 8, 'A0014', 2);

-- --------------------------------------------------------

--
-- Structure de la table `fournisseurs`
--

DROP TABLE IF EXISTS `fournisseurs`;
CREATE TABLE IF NOT EXISTS `fournisseurs` (
  `IdFour` varchar(20) NOT NULL,
  `VilleFour` varchar(30) NOT NULL,
  `PaysFour` varchar(30) NOT NULL,
  `CodePostal` int NOT NULL,
  `TélFour` varchar(25) NOT NULL,
  PRIMARY KEY (`IdFour`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `fournisseurs`
--

INSERT INTO `fournisseurs` (`IdFour`, `VilleFour`, `PaysFour`, `CodePostal`, `TélFour`) VALUES
('BF236N', 'Kenitra', 'Maroc', 14000, '+(212) 663000540'),
('BW540S', 'Casablanca', 'Maroc', 20600, '+(212)522354205'),
('CA2309', 'Casablanca', 'Maroc', 20600, '(+212)522349370'),
('FR456Y', 'Casablanca', 'Maroc', 20303, '+(212) 522628628');

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `IDUser` varchar(20) NOT NULL,
  `Fonction` varchar(30) NOT NULL,
  `Nom` varchar(30) NOT NULL,
  `Prenom` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`IDUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`IDUser`, `Fonction`, `Nom`, `Prenom`, `password`) VALUES
('Admin', 'Administrateur', 'AZHAR', 'Reda', 'XF298ACD57TIS'),
('AT1', 'Responsable Achat', 'NASIRI', 'Imane', 'NI@3417'),
('CO198', 'Comptable', 'RADI', 'Oussama', 'RO@6742'),
('VT1', 'Responsable de ventes', 'SAJID', 'Naila', 'NS@87524');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `IdProduit` varchar(20) NOT NULL,
  `Catégorie` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Désignation` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Photo` mediumblob NOT NULL,
  `Prix` double NOT NULL,
  `Quantité` int NOT NULL,
  `IdFour` varchar(20) NOT NULL,
  PRIMARY KEY (`IdProduit`),
  KEY `IdFour` (`IdFour`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`IdProduit`, `Catégorie`, `Désignation`, `Photo`, `Prix`, `Quantité`, `IdFour`) VALUES
('A0001', 'Tables', 'Table à manger chêne gris', 0x2e2e2f696d616765732f4368c3aa6e65477269732e6a7067, 6000, 499, 'CA2309'),
('A0002', 'Tables', 'Table à manger noir laque', 0x2e2e2f696d616765732f4e6f69724c617175652e6a7067, 2500, 600, 'BF236N'),
('A0003', 'Tables', 'Table à manger marron', 0x2e2e2f696d616765732f4d6172726f6e2e6a7067, 3000, 530, 'FR456Y'),
('A0009', 'Tables', 'Table Basse hexagone avec pieds en verre ', 0x2e2e2f696d616765732f5461626c652042617373652068657861676f6e65206176656320706965647320656e2076657272652e6a7067, 2300, 299, 'BF236N'),
('A0014', 'Chaises', 'Chaise pieds en hêtre Noir', 0x2e2e2f696d616765732f43686169736520706965647320656e2068c3aa747265204e6f69722e6a7067, 800, 892, 'FR456Y'),
('A0015', 'Chaises', 'Chaise virage Noir', 0x2e2e2f696d616765732f4368616973655669726167654e6f69722e6a7067, 1300, 400, 'CA2309'),
('A0016', 'Chaises', 'Chaise BETTY - Patchwork', 0x2e2e2f696d616765732f436861697365204245545459202d205061746368776f726b2e6a7067, 2300, 180, 'CA2309'),
('A0017', 'Chaises', 'Chaise - Taupe / Chêne', 0x2e2e2f696d616765732f43686169736520464c454d454e53202d2054617570654368c3aa6e652e6a7067, 1159, 1299, 'BW540S'),
('A0019', 'Tabourets', 'Tabouret Bar Gris Clair', 0x2e2e2f696d616765732f5461626f75726574206261724772697320436c6169722e6a7067, 1200, 500, 'BF236N'),
('A0021', 'Buffets et Commodes', 'Buffet BALI - Beige', 0x2e2e2f696d616765732f6275666665745f62616c692e6a7067, 2500, 380, 'BW540S'),
('A0022', 'Buffets et Commodes', 'Buffet SAINT TROPEZ Blanc', 0x2e2e2f696d616765732f427566666574205341494e542054524f50455a20426c616e632e6a7067, 4699, 100, 'BF236N'),
('A0023', 'Buffets et Commodes', 'Commode SAINT TROPEZ avec Led blanc', 0x2e2e2f696d616765732f436f6d6d6f6465205341494e542054524f50455a2061766563206c656420426c616e632e6a7067, 3699, 250, 'CA2309'),
('A0028', 'Lits', 'Lit - Noir MAT', 0x2e2e2f696d616765732f4c6974202d204e6f6972204d41542e6a7067, 860, 1198, 'CA2309'),
('A0030', 'Lits', 'Lit cabane sommier Chêne', 0x2e2e2f696d616765732f4c697420436162616e6520536f6d6d696572204368c3aa6e652e6a7067, 2199, 400, 'BF236N'),
('A0032', 'Meubles TV', 'Meuble TV - Taupe Chêne', '', 3895, 90, 'BW540S'),
('A0034', 'Armoires', ' Armoire avec Miroir - Noir Laqué', '', 6599, 349, 'FR456Y'),
('A0036', 'Armoires', 'Armoire 3 Portes 2 Tiroirs-Noir Chêne', '', 3550, 300, 'BF236N'),
('A0037', 'Armoires', 'Armoire avec 2 Portes - Blanc Chêne', '', 3690, 2130, 'BW540S'),
('A0038', 'Armoires', 'Armoire DAILY 2 portes et 2 tiroirs - Blanc', '', 2195, 3500, 'CA2309'),
('A0040', 'Coiffeuses', 'Coiffeuse Glamour - Chêne Blanc', '', 3499, 1543, 'CA2309'),
('A0041', 'Coiffeuses', 'Coiffeuse Volage Noir', '', 3499, 2390, 'CA2309'),
('A0042', 'Coiffeuses', 'Coiffeuse Pimpante Noir', '', 1550, 423, 'FR456Y'),
('A0044', 'Vitrines et Bibliothèques', 'Grande Vitrine Bohol - Bleu Navy Chêne', '', 3995, 932, 'CA2309'),
('A0045', 'Vitrines et Bibliothèques', 'Bibliothèque MAZE - Gris et Blanc', '', 1159, 2120, 'FR456Y'),
('A0046', 'Vitrines et Bibliothèques', 'Bibliothèque BOCAMINI - Chêne beige et noir', '', 1900, 821, 'CA2309'),
('A0047', 'Chevet', 'Table de chevet  - Noir Laqué', '', 959, 343, 'FR456Y'),
('A0048', 'Chevet', 'Table de chevet Tempo - Chêne Relief', '', 959, 23, 'CA2309'),
('A0050', 'Chevet', 'Table De Chevet - Wengé', '', 490, 19, 'CA2309'),
('A0051', 'Canapé', 'Canapé Gesy Gris noir 2 places', '', 5995, 91, 'CA2309'),
('A0052', 'Canapé', 'Canapé d\'angle Sahara avec fonction lit Gris Foncé', '', 12559, 211, 'BF236N'),
('A0055', 'Canapé', 'Canapé Doria 3 places Gris Foncé', '', 5990, 323, 'BW540S'),
('A0057', 'Fauteuil', 'Fauteuil Envy Pétrole', '', 3990, 921, 'CA2309'),
('A0058', 'Fauteuil', 'Fauteuil SNOW Bleu', '', 3899, 471, 'CA2309'),
('A0061', 'Lits BÉBÉ', 'Lit Bébé JUNGLE Blanc', '', 1699, 61, 'BF236N');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_2` FOREIGN KEY (`Com_Client`) REFERENCES `clients` (`Client_num`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `detail`
--
ALTER TABLE `detail`
  ADD CONSTRAINT `detail_ibfk_1` FOREIGN KEY (`Detail_com`) REFERENCES `commandes` (`IdCommande`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_ibfk_2` FOREIGN KEY (`Detail_idP`) REFERENCES `produits` (`IdProduit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`IdFour`) REFERENCES `fournisseurs` (`IdFour`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
