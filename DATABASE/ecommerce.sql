-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 10 juin 2024 à 16:41
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `catgorie`
--

CREATE TABLE `catgorie` (
  `id` int(11) NOT NULL,
  `Libelle` varchar(200) NOT NULL,
  `Discription` varchar(200) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `catgorie`
--

INSERT INTO `catgorie` (`id`, `Libelle`, `Discription`, `date_creation`) VALUES
(32, 'GaminG', 'categorie de Gaming', '2024-05-30 15:51:25'),
(33, 'Electronic', 'les electronice', '2024-05-30 15:51:57'),
(34, 'produits chimi', 'les produits chimi', '2024-05-30 15:52:24'),
(35, 'Cosmitique', 'cosmitique', '2024-06-03 12:27:18');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `id_client`, `total`, `date_creation`) VALUES
(0, 26, 11098, '2024-06-10 00:23:21'),
(0, 26, 11098, '2024-06-10 00:25:36'),
(0, 26, 11098, '2024-06-10 00:28:23'),
(0, 26, 5820, '2024-06-10 00:28:53'),
(0, 26, 5820, '2024-06-10 00:29:37'),
(0, 26, 5820, '2024-06-10 00:29:47'),
(0, 26, 5820, '2024-06-10 00:33:15'),
(0, 26, 17420, '2024-06-10 00:33:42'),
(0, 12, 15080, '2024-06-10 12:41:11'),
(0, 12, 18400, '2024-06-10 13:45:46'),
(0, 12, 70208, '2024-06-10 14:22:06'),
(0, 27, 3098, '2024-06-10 15:10:11');

-- --------------------------------------------------------

--
-- Structure de la table `lign_commande`
--

CREATE TABLE `lign_commande` (
  `id` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `quantite` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `libelle` varchar(200) NOT NULL,
  `Prix` decimal(10,0) NOT NULL,
  `Discount` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `date_creation` date NOT NULL DEFAULT current_timestamp(),
  `discription` varchar(255) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `libelle`, `Prix`, `Discount`, `id_categorie`, `date_creation`, `discription`, `image`) VALUES
(28, 'GTX 4090', 10000, 5, 27, '2024-05-30', 'MSI Carte graphique de jeu GeForce RTX 4090 GAMING X SLIM 24 Go - 24 Go GDDR6X, 2695 MHz, PCI Express Gen 4, 384 bits, 2 DP v 1.4a, HDMI 2.1a (compatible 4K et 8K HDR) noire', ''),
(30, 'phone', 8500, 2, 28, '2024-05-30', '', ''),
(32, 'luis veton', 5000, 0, 30, '2024-05-30', '', ''),
(45, 'samsung serie 10', 4000, 13, 33, '2024-06-03', '', '665da4743e786samsung serie 10.jpeg'),
(50, 'PlayStation 5', 8000, 5, 32, '2024-06-03', '', '665db1951d02cplayStation5.jpeg'),
(51, 'PlayStation 5 black', 8000, 5, 32, '2024-06-03', '', '665db2121fcedplaystation-5 black.jpg'),
(52, 'RTX 4090', 18775, 2, 32, '2024-06-03', 'MSI Carte graphique de jeu GeForce RTX 4090 GAMING X SLIM 24 Go - 24 Go GDDR6X, 2695 MHz, PCI Express Gen 4, 384 bits, 2 DP v 1.4a, HDMI 2.1a (compatible 4K et 8K HDR) noire', '665f2d17cd0beRTX 4090.jpg'),
(53, 'Iphone 14', 8875, 4, 33, '2024-06-03', ' Apple iPhone 14 128GB Bleu 6,1\" Blue A15 iOS Mode Action & SOS 6Gb RAM Siri Garantie', '665f30f62a4351.jpg'),
(54, 'Iphone 14 Pro Max', 16995, 2, 33, '2024-06-03', ' Boutique Officielle Apple iPhone 14 Pro Max 1TB Noir Sideral 6,7\" Space Black 6Gb RAM iOS Dynamic Island', '665db3429ba1biphone14PROMAX.jpeg'),
(55, 'PC Gaming Case ', 900, 3, 32, '2024-06-03', 'case pc gamer', '665e28961266acase.jpg'),
(56, 'Itel TV LED 33″ HD ', 4000, 0, 33, '2024-06-04', '', '665f2304c354dtv intel.jpg'),
(57, 'Revolution Smart TV 50\" ', 3098, 0, 33, '2024-06-04', 'Revolution Smart TV 50\" Android 4K UHD - Récepteur Intégré + TNT + HDMI + USB - Nouveau modèle', '665f239b64289revolution 4K.jpg'),
(58, 'Samsung 40\" Smart Tv Full HD', 2749, 1, 33, '2024-06-04', 'Samsung 40\" Smart Tv Full HD - Récepteur Intégré - TNT - HDMI - 40T5300 + Support Mural', '665f244351a83samsung.jpg'),
(59, ' LG 55 Smart TV - 4K Ultra HD ', 6476, 0, 33, '2024-06-04', '', '665f2e7056caalg.avif');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `login` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `date_creation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `login`, `password`, `date_creation`) VALUES
(12, 'aymane', '1111', '2024-05-27'),
(22, 'aymane', '1111', '2024-06-03'),
(23, 'aymane', '1111', '2024-06-03'),
(24, 'aymane', '1111', '2024-06-03'),
(25, 'aymane', '1111', '2024-06-05'),
(26, 'ahmed', '1111', '2024-06-09'),
(27, 'RICHI', '1111', '2024-06-10');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `catgorie`
--
ALTER TABLE `catgorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lign_commande`
--
ALTER TABLE `lign_commande`
  ADD KEY `id_commande` (`id_commande`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `catgorie`
--
ALTER TABLE `catgorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
