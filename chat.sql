-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  jeu. 21 mars 2019 à 00:40
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `chat`
--

-- --------------------------------------------------------

--
-- Structure de la table `conversation`
--

CREATE TABLE `conversation` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `message` varchar(255) NOT NULL,
  `dat_send` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `conversation`
--

INSERT INTO `conversation` (`id`, `user_id`, `name`, `message`, `dat_send`) VALUES
(87, 5, 'cool', 'bonjour', '2019-03-15 15:32:51'),
(88, 4, 'landry', 'ndk', '2019-03-16 21:12:02'),
(89, 5, 'cool', 'comment', '2019-03-18 14:47:38'),
(90, 4, 'landry', 'sa va', '2019-03-18 14:47:46'),
(91, 5, 'cool', 'cbvnv', '2019-03-18 16:14:10'),
(92, 5, 'cool', 'gfgf', '2019-03-18 16:14:32'),
(93, 4, 'landry', 'kdkd', '2019-03-18 16:14:35'),
(94, 4, 'landry', 'hhdfhd', '2019-03-18 16:14:46'),
(95, 4, 'landry', 'dddddd', '2019-03-18 16:16:08'),
(96, 4, 'landry', 'hhhh', '2019-03-18 16:16:17'),
(97, 4, 'landry', 'iiyuytty\r\nhuggh', '2019-03-18 16:44:05'),
(98, 4, 'landry', 'hhhddh', '2019-03-19 00:35:47'),
(99, 4, 'landry', 'nnnnn', '2019-03-19 09:24:32'),
(100, 4, 'landry', 'ggdgsgsgs', '2019-03-19 09:26:01'),
(101, 6, 'toure', 'gfdkn', '2019-03-19 12:04:41'),
(102, 6, 'toure', 'ffdkj', '2019-03-19 12:04:52'),
(103, 5, 'cool', 'hhhffh', '2019-03-19 12:05:02'),
(104, 5, 'cool', 'cool', '2019-03-19 12:05:28'),
(105, 6, 'toure', 'merci', '2019-03-19 12:05:52'),
(106, 5, 'cool', 'jjj', '2019-03-19 12:06:56'),
(107, 6, 'toure', 'byll', '2019-03-19 12:07:09'),
(108, 5, 'cool', 'jjj', '2019-03-19 12:08:21'),
(109, 5, 'cool', 'jjjj', '2019-03-19 12:08:32'),
(110, 5, 'cool', 'kkk', '2019-03-19 12:09:35'),
(111, 5, 'cool', 'kxkxk', '2019-03-19 12:09:43'),
(112, 5, 'cool', 'jjjj', '2019-03-19 12:10:32'),
(113, 5, 'cool', 'landry', '2019-03-19 12:10:57'),
(114, 5, 'cool', 'cool', '2019-03-19 12:11:34'),
(115, 6, 'toure', 'toujours la', '2019-03-19 12:11:50'),
(116, 4, 'landry', 'cool', '2019-03-19 12:12:00'),
(117, 4, 'landry', 'bien', '2019-03-19 12:12:23'),
(118, 4, 'landry', 'llll', '2019-03-19 12:13:16'),
(119, 6, 'toure', 'lllll\r\nkdkdhjdkjjd\r\nddddd', '2019-03-19 12:13:31'),
(120, 4, 'landry', 'bonjour toure', '2019-03-19 12:13:56'),
(121, 6, 'toure', 'oui bonjour', '2019-03-19 12:14:08'),
(122, 4, 'landry', 'je suis d\'accord', '2019-03-19 13:28:45'),
(123, 4, 'landry', 'cool  le pere', '2019-03-19 13:29:58'),
(124, 4, 'landry', 'cool mami', '2019-03-19 13:33:07'),
(125, 4, 'landry', 'cc', '2019-03-19 13:37:41'),
(126, 4, 'landry', 'bbbbbbbb', '2019-03-19 13:38:21'),
(127, 4, 'landry', 'g sss vhj i', '2019-03-19 13:45:21'),
(128, 7, 'SILUE', 'miiyu\r\nuyghjskyujsgh', '2019-03-19 13:49:44'),
(129, 4, 'landry', 'salut marcelline', '2019-03-19 13:50:12'),
(130, 4, 'landry', 'vvvvvvvv', '2019-03-19 14:02:00'),
(131, 4, 'landry', 'hh', '2019-03-19 14:02:57'),
(132, 8, 'poldo', 'je suis la', '2019-03-19 14:23:44'),
(133, 4, 'landry', 'jjjjj', '2019-03-19 14:24:02'),
(134, 4, 'landry', 'hhhh', '2019-03-19 14:27:18'),
(135, 4, 'landry', 'hh', '2019-03-19 14:27:24'),
(136, 8, 'poldo', 'je suis', '2019-03-19 14:27:36'),
(137, 4, 'landry', 'hfhfhf', '2019-03-19 14:28:10'),
(138, 8, 'poldo', 'je me nomme leo', '2019-03-19 14:29:01'),
(139, 8, 'poldo', 'je me nomme leo', '2019-03-19 14:33:33'),
(140, 5, 'cool', 'je suis landry', '2019-03-19 14:33:45'),
(141, 4, 'landry', 'landry', '2019-03-19 14:34:26'),
(142, 6, 'toure', 'mamaan', '2019-03-19 14:35:15'),
(143, 7, 'SILUE', 'ddfghjk,jhgfdertyuj', '2019-03-19 14:39:34'),
(144, 7, 'SILUE', 'qsdfghjkjhgfdfgh', '2019-03-19 14:39:44'),
(145, 7, 'SILUE', 'landry mon exo', '2019-03-19 15:04:26'),
(146, 6, 'toure', 'maman je t\'aime', '2019-03-19 15:04:56'),
(147, 8, 'poldo', 'le Grand poldo est là', '2019-03-19 15:05:57'),
(148, 6, 'toure', 'poldo n\'est pas rassasié', '2019-03-19 15:06:44'),
(149, 8, 'poldo', 'le grand poldo est là', '2019-03-19 15:07:12'),
(150, 6, 'toure', 'elles ont échoués wallaye\r\n prochainement on ira en même temps \r\nen plis dans ca la c\'est elle seul ui sont rassaasiés anou aman fa \r\nserieux on va porter plainte les filles la ont fais combine \r\nécran wa wé', '2019-03-19 15:14:56'),
(151, 7, 'SILUE', 'mon chere ca nou', '2019-03-19 15:18:25'),
(152, 6, 'toure', 'les filles la sont amendés 2000 pour la prochaine séance pour abus de confiance', '2019-03-19 15:23:11'),
(153, 5, 'cool', 'b bvnnvjv hfhfhfngfjryrueuuesgxb', '2019-03-19 18:44:52'),
(154, 5, 'cool', 'lajjsjjdkdkdkkbongfeedws', '2019-03-19 18:45:28'),
(155, 5, 'cool', 'hhh', '2019-03-19 18:47:15'),
(156, 5, 'cool', 'hhhhhjj', '2019-03-19 18:47:34'),
(157, 5, 'cool', 'bon', '2019-03-19 19:08:22'),
(158, 7, 'SILUE', 'mmmmmmmmmm', '2019-03-19 19:37:14'),
(159, 4, 'landry', 'landry coder', '2019-03-19 19:37:49'),
(160, 4, 'landry', 'je s suis d4accord', '2019-03-19 19:39:43'),
(161, 4, 'landry', 'jjjj', '2019-03-19 21:30:31'),
(162, 5, 'cool', 'ssssgsgsgsgss', '2019-03-19 21:36:58'),
(163, 5, 'cool', 'jjj', '2019-03-19 21:39:33'),
(164, 5, 'cool', 'bonjour man en', '2019-03-19 21:40:32'),
(165, 4, 'landry', 'je vau s', '2019-03-19 21:41:10'),
(166, 5, 'cool', 'ok man je vais biens et toi', '2019-03-19 21:47:37'),
(167, 5, 'cool', 'tu voulais me dire quoi', '2019-03-19 21:49:26'),
(168, 4, 'landry', 'rien', '2019-03-19 21:49:38'),
(169, 5, 'cool', 'mais j\'ai vus ton message  que tu ecrivais man', '2019-03-19 21:51:02'),
(170, 4, 'landry', 'le monde des tic', '2019-03-19 21:52:10'),
(171, 4, 'landry', 'bonjou', '2019-03-20 13:39:55'),
(172, 4, 'landry', 'bonjou', '2019-03-20 13:39:58'),
(173, 4, 'landry', 'bonjou', '2019-03-20 13:39:59'),
(174, 5, 'cool', 'cool', '2019-03-20 23:24:42');

-- --------------------------------------------------------

--
-- Structure de la table `online`
--

CREATE TABLE `online` (
  `id` int(11) NOT NULL,
  `id_user` int(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `online`
--

INSERT INTO `online` (`id`, `id_user`, `user_name`, `message`) VALUES
(36, 5, 'cool', ''),
(37, 4, 'landry', 'j');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_pass`) VALUES
(4, 'landry', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(5, 'cool', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(6, 'toure', 'caaef8f22c9f5a76ed2685697893da5561ee3458'),
(7, 'SILUE', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(8, 'poldo', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(9, 'ouattara', '7c4a8d09ca3762af61e59520943dc26494f8941b');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `online`
--
ALTER TABLE `online`
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
-- AUTO_INCREMENT pour la table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT pour la table `online`
--
ALTER TABLE `online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
