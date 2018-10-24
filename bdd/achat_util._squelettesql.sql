-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 28 Janvier 2018 à 01:04
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `achat_util2`
--
DROP DATABASE IF EXISTS `achat_util2`;
CREATE DATABASE IF NOT EXISTS `achat_util2` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `achat_util2`;

-- --------------------------------------------------------

--
-- Structure de la table `achat`
--

DROP TABLE IF EXISTS `achat`;
CREATE TABLE IF NOT EXISTS `achat` (
  `idAchat` int(11) NOT NULL AUTO_INCREMENT,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total` int(11) DEFAULT NULL,
  `don` int(11) DEFAULT NULL,
  `Utilisateur_idUtilisateur` int(11) NOT NULL,
  `Enseigne_idEnseigne` int(11) NOT NULL,
  PRIMARY KEY (`idAchat`),
  KEY `fk_achat_util2isateur1_idx` (`Utilisateur_idUtilisateur`),
  KEY `fk_Achat_Enseigne1_idx` (`Enseigne_idEnseigne`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=101 ;

-- --------------------------------------------------------

--
-- Structure de la table `achat_has_enseigne_has_produits`
--

DROP TABLE IF EXISTS `achat_has_enseigne_has_produits`;
CREATE TABLE IF NOT EXISTS `achat_has_enseigne_has_produits` (
  `Achat_idAchat` int(11) NOT NULL,
  `Enseigne_has_Produits_Enseigne_idEnseigne` int(11) NOT NULL,
  `Enseigne_has_Produits_Produits_idProduits` int(11) NOT NULL,
  `quantite` int(11) DEFAULT '1',
  `prix` int(11) DEFAULT NULL,
  PRIMARY KEY (`Achat_idAchat`,`Enseigne_has_Produits_Enseigne_idEnseigne`,`Enseigne_has_Produits_Produits_idProduits`),
  KEY `fk_Achat_has_Enseigne_has_Produits_Enseigne_has_Produits1_idx` (`Enseigne_has_Produits_Enseigne_idEnseigne`,`Enseigne_has_Produits_Produits_idProduits`),
  KEY `fk_Achat_has_Enseigne_has_Produits_Achat1_idx` (`Achat_idAchat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `association`
--

DROP TABLE IF EXISTS `association`;
CREATE TABLE IF NOT EXISTS `association` (
  `idAssociation` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` mediumtext NOT NULL,
  `description_courte` text NOT NULL,
  `date_creation` varchar(200) NOT NULL,
  `ville` varchar(100) DEFAULT '''PARIS''',
  `Assoc_Contact_idAssoc_Contact` int(11) NOT NULL,
  `Assoc_Contact_Personne_idPersonne` int(11) NOT NULL,
  PRIMARY KEY (`idAssociation`),
  KEY `fk_Association_Assoc_Contact1_idx` (`Assoc_Contact_idAssoc_Contact`,`Assoc_Contact_Personne_idPersonne`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Structure de la table `assoc_contact`
--

DROP TABLE IF EXISTS `assoc_contact`;
CREATE TABLE IF NOT EXISTS `assoc_contact` (
  `idAssoc_Contact` int(11) NOT NULL AUTO_INCREMENT,
  `Personne_idPersonne` int(11) NOT NULL,
  PRIMARY KEY (`idAssoc_Contact`,`Personne_idPersonne`),
  KEY `fk_Assoc_Contact_Personne1_idx` (`Personne_idPersonne`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=101 ;

-- --------------------------------------------------------

--
-- Structure de la table `assoc_contact_has_don`
--

DROP TABLE IF EXISTS `assoc_contact_has_don`;
CREATE TABLE IF NOT EXISTS `assoc_contact_has_don` (
  `Assoc_Contact_idAssoc_Contact` int(11) NOT NULL,
  `Assoc_Contact_Personne_idPersonne` int(11) NOT NULL,
  `Don_idDon` int(11) NOT NULL,
  PRIMARY KEY (`Assoc_Contact_idAssoc_Contact`,`Assoc_Contact_Personne_idPersonne`,`Don_idDon`),
  KEY `fk_Assoc_Contact_has_Don_Don1_idx` (`Don_idDon`),
  KEY `fk_Assoc_Contact_has_Don_Assoc_Contact1_idx` (`Assoc_Contact_idAssoc_Contact`,`Assoc_Contact_Personne_idPersonne`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
  `idblog` int(11) NOT NULL AUTO_INCREMENT,
  `text` longtext,
  `commentairs` longtext,
  PRIMARY KEY (`idblog`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Structure de la table `categorycategory`
--

DROP TABLE IF EXISTS `categorycategory`;
CREATE TABLE IF NOT EXISTS `categorycategory` (
  `idCategoryCategory` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryCategory` varchar(255) NOT NULL,
  PRIMARY KEY (`idCategoryCategory`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

-- --------------------------------------------------------

--
-- Structure de la table `categoryproduits`
--

DROP TABLE IF EXISTS `categoryproduits`;
CREATE TABLE IF NOT EXISTS `categoryproduits` (
  `idCategoryProduits` int(11) NOT NULL,
  `CategoryProduits` varchar(45) NOT NULL,
  `idCategoryCategory` int(11) NOT NULL,
  PRIMARY KEY (`idCategoryProduits`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `creditachatdon`
--

DROP TABLE IF EXISTS `creditachatdon`;
CREATE TABLE IF NOT EXISTS `creditachatdon` (
  `idpersonne` int(11) NOT NULL AUTO_INCREMENT,
  `credit` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idpersonne`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `don`
--

DROP TABLE IF EXISTS `don`;
CREATE TABLE IF NOT EXISTS `don` (
  `idDon` int(11) NOT NULL AUTO_INCREMENT,
  `Don` double NOT NULL,
  `type_don` enum('Projet','Assoc') NOT NULL DEFAULT 'Projet',
  `Achat_idAchat` int(11) NOT NULL,
  PRIMARY KEY (`idDon`),
  KEY `fk_Don_Achat1_idx` (`Achat_idAchat`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=101 ;

-- --------------------------------------------------------

--
-- Structure de la table `enseigne`
--

DROP TABLE IF EXISTS `enseigne`;
CREATE TABLE IF NOT EXISTS `enseigne` (
  `idEnseigne` int(11) NOT NULL AUTO_INCREMENT,
  `enseigne` varchar(100) DEFAULT NULL,
  `pourcentage_reverse` int(11) NOT NULL DEFAULT '1',
  `idContact` int(5) NOT NULL DEFAULT '10',
  `mail_contact` varchar(255) NOT NULL DEFAULT 'enseigne@enseigne.fr',
  `description` text NOT NULL,
  PRIMARY KEY (`idEnseigne`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=101 ;

-- --------------------------------------------------------

--
-- Structure de la table `enseigne_has_categoryproduits`
--

DROP TABLE IF EXISTS `enseigne_has_categoryproduits`;
CREATE TABLE IF NOT EXISTS `enseigne_has_categoryproduits` (
  `Enseigne_idEnseigne` int(11) NOT NULL,
  `CategoryProduits_idCategoryProduits` int(11) NOT NULL,
  PRIMARY KEY (`Enseigne_idEnseigne`,`CategoryProduits_idCategoryProduits`),
  KEY `fk_Enseigne_has_CategoryProduits_CategoryProduits1_idx` (`CategoryProduits_idCategoryProduits`),
  KEY `fk_Enseigne_has_CategoryProduits_Enseigne1_idx` (`Enseigne_idEnseigne`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `enseigne_has_produits`
--

DROP TABLE IF EXISTS `enseigne_has_produits`;
CREATE TABLE IF NOT EXISTS `enseigne_has_produits` (
  `Enseigne_idEnseigne` int(11) NOT NULL,
  `Produits_idProduits` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `QteRestant` int(11) DEFAULT NULL,
  `reductionprofiluser` int(5) DEFAULT NULL,
  `promo` int(5) DEFAULT NULL,
  PRIMARY KEY (`Enseigne_idEnseigne`,`Produits_idProduits`),
  KEY `fk_Enseigne_has_Produits_Produits1_idx` (`Produits_idProduits`),
  KEY `fk_Enseigne_has_Produits_Enseigne1_idx` (`Enseigne_idEnseigne`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `enseigne_has_typeenseigne`
--

DROP TABLE IF EXISTS `enseigne_has_typeenseigne`;
CREATE TABLE IF NOT EXISTS `enseigne_has_typeenseigne` (
  `Enseigne_idEnseigne` int(11) NOT NULL,
  `TypeEnseigne_idTypeEnseigne` int(11) NOT NULL,
  PRIMARY KEY (`Enseigne_idEnseigne`,`TypeEnseigne_idTypeEnseigne`),
  KEY `fk_Enseigne_has_TypeEnseigne_TypeEnseigne1_idx` (`TypeEnseigne_idTypeEnseigne`),
  KEY `fk_Enseigne_has_TypeEnseigne_Enseigne1_idx` (`Enseigne_idEnseigne`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

DROP TABLE IF EXISTS `marque`;
CREATE TABLE IF NOT EXISTS `marque` (
  `idmarque` int(11) NOT NULL AUTO_INCREMENT,
  `marque` varchar(255) NOT NULL,
  PRIMARY KEY (`idmarque`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Structure de la table `mediasassociation`
--

DROP TABLE IF EXISTS `mediasassociation`;
CREATE TABLE IF NOT EXISTS `mediasassociation` (
  `idMediasassociation` int(11) NOT NULL AUTO_INCREMENT,
  `Mediasassociation` varchar(100) NOT NULL,
  `comment` varchar(200) NOT NULL DEFAULT 'commentaire photo',
  `association_idassociation` int(11) NOT NULL,
  PRIMARY KEY (`idMediasassociation`),
  KEY `fk_Mediasassociation_association1_idx` (`association_idassociation`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=58 ;

-- --------------------------------------------------------

--
-- Structure de la table `mediasblog`
--

DROP TABLE IF EXISTS `mediasblog`;
CREATE TABLE IF NOT EXISTS `mediasblog` (
  `idmediasBlog` int(11) NOT NULL AUTO_INCREMENT,
  `media` varchar(100) DEFAULT NULL,
  `blog_idblog` int(11) NOT NULL,
  PRIMARY KEY (`idmediasBlog`),
  KEY `fk_mediasBlog_blog1_idx` (`blog_idblog`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Structure de la table `mediasenseigne`
--

DROP TABLE IF EXISTS `mediasenseigne`;
CREATE TABLE IF NOT EXISTS `mediasenseigne` (
  `idMediasenseigne` int(11) NOT NULL AUTO_INCREMENT,
  `Mediasenseigne` varchar(100) NOT NULL,
  `comment` varchar(200) NOT NULL DEFAULT 'commentaire photo',
  `enseigne_idenseigne` int(11) NOT NULL,
  PRIMARY KEY (`idMediasenseigne`),
  KEY `fk_Mediasenseigne_enseigne1_idx` (`enseigne_idenseigne`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=604 ;

-- --------------------------------------------------------

--
-- Structure de la table `mediasproduits`
--

DROP TABLE IF EXISTS `mediasproduits`;
CREATE TABLE IF NOT EXISTS `mediasproduits` (
  `idMediasProduits` int(11) NOT NULL AUTO_INCREMENT,
  `MediasProduits` varchar(255) NOT NULL,
  `typeaffiche` varchar(20) NOT NULL DEFAULT 'shop',
  `Produits_idProduits` int(11) NOT NULL,
  PRIMARY KEY (`idMediasProduits`),
  KEY `fk_Medias_Produits1_idx` (`Produits_idProduits`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=503 ;

-- --------------------------------------------------------

--
-- Structure de la table `mediasprojet`
--

DROP TABLE IF EXISTS `mediasprojet`;
CREATE TABLE IF NOT EXISTS `mediasprojet` (
  `idMediasProjet` int(11) NOT NULL AUTO_INCREMENT,
  `MediasProjet` varchar(100) NOT NULL,
  `comment` varchar(200) NOT NULL DEFAULT 'commentaire photo',
  `Projet_idProjet` int(11) NOT NULL,
  PRIMARY KEY (`idMediasProjet`),
  KEY `fk_MediasProjet_Projet1_idx` (`Projet_idProjet`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=58 ;

-- --------------------------------------------------------

--
-- Structure de la table `notesproduits`
--

DROP TABLE IF EXISTS `notesproduits`;
CREATE TABLE IF NOT EXISTS `notesproduits` (
  `idnotesproduits` int(5) NOT NULL AUTO_INCREMENT,
  `idpersonne` int(5) NOT NULL DEFAULT '1',
  `idproduit` int(5) NOT NULL DEFAULT '1',
  `comments` text,
  `notes` int(2) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idnotesproduits`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1718 ;

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

DROP TABLE IF EXISTS `pays`;
CREATE TABLE IF NOT EXISTS `pays` (
  `idPays` int(11) NOT NULL AUTO_INCREMENT,
  `pays_abrege` varchar(2) NOT NULL,
  `pays` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idPays`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=240 ;

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `idPersonne` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `adresse` varchar(45) NOT NULL,
  `code_postal` int(11) NOT NULL,
  `ville` varchar(45) NOT NULL,
  `tel` varchar(10) NOT NULL DEFAULT '0622202222',
  `mail` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `date_inscrition` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(4) NOT NULL DEFAULT 'user',
  `avatar` varchar(200) NOT NULL DEFAULT 'http://localhost/AchatSolidaire/images/avatar/man.png',
  PRIMARY KEY (`idPersonne`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=136 ;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `idProduits` int(11) NOT NULL AUTO_INCREMENT,
  `Description` text,
  `Produits` varchar(45) DEFAULT NULL,
  `Prix_de_reference` int(11) DEFAULT '100',
  `CategoryProduits_idCategoryProduits` int(11) NOT NULL,
  `is_reduc` enum('yes','no') NOT NULL DEFAULT 'no',
  `reduct` int(2) NOT NULL,
  PRIMARY KEY (`idProduits`),
  KEY `fk_Produits_CategoryProduits1_idx` (`CategoryProduits_idCategoryProduits`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=101 ;

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

DROP TABLE IF EXISTS `projet`;
CREATE TABLE IF NOT EXISTS `projet` (
  `idProjet` int(11) NOT NULL AUTO_INCREMENT,
  `Projet` text NOT NULL,
  `Description` text NOT NULL,
  `description_courte` text NOT NULL,
  `FondsRecoltes` float NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Association_idAssociation` int(11) NOT NULL DEFAULT '4',
  `Pays_idPays` int(11) NOT NULL DEFAULT '4',
  PRIMARY KEY (`idProjet`),
  KEY `fk_Projet_Association1_idx` (`Association_idAssociation`),
  KEY `fk_Projet_Pays1_idx` (`Pays_idPays`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Structure de la table `projet_has_don`
--

DROP TABLE IF EXISTS `projet_has_don`;
CREATE TABLE IF NOT EXISTS `projet_has_don` (
  `Projet_idProjet` int(11) NOT NULL,
  `Don_idDon` int(11) NOT NULL,
  PRIMARY KEY (`Projet_idProjet`,`Don_idDon`),
  KEY `fk_Projet_has_Don_Don1_idx` (`Don_idDon`),
  KEY `fk_Projet_has_Don_Projet1_idx` (`Projet_idProjet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `typeenseigne`
--

DROP TABLE IF EXISTS `typeenseigne`;
CREATE TABLE IF NOT EXISTS `typeenseigne` (
  `idTypeEnseigne` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) NOT NULL,
  PRIMARY KEY (`idTypeEnseigne`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `Personne_idPersonne` int(11) NOT NULL,
  PRIMARY KEY (`idUtilisateur`,`Personne_idPersonne`),
  KEY `fk_Utilisateur_Personne1_idx` (`Personne_idPersonne`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `view_associationcontact`
--
DROP VIEW IF EXISTS `view_associationcontact`;
CREATE TABLE IF NOT EXISTS `view_associationcontact` (
`idAssociation` int(11)
,`name` varchar(45)
,`description` mediumtext
,`date_creationa` varchar(200)
,`villea` varchar(100)
,`idPersonne` int(11)
,`nom` varchar(45)
,`prenom` varchar(45)
,`adresse` varchar(45)
,`code_postal` int(11)
,`ville` varchar(45)
,`tel` varchar(10)
,`mail` varchar(100)
,`date_inscrition` datetime
,`status` varchar(4)
,`avatar` varchar(200)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `view_association_mediaassociation`
--
DROP VIEW IF EXISTS `view_association_mediaassociation`;
CREATE TABLE IF NOT EXISTS `view_association_mediaassociation` (
`idMediasassociation` int(11)
,`Mediasassociation` varchar(100)
,`comment` varchar(200)
,`association_idassociation` int(11)
,`idAssociation` int(11)
,`name` varchar(45)
,`description` mediumtext
,`description_courte` text
,`date_creation` varchar(200)
,`ville` varchar(100)
,`Assoc_Contact_idAssoc_Contact` int(11)
,`Assoc_Contact_Personne_idPersonne` int(11)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `view_categorycategoryproduits`
--
DROP VIEW IF EXISTS `view_categorycategoryproduits`;
CREATE TABLE IF NOT EXISTS `view_categorycategoryproduits` (
`idCategoryCategory` int(11)
,`CategoryCategory` varchar(255)
,`idCategoryProduits` int(11)
,`CategoryProduits` varchar(45)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `view_enseignetypecontact`
--
DROP VIEW IF EXISTS `view_enseignetypecontact`;
CREATE TABLE IF NOT EXISTS `view_enseignetypecontact` (
`idEnseigne` int(11)
,`enseigne` varchar(100)
,`pourcentage_reverse` int(11)
,`idContact` int(5)
,`idPersonne` int(11)
,`nom` varchar(45)
,`prenom` varchar(45)
,`adresse` varchar(45)
,`code_postal` int(11)
,`ville` varchar(45)
,`tel` varchar(10)
,`mail` varchar(100)
,`password` varchar(100)
,`date_inscrition` datetime
,`status` varchar(4)
,`avatar` varchar(200)
,`type` varchar(45)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `view_listeachats`
--
DROP VIEW IF EXISTS `view_listeachats`;
CREATE TABLE IF NOT EXISTS `view_listeachats` (
`idAchat` int(11)
,`Date` datetime
,`Acheteur` varchar(91)
,`produits` varchar(45)
,`quantite` int(11)
,`Enseigne` varchar(100)
,`prix Enseigne` int(11)
,`pourcentage_reverse` int(11)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `view_listecategoryparenseigne`
--
DROP VIEW IF EXISTS `view_listecategoryparenseigne`;
CREATE TABLE IF NOT EXISTS `view_listecategoryparenseigne` (
`enseigne` varchar(100)
,`CategoryProduits` varchar(45)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `view_listecategoryparenseigne2`
--
DROP VIEW IF EXISTS `view_listecategoryparenseigne2`;
CREATE TABLE IF NOT EXISTS `view_listecategoryparenseigne2` (
`CategoryProduits` varchar(45)
,`enseigne` varchar(100)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `view_listedonsparutilisateur`
--
DROP VIEW IF EXISTS `view_listedonsparutilisateur`;
CREATE TABLE IF NOT EXISTS `view_listedonsparutilisateur` (
`Projet` text
,`description` text
,`Don en Euros` double
,`Date` datetime
,`Donateur` varchar(91)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `view_listeenseignesettype`
--
DROP VIEW IF EXISTS `view_listeenseignesettype`;
CREATE TABLE IF NOT EXISTS `view_listeenseignesettype` (
`idEnseigne` int(11)
,`enseigne` varchar(100)
,`pourcentage_reverse` int(11)
,`type` varchar(45)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `view_notesproduits`
--
DROP VIEW IF EXISTS `view_notesproduits`;
CREATE TABLE IF NOT EXISTS `view_notesproduits` (
`nom` varchar(45)
,`prenom` varchar(45)
,`idnotesproduits` int(5)
,`idpersonne` int(5)
,`idproduit` int(5)
,`comments` text
,`notes` int(2)
,`date` datetime
,`Produits` varchar(45)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `view_produitsallensignescategory`
--
DROP VIEW IF EXISTS `view_produitsallensignescategory`;
CREATE TABLE IF NOT EXISTS `view_produitsallensignescategory` (
`idProduits` int(11)
,`Produits` varchar(45)
,`Description` text
,`Prix_de_reference` int(11)
,`CategoryProduits_idCategoryProduits` int(11)
,`CategoryProduits` varchar(45)
,`Enseigne_idEnseigne` int(11)
,`prix` int(11)
,`QteRestant` int(11)
,`idEnseigne` int(11)
,`enseigne` varchar(100)
,`pourcentage_reverse` int(11)
,`idContact` int(5)
,`mediasproduits` varchar(255)
,`idCategoryCategory` int(11)
,`CategoryCategory` varchar(255)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `view_produitsparcategory`
--
DROP VIEW IF EXISTS `view_produitsparcategory`;
CREATE TABLE IF NOT EXISTS `view_produitsparcategory` (
`CategoryProduits` varchar(45)
,`idProduits` int(11)
,`Produits` varchar(45)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `view_produitsparcategoryenseigne`
--
DROP VIEW IF EXISTS `view_produitsparcategoryenseigne`;
CREATE TABLE IF NOT EXISTS `view_produitsparcategoryenseigne` (
`enseigne` varchar(100)
,`CategoryProduits` varchar(45)
,`idProduits` int(11)
,`Produits` varchar(45)
,`pourcentage_reverse` int(11)
,`prix Enseigne` int(11)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `view_produitsparcategoryenseigne2`
--
DROP VIEW IF EXISTS `view_produitsparcategoryenseigne2`;
CREATE TABLE IF NOT EXISTS `view_produitsparcategoryenseigne2` (
`idProduits` int(11)
,`Produits` varchar(45)
,`pourcentage_reverse` int(11)
,`prix Enseigne` int(11)
,`enseigne` varchar(100)
,`CategoryProduits` varchar(45)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `view_projetparpaysassoc`
--
DROP VIEW IF EXISTS `view_projetparpaysassoc`;
CREATE TABLE IF NOT EXISTS `view_projetparpaysassoc` (
`Projet` text
,`Description` text
,`pays` varchar(100)
,`(association portant le projet)` varchar(45)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `view_projetparpaysassoc2`
--
DROP VIEW IF EXISTS `view_projetparpaysassoc2`;
CREATE TABLE IF NOT EXISTS `view_projetparpaysassoc2` (
`pays` varchar(100)
,`Projet` text
,`Description` text
,`(association portant le projet)` varchar(45)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `view_projetparpaysparasso`
--
DROP VIEW IF EXISTS `view_projetparpaysparasso`;
CREATE TABLE IF NOT EXISTS `view_projetparpaysparasso` (
`idProjet` int(11)
,`Projet` text
,`Description` text
,`FondsRecoltes` float
,`date` datetime
,`Association_idAssociation` int(11)
,`Pays_idPays` int(11)
,`pays` varchar(100)
,`nameAssoc` varchar(45)
,`nom` varchar(45)
,`prenom` varchar(45)
,`adresse` varchar(45)
,`code_postal` int(11)
,`ville` varchar(45)
,`tel` varchar(10)
,`mail` varchar(100)
);
-- --------------------------------------------------------

--
-- Structure de la vue `view_associationcontact`
--
DROP TABLE IF EXISTS `view_associationcontact`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_associationcontact` AS select `a`.`idAssociation` AS `idAssociation`,`a`.`name` AS `name`,`a`.`description` AS `description`,`a`.`date_creation` AS `date_creationa`,`a`.`ville` AS `villea`,`p`.`idPersonne` AS `idPersonne`,`p`.`nom` AS `nom`,`p`.`prenom` AS `prenom`,`p`.`adresse` AS `adresse`,`p`.`code_postal` AS `code_postal`,`p`.`ville` AS `ville`,`p`.`tel` AS `tel`,`p`.`mail` AS `mail`,`p`.`date_inscrition` AS `date_inscrition`,`p`.`status` AS `status`,`p`.`avatar` AS `avatar` from (`personne` `p` join `association` `a`) where (`a`.`Assoc_Contact_idAssoc_Contact` = `p`.`idPersonne`);

-- --------------------------------------------------------

--
-- Structure de la vue `view_association_mediaassociation`
--
DROP TABLE IF EXISTS `view_association_mediaassociation`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_association_mediaassociation` AS select `m`.`idMediasassociation` AS `idMediasassociation`,`m`.`Mediasassociation` AS `Mediasassociation`,`m`.`comment` AS `comment`,`m`.`association_idassociation` AS `association_idassociation`,`a`.`idAssociation` AS `idAssociation`,`a`.`name` AS `name`,`a`.`description` AS `description`,`a`.`description_courte` AS `description_courte`,`a`.`date_creation` AS `date_creation`,`a`.`ville` AS `ville`,`a`.`Assoc_Contact_idAssoc_Contact` AS `Assoc_Contact_idAssoc_Contact`,`a`.`Assoc_Contact_Personne_idPersonne` AS `Assoc_Contact_Personne_idPersonne` from (`mediasassociation` `m` join `association` `a`) where (`a`.`idAssociation` = `m`.`association_idassociation`) order by `a`.`idAssociation`;

-- --------------------------------------------------------

--
-- Structure de la vue `view_categorycategoryproduits`
--
DROP TABLE IF EXISTS `view_categorycategoryproduits`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_categorycategoryproduits` AS select `cc`.`idCategoryCategory` AS `idCategoryCategory`,`cc`.`CategoryCategory` AS `CategoryCategory`,`cp`.`idCategoryProduits` AS `idCategoryProduits`,`cp`.`CategoryProduits` AS `CategoryProduits` from (`categoryproduits` `cp` join `categorycategory` `cc`) where (`cp`.`idCategoryCategory` = `cc`.`idCategoryCategory`);

-- --------------------------------------------------------

--
-- Structure de la vue `view_enseignetypecontact`
--
DROP TABLE IF EXISTS `view_enseignetypecontact`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_enseignetypecontact` AS select `e`.`idEnseigne` AS `idEnseigne`,`e`.`enseigne` AS `enseigne`,`e`.`pourcentage_reverse` AS `pourcentage_reverse`,`e`.`idContact` AS `idContact`,`p`.`idPersonne` AS `idPersonne`,`p`.`nom` AS `nom`,`p`.`prenom` AS `prenom`,`p`.`adresse` AS `adresse`,`p`.`code_postal` AS `code_postal`,`p`.`ville` AS `ville`,`p`.`tel` AS `tel`,`p`.`mail` AS `mail`,`p`.`password` AS `password`,`p`.`date_inscrition` AS `date_inscrition`,`p`.`status` AS `status`,`p`.`avatar` AS `avatar`,`t`.`type` AS `type` from (((`enseigne_has_typeenseigne` `eht` join `typeenseigne` `t`) join `enseigne` `e`) join `personne` `p`) where ((`e`.`idEnseigne` = `eht`.`Enseigne_idEnseigne`) and (`t`.`idTypeEnseigne` = `eht`.`TypeEnseigne_idTypeEnseigne`) and (`e`.`idContact` = `p`.`idPersonne`));

-- --------------------------------------------------------

--
-- Structure de la vue `view_listeachats`
--
DROP TABLE IF EXISTS `view_listeachats`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_listeachats` AS select `a`.`idAchat` AS `idAchat`,`a`.`Date` AS `Date`,concat(`pe`.`nom`,' ',`pe`.`prenom`) AS `Acheteur`,`p`.`Produits` AS `produits`,`ahe`.`quantite` AS `quantite`,`e`.`enseigne` AS `Enseigne`,`ehp`.`prix` AS `prix Enseigne`,`e`.`pourcentage_reverse` AS `pourcentage_reverse` from (((((`achat` `a` join `achat_has_enseigne_has_produits` `ahe`) join `personne` `pe`) join `produits` `p`) join `enseigne` `e`) join `enseigne_has_produits` `ehp`) where ((`a`.`idAchat` = `ahe`.`Achat_idAchat`) and (`a`.`Utilisateur_idUtilisateur` = `pe`.`idPersonne`) and (`ahe`.`Enseigne_has_Produits_Produits_idProduits` = `p`.`idProduits`) and (`ahe`.`Enseigne_has_Produits_Enseigne_idEnseigne` = `e`.`idEnseigne`) and (`ehp`.`Produits_idProduits` = `ahe`.`Enseigne_has_Produits_Produits_idProduits`) and (`ehp`.`Enseigne_idEnseigne` = `e`.`idEnseigne`)) order by `a`.`idAchat`;

-- --------------------------------------------------------

--
-- Structure de la vue `view_listecategoryparenseigne`
--
DROP TABLE IF EXISTS `view_listecategoryparenseigne`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_listecategoryparenseigne` AS select `e`.`enseigne` AS `enseigne`,`c`.`CategoryProduits` AS `CategoryProduits` from ((`enseigne_has_categoryproduits` `ehc` join `enseigne` `e`) join `categoryproduits` `c`) where ((`c`.`idCategoryProduits` = `ehc`.`CategoryProduits_idCategoryProduits`) and (`ehc`.`Enseigne_idEnseigne` = `e`.`idEnseigne`)) order by `e`.`enseigne`;

-- --------------------------------------------------------

--
-- Structure de la vue `view_listecategoryparenseigne2`
--
DROP TABLE IF EXISTS `view_listecategoryparenseigne2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_listecategoryparenseigne2` AS select `c`.`CategoryProduits` AS `CategoryProduits`,`e`.`enseigne` AS `enseigne` from ((`enseigne_has_categoryproduits` `ehc` join `enseigne` `e`) join `categoryproduits` `c`) where ((`c`.`idCategoryProduits` = `ehc`.`CategoryProduits_idCategoryProduits`) and (`ehc`.`Enseigne_idEnseigne` = `e`.`idEnseigne`)) order by `c`.`CategoryProduits`;

-- --------------------------------------------------------

--
-- Structure de la vue `view_listedonsparutilisateur`
--
DROP TABLE IF EXISTS `view_listedonsparutilisateur`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_listedonsparutilisateur` AS select `p`.`Projet` AS `Projet`,`p`.`Description` AS `description`,`d`.`Don` AS `Don en Euros`,`a`.`Date` AS `Date`,concat(`pe`.`nom`,' ',`pe`.`prenom`) AS `Donateur` from (((((`projet_has_don` `phd` join `don` `d`) join `projet` `p`) join `pays` `pa`) join `achat` `a`) join `personne` `pe`) where ((`phd`.`Don_idDon` = `d`.`idDon`) and (`phd`.`Projet_idProjet` = `p`.`idProjet`) and (`pa`.`idPays` = `p`.`Pays_idPays`) and (`d`.`Achat_idAchat` = `a`.`idAchat`) and (`a`.`Utilisateur_idUtilisateur` = `pe`.`idPersonne`)) order by `p`.`Projet`;

-- --------------------------------------------------------

--
-- Structure de la vue `view_listeenseignesettype`
--
DROP TABLE IF EXISTS `view_listeenseignesettype`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_listeenseignesettype` AS select `e`.`idEnseigne` AS `idEnseigne`,`e`.`enseigne` AS `enseigne`,`e`.`pourcentage_reverse` AS `pourcentage_reverse`,`t`.`type` AS `type` from ((`enseigne_has_typeenseigne` `eht` join `typeenseigne` `t`) join `enseigne` `e`) where ((`e`.`idEnseigne` = `eht`.`Enseigne_idEnseigne`) and (`t`.`idTypeEnseigne` = `eht`.`TypeEnseigne_idTypeEnseigne`));

-- --------------------------------------------------------

--
-- Structure de la vue `view_notesproduits`
--
DROP TABLE IF EXISTS `view_notesproduits`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_notesproduits` AS select `p`.`nom` AS `nom`,`p`.`prenom` AS `prenom`,`np`.`idnotesproduits` AS `idnotesproduits`,`np`.`idpersonne` AS `idpersonne`,`np`.`idproduit` AS `idproduit`,`np`.`comments` AS `comments`,`np`.`notes` AS `notes`,`np`.`date` AS `date`,`pr`.`Produits` AS `Produits` from ((`personne` `p` join `notesproduits` `np`) join `produits` `pr`) where ((`p`.`idPersonne` = `np`.`idpersonne`) and (`pr`.`idProduits` = `np`.`idproduit`));

-- --------------------------------------------------------

--
-- Structure de la vue `view_produitsallensignescategory`
--
DROP TABLE IF EXISTS `view_produitsallensignescategory`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_produitsallensignescategory` AS select `p`.`idProduits` AS `idProduits`,`p`.`Produits` AS `Produits`,`p`.`Description` AS `Description`,`p`.`Prix_de_reference` AS `Prix_de_reference`,`p`.`CategoryProduits_idCategoryProduits` AS `CategoryProduits_idCategoryProduits`,`c`.`CategoryProduits` AS `CategoryProduits`,`ehp`.`Enseigne_idEnseigne` AS `Enseigne_idEnseigne`,`ehp`.`prix` AS `prix`,`ehp`.`QteRestant` AS `QteRestant`,`e`.`idEnseigne` AS `idEnseigne`,`e`.`enseigne` AS `enseigne`,`e`.`pourcentage_reverse` AS `pourcentage_reverse`,`e`.`idContact` AS `idContact`,`m`.`MediasProduits` AS `mediasproduits`,`cc`.`idCategoryCategory` AS `idCategoryCategory`,`cc`.`CategoryCategory` AS `CategoryCategory` from (((((`enseigne_has_produits` `ehp` join `produits` `p`) join `enseigne` `e`) join `categoryproduits` `c`) join `mediasproduits` `m`) join `categorycategory` `cc`) where ((`ehp`.`Produits_idProduits` = `p`.`idProduits`) and (`e`.`idEnseigne` = `ehp`.`Enseigne_idEnseigne`) and (`c`.`idCategoryProduits` = `p`.`CategoryProduits_idCategoryProduits`) and (`m`.`typeaffiche` = 'shop') and (`m`.`Produits_idProduits` = `p`.`idProduits`) and (`c`.`idCategoryCategory` = `cc`.`idCategoryCategory`)) order by `p`.`idProduits`;

-- --------------------------------------------------------

--
-- Structure de la vue `view_produitsparcategory`
--
DROP TABLE IF EXISTS `view_produitsparcategory`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_produitsparcategory` AS select `c`.`CategoryProduits` AS `CategoryProduits`,`p`.`idProduits` AS `idProduits`,`p`.`Produits` AS `Produits` from (`categoryproduits` `c` join `produits` `p`) where (`c`.`idCategoryProduits` = `p`.`CategoryProduits_idCategoryProduits`) order by `c`.`CategoryProduits`;

-- --------------------------------------------------------

--
-- Structure de la vue `view_produitsparcategoryenseigne`
--
DROP TABLE IF EXISTS `view_produitsparcategoryenseigne`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_produitsparcategoryenseigne` AS select `e`.`enseigne` AS `enseigne`,`c`.`CategoryProduits` AS `CategoryProduits`,`p`.`idProduits` AS `idProduits`,`p`.`Produits` AS `Produits`,`e`.`pourcentage_reverse` AS `pourcentage_reverse`,`ehp`.`prix` AS `prix Enseigne` from ((((`enseigne` `e` join `enseigne_has_categoryproduits` `ehc`) join `categoryproduits` `c`) join `produits` `p`) join `enseigne_has_produits` `ehp`) where ((`e`.`idEnseigne` = `ehc`.`Enseigne_idEnseigne`) and (`c`.`idCategoryProduits` = `ehc`.`CategoryProduits_idCategoryProduits`) and (`c`.`idCategoryProduits` = `p`.`CategoryProduits_idCategoryProduits`) and (`ehp`.`Produits_idProduits` = `p`.`idProduits`) and (`ehp`.`Enseigne_idEnseigne` = `e`.`idEnseigne`)) order by `e`.`enseigne`,`c`.`CategoryProduits`;

-- --------------------------------------------------------

--
-- Structure de la vue `view_produitsparcategoryenseigne2`
--
DROP TABLE IF EXISTS `view_produitsparcategoryenseigne2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_produitsparcategoryenseigne2` AS select `p`.`idProduits` AS `idProduits`,`p`.`Produits` AS `Produits`,`e`.`pourcentage_reverse` AS `pourcentage_reverse`,`ehp`.`prix` AS `prix Enseigne`,`e`.`enseigne` AS `enseigne`,`c`.`CategoryProduits` AS `CategoryProduits` from ((((`enseigne` `e` join `enseigne_has_categoryproduits` `ehc`) join `categoryproduits` `c`) join `produits` `p`) join `enseigne_has_produits` `ehp`) where ((`e`.`idEnseigne` = `ehc`.`Enseigne_idEnseigne`) and (`c`.`idCategoryProduits` = `ehc`.`CategoryProduits_idCategoryProduits`) and (`c`.`idCategoryProduits` = `p`.`CategoryProduits_idCategoryProduits`) and (`ehp`.`Produits_idProduits` = `p`.`idProduits`) and (`ehp`.`Enseigne_idEnseigne` = `e`.`idEnseigne`)) order by `p`.`Produits`,`ehp`.`prix`,`e`.`enseigne`;

-- --------------------------------------------------------

--
-- Structure de la vue `view_projetparpaysassoc`
--
DROP TABLE IF EXISTS `view_projetparpaysassoc`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_projetparpaysassoc` AS select `pr`.`Projet` AS `Projet`,`pr`.`Description` AS `Description`,`pa`.`pays` AS `pays`,`a`.`name` AS `(association portant le projet)` from ((`projet` `pr` join `pays` `pa`) join `association` `a`) where ((`pr`.`Association_idAssociation` = `a`.`idAssociation`) and (`pa`.`idPays` = `pr`.`Pays_idPays`)) order by `pr`.`Projet`;

-- --------------------------------------------------------

--
-- Structure de la vue `view_projetparpaysassoc2`
--
DROP TABLE IF EXISTS `view_projetparpaysassoc2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_projetparpaysassoc2` AS select `pa`.`pays` AS `pays`,`pr`.`Projet` AS `Projet`,`pr`.`Description` AS `Description`,`a`.`name` AS `(association portant le projet)` from ((`projet` `pr` join `pays` `pa`) join `association` `a`) where ((`pr`.`Association_idAssociation` = `a`.`idAssociation`) and (`pa`.`idPays` = `pr`.`Pays_idPays`)) order by `pa`.`pays`;

-- --------------------------------------------------------

--
-- Structure de la vue `view_projetparpaysparasso`
--
DROP TABLE IF EXISTS `view_projetparpaysparasso`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_projetparpaysparasso` AS select `p`.`idProjet` AS `idProjet`,`p`.`Projet` AS `Projet`,`p`.`Description` AS `Description`,`p`.`FondsRecoltes` AS `FondsRecoltes`,`p`.`date` AS `date`,`p`.`Association_idAssociation` AS `Association_idAssociation`,`p`.`Pays_idPays` AS `Pays_idPays`,`pa`.`pays` AS `pays`,`a`.`name` AS `nameAssoc`,`pers`.`nom` AS `nom`,`pers`.`prenom` AS `prenom`,`pers`.`adresse` AS `adresse`,`pers`.`code_postal` AS `code_postal`,`pers`.`ville` AS `ville`,`pers`.`tel` AS `tel`,`pers`.`mail` AS `mail` from (((`projet` `p` join `association` `a`) join `pays` `pa`) join `personne` `pers`) where ((`p`.`Association_idAssociation` = `a`.`idAssociation`) and (`p`.`Pays_idPays` = `pa`.`idPays`) and (`a`.`Assoc_Contact_Personne_idPersonne` = `pers`.`idPersonne`));

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `achat`
--
ALTER TABLE `achat`
  ADD CONSTRAINT `fk_Achat_Enseigne1` FOREIGN KEY (`Enseigne_idEnseigne`) REFERENCES `enseigne` (`idEnseigne`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_achat_util2isateur1` FOREIGN KEY (`Utilisateur_idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `achat_has_enseigne_has_produits`
--
ALTER TABLE `achat_has_enseigne_has_produits`
  ADD CONSTRAINT `fk_Achat_has_Enseigne_has_Produits_Achat1` FOREIGN KEY (`Achat_idAchat`) REFERENCES `achat` (`idAchat`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Achat_has_Enseigne_has_Produits_Enseigne_has_Produits1` FOREIGN KEY (`Enseigne_has_Produits_Enseigne_idEnseigne`, `Enseigne_has_Produits_Produits_idProduits`) REFERENCES `enseigne_has_produits` (`Enseigne_idEnseigne`, `Produits_idProduits`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `association`
--
ALTER TABLE `association`
  ADD CONSTRAINT `fk_Association_Assoc_Contact1` FOREIGN KEY (`Assoc_Contact_idAssoc_Contact`, `Assoc_Contact_Personne_idPersonne`) REFERENCES `assoc_contact` (`idAssoc_Contact`, `Personne_idPersonne`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `assoc_contact`
--
ALTER TABLE `assoc_contact`
  ADD CONSTRAINT `fk_Assoc_Contact_Personne1` FOREIGN KEY (`Personne_idPersonne`) REFERENCES `personne` (`idPersonne`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `assoc_contact_has_don`
--
ALTER TABLE `assoc_contact_has_don`
  ADD CONSTRAINT `fk_Assoc_Contact_has_Don_Assoc_Contact1` FOREIGN KEY (`Assoc_Contact_idAssoc_Contact`, `Assoc_Contact_Personne_idPersonne`) REFERENCES `assoc_contact` (`idAssoc_Contact`, `Personne_idPersonne`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Assoc_Contact_has_Don_Don1` FOREIGN KEY (`Don_idDon`) REFERENCES `don` (`idDon`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `don`
--
ALTER TABLE `don`
  ADD CONSTRAINT `fk_Don_Achat1` FOREIGN KEY (`Achat_idAchat`) REFERENCES `achat` (`idAchat`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `enseigne_has_categoryproduits`
--
ALTER TABLE `enseigne_has_categoryproduits`
  ADD CONSTRAINT `fk_Enseigne_has_CategoryProduits_CategoryProduits1` FOREIGN KEY (`CategoryProduits_idCategoryProduits`) REFERENCES `categoryproduits` (`idCategoryProduits`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Enseigne_has_CategoryProduits_Enseigne1` FOREIGN KEY (`Enseigne_idEnseigne`) REFERENCES `enseigne` (`idEnseigne`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `enseigne_has_produits`
--
ALTER TABLE `enseigne_has_produits`
  ADD CONSTRAINT `fk_Enseigne_has_Produits_Enseigne1` FOREIGN KEY (`Enseigne_idEnseigne`) REFERENCES `enseigne` (`idEnseigne`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Enseigne_has_Produits_Produits1` FOREIGN KEY (`Produits_idProduits`) REFERENCES `produits` (`idProduits`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `enseigne_has_typeenseigne`
--
ALTER TABLE `enseigne_has_typeenseigne`
  ADD CONSTRAINT `fk_Enseigne_has_TypeEnseigne_Enseigne1` FOREIGN KEY (`Enseigne_idEnseigne`) REFERENCES `enseigne` (`idEnseigne`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Enseigne_has_TypeEnseigne_TypeEnseigne1` FOREIGN KEY (`TypeEnseigne_idTypeEnseigne`) REFERENCES `typeenseigne` (`idTypeEnseigne`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `mediasblog`
--
ALTER TABLE `mediasblog`
  ADD CONSTRAINT `fk_mediasBlog_blog1` FOREIGN KEY (`blog_idblog`) REFERENCES `blog` (`idblog`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `mediasproduits`
--
ALTER TABLE `mediasproduits`
  ADD CONSTRAINT `fk_Medias_Produits1` FOREIGN KEY (`Produits_idProduits`) REFERENCES `produits` (`idProduits`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `mediasprojet`
--
ALTER TABLE `mediasprojet`
  ADD CONSTRAINT `fk_MediasProjet_Projet1` FOREIGN KEY (`Projet_idProjet`) REFERENCES `projet` (`idProjet`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `fk_Produits_CategoryProduits1` FOREIGN KEY (`CategoryProduits_idCategoryProduits`) REFERENCES `categoryproduits` (`idCategoryProduits`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `projet`
--
ALTER TABLE `projet`
  ADD CONSTRAINT `fk_Projet_Association1` FOREIGN KEY (`Association_idAssociation`) REFERENCES `association` (`idAssociation`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Projet_Pays1` FOREIGN KEY (`Pays_idPays`) REFERENCES `pays` (`idPays`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `projet_has_don`
--
ALTER TABLE `projet_has_don`
  ADD CONSTRAINT `fk_Projet_has_Don_Don1` FOREIGN KEY (`Don_idDon`) REFERENCES `don` (`idDon`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Projet_has_Don_Projet1` FOREIGN KEY (`Projet_idProjet`) REFERENCES `projet` (`idProjet`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `fk_Utilisateur_Personne1` FOREIGN KEY (`Personne_idPersonne`) REFERENCES `personne` (`idPersonne`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
