-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema aesccar_gti09
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema aesccar_gti09
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `aesccar_gti09` DEFAULT CHARACTER SET utf8mb4 ;
USE `aesccar_gti09` ;

-- -----------------------------------------------------
-- Table `aesccar_gti09`.`roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aesccar_gti09`.`roles` (
  `IdRol` INT(11) NOT NULL AUTO_INCREMENT,
  `Rol` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`IdRol`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `aesccar_gti09`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aesccar_gti09`.`usuarios` (
  `IdUsuario` INT(11) NOT NULL AUTO_INCREMENT,
  `Rol` INT(11) NOT NULL,
  `Nombre` VARCHAR(45) NOT NULL,
  `Contraseña` VARCHAR(45) NOT NULL,
  `email` VARCHAR(75) NOT NULL,
  `Dirección` VARCHAR(75) NOT NULL,
  `UserName` VARCHAR(75) NOT NULL,
  `Teléfono` INT(9) NOT NULL,
  `DNI` VARCHAR(9) NULL,
  PRIMARY KEY (`IdUsuario`, `Rol`),
  INDEX `Rol` (`Rol` ASC),
  CONSTRAINT `usuarios_ibfk_1`
    FOREIGN KEY (`Rol`)
    REFERENCES `aesccar_gti09`.`roles` (`IdRol`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `aesccar_gti09`.`huertos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aesccar_gti09`.`huertos` (
  `IdHuerto` INT(11) NOT NULL AUTO_INCREMENT,
  `UsuarioPropietario` INT(11) NOT NULL,
  `Localización` VARCHAR(45) NOT NULL,
  `NombreHuerto` VARCHAR(45) NULL,
  PRIMARY KEY (`IdHuerto`, `UsuarioPropietario`),
  INDEX `UsuarioPropietario` (`UsuarioPropietario` ASC),
  CONSTRAINT `huertos_ibfk_1`
    FOREIGN KEY (`UsuarioPropietario`)
    REFERENCES `aesccar_gti09`.`usuarios` (`IdUsuario`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `aesccar_gti09`.`sondas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aesccar_gti09`.`sondas` (
  `IdSonda` INT(11) NOT NULL AUTO_INCREMENT,
  `NumHuerto` INT(11) NOT NULL,
  `Localización` VARCHAR(75) NOT NULL,
  PRIMARY KEY (`IdSonda`, `NumHuerto`),
  INDEX `NumHuerto` (`NumHuerto` ASC),
  CONSTRAINT `sondas_ibfk_1`
    FOREIGN KEY (`NumHuerto`)
    REFERENCES `aesccar_gti09`.`huertos` (`IdHuerto`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `aesccar_gti09`.`unidades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aesccar_gti09`.`unidades` (
  `IdUnidades` INT(11) NOT NULL AUTO_INCREMENT,
  `Unidad` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`IdUnidades`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `aesccar_gti09`.`tipossensores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aesccar_gti09`.`tipossensores` (
  `IdTipoSensor` INT(11) NOT NULL AUTO_INCREMENT,
  `TipoSensor` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`IdTipoSensor`, `TipoSensor`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `aesccar_gti09`.`sensores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aesccar_gti09`.`sensores` (
  `IdSensor` INT(11) NOT NULL AUTO_INCREMENT,
  `NumSonda` INT(11) NOT NULL,
  `TipoSensor` INT(11) NOT NULL,
  `Medida` DECIMAL(10,2) NOT NULL,
  `Unidades` INT(11) NOT NULL,
  `Estado` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`IdSensor`, `NumSonda`, `Unidades`),
  UNIQUE INDEX `TipoSensor` (`TipoSensor` ASC),
  INDEX `NumSonda` (`NumSonda` ASC),
  INDEX `Unidades` (`Unidades` ASC),
  CONSTRAINT `sensores_ibfk_1`
    FOREIGN KEY (`NumSonda`)
    REFERENCES `aesccar_gti09`.`sondas` (`IdSonda`),
  CONSTRAINT `sensores_ibfk_2`
    FOREIGN KEY (`Unidades`)
    REFERENCES `aesccar_gti09`.`unidades` (`IdUnidades`),
  CONSTRAINT `sensores_ibfk_4`
    FOREIGN KEY (`TipoSensor`)
    REFERENCES `aesccar_gti09`.`tipossensores` (`IdTipoSensor`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `aesccar_gti09`.`incidencias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aesccar_gti09`.`incidencias` (
  `IdIncidencias` INT(11) NOT NULL AUTO_INCREMENT,
  `TipoIncidencia` VARCHAR(45) NOT NULL,
  `NivelGravedad` INT(11) NOT NULL,
  `Descripción` VARCHAR(45) NOT NULL,
  `NumSensor` INT(11) NOT NULL,
  `Estado` VARCHAR(45) NULL,
  `FechaIni` DATETIME NULL,
  `FechaFin` DATETIME NULL,
  PRIMARY KEY (`IdIncidencias`, `NivelGravedad`, `NumSensor`),
  INDEX `NumSensor` (`NumSensor` ASC),
  CONSTRAINT `incidencias_ibfk_1`
    FOREIGN KEY (`NumSensor`)
    REFERENCES `aesccar_gti09`.`sensores` (`IdSensor`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `aesccar_gti09`.`instalaciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aesccar_gti09`.`instalaciones` (
  `IdHuerto` INT(11) NOT NULL,
  `FechaInicio` DATE NULL DEFAULT NULL,
  `FechaFin` DATE NULL DEFAULT NULL,
  `IdSonda` INT(11) NOT NULL,
  `NumHuerto` INT(11) NOT NULL,
  PRIMARY KEY (`IdHuerto`, `IdSonda`, `NumHuerto`),
  INDEX `IdHuerto` (`IdHuerto` ASC),
  INDEX `fk_instalaciones_sondas1_idx` (`IdSonda` ASC, `NumHuerto` ASC),
  CONSTRAINT `instalaciones_ibfk_1`
    FOREIGN KEY (`IdHuerto`)
    REFERENCES `aesccar_gti09`.`huertos` (`IdHuerto`),
  CONSTRAINT `fk_instalaciones_sondas1`
    FOREIGN KEY (`IdSonda` , `NumHuerto`)
    REFERENCES `aesccar_gti09`.`sondas` (`IdSonda` , `NumHuerto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `aesccar_gti09`.`nivelgravedad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aesccar_gti09`.`nivelgravedad` (
  `IdNivelGravedad` INT(11) NOT NULL AUTO_INCREMENT,
  `Valor` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`IdNivelGravedad`),
  CONSTRAINT `nivelgravedad_ibfk_1`
    FOREIGN KEY (`IdNivelGravedad`)
    REFERENCES `aesccar_gti09`.`incidencias` (`IdIncidencias`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `aesccar_gti09`.`TecnicoEncargado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aesccar_gti09`.`TecnicoEncargado` (
  `Tecnico` INT(11) NOT NULL,
  `IdIncidencias` INT(11) NOT NULL,
  `NivelGravedad` INT(11) NOT NULL,
  `NumSensor` INT(11) NOT NULL,
  PRIMARY KEY (`Tecnico`, `IdIncidencias`, `NivelGravedad`, `NumSensor`),
  INDEX `fk_incidencias_has_usuarios_usuarios1_idx` (`Tecnico` ASC),
  INDEX `fk_incidencias_has_usuarios_incidencias1_idx` (`IdIncidencias` ASC, `NivelGravedad` ASC, `NumSensor` ASC),
  CONSTRAINT `fk_incidencias_has_usuarios_incidencias1`
    FOREIGN KEY (`IdIncidencias` , `NivelGravedad` , `NumSensor`)
    REFERENCES `aesccar_gti09`.`incidencias` (`IdIncidencias` , `NivelGravedad` , `NumSensor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_incidencias_has_usuarios_usuarios1`
    FOREIGN KEY (`Tecnico`)
    REFERENCES `aesccar_gti09`.`usuarios` (`IdUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `aesccar_gti09`.`Mediciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aesccar_gti09`.`Mediciones` (
  `idMediciones` INT NOT NULL,
  `fecha` DATETIME NULL,
  `IdSensor` INT(11) NOT NULL,
  `NumSonda` INT(11) NOT NULL,
  `Unidades` INT(11) NOT NULL,
  `Medida` DECIMAL(10,2) NULL,
  PRIMARY KEY (`idMediciones`, `IdSensor`, `NumSonda`, `Unidades`),
  INDEX `fk_Mediciones_sensores1_idx` (`IdSensor` ASC, `NumSonda` ASC, `Unidades` ASC),
  CONSTRAINT `fk_Mediciones_sensores1`
    FOREIGN KEY (`IdSensor` , `NumSonda` , `Unidades`)
    REFERENCES `aesccar_gti09`.`sensores` (`IdSensor` , `NumSonda` , `Unidades`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aesccar_gti09`.`Solicitudes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aesccar_gti09`.`Solicitudes` (
  `idSolicitudes` INT NOT NULL AUTO_INCREMENT,
  `NombreApellidos` VARCHAR(45) NOT NULL,
  `Email` VARCHAR(45) NOT NULL,
  `Telefono` INT NULL,
  `Consulta` VARCHAR(250) NOT NULL,
  `Estado` TINYINT NULL,
  PRIMARY KEY (`idSolicitudes`),
  UNIQUE INDEX `Email_UNIQUE` (`Email` ASC))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
