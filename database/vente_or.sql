-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 13 déc. 2020 à 08:43
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `vente_or`
--

-- --------------------------------------------------------

--
-- Structure de la table `acheteur`
--

DROP TABLE IF EXISTS `acheteur`;
CREATE TABLE IF NOT EXISTS `acheteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_acheteur` int(11) NOT NULL,
  `a_quantite` text NOT NULL,
  `categorie` int(11) NOT NULL,
  `dateTime` datetime NOT NULL,
  `description` text NOT NULL,
  `id_vendeur` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `acheteur`
--

INSERT INTO `acheteur` (`id`, `id_acheteur`, `a_quantite`, `categorie`, `dateTime`, `description`, `id_vendeur`) VALUES
(2, 4, '10', 12, '2020-12-13 10:40:48', '1221', 0);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `name`) VALUES
(12, 'saphir'),
(11, 'Or ');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `telephone` text NOT NULL,
  `mail` text NOT NULL,
  `mot_de_passe` text NOT NULL,
  `img_reacto` text NOT NULL,
  `img_verso` text NOT NULL,
  `img_profil` text NOT NULL,
  `lieu_de_roncontre` text NOT NULL,
  `deplacement` text NOT NULL,
  `valide` int(11) NOT NULL DEFAULT 0,
  `valideAdmin` int(11) NOT NULL DEFAULT 0,
  `date_enregistrement` datetime NOT NULL,
  `type` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `telephone`, `mail`, `mot_de_passe`, `img_reacto`, `img_verso`, `img_profil`, `lieu_de_roncontre`, `deplacement`, `valide`, `valideAdmin`, `date_enregistrement`, `type`) VALUES
(1, 'sa@dasd.da', 'sa@dasd.da', 'sa@dasd.da', 'sa@dasd.da', '3e99a8fe8423b3bf0c239f0aa77037544fe8c9a6', 'localhost/images/photoidentiter_venduer/recto/1.jpg', 'localhost/images/photoidentiter_venduer/verso/1.jpg', 'localhost/images/photoidentiter_venduer/profil/1.jpg', '-hfhf									', '1', 0, 0, '2020-12-12 20:30:03', 'vendeur'),
(2, 'zdad', 'dsds', 'gfgfg', 'sa@daswd.dgfa', '3e99a8fe8423b3bf0c239f0aa77037544fe8c9a6', 'localhost/images/photoidentiter_venduer/recto/2.jpg', 'localhost/images/photoidentiter_venduer/verso/2.jpg', 'localhost/images/photoidentiter_venduer/profil/2.jpg', 'jmgmgbm', '1', 0, 0, '2020-12-12 20:32:30', 'acheteur'),
(3, 'Rakoto', 'Rakoto', '66asasa', 'sarobidyalliance@outlook.com', '3e99a8fe8423b3bf0c239f0aa77037544fe8c9a6', 'localhost/images/photoidentiter_venduer/recto/3.jpg', 'localhost/images/photoidentiter_venduer/verso/3.jpg', 'localhost/images/photoidentiter_venduer/profil/3.jpg', '-SASASASA<br />\r\n-SASASAS									', '1', 1, 1, '2020-12-12 20:52:01', 'vendeur'),
(4, 'acheteur', 'acheteur', '0344569162', 'sarobidyalliance12@outlook.com', '5c98d2804c92c35889eb13fb24453e563d02d49c', 'localhost/images/photoidentiter_venduer/recto/4.jpg', 'localhost/images/photoidentiter_venduer/verso/4.jpg', 'localhost/images/photoidentiter_venduer/profil/4.jpg', '-dzsdsd<br />\r\n-acheteur<br />\r\n-acheteur', '1', 1, 1, '2020-12-13 08:07:58', 'acheteur');

-- --------------------------------------------------------

--
-- Structure de la table `vente_diponible`
--

DROP TABLE IF EXISTS `vente_diponible`;
CREATE TABLE IF NOT EXISTS `vente_diponible` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_vendeur` int(11) NOT NULL,
  `categorie` int(11) NOT NULL,
  `v_quantite` text NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `date_ajouter` datetime NOT NULL,
  `valide` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vente_diponible`
--

INSERT INTO `vente_diponible` (`id`, `id_vendeur`, `categorie`, `v_quantite`, `image`, `description`, `date_ajouter`, `valide`) VALUES
(1, 1, 11, '14', '[&quot;localhost/images/marchandise/1_0.jpg&quot;,&quot;localhost/images/marchandise/1_1.jpg&quot;]', '', '2020-12-12 10:36:31', 1),
(14, 3, 12, '10', '[&quot;localhost/images/marchandise/3_0.jpg&quot;]', 'ADADA', '2020-12-13 11:03:39', 0),
(13, 4, 12, '10', '[&quot;localhost/images/marchandise/2_0.jpg&quot;,&quot;localhost/images/marchandise/2_1.jpg&quot;,&quot;localhost/images/marchandise/2_2.jpg&quot;]', '-fvsfsfs<br />\r\n-fsfsfsfs<br />\r\n-fsfsffs', '2020-12-13 10:39:25', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
