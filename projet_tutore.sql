-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 28, 2020 at 10:30 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projet_tutore`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `numClient` int(4) NOT NULL,
  `nomClient` varchar(50) NOT NULL,
  `prenomClient` varchar(25) NOT NULL,
  `loginClient` varchar(50) NOT NULL,
  `mdpClient` varchar(25) NOT NULL,
  `adresse` varchar(25) DEFAULT NULL,
  `codePostal` int(5) DEFAULT NULL,
  `ville` varchar(40) DEFAULT NULL,
  `numQuartier` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `numCommande` int(4) NOT NULL,
  `dateCommande` date NOT NULL,
  `prixMinimal` float(3,2) NOT NULL,
  `numClient` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `compocommande`
--

CREATE TABLE `compocommande` (
  `numProduit` int(3) NOT NULL,
  `numCommande` int(4) NOT NULL,
  `quantite` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `livraison`
--

CREATE TABLE `livraison` (
  `numLivraison` int(3) NOT NULL,
  `dateLivraison` date NOT NULL,
  `numCommande` int(4) NOT NULL,
  `numType` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `producteur`
--

CREATE TABLE `producteur` (
  `numProducteur` int(4) NOT NULL,
  `nomProducteur` varchar(50) NOT NULL,
  `prenomProducteur` varchar(25) NOT NULL,
  `loginProducteur` varchar(50) NOT NULL,
  `mdpProducteur` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `numProduit` int(3) NOT NULL,
  `nomProduit` varchar(50) NOT NULL,
  `famille` varchar(35) NOT NULL,
  `prixInitial` decimal(3,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quartier`
--

CREATE TABLE `quartier` (
  `numQuartier` int(3) NOT NULL,
  `nomQuartier` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `numProducteur` int(4) NOT NULL,
  `numProduit` int(3) NOT NULL,
  `stockProduit` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `typelivraison`
--

CREATE TABLE `typelivraison` (
  `numType` int(11) NOT NULL,
  `libelle` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`numClient`),
  ADD KEY `fk_client` (`numQuartier`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`numCommande`),
  ADD KEY `fk_commande` (`numClient`);

--
-- Indexes for table `compocommande`
--
ALTER TABLE `compocommande`
  ADD PRIMARY KEY (`numProduit`,`numCommande`),
  ADD KEY `fkccc` (`numCommande`);

--
-- Indexes for table `livraison`
--
ALTER TABLE `livraison`
  ADD PRIMARY KEY (`numLivraison`),
  ADD KEY `fk_livco` (`numCommande`),
  ADD KEY `fk_tl` (`numType`);

--
-- Indexes for table `producteur`
--
ALTER TABLE `producteur`
  ADD PRIMARY KEY (`numProducteur`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`numProduit`);

--
-- Indexes for table `quartier`
--
ALTER TABLE `quartier`
  ADD PRIMARY KEY (`numQuartier`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`numProducteur`,`numProduit`),
  ADD KEY `kf_stock_produit` (`numProduit`);

--
-- Indexes for table `typelivraison`
--
ALTER TABLE `typelivraison`
  ADD PRIMARY KEY (`numType`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `numClient` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `numCommande` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `livraison`
--
ALTER TABLE `livraison`
  MODIFY `numLivraison` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `producteur`
--
ALTER TABLE `producteur`
  MODIFY `numProducteur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `numProduit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quartier`
--
ALTER TABLE `quartier`
  MODIFY `numQuartier` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `typelivraison`
--
ALTER TABLE `typelivraison`
  MODIFY `numType` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `fk_client` FOREIGN KEY (`numQuartier`) REFERENCES `quartier` (`numQuartier`);

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_commande` FOREIGN KEY (`numClient`) REFERENCES `client` (`numClient`);

--
-- Constraints for table `compocommande`
--
ALTER TABLE `compocommande`
  ADD CONSTRAINT `fkccc` FOREIGN KEY (`numCommande`) REFERENCES `commande` (`numCommande`),
  ADD CONSTRAINT `fkccp` FOREIGN KEY (`numProduit`) REFERENCES `produit` (`numProduit`);

--
-- Constraints for table `livraison`
--
ALTER TABLE `livraison`
  ADD CONSTRAINT `fk_livco` FOREIGN KEY (`numCommande`) REFERENCES `commande` (`numCommande`),
  ADD CONSTRAINT `fk_tl` FOREIGN KEY (`numType`) REFERENCES `typelivraison` (`numType`);

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `fk_stock_producteur` FOREIGN KEY (`numProducteur`) REFERENCES `producteur` (`numProducteur`),
  ADD CONSTRAINT `kf_stock_produit` FOREIGN KEY (`numProduit`) REFERENCES `produit` (`numProduit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
