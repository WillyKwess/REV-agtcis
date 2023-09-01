-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 17 août 2023 à 21:40
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_revagtcis`
--

-- --------------------------------------------------------

--
-- Structure de la table `annees`
--

CREATE TABLE `annees` (
  `idannee` int(2) NOT NULL,
  `libelle` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `auth_secure`
--

CREATE TABLE `auth_secure` (
  `idtoken_secure` int(11) NOT NULL,
  `auth` varchar(300) NOT NULL,
  `auth_key` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `auth_secure`
--

INSERT INTO `auth_secure` (`idtoken_secure`, `auth`, `auth_key`) VALUES
(1, '21232f297a57a5a743894a0e4a801fc3', '05oEEzElE3SYeRD4sCRkrB7IGCfXmmBMsglAiC3RdZjUpD1wMoKpBDHk5sBB2DJljhRyjy');

-- --------------------------------------------------------

--
-- Structure de la table `corrections`
--

CREATE TABLE `corrections` (
  `idCorrection` int(11) NOT NULL,
  `marticule` varchar(9) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenoms` varchar(100) NOT NULL,
  `dateNaissance` date NOT NULL,
  `niveau` int(1) NOT NULL,
  `sexe` int(1) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `nationalite` varchar(50) NOT NULL,
  `dateDeDemande` date NOT NULL DEFAULT current_timestamp(),
  `etatDesps` int(1) NOT NULL,
  `idEts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `desps`
--

CREATE TABLE `desps` (
  `idDesps` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `dren`
--

CREATE TABLE `dren` (
  `idDren` int(11) NOT NULL,
  `codeDren` varchar(8) NOT NULL,
  `libelleDren` varchar(100) NOT NULL,
  `emailDren` varchar(30) NOT NULL,
  `passwordDren` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `duplicata`
--

CREATE TABLE `duplicata` (
  `idDuplicata` int(11) NOT NULL,
  `matricule` varchar(9) NOT NULL,
  `statutDuplicata` int(1) NOT NULL,
  `etatDesps` int(1) NOT NULL,
  `idEts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `eleves`
--

CREATE TABLE `eleves` (
  `idEleve` int(11) NOT NULL,
  `matriuleEleve` varchar(11) NOT NULL,
  `nomEleve` varchar(25) NOT NULL,
  `prenomEleve` varchar(60) NOT NULL,
  `ageEleve` int(2) NOT NULL,
  `sexe` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etablissements`
--

CREATE TABLE `etablissements` (
  `idEts` int(11) NOT NULL,
  `codeEts` varchar(8) NOT NULL,
  `libelleEts` varchar(100) NOT NULL,
  `emailEts` varchar(30) NOT NULL,
  `passwordEts` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ghsa`
--

CREATE TABLE `ghsa` (
  `idGhsa` int(11) NOT NULL,
  `nomGhsa` varchar(25) NOT NULL,
  `prenomsGhsa` varchar(50) NOT NULL,
  `emailGhsa` varchar(30) NOT NULL,
  `passwordGhsa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `niveaux`
--

CREATE TABLE `niveaux` (
  `idNiveau` int(1) NOT NULL,
  `libelleNiveau` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `productions`
--

CREATE TABLE `productions` (
  `idProduction` int(11) NOT NULL,
  `numBl` varchar(11) NOT NULL,
  `dateProduction` date NOT NULL DEFAULT current_timestamp(),
  `etatGHSA` int(1) NOT NULL,
  `etatDSPS` int(1) NOT NULL,
  `etatDREN` int(1) NOT NULL,
  `etatETS` int(1) NOT NULL,
  `etatELEVE` int(1) NOT NULL,
  `idEleve` int(11) NOT NULL,
  `idAnnee` int(11) NOT NULL,
  `idNiveau` int(11) NOT NULL,
  `idEts` int(11) NOT NULL,
  `idDren` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `recente_actions`
--

CREATE TABLE `recente_actions` (
  `idrecenteactions` int(11) NOT NULL,
  `usersactions` varchar(20) NOT NULL,
  `dateactions` datetime DEFAULT NULL,
  `libactions` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user_bd`
--

CREATE TABLE `user_bd` (
  `iduser_bd` int(11) NOT NULL,
  `loginuser_bd` varchar(20) NOT NULL,
  `mdpuser_bd` varchar(100) NOT NULL,
  `nomprenoms_user` varchar(150) DEFAULT NULL,
  `contact_user` varchar(10) DEFAULT NULL,
  `email_user` varchar(50) DEFAULT NULL,
  `type_user_bd` int(1) NOT NULL DEFAULT 1,
  `etat_userbd` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user_bd`
--

INSERT INTO `user_bd` (`iduser_bd`, `loginuser_bd`, `mdpuser_bd`, `nomprenoms_user`, `contact_user`, `email_user`, `type_user_bd`, `etat_userbd`) VALUES
(1, 'admin', '$2y$10$SRlpmRg0aICn7K6sjEjdFuy8yg7TsNNfw.W.plD7d36M969oD5uqm', NULL, NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user_rights`
--

CREATE TABLE `user_rights` (
  `iduser_rights` int(11) NOT NULL,
  `modules` varchar(200) NOT NULL,
  `idpages` varchar(200) NOT NULL,
  `idtype_user_rights` int(11) NOT NULL,
  `menus` varchar(200) NOT NULL,
  `autorisations` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annees`
--
ALTER TABLE `annees`
  ADD PRIMARY KEY (`idannee`);

--
-- Index pour la table `auth_secure`
--
ALTER TABLE `auth_secure`
  ADD PRIMARY KEY (`idtoken_secure`),
  ADD KEY `auth` (`auth`);

--
-- Index pour la table `corrections`
--
ALTER TABLE `corrections`
  ADD PRIMARY KEY (`idCorrection`),
  ADD KEY `marticule` (`marticule`),
  ADD KEY `nom` (`nom`),
  ADD KEY `idEts` (`idEts`);

--
-- Index pour la table `desps`
--
ALTER TABLE `desps`
  ADD PRIMARY KEY (`idDesps`),
  ADD KEY `idDesps` (`idDesps`,`nom`),
  ADD KEY `email` (`email`);

--
-- Index pour la table `dren`
--
ALTER TABLE `dren`
  ADD PRIMARY KEY (`idDren`);

--
-- Index pour la table `duplicata`
--
ALTER TABLE `duplicata`
  ADD PRIMARY KEY (`idDuplicata`),
  ADD KEY `matricule` (`matricule`),
  ADD KEY `statut` (`statutDuplicata`),
  ADD KEY `idEts` (`idEts`);

--
-- Index pour la table `eleves`
--
ALTER TABLE `eleves`
  ADD PRIMARY KEY (`idEleve`);

--
-- Index pour la table `etablissements`
--
ALTER TABLE `etablissements`
  ADD PRIMARY KEY (`idEts`),
  ADD KEY `libelleEts` (`libelleEts`);

--
-- Index pour la table `ghsa`
--
ALTER TABLE `ghsa`
  ADD PRIMARY KEY (`idGhsa`),
  ADD KEY `idGhsa` (`nomGhsa`),
  ADD KEY `emailGhsa` (`emailGhsa`);

--
-- Index pour la table `niveaux`
--
ALTER TABLE `niveaux`
  ADD PRIMARY KEY (`idNiveau`);

--
-- Index pour la table `productions`
--
ALTER TABLE `productions`
  ADD PRIMARY KEY (`idProduction`),
  ADD KEY `numBl` (`numBl`),
  ADD KEY `idAnnee` (`idAnnee`),
  ADD KEY `idEleve` (`idEleve`),
  ADD KEY `idNiveau` (`idNiveau`),
  ADD KEY `idEts` (`idEts`),
  ADD KEY `idDren` (`idDren`);

--
-- Index pour la table `recente_actions`
--
ALTER TABLE `recente_actions`
  ADD PRIMARY KEY (`idrecenteactions`),
  ADD KEY `usersactions` (`usersactions`);

--
-- Index pour la table `user_bd`
--
ALTER TABLE `user_bd`
  ADD PRIMARY KEY (`iduser_bd`),
  ADD KEY `loginuser_bd` (`loginuser_bd`);

--
-- Index pour la table `user_rights`
--
ALTER TABLE `user_rights`
  ADD PRIMARY KEY (`iduser_rights`),
  ADD KEY `idtype_user_rights` (`idtype_user_rights`),
  ADD KEY `menus` (`menus`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annees`
--
ALTER TABLE `annees`
  MODIFY `idannee` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `auth_secure`
--
ALTER TABLE `auth_secure`
  MODIFY `idtoken_secure` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `corrections`
--
ALTER TABLE `corrections`
  MODIFY `idCorrection` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `desps`
--
ALTER TABLE `desps`
  MODIFY `idDesps` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `dren`
--
ALTER TABLE `dren`
  MODIFY `idDren` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `duplicata`
--
ALTER TABLE `duplicata`
  MODIFY `idDuplicata` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `eleves`
--
ALTER TABLE `eleves`
  MODIFY `idEleve` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `etablissements`
--
ALTER TABLE `etablissements`
  MODIFY `idEts` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ghsa`
--
ALTER TABLE `ghsa`
  MODIFY `idGhsa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `niveaux`
--
ALTER TABLE `niveaux`
  MODIFY `idNiveau` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `productions`
--
ALTER TABLE `productions`
  MODIFY `idProduction` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `recente_actions`
--
ALTER TABLE `recente_actions`
  MODIFY `idrecenteactions` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user_bd`
--
ALTER TABLE `user_bd`
  MODIFY `iduser_bd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `user_rights`
--
ALTER TABLE `user_rights`
  MODIFY `iduser_rights` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `corrections`
--
ALTER TABLE `corrections`
  ADD CONSTRAINT `corrections_ibfk_1` FOREIGN KEY (`idEts`) REFERENCES `etablissements` (`idEts`);

--
-- Contraintes pour la table `duplicata`
--
ALTER TABLE `duplicata`
  ADD CONSTRAINT `duplicata_ibfk_1` FOREIGN KEY (`idEts`) REFERENCES `etablissements` (`idEts`);

--
-- Contraintes pour la table `productions`
--
ALTER TABLE `productions`
  ADD CONSTRAINT `productions_ibfk_1` FOREIGN KEY (`idAnnee`) REFERENCES `annees` (`idannee`),
  ADD CONSTRAINT `productions_ibfk_2` FOREIGN KEY (`idDren`) REFERENCES `dren` (`idDren`),
  ADD CONSTRAINT `productions_ibfk_3` FOREIGN KEY (`idEleve`) REFERENCES `eleves` (`idEleve`),
  ADD CONSTRAINT `productions_ibfk_4` FOREIGN KEY (`idEts`) REFERENCES `etablissements` (`idEts`),
  ADD CONSTRAINT `productions_ibfk_5` FOREIGN KEY (`idNiveau`) REFERENCES `niveaux` (`idNiveau`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
