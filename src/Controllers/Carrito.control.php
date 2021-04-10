<?php

namespace Controllers;

class Carrito extends \Controllers\PublicController
{
    private $Items = array();
    private $Total = "";

    public function run() :void
    {
        if(!$this->isPostBack()) 
        {
            if(!\Utilities\Security::isLogged())
            {
               $this->mostarProductosCarritoAnonimo();
            }
        }
        else
        {   
            if(!\Utilities\Security::isLogged())
            {
                $this->eliminarProductoCarritoAnonimo();
            }
        }

        $layout = "layout.view.tpl";

        if(\Utilities\Security::isLogged())
        {
            $layout = "privatelayout.view.tpl";
            \Utilities\Nav::setNavContext();
        }

        $allViewData= get_object_vars($this);
        \Views\Renderer::render("carrito", $allViewData, $layout);
    }

    private function mostarProductosCarritoAnonimo()
    {
        $this->Items = \Dao\Client\CarritoAnonimo::getProductosCarritoAnonimo(session_id());

        //Reformatear valor desde la base con decimales
        foreach($this->Items as $key => $value)
        {
            $this->Items[$key]["ProdPrecioVenta"] = number_format($value["ProdPrecioVenta"], 2);
            $this->Items[$key]["TotalProducto"] = number_format($value["TotalProducto"], 2);
        }

        $this->Total = \Dao\Client\CarritoAnonimo::getTotalCarrito(session_id());

        //Reformatear valor desde la base con decimales
        $this->Total = number_format($this->Total["Total"], 2);
    }

    private function eliminarProductoCarritoAnonimo()
    {
        $ProdId = isset($_POST["ProdId"])?$_POST["ProdId"]:"";

        if(!empty($ProdId))
        {
            if(\Dao\Client\CarritoAnonimo::deleteProductoCarritoAnonimo(session_id(), $ProdId))
            {
                \Utilities\Site::redirectToWithMsg("index.php?page=carrito", "Producto Eliminado con Éxito");
            }
        }
    }
}