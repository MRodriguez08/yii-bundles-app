
DROP TABLE IF EXISTS `property_states`;
CREATE TABLE `property_states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `enabled` boolean not null,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
);