-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 22 juil. 2021 à 14:50
-- Version du serveur :  5.7.32
-- Version de PHP : 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données : `blog_crud`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `publishedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userId` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `publishedAt`, `userId`, `title`, `content`) VALUES
(4, '2021-07-22 14:51:11', 2, 'Some lorem...', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse dignissim finibus sapien, sed dictum nibh. Suspendisse non consequat neque, eget pellentesque nunc. Maecenas bibendum accumsan elit sed venenatis. Vivamus id faucibus justo. Praesent felis eros, blandit feugiat elit non, iaculis dapibus lectus. Phasellus vehicula tempor tellus eget scelerisque. Integer metus augue, laoreet vel orci non, venenatis suscipit metus.<br />\r\n<br />\r\nQuisque vitae mi sed massa feugiat vulputate et eget velit. Curabitur facilisis libero nec viverra mollis. Etiam feugiat euismod odio in egestas. Nulla ac malesuada justo. Praesent volutpat ac dui quis congue. Nulla sed nisl ligula. Nam id placerat est. Suspendisse potenti. Integer sit amet consectetur mi, quis aliquam ex. Etiam nec ullamcorper ex. Curabitur ut bibendum nunc. Pellentesque ultrices lacus justo, sagittis efficitur diam semper et. In vehicula pretium justo.<br />\r\n<br />\r\nCurabitur id vehicula lorem. Donec in purus leo. Donec a lobortis risus. Morbi pellentesque rhoncus augue eget elementum. Mauris mattis lectus semper blandit consectetur. Proin finibus accumsan felis ac tempor. Phasellus eleifend tristique sem, a scelerisque diam cursus quis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut tempus neque quis sodales aliquam. Cras eu molestie justo. In ac dignissim nibh, vitae vehicula turpis. Quisque posuere posuere dui, at mollis odio aliquet vel.<br />\r\n<br />\r\nMaecenas sem nulla, rhoncus eget sapien non, convallis consectetur est. Nunc hendrerit congue ullamcorper. Duis gravida lacus nunc, in euismod quam cursus nec. Duis vitae dapibus libero. Morbi sollicitudin lacinia semper. Maecenas ex sapien, tincidunt id viverra commodo, tincidunt id nulla. Sed consectetur commodo magna, in rhoncus massa mollis sed. In et ipsum quis ligula auctor posuere. Curabitur ultricies ligula ac eros ullamcorper pellentesque. Vestibulum tellus ipsum, blandit eu orci sit amet, rhoncus rhoncus orci. In hac habitasse platea dictumst.<br />\r\n<br />\r\nPraesent et ante nec ipsum mattis molestie. Nulla aliquet mauris ultricies, rhoncus lorem quis, vehicula tellus. Ut et fringilla ante. Sed vestibulum volutpat felis vel suscipit. Ut vel suscipit tellus, id luctus justo. Morbi pulvinar rutrum enim sed tincidunt. Aliquam lobortis odio vitae nisl elementum, ut vehicula erat auctor. Donec nec rhoncus nisl, id iaculis mauris.'),
(5, '2021-07-22 15:15:39', 3, 'Un article du bon et beau docteur Maison', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae magna commodo, convallis lectus eget, sollicitudin nibh. Duis bibendum mattis nulla, at euismod magna posuere nec. In ac tempus massa, ut efficitur diam. Praesent euismod est eget pretium blandit. Phasellus a odio dictum, posuere nunc ut, mattis mauris. Duis id erat auctor sapien consequat elementum. Sed et lacinia nisl. Vestibulum convallis quis sem id vulputate. Aenean eu ligula justo. Nullam dictum massa et dapibus feugiat. Mauris nec euismod nibh. Phasellus sit amet metus lectus. Proin a nisl placerat, placerat lacus et, luctus turpis.<br />\r\n<br />\r\nNam posuere ex ut ante dapibus, nec egestas augue tempor. Ut in nisi quis libero feugiat consequat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum est nibh, iaculis ac euismod et, maximus non nunc. Cras at feugiat ante. Sed tincidunt massa vitae dui bibendum, et ornare orci porttitor. Etiam congue, lorem eget aliquet imperdiet, orci quam tempus elit, id accumsan purus quam sed arcu. Duis cursus ligula eu orci facilisis, vel ultricies nisi posuere. Phasellus eu ultrices augue, non finibus lacus. Integer nunc eros, convallis nec congue et, dignissim laoreet eros.<br />\r\n<br />\r\nAliquam luctus lacinia ex, eget eleifend lectus viverra sed. Phasellus eget nunc pellentesque, pulvinar leo ut, eleifend dolor. Duis id volutpat leo. Fusce nisi libero, iaculis sed velit id, venenatis posuere erat. Donec viverra eros id velit luctus, sit amet volutpat ante feugiat. Donec rhoncus consectetur enim, hendrerit mattis enim dignissim quis. Duis imperdiet dapibus arcu, facilisis facilisis mauris finibus eu. In hac habitasse platea dictumst. Etiam nec diam at ipsum finibus rhoncus quis in eros. In hac habitasse platea dictumst. In hac habitasse platea dictumst. Praesent sagittis bibendum hendrerit.<br />\r\n<br />\r\nMorbi eu leo tempus, dictum quam et, fringilla ipsum. Suspendisse porttitor a dolor ullamcorper tristique. Morbi blandit eget nisi auctor tincidunt. Vivamus lacinia fringilla mauris eu facilisis. Suspendisse malesuada ullamcorper urna, sed facilisis velit viverra quis. Integer a ipsum sodales quam egestas dictum. Vestibulum viverra aliquam eleifend. Nunc ultrices varius sem, eu volutpat massa mattis vitae. Vestibulum id accumsan arcu.<br />\r\n<br />\r\nFusce est arcu, finibus eget tortor eu, congue iaculis elit. Sed ultrices felis non purus aliquam convallis. Suspendisse finibus suscipit ex, et aliquet eros molestie eu. Etiam auctor id augue et venenatis. Ut id interdum elit. Phasellus a magna sit amet eros tempus euismod. Suspendisse volutpat hendrerit lectus quis dictum. In hac habitasse platea dictumst. Aenean cursus augue non sem pretium malesuada. Phasellus eget lorem consequat, tincidunt metus quis, hendrerit massa. Vivamus commodo nisl vitae consectetur tincidunt. Aenean nec elementum nisi. Ut ut arcu massa. Nulla facilisi. Donec dapibus magna consectetur commodo pulvinar. Vestibulum accumsan molestie mi.');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `publisedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` text NOT NULL,
  `userId` int(11) NOT NULL,
  `articleId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `publisedAt`, `content`, `userId`, `articleId`) VALUES
(8, '2021-07-22 16:46:28', 'Je suis un commentaire très intéréssant...<br />\r\n<br />\r\nAvec des retours à la ligne des fois', 2, 5),
(9, '2021-07-22 16:46:38', 'et même des balises &lt;html&gt;', 2, 5);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roles` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `firstName`, `lastName`, `email`, `password`, `roles`) VALUES
(2, 'Jean-François', 'DI RIENZO', 'jf.dirienzo@gmail.com', '$2y$10$EfUcikkTFJ1NNoywEUxfO.nrTQkKAn3/0dlUnW98g.DbZrJCahAdW', 'a:1:{i:0;s:10:\"ROLE_ADMIN\";}'),
(3, 'Francis', 'Huster', 'francis.huster@gmail.com', '$2y$10$qYCTvvC8mnmhRq6EBDhWFOSdykl8.EUhxjO7SINLTuw.MBd3uxU6m', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
