<?php
namespace Controllers;

use Dao\Dao;

class VisualizarProducto extends \Controllers\PublicController
{
    private $ProdId = 0;
    private $ProdNombre = "";
    private $ProdDescripcion = "";
    private $ProdPrecioVenta = "";
    private $ProdCantidad = "";
    private $PrimaryMediaDoc = "";
    private $PrimaryMediaPath = "";
    private $AllProductMedia = array(); 

    private $mode_dsc = "";

    public function run() :void
    {
        $this->ProdId = isset($_GET["ProdId"])?$_GET["ProdId"]:0;

        if($this->isPostBack()) 
        {
            $this->ProdPrecioVenta = isset($_POST["ProdPrecioVenta"])?$_POST["ProdPrecioVenta"]:""; 
            $this->ProdCantidad = isset($_POST["ProdCantidad"])?$_POST["ProdCantidad"]:""; 

            $this->ProdPrecioVenta = floatval(str_replace(",","",$this->ProdPrecioVenta));

            if(!\Utilities\Security::isLogged())
            {
                $_comprobar = \Dao\Client\CarritoAnonimo::comprobarProductoEnCarritoAnonimo(session_id(), $this->ProdId);

                if(empty($_comprobar))
                {
                    if(\Dao\Client\CarritoAnonimo::insertarProductoCarritoAnonimo(session_id(), $this->ProdId, $this->ProdCantidad, $this->ProdPrecioVenta))
                    {
                        \Utilities\Site::redirectToWithMsg("index.php?page=catalogoproductos&PageIndex=1", "Producto Agregado al Carrito con Éxito");
                    }
                }
                else
                {
                    if(\Dao\Client\CarritoAnonimo::deleteProductoCarritoAnonimo(session_id(), $this->ProdId))
                    {
                        \Dao\Client\CarritoAnonimo::insertarProductoCarritoAnonimo(session_id(), $this->ProdId, $this->ProdCantidad, $this->ProdPrecioVenta);
                        \Utilities\Site::redirectToWithMsg("index.php?page=catalogoproductos&PageIndex=1", "Producto Agregado al Carrito con Éxito");
                    }
                }
            }
        }

        $this->_load();
        $dataview = get_object_vars($this);
        \Views\Renderer::render("visualizarproducto", $dataview);
    }

    private function _load()
    {
        $_data = \Dao\Client\Productos::getOne($this->ProdId);
        $_productMedia = \Dao\Client\Productos::getAllProductMedia($this->ProdId);

        if ($_data) 
        {
            $this->ProdId = $_data["ProdId"];
            $this->ProdNombre = $_data["ProdNombre"];
            $this->ProdDescripcion = $_data["ProdDescripcion"];
            $precioFinal = ($_data["ProdPrecioVenta"]) + ($_data["ProdPrecioVenta"] * 0.15); 
            $this->ProdPrecioVenta = number_format($precioFinal, 2);
            $this->PrimaryMediaDoc = $_data["MediaDoc"];
            $this->PrimaryMediaPath = $_data["MediaPath"];
        }

        if($_productMedia)
        {
            $this->AllProductMedia = $_productMedia;
        }
    }
}