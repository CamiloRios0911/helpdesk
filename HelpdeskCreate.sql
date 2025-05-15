# ---------------------------------------------------------------------- #
# Script generated with: DeZign for Databases v6.2.1                     #
# Target DBMS:           MySQL 5                                         #
# Project file:          helpdesknew.dez                                 #
# Project name:                                                          #
# Author:                                                                #
# Script type:           Database creation script                        #
# Created on:            2025-04-21 11:53                                #
# ---------------------------------------------------------------------- #


# ---------------------------------------------------------------------- #
# Tables                                                                 #
# ---------------------------------------------------------------------- #

# ---------------------------------------------------------------------- #
# Add table "estado"                                                     #
# ---------------------------------------------------------------------- #

CREATE TABLE `estado` (
    `id_est` INTEGER(2) NOT NULL,
    `nom_est` VARCHAR(40),
    CONSTRAINT `PK_estado` PRIMARY KEY (`id_est`)
);

# ---------------------------------------------------------------------- #
# Add table "dependencia"                                                #
# ---------------------------------------------------------------------- #

CREATE TABLE `dependencia` (
    `id_dep` INTEGER(2) NOT NULL AUTO_INCREMENT,
    `nom_dep` VARCHAR(40),
    CONSTRAINT `PK_dependencia` PRIMARY KEY (`id_dep`)
);

# ---------------------------------------------------------------------- #
# Add table "usuario"                                                    #
# ---------------------------------------------------------------------- #

CREATE TABLE `usuario` (
    `id_usu` INTEGER(11) NOT NULL,
    `nom_usu` VARCHAR(60),
    `tel_usu` VARCHAR(20),
    `email_usu` VARCHAR(60),
    `pass_usu` VARCHAR(1000),
    `dni_usu` VARCHAR(40),
    `avatar_usu` VARCHAR(255),
    `id_tipo_usu` INTEGER(11),
    CONSTRAINT `PK_usuario` PRIMARY KEY (`id_usu`)
);

# ---------------------------------------------------------------------- #
# Add table "ticket"                                                     #
# ---------------------------------------------------------------------- #

CREATE TABLE `ticket` (
    `id_tic` INTEGER(11) NOT NULL AUTO_INCREMENT,
    `fecha_actual_tic` DATETIME,
    `fecha_programada_tic` DATETIME,
    `fecha_ejecucion_tic` DATETIME,
    `problema_tic` BLOB,
    `solucion_tic` BLOB,
    `tipo_tic` VARCHAR(1),
    `estado_tic` VARCHAR(1),
    `num_eq` VARCHAR(20),
    `id_usu` INTEGER(11),
    CONSTRAINT `PK_ticket` PRIMARY KEY (`id_tic`)
);

# ---------------------------------------------------------------------- #
# Add table "tipo_equipo"                                                #
# ---------------------------------------------------------------------- #

CREATE TABLE `tipo_equipo` (
    `id_tip` INTEGER(2) NOT NULL AUTO_INCREMENT,
    `nom_tip` VARCHAR(40),
    CONSTRAINT `PK_tipo_equipo` PRIMARY KEY (`id_tip`)
);

# ---------------------------------------------------------------------- #
# Add table "equipo"                                                     #
# ---------------------------------------------------------------------- #

CREATE TABLE `equipo` (
    `num_eq` VARCHAR(20) NOT NULL,
    `fecha_inst_eq` DATETIME,
    `modelo_eq` VARCHAR(40),
    `serial_eq` VARCHAR(40),
    `RAM_eq` VARCHAR(40),
    `DD_eq` VARCHAR(40),
    `fecha_com_eq` DATETIME,
    `factura_eq` VARCHAR(40),
    `fecha_garantia_eq` DATETIME,
    `observacion_eq` BLOB,
    `ubicacion_equ` VARCHAR(40),
    `nombre_equ` VARCHAR(40),
    `ip_equ` VARCHAR(40),
    `id_tip` INTEGER(2),
    `id_dep` INTEGER(2),
    `id_est` INTEGER(2),
    `id_prove` INTEGER(10),
    `id_usu` INTEGER(11),
    CONSTRAINT `PK_equipo` PRIMARY KEY (`num_eq`)
);

# ---------------------------------------------------------------------- #
# Add table "software"                                                   #
# ---------------------------------------------------------------------- #

CREATE TABLE `software` (
    `id_soft` INTEGER(11) NOT NULL AUTO_INCREMENT,
    `producto_soft` VARCHAR(100),
    `num_licencia_soft` VARCHAR(100),
    `version_soft` VARCHAR(10),
    `cant_soft` INTEGER(4),
    `fecha_compra_soft` DATETIME,
    `valor_soft` DOUBLE(11,2),
    `proveedor_soft` VARCHAR(60),
    `factura_soft` VARCHAR(20),
    `disponible_soft` INTEGER(4),
    CONSTRAINT `PK_software` PRIMARY KEY (`id_soft`)
);

# ---------------------------------------------------------------------- #
# Add table "equipo_software"                                            #
# ---------------------------------------------------------------------- #

CREATE TABLE `equipo_software` (
    `num_eq` VARCHAR(20) NOT NULL,
    `id_soft` INTEGER(11) NOT NULL,
    `cantidad` INTEGER(4),
    CONSTRAINT `PK_equipo_software` PRIMARY KEY (`num_eq`, `id_soft`)
);

# ---------------------------------------------------------------------- #
# Add table "parte"                                                      #
# ---------------------------------------------------------------------- #

CREATE TABLE `parte` (
    `id_part` INTEGER(11) NOT NULL AUTO_INCREMENT,
    `placa_part` VARCHAR(40),
    `marca_part` VARCHAR(40),
    `serial_part` VARCHAR(40),
    `fecha_compra_part` DATETIME,
    `proveedor_part` VARCHAR(50),
    `fecha_garantia_part` DATETIME,
    `factura_part` VARCHAR(40),
    `observacion_parte` BLOB,
    `num_eq` VARCHAR(20),
    `id_est` INTEGER(2),
    CONSTRAINT `PK_parte` PRIMARY KEY (`id_part`)
);

# ---------------------------------------------------------------------- #
# Add table "proveedor"                                                  #
# ---------------------------------------------------------------------- #

CREATE TABLE `proveedor` (
    `id_prove` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `nom_prove` VARCHAR(40),
    CONSTRAINT `PK_proveedor` PRIMARY KEY (`id_prove`)
);

# ---------------------------------------------------------------------- #
# Add table "tipo_us"                                                    #
# ---------------------------------------------------------------------- #

CREATE TABLE `tipo_us` (
    `id_tipo_usu` INTEGER(11) NOT NULL AUTO_INCREMENT,
    `nombre_tipo_usu` VARCHAR(50),
    CONSTRAINT `PK_tipo_us` PRIMARY KEY (`id_tipo_usu`)
);

# ---------------------------------------------------------------------- #
# Foreign key constraints                                                #
# ---------------------------------------------------------------------- #

ALTER TABLE `usuario` ADD CONSTRAINT `tipo_us_usuario` 
    FOREIGN KEY (`id_tipo_usu`) REFERENCES `tipo_us` (`id_tipo_usu`);

ALTER TABLE `ticket` ADD CONSTRAINT `equipo_ticket` 
    FOREIGN KEY (`num_eq`) REFERENCES `equipo` (`num_eq`);

ALTER TABLE `ticket` ADD CONSTRAINT `usuario_ticket` 
    FOREIGN KEY (`id_usu`) REFERENCES `usuario` (`id_usu`);

ALTER TABLE `equipo` ADD CONSTRAINT `tipo_equipo_equipo` 
    FOREIGN KEY (`id_tip`) REFERENCES `tipo_equipo` (`id_tip`);

ALTER TABLE `equipo` ADD CONSTRAINT `dependencia_equipo` 
    FOREIGN KEY (`id_dep`) REFERENCES `dependencia` (`id_dep`);

ALTER TABLE `equipo` ADD CONSTRAINT `estado_equipo` 
    FOREIGN KEY (`id_est`) REFERENCES `estado` (`id_est`);

ALTER TABLE `equipo` ADD CONSTRAINT `proveedor_equipo` 
    FOREIGN KEY (`id_prove`) REFERENCES `proveedor` (`id_prove`);

ALTER TABLE `equipo` ADD CONSTRAINT `usuario_equipo` 
    FOREIGN KEY (`id_usu`) REFERENCES `usuario` (`id_usu`);

ALTER TABLE `equipo_software` ADD CONSTRAINT `equipo_equipo_software` 
    FOREIGN KEY (`num_eq`) REFERENCES `equipo` (`num_eq`);

ALTER TABLE `equipo_software` ADD CONSTRAINT `software_equipo_software` 
    FOREIGN KEY (`id_soft`) REFERENCES `software` (`id_soft`);

ALTER TABLE `parte` ADD CONSTRAINT `equipo_parte` 
    FOREIGN KEY (`num_eq`) REFERENCES `equipo` (`num_eq`);

ALTER TABLE `parte` ADD CONSTRAINT `estado_parte` 
    FOREIGN KEY (`id_est`) REFERENCES `estado` (`id_est`);
