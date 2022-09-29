# ************************************************************
# Sequel Ace SQL dump
# Version 20035
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 5.7.39)
# Database: filmcoll
# Generation Time: 2022-09-28 14:50:23 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table filmdistributor
# ------------------------------------------------------------

DROP TABLE IF EXISTS `filmdistributor`;

CREATE TABLE `filmdistributor` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `distributor1` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `filmdistributor` WRITE;
/*!40000 ALTER TABLE `filmdistributor` DISABLE KEYS */;

INSERT INTO `filmdistributor` (`id`, `distributor1`)
VALUES
	(1,'Columbia Pictures'),
	(2,'Warner Bros. Pictures'),
	(3,'Master Movies'),
	(4,'Paramount Pictures'),
	(5,'Sony Pictures Classics');

/*!40000 ALTER TABLE `filmdistributor` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table filmgenre
# ------------------------------------------------------------

DROP TABLE IF EXISTS `filmgenre`;

CREATE TABLE `filmgenre` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `genre1` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `filmgenre` WRITE;
/*!40000 ALTER TABLE `filmgenre` DISABLE KEYS */;

INSERT INTO `filmgenre` (`id`, `genre1`)
VALUES
	(1,'Drama'),
	(2,'Horror'),
	(3,'Romance'),
	(4,'Sci-Fi'),
	(5,'History');

/*!40000 ALTER TABLE `filmgenre` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table filmlanguage
# ------------------------------------------------------------

DROP TABLE IF EXISTS `filmlanguage`;

CREATE TABLE `filmlanguage` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `original_language1` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `filmlanguage` WRITE;
/*!40000 ALTER TABLE `filmlanguage` DISABLE KEYS */;

INSERT INTO `filmlanguage` (`id`, `original_language1`)
VALUES
	(1,'English'),
	(2,'German');

/*!40000 ALTER TABLE `filmlanguage` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table films
# ------------------------------------------------------------

DROP TABLE IF EXISTS `films`;

CREATE TABLE `films` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `genre` int(11) unsigned DEFAULT NULL,
  `original_language` int(11) unsigned DEFAULT NULL,
  `director` varchar(255) DEFAULT NULL,
  `producer` varchar(255) DEFAULT NULL,
  `writer` varchar(255) DEFAULT NULL,
  `release_date_theatres` date DEFAULT NULL,
  `release_date_streaming` date DEFAULT NULL,
  `runtime` int(11) DEFAULT NULL,
  `distributor` int(11) unsigned DEFAULT NULL,
  `img_location` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_films_dist` (`distributor`),
  KEY `fk_films_gen` (`genre`),
  KEY `fk_films_lan` (`original_language`),
  CONSTRAINT `fk_films_dist` FOREIGN KEY (`distributor`) REFERENCES `filmdistributor` (`id`),
  CONSTRAINT `fk_films_gen` FOREIGN KEY (`genre`) REFERENCES `filmgenre` (`id`),
  CONSTRAINT `fk_films_lan` FOREIGN KEY (`original_language`) REFERENCES `filmlanguage` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `films` WRITE;
/*!40000 ALTER TABLE `films` DISABLE KEYS */;

INSERT INTO `films` (`id`, `title`, `genre`, `original_language`, `director`, `producer`, `writer`, `release_date_theatres`, `release_date_streaming`, `runtime`, `distributor`, `img_location`)
VALUES
	(1,'On The Waterfront',1,1,'Elia Kazan','Sam Spiegel','Bud Shulberg','1954-07-28','2001-10-23',108,1,'https://media-cache.cinematerial.com/p/500x/gu8b19pn/on-the-waterfront-movie-poster.jpg?v=1456576295 '),
	(2,'Casablanca\n',1,1,'Michael Curtiz','Hal B. Wallis','Murray Burnett','1943-01-23','1998-11-17',107,2,'https://m.media-amazon.com/images/I/51Qll+H86gL._AC_.jpg'),
	(3,'Night of the Living Dead',2,1,'George A. Romero','Karl Harman','George A. Romero','1968-10-01','2001-03-01',96,3,'https://image.posterlounge.ie/img/products/350000/346541/346541_poster_l.jpg'),
	(4,'Breakfast at Tiffany\'s',3,1,'Blake Edward','Martin Jurow','George Axelrod','1961-10-05','1999-09-21',115,4,'https://i.pinimg.com/564x/b8/78/ed/b878ed49df508a57ebd996efd3a739b4.jpg'),
	(5,'Interstellar',4,1,'Christopher Nolan','Emma Thomas','Jonathan Nolan','2014-11-07','2015-03-31',165,4,'https://m.media-amazon.com/images/I/61ASebTsLpL._AC_SY879_.jpg'),
	(6,'Never Look Away',5,2,'Florian Henckel von Donnersmarck','Jan Mojto','Florian Henckel von Donnersmarck','2018-11-30','2019-06-14',189,5,'https://images-na.ssl-images-amazon.com/images/I/91C0MtutJSL._SX600_.jpg');

/*!40000 ALTER TABLE `films` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
