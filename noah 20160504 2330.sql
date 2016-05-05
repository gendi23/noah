-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.0.51b-community-nt


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema noah
--

CREATE DATABASE IF NOT EXISTS noah;
USE noah;

--
-- Definition of table `data_user`
--

DROP TABLE IF EXISTS `data_user`;
CREATE TABLE `data_user` (
  `id` int(11) NOT NULL auto_increment,
  `user` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `country` varchar(30) default NULL,
  `city` varchar(30) NOT NULL,
  `zone` varchar(30) NOT NULL,
  `photo` varchar(200) default NULL,
  `bank_name` varchar(200) NOT NULL,
  `account_type` varchar(50) NOT NULL,
  `account_number` varchar(200) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `user` (`user`),
  CONSTRAINT `data_user_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_user`
--

/*!40000 ALTER TABLE `data_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `data_user` ENABLE KEYS */;


--
-- Definition of table `deposit`
--

DROP TABLE IF EXISTS `deposit`;
CREATE TABLE `deposit` (
  `id` int(11) NOT NULL auto_increment,
  `user` int(11) NOT NULL,
  `level` int(11) default NULL,
  `status` int(11) NOT NULL default '0',
  `amount` int(11) NOT NULL,
  `date_deposit` date NOT NULL,
  `photo` varchar(100) default NULL,
  `referencer_number` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `user` (`user`),
  CONSTRAINT `deposit_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `deposit`
--

/*!40000 ALTER TABLE `deposit` DISABLE KEYS */;
/*!40000 ALTER TABLE `deposit` ENABLE KEYS */;


--
-- Definition of table `level`
--

DROP TABLE IF EXISTS `level`;
CREATE TABLE `level` (
  `id` int(11) NOT NULL auto_increment,
  `user` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `status` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `user` (`user`),
  CONSTRAINT `level_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `level`
--

/*!40000 ALTER TABLE `level` DISABLE KEYS */;
/*!40000 ALTER TABLE `level` ENABLE KEYS */;


--
-- Definition of table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(11) NOT NULL auto_increment,
  `role` int(11) NOT NULL,
  `parent` int(11) default NULL,
  `level` int(11) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `unique_role` (`role`),
  CONSTRAINT `role_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

/*!40000 ALTER TABLE `role` DISABLE KEYS */;
/*!40000 ALTER TABLE `role` ENABLE KEYS */;


--
-- Definition of table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `id` int(11) NOT NULL auto_increment,
  `role` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `role` (`role`),
  KEY `user` (`user`),
  CONSTRAINT `role_user_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`id`),
  CONSTRAINT `role_user_ibfk_2` FOREIGN KEY (`user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role_user`
--

/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;


--
-- Definition of table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL auto_increment,
  `user` varchar(30) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `token` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(30) default NULL,
  `patrocinator` varchar(30) NOT NULL,
  `status` int(11) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `user` (`user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`,`user`,`pass`,`token`,`email`,`phone`,`patrocinator`,`status`) VALUES 
 (1,'Wiljac','wilderyut','7d39f026f1edca72e6f5a82f79336f92','wiljacaular@gmail.com','04269138817','Abc512',NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
