-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 03 Mai 2017 à 16:00
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `newapp`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `titre` varchar(50) CHARACTER SET utf8 NOT NULL,
  `contenu` longtext NOT NULL,
  `date_creation` date NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `auteur` varchar(20) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `contenu`, `date_creation`, `category_id`, `auteur`, `img`) VALUES
(29, 'Dessin 2', '<p>Dessin 2</p>\r\n', '2017-05-03', NULL, 'Seizuko', 'best-01.png'),
(30, 'dessin 3', '<p>dessin 3</p>\r\n', '2017-05-03', NULL, 'Seizuko', 'MyFurry-01.png'),
(31, 'dessin 4', '<p>dessin 4</p>\r\n', '2017-05-03', NULL, 'Seizuko', 'seizuHead-01.png'),
(32, 'dessin 5', '<p>dessin</p>\r\n', '2017-05-03', NULL, 'Seizuko', 'tokyoghoul-01.png'),
(33, 'Essai', '<p>lul</p>\r\n', '2017-05-03', NULL, 'Seizuko', 'tokyoghoul-01.png'),
(34, 'Test', '<p>2</p>\r\n', '2017-05-03', NULL, 'Seizuko', 'MyFurry-01.png'),
(35, 'lul', '<p>lul</p>\r\n', '2017-05-03', NULL, 'Seizuko', 'seizuHead-01.png');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `messageCat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `titre`, `messageCat`) VALUES
(1, 'Infos', 0),
(2, 'Fake News', 0),
(3, 'Nouveautés', 0);

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `commentaire` text NOT NULL,
  `articles_id` int(11) NOT NULL,
  `auteurCommentaire` varchar(25) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `articles_id`, `auteurCommentaire`, `users_id`) VALUES
(1, 'Essai de commentaire ', 32, 'Seizuko', 2),
(2, 'Essai de commentaire ', 32, 'Seizuko', 2),
(3, 'lol', 32, 'Seizuko', 2),
(4, 'lol', 35, 'Seizuko', 2),
(5, 'lol', 35, 'Seizuko', 2),
(6, 'lol', 35, 'Seizuko', 2),
(7, 'lol', 35, 'Seizuko', 2),
(8, 'lol', 35, 'Seizuko', 2),
(9, 'lol', 35, 'Seizuko', 2),
(10, 'lol', 35, 'Seizuko', 2),
(11, 'lol', 35, 'Seizuko', 2),
(12, 'lol', 35, 'Seizuko', 2),
(13, 'lol', 35, 'Seizuko', 2),
(14, 'lol', 35, 'Seizuko', 2);

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `images`
--

INSERT INTO `images` (`id`, `images`) VALUES
(1, 'profil1'),
(2, 'profil2'),
(3, 'profil3'),
(4, 'profil4'),
(5, 'profil5'),
(6, 'profil6'),
(7, 'profil7');

-- --------------------------------------------------------

--
-- Structure de la table `membrerang`
--

CREATE TABLE `membrerang` (
  `id` int(11) NOT NULL,
  `membre_rang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `membrerang`
--

INSERT INTO `membrerang` (`id`, `membre_rang`) VALUES
(1, 'visiteur'),
(2, 'inscrit'),
(3, 'modo'),
(4, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `sujet_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sujets`
--

CREATE TABLE `sujets` (
  `id` int(11) NOT NULL,
  `titre` varchar(25) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `sujets`
--

INSERT INTO `sujets` (`id`, `titre`, `category_id`) VALUES
(1, 'Test', 1),
(2, 'FAQ', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `mail` varchar(100) NOT NULL,
  `date_inscription` date NOT NULL,
  `membre_rang` enum('visiteur','inscrit','modo','admin') DEFAULT 'inscrit',
  `image` varchar(255) NOT NULL,
  `message` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `date_de_naissance`, `mail`, `date_inscription`, `membre_rang`, `image`, `message`) VALUES
(2, 'Seizuko', 'c81e26a443b4945b09570345526fcda14e5a879f', '1995-03-22', '', '2017-04-10', 'admin', 'seizuko', 0),
(10, 'Julien', '45b9278268ca57105aef6c0b8d66cfa7e213b647', '2000-02-22', 'julien@julien.fr', '2017-05-03', 'inscrit', '', 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `membrerang`
--
ALTER TABLE `membrerang`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sujets`
--
ALTER TABLE `sujets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `membrerang`
--
ALTER TABLE `membrerang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `sujets`
--
ALTER TABLE `sujets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
