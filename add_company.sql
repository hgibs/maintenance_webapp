-- bumper tags
CREATE TABLE `3187in_maint_backend`.`test_bumper` (
  `idtest_bumper` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `tag` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idtest_bumper`));
  
-- PMCS record entries
-- TRUE == 1
CREATE TABLE `3187in_maint_backend`.`test_pmcs_record` (
  `idtest_pmcs_record` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `tag_id` INT UNSIGNED NULL,
  `status` TINYINT NOT NULL,
  `faults` TEXT(1024) NULL,
  `time_complete` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idtest_pmcs_record`),
  CONSTRAINT `bumper_id`
    FOREIGN KEY (`idtest_pmcs_record`)
    REFERENCES `3187in_maint_backend`.`test_bumper` (`idtest_bumper`)
    ON DELETE RESTRICT
    ON UPDATE NO ACTION);
 
-- additional fields
/*
CREATE TABLE `3187in_maint_backend`.`test_additional_fields` (
  `idtest_additional_fields` INT NOT NULL AUTO_INCREMENT,
  `fieldname` VARCHAR(45) NOT NULL,
  `fieldtext` VARCHAR(45) NOT NULL,
  `fieldtype` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idtest_additional_fields`));
  
*/


-- add admin user NOT READY YET
CREATE USER 'test_user'@'localhost' IDENTIFIED BY 'test123';
GRANT SELECT, INSERT, UPDATE ON `secure_login`.* TO 'sec_user'@'localhost';