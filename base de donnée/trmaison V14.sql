-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 29 mai 2022 à 19:30
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `trmaison`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `ID_categorie` int(11) NOT NULL,
  `empoule_connecte` int(5) DEFAULT NULL,
  `frigo_connecte` int(5) DEFAULT NULL,
  `telephone` int(5) DEFAULT NULL,
  `alarme` int(5) DEFAULT NULL,
  `detection_incendie` int(5) DEFAULT NULL,
  `portails_et_clotures_motorisee` int(5) DEFAULT NULL,
  `porte_de_garage_motorisee` int(5) DEFAULT NULL,
  `chauffage` int(5) DEFAULT NULL,
  `climatisation` int(5) DEFAULT NULL,
  `piscine` int(5) DEFAULT NULL,
  `jacuzzi` int(5) DEFAULT NULL,
  `panneaux_photovoltaiques` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`ID_categorie`, `empoule_connecte`, `frigo_connecte`, `telephone`, `alarme`, `detection_incendie`, `portails_et_clotures_motorisee`, `porte_de_garage_motorisee`, `chauffage`, `climatisation`, `piscine`, `jacuzzi`, `panneaux_photovoltaiques`) VALUES
(1, 1, 0, 1, 3, 0, 0, 0, 4, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 1, 1, 1, 1, 1, 0, 0, 1, 1, 0, 0, 1),
(4, 1, 0, 0, 3, 1, 1, 1, 5, 0, 0, 0, 1),
(5, 1, 1, 0, 2, 0, 0, 0, 4, 1, 0, 0, 0),
(8, 1, 1, 1, 3, 1, 1, 1, 5, 1, 3, 1, 1),
(11, 1, 1, 0, 2, 1, 0, 0, 4, 1, 0, 0, 0),
(12, 0, 0, 0, 3, 1, 0, 0, 5, 1, 0, 0, 1),
(13, 1, 0, 1, 2, 1, 0, 0, 3, 1, 0, 0, 1),
(14, 0, 0, 0, 3, 0, 1, 1, 2, 0, 2, 1, 1),
(15, 1, 1, 1, 3, 1, 1, 1, 5, 1, 3, 1, 1),
(16, 1, 1, 1, 3, 1, 1, 1, 5, 1, 3, 1, 1),
(17, 1, 0, 0, 1, 1, 0, 1, 2, 0, 1, 1, 1),
(18, 1, 1, 0, 1, 1, 1, 0, 0, 0, 0, 1, 0),
(19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `localite`
--

CREATE TABLE `localite` (
  `ID_localite` int(11) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `code_postal` int(10) NOT NULL,
  `numeraux` int(11) NOT NULL,
  `rue` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `localite`
--

INSERT INTO `localite` (`ID_localite`, `ville`, `code_postal`, `numeraux`, `rue`) VALUES
(1, 'Ath', 4875, 786, 'Rue des point'),
(2, 'Mons', 4875, 12, 'Rue des arbre'),
(3, 'Charleroi', 7812, 733, 'Rue de l arbre'),
(4, 'Nivelles', 7506, 758, 'Chemin des fantôme'),
(5, 'Rochefort', 3050, 235, 'Rue du jeux'),
(8, 'Rochefort12', 305012, 23512, 'Rue du jeux12'),
(11, 'Nivelles', 1210, 821, 'Chemin de l infinie'),
(12, 'Namur', 7506, 485, 'Chemin des cartes'),
(13, 'Dinant', 8310, 915, 'Chemin des coeur'),
(14, 'Rochefort', 7034, 297, 'Chemin du jeux'),
(15, 'Rochefort', 7862, 104, 'Chemin de la gare'),
(16, 'Rochefort', 1210, 692, 'Chemin des accident'),
(17, 'Rochefort', 6032, 749, 'Rue du jeux'),
(18, 'Lessines', 1404, 695, 'Chemin des mort'),
(19, 'Dinant', 5580, 343, 'Rue de l infinie');

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

CREATE TABLE `logement` (
  `ID_logement` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `categorie` int(11) NOT NULL,
  `localite` int(11) NOT NULL,
  `price` int(10) NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `utilisateurs` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `logement`
--

INSERT INTO `logement` (`ID_logement`, `type`, `categorie`, `localite`, `price`, `image`, `description`, `utilisateurs`) VALUES
(1, 2, 1, 1, 458535, 'appartement 1.jpg', 'C\'est un Appartement à 458535 $. Il se situe au Rue des point , 4875 Ath le logement a des ampoule connectées. Il utilise la domotique. il a une alarme élevée. Le logement ne possède pas une détection incendie. Le logement n\'utilise pas de porte de garage motorisée. Le logement est équipé d\'une Chaudière mazout. Il n\'y a pas de climatisation. Il n\'y a pas de piscine. Il ne dispose pas de panneaux photovoltaïques.', 3),
(2, 2, 2, 2, 880000, 'appartement 2.jpg', 'Ses un Appartement a 880000 $. Il se situe au Rue des arbre , 4875 Mons Le logement n\'a pas d\'empoule connecté. il n\'a pas d\'alarme. Le logement ne posséde pas une détection incendie. Le logement n\'utilise pas de porte de garage motorisée. Il n\'a pas de climatisation. Il n\'a pas de piscine. Il ne dispose pas de panneaux photovoltaïques.', NULL),
(3, 2, 3, 3, 435000, 'appartement 3.jpg', 'Ses un Appartement a 435000 $. Il se situe au Rue de l arbre , 7812 Charleroi le logement a des empoule connecté. il posséde un frigo connecté. Il utilise la domotique. il a une Faible alarme. Le logement posséde une détection incendie. Le logement n\'utilise pas de porte de garage motorisée. Le logement est équipée Radiateurs. Le logement posséde une climatisation. Il n\'a pas de piscine. Il dispose de panneaux photovoltaïques.', 2),
(4, 2, 4, 4, 250000, 'appartement 4.jpg', 'Ses un Appartement a 250000 $. Il se situe au Chemin des fantôme , 7506 Nivelles le logement a des empoule connecté. il a une Élevée alarme. Le logement posséde une détection incendie. Il as un portails et clôtures motorisée. Le logement utilise une porte de garage motorisée. Le logement est équipée Pompes à chaleur. Il n\'a pas de climatisation. Il n\'a pas de piscine. Il dispose de panneaux photovoltaïques.', NULL),
(5, 2, 5, 5, 355000, 'appartement 5.jpg', 'Ses un Appartement a 355000 $. Il se situe au Rue du jeux , 3050 Rochefort le logement a des empoule connecté. il posséde un frigo connecté. il a une Moyenne alarme. Le logement ne posséde pas une détection incendie. Le logement n\'utilise pas de porte de garage motorisée. Le logement est équipée Chaudières mazout. Le logement posséde une climatisation. Il n\'a pas de piscine. Il ne dispose pas de panneaux photovoltaïques.', NULL),
(8, 2, 8, 8, 355000, 'appartement 6.jpg', 'Ses un Appartement a 355000 $. Il se situe au Rue du jeux12 , 305012 Rochefort12 le logement a des empoule connecté. il posséde un frigo connecté. Il utilise la domotique. il a une Élevée alarme. Le logement posséde une détection incendie. Il as un portails et clôtures motorisée. Le logement utilise une porte de garage motorisée. Le logement est équipée Pompes à chaleur. Le logement posséde une climatisation. Il a une grande piscine.Il posséde un jacuzzi Il dispose de panneaux photovoltaïques.', NULL),
(11, 2, 11, 11, 230000, 'appartement 7.jpg', 'Ses un Appartement a 230000 $. Il se situe au Chemin de l infinie , 1210 Nivelles le logement a des empoule connecté. il posséde un frigo connecté. il a une Moyenne alarme. Le logement posséde une détection incendie. Le logement n\'utilise pas de porte de garage motorisée. Le logement est équipée Chaudières mazout. Le logement posséde une climatisation. Il n\'a pas de piscine. Il ne dispose pas de panneaux photovoltaïques.', NULL),
(12, 2, 12, 12, 752000, 'appartement 8.jpg', 'Ses un Appartement a 752000 $. Il se situe au Chemin des cartes , 7506 Namur Le logement n\'a pas d\'empoule connecté. il a une Élevée alarme. Le logement posséde une détection incendie. Le logement n\'utilise pas de porte de garage motorisée. Le logement est équipée Pompes à chaleur. Le logement posséde une climatisation. Il n\'a pas de piscine. Il dispose de panneaux photovoltaïques.', NULL),
(13, 2, 13, 13, 455000, 'appartement 9.jpg', 'Ses un Appartement a 455000 $. Il se situe au Chemin des coeur , 8310 Dinant le logement a des empoule connecté. Il utilise la domotique. il a une Moyenne alarme. Le logement posséde une détection incendie. Le logement n\'utilise pas de porte de garage motorisée. Le logement est équipée Chaudières gaz. Le logement posséde une climatisation. Il n\'a pas de piscine. Il dispose de panneaux photovoltaïques.', NULL),
(14, 1, 14, 14, 750000, 'maison 1.jpg', 'Ses un Maison a 750000 $. Il se situe au Chemin du jeux , 7034 Rochefort Le logement n\'a pas d\'empoule connecté. il a une Élevée alarme. Le logement ne posséde pas une détection incendie. Il as un portails et clôtures motorisée. Le logement utilise une porte de garage motorisée. Le logement est équipée Chauffage par le sol. Il n\'a pas de climatisation. Il a une moyenne piscine.Il posséde un jacuzzi Il dispose de panneaux photovoltaïques.', NULL),
(15, 1, 15, 15, 1000000, 'maison 2.jpg', 'Ses un Maison a 1000000 $. Il se situe au Chemin de la gare , 7862 Rochefort le logement a des empoule connecté. il posséde un frigo connecté. Il utilise la domotique. il a une Élevée alarme. Le logement posséde une détection incendie. Il as un portails et clôtures motorisée. Le logement utilise une porte de garage motorisée. Le logement est équipée Pompes à chaleur. Le logement posséde une climatisation. Il a une grande piscine.Il posséde un jacuzzi Il dispose de panneaux photovoltaïques.', NULL),
(16, 1, 16, 16, 1000000, 'maison 3.jpg', 'Ses un Maison a 1000000 $. Il se situe au Chemin des accident , 1210 Rochefort le logement a des empoule connecté. il posséde un frigo connecté. Il utilise la domotique. il a une Élevée alarme. Le logement posséde une détection incendie. Il as un portails et clôtures motorisée. Le logement utilise une porte de garage motorisée. Le logement est équipée Pompes à chaleur. Le logement posséde une climatisation. Il a une grande piscine.Il posséde un jacuzzi Il dispose de panneaux photovoltaïques.', NULL),
(17, 1, 17, 17, 250000, 'maison 4.jpg', 'Ses un Maison a 250000 $. Il se situe au Rue du jeux , 6032 Rochefort le logement a des empoule connecté. il a une Faible alarme. Le logement posséde une détection incendie. Le logement utilise une porte de garage motorisée. Le logement est équipée Chauffage par le sol. Il n\'a pas de climatisation.Il a une petite piscine.Il posséde un jacuzzi Il dispose de panneaux photovoltaïques.', NULL),
(18, 1, 18, 18, 320000, 'maison 5.jpg', ' Ses un Maison a 320000 $. Il se situe au Chemin des mort , 1404 Lessines le logement a des empoule connecté. il posséde un frigo connecté. il a une Faible alarme. Le logement posséde une détection incendie. Il as un portails et clôtures motorisée. Le logement n\'utilise pas de porte de garage motorisée. Il n\'a pas de climatisation. Il n\'a pas de piscine.Il posséde un jacuzzi Il ne dispose pas de panneaux photovoltaïques.', NULL),
(19, 1, 19, 19, 500600, 'maison 7.jpg', 'Ses un Maison a 500600 $. Il se situe au Rue de l infinie , 5580 Dinant Le logement n\'a pas d\'empoule connecté. il n\'a pas d\'alarme. Le logement ne posséde pas une détection incendie. Le logement n\'utilise pas de porte de garage motorisée. Il n\'a pas de climatisation. Il n\'a pas de piscine. Il ne dispose pas de panneaux photovoltaïques.', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `ID_type` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`ID_type`, `name`) VALUES
(1, 'Maison'),
(2, 'Appartement');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `ID_utilisateur` int(11) NOT NULL,
  `email` text NOT NULL,
  `mot_de_passe` text NOT NULL,
  `date_inscription` datetime NOT NULL DEFAULT current_timestamp(),
  `prenom` text NOT NULL,
  `nom` text NOT NULL,
  `photo` text NOT NULL,
  `rank` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`ID_utilisateur`, `email`, `mot_de_passe`, `date_inscription`, `prenom`, `nom`, `photo`, `rank`) VALUES
(1, 'florian241006@gmail.com', 'admin', '2022-03-12 18:15:42', 'Florian', 'berte', 'normale_pp.png', 1),
(2, 'eva453212@gmail.com', 'agim', '2022-03-12 17:41:45', 'Eva', 'griht', 'pp1.png', 2),
(3, 'simon@gmail.com', '12345', '2022-04-04 21:49:54', 'Simon', 'siron', 'normale_pp.png', 3),
(4, 'axel@gmail.com', '12345', '2022-04-04 21:49:54', 'Axel', 'gilteme', 'normale_pp.png', 3),
(5, 'olivia@gmail.com', '12345', '2022-04-04 21:49:54', 'Olivia', 'oturg', 'normale_pp.png', 3),
(6, 'elsa@gmail.com', '12345', '2022-04-04 21:49:54', 'Elsa', 'grijht', 'normale_pp.png', 3),
(7, 'erika@gmail.com', '12345', '2022-04-04 21:49:54', 'Erika', 'capron', 'normale_pp.png', 3),
(8, 'emma@gmail.com', '12345', '2022-04-04 21:49:54', 'Emma', 'cornent', 'normale_pp.png', 3),
(9, 'camille@gmail.com', '12345', '2022-04-04 21:48:47', 'Camille', 'glimont', 'normale_pp.png', 3),
(10, 'louis@gmail.com', '12345', '2022-04-04 21:48:47', 'Louis', 'dupont', 'normale_pp.png', 3),
(11, 'tom@gmail.com', '12345', '2022-04-04 20:13:20', 'Tom', 'siron', 'normale_pp.png', 3),
(12, 'léa@gmail.com', '12345', '2022-04-04 21:23:47', 'Léa', 'lemar', 'normale_pp.png', 3),
(13, 'robin@gmail.com', 'agim', '2022-04-08 15:56:33', 'Robin', 'berte', 'normale_pp.png', 2),
(14, 'matheo@gmail.com', '12345', '2022-04-08 16:02:49', 'Matheo', 'lemar', 'normale_pp.png', 3),
(15, 'lana@gmail.com', '123456', '2022-04-08 16:03:39', 'Lana', 'triphon', 'pp1.png', 3),
(16, 'lilou@gmail.com', '12345', '2022-04-27 15:15:31', 'lilou', 'wounder', 'normale_pp.png', 3),
(17, 'florian24111006@gmail.com', '1', '2022-05-21 13:20:37', '1', '1', 'Boti v3 font blanc v2.jpg', 3),
(19, 'florian2441006@gmail.com', 'a4dmin', '2022-05-21 13:23:25', '4', '4', 'Boti v3 font blanc v2.jpg', 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`ID_categorie`);

--
-- Index pour la table `localite`
--
ALTER TABLE `localite`
  ADD PRIMARY KEY (`ID_localite`);

--
-- Index pour la table `logement`
--
ALTER TABLE `logement`
  ADD PRIMARY KEY (`ID_logement`),
  ADD KEY `Type` (`type`),
  ADD KEY `Catégorie` (`categorie`),
  ADD KEY `Lieu` (`localite`),
  ADD KEY `utilisateurs` (`utilisateurs`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`ID_type`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`ID_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `ID_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `localite`
--
ALTER TABLE `localite`
  MODIFY `ID_localite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `logement`
--
ALTER TABLE `logement`
  MODIFY `ID_logement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `ID_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `ID_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `logement`
--
ALTER TABLE `logement`
  ADD CONSTRAINT `logement_ibfk_1` FOREIGN KEY (`type`) REFERENCES `type` (`ID_type`),
  ADD CONSTRAINT `logement_ibfk_2` FOREIGN KEY (`categorie`) REFERENCES `categorie` (`ID_categorie`),
  ADD CONSTRAINT `logement_ibfk_3` FOREIGN KEY (`localite`) REFERENCES `localite` (`ID_localite`),
  ADD CONSTRAINT `logement_ibfk_4` FOREIGN KEY (`categorie`) REFERENCES `categorie` (`ID_categorie`),
  ADD CONSTRAINT `logement_ibfk_5` FOREIGN KEY (`type`) REFERENCES `type` (`ID_type`),
  ADD CONSTRAINT `logement_ibfk_6` FOREIGN KEY (`utilisateurs`) REFERENCES `utilisateurs` (`ID_utilisateur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
