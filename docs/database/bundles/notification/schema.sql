SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `notification_types`;
CREATE TABLE `notification_types` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `description` varchar(512) DEFAULT NULL,
  `enabled` boolean not null,
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `notification_states`;
CREATE TABLE `notification_states` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `description` varchar(512) DEFAULT NULL,
  `enabled` boolean not null,
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS notifications;
CREATE TABLE  notifications (
    id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    datetimesent datetime not null,
    message varchar(2048) not null,
    type_id bigint(20) not null,
    state_id bigint(20) not null,
    clientemail varchar(64) not null,
    clientname varchar(64) null,
    clienttelephonenumber varchar(64) null,
    CONSTRAINT fk_notification_type FOREIGN KEY (type_id) REFERENCES notification_types (id),
    CONSTRAINT fk_notification_state FOREIGN KEY (state_id) REFERENCES notification_states (id)
);

SET FOREIGN_KEY_CHECKS=1;