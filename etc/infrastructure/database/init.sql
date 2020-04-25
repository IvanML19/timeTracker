CREATE DATABASE IF NOT EXISTS degustabox;

CREATE TABLE IF NOT EXISTS `degustabox`.`timetracker` (
  `uuid` VARCHAR(37) NOT NULL,
  `name` VARCHAR(40) NULL,
  `time` INT NULL,
  `dateadd` DATETIME NOT NULL,
  `dateupd` DATETIME NULL,
  PRIMARY KEY (`name`));