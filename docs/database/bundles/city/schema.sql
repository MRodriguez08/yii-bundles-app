
DROP TABLE IF EXISTS `cities`;
CREATE TABLE `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `department_id` int(11) NOT NULL,
  `enabled` boolean not null,
  PRIMARY KEY (`id`),
  KEY `fk_city_department` (`department_id`),
  CONSTRAINT `fk_city_department` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`)
);