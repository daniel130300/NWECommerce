-- Table VentasProductos

CREATE TABLE `ventasproductos`
(
  `ProdId` Int NOT NULL,
  `VentaId` Int NOT NULL,
  `VentasProdCantidad` Int NOT NULL,
  `VentasProdPrecioVenta` Decimal(9,2) NOT NULL
)
;

ALTER TABLE `VentasProductos` ADD PRIMARY KEY (`ProdId`, `VentaId`)
;
