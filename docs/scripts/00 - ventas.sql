-- Table ventas

CREATE TABLE `ventas`
(
  `VentaId` Int NOT NULL AUTO_INCREMENT,
  `VentaFecha` Datetime NOT NULL,
  `VentaISV` Decimal(9,2) NOT NULL,
  `VentaEst` Varchar(10) NOT NULL,
  `VentaTipoPago` Varchar(10) NOT NULL,
  `VentaPagoEnvio` Decimal(9,2),
  `ClienteDireccion` Char(180),
  `ClienteTelefono` Char(20),
  `UsuarioId` Int,
  PRIMARY KEY (`VentaId`)
)
;

CREATE INDEX `IX_Relationship9` ON `Ventas` (`UsuarioId`)
;
