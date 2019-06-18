-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 14 juin 2019 à 11:12
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `keslene`
--

-- --------------------------------------------------------

--
-- Structure de la table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `content` text,
  `lien_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `about`
--

INSERT INTO `about` (`id`, `content`, `lien_img`) VALUES
(1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet esse vel nulla beatae deserunt vero, fugit cupiditate quisquam! Deleniti quia illo maiores officia culpa dicta velit tempora? Nobis sapiente quaerat exercitationem minima dignissimos ullam consequatur est dicta aspernatur! Porro perspiciatis maxime, voluptatum pariatur molestias hic culpa natus consectetur, ea corporis dignissimos nobis expedita eveniet.\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt aspernatur officia accusantium sit eius ea placeat reiciendis delectus blanditiis natus, non unde est nemo voluptatibus debitis iste necessitatibus repudiandae, voluptatem ullam praesentium qui laudantium.\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt aspernatur officia accusantium sit eius ea placeat reiciendis delectus blanditiis natus, non unde est nemo voluptatibus debitis iste necessitatibus repudiandae, voluptatem ullam praesentium qui laudantium.', '../../static/tdgaXKz7Ch2SbHpSDk75e6Pm7L9BeJ.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `carousel`
--

CREATE TABLE `carousel` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `lien_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `carousel`
--

INSERT INTO `carousel` (`id`, `titre`, `lien_img`) VALUES
(1, 'lorem ipsum', '../../static/n1pst6icD9N6oBayRCBf.jpg'),
(2, 'lorem ipsum', '../../static/PZHuWuOZ3VrR0HjGgG8k.jpg'),
(3, 'lorem ipsum', '../../static/sKFWi1wLcHN3nLkQOMxp.jpg'),
(5, 'lorem ipsum', '../../static/k1PHuR8DtOJ3F6xSk1NM.jpg'),
(6, 'lorem ipsum', '../../static/0Ag0TzG4yyGhqcObizll.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `content_1` text,
  `content_2` text,
  `lien_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `content_1`, `content_2`, `lien_img`) VALUES
(1, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Libero, itaque incidunt nihil deserunt, facere aliquid accusantium quo et magnam placeat ducimus eaque? Soluta voluptas sunt cumque placeat accusantium itaque. Accusantium!\r\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Libero, itaque incidunt nihil deserunt, facere aliquid accusantium quo et magnam placeat ducimus eaque? Soluta voluptas sunt cumque placeat accusantium itaque. Accusantium!', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Libero, itaque incidunt nihil deserunt, facere aliquid accusantium quo et magnam placeat ducimus eaque? Soluta voluptas sunt cumque placeat accusantium itaque. Accusantium!\r\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Libero, itaque incidunt nihil deserunt, facere aliquid accusantium quo et magnam placeat ducimus eaque? Soluta voluptas sunt cumque placeat accusantium itaque. Accusantium!\r\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Libero, itaque incidunt nihil deserunt, facere aliquid accusantium.', '../../static/nfXz2ntkLnRbsRf1l8Mm.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `date_message` datetime DEFAULT NULL,
  `message` text,
  `date_suppression` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `nom`, `prenom`, `email`, `telephone`, `date_message`, `message`, `date_suppression`) VALUES
(17, 'Dos Santos Damiao', 'Jonathan', 'jdsd45@gmail.com', '0777851343', '2019-05-09 08:22:12', 'coucou, voici mon message test', NULL),
(18, 'DENIS', 'Keslène', 'nene@gmail.com', '07.05.48.31.12', '2019-04-07 07:00:00', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Porro, officia quas? Veritatis consectetur necessitatibus, quaerat ex dicta tempora sit. Itaque debitis ipsa temporibus eligendi maxime, eos veniam tempore provident molestias ullam iure perferendis officiis maiores ratione. Saepe recusandae quasi impedit aliquam amet placeat voluptatum laboriosam alias. Quas voluptatibus minima suscipit ut veritatis obcaecati? Dolor explicabo doloribus porro quia fugit temporibus amet velit magnam repellat perspiciatis culpa, repellendus ullam tempore suscipit earum placeat libero, veniam ratione enim vero laborum nisi blanditiis. Iste velit fuga debitis exercitationem et dolore, veritatis temporibus repellat quod molestias eum eaque alias animi expedita reprehenderit, eius tenetur! Officia et repellat maiores officiis omnis molestias esse, consequuntur labore! Sit rerum deleniti culpa, omnis laborum mollitia? Mollitia suscipit, possimus quisquam excepturi officia vitae hic eveniet tempore deleniti et, ea, fugiat minima ducimus neque itaque enim esse alias recusandae rerum. Repellendus deserunt libero ratione ullam voluptates, impedit dolores quis modi incidunt, ex excepturi delectus. Ut velit beatae quia! Quidem nesciunt veniam, nisi harum repudiandae dolore iste blanditiis odit obcaecati ad ut id labore distinctio quis minus, iure non unde error. Animi repellendus modi labore asperiores at nesciunt dolor dignissimos, ipsa fuga voluptas. Deserunt laborum optio autem eaque iure itaque, ipsa rerum odio dolor at maxime vitae voluptatum hic aliquid nihil, id sunt suscipit numquam. Excepturi numquam consequatur inventore distinctio corporis iusto ipsum cum sint, cupiditate porro earum accusamus eius perferendis tenetur ea ducimus dignissimos officia, culpa qui officiis sunt corrupti magni? Tenetur dicta magnam quam ex nemo, earum adipisci obcaecati laudantium numquam vero voluptates natus deleniti nihil consectetur mollitia ipsam ab. Aperiam, soluta doloremque, in earum, eligendi amet harum incidunt omnis nisi mollitia quos hic? Ratione dolorum quasi sed, magni at odio laudantium dignissimos labore, perferendis, voluptate tenetur! Repellendus quidem dolore soluta voluptatum veritatis error ratione distinctio perspiciatis unde officiis.', NULL),
(19, 'GIROMON', 'Marie-Thérèse', 'giromon@potote.fr', '0595012514', '2019-05-23 06:18:00', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti inventore cumque delectus porro iste consequatur, modi corrupti dolorum repellat. Dolorum sit commodi, quae molestias iusto accusantium obcaecati cumque deserunt sequi, iste error officia deleniti repellendus expedita laudantium similique soluta possimus non? Impedit nisi, voluptatum error vel autem rem. Molestiae, dolorem.', NULL),
(20, 'BANANE', 'Bernard', 'nanar@gmail.com', '07.51.12.95.12', '2018-12-18 00:00:00', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Exercitationem, sequi.', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `portfolio_albums`
--

CREATE TABLE `portfolio_albums` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `mots_cles` varchar(255) DEFAULT NULL,
  `lien_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `portfolio_albums`
--

INSERT INTO `portfolio_albums` (`id`, `titre`, `url`, `mots_cles`, `lien_img`) VALUES
(1, 'Beauté des cils', 'beaute-des-cils', NULL, '../../static/Zhs8DoVAIbz5y6SLUXAL.jpg'),
(2, 'Maquillage mode', 'maquillage-mode', NULL, '../../static/VWdnH6iucVBdBbA2hIelBzf12VReEE.jpg'),
(3, 'Maquillage évènementiel', 'maquillage-evenementiel', NULL, '../../static/ju7gPmyOXn30DlvLKoCj0IUCA8D76L.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `portfolio_photos`
--

CREATE TABLE `portfolio_photos` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `fk_album` int(11) DEFAULT NULL,
  `mots_cles` varchar(255) DEFAULT NULL,
  `lien_img` varchar(255) DEFAULT NULL,
  `en_ligne` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `portfolio_photos`
--

INSERT INTO `portfolio_photos` (`id`, `titre`, `fk_album`, `mots_cles`, `lien_img`, `en_ligne`) VALUES
(1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, delectus!', 3, 'azeaz', '../../static/pK0YsWaDd1nMQd42Gdc6cR4lAvIU4y.jpg', 1),
(2, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi, cumque!', 1, 'azeaz', '../../static/flHjRkjgaX6qrr8zLVSgw6RNBBdduU.jpg', 1),
(3, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi, cumque!', 2, 'aze', '../../static/IfTVM7SC2VDdhVCRoKA8CnKror91PB.jpg', 1),
(4, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi, cumque!', 3, 'aze', '../../static/pHbuIvnVjV7jl1iVIShT8bU92F0v3x.jpg', 1),
(5, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi, cumque!', 2, 'zea ze', '../../static/y3voQ9lORmKcvN5pwcYjzS05hwGYiS.jpg', 1),
(6, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi, cumque!', 1, 'zae aze', '../../static/11h3DhH4hx5MCogxB9rHKCtrVRxV97.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `prestations`
--

CREATE TABLE `prestations` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `prix` float(10,2) DEFAULT NULL,
  `temps` varchar(255) DEFAULT NULL,
  `lien_img` varchar(255) DEFAULT NULL,
  `detail` text,
  `fk_categorie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `prestations`
--

INSERT INTO `prestations` (`id`, `titre`, `prix`, `temps`, `lien_img`, `detail`, `fk_categorie`) VALUES
(67, 'Prestation 2', 60.00, '2h00', '../../static/0l56aM1x4QIPMtZt5yBpwZc1DqKT6z.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat doloremque explicabo, ea eius commodi optio perspiciatis pariatur praesentium at sapiente suscipit hic neque eum quod? Illum in exercitationem quidem voluptatibus laborum possimus at, harum sed sint inventore provident cupiditate esse fugit maxime iusto mollitia commodi ex minus dolore alias? Asperiores.', 3),
(68, 'Prestation 3', 20.00, '1h20', '../../static/zagCflAX2kEfkKgNffWi4Pui5iUiKm.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat doloremque explicabo, ea eius commodi optio perspiciatis pariatur praesentium at sapiente suscipit hic neque eum quod? Illum in exercitationem quidem voluptatibus laborum possimus at, harum sed sint inventore provident cupiditate esse fugit maxime iusto mollitia commodi ex minus dolore alias? Asperiores.', 3),
(69, 'Prestation 4', 20.00, '1h00', '../../static/Jsc7BNOulQBDfbwTrpzEnu0RCdZ7ov.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat doloremque explicabo, ea eius commodi optio perspiciatis pariatur praesentium at sapiente suscipit hic neque eum quod? Illum in exercitationem quidem voluptatibus laborum possimus at, harum sed sint inventore provident cupiditate esse fugit maxime iusto mollitia commodi ex minus dolore alias? Asperiores.', 3),
(70, 'Prestation 5', 20.00, '1h30', '../../static/3iBOzgz2Q5mLsPDJE4NHZWO6BsYqfP.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat doloremque explicabo, ea eius commodi optio perspiciatis pariatur praesentium at sapiente suscipit hic neque eum quod? Illum in exercitationem quidem voluptatibus laborum possimus at, harum sed sint inventore provident cupiditate esse fugit maxime iusto mollitia commodi ex minus dolore alias? Asperiores.', 1),
(71, 'Prestation 6', 15.00, '1h30', '../../static/y7sIxMSTD8rUJmWp4TJddFH19HmeHP.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat doloremque explicabo, ea eius commodi optio perspiciatis pariatur praesentium at sapiente suscipit hic neque eum quod? Illum in exercitationem quidem voluptatibus laborum possimus at, harum sed sint inventore provident cupiditate esse fugit maxime iusto mollitia commodi ex minus dolore alias? Asperiores.', 5),
(72, 'Prestation 7', 85.00, '3h30', '../../static/U18BOp2ra2qRSlFVwaIFvrPbKxe9vW.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat doloremque explicabo, ea eius commodi optio perspiciatis pariatur praesentium at sapiente suscipit hic neque eum quod? Illum in exercitationem quidem voluptatibus laborum possimus at, harum sed sint inventore provident cupiditate esse fugit maxime iusto mollitia commodi ex minus dolore alias? Asperiores.', 5),
(73, 'Prestation 8', 32.00, '1h00', '../../static/4wCdt84ZBQGboXZmmQEgGwwvwfqFHT.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat doloremque explicabo, ea eius commodi optio perspiciatis pariatur praesentium at sapiente suscipit hic neque eum quod? Illum in exercitationem quidem voluptatibus laborum possimus at, harum sed sint inventore provident cupiditate esse fugit maxime iusto mollitia commodi ex minus dolore alias? Asperiores.', 5),
(74, 'Prestation 1', 50.00, '1h30', '../../static/JtiSC7QJqkxE2lcHr1mzuqQctnZMMd.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat doloremque explicabo, ea eius commodi optio perspiciatis pariatur praesentium at sapiente suscipit hic neque eum quod? Illum in exercitationem quidem voluptatibus laborum possimus at, harum sed sint inventore provident cupiditate esse fugit maxime iusto mollitia commodi ex minus dolore alias? Asperiores.', 1);

-- --------------------------------------------------------

--
-- Structure de la table `prestations_categories`
--

CREATE TABLE `prestations_categories` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `lien_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `prestations_categories`
--

INSERT INTO `prestations_categories` (`id`, `titre`, `url`, `lien_img`) VALUES
(1, 'Beauté des cils', 'beaute-des-cils', '../../static/ybsBQkHGxIFHUrD2krYn.jpg'),
(3, 'Maquillage professionnel', 'maquillage-professionnel', '../../static/YYX8fZcVW7RP6AcpV6pa.jpg'),
(4, 'Autre', 'autre', NULL),
(5, 'Maquillage semi-permanent', 'maquillage-semi-permanent', '../../static/7WiC2MojVWAmue1c3L4J.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `portfolio_albums`
--
ALTER TABLE `portfolio_albums`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `portfolio_photos`
--
ALTER TABLE `portfolio_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_album_id` (`fk_album`);

--
-- Index pour la table `prestations`
--
ALTER TABLE `prestations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categorie_id` (`fk_categorie`);

--
-- Index pour la table `prestations_categories`
--
ALTER TABLE `prestations_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `portfolio_albums`
--
ALTER TABLE `portfolio_albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `portfolio_photos`
--
ALTER TABLE `portfolio_photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `prestations`
--
ALTER TABLE `prestations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT pour la table `prestations_categories`
--
ALTER TABLE `prestations_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `portfolio_photos`
--
ALTER TABLE `portfolio_photos`
  ADD CONSTRAINT `fk_album_id` FOREIGN KEY (`fk_album`) REFERENCES `portfolio_albums` (`id`);

--
-- Contraintes pour la table `prestations`
--
ALTER TABLE `prestations`
  ADD CONSTRAINT `fk_categorie_id` FOREIGN KEY (`fk_categorie`) REFERENCES `prestations_categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
