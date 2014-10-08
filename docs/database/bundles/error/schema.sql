DROP TABLE IF EXISTS `error_log`;
CREATE TABLE `error_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(128) DEFAULT NULL,
  `category` varchar(128) DEFAULT NULL,
  `logtime` datetime DEFAULT NULL,
  `user_ip` varchar(50) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `request_url` text,
  `message` text,
  PRIMARY KEY (`id`)
);