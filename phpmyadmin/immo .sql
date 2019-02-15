-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 15 Janvier 2018 à 07:22
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `immo`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE IF NOT EXISTS `adresse` (
  `id_adr` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) DEFAULT NULL,
  `rue` varchar(100) DEFAULT NULL,
  `commune` varchar(50) DEFAULT NULL,
  `cp` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_adr`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `adresse`
--

INSERT INTO `adresse` (`id_adr`, `numero`, `rue`, `commune`, `cp`) VALUES
(1, 756550682, 'CHAUSSEE JULES CESAR', 'VAL D''OISE', '95130'),
(2, 6987654, 'RUE DU VERMON', 'BOBINI', '91234'),
(3, 7654327, 'PARIE PREMIER', 'PARIE', '7543'),
(14, 6987654, 'BOURBON', 'BEAUD', '98766');

-- --------------------------------------------------------

--
-- Structure de la table `biens`
--

CREATE TABLE IF NOT EXISTS `biens` (
  `id_b` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(256) DEFAULT NULL,
  `nb_pieces` int(11) DEFAULT NULL,
  `surface` int(11) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_adr` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `id_u` smallint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_b`),
  KEY `id_adr` (`id_adr`),
  KEY `id_cat` (`id_cat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `biens`
--

INSERT INTO `biens` (`id_b`, `description`, `nb_pieces`, `surface`, `prix`, `date`, `id_adr`, `id_cat`, `id_u`) VALUES
(1, 'APPARTEMENT NEUF', 7, 77, 500000, '2018-01-07 21:15:09', 1, 1, 1),
(2, 'MAISON RENOVEE', 9, 120, 500000, '2018-01-10 11:20:02', 2, 2, 2),
(3, 'LOFT NEUF', 5, 50, 200000, '2018-01-10 11:20:02', 3, 3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id_cat` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id_cat`, `libelle`) VALUES
(1, 'APPARTEMENT'),
(2, 'MAISON'),
(3, 'LOFT');

-- --------------------------------------------------------

--
-- Structure de la table `envoyer`
--

CREATE TABLE IF NOT EXISTS `envoyer` (
  `id_exp` int(11) NOT NULL,
  `id_dest` int(11) NOT NULL,
  PRIMARY KEY (`id_exp`,`id_dest`),
  KEY `id_dest` (`id_dest`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id_i` int(11) NOT NULL AUTO_INCREMENT,
  `chemin` varchar(255) DEFAULT NULL,
  `id_b` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_i`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id_msg` int(11) NOT NULL AUTO_INCREMENT,
  `post` text,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_exp` int(11) NOT NULL DEFAULT '0',
  `id_dest` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_msg`,`id_exp`,`id_dest`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`id_msg`, `post`, `date`, `id_exp`, `id_dest`) VALUES
(2, 'votre bien m''interesse voici mes coordonné 06765432', '2018-01-10 12:51:27', 3, 1),
(3, 'votre bien m''interesse voici mes coordonné 06765432', '2018-01-12 23:57:55', 2, 5),
(4, 'bonjour à vous, j''aimerais vous rencontrer', '2018-01-12 23:57:34', 1, 7);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_u` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `level` varchar(100) DEFAULT NULL,
  `ban` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id_u`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_u`, `login`, `mdp`, `email`, `level`, `ban`) VALUES
(1, 'MARYLIN', '13fbd79c3d390e5d6585a21e11ff5ec1970cff0c', 'm@k.net', '2', 2),
(2, 'DYLAN', '3bc15c8aae3e4124dd409035f32ea2fd6835efc9', 'd@k.net', '1', 0),
(5, 'QWEN', '77de68daecd823babbb58edb1c8e14d7106e83bb', 'q@k.net', '0', 0),
(6, 'JORDAN', '5c2dd944dde9e08881bef0894fe7b22a5c9c4b06', 'j@k.net', '1', 0),
(7, 'vendeur', '7a38d8cbd20d9932ba948efaa364bb62651d5ad4', 'v@k.net', '0', 0);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `biens`
--
ALTER TABLE `biens`
  ADD CONSTRAINT `biens_ibfk_1` FOREIGN KEY (`id_adr`) REFERENCES `adresse` (`id_adr`),
  ADD CONSTRAINT `biens_ibfk_2` FOREIGN KEY (`id_cat`) REFERENCES `categorie` (`id_cat`);

--
-- Contraintes pour la table `envoyer`
--
ALTER TABLE `envoyer`
  ADD CONSTRAINT `envoyer_ibfk_1` FOREIGN KEY (`id_exp`) REFERENCES `users` (`id_u`),
  ADD CONSTRAINT `envoyer_ibfk_2` FOREIGN KEY (`id_dest`) REFERENCES `users` (`id_u`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
