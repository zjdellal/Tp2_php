DROP DATABASE IF EXISTS TP2_ZD_CM;
CREATE DATABASE TP2_ZD_CM;
USE TP2_ZD_CM;

DROP TABLE IF EXISTS messages;
DROP TABLE IF EXISTS salles;
DROP TABLE IF EXISTS `users_groups`;
DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `groups`;
DROP TABLE IF EXISTS `login_attempts`;

#
# Table structure for table 'groups'
#

CREATE TABLE `groups` (
  `id`          MEDIUMINT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name`        VARCHAR(20)           NOT NULL,
  `description` VARCHAR(100)          NOT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

#
# Dumping data for table 'groups'
#

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
  (1, 'admin', 'Administrator'),
  (2, 'members', 'General User');

#
# Table structure for table 'users'
#

CREATE TABLE `users` (
  `id`                      INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address`              VARCHAR(45)      NOT NULL,
  `username`                VARCHAR(100)     NULL,
  `password`                VARCHAR(255)     NOT NULL,
  `salt`                    VARCHAR(255)              DEFAULT NULL,
  `email`                   VARCHAR(100)     NOT NULL,
  `activation_code`         VARCHAR(40)               DEFAULT NULL,
  `forgotten_password_code` VARCHAR(40)               DEFAULT NULL,
  `forgotten_password_time` INT(11) UNSIGNED          DEFAULT NULL,
  `remember_code`           VARCHAR(40)               DEFAULT NULL,
  `created_on`              INT(11) UNSIGNED NOT NULL,
  `last_login`              INT(11) UNSIGNED          DEFAULT NULL,
  `active`                  TINYINT(1) UNSIGNED       DEFAULT NULL,
  `first_name`              VARCHAR(50)               DEFAULT NULL,
  `last_name`               VARCHAR(50)               DEFAULT NULL,
  `company`                 VARCHAR(100)              DEFAULT NULL,
  `phone`                   VARCHAR(20)               DEFAULT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

#
# Dumping data for table 'users'
#

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`)
VALUES
  ('1', '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '',
        'admin@admin.com', '', NULL, '1268889823', '1268889823', '1', 'Admin', 'istrator', 'ADMIN', '0');

#
# Table structure for table 'users_groups'
#

CREATE TABLE `users_groups` (
  `id`       INT(11) UNSIGNED      NOT NULL AUTO_INCREMENT,
  `user_id`  INT(11) UNSIGNED      NOT NULL,
  `group_id` MEDIUMINT(8) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `uc_users_groups` UNIQUE (`user_id`, `group_id`),
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
  (1, 1, 1),
  (2, 1, 2);

#
# Table structure for table 'login_attempts'
#

CREATE TABLE `login_attempts` (
  `id`         INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` VARCHAR(15)      NOT NULL,
  `login`      VARCHAR(100)     NOT NULL,
  `time`       INT(11) UNSIGNED          DEFAULT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

CREATE TABLE salles (
  id_salle INT(11) AUTO_INCREMENT PRIMARY KEY ,
  nom      VARCHAR(45) NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
  
INSERT INTO `salles` (`id_salle`, `nom`) VALUES(1,'Salle par défaut');

CREATE TABLE messages (
  id_message     INT(11)          NOT NULL AUTO_INCREMENT PRIMARY KEY,
  message        VARCHAR(45)      NOT NULL,
  users_id       INT(11) UNSIGNED NOT NULL,
  date           DATETIME         NOT NULL,
  salle_id_salle INT(11)          NOT NULL,
  CONSTRAINT `fk_messages_users_id` FOREIGN KEY (users_id) REFERENCES users (id),
  CONSTRAINT `fk_messages_salle_id_salle` FOREIGN KEY (salle_id_salle) REFERENCES salles (id_salle)
)
	ENGINE = InnoDB
	DEFAULT CHARSET = utf8;