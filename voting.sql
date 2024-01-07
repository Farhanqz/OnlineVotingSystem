/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.6.5-MariaDB : Database - voting
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `role` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `votegiven` int(1) DEFAULT 0,
  `votes` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user` */

insert  into `user`(`id`,`name`,`mobile`,`password`,`address`,`photo`,`role`,`status`,`votegiven`,`votes`) values 
(1,'Mohammad',9555,'123','Pulia No. 9','logo_new.png',1,1,2,0),
(2,'Tabrez',9512,'123','Pulia No. 9','logo_new.png',2,0,0,9),
(3,'Farhan',4433,'123','Pulia No. 9','logo_new.png',2,1,0,12),
(4,'Aariz',89899,'1234','Pulia No. 9','logo_new.png',2,0,0,0),
(5,'Rahul',565656,'12345','Pulia No. 9','logo_new.png',2,0,0,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
