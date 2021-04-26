SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `continents`;
CREATE TABLE `continents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `anual_adjustment` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `continents` (`id`, `name`, `anual_adjustment`) VALUES
(1,	'América',	4),
(2,	'Europa',	5),
(3,	'Asia',	6),
(4,	'Oceanía',	6),
(5,	'Africa',	5);

DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `continent_id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `countries` (`id`, `continent_id`, `name`) VALUES
(1,	1,	'Chile'),
(2,	1,	'Argentina'),
(3,	1,	'Canadá'),
(4,	1,	'Colombia'),
(5,	2,	'Alemania'),
(6,	2,	'Francia'),
(7,	2,	'España'),
(8,	2,	'Grecia'),
(9,	3,	'India'),
(10,	3,	'Japón'),
(11,	3,	'Corea del Sur'),
(12,	4,	'Australia');

DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `salary` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `employees` (`id`, `country_id`, `first_name`, `last_name`, `salary`) VALUES
(1,	1,	'Pedro',	'Rojas',	2000),
(2,	2,	'Luciano',	'Alessandri',	2100),
(3,	3,	'John',	'Carter',	3050),
(4,	4,	'Alejandra',	'Benavides',	2150),
(5,	5,	'Moritz',	'Baring',	6000),
(6,	6,	'Thierry',	'Henry',	5900),
(7,	7,	'Sergio',	'Ramos',	6200),
(8,	8,	'Nikoleta',	'Kyriakopulu',	7000),
(9,	9,	'Aamir',	'Khan',	2000),
(10,	10,	'Takumi',	'Fujiwara',	5000),
(11,	11,	'Heung-min',	'Son',	5100),
(12,	12,	'Peter',	'Johnson',	6100);

-- 2021-04-25 22:41:06
