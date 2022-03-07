-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 07 mars 2022 à 10:13
-- Version du serveur :  10.4.12-MariaDB
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `myapp`
--

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `created_at`) VALUES
(1, 'Mon super articles [edité]', 'Mon contenu edité une second fois grace poo en PHP', '2022-01-24 15:47:03'),
(4, 'un article qui fais sensation  ', 'Les commandes \"Traitée(s)\" sont des commandes qui ont été envoyé par votre fournisseur AliExpress et qui ont été automatiquement ou manuellement traité. Vous pouvez synchroniser le statut et les numéros de suivi des commande ecrit par olayinka', '2022-01-24 11:54:44'),
(5, 'Mon super de la fin ', 'je suis un developper web ', '2022-01-26 22:18:41');

-- --------------------------------------------------------

--
-- Structure de la table `posts_tag`
--

DROP TABLE IF EXISTS `posts_tag`;
CREATE TABLE IF NOT EXISTS `posts_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `posts_id` int(11) NOT NULL,
  `tags_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_id` (`posts_id`),
  KEY `tags_id` (`tags_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts_tag`
--

INSERT INTO `posts_tag` (`id`, `posts_id`, `tags_id`) VALUES
(6, 1, 5),
(7, 1, 1),
(8, 1, 2),
(9, 4, 5),
(10, 5, 4),
(11, 5, 1),
(12, 5, 2);

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`) VALUES
(1, 'PHP', '2021-12-07 15:25:48'),
(2, 'JS', '2021-12-07 15:25:48'),
(3, 'PYTHON', '2021-12-07 15:25:48'),
(4, 'HTML/CSS', '2021-12-10 06:23:21'),
(5, 'C#', '2021-12-10 06:23:21');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(225) DEFAULT NULL,
  `pass` varchar(225) DEFAULT NULL,
  `admin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `pass`, `admin`) VALUES
(1, 'admin', '$2y$10$9bWsnbmm9EY6iYs2pTBIUusgEit5Xb7O9E06L9RjBi9lIROxVCngy', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `posts_tag`
--
ALTER TABLE `posts_tag`
  ADD CONSTRAINT `posts_tag_ibfk_1` FOREIGN KEY (`posts_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_tag_ibfk_2` FOREIGN KEY (`tags_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
