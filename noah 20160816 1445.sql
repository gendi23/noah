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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

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
 (18,21,'Genesis','diaz','21089539','Venezuela','Caracas','Baruta','/front/img/user/21/photo-21.png','Provincial','Corriente','1245178459635214587521'),
 (19,22,'Test','Will','15852','Venezuela','Caracas','ljkdf',NULL,'BNC','Corriente','1111111111111111111'),
 (20,23,'Pepito','Petre','1684654','Venezuela','Caracas','ljkdf','/front/img/user/21/photo-21.png','BNC','Corriente','1111111111111111111'),
 (21,24,'Juan','Camuai','124522','Venezuela','Caracas','ljkdf','/front/img/user/21/photo-21.png','BNC','Corriente','1111111111111111111');
/*!40000 ALTER TABLE `data_user` ENABLE KEYS */;


--
-- Definition of trigger `update_status_user`
--

DROP TRIGGER /*!50030 IF EXISTS */ `update_status_user`;

DELIMITER $$

CREATE DEFINER = `root`@`localhost` TRIGGER `update_status_user` AFTER INSERT ON `data_user` FOR EACH ROW begin
    update user set status=1 where id = new.user;
end $$

DELIMITER ;

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `deposit`
--

/*!40000 ALTER TABLE `deposit` DISABLE KEYS */;
INSERT INTO `deposit` (`id`,`user`,`level`,`status`,`amount`,`date_deposit`,`photo`,`referencer_number`) VALUES 
 (4,21,0,1,1000,'2016-06-20','/front/img/deposit/21/e854521811558.42','e854521811558'),
 (5,21,1,1,800,'2016-06-23','/front/img/deposit/21/y87854218211.42','y87854218211'),
 (6,22,0,1,1000,'2016-07-07','/front/img/deposit/22/15454.43','15454'),
 (7,20,1,1,8000,'2016-07-07','/front/img/deposit/22/15454.43','dfgdf'),
 (9,22,2,1,1500,'2016-07-07','/front/img/deposit/22/15454.43','2123456'),
 (12,23,3,1,1500,'2016-07-15','/front/img/deposit/22/15454.43','sdfaas'),
 (13,20,2,1,1500,'2016-08-01','/front/img/deposit/22/15454.43','fgsddgfhfdhb54'),
 (14,21,2,1,1500,'2016-08-01','/front/img/deposit/22/15454.43','sdgfasd564');
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
 (2,20,3,0),
 (3,21,1,0),
 (4,22,1,0),
 (5,23,1,0);
/*!40000 ALTER TABLE `level` ENABLE KEYS */;


--
-- Definition of table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `id` int(11) NOT NULL auto_increment,
  `message` text NOT NULL,
  `color` varchar(100) default '#000',
  `type` varchar(100) default NULL,
  `size` int(11) default '14',
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` (`id`,`message`,`color`,`type`,`size`,`date`) VALUES 
 (1,'Nuevo mensaje de prueba','#000000','',14,'2016-08-15 11:30:27'),
 (3,'Otro mensaje de prueba para NOAH','#4461ea','TAHOMA',14,'2016-08-15 11:32:19'),
 (4,'Otro mensaje nuevo','#db3302','Arial',24,'2016-08-15 16:09:45');
/*!40000 ALTER TABLE `message` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publicity`
--

/*!40000 ALTER TABLE `publicity` DISABLE KEYS */;
INSERT INTO `publicity` (`id`,`name`,`url`,`level`) VALUES 
 (2,'Prueba','https://asktom.oracle.com/pls/asktom/f%3Fp%3D100:11:0::::P11_QUESTION_ID:1675747400346669051',1),
 (3,'Prueba3','http://www.jqueryscript.net/time-clock/Attractive-jQuery-Circular-Countdown-Timer-Plugin-TimeCircles.html',1),
 (4,'Telefonos amazon','https://www.amazon.com/s/ref=sr_1_1_hso_sc_smartcategory_2?rh=n%3A2335752011%2Ck%3Aphones&keywords=phones&ie=UTF8&qid=1466187515&sr=8-1-acs',1),
 (5,'Actualidad rt','https://actualidad.rt.com/',1),
 (6,'Parranda de San Pedro','https://es.wikipedia.org/wiki/Parranda_de_San_Pedro',1),
 (7,'Diablos danzantes de Yare','https://es.wikipedia.org/wiki/Diablos_danzantes_de_Yare',1),
 (8,'Estudio de cine: Enfoque creativo ','http://enfoquecreativostudio.blogspot.com/',1),
 (9,'Venezuelatuya','http://www.venezuelatuya.com/caracas/galeriaartenacional.htm',1),
 (10,'Televisión internacional de la Federación de Rusia','https://actualidad.rt.com/',1),
 (11,'enfoque creativo studio','http://enfoquecreativostudio.blogspot.com/',1),
 (12,'Vivanuncios','http://www.vivanuncios.com.mx/',1),
 (13,'Bumeran','http://www.bumeran.com.ve/',1),
 (14,'Catia TVe','https://es.wikipedia.org/wiki/Catia_TVe',1),
 (15,'Ultimas noticias','http://www.ultimasnoticias.com.ve/',1),
 (16,'La Vinotinto','http://www.lavinotinto.com/',1),
 (17,'Vive','http://www.vive.gob.ve/',1),
 (18,'Yo creo en Venezuela','http://www.entornointeligente.com/articulo/8558584/Alex-Luis-Oberto--VENEZUELA-Paiacute;ses-del-mundo-promocionan-etiqueta-',1),
 (19,'Crecimiento Personal','http://www.actualidad-24.com/2010/10/crecimiento-personal-autoayuda.html',1),
 (20,'Tu éxito no depende de tu estado de animo - Alex Dey','https://www.youtube.com/watch?v=HbVOVcNK2P8',1),
 (21,'Biografia de Robert T Kiyosaki','http://www.economia.com.mx/biografia_de_robert_t_kiyosaki.htm',1),
 (22,'http://www.elresumen.com/libros/padre_rico_padre_pobre.htm','Resumen de Padre Rico, Padre Pobre.',1),
 (23,'Cuadrante del flujo del dinero.','http://2.bp.blogspot.com/-5zekHDYwuHg/VNqTcKBEK8I/AAAAAAAAS6E/Xx30geWL_q4/s1600/Cuadrante-del-Flujo-del-Dinero.png',1),
 (24,'Bancoex','http://www.bancoex.gob.ve/',1),
 (25,'The Gnomon Workshop.','https://www.thegnomonworkshop.com/',1),
 (26,'Open English','http://www.openenglish.com/en/',1),
 (27,'CRECIMIENTO ENDÓGENO','http://www.eumed.net/cursecon/libreria/2004/mca/endogeno.htm',1),
 (28,'mercadolibre','http://www.mercadolibre.com.ve/',1),
 (29,'emprendovenezuela','http://www.emprendovenezuela.net/2015/02/el-cuadrante-del-flujo-de-dinero-de.html',1),
 (30,'Programación neurolingüística','https://es.wikipedia.org/wiki/Programaci%C3%B3n_neuroling%C3%BC%C3%ADstica',1),
 (31,'cheryvenezuela','http://www.cheryvenezuela.com/Chery_Vzla.php',1),
 (32,'OLX','https://www.olx.com.ve/',1),
 (33,'Flor_de_Venezuela','https://es.wikipedia.org/wiki/Flor_de_Venezuela',1),
 (34,'Agencia_Bolivariana_para_Actividades_Espaciales','https://es.wikipedia.org/wiki/Agencia_Bolivariana_para_Actividades_Espaciales',1),
 (35,'movilnet','http://www.movilnet.com.ve/sitio/',1),
 (36,'cantv','http://www.cantv.com.ve/',1),
 (37,'telesurtv','http://www.telesurtv.net/',1),
 (38,'afida','http://www.afida24-7.org/',1),
 (39,'caf','https://www.caf.com/',1),
 (40,'UFI','http://www.ufi.org/',1),
 (41,'hinterlaces','http://www.hinterlaces.com/',1),
 (42,'Pro Ecuador','http://www.proecuador.gob.ec/',1),
 (43,'Teleferico de Merida','http://www.telefericodemerida.travel/',1),
 (44,'Banco del libro','http://www.bancodellibro.org/',1),
 (45,'Chocolates St. Moritz','http://chocolatesstmoritz.com/',1),
 (46,'Corporacion Noah','www.corporacionnoah.com.ve',1),
 (47,'Oracle','https://asktom.oracle.com/pls/asktom/f?p=100:1:14731423456580',1),
 (48,'TRIVAGO','http://www.trivago.com/',1),
 (49,'blogylana','http://www.blogylana.com/los-9-consejos-que-no-recomiendo-de-robert-kiyosak/',1),
 (50,'Enfoque creativo studio','http://enfoquecreativostudio.blogspot.com/',1),
 (51,'Vivanuncios','http://www.vivanuncios.com.mx/',1),
 (52,'Blogylana','http://www.blogylana.com/comienza-aqui/',1),
 (53,'Vvilla del cine','http://villadelcine.gob.ve/',1),
 (54,'Diablos_danzantes_de_Yare','https://es.wikipedia.org/wiki/Diablos_danzantes_de_Yare',1),
 (55,'Parranda_de_San_Pedro','https://es.wikipedia.org/wiki/Parranda_de_San_Pedro',1),
 (56,'enfoquecreativostudio','http://enfoquecreativostudio.blogspot.com/',1),
 (57,'Blogylana','http://www.blogylana.com/comienza-aqui/',1);
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
  `level` int(11) NOT NULL default '1',
  `date` date default NULL,
  PRIMARY KEY  (`id`),
  KEY `user` (`user`),
  KEY `publicity` (`publicity`),
  CONSTRAINT `publicity_user_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id`),
  CONSTRAINT `publicity_user_ibfk_2` FOREIGN KEY (`publicity`) REFERENCES `publicity` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publicity_user`
--

/*!40000 ALTER TABLE `publicity_user` DISABLE KEYS */;
INSERT INTO `publicity_user` (`id`,`user`,`publicity`,`status`,`level`,`date`) VALUES 
 (1,20,2,1,1,'2016-07-14'),
 (2,20,2,1,1,'2016-07-14'),
 (15,20,2,1,1,'2016-07-14'),
 (17,20,2,1,1,'2016-07-14'),
 (18,20,2,1,2,'2016-07-14'),
 (19,20,2,1,2,'2016-07-14'),
 (20,20,2,1,2,'2016-07-14'),
 (21,20,2,1,2,'2016-07-14'),
 (22,20,2,1,2,'2016-07-14'),
 (23,20,2,1,3,'2016-07-14'),
 (24,20,3,1,3,'2016-07-15'),
 (25,21,2,1,1,'2016-08-01'),
 (26,20,4,1,3,'2016-08-01'),
 (27,21,4,1,1,'2016-08-01'),
 (28,21,3,1,1,'2016-08-01');
/*!40000 ALTER TABLE `publicity_user` ENABLE KEYS */;


--
-- Definition of trigger `set_level`
--

DROP TRIGGER /*!50030 IF EXISTS */ `set_level`;

DELIMITER $$

CREATE DEFINER = `root`@`localhost` TRIGGER `set_level` AFTER INSERT ON `publicity_user` FOR EACH ROW BEGIN
    DECLARE count_level int;
    DECLARE num_level int;

    select count(*) INTO count_level from publicity_user pu where pu.user= new.user and pu.level=new.level;
    IF new.level=1 THEN set num_level=4;
    ELSEIF new.level=2 THEN set num_level=5;
    ELSEIF new.level=3 THEN set num_level=6;
    ELSEIF new.level=4 THEN set num_level=7;
    END IF ;

    IF count_level=num_level THEN
      UPDATE level SET level = level+(1) WHERE user= new.user;
    END IF ;
  END $$

DELIMITER ;

--
-- Definition of table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `id` int(11) NOT NULL auto_increment,
  `role` varchar(100) NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `user` (`user`),
  CONSTRAINT `role_user_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_user`
--

/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` (`id`,`role`,`user`) VALUES 
 (1,'admin',16),
 (2,'admin',17),
 (3,'admin',18),
 (4,'admin',19);
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
  `role` varchar(100) NOT NULL,
  `date` time default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `user` (`user`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`,`user`,`pass`,`token`,`email`,`phone`,`patrocinator`,`status`,`role`,`date`) VALUES 
 (16,'NOAH1','noah','njjksdfsdf55sdf55sd55','wiljacaular@gmail.com','04155555555','no',1,'admin',NULL),
 (17,'NOAH2','noah','njjksdfsdf55sdf55sd55','wiljacaular@gmail.com','04155555555','NOAH1',1,'admin',NULL),
 (18,'NOAH3','noah','njjksdfsdf55sdf55sd55','wiljacaular@gmail.com','04155555555','NOAH2',1,'admin',NULL),
 (19,'NOAH4','noah','njjksdfsdf55sdf55sd55','wiljacaular@gmail.com','04155555555','NOAH3',1,'admin',NULL),
 (20,'Wiljac','123456789','7d39f026f1edca72e6f5a82f79336f92','wiljacaular@gmail.com','04269138817','NOAH4',1,'',NULL),
 (21,'genesis','123456789','289ffeb2a745ccf51ca89a297f47e382','wiljacaular@gmail.com','5555555','Wiljac',1,'',NULL),
 (22,'Wiljac24','123456','a841c5c7158bd88fad1fab18f7b854f9','wiljacaular@gmail.com','04269138817','genesis',1,'',NULL),
 (23,'Test45','123456','fee43a4c9d88769e14ec6a1d8b80f2e7','wiljacaular@gmail.com','4078518200','Wiljac24',1,'',NULL),
 (24,'juan','123456','fee43a4c9d88769e14ec6a1d8b80f2e7','wiljacaular@gmail.com','4078518200','Test45',1,'',NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;


--
-- Definition of table `user_matriz`
--

DROP TABLE IF EXISTS `user_matriz`;
CREATE TABLE `user_matriz` (
  `id` int(11) NOT NULL auto_increment,
  `user` int(11) NOT NULL,
  `count` int(11) NOT NULL default '0',
  `create_date` datetime default NULL,
  `update_date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  KEY `user` (`user`),
  CONSTRAINT `user_matriz_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_matriz`
--

/*!40000 ALTER TABLE `user_matriz` DISABLE KEYS */;
INSERT INTO `user_matriz` (`id`,`user`,`count`,`create_date`,`update_date`) VALUES 
 (1,20,35,'2016-08-15 15:37:20','2016-08-15 17:10:24');
/*!40000 ALTER TABLE `user_matriz` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
