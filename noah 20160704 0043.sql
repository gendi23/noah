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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_user`
--

/*!40000 ALTER TABLE `data_user` DISABLE KEYS */;
INSERT INTO `data_user` (`id`,`user`,`name`,`last_name`,`cedula`,`country`,`city`,`zone`,`photo`,`bank_name`,`account_type`,`account_number`) VALUES 
 (13,16,'Corporacion Noah',' C.A.','J-145827544','Venezuela','Caracas','Chacao','','Bicentenario','Corriente','412451784421412458412'),
 (14,17,'Corporacion Noah',' C.A.','J-145827544','Venezuela','Caracas','Chacao','','Bicentenario','Corriente','412451784421412458412'),
 (15,18,'Corporacion Noah',' C.A.','J-145827544','Venezuela','Caracas','Chacao','','Bicentenario','Corriente','412451784421412458412'),
 (16,19,'Corporacion Noah',' C.A.','J-145827544','Venezuela','Caracas','Chacao','','Bicentenario','Corriente','412451784421412458412'),
 (17,20,'Wiljac','Aular','19960100','Venezuela','Santa Teresa del Tuy','Inavy','/front/img/user/20/photo-20.jpg','Nacional de Credito','Corriente','12345678912345678912'),
 (18,21,'Genesis','diaz','21089539','Venezuela','Caracas','Baruta','/front/img/user/21/photo-21.png','Provincial','Corriente','1245178459635214587521');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `deposit`
--

/*!40000 ALTER TABLE `deposit` DISABLE KEYS */;
INSERT INTO `deposit` (`id`,`user`,`level`,`status`,`amount`,`date_deposit`,`photo`,`referencer_number`) VALUES 
 (4,21,0,1,1000,'2016-06-20','/front/img/deposit/21/e854521811558.42','e854521811558'),
 (5,21,1,1,800,'2016-06-23','/front/img/deposit/21/y87854218211.42','y87854218211');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `level`
--

/*!40000 ALTER TABLE `level` DISABLE KEYS */;
INSERT INTO `level` (`id`,`user`,`level`,`status`) VALUES 
 (2,20,4,0),
 (3,21,2,0),
 (4,22,1,0),
 (5,23,1,0);
/*!40000 ALTER TABLE `level` ENABLE KEYS */;


--
-- Definition of table `publicity`
--

DROP TABLE IF EXISTS `publicity`;
CREATE TABLE `publicity` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(200) NOT NULL,
  `url` text NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publicity`
--

/*!40000 ALTER TABLE `publicity` DISABLE KEYS */;
INSERT INTO `publicity` (`id`,`name`,`url`,`level`) VALUES 
 (2,'Prueba','https://asktom.oracle.com/pls/asktom/f%3Fp%3D100:11:0::::P11_QUESTION_ID:1675747400346669051',1),
 (3,'Prueba3','http://www.jqueryscript.net/time-clock/Attractive-jQuery-Circular-Countdown-Timer-Plugin-TimeCircles.html',1),
 (4,'Telefonos amazon','https://www.amazon.com/s/ref=sr_1_1_hso_sc_smartcategory_2?rh=n%3A2335752011%2Ck%3Aphones&keywords=phones&ie=UTF8&qid=1466187515&sr=8-1-acs',1);
/*!40000 ALTER TABLE `publicity` ENABLE KEYS */;


--
-- Definition of table `publicity_user`
--

DROP TABLE IF EXISTS `publicity_user`;
CREATE TABLE `publicity_user` (
  `id` int(11) NOT NULL auto_increment,
  `user` int(11) NOT NULL,
  `publicity` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `user` (`user`),
  KEY `publicity` (`publicity`),
  CONSTRAINT `publicity_user_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id`),
  CONSTRAINT `publicity_user_ibfk_2` FOREIGN KEY (`publicity`) REFERENCES `publicity` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publicity_user`
--

/*!40000 ALTER TABLE `publicity_user` DISABLE KEYS */;
INSERT INTO `publicity_user` (`id`,`user`,`publicity`,`status`) VALUES 
 (1,20,2,1);
/*!40000 ALTER TABLE `publicity_user` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`,`user`,`pass`,`token`,`email`,`phone`,`patrocinator`,`status`) VALUES 
 (16,'NOAH1','noah','njjksdfsdf55sdf55sd55','wiljacaular@gmail.com','04155555555','no',1),
 (17,'NOAH2','noah','njjksdfsdf55sdf55sd55','wiljacaular@gmail.com','04155555555','NOAH1',1),
 (18,'NOAH3','noah','njjksdfsdf55sdf55sd55','wiljacaular@gmail.com','04155555555','NOAH2',1),
 (19,'NOAH4','noah','njjksdfsdf55sdf55sd55','wiljacaular@gmail.com','04155555555','NOAH3',1),
 (20,'Wiljac','123456789','7d39f026f1edca72e6f5a82f79336f92','wiljacaular@gmail.com','04269138817','NOAH4',1),
 (21,'genesis','123456789','289ffeb2a745ccf51ca89a297f47e382','wiljacaular@gmail.com','5555555','Wiljac',1),
 (22,'Wiljac24','123456','a841c5c7158bd88fad1fab18f7b854f9','wiljacaular@gmail.com','04269138817','genesis',1),
 (23,'Test45','123456','fee43a4c9d88769e14ec6a1d8b80f2e7','wiljacaular@gmail.com','4078518200','Wiljac24',1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
