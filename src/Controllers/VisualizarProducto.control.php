<?php
namespace Controllers;

use Dao\Dao;

class VisualizarProducto extends \Controllers\PublicController
{
    private $ProdId = 0;
    private $ProdId2 = 0;
    private $ProdNombre = "";
    private $ProdDescripcion = "";
    private $ProdPrecioVenta = "";
    private $PrimaryMediaDoc = "";
    private $PrimaryMediaPath = "";
    private $AllProductMedia = array(); 

    private $mode_dsc = "";

    public function run() :void
    {
        if(!$this->isPostBack()) 
        {
            $this->ProdId = isset($_GET["ProdId"])?$_GET["ProdId"]:0;
            $this->_load();
            $dataview = get_object_vars($this);
            \Views\Renderer::render("visualizarproducto", $dataview);
        }
        else
        {
            $this->ProdId2 =  isset($_POST["ProdId"])?$_POST["ProdId"]:"";
            
        } 
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