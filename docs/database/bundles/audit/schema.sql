
DROP TABLE IF EXISTS `audit`;
CREATE TABLE `audit` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `date_time` bigint NOT NULL,
  `object` varchar(100) NOT NULL,
  `operation` varchar(100) NOT NULL,
  `description` varchar(512) DEFAULT NULL,
  `user` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
);