-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema sql8624327
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema sql8624327
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `sql8624327` DEFAULT CHARACTER SET utf8mb4 ;
USE `sql8624327` ;

-- -----------------------------------------------------
-- Table `aesccar_gti09`.`roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sql8624327`.`roles` (
  `IdRol` INT(11) NOT NULL AUTO_INCREMENT,
  `Rol` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`IdRol`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `sql8624327`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sql8624327`.`usuarios` (
  `IdUsuario` INT(11) NOT NULL AUTO_INCREMENT,
  `Rol` INT(11) NOT NULL,
  `Nombre` VARCHAR(45) NOT NULL,
  `Contraseña` VARCHAR(45) NOT NULL,
  `email` VARCHAR(75) NOT NULL,
  `Dirección` VARCHAR(75) NOT NULL,
  `UserName` VARCHAR(75) NOT NULL,
  `Teléfono` INT(9) NOT NULL,
  `DNI` VARCHAR(9) NULL DEFAULT NULL,
  PRIMARY KEY (`IdUsuario`, `Rol`),
  INDEX `Rol` (`Rol` ASC),
  CONSTRAINT `usuarios_ibfk_1`
    FOREIGN KEY (`Rol`)
    REFERENCES `sql8624327`.`roles` (`IdRol`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 21
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `sql8624327`.`huertos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sql8624327`.`huertos` (
  `IdHuerto` INT(11) NOT NULL AUTO_INCREMENT,
  `UsuarioPropietario` INT(11) NOT NULL,
  `Localización` VARCHAR(45) NOT NULL,
  `NombreHuerto` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`IdHuerto`, `UsuarioPropietario`),
  INDEX `UsuarioPropietario` (`UsuarioPropietario` ASC),
  CONSTRAINT `huertos_ibfk_1`
    FOREIGN KEY (`UsuarioPropietario`)
    REFERENCES `sql8624327`.`usuarios` (`IdUsuario`))
ENGINE = InnoDB
AUTO_INCREMENT = 21
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `sql8624327`.`sondas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sql8624327`.`sondas` (
  `IdSonda` INT(11) NOT NULL AUTO_INCREMENT,
  `NumHuerto` INT(11) NOT NULL,
  `Localización` VARCHAR(75) NOT NULL,
  PRIMARY KEY (`IdSonda`, `NumHuerto`),
  INDEX `NumHuerto` (`NumHuerto` ASC),
  CONSTRAINT `sondas_ibfk_1`
    FOREIGN KEY (`NumHuerto`)
    REFERENCES `sql8624327`.`huertos` (`IdHuerto`))
ENGINE = InnoDB
AUTO_INCREMENT = 21
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `aesccar_gti09`.`unidades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sql8624327`.`unidades` (
  `IdUnidades` INT(11) NOT NULL AUTO_INCREMENT,
  `Unidad` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`IdUnidades`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `sql8624327`.`tipossensores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sql8624327`.`tipossensores` (
  `IdTipoSensor` INT(11) NOT NULL AUTO_INCREMENT,
  `TipoSensor` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`IdTipoSensor`, `TipoSensor`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `sql8624327`.`sensores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sql8624327`.`sensores` (
  `IdSensor` INT(11) NOT NULL AUTO_INCREMENT,
  `NumSonda` INT(11) NOT NULL,
  `TipoSensor` INT(11) NOT NULL,
  `Medida` DECIMAL(10,2) NOT NULL,
  `Unidades` INT(11) NOT NULL,
  `Estado` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`IdSensor`, `NumSonda`, `Unidades`),
  INDEX `NumSonda` (`NumSonda` ASC),
  INDEX `Unidades` (`Unidades` ASC),
  INDEX `sensores_ibfk_4` (`TipoSensor` ASC),
  CONSTRAINT `sensores_ibfk_1`
    FOREIGN KEY (`NumSonda`)
    REFERENCES `sql8624327`.`sondas` (`IdSonda`),
  CONSTRAINT `sensores_ibfk_2`
    FOREIGN KEY (`Unidades`)
    REFERENCES `sql8624327`.`unidades` (`IdUnidades`),
  CONSTRAINT `sensores_ibfk_4`
    FOREIGN KEY (`TipoSensor`)
    REFERENCES `sql8624327`.`tipossensores` (`IdTipoSensor`))
ENGINE = InnoDB
AUTO_INCREMENT = 41
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `sql8624327`.`incidencias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sql8624327`.`incidencias` (
  `IdIncidencias` INT(11) NOT NULL AUTO_INCREMENT,
  `TipoIncidencia` VARCHAR(45) NOT NULL,
  `NivelGravedad` INT(11) NOT NULL,
  `Descripción` VARCHAR(45) NOT NULL,
  `NumSensor` INT(11) NOT NULL,
  `Estado` VARCHAR(45) NULL DEFAULT NULL,
  `FechaIni` DATETIME NULL DEFAULT NULL,
  `FechaFin` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`IdIncidencias`, `NivelGravedad`, `NumSensor`),
  INDEX `NumSensor` (`NumSensor` ASC),
  CONSTRAINT `incidencias_ibfk_1`
    FOREIGN KEY (`NumSensor`)
    REFERENCES `sql8624327`.`sensores` (`IdSensor`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `sql8624327`.`instalaciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sql8624327`.`instalaciones` (
  `IdHuerto` INT(11) NOT NULL,
  `FechaInicio` DATE NULL DEFAULT NULL,
  `FechaFin` DATE NULL DEFAULT NULL,
  `IdSonda` INT(11) NOT NULL,
  `NumHuerto` INT(11) NOT NULL,
  PRIMARY KEY (`IdHuerto`, `IdSonda`, `NumHuerto`),
  INDEX `IdHuerto` (`IdHuerto` ASC),
  INDEX `fk_instalaciones_sondas1_idx` (`IdSonda` ASC, `NumHuerto` ASC),
  CONSTRAINT `fk_instalaciones_sondas1`
    FOREIGN KEY (`IdSonda` , `NumHuerto`)
    REFERENCES `sql8624327`.`sondas` (`IdSonda` , `NumHuerto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `instalaciones_ibfk_1`
    FOREIGN KEY (`IdHuerto`)
    REFERENCES `sql8624327`.`huertos` (`IdHuerto`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `aesccar_gti09`.`mediciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sql8624327`.`mediciones` (
  `idMediciones` INT(11) NOT NULL,
  `fecha` DATETIME NULL DEFAULT NULL,
  `IdSensor` INT(11) NOT NULL,
  `NumSonda` INT(11) NOT NULL,
  `Unidades` INT(11) NOT NULL,
  `Medida` DECIMAL(10,2) NULL DEFAULT NULL,
  PRIMARY KEY (`idMediciones`, `IdSensor`, `NumSonda`, `Unidades`),
  INDEX `fk_Mediciones_sensores1_idx` (`IdSensor` ASC, `NumSonda` ASC, `Unidades` ASC),
  CONSTRAINT `fk_Mediciones_sensores1`
    FOREIGN KEY (`IdSensor` , `NumSonda` , `Unidades`)
    REFERENCES `sql8624327`.`sensores` (`IdSensor` , `NumSonda` , `Unidades`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `sql8624327`.`nivelgravedad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sql8624327`.`nivelgravedad` (
  `IdNivelGravedad` INT(11) NOT NULL AUTO_INCREMENT,
  `Valor` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`IdNivelGravedad`),
  CONSTRAINT `nivelgravedad_ibfk_1`
    FOREIGN KEY (`IdNivelGravedad`)
    REFERENCES `sql8624327`.`incidencias` (`IdIncidencias`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `aesccar_gti09`.`solicitudes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sql8624327`.`solicitudes` (
  `idSolicitudes` INT(11) NOT NULL AUTO_INCREMENT,
  `NombreApellidos` VARCHAR(45) NOT NULL,
  `Email` VARCHAR(45) NOT NULL,
  `Telefono` INT(11) NULL DEFAULT NULL,
  `Consulta` VARCHAR(250) NOT NULL,
  `Estado` TINYINT(4) NULL DEFAULT NULL,
  `usuarios_IdUsuario` INT(11) NOT NULL,
  `usuarios_Rol` INT(11) NOT NULL,
  PRIMARY KEY (`idSolicitudes`, `usuarios_IdUsuario`, `usuarios_Rol`),
  UNIQUE INDEX `Email_UNIQUE` (`Email` ASC),
  INDEX `fk_solicitudes_usuarios1_idx` (`usuarios_IdUsuario` ASC, `usuarios_Rol` ASC),
  CONSTRAINT `fk_solicitudes_usuarios1`
    FOREIGN KEY (`usuarios_IdUsuario` , `usuarios_Rol`)
    REFERENCES `sql8624327`.`usuarios` (`IdUsuario` , `Rol`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `sql8624327`.`tecnicoencargado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sql8624327`.`tecnicoencargado` (
  `Tecnico` INT(11) NOT NULL,
  `IdIncidencias` INT(11) NOT NULL,
  `NivelGravedad` INT(11) NOT NULL,
  `NumSensor` INT(11) NOT NULL,
  PRIMARY KEY (`Tecnico`, `IdIncidencias`, `NivelGravedad`, `NumSensor`),
  INDEX `fk_incidencias_has_usuarios_usuarios1_idx` (`Tecnico` ASC),
  INDEX `fk_incidencias_has_usuarios_incidencias1_idx` (`IdIncidencias` ASC, `NivelGravedad` ASC, `NumSensor` ASC),
  CONSTRAINT `fk_incidencias_has_usuarios_incidencias1`
    FOREIGN KEY (`IdIncidencias` , `NivelGravedad` , `NumSensor`)
    REFERENCES `sql8624327`.`incidencias` (`IdIncidencias` , `NivelGravedad` , `NumSensor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_incidencias_has_usuarios_usuarios1`
    FOREIGN KEY (`Tecnico`)
    REFERENCES `sql8624327`.`usuarios` (`IdUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
