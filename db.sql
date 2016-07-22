SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `temp` ;
CREATE SCHEMA IF NOT EXISTS `temp` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `temp` ;

-- -----------------------------------------------------
-- Table `temp`.`patients`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `temp`.`patients` (
  `idpatients` INT NOT NULL AUTO_INCREMENT,
  `surname` VARCHAR(45) NULL,
  `name` VARCHAR(45) NULL,
  `patronymic` VARCHAR(45) NULL,
  `dateofbirth` DATE NULL,
  `healthInsurance` TINYINT(1) NOT NULL,
  `healthInsuranceNum` VARCHAR(20) NULL,
  PRIMARY KEY (`idpatients`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `temp`.`patientCard`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `temp`.`patientCard` (
  `idpatientCard` INT NOT NULL AUTO_INCREMENT,
  `cardNum` VARCHAR(15) NULL,
  `diagnosis` VARCHAR(155) NULL,
  `temp` FLOAT NULL,
  `patients_idpatients` INT NOT NULL,
  PRIMARY KEY (`idpatientCard`),
  INDEX `fk_patientCard_patients_idx` (`patients_idpatients` ASC),
  CONSTRAINT `fk_patientCard_patients`
    FOREIGN KEY (`patients_idpatients`)
    REFERENCES `temp`.`patients` (`idpatients`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;



INSERT INTO `temp`.`patients` (`surname`, `name`, `patronymic`, `dateofbirth`, `healthInsurance`, `healthInsuranceNum`) VALUES ('Василевский', 'Иван', 'Сергеевич', '1974-04-21', '1', '3-11');
INSERT INTO `temp`.`patients` (`surname`, `name`, `patronymic`, `dateofbirth`, `healthInsurance`, `healthInsuranceNum`) VALUES ('Капиризина', 'Валерия', 'Васильевна', '1986-02-11', '1', '01-11');
INSERT INTO `temp`.`patients` (`surname`, `name`, `patronymic`, `dateofbirth`, `healthInsurance`, `healthInsuranceNum`) VALUES ('Кюхельбекер', 'Вильгельм', 'Борисович', '1958-12-03', '1', '05-11');
INSERT INTO `temp`.`patients` (`surname`, `name`, `patronymic`, `dateofbirth`, `healthInsurance`, `healthInsuranceNum`) VALUES ('Кришнамурти', 'Джидду', 'Эмурбаевич', '1942-07-14', '1', '07-11');
INSERT INTO `temp`.`patients` (`surname`, `name`, `patronymic`, `dateofbirth`, `healthInsurance`, `healthInsuranceNum`) VALUES ('Кант', 'Иммануил', 'Зурханович', '1986-06-15', '1', '4-13');
INSERT INTO `temp`.`patients` (`surname`, `name`, `patronymic`, `dateofbirth`, `healthInsurance`, `healthInsuranceNum`) VALUES ('Кафка', 'Франц', 'Германович', '1982-02-12', '1', '3-11');
INSERT INTO `temp`.`patients` (`surname`, `name`, `patronymic`, `dateofbirth`, `healthInsurance`, `healthInsuranceNum`) VALUES ('Кун', 'Томас', 'Мишиленкович', '1979-01-17', '1', '2-11');
INSERT INTO `temp`.`patients` (`surname`, `name`, `patronymic`, `dateofbirth`, `healthInsurance`, `healthInsuranceNum`) VALUES ('Полякова', 'Екатерина', 'Юрьевна', '1990-10-26', '1', '3-11');
INSERT INTO `temp`.`patients` (`surname`, `name`, `patronymic`, `dateofbirth`, `healthInsurance`, `healthInsuranceNum`) VALUES ('Болотнников', 'Иван', 'Владимирович', '1966-07-08', '1', '3-01');
INSERT INTO `temp`.`patients` (`surname`, `name`, `patronymic`, `dateofbirth`, `healthInsurance`, `healthInsuranceNum`) VALUES ('Хармс', 'Даниил', 'Иванович', '1979-02-11', '1', '1-13');
INSERT INTO `temp`.`patients` (`surname`, `name`, `patronymic`, `dateofbirth`, `healthInsurance`, `healthInsuranceNum`) VALUES ('Хепбёрн', 'Одри', 'Растон', '1962-03-16', '1', '3-11');
INSERT INTO `temp`.`patients` (`surname`, `name`, `patronymic`, `dateofbirth`, `healthInsurance`) VALUES ('Минин', 'Ван', 'Курмов', '1972-10-12', '0');
INSERT INTO `temp`.`patients` (`surname`, `name`, `patronymic`, `dateofbirth`, `healthInsurance`, `healthInsuranceNum`) VALUES ('Шувалова', 'Екатерина', 'Валерьевна', '1952-03-12', '1', '5t-32');
INSERT INTO `temp`.`patients` (`surname`, `name`, `patronymic`, `dateofbirth`, `healthInsurance`, `healthInsuranceNum`) VALUES ('Ларченко', 'Лидия', 'Николаевна', '1973-05-11', '1', '3n-22');
INSERT INTO `temp`.`patients` (`surname`, `name`, `patronymic`, `dateofbirth`, `healthInsurance`, `healthInsuranceNum`) VALUES ('Ефремова', 'Светлана', 'Викторовна', '1982-10-22', '1', '2t-34');
INSERT INTO `temp`.`patients` (`surname`, `name`, `patronymic`, `dateofbirth`, `healthInsurance`, `healthInsuranceNum`) VALUES ('Ларченко', 'Иван', 'Борисович', '1952-03-12', '1', '5t-h2');
INSERT INTO `temp`.`patients` (`surname`, `name`, `patronymic`, `dateofbirth`, `healthInsurance`, `healthInsuranceNum`) VALUES ('Нигун', 'Томас', 'Растон', '1983-05-21', '1', '3n-22');
INSERT INTO `temp`.`patients` (`surname`, `name`, `patronymic`, `dateofbirth`, `healthInsurance`, `healthInsuranceNum`) VALUES ('Головенко', 'Светлана', 'Николаевна', '1986-12-22', '1', '2d-34');
INSERT INTO `temp`.`patients` (`surname`, `name`, `patronymic`, `dateofbirth`, `healthInsurance`, `healthInsuranceNum`) VALUES ('Накин', 'Одри', 'Растон', '1992-05-22', '1', '5t-h2');
INSERT INTO `temp`.`patients` (`surname`, `name`, `patronymic`, `dateofbirth`, `healthInsurance`, `healthInsuranceNum`) VALUES ('Шувалова', 'Ольга', 'Валерьевна', '1988-06-21', '1', '2n-i2');
INSERT INTO `temp`.`patients` (`surname`, `name`, `patronymic`, `dateofbirth`, `healthInsurance`, `healthInsuranceNum`) VALUES ('Валошин', 'Петр', 'Владимирович', '1986-03-16', '1', '7d-34');

INSERT INTO `temp`.`patientcard` (`cardNum`, `diagnosis`, `temp`, `patients_idpatients`) VALUES ('11943', 'trupus-figus', '28', '1');
INSERT INTO `temp`.`patientcard` (`cardNum`, `diagnosis`, `temp`, `patients_idpatients`) VALUES ('11923', 'trupus-obmorojus', '35.4', '2');
INSERT INTO `temp`.`patientcard` (`cardNum`, `diagnosis`, `temp`, `patients_idpatients`) VALUES ('11946', 'trupus-olodojus', '36.4', '3');
INSERT INTO `temp`.`patientcard` (`cardNum`, `diagnosis`, `temp`, `patients_idpatients`) VALUES ('11933', 'trupus-brrr', '36.2', '4');
INSERT INTO `temp`.`patientcard` (`cardNum`, `diagnosis`, `temp`, `patients_idpatients`) VALUES ('11973', 'trupus-horoshogus', '36.8', '5');
INSERT INTO `temp`.`patientcard` (`cardNum`, `diagnosis`, `temp`, `patients_idpatients`) VALUES ('11939', 'trupus-temperaturus', '37', '6');
INSERT INTO `temp`.`patientcard` (`cardNum`, `diagnosis`, `temp`, `patients_idpatients`) VALUES ('11922', 'trupus-temperaturus-nogus', '37.2', '7');
INSERT INTO `temp`.`patientcard` (`cardNum`, `diagnosis`, `temp`, `patients_idpatients`) VALUES ('11949', 'trupus-sharus', '43.2', '8');
INSERT INTO `temp`.`patientcard` (`cardNum`, `diagnosis`, `temp`, `patients_idpatients`) VALUES ('11941', 'trupus-criticus', '38.5', '9');
INSERT INTO `temp`.`patientcard` (`cardNum`, `diagnosis`, `temp`, `patients_idpatients`) VALUES ('11942', 'trupus-boleus', '38.2', '10');
INSERT INTO `temp`.`patientcard` (`cardNum`, `diagnosis`, `temp`, `patients_idpatients`) VALUES ('11968', 'trupus-trupus', '39', '11');
INSERT INTO `temp`.`patientcard` (`cardNum`, `diagnosis`, `temp`, `patients_idpatients`) VALUES ('11741', 'trupus-hladus', '27.2', '12');
INSERT INTO `temp`.`patientcard` (`cardNum`, `diagnosis`, `temp`, `patients_idpatients`) VALUES ('11818', 'trupus-hladus', '25.2', '13');
INSERT INTO `temp`.`patientcard` (`cardNum`, `diagnosis`, `temp`, `patients_idpatients`) VALUES ('11818', 'trupus-sharus', '41.2', '14');
INSERT INTO `temp`.`patientcard` (`cardNum`, `diagnosis`, `temp`, `patients_idpatients`) VALUES ('11818', 'trupus-nikakus', '37.6', '15');
INSERT INTO `temp`.`patientcard` (`cardNum`, `diagnosis`, `temp`, `patients_idpatients`) VALUES ('11511', 'trupus-hladus', '26.2', '16');
INSERT INTO `temp`.`patientcard` (`cardNum`, `diagnosis`, `temp`, `patients_idpatients`) VALUES ('11513', 'trupus-hladus', '24.9', '17');
INSERT INTO `temp`.`patientcard` (`cardNum`, `diagnosis`, `temp`, `patients_idpatients`) VALUES ('11514', 'trupus-hladus', '27.6', '18');
INSERT INTO `temp`.`patientcard` (`cardNum`, `diagnosis`, `temp`, `patients_idpatients`) VALUES ('11515', 'trupus-zdorovus', '36.6', '19');
INSERT INTO `temp`.`patientcard` (`cardNum`, `diagnosis`, `temp`, `patients_idpatients`) VALUES ('11516', 'trupus-nikakus', '37.9', '20');
INSERT INTO `temp`.`patientcard` (`cardNum`, `diagnosis`, `temp`, `patients_idpatients`) VALUES ('11517', 'trupus-brrr', '35.9', '21');
-- SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
-- SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
-- SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';
--
-- DROP SCHEMA IF EXISTS `sectors of the population` ;
-- CREATE SCHEMA IF NOT EXISTS `sectors of the population` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
-- USE `sectors of the population` ;
--
-- -- -----------------------------------------------------
-- -- Table `sectors of the population`.`people`
-- -- -----------------------------------------------------
-- CREATE TABLE IF NOT EXISTS `sectors of the population`.`people` (
--   `idpeople` INT UNSIGNED NOT NULL AUTO_INCREMENT,
--   `surname` VARCHAR(45) NULL,
--   `name` VARCHAR(45) NULL,
--   `patronymic` VARCHAR(45) NULL,
--   `dateOfBirth` DATE NULL,
--   `sex` VARCHAR(9) NULL,
--   `employment` VARCHAR(150) NULL,
--   `earnings` DOUBLE NULL,
--   PRIMARY KEY (`idpeople`))
-- ENGINE = InnoDB;
--
--
-- SET SQL_MODE=@OLD_SQL_MODE;
-- SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
-- SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
