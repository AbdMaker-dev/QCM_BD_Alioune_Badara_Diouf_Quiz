USE `bd_Quiz`;
-- --------------------------------------------------------
INSERT INTO `users` VALUES (null,'Diouf','Alioune Badara','Abd2020','Abd2020','admin','lien_img');
INSERT INTO `users` VALUES (null,'Tine','Moussa','Emt2020','Emt2020','joueur','lien_img');

INSERT INTO `users` VALUES (null,'Admin','Admin','admin','admin','admin','lien_img');
INSERT INTO `users` VALUES (null,'Joueur','Joueur','joueur','joueur','joueur','lien_img');

INSERT INTO `questions` VALUES (1,'Les regions du senegql ?','chm',3);
INSERT INTO `questions` VALUES (2,'Le president du senega ?','chs',4);
INSERT INTO `questions` VALUES (3,'Le langage multiti platforme ?','cht',5);

INSERT INTO `reponses` VALUES (1,'Dakar',1,1);
INSERT INTO `reponses` VALUES (2,'Parie',0,1);
INSERT INTO `reponses` VALUES (3,'Thise',1,1);
INSERT INTO `reponses` VALUES (4,'Macky',1,2);
INSERT INTO `reponses` VALUES (5,'Idy',0,2);
INSERT INTO `reponses` VALUES (6,'Flutter',1,3);

--
-- Base de données :  `bd_Quiz`
--
DROP DATABASE IF EXISTS `bd_Quiz`;
CREATE DATABASE IF NOT EXISTS `bd_Quiz`;
USE `bd_Quiz`;
-- --------------------------------------------------------

--
-- Structure de la table `users`
--
DROP TABLE IF EXISTS `scores`;
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(45) NOT NULL,
  `role` varchar(10) NOT NULL,
  `img` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Structure de la table `scores`
--
CREATE TABLE IF NOT EXISTS `scores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_scores_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Structure de la table `questions`
--
DROP TABLE IF EXISTS `reponses`;
DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` longtext NOT NULL,
  `type` varchar(20) NOT NULL,
  `point` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Structure de la table `reponses`
--
CREATE TABLE IF NOT EXISTS `reponses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reponse` longtext NOT NULL,
  `etat` tinyint(1) NOT NULL,
  `id_questions` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_reponses_questions` FOREIGN KEY (`id_questions`) REFERENCES `questions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
