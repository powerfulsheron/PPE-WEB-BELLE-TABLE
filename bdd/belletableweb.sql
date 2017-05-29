-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1

-- Généré le :  Lun 10 Avril 2017 à 10:31

-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `belletableweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_categorie`
--

CREATE TABLE IF NOT EXISTS `t_categorie` (
  `numcateg` int(11) NOT NULL,
  `libelcateg` varchar(50) NOT NULL,
  PRIMARY KEY (`numcateg`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_categorie`
--

INSERT INTO `t_categorie` (`numcateg`, `libelcateg`) VALUES
(1, 'assiette_tasse'),
(2, 'couvert'),
(3, 'verre'),
(4, 'nappe'),
(5, 'chaise_table'),
(6, 'accessoire');

-- --------------------------------------------------------

--
-- Structure de la table `t_client`
--

CREATE TABLE IF NOT EXISTS `t_client` (
  `numclient` int(4) NOT NULL AUTO_INCREMENT,
  `typeclient` int(11) NOT NULL,
  `nomclient` varchar(25) NOT NULL,
  `prenomclient` varchar(25) NOT NULL,
  `denomsociale` varchar(100) DEFAULT NULL,
  `rueclient` varchar(50) NOT NULL,
  `complementadresse` varchar(100) DEFAULT NULL,
  `cpclient` varchar(5) NOT NULL,
  `villeclient` varchar(25) NOT NULL,
  `emailclient` varchar(80) NOT NULL,
  `telfixeclient` varchar(20) DEFAULT NULL,
  `telportableclient` varchar(20) DEFAULT NULL,
  `mdpclient` varchar(100) NOT NULL,
  `civiliteclient` int(1) NOT NULL,
  `newsletter` varchar(1) NOT NULL,
  `nbcommandes` int(11) DEFAULT NULL,
  `code10` varchar(1) NOT NULL DEFAULT 'N',
  `code20` varchar(1) NOT NULL DEFAULT 'N',
  `code30` varchar(1) NOT NULL DEFAULT 'N',
  `code40` varchar(1) NOT NULL DEFAULT 'N',
  `code50` varchar(1) NOT NULL DEFAULT 'N',
  `code60` varchar(1) NOT NULL DEFAULT 'N',
  `code70` varchar(1) NOT NULL DEFAULT 'N',
  `code80` varchar(1) NOT NULL DEFAULT 'N',
  `code90` varchar(1) NOT NULL DEFAULT 'N',
  PRIMARY KEY (`numclient`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `t_client`
--

INSERT INTO `t_client` (`numclient`, `typeclient`, `nomclient`, `prenomclient`, `denomsociale`, `rueclient`, `complementadresse`, `cpclient`, `villeclient`, `emailclient`, `telfixeclient`, `telportableclient`, `mdpclient`, `civiliteclient`, `newsletter`, `nbcommandes`, `code10`, `code20`, `code30`, `code40`, `code50`, `code60`, `code70`, `code80`, `code90`) VALUES
(19, 1, 'Sailly', 'Axelle', '', '1 bis rue du haras', '', '78530', 'Buc', 'saillyaxelle@hotmail.fr', '', '0665564696', '39cb189c1005e7e7c011a5eb885f4a1c', 1, 'N', 8, 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N');

-- --------------------------------------------------------

--
-- Structure de la table `t_commande`
--

CREATE TABLE IF NOT EXISTS `t_commande` (
  `numcommande` int(11) NOT NULL AUTO_INCREMENT,
  `datecommande` datetime NOT NULL,
  `dateenvoi` date DEFAULT NULL,
  `prixcommande` int(11) NOT NULL,
  `numclient` int(11) NOT NULL,
  `livraison` date DEFAULT NULL,
  `miseplace` varchar(1) NOT NULL DEFAULT 'N',
  `service` varchar(1) NOT NULL DEFAULT 'N',
  `vaisselle` varchar(1) NOT NULL DEFAULT 'N',
  `lessive` varchar(1) NOT NULL DEFAULT 'N',
  PRIMARY KEY (`numcommande`),
  KEY `numclient` (`numclient`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Contenu de la table `t_commande`
--

INSERT INTO `t_commande` (`numcommande`, `datecommande`, `dateenvoi`, `prixcommande`, `numclient`, `livraison`, `miseplace`, `service`, `vaisselle`, `lessive`) VALUES
(64, '2017-03-07 14:11:32', NULL, 40, 19, 'N', 'N', 'N', 'N', 'N'),
(65, '2017-03-07 14:11:48', NULL, 50, 19, 'N', 'N', 'N', 'N', 'O'),
(66, '2017-03-07 14:36:21', NULL, 12, 19, 'N', 'N', 'N', 'N', 'N'),
(67, '2017-03-07 14:54:42', NULL, 60, 19, 'N', 'N', 'N', 'N', 'N'),
(68, '2017-03-07 14:55:15', NULL, 60, 19, 'N', 'N', 'N', 'N', 'N'),
(69, '2017-03-07 14:55:33', NULL, 6, 19, 'N', 'N', 'N', 'N', 'N'),
(70, '2017-03-07 14:58:40', NULL, 14, 19, 'N', 'N', 'N', 'N', 'N'),
(71, '2017-03-21 15:54:38', NULL, 117, 19, 'N', 'N', 'N', 'N', 'N');

-- --------------------------------------------------------

--
-- Structure de la table `t_commander`
--

CREATE TABLE IF NOT EXISTS `t_commander` (
  `numcommande` int(11) NOT NULL,
  `numproduit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  PRIMARY KEY (`numcommande`,`numproduit`),
  KEY `FRK_cmr_prod` (`numproduit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_commander`
--

INSERT INTO `t_commander` (`numcommande`, `numproduit`, `quantite`) VALUES
(64, 22691, 1),
(64, 22692, 1),
(64, 22698, 1),
(65, 4140, 1),
(65, 4143, 1),
(66, 22691, 1),
(67, 25477, 10),
(69, 25477, 1),
(70, 19211, 1),
(71, 25477, 10),
(71, 25482, 10);


-- --------------------------------------------------------

--
-- Structure de la table `t_gamme`
--

CREATE TABLE IF NOT EXISTS `t_gamme` (
  `numgamme` int(11) NOT NULL,
  `nomgamme` varchar(20) NOT NULL,
  `numcateg` int(11) NOT NULL,
  `refimage` varchar(100) NOT NULL,
  `gammeprix` int(11) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `refproduitunique` int(11) DEFAULT NULL,
  PRIMARY KEY (`numgamme`),
  KEY `numcateg` (`numcateg`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_gamme`
--

INSERT INTO `t_gamme` (`numgamme`, `nomgamme`, `numcateg`, `refimage`, `gammeprix`, `description`, `refproduitunique`) VALUES
(1, 'Azul', 1, 'assiettes/azul.png', 2, 'Selon leurs arrangements, Les assiettes Azul offrent une multitude de motifs pour une originalité sans pareil. Découvrez ci-dessous la fraîcheur de la ligne Azul.', NULL),
(2, 'Platinium', 1, 'assiettes/platinium.png', 3, 'La ligne Platinium est délicatement ornée d''un filet platine qui apportera raffinement et élégance à votre réception. Elle est déclinée en 3 modèles de tasses et assiettes.', NULL),
(3, 'Versace', 1, 'assiettes/versace.png', 4, 'Cet ensemble Versace de style baroque embellira votre table et lui donnera un caractère exclusif. Vous pouvez associer à cette ligne d’assiettes les verres Volga qui sont également de style baroque.', NULL),
(4, 'Trianon', 2, 'couverts/trianon.png', 1, 'Optez pour la ligne de couverts Trianon pour une table classique et élégante. Les légers traits de ce couvert argenté lui donnent beaucoup de finesse.', NULL),
(5, 'Nacre', 2, 'couverts/nacre.png', 2, 'La ligne de couverts Nacre sera l''élément marquant de votre table, par son style très british, son aspect Nacre ivoire et sa bague finement façonnée.<br/>Une très belle association de genres pour des tables rétro ou plus contemporaines.', NULL),
(6, 'Windsor', 2, 'couverts/windsor.png', 3, 'La ligne de couverts Windsor allie l''élégance et la délicatesse des plus grandes créations.<br/>Son style baroque et ses arabesques apporteront beaucoup de caractère à votre table.<br/>Matière: plaqué or.', NULL),
(7, 'Soliman', 2, 'couverts/soliman.png', 4, 'Le design de la gamme de couverts Soliman s’inspire de l’histoire du célèbre sultan Ottoman Soliman. Dorés, patinés et finement ciselés, ce service de couverts est une invitation au voyage en terre orientale. 3 modèles de fourchettes, couteaux et cuillères sont disponibles pour s’adapter à tous vos plats et menus.', NULL),
(8, 'Arom Up', 3, 'verres/Arom Up.png', 2, NULL, NULL),
(9, 'Marquis Or', 3, 'verres/MarquiOr.png', 3, 'La forme tulipe de ces verres et le liseré doré apportent tout le chic à cette ligne Marquis. Ces verres se marient à la perfection avec la ligne de couverts Nacre en apportant du charme et une pointe de rêverie à votre table.', NULL),
(10, 'Volga', 3, 'verres/volga.png', 4, 'Retrouvez dans les motifs de cette ligne de verres Volga un style baroque. Ses liserés dorés mettront en beauté votre table. Ces verres se marieront parfaitement avec la ligne d''assiettes Versace.', NULL),
(11, 'Lin', 4, 'nappes/Lin.png', 2, NULL, NULL),
(12, 'Venise', 4, 'nappes/venise.png', 3, NULL, NULL),
(13, 'Andalouse', 4, 'nappes/andalouse.png', 4, NULL, NULL),
(14, 'Montaigne', 5, 'mobilier/montaigne.png', 1, 'Le dossier "médaillon" tout en rondeur et le très grand confort de la chaise Montaigne blanche en font une chaise très appréciée, qui s''adapte à différents types d''ambiances.', 18007),
(15, 'Napoleon III', 5, 'mobilier/napoleonblanv.png', 2, 'Un blanc immaculé de designer mais un style ancien et recherché : cette chaise garde le meilleur de chaque époque.', 457),
(16, 'Napoleon III Toscane', 5, 'mobilier/napoleonbleu.png', 3, NULL, 25000),
(17, 'Fauteil Napoleon III', 5, 'mobilier/napoleon.png', 4, 'Ce fauteuil mêle l''ancien et le moderne pour accueillir vos invités dans une ambiance de luxe et de confort.', 323),
(18, 'Rectangle', 5, 'mobilier/tablerect.png', 0, NULL, NULL),
(19, 'Ovale', 5, 'mobilier/tableovale.jpg', 0, NULL, NULL),
(20, 'Ronde', 5, 'mobilier/tableronde.jpg', 0, NULL, NULL),
(21, 'Dos Santos', 6, 'accessoires/dossantos.png', 4, NULL, 25535),
(22, 'Birdy', 6, 'accessoires/birdy.png', 4, NULL, 25551),
(23, 'Louis XVI', 6, 'accessoires/louis.png', 4, NULL, 25556),
(24, 'Collazi', 6, 'accessoires/collazi.png', 4, NULL, 25543),
(25, 'Rocaille', 6, 'accessoires/rocaille.png', 4, NULL, 25512);

-- --------------------------------------------------------

--
-- Structure de la table `t_produit`
--

CREATE TABLE IF NOT EXISTS `t_produit` (
  `refprod` int(11) NOT NULL,
  `libelproduit` varchar(50) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
  `prixproduit` int(11) NOT NULL,
  `numgamme` int(11) NOT NULL,
  `refimagedetail` varchar(100) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
  PRIMARY KEY (`refprod`),
  KEY `numgamme` (`numgamme`)
) ENGINE=InnoDB DEFAULT CHARSET=macroman;

--
-- Contenu de la table `t_produit`
--

INSERT INTO `t_produit` (`refprod`, `libelproduit`, `prixproduit`, `numgamme`, `refimagedetail`) VALUES
(25, 'Table ronde Ø 100 cm', 30, 20, 'mobilier/tableronde.jpg'),
(46, 'Table ovale 100 x 250 cm', 40, 19, 'mobilier/tableovale.jpg'),
(47, 'Table ronde Ø 200 cm', 50, 20, 'mobilier/tableronde.jpg'),
(319, 'Table rectangulaire 80 x 220 cm', 50, 18, 'mobilier/tablerect.png'),
(323, 'Fauteuil Napoléon III', 12, 17, 'mobilier/napoleon.png'),
(355, 'Table ovale 100 x 200 cm', 30, 19, 'mobilier/tableovale.jpg'),
(390, 'Table ronde Ø 150 cm', 40, 20, 'mobilier/tableronde.jpg'),
(438, 'Table rectangulaire 80 x 150 cm', 30, 18, 'mobilier/tablerect.png'),
(439, 'Table rectangulaire 80 x 200 cm', 40, 18, 'mobilier/tablerect.png'),
(457, 'Chaise Napoléon III', 8, 15, 'mobilier/napoleonblanv.png'),
(4140, 'Serviette de table Venise 50 x 50 cm', 4, 12, 'nappes/venise.png'),
(4143, 'Nappe Venise 240 x 350 cm', 8, 12, 'nappes/venise.png'),
(4145, 'Nappe Venise 280 x 500 cm', 10, 12, 'nappes/venise.png'),
(4261, 'Serviette de table lin blanc 50 x 50 cm', 2, 11, 'nappes/Lin.png'),
(4265, 'Nappe lin blanc 210 x 350 cm', 5, 11, 'nappes/Lin.png'),
(4266, 'Nappe lin blanc 270 x 500 cm', 8, 11, 'nappes/Lin.png'),
(9704, 'Table ovale 100 x 300 cm', 50, 19, 'mobilier/tableovale.jpg'),
(11866, 'Couteau de table Soliman', 8, 7, 'couverts/solimancouteau.png'),
(11867, 'Fourchette de table Soliman', 8, 7, 'couverts/solimanfourchette.png'),
(11870, 'Cuillère de table Soliman', 8, 7, 'couverts/solimancuillere.png'),
(14460, 'Verre à eau Arom Up 43 cl', 2, 8, 'verres/Arom Upeau.png'),
(14718, 'Verre à vin Arom Up 35 cl', 4, 8, 'verres/Arom Upvin.png'),
(15629, 'Flûte à champagne Arom Up 21 cl', 5, 8, 'verres/Arom Upflute.png'),
(18007, 'Chaise Montaigne', 5, 14, 'mobilier/montaigne.png'),
(19211, 'Assiette plate Platinium Ø 28 cm', 12, 2, 'assiettes/platiniumplate.png'),
(19214, 'Assiette creuse Platinium Ø 24 cm', 8, 2, 'assiettes/platiniumcreuse.png'),
(19219, 'Tasse et sous-tasse à café Platinium 10 cl', 6, 2, 'assiettes/platiniumtasse.png'),
(21346, 'Cuillère de table Nacre', 4, 5, 'couverts/nacrecuillere.png'),
(21349, 'Couteau de table Nacre', 4, 5, 'couverts/nacrecouteau.png'),
(21350, 'Fourchette de table Nacre', 4, 5, 'couverts/nacrefourchette.png'),
(21624, 'Verre à vin Marquis Or 18,5 cl', 8, 9, 'verres/MarquiOrvin.png'),
(21625, 'Verre à eau Marquis Or 25 cl', 6, 9, 'verres/MarquiOreau.png'),
(21626, 'Flûte à champagne Marquis Or 19 cl', 8, 9, 'verres/MarquiOrflute.png'),
(22691, 'Assiette creuse Versace Ø 24 cm', 10, 3, 'assiettes/versacecreuse.png'),
(22692, 'Assiette plate Versace Ø 28 cm', 15, 3, 'assiettes/versaceplate.png'),
(22698, 'Tasse et sous-tasse à café Versace 10 cl', 8, 3, 'assiettes/versacetasse.png'),
(22700, 'Flûte à champagne Volga 16 cl', 11, 10, 'verres/volgaflute.png'),
(22701, 'Verre à vin Volga 19 cl', 10, 10, 'verres/volgavin.png'),
(22702, 'Verre à eau Volga 26 cl', 8, 10, 'verres/volgaeau.png'),
(22703, 'Fourchette de table Windsor', 6, 6, 'couverts/windsorfourchette.png'),
(22706, 'Couteau de table Windsor', 6, 6, 'couverts/windsorcouteau.png'),
(22709, 'Cuillère de table Windsor', 6, 6, 'couverts/windsorcuillere.png'),
(24185, 'Couteau de table Trianon', 2, 4, 'couverts/trianoncouteau.png'),
(24189, 'Cuillère de table Trianon', 2, 4, 'couverts/trianoncuillere.png'),
(24192, 'Fourchette de table Trianon', 2, 4, 'couverts/trianonfourchette.png'),
(24253, 'Nappe Andalouse ronde Ø 314 cm', 15, 13, 'nappes/andalouse.png'),
(24254, 'Nappe Andalouse ronde Ø 214 cm', 10, 13, 'nappes/andalouse.png'),
(24255, 'Serviette de table Andalouse 50 x 50 cm', 5, 13, 'nappes/andalouse.png'),
(25000, 'Chaise Napoléon III Toscane', 10, 16, 'mobilier/napoleonbleu.png'),
(25477, 'Assiette creuse Azul Ø 22 cm', 5, 1, 'assiettes/azulcreuse.png'),
(25482, 'Assiette plate Azul Ø 27,5 cm', 8, 1, 'assiettes/azulplate.png'),
(25512, 'Bougeoir Rocaille', 5, 25, 'accessoires/rocaille.png'),
(25535, 'Panier à pain Dos Santos', 5, 21, 'accessoires/dossantos.png'),
(25543, 'Photophore Collazi', 4, 24, 'accessoires/collazi.png'),
(25551, 'Salerons Birdy', 8, 22, 'accessoires/birdy.png'),
(25556, 'Salerons Louis XVI', 10, 23, 'accessoires/louis.png'),
(26168, 'Tasse et sous tasse à café Azul 17 cl', 4, 1, 'assiettes/azultasse.png');

-- --------------------------------------------------------

--
-- Structure de la table `t_reduction`
--

CREATE TABLE IF NOT EXISTS `t_reduction` (
  `id_reduc` int(10) NOT NULL,
  `libelle_reduc` varchar(20) NOT NULL,
  `reduction` int(2) NOT NULL,
  PRIMARY KEY (`id_reduc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_reduction`
--

INSERT INTO `t_reduction` (`id_reduc`, `libelle_reduc`, `reduction`) VALUES
(1, 'REDUC10', 10),
(2, 'REDUC20', 20),
(3, 'REDUC30', 30),
(4, 'REDUC40', 40),
(5, 'REDUC50', 50),
(6, 'REDUC60', 60),
(7, 'REDUC70', 70),
(8, 'REDUC80', 80),
(9, 'REDUC90', 90),
(11, 'FETEDESMERES15', 15),
(12, 'JOURNEEFM30', 30),
(13, 'SOLDEPLUS', 20),
(14, 'FETENATIONALE14', 25);

-- --------------------------------------------------------

--
-- Structure de la table `t_search`
--

CREATE TABLE IF NOT EXISTS `t_search` (
  `idsearch` int(11) NOT NULL AUTO_INCREMENT,
  `urlsearch` longtext COLLATE utf8_roman_ci NOT NULL,
  `keyword` longtext COLLATE utf8_roman_ci NOT NULL,
  PRIMARY KEY (`idsearch`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_roman_ci AUTO_INCREMENT=29 ;

--
-- Contenu de la table `t_search`
--

INSERT INTO `t_search` (`idsearch`, `urlsearch`, `keyword`) VALUES
(1, 'pagediversproduit.php?typeproduit=1', 'assiette,assiettes,tasse,tasses'),
(2, 'pagediversproduit.php?typeproduit=2', 'couvert,couverts,fourchette,fourchettes,couteau,couteaux,cuillere,cuilleres,cuillère,cuillères'),
(3, 'pagediversproduit.php?typeproduit=3', 'verre,verres'),
(4, 'pagediversproduit.php?typeproduit=4', 'nappe,nappes,serviette,serviettes'),
(5, 'pagediversproduit.php?typeproduit=5', 'chaise,chaises,table,tables,fauteuil,fauteuils,mobilier,napoleon'),
(6, 'pagediversproduit.php?typeproduit=6', 'accessoires,accessoire,salière,saliere,bougeoir'),
(7, 'pageproduitchoix.php?produit=1', 'azul'),
(8, 'pageproduitchoix.php?produit=2', 'platinium'),
(9, 'pageproduitchoix.php?produit=3', 'versace'),
(10, 'pageproduitchoix.php?produit=4', 'trianon'),
(11, 'pageproduitchoix.php?produit=5', 'nacre'),
(12, 'pageproduitchoix.php?produit=6', 'windsor'),
(13, 'pageproduitchoix.php?produit=7', 'soliman'),
(14, 'pageproduitchoix.php?produit=8', 'arom up'),
(15, 'pageproduitchoix.php?produit=9', 'marqui or,marquis or'),
(16, 'pageproduitchoix.php?produit=10', 'volga'),
(17, 'pageproduitchoix.php?produit=11', 'lin'),
(18, 'pageproduitchoix.php?produit=12', 'venise'),
(19, 'pageproduitchoix.php?produit=13', 'andalouse'),
(20, 'pageproduitchoix.php?produit=14', 'montaigne'),
(21, 'pageproduitchoix.php?produit=18', 'rectangle'),
(22, 'pageproduitchoix.php?produit=19', 'ovale'),
(23, 'pageproduitchoix.php?produit=20', 'ronde'),
(24, 'pageproduitchoix.php?produit=21', 'dos santos'),
(25, 'pageproduitchoix.php?produit=22', 'birdy'),
(26, 'pageproduitchoix.php?produit=23', 'louis XVI'),
(27, 'pageproduitchoix.php?produit=24', 'collazi'),
(28, 'pageproduitchoix.php?produit=25', 'rocaille');

-- --------------------------------------------------------

--
-- Structure de la table `t_typeclient`
--

CREATE TABLE IF NOT EXISTS `t_typeclient` (
  `numtypeclient` int(2) NOT NULL AUTO_INCREMENT,
  `libeltypeclient` varchar(20) NOT NULL,
  PRIMARY KEY (`numtypeclient`),
  KEY `numtypeclient` (`numtypeclient`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `t_user`
--

CREATE TABLE IF NOT EXISTS `t_user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `loginuser` varchar(50) NOT NULL,
  `mdpuser` varchar(100) NOT NULL,
  `nomuser` varchar(25) NOT NULL,
  `prenomuser` varchar(25) NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `t_user`
--

INSERT INTO `t_user` (`iduser`, `loginuser`, `mdpuser`, `nomuser`, `prenomuser`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `t_commande`
--
ALTER TABLE `t_commande`
  ADD CONSTRAINT `FRK_com_cli` FOREIGN KEY (`numclient`) REFERENCES `t_client` (`numclient`);

--
-- Contraintes pour la table `t_commander`
--
ALTER TABLE `t_commander`
  ADD CONSTRAINT `FRK_cmr_cmd` FOREIGN KEY (`numcommande`) REFERENCES `t_commande` (`numcommande`),
  ADD CONSTRAINT `FRK_cmr_prod` FOREIGN KEY (`numproduit`) REFERENCES `t_produit` (`refprod`);

--
-- Contraintes pour la table `t_gamme`
--
ALTER TABLE `t_gamme`
  ADD CONSTRAINT `FRK_gam_catg` FOREIGN KEY (`numcateg`) REFERENCES `t_categorie` (`numcateg`);

--
-- Contraintes pour la table `t_produit`
--
ALTER TABLE `t_produit`
  ADD CONSTRAINT `FRK_prod_gam` FOREIGN KEY (`numgamme`) REFERENCES `t_gamme` (`numgamme`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
