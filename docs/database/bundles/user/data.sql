INSERT INTO `AuthItem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES ('administrativo',2,'','','');
INSERT INTO `AuthItem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES ('agente',2,'','','');
INSERT INTO `AuthItem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES ('director',2,'','','');

INSERT INTO `AuthAssignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES ('administrativo','msteffen',NULL,NULL);
INSERT INTO `AuthAssignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES ('administrativo','mterra',NULL,NULL);
INSERT INTO `AuthAssignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES ('agente','esilvera',NULL,NULL);
INSERT INTO `AuthAssignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES ('agente','Felipe',NULL,NULL);
INSERT INTO `AuthAssignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES ('director','afontes','','');
INSERT INTO `AuthAssignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES ('director','mrodriguez','','');
INSERT INTO `AuthAssignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES ('director','pdesosa','','');

INSERT INTO `users` (`nick`, `email`, `password`, `name`, `surname`, `last_login`, `enabled`, `role`) VALUES ('afontes','director@php2014.com','$1$Tjv7tqTJ$.O.123LlOlq6FnNFM7LN8.','Alejandro','Fontes',NULL,1,'director');
INSERT INTO `users` (`nick`, `email`, `password`, `name`, `surname`, `last_login`, `enabled`, `role`) VALUES ('esilvera','esilvera@gmail.com','$1$Boc57cpX$6tmkQMcqgWV3G4Ho/rNu/0','Edwin','Silvera',NULL,NULL,'agente');
INSERT INTO `users` (`nick`, `email`, `password`, `name`, `surname`, `last_login`, `enabled`, `role`) VALUES ('Felipe','fefo@gmail.com','$1$AiJV/Y9t$8RxZyR8E7Z./bipquF4m0/','Felipe','Cardozo',NULL,NULL,'agente');
INSERT INTO `users` (`nick`, `email`, `password`, `name`, `surname`, `last_login`, `enabled`, `role`) VALUES ('mrodriguez','mrodriguez@gmail.com','$1$UQuRVKk0$wUrX3YsP6/bxHFKToL.7i.','Mauricio','Rodriguez',NULL,NULL,'director');
INSERT INTO `users` (`nick`, `email`, `password`, `name`, `surname`, `last_login`, `enabled`, `role`) VALUES ('msteffen','msteffen@gmail.com','msteffen','Mauro','Steffen',NULL,NULL,'administrativo');
INSERT INTO `users` (`nick`, `email`, `password`, `name`, `surname`, `last_login`, `enabled`, `role`) VALUES ('mterra','mterra@gmail.com','$1$SI0KFvN9$XRuTOJJqkDruEyR.NPz.u0','Maribel','Terra',NULL,NULL,'administrativo');
INSERT INTO `users` (`nick`, `email`, `password`, `name`, `surname`, `last_login`, `enabled`, `role`) VALUES ('pdesosa','pdesosa@gmail.com','$1$TymVjAQg$Qo8A1wC7/nGXArlrJKFx80','Pablo','De Sosa',NULL,NULL,'director');