-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 02 juil. 2022 à 08:40
-- Version du serveur : 5.7.36
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bigec`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_admin`
--

DROP TABLE IF EXISTS `t_admin`;
CREATE TABLE IF NOT EXISTS `t_admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(60) DEFAULT NULL,
  `prenom` varchar(60) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mdp` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_admin`
--

INSERT INTO `t_admin` (`id_admin`, `nom`, `prenom`, `email`, `mdp`) VALUES
(1, 'Camara', 'Abdoulaye', 'mrroot@admin.com', 'Admin12@@');

-- --------------------------------------------------------

--
-- Structure de la table `t_avis`
--

DROP TABLE IF EXISTS `t_avis`;
CREATE TABLE IF NOT EXISTS `t_avis` (
  `id_avis` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` text,
  `date_a` date NOT NULL,
  `id_client` int(11) DEFAULT NULL,
  `id_salle` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_avis`),
  KEY `id_client` (`id_client`),
  KEY `id_salle` (`id_salle`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_avis`
--

INSERT INTO `t_avis` (`id_avis`, `contenu`, `date_a`, `id_client`, `id_salle`) VALUES
(9, 'la salle est cool', '2022-06-30', 32, 4),
(11, '\r\nLa salle est trop cool, notre entreprise nous avons bien aime sa', '2022-07-01', 32, 3),
(10, 'la salle est juste \r\n                            ', '2022-06-30', 31, 4);

-- --------------------------------------------------------

--
-- Structure de la table `t_client`
--

DROP TABLE IF EXISTS `t_client`;
CREATE TABLE IF NOT EXISTS `t_client` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(60) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `adresse` varchar(60) NOT NULL,
  `numero` int(15) NOT NULL,
  `mdp` varchar(80) NOT NULL,
  `jeton` varchar(255) DEFAULT NULL,
  `validate` int(11) DEFAULT '0',
  PRIMARY KEY (`id_client`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_client`
--

INSERT INTO `t_client` (`id_client`, `prenom`, `nom`, `email`, `adresse`, `numero`, `mdp`, `jeton`, `validate`) VALUES
(35, 'Mister', 'ROOT', 'misterroot@gmail.com', 'Kissosso', 624286873, '$2y$10$yfB4TOCYNENOC.pcx2B50uEj.4Sckt3Bad2wk3BakKsG0hzwlagpa', 'QcpVzDiKaaIcwCYT8GzI8UA3yTKJs7NbPkn4Fvsz', 0),
(33, 'Thierno Ismaila ', 'Diallo', 'ismailatemele@gmail.com', 'Dabompa', 628977239, '$2y$10$CL3cGfXwXiZtFKW968WttexI8KHw1hj4l/gDqoKb.xn05TlQHhCYO', 'VLJK6SUPQ402tQFHQeT5YeWsoVJ9xCSsvFn2IGbN', 0),
(34, 'Ayouba', 'Diakite', 'ayoubadiak24@gmail.com', 'Kissosso', 624328746, '$2y$10$uJ8/UyZHEiR.JlEZFyLeie2tbFClFeJ1XVjNhal7fhgHVlAvoikLG', 'AHLAGWKTlHZ2pdK2DpbZphJLmtSYcCE1b5mqPdWv', 0),
(32, 'Abdoulaye', 'Camara', 'camaraabdoulaye.9870@gmail.com', 'Wanindara', 627979110, '$2y$10$AVxEnkx.VDhSM45aZLUjjeq.eC0/3qdOIGloqP.CUXflNC1CZ2aAC', 'valide', 1),
(31, 'Abdoulaye', 'ROOT', 'abc9870817@gmail.com', 'Wanindara', 624286873, '$2y$10$s566P84H.HOI7N8rR8INOegKG2b0wAuHgR5kbXCC72QjCb00EqzK2', 'valide', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_contact`
--

DROP TABLE IF EXISTS `t_contact`;
CREATE TABLE IF NOT EXISTS `t_contact` (
  `id_contact` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sujet` varchar(40) NOT NULL,
  `contenu` text NOT NULL,
  PRIMARY KEY (`id_contact`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_contact`
--

INSERT INTO `t_contact` (`id_contact`, `nom`, `email`, `sujet`, `contenu`) VALUES
(11, 'Mister ROOT', 'mrroot@gmail.com', 'PAYMENT', 'Comment les Payments s\'effectue'),
(10, 'Camara Abdoulaye', 'camaraabdoulaye.9870@gmail.com', 'Réservation', 'comment peut-on réserver la salle en ligne');

-- --------------------------------------------------------

--
-- Structure de la table `t_mdp_recup`
--

DROP TABLE IF EXISTS `t_mdp_recup`;
CREATE TABLE IF NOT EXISTS `t_mdp_recup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `jeton` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_mdp_recup`
--

INSERT INTO `t_mdp_recup` (`id`, `email`, `jeton`) VALUES
(1, 'camaraabdoulaye.9870@gmail.com', 'fl9BDkYPkiCxFmH8Nm5LzEGdy0Nbx9gpa1qmP0NI'),
(2, 'abc9870817@gmail.com', 'vPZ0msBBKQJn85OL7Fc1uqvIippzwjMuvIoVhfmZ');

-- --------------------------------------------------------

--
-- Structure de la table `t_newsletter`
--

DROP TABLE IF EXISTS `t_newsletter`;
CREATE TABLE IF NOT EXISTS `t_newsletter` (
  `id_new` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `contenu` text NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_new`),
  KEY `id_admin` (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_newsletter`
--

INSERT INTO `t_newsletter` (`id_new`, `titre`, `contenu`, `id_admin`) VALUES
(1, 'PROMO', 'Nous avons l\'honneur de vous présenter nos promo sur 10 salle de réunion a Conakry', 1),
(3, 'Recrutement', 'test recrutement', 1),
(4, 'TEST', 'JE SUIS ADMIN', 1),
(5, 'Test ', 'je suis admin', 1),
(6, 'T', 'd', 1),
(7, 'test', 'test', 1),
(8, 'Avis de recrutement', 'ceci est un tesde newsletter pour le projet de web2 ', 1),
(9, 'TEST SYSTEME ', 'ceci est un test au systeme de newsletter pour le projet bigec ', 1),
(10, 'le monde part en couille', 'fffff', 1),
(11, 'TEST FINAL', 'Ceci est le test final du système de newsletter', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_reservation`
--

DROP TABLE IF EXISTS `t_reservation`;
CREATE TABLE IF NOT EXISTS `t_reservation` (
  `id_reservation` int(11) NOT NULL AUTO_INCREMENT,
  `heure` time NOT NULL,
  `date_r` date NOT NULL,
  `id_client` int(11) DEFAULT NULL,
  `id_salle` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_reservation`),
  KEY `id_client` (`id_client`),
  KEY `id_salle` (`id_salle`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_reservation`
--

INSERT INTO `t_reservation` (`id_reservation`, `heure`, `date_r`, `id_client`, `id_salle`) VALUES
(34, '09:00:00', '2022-07-06', 31, 4),
(33, '05:55:00', '2022-07-02', 32, 4),
(32, '18:00:00', '2022-06-28', 32, 3),
(31, '18:00:00', '2022-06-29', 32, 3),
(30, '09:00:00', '2022-06-29', 30, 4),
(29, '09:00:00', '2022-06-30', 30, 10);

-- --------------------------------------------------------

--
-- Structure de la table `t_response`
--

DROP TABLE IF EXISTS `t_response`;
CREATE TABLE IF NOT EXISTS `t_response` (
  `id_rep` int(11) NOT NULL AUTO_INCREMENT,
  `titre_rep` varchar(255) NOT NULL,
  `contenu_rep` text NOT NULL,
  PRIMARY KEY (`id_rep`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_response`
--

INSERT INTO `t_response` (`id_rep`, `titre_rep`, `contenu_rep`) VALUES
(1, 'Réponse Au sujet de la réservation', 'Au faite pour reserver un salle il va valloir vous inscrire sur le site puis te connecter a ton espace membre puis reserver la salle'),
(2, 'Réponse Au sujet de la réservation', 'Au faite pour réserver un salle il va valoir vous inscrire sur le site puis te connecter a ton espace membre puis réserver la salle');

-- --------------------------------------------------------

--
-- Structure de la table `t_salle`
--

DROP TABLE IF EXISTS `t_salle`;
CREATE TABLE IF NOT EXISTS `t_salle` (
  `id_salle` int(11) NOT NULL AUTO_INCREMENT,
  `ville` varchar(60) NOT NULL,
  `quartier` varchar(60) NOT NULL,
  `prix` int(11) NOT NULL,
  `descrip` text NOT NULL,
  `photo` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id_salle`),
  UNIQUE KEY `photo` (`photo`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_salle`
--

INSERT INTO `t_salle` (`id_salle`, `ville`, `quartier`, `prix`, `descrip`, `photo`) VALUES
(3, 'Conakry', 'Kissosso', 1500000, 'Cette salle de formation située à proximité de la station shells de kissosso peut accueillir jusqu\'à 15 personnes en disposition de U. Elle est Caractéristiques: lumière du jour,           Climatisation, Un espace de pause,                Une personne à l\'accueil. Équipé de                 vidéo projecteur, écran de projection\nbouteille d\'eau, connexion wifi, paper board, prise RJ45 ', 'salle_01.jpg'),
(4, 'Mamou', 'Station', 500000, 'Cette salle est située dans la ville de Mamou peut accueillir jusqu\'à 18 personnes en disposition carré. Elle est Caractéristiques: lumière du jour, Climatisation, Un espace de pause,  Une personne à l\'accueil. Équipé de vidéo projecteur, écran de projection\r\nbouteille d\'eau, connexion wifi, paper board, prise RJ45.', 'salle_03.jpg'),
(5, 'Kankan', 'Heremakono', 1000000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Error velit iste, corrupti enim accusamus voluptatibus deserunt. Illo, dolorem sit! Quaerat, voluptatibus quisquam! Tempore minus quidem rerum in neque necessitatibus nostrum quas id aliquam aspernatur! Quis, dignissimos fuga consequatur natus earum iure porro cum. Expedita reiciendis quaerat dicta voluptate ex nobis.', 'salle_04.jpg'),
(8, 'Conakry', 'Lambanyi', 2500000, 'Cette salle de formation située à Lambanyi peut accueillir jusqu\'à 15 personnes en disposition de U. Elle est Caractéristiques: lumière du jour,           Climatisation, Un espace de pause,                Une personne à l\'accueil. Équipé de                 vidéo projecteur, écran de projection\nbouteille d\'eau, connexion wifi, paper board, prise RJ45 ', 'salle_08.jpg'),
(9, 'Conakry', 'Wanindara', 1200000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Error velit iste, corrupti enim accusamus voluptatibus deserunt. Illo, dolorem sit! Quaerat, voluptatibus quisquam! Tempore minus quidem rerum in neque necessitatibus nostrum quas id aliquam aspernatur! Quis, dignissimos fuga consequatur natus earum iure porro cum. Expedita reiciendis quaerat dicta voluptate ex nobis.', 'salle_16.jpg'),
(10, 'Kankan', 'Gbessia', 800000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Error velit iste, corrupti enim accusamus voluptatibus deserunt. Illo, dolorem sit! Quaerat, voluptatibus quisquam! Tempore minus quidem rerum in neque necessitatibus nostrum quas id aliquam aspernatur! Quis, dignissimos fuga consequatur natus earum iure porro cum. Expedita reiciendis quaerat dicta voluptate ex nobis.', 'salle_09.jpg'),
(11, 'Conakry', 'kaloum', 1700000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Error velit iste, corrupti enim accusamus voluptatibus deserunt. Illo, dolorem sit! Quaerat, voluptatibus quisquam! Tempore minus quidem rerum in neque necessitatibus nostrum quas id aliquam aspernatur! Quis, dignissimos fuga consequatur natus earum iure porro cum. Expedita reiciendis quaerat dicta voluptate ex nobis.', 'salle_17.jpg'),
(12, 'Conakry', 'Bambeto', 1000000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Error velit iste, corrupti enim accusamus voluptatibus deserunt. Illo, dolorem sit! Quaerat, voluptatibus quisquam! Tempore minus quidem rerum in neque necessitatibus nostrum quas id aliquam aspernatur! Quis, dignissimos fuga consequatur natus earum iure porro cum. Expedita reiciendis quaerat dicta voluptate ex nobis.', 'salle_05.jpg'),
(14, 'Conakry', 'Kissosso', 2000000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Error velit iste, corrupti enim accusamus voluptatibus deserunt. Illo, dolorem sit! Quaerat, voluptatibus quisquam! Tempore minus quidem rerum in neque necessitatibus nostrum quas id aliquam aspernatur! Quis, dignissimos fuga consequatur natus earum iure porro cum. Expedita reiciendis quaerat dicta voluptate ex nobis.', 'salle_18.jpg'),
(15, 'Mamou', 'Sabou', 500000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Error velit iste, corrupti enim accusamus voluptatibus deserunt. Illo, dolorem sit! Quaerat, voluptatibus quisquam! Tempore minus quidem rerum in neque necessitatibus nostrum quas id aliquam aspernatur! Quis, dignissimos fuga consequatur natus earum iure porro cum. Expedita reiciendis quaerat dicta voluptate ex nobis.', 'salle_10.jpg'),
(17, 'Mamou', 'Marakala', 600000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Error velit iste, corrupti enim accusamus voluptatibus deserunt. Illo, dolorem sit! Quaerat, voluptatibus quisquam! Tempore minus quidem rerum in neque necessitatibus nostrum quas id aliquam aspernatur! Quis, dignissimos fuga consequatur natus earum iure porro cum. Expedita reiciendis quaerat dicta voluptate ex nobis.', 'salle_11.jpg'),
(20, 'Mamou', 'Lope', 800000, 'description de la salle', 'salle_14.jpg'),
(21, 'Mamou', 'Tembassa', 1000000, 'descrition de la salle', 'salle_15.jpg'),
(22, 'Mamou', 'Fitakonas', 950000, 'description de la salle', 'salle_23.jpg'),
(25, 'Mamou', 'Darsalam', 850000, 'description de la salle', 'salle_27.jpg'),
(30, 'Kankan', 'Missiran', 800000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Error velit iste, corrupti enim accusamus voluptatibus deserunt. Illo, dolorem sit! Quaerat, voluptatibus quisquam! Tempore minus quidem rerum in neque necessitatibus nostrum quas id aliquam aspernatur! Quis, dignissimos fuga consequatur natus earum iure porro cum. Expedita reiciendis quaerat dicta voluptate ex nobis.', 'salle_20.jpg'),
(73, 'Conakry', 'Wanindara T5', 3000000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Error velit iste, corrupti enim accusamus voluptatibus deserunt. Illo, dolorem sit! Quaerat, voluptatibus quisquam! Tempore minus quidem rerum in neque necessitatibus nostrum quas id aliquam aspernatur! Quis, dignissimos fuga consequatur natus earum iure porro cum. Expedita reiciendis quaerat dicta voluptate ex nobis.', 'salle_22.jpg'),
(74, 'Kankan', 'Quatier2.0', 4000000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Error velit iste, corrupti enim accusamus voluptatibus deserunt. Illo, dolorem sit! Quaerat, voluptatibus quisquam! Tempore minus quidem rerum in neque necessitatibus nostrum quas id aliquam aspernatur! Quis, dignissimos fuga consequatur natus earum iure porro cum. Expedita reiciendis quaerat dicta voluptate ex nobis.', 'salle_24.png'),
(72, 'Conakry', 'Hamdalaye', 1200000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Error velit iste, corrupti enim accusamus voluptatibus deserunt. Illo, dolorem sit! Quaerat, voluptatibus quisquam! Tempore minus quidem rerum in neque necessitatibus nostrum quas id aliquam aspernatur! Quis, dignissimos fuga consequatur natus earum iure porro cum. Expedita reiciendis quaerat dicta voluptate ex nobis.', 'salle_21.jpg'),
(75, 'Mamou', 'Quartier3.0', 1300000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Error velit iste, corrupti enim accusamus voluptatibus deserunt. Illo, dolorem sit! Quaerat, voluptatibus quisquam! Tempore minus quidem rerum in neque necessitatibus nostrum quas id aliquam aspernatur! Quis, dignissimos fuga consequatur natus earum iure porro cum. Expedita reiciendis quaerat dicta voluptate ex nobis.', 'salle_28.jpg'),
(76, 'Conakry', 'Enço5', 3000000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Error velit iste, corrupti enim accusamus voluptatibus deserunt. Illo, dolorem sit! Quaerat, voluptatibus quisquam! Tempore minus quidem rerum in neque necessitatibus nostrum quas id aliquam aspernatur! Quis, dignissimos fuga consequatur natus earum iure porro cum. Expedita reiciendis quaerat dicta voluptate ex nobis.', 'salle_29.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
bigecbigec