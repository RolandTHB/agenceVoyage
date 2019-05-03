-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 03 mai 2019 à 08:33
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `agencevoyage`
--

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

DROP TABLE IF EXISTS `activite`;
CREATE TABLE IF NOT EXISTS `activite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `activite`
--

INSERT INTO `activite` (`id`, `name`, `image`) VALUES
(16, 'Premiere activite', 'images/cuba.jpg'),
(19, 'ski', 'https://summitsports.scene7.com/is/image/SummitSports/528984_528984_1?$256$'),
(20, 'Premiere activite', 'images/cuba.jpg'),
(21, 'chameau', 'https://image.jimcdn.com/app/cms/image/transf/dimension=740x10000:format=jpg/path/s5dde8bff85c81b2f/image/i663f0139348920e9/version/1528797070/chameau-de-bactriane-fiche-animaux.jpg'),
(22, 'Premiere activite', 'images/cuba.jpg'),
(23, 'taureau', 'https://cdn-media.rtl.fr/cache/Y2-d5zmJRMAWMdo_oc6WHA/880v587-0/online/image/2018/0902/7794620965_un-taureau-illustration.jpg'),
(24, 'Premiere activite', 'images/cuba.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `activite_destination`
--

DROP TABLE IF EXISTS `activite_destination`;
CREATE TABLE IF NOT EXISTS `activite_destination` (
  `activite_id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  PRIMARY KEY (`activite_id`,`destination_id`),
  KEY `IDX_1EF54B879B0F88B1` (`activite_id`),
  KEY `IDX_1EF54B87816C6140` (`destination_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `destination`
--

DROP TABLE IF EXISTS `destination`;
CREATE TABLE IF NOT EXISTS `destination` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_du_voyage` date DEFAULT NULL,
  `pays_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3EC63EAAA6E44244` (`pays_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20190429125339', '2019-04-29 12:54:40'),
('20190429132151', '2019-04-29 13:22:19'),
('20190429140458', '2019-04-29 14:05:32'),
('20190429141728', '2019-04-29 14:17:39'),
('20190502085729', '2019-05-02 08:59:31');

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

DROP TABLE IF EXISTS `pays`;
CREATE TABLE IF NOT EXISTS `pays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `population` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`) VALUES
(1, 'roland.tabet@hotmail.fr', '[]', '$argon2i$v=19$m=1024,t=2,p=2$R2pQSkh5dHREMXQ3UDR5UQ$yf5Fp17KC395ZlDAnJxz5FqAfLaf/Ikym1lOgiIvzG0'),
(2, 'blabla@gmail.com', '[]', '$argon2i$v=19$m=1024,t=2,p=2$TVZ3RDVQbERySUtKeWlpcA$DK9yf58BLAKkRH+YfH3GUX32zicAscBT5nAOtYLizGA');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `activite_destination`
--
ALTER TABLE `activite_destination`
  ADD CONSTRAINT `FK_1EF54B87816C6140` FOREIGN KEY (`destination_id`) REFERENCES `destination` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_1EF54B879B0F88B1` FOREIGN KEY (`activite_id`) REFERENCES `activite` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `destination`
--
ALTER TABLE `destination`
  ADD CONSTRAINT `FK_3EC63EAAA6E44244` FOREIGN KEY (`pays_id`) REFERENCES `pays` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
