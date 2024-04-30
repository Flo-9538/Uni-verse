-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 30 avr. 2024 à 20:47
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `universe`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `user`, `message`, `category`, `date`) VALUES
(2, 'test', 'vous avez fait le dm ?', 'maths', '0000-00-00 00:00:00'),
(4, 'test', 'bonsoir', 'general', '2024-04-29 13:43:05'),
(5, 'test', 'yo', 'general', '2024-04-30 10:06:20'),
(6, 'test', 'm to the b', 'general', '2024-04-30 10:06:25'),
(7, 'test', 'pump it up', 'general', '2024-04-30 10:06:32'),
(8, 'test', 'c moi', 'general', '2024-04-30 10:08:14'),
(9, 'test', 'zqoidio', 'general', '2024-04-30 12:59:39'),
(10, 'test', 'ksef\r\nzdzqd\r\nzqdozqd$zqd$\r\nzmqd$\r\nzq', 'general', '2024-04-30 12:59:43'),
(11, 'test', 'jnde', 'general', '2024-04-30 12:59:47'),
(12, 'test', 'qhdkzqhuod', 'general', '2024-04-30 12:59:50'),
(13, 'test', 'jzduizahdiozahdpi', 'general', '2024-04-30 12:59:55'),
(14, 'test', 'bonsoir,\r\ncomment allez vous ?\r\nbien cordialement\r\nRaphatex', 'general', '2024-04-30 13:11:32'),
(15, 'test', 'cc', 'general', '2024-04-30 13:21:00'),
(16, 'florent', 'hello c\'est moi\r\nFlorent', 'general', '2024-04-30 13:30:24'),
(17, 'raphatex', 'coucou florent', 'general', '2024-04-30 13:31:08'),
(18, 'raphatex', 'non pas encore\r\net florent ?', 'maths', '2024-04-30 13:31:33'),
(19, 'florent', 'toujours pas les gars on devrait se dépêcher', 'maths', '2024-04-30 13:32:09');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `id_coded` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `active`, `id_coded`) VALUES
(24, 'raphatex', 'raphael.texier', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, '4d134bc072212ace2df385dae143139da74ec0ef');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
