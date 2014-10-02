DROP TABLE IF EXISTS `sysparams`;
CREATE TABLE `sysparams` (
  `name` varchar(64) NOT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `value` varchar(512) NOT NULL,
  `type` varchar(64) NOT NULL,
  `visible` boolean NOT NULL,
  `editable` boolean NOT NULL,
  PRIMARY KEY (`name`)
);