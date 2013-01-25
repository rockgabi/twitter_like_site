/*
SQLyog Ultimate v9.63 
MySQL - 5.5.27 : Database - blackhole_v2
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`blackhole_v2` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `blackhole_v2`;

/*Table structure for table `laravel_migrations` */

DROP TABLE IF EXISTS `laravel_migrations`;

CREATE TABLE `laravel_migrations` (
  `bundle` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`bundle`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `laravel_migrations` */

insert  into `laravel_migrations`(`bundle`,`name`,`batch`) values ('application','2013_01_06_004452_create_users_table',1),('application','2013_01_08_144111_create_resources',1);

/*Table structure for table `resources` */

DROP TABLE IF EXISTS `resources`;

CREATE TABLE `resources` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `resource` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `resources_user_id_foreign` (`user_id`),
  CONSTRAINT `resources_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

/*Data for the table `resources` */

insert  into `resources`(`id`,`time`,`resource`,`created_at`,`updated_at`,`user_id`) values (25,'2013-01-08 18:52:42','Al parecer anda esta aplicación no??','2013-01-08 20:52:43','2013-01-08 20:52:43',2),(28,'2013-01-08 22:41:58','Otro recurso','2013-01-09 00:41:59','2013-01-09 00:41:59',1),(29,'2013-01-13 19:25:42','Este lo dicen dexter','2013-01-13 22:25:43','2013-01-13 22:25:43',1),(30,'2013-01-13 20:35:57','Holu','2013-01-13 23:35:59','2013-01-13 23:35:59',2),(31,'2013-01-14 10:26:01','Hola','2013-01-14 13:26:02','2013-01-14 13:26:02',1);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `password` varchar(64) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`created_at`,`updated_at`) values (1,'Dexter','$2a$08$b0RqdjM4eXBMaDlVUExCbOi1GlJH4DlDvbX/mABbOAp6O4ejRtzGS','2013-01-08 13:40:20','0000-00-00 00:00:00'),(2,'Gabriel','$2a$08$RTZ6TmZuU1o4THdTMTZUVeFNS7jRJhL4Snww4ejrW4hn6XA48rSDa','2013-01-08 20:07:48','2013-01-08 20:07:48');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
