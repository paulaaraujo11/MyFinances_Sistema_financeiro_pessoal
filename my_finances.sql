/*
SQLyog Ultimate v12.14 (64 bit)
MySQL - 10.1.38-MariaDB : Database - my_finance
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`my_finance` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `my_finance`;

/*Table structure for table `contas` */

DROP TABLE IF EXISTS `contas`;

CREATE TABLE `contas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) NOT NULL,
  `saldo_inicial` decimal(10,2) DEFAULT '0.00',
  `visivel` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

/*Data for the table `contas` */

insert  into `contas`(`id`,`descricao`,`saldo_inicial`,`visivel`) values (1,'Corrente Bradesco','2000.59',0),(2,'Poupança Caixa','500000.10',NULL),(3,'Corrente Bradesco','2000.50',NULL),(4,'Poupança Caixa','500000.00',0),(5,'jug','2.20',0),(12,'cythgi','0.00',0),(13,'bio','0.00',0),(14,'','0.00',0),(15,'','0.00',0),(16,'','0.00',0),(17,'nsididfd','20.50',NULL),(18,'','0.00',0),(19,'484','0.00',NULL),(20,'conta1','0.00',0),(21,'ffg','0.00',NULL),(22,'conta a','1000.00',NULL),(23,'conta 2','20000.00',NULL),(24,'frifunrf','0.00',NULL),(25,'ffg','0.00',NULL),(26,'','0.00',NULL),(27,'','0.00',NULL),(28,'','0.00',NULL),(29,'dfruirgv','112.22',NULL),(30,'dfruirgv','2000.50',NULL),(31,'dfruirgv','12.00',NULL),(32,'frgrgr','12.00',NULL),(33,'e3rbefjf','2000.00',NULL),(34,'dfruirgv','2000.50',NULL),(35,'484','2000.00',NULL),(36,'Conta Itau se','900000.00',0),(37,'ewfderfrgver','1.00',0),(38,'Conta Pop','0.00',0),(39,'Conta Poupança','0.50',0),(40,'Conta Bradesco','500000.10',0),(41,'Caixa','0.00',0),(42,'conya','2000.50',0),(43,'dfruirgv','2000.50',0),(44,'','0.00',0),(45,'','0.00',0),(46,'484','2000.00',0),(47,'','0.00',0),(48,'','0.00',0),(49,'','0.00',0),(50,'','0.00',0),(51,'','0.00',0),(52,'','0.00',0),(53,'','0.00',0),(54,'','0.00',0),(55,'Bradesco','123.00',0),(56,'Santander','0.60',0),(57,'Itaú','0.00',0),(58,'Nubank','26000.99',0),(59,'dfruirgv','112.22',0),(60,'Conta 1','123.00',0),(61,'conta 2','2000.00',0),(62,'dfruirgv','2000.50',0),(63,'bio','123.00',0),(64,'dfruirgv','2000.00',0),(65,'Caixa Econômica','20000.90',0),(66,'AAAAA','5000.00',1),(67,'BRADESCO','1500.00',1);

/*Table structure for table `movimentacao` */

DROP TABLE IF EXISTS `movimentacao`;

CREATE TABLE `movimentacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) DEFAULT NULL,
  `conta_id` int(11) DEFAULT NULL,
  `tipo_movimentacao_id` int(11) DEFAULT NULL,
  `valor` decimal(10,0) NOT NULL,
  `data_movimentacao` datetime NOT NULL,
  `visivel` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `tipo_movimentacao_id` (`tipo_movimentacao_id`),
  KEY `conta_id` (`conta_id`),
  CONSTRAINT `movimentacao_ibfk_1` FOREIGN KEY (`tipo_movimentacao_id`) REFERENCES `tipo_movimentacao` (`id`),
  CONSTRAINT `movimentacao_ibfk_2` FOREIGN KEY (`conta_id`) REFERENCES `contas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

/*Data for the table `movimentacao` */

insert  into `movimentacao`(`id`,`descricao`,`conta_id`,`tipo_movimentacao_id`,`valor`,`data_movimentacao`,`visivel`) values (1,'yetyu',41,1,'9','2012-02-14 00:00:00',0),(2,'DESPESA',56,1,'9','2012-02-14 00:00:00',0),(10,'Movimentacao 1',41,2,'1584764','2019-10-06 00:00:00',0),(11,'kuykuk',55,2,'1584764','2019-10-01 00:00:00',0),(12,'gerter',41,1,'64496','1990-05-12 00:00:00',0),(13,'jtyjtyj',55,1,'1584764','0000-00-00 00:00:00',0),(14,'deposito conta 21',55,1,'1501','1997-12-02 00:00:00',0),(15,'deposito',2,NULL,'13','2019-10-14 00:00:00',1),(16,'Saque',2,NULL,'2500','2019-09-12 00:00:00',1),(17,'hetyth',1,NULL,'64496','2019-10-07 00:00:00',1),(18,'hethe',1,NULL,'25','2019-10-01 00:00:00',1),(19,'ht',41,1,'9','2019-10-08 00:00:00',0),(20,'conta1',41,1,'25','2019-10-05 00:00:00',0),(21,'Saque',55,1,'6001','2019-10-14 00:00:00',0),(22,'dfruirgv',41,1,'64496','2019-10-07 00:00:00',0),(23,'Saque',55,2,'7000','2019-10-11 00:00:00',0),(24,'nsididfd',55,1,'64496','0000-00-00 00:00:00',0),(25,'484',57,2,'25','2019-10-15 00:00:00',0),(26,'saque',56,1,'9','2019-10-08 00:00:00',0),(27,'yhty45y',56,1,'22','2019-10-15 00:00:00',0),(28,'dfruirgv',60,1,'25','2019-10-14 00:00:00',0),(29,'dfruirgv',61,1,'9','2019-10-12 00:00:00',0),(30,'efdweg34g',63,1,'64496','2019-10-13 00:00:00',0),(31,'dfruirgv',63,1,'64496','2019-10-07 00:00:00',0),(32,'Saque',65,2,'2000','2019-10-15 00:00:00',0),(33,'Deposito',65,1,'250000','2019-10-15 00:00:00',0),(34,'Compra Notebook',66,2,'3000','2019-08-07 00:00:00',1),(35,'Manutenção carro',66,2,'500','2019-10-14 00:00:00',1),(36,'13° de 2019',67,1,'999','2019-10-15 00:00:00',1),(37,'Extra freelancer',66,1,'1000','2019-10-17 00:00:00',1),(38,'Dentista',66,2,'100','2019-10-25 00:00:00',1);

/*Table structure for table `tipo_movimentacao` */

DROP TABLE IF EXISTS `tipo_movimentacao`;

CREATE TABLE `tipo_movimentacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL,
  `visivel` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tipo_movimentacao` */

insert  into `tipo_movimentacao`(`id`,`descricao`,`visivel`) values (1,'RECEITA',1),(2,'DESPESA',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
