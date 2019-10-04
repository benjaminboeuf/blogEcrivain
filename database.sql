-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 04 oct. 2019 à 18:43
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
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `signaled` int(11) NOT NULL DEFAULT '0',
  `idPost` int(11) NOT NULL,
  `author` varchar(50) CHARACTER SET utf8 NOT NULL,
  `content` char(255) CHARACTER SET utf8 NOT NULL,
  `comment_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `signaled`, `idPost`, `author`, `content`, `comment_date`) VALUES
(1, 3, 1, 'Benjamin Boeuf', 'Donec semper scelerisque ex at iaculis. Nunc a arcu mi. Curabitur tempor elit vitae pharetra dignissim.', '2019-02-02 11:13:40'),
(2, 0, 1, 'Ruby Road', 'Curabitur cursus a enim nec suscipit. Integer blandit porttitor elit. Morbi sem sem, iaculis sed convallis quis, interdum nec ex.', '2019-02-03 19:08:49'),
(4, 0, 2, 'Ruby Road', 'Aliquam vulputate, sapien eget convallis venenatis, odio ipsum iaculis metus, non placerat purus ipsum eget urna.', '2019-02-04 16:46:14'),
(5, 0, 3, 'Benjamin Boeuf', 'Nam feugiat viverra orci quis volutpat. Morbi a ornare leo. Morbi nibh mauris, vestibulum in sodales a, semper sit amet risus.', '2019-02-05 11:16:50'),
(10, 1, 1, 'Ju Lascar', 'Under vund ic, metisem du eturnum. ça ne veut rien dire mais je trouvais que ça faisait bien', '2019-09-21 13:39:47'),
(11, 0, 2, 'Martin', 'Un bonjour de Martin', '2019-09-30 13:48:32');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT 'Jean Forteroche',
  `title` varchar(50) CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `author`, `title`, `content`, `creation_date`) VALUES
(1, 'Jean Forteroche', 'Histoire d\'un peuple aborigène', '<p style=\"text-align: justify;\">Quisque eu egestas. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce mollis, lorem in aliquam molestie, risus ipsum ullamcorper risus, ut maximus eros enim velit. Vivamus eros leo, consectetur id turpis at, volutpat dignissim ligula. In ultricies tempor neque. Donec lacus lectus, convallis nec faucibus a, auctor in velit. Nulla egestas id tellus et iaculis. Mauris lacus ipsum, mollis et enim in, consequat feugiat lorem. In vestibulum, ipsum sed ultricies rhoncus, nisi lectus interdum ex, in iaculis odio nisl sit amet dolor. Vestibulum mollis ante ut facilisis egestas.<br /><br />Curabitur tempus purus nec accumsan rhoncus. Vestibulum eros turpis, mollis at nisl id, rhoncus euismod mauris. Phasellus ornare, enim id varius scelerisque, risus lectus vestibulum ipsum, eu ullamcorper sapien justo semper enim. Sed sit amet sem porttitor, posuere purus nec, varius arcu. Quisque varius, risus et placerat vehicula, dolor odio placerat neque, et lobortis nisi ex a lorem. Aliquam ultricies eget massa nec suscipit. Nunc elit turpis, pharetra eget bibendum at, porta nec mauris. Etiam bibendum semper libero vitae pharetra.<br /><br />Sed bibendum congue magna ac molestie. Vestibulum vestibulum aliquam rutrum. Vivamus congue semper elementum. Curabitur gravida tellus vulputate elit molestie pellentesque. Maecenas urna dui, dignissim vitae ultricies a, sodales nec turpis. Mauris at facilisis elit, ac porttitor odio.</p>', '2019-02-01 17:18:01'),
(2, 'Jean Forteroche', 'Donec dictum ultrices varius', '<p style=\"text-align: justify;\">Suspendisse eget est a neque varius ullamcorper eu ut nunc. Donec consectetur nisi ut sem luctus, a facilisis mauris euismod. Suspendisse eget est sapien. Cras libero lacus, placerat vitae volutpat quis, ornare efficitur risus. Pellentesque imperdiet aliquet nisl, dignissim auctor ex tempor nec. Donec dictum ultrices varius. Integer vehicula sodales libero, quis porta magna sodales id. Aliquam vulputate erat ut porttitor volutpat. In hac habitasse platea dictumst. Nunc maximus nisl efficitur est vestibulum, at placerat ante maximus. Donec ac dictum massa, sit amet ultricies nisi. Pellentesque convallis leo magna, vitae tempus sem accumsan non. Vivamus ultricies ligula id lorem pellentesque, non euismod risus malesuada.<br /><br />Sed molestie risus nibh, ut laoreet odio lacinia vitae. Curabitur consectetur erat eget lacus ultrices, vitae egestas nunc fringilla. Nulla vestibulum faucibus magna. Maecenas lobortis, sem congue accumsan auctor, mauris justo molestie felis, quis eleifend lectus quam sit amet quam. Integer aliquet sollicitudin nisl, non facilisis nunc aliquam in. Nulla lobortis arcu justo, vel lobortis ex finibus quis. Sed eget diam volutpat, dapibus diam vel, imperdiet quam. Duis nisi diam, volutpat nec arcu eget, fringilla pulvinar metus. Duis mattis leo sit amet leo porta, ac consectetur lectus elementum. Nulla facilisi.<br /><br />Morbi sed fermentum lectus, quis bibendum quam. Nullam placerat est diam, ut maximus arcu semper a. In et eros et sapien lacinia feugiat vitae sed ipsum. Etiam fermentum magna vitae dictum rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean hendrerit nunc non dolor tristique, ut tincidunt mauris mollis. Donec vel ante nisl. Phasellus eget justo nisl. Nam volutpat aliquet sollicitudin. Morbi at sapien nisl. Mauris bibendum dignissim lorem. Pellentesque nibh velit, vulputate id tristique quis, molestie sed enim. Aliquam nec semper quam. Pellentesque sit amet vehicula diam, vel dapibus neque. Quisque ac vehicula felis. Fusce quis magna nisi.</p>', '2019-02-02 10:13:32'),
(3, 'Jean Forteroche', 'Nullam odio dui', '<p style=\"text-align: justify;\">Nulla nec feugiat nunc, vitae luctus dui. Donec vitae odio gravida, ultrices quam a, efficitur lorem. Pellentesque efficitur a nisl at hendrerit. Pellentesque sed purus convallis, cursus leo eget, lacinia arcu. Nulla commodo bibendum felis et sagittis. Suspendisse potenti. Aliquam dignissim nibh a erat feugiat, vel vulputate eros euismod. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam odio dui, ullamcorper eget arcu sed, laoreet sollicitudin lectus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras libero metus, rutrum quis consectetur id, consequat et ipsum. Nullam lacus erat, semper eu risus eget, condimentum bibendum nunc. Nullam mollis sed tortor in hendrerit.<br /><br />Vestibulum in justo et lectus volutpat consequat id id tellus. Sed justo lacus, semper eget congue quis, dignissim eu urna. Etiam nibh tortor, faucibus quis orci a, aliquet sollicitudin neque. Duis iaculis imperdiet ante nec sagittis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin posuere felis purus, nec rutrum nisi vestibulum eu. Phasellus fermentum dolor at tortor ultricies, vitae maximus enim posuere. Morbi a ultricies nunc, id vestibulum neque.<br /><br />Sed congue pretium ante quis rutrum. Pellentesque scelerisque mi ut tristique ultrices. Donec et enim tellus. Integer sagittis, diam eget posuere imperdiet, nisl eros porta ligula, non luctus nisl neque ut lectus. Nulla hendrerit nisi eu mauris iaculis ultricies. Proin luctus gravida ex aliquet ornare. Duis auctor metus ex, vel semper ipsum dignissim nec. Cras imperdiet dolor ligula, sit amet sagittis tellus aliquet sed. Nullam vehicula eleifend nunc. Nunc vel pulvinar nisi, id interdum nulla. Aliquam at sodales ipsum. Integer tempor, arcu quis viverra accumsan, risus libero cursus risus, vitae vulputate turpis felis vel dui.</p>', '2019-02-03 15:16:36'),
(4, 'Jean Forteroche', 'A la découverte d\'une nature préservée', '<p style=\"text-align: justify;\">Vivamus ligula turpis, pretium ut mauris sed, tincidunt euismod velit. <em>Proin ultrices justo at elit congue tempor.</em> Nulla sit amet ante sodales, laoreet turpis sit amet, tristique elit. Morbi egestas cursus mi, consectetur ullamcorper turpis placerat consequat. <strong>Ut velit justo</strong>, convallis a porta vitae, auctor sed arcu. Sed euismod, diam vitae consequat cursus, odio lectus tempor ante, sed mollis neque leo at sem. Sed tempor tristique nulla, in bibendum tellus lacinia vel. Nunc a purus et diam pulvinar varius. Nulla tristique turpis diam, in vestibulum nulla venenatis eu. Cras at luctus ex, nec ornare nunc. Nam convallis, dui at malesuada consectetur, sem dolor sollicitudin urna, sit amet sagittis arcu turpis mollis nisi. Nulla accumsan egestas sagittis. Vestibulum eu aliquam ex. Donec semper condimentum ipsum eu condimentum. Fusce in ante ut est congue fermentum.</p>', '2019-03-25 22:11:19'),
(5, 'Jean Forteroche', 'Expédition en terre artique', '<p style=\"text-align: justify;\">In luctus dapibus nisi, in <strong>rutrum arcu sagittis</strong> eu. Quisque quis egestas leo. Fusce dignissim elementum leo in vulputate. Morbi ultricies nisi vel enim rutrum faucibus. Suspendisse a purus augue. Aenean ut nibh ac tellus tempus fermentum. Donec at tincidunt lorem. Praesent nulla nisi, dapibus sit amet odio sed, <em>volutpat porttitor ipsum</em>. Nullam vitae urna at metus ultricies fermentum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis vitae felis tortor. Cras sapien nunc, gravida et risus eget, efficitur dictum neque. Phasellus quis ante eu metus pulvinar tempor. Etiam dapibus nisi tortor, non vulputate est fermentum at. Nunc erat neque, condimentum eu posuere vitae, laoreet eget erat.</p>', '2019-03-25 22:12:42'),
(6, 'Jean Forteroche', 'Aperçu de la faune et la nature', '<p style=\"text-align: justify;\">Vestibulum sit amet nibh <strong>eget nisl cursus elementum ac et quam</strong>. <em>Fusce non bibendum lorem. Aenean mattis</em>, mauris eget auctor consectetur, ipsum dui ornare nunc, at vehicula ipsum sapien eget turpis. Aenean tempor, ex a scelerisque ornare, ex ligula lobortis est, eget vestibulum lectus lectus nec metus. Maecenas luctus tristique ipsum vel dapibus. Duis id ligula hendrerit, tristique lacus in, varius velit. Quisque et magna libero. Morbi quis suscipit sem, vitae lobortis lectus. Curabitur vel justo eget justo convallis ultricies. Nunc sapien elit, finibus fringilla elit vitae, ultricies dignissim risus. Phasellus accumsan erat at ex maximus bibendum. Nulla venenatis ac massa vitae eleifend. Sed nunc risus, faucibus in ex sed, tincidunt vestibulum magna. Sed bibendum eget neque ac aliquet. Sed cursus gravida felis, quis consectetur velit vehicula in. Donec in dignissim odio. Etiam eget urna sed leo faucibus tempor vitae ut lacus. Nulla sed magna non est molestie facilisis. Phasellus bibendum iaculis nisl, ac fermentum mauris luctus sagittis. Morbi blandit, felis ultricies sollicitudin tempus, arcu nunc iaculis metus, a venenatis mi erat sit amet orci. Ut urna mauris, tincidunt quis semper id, semper semper diam.</p>', '2019-04-07 18:47:02');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `login`, `password`) VALUES
(1, 'Jean Forteroche', 'jean.forto', '$2y$10$jQ7KXacb5mg.mODiN5lHuOwJ0wFeGfg2q1qbEjj/IGP8WN/Uz3Pmi');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
