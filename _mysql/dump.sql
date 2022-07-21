/*
SQLyog Community v13.1.5  (64 bit)
MySQL - 5.7.31-0ubuntu0.18.04.1 : Database - contatoseguro
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `empresa` */

DROP TABLE IF EXISTS `empresa`;

CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `dt_hr` datetime DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `cnpj` varchar(255) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `numero` varchar(40) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `cep` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `empresa` */

insert  into `empresa`(`id_empresa`,`dt_hr`,`nome`,`cnpj`,`endereco`,`numero`,`cidade`,`cep`) values 
(1,'2022-07-20 23:20:55','1111111111111','21.212.121/2121-22','endereco','234123','franca','22222-222'),
(2,'2022-07-20 23:20:58','222222222222','41.414.141/4141-44','endereco','234123','franca','22222-222'),
(3,'2022-07-20 23:20:13','333333333333333','41.414.141/4141-44','','','',''),
(4,'2022-07-20 23:20:18','4444444444444444444444','51.515.151/5151-55','','','',''),
(5,'2022-07-20 23:29:13','5555555555555','51.515.151/5151-55','','','','');

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `dt_hr` datetime DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefone` varchar(255) DEFAULT NULL,
  `dt_nascimento` date DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;

/*Data for the table `usuario` */

insert  into `usuario`(`id_usuario`,`dt_hr`,`nome`,`email`,`telefone`,`dt_nascimento`,`cidade`) values 
(99,'2022-07-20 23:29:08','aaaaaaaaaa','vbarsoteli@gmail.com','22-22222-2222',NULL,'AAAAAAAAAAAAA'),
(101,'2022-07-20 23:28:59','JOAO DA SILVA','joao@teste.com.br','',NULL,'');

/*Table structure for table `usuario_empresa_relacionamento` */

DROP TABLE IF EXISTS `usuario_empresa_relacionamento`;

CREATE TABLE `usuario_empresa_relacionamento` (
  `id_usuario_empresa_relacionamento` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `dt_hr` datetime DEFAULT NULL,
  PRIMARY KEY (`id_usuario_empresa_relacionamento`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_empresa` (`id_empresa`),
  CONSTRAINT `usuario_empresa_relacionamento_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `usuario_empresa_relacionamento_ibfk_2` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

/*Data for the table `usuario_empresa_relacionamento` */

insert  into `usuario_empresa_relacionamento`(`id_usuario_empresa_relacionamento`,`id_usuario`,`id_empresa`,`dt_hr`) values 
(15,99,4,NULL),
(16,99,2,NULL),
(17,99,1,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
