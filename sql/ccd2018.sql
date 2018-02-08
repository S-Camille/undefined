-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 08 fév. 2018 à 10:34
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ccd2018`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`, `description`) VALUES
(1, 'Vehicule', 'Tous les véhicules à emprunter !!!'),
(2, 'Atelier', 'Des ateliers réservables pour moult réparations.');

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `id_categ` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_categ` (`id_categ`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `item`
--

INSERT INTO `item` (`id`, `nom`, `description`, `id_categ`) VALUES
(1, 'Atelier en bois', 'Cet atelier en bois est l\'idéal pour réparer votre voiture tout en respirant la belle essence de Cyprès.', 2),
(2, 'Atelier BX023 en brique', 'Rustique, simple et fonctionnel, ce box vous permet de réparer votre véhicule sans vous perturber par son décorum. Un must pour les travaux difficiles !', 2),
(3, 'Batcave', 'L\'atelier qu\'il vous faut pour réparer secrètement votre batmobile (fourni sans Albert ni Bruce Wayne). ', 2),
(4, 'Atelier BX045', 'Sans lumière mais disposant d\'ouvertures au plafond, ce box est à réserver aux opérations les plus simples. Une lampe torche est fournie à l\'entrée pour que vous puissiez retrouver les pièces perdues.', 2),
(5, 'Atelier du futur', 'Avec cet atelier, vous serez déjà en l\'an 3000 !! Grand, bien agencé, ce box accueillera toutes vos voitures cylindriques dernier modèle.', 2),
(6, 'Atelier Miroir', 'Le fond de l\'atelier est tellement reflechissant qu\'on peut se voir dedans. Mr Propre y vient régulièrement. ', 2),
(7, 'Atelier du soleil', 'L\'atelier avec la plus belle vue pour pouvoir prendre de splendides photos et immortaliser ses réparations.', 2),
(8, 'Bentley', 'Bentley continentale, couleur gris métalisé, essence, deux portes. Ben t\'létait pas au courant ?', 1),
(9, 'Rolls Royce', 'Rolls Royce oldtimer, 12 places, voiture de 1978, restaurée. Sortez en famille en rolls Royce pour les plus grandes occasions.', 1),
(10, 'Opel', 'Envie de vous déplacer en toute discrétion dans les années 80, cette Opel est faite pour vous.', 1),
(11, 'Atelier securité', 'Pour effectuer vos réparations sans jamais être importuné, cet atelier propose de multiples volets métalliques insonorisés (ne limitent le propagation du son que fermés).', 2),
(12, 'Atelier multiple', 'Cet atelier permet d\'effectuer plusieurs réparations en simultanée. Un must pour les grands bricoleurs.', 2),
(13, 'Porshe 911', 'Porshe 911, noire, deux portes. Elegante et distinguée, la Rolls des voitures (juste aprés Rolls). Elle est tellement BELLE que l\'on écrit en majusCULES.', 1),
(14, 'Fiat 500', 'Fiat 500, Rouge avec son trait central blanc, diesel, deux portes. Petite mais costaude.', 1),
(15, 'Rolls Royce Cabriolet', 'Rolls Royce Cabriolet, jaune canari, 2 portes. Tentez votre chance, remportez tous les prix des courses d\'il y a 50 ans avec cette voiture.', 1),
(16, 'BMW 600', 'BMW 600, année 1957-1959, couleur bleu, une porte. Une seule porte mais tellement de place ! Ce serait dommage de ne pas la tester.', 1),
(17, 'R4 Renault', 'Renault R4, couleur rouge, 4 portes. Une voiture et un modèle qui n\'a pas vieilli.', 1),
(18, 'Batmobile (réplique)', 'Batmobile (réplique), couleur noire à bordereau rouge. Idéale pour aller chasser le Joker ou faire un coucou au Pinguoin (Robin non inclus). ', 1),
(19, 'Ferrari rouge', 'La Ferrari, la classique, la connue, la reputée, la pizza regina des voitures. What else ?', 1),
(20, 'Bus VW', 'Bus volkswagen, couleur vert-olive-pas-tout-a-fait-mure en bas, blanc en haut. Partir en famille sans se préoccuper de l\'espace disponible, c\'est possible !!', 1),
(21, 'Charette', 'Charette à bras, couleur bois, pratique et efficace, à locomotion forcée. A noter que les bras ne sont pas fournis avec le véhicule.', 1),
(22, 'Batmobile (la vraie)', 'N\'exigez qu\'une batmobile, la seule et l\'unique !!! Batmobile véritable construite dans les batiments de Wayne industrie. (ps: par contre, c\'est vrai que les répliques sont bien faites)', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) CHARACTER SET utf8 NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `username`, `password`) VALUES
(1, 'Cassandre', '', ''),
(2, 'Achille', '', ''),
(3, 'Calypso', '', ''),
(4, 'Bacchus', '', ''),
(5, 'Diane', '', ''),
(6, 'Clark', '', ''),
(7, 'Helene', '', ''),
(8, 'Jason', '', ''),
(9, 'Bruce', '', ''),
(10, 'Pénélope', '', ''),
(11, 'Ariane', '', ''),
(12, 'Lois', '', '');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`id_categ`) REFERENCES `categorie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
