
DROP TABLE IF EXISTS `neighborhoods`;
CREATE TABLE `neighborhoods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `city_id` int(11) NOT NULL,
  `enabled` boolean not null,
  PRIMARY KEY (`id`),
  KEY `fk_neighborhood_city` (`city_id`),
  CONSTRAINT `fk_neighborhood_city` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`)
);