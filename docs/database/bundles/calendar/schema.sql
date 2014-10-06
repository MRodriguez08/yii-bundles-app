
DROP TABLE IF EXISTS `calendar`;
CREATE TABLE `calendar` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `body` varchar(1024) NOT NULL,
  `start` bigint NOT NULL,
  `end` bigint NOT NULL,
  `user_id` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_calendar_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`nick`)
);