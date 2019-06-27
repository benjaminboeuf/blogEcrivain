-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 25 mars 2019 à 18:06
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
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(50) CHARACTER SET utf8 NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `author`, `title`, `content`, `creation_date`) VALUES
(1, 'Jean Forteroche', 'Lorem Ipsum Varem Impossibilis', ' Quisque eu egestas mauris. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce mollis, lorem in aliquam molestie, risus ipsum ullamcorper risus, ut maximus eros enim pretium velit. Vivamus eros leo, consectetur id turpis at, volutpat dignissim ligula. In ultricies tempor neque. Donec lacus lectus, convallis nec faucibus a, auctor in velit. Nulla egestas id tellus et iaculis. Mauris lacus ipsum, mollis et enim in, consequat feugiat lorem. In vestibulum, ipsum sed ultricies rhoncus, nisi lectus interdum ex, in iaculis odio nisl sit amet dolor. Vestibulum mollis ante ut facilisis egestas.\r\n\r\nCurabitur tempus purus nec accumsan rhoncus. Vestibulum eros turpis, mollis at nisl id, rhoncus euismod mauris. Phasellus ornare, enim id varius scelerisque, risus lectus vestibulum ipsum, eu ullamcorper sapien justo semper enim. Sed sit amet sem porttitor, posuere purus nec, varius arcu. Quisque varius, risus et placerat vehicula, dolor odio placerat neque, et lobortis nisi ex a lorem. Aliquam ultricies eget massa nec suscipit. Nunc elit turpis, pharetra eget bibendum at, porta nec mauris. Etiam bibendum semper libero vitae pharetra.\r\n\r\nSed bibendum congue magna ac molestie. Vestibulum vestibulum aliquam rutrum. Vivamus congue semper elementum. Curabitur gravida tellus vulputate elit molestie pellentesque. Maecenas urna dui, dignissim vitae ultricies a, sodales nec turpis. Mauris at facilisis elit, ac porttitor odio. Nunc turpis justo, mattis quis nulla sit amet, molestie eleifend est. Donec mi felis, laoreet vitae condimentum eu, facilisis viverra metus. Aenean et ligula sit amet diam egestas sollicitudin et eget augue. Mauris at diam vehicula, commodo tellus sed, ultricies neque. Morbi in enim id dui feugiat laoreet eu at neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam non lacinia lacus. Phasellus vel mauris aliquam, elementum risus id, rutrum lorem. In hac habitasse platea dictumst. Donec blandit, orci nec condimentum luctus, mi ipsum consectetur nisl, at congue mauris velit a augue. ', '2019-02-01 17:18:01'),
(2, 'Jean Forteroche', 'Donec dictum ultrices varius', ' Suspendisse eget est a neque varius ullamcorper eu ut nunc. Donec consectetur nisi ut sem luctus, a facilisis mauris euismod. Suspendisse eget est sapien. Cras libero lacus, placerat vitae volutpat quis, ornare efficitur risus. Pellentesque imperdiet aliquet nisl, dignissim auctor ex tempor nec. Donec dictum ultrices varius. Integer vehicula sodales libero, quis porta magna sodales id. Aliquam vulputate erat ut porttitor volutpat. In hac habitasse platea dictumst. Nunc maximus nisl efficitur est vestibulum, at placerat ante maximus. Donec ac dictum massa, sit amet ultricies nisi. Pellentesque convallis leo magna, vitae tempus sem accumsan non. Vivamus ultricies ligula id lorem pellentesque, non euismod risus malesuada.\r\n\r\nSed molestie risus nibh, ut laoreet odio lacinia vitae. Curabitur consectetur erat eget lacus ultrices, vitae egestas nunc fringilla. Nulla vestibulum faucibus magna. Maecenas lobortis, sem congue accumsan auctor, mauris justo molestie felis, quis eleifend lectus quam sit amet quam. Integer aliquet sollicitudin nisl, non facilisis nunc aliquam in. Nulla lobortis arcu justo, vel lobortis ex finibus quis. Sed eget diam volutpat, dapibus diam vel, imperdiet quam. Duis nisi diam, volutpat nec arcu eget, fringilla pulvinar metus. Duis mattis leo sit amet leo porta, ac consectetur lectus elementum. Nulla facilisi.\r\n\r\nMorbi sed fermentum lectus, quis bibendum quam. Nullam placerat est diam, ut maximus arcu semper a. In et eros et sapien lacinia feugiat vitae sed ipsum. Etiam fermentum magna vitae dictum rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean hendrerit nunc non dolor tristique, ut tincidunt mauris mollis. Donec vel ante nisl. Phasellus eget justo nisl. Nam volutpat aliquet sollicitudin. Morbi at sapien nisl. Mauris bibendum dignissim lorem. Pellentesque nibh velit, vulputate id tristique quis, molestie sed enim. Aliquam nec semper quam. Pellentesque sit amet vehicula diam, vel dapibus neque. Quisque ac vehicula felis. Fusce quis magna nisi. ', '2019-02-02 10:13:32'),
(3, 'Jean Forteroche', 'Nullam odio dui', ' Nulla nec feugiat nunc, vitae luctus dui. Donec vitae odio gravida, ultrices quam a, efficitur lorem. Pellentesque efficitur a nisl at hendrerit. Pellentesque sed purus convallis, cursus leo eget, lacinia arcu. Nulla commodo bibendum felis et sagittis. Suspendisse potenti. Aliquam dignissim nibh a erat feugiat, vel vulputate eros euismod. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam odio dui, ullamcorper eget arcu sed, laoreet sollicitudin lectus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras libero metus, rutrum quis consectetur id, consequat et ipsum. Nullam lacus erat, semper eu risus eget, condimentum bibendum nunc. Nullam mollis sed tortor in hendrerit.\r\n\r\nNullam vehicula, justo nec dapibus malesuada, ante massa ultricies elit, vitae accumsan arcu velit et augue. Morbi finibus nulla eget ipsum mattis, nec consequat risus auctor. Vestibulum in justo et lectus volutpat consequat id id tellus. Sed justo lacus, semper eget congue quis, dignissim eu urna. Etiam nibh tortor, faucibus quis orci a, aliquet sollicitudin neque. Duis iaculis imperdiet ante nec sagittis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin posuere felis purus, nec rutrum nisi vestibulum eu. Phasellus fermentum dolor at tortor ultricies, vitae maximus enim posuere. Morbi a ultricies nunc, id vestibulum neque.\r\n\r\nSed congue pretium ante quis rutrum. Pellentesque scelerisque mi ut tristique ultrices. Donec et enim tellus. Integer sagittis, diam eget posuere imperdiet, nisl eros porta ligula, non luctus nisl neque ut lectus. Nulla hendrerit nisi eu mauris iaculis ultricies. Proin luctus gravida ex aliquet ornare. Duis auctor metus ex, vel semper ipsum dignissim nec. Cras imperdiet dolor ligula, sit amet sagittis tellus aliquet sed. Nullam vehicula eleifend nunc. Nunc vel pulvinar nisi, id interdum nulla. Aliquam at sodales ipsum. Integer tempor, arcu quis viverra accumsan, risus libero cursus risus, vitae vulputate turpis felis vel dui. ', '2019-02-03 15:16:36');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
