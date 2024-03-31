-- Adminer 4.8.1 MySQL 8.0.16 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `php-proiect` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `php-proiect`;

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE `reviews` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `movie_id` bigint(20) unsigned NOT NULL,
  `full_name` tinytext NOT NULL,
  `email` varchar(100) NOT NULL,
  `review` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `reviews` (`id`, `movie_id`, `full_name`, `email`, `review`) VALUES
(1,	121,	'Musatoiu Iulian Gabriel',	'musatoiuiulian@gmail.com',	' \r\n             IMI PLACE           ');

-- 2022-05-04 12:05:39
