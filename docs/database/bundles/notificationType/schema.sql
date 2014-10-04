
DROP TABLE IF EXISTS `notification_types`;
CREATE TABLE `notification_types` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `description` varchar(512) DEFAULT NULL,
  `enabled` boolean not null,
  PRIMARY KEY (`id`)
);