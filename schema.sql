/*
	MAIN SCHEMA
*/

/*
DROP DATABASE IF EXISTS `3187in_maint_backend`;
*/

/*
Optional: MySQL centric items
MySQL: DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
MySQL Storage Engines: SET default_storage_engine=InnoDB;
Note: "IF EXISTS" is not universal, and the "IF NOT EXISTS" is uncommonly supported, so this functionaly may not work if outside MySQL RDBMS.


Resources:
https://dev.mysql.com/doc/refman/5.7/en/storage-engines.html
https://bitnami.com/stacks/infrastructure
https://www.jetbrains.com/phpstorm/
http://www.w3schools.com/
*/


CREATE SCHEMA `3187in_maint_backend` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ;

CREATE TABLE `3187in_maint_backend`.`Unit` (
  `idUnit` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `urlname` VARCHAR(45) NULL,
  PRIMARY KEY (`idUnit`));


