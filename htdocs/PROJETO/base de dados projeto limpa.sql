-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema Projeto
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Projeto
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Projeto` DEFAULT CHARACTER SET utf8 ;
USE `Projeto` ;

-- -----------------------------------------------------
-- Table `Projeto`.`Login`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Projeto`.`Login` (
  `id_Login` INT NOT NULL AUTO_INCREMENT,
  `Dica` VARCHAR(50) NOT NULL,
  `Email` VARCHAR(255) NOT NULL,
  `Senha` VARCHAR(50) NOT NULL,
  `Nivel` INT(1) NOT NULL,
  PRIMARY KEY (`id_Login`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Projeto`.`Prestador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Projeto`.`Prestador` (
  `id_Prestador` INT NOT NULL AUTO_INCREMENT,
  `Nome` VARCHAR(255) NOT NULL,
  `Sobrenome` VARCHAR(255) NOT NULL,
  `CPF` VARCHAR(15) NOT NULL,
  `Telefone` VARCHAR(11) NOT NULL,
  `Cidade` VARCHAR(255) NOT NULL,
  `id_Login` INT NOT NULL,
  PRIMARY KEY (`id_Prestador`),
  CONSTRAINT `fk_Prestador_Login1`
    FOREIGN KEY (`id_Login`)
    REFERENCES `Projeto`.`Login` (`id_Login`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Prestador_Login1_idx` ON `Projeto`.`Prestador` (`id_Login` ASC) ;


-- -----------------------------------------------------
-- Table `Projeto`.`Cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Projeto`.`Cliente` (
  `id_Cliente` INT NOT NULL AUTO_INCREMENT,
  `Nome` VARCHAR(255) NOT NULL,
  `Sobrenome` VARCHAR(255) NOT NULL,
  `CPF` VARCHAR(15) NOT NULL,
  `Telefone` VARCHAR(11) NOT NULL,
  `Cidade` VARCHAR(255) NOT NULL,
  `id_Login` INT NOT NULL,
  PRIMARY KEY (`id_Cliente`),
  CONSTRAINT `fk_Cliente_Login1`
    FOREIGN KEY (`id_Login`)
    REFERENCES `Projeto`.`Login` (`id_Login`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Cliente_Login1_idx` ON `Projeto`.`Cliente` (`id_Login` ASC) ;


-- -----------------------------------------------------
-- Table `Projeto`.`Categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Projeto`.`Categoria` (
  `id_Categoria` INT NOT NULL AUTO_INCREMENT,
  `TipoCategoria` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_Categoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Projeto`.`Ordem_De_Servico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Projeto`.`Ordem_De_Servico` (
  `id_OrdemDeServico` INT NOT NULL AUTO_INCREMENT,
  `DataDeAbertura` DATE NOT NULL,
  `DataDeFechamento` DATE NULL,
  `Status` VARCHAR(45) NOT NULL,
  `Descricao` VARCHAR(500) NOT NULL,
  `AvaliacaoPrestador` INT NULL,
  `AvaliacaoCliente` INT NULL,
  `id_Cliente` INT NOT NULL,
  PRIMARY KEY (`id_OrdemDeServico`),
  CONSTRAINT `fk_Ordem de servico_Cliente1`
    FOREIGN KEY (`id_Cliente`)
    REFERENCES `Projeto`.`Cliente` (`id_Cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Ordem de servico_Cliente1_idx` ON `Projeto`.`Ordem_De_Servico` (`id_Cliente` ASC) ;


-- -----------------------------------------------------
-- Table `Projeto`.`Administrador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Projeto`.`Administrador` (
  `id_Administrador` INT NOT NULL AUTO_INCREMENT,
  `Nome` VARCHAR(255) NOT NULL,
  `id_Login` INT NOT NULL,
  PRIMARY KEY (`id_Administrador`),
  CONSTRAINT `fk_Administrador_Login1`
    FOREIGN KEY (`id_Login`)
    REFERENCES `Projeto`.`Login` (`id_Login`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Administrador_Login1_idx` ON `Projeto`.`Administrador` (`id_Login` ASC) ;


-- -----------------------------------------------------
-- Table `Projeto`.`Servico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Projeto`.`Servico` (
  `id_Servico` INT NOT NULL AUTO_INCREMENT,
  `Descricao` VARCHAR(500) NOT NULL,
  `Valor` DECIMAL(10,2) NOT NULL,
  `Status` VARCHAR(45) NOT NULL,
  `id_Prestador` INT NOT NULL,
  `id_Categoria` INT NOT NULL,
  PRIMARY KEY (`id_Servico`),
  CONSTRAINT `fk_Servico_Prestador1`
    FOREIGN KEY (`id_Prestador`)
    REFERENCES `Projeto`.`Prestador` (`id_Prestador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Servico_Categoria1`
    FOREIGN KEY (`id_Categoria`)
    REFERENCES `Projeto`.`Categoria` (`id_Categoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Servico_Prestador1_idx` ON `Projeto`.`Servico` (`id_Prestador` ASC) ;

CREATE INDEX `fk_Servico_Categoria1_idx` ON `Projeto`.`Servico` (`id_Categoria` ASC) ;


-- -----------------------------------------------------
-- Table `Projeto`.`Prestador_Ordem_De_Servico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Projeto`.`Prestador_Ordem_De_Servico` (
  `id_Prestador` INT NOT NULL,
  `id_OrdemDeServico` INT NOT NULL,
  `ValorUnitario` DECIMAL(10,2) NULL,
  `id_Servico` INT NOT NULL,
  PRIMARY KEY (`id_Prestador`, `id_OrdemDeServico`),
  CONSTRAINT `fk_Prestador Ordem de servico_Prestador1`
    FOREIGN KEY (`id_Prestador`)
    REFERENCES `Projeto`.`Prestador` (`id_Prestador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Prestador Ordem de servico_Ordem de servico1`
    FOREIGN KEY (`id_OrdemDeServico`)
    REFERENCES `Projeto`.`Ordem_De_Servico` (`id_OrdemDeServico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Prestador Ordem de servico_Servico1`
    FOREIGN KEY (`id_Servico`)
    REFERENCES `Projeto`.`Servico` (`id_Servico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Prestador Ordem de servico_Prestador1_idx` ON `Projeto`.`Prestador_Ordem_De_Servico` (`id_Prestador` ASC) ;

CREATE INDEX `fk_Prestador Ordem de servico_Ordem de servico1_idx` ON `Projeto`.`Prestador_Ordem_De_Servico` (`id_OrdemDeServico` ASC) ;

CREATE INDEX `fk_Prestador Ordem de servico_Servico1_idx` ON `Projeto`.`Prestador_Ordem_De_Servico` (`id_Servico` ASC) ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
