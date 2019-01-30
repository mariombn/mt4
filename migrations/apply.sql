CREATE DATABASE `mt4`;

USE mt4

CREATE TABLE `mt4`.`dispositivos_tipos` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `mt4`.`dispositivos` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `hostname` VARCHAR(100) NOT NULL,
  `ip` VARCHAR(15) NOT NULL DEFAULT '0.0.0.0',
  `tipo` INT UNSIGNED NOT NULL,
  `fabricante` VARCHAR(200),
  PRIMARY KEY (`id`),
  CONSTRAINT fk_tipo FOREIGN KEY (`tipo`) REFERENCES `dispositivos_tipos`(`id`)
);

INSERT INTO  `mt4`.`dispositivos_tipos` (`tipo`) VALUES ('Servidor'), ('Roteador'), ('Switch'), ('Repetidor');
