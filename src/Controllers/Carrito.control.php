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
            else
            {
                $this->mostarProductosCarritoUsuario();
            }
        }
        else
        {   
            if(!\Utilities\Security::isLogged())
            {
                $this->eliminarProductoCarritoAnonimo();
            }
            else
            {
                $this->eliminarProductoCarritoUsuario();
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
        $ProdCantidad = isset($_POST["ProdCantidad"])?$_POST["ProdCantidad"]:"";

        if(!empty($ProdId) && !empty($ProdCantidad))
        {
            $resultDelete = \Dao\Client\CarritoAnonimo::deleteProductoCarritoAnonimo(session_id(), $ProdId);
            $resultUpdate = \Dao\Client\CarritoAnonimo::sumarProductoInventarioAnonimo($ProdId, $ProdCantidad);

            if($resultDelete && $resultUpdate)
            {
                \Utilities\Site::redirectToWithMsg("index.php?page=carrito", "Producto Eliminado con Éxito");
            }
        }
    }

    private function mostarProductosCarritoUsuario()
    {
        $UsuarioId = \Utilities\Security::getUserId();

        $this->Items = \Dao\Client\CarritoUsuario::getProductosCarritoUsuario($UsuarioId);

        //Reformatear valor desde la base con decimales
        foreach($this->Items as $key => $value)
        {
            $this->Items[$key]["ProdPrecioVenta"] = number_format($value["ProdPrecioVenta"], 2);
            $this->Items[$key]["TotalProducto"] = number_format($value["TotalProducto"], 2);
        }

        $this->Total = \Dao\Client\CarritoUsuario::getTotalCarrito($UsuarioId);

        //Reformatear valor desde la base con decimales
        $this->Total = number_format($this->Total["Total"], 2);
    }

    private function eliminarProductoCarritoUsuario()
    {
        $UsuarioId = \Utilities\Security::getUserId();
        $ProdId = isset($_POST["ProdId"])?$_POST["ProdId"]:"";
        $ProdCantidad = isset($_POST["ProdCantidad"])?$_POST["ProdCantidad"]:"";

        if(!empty($ProdId) && !empty($ProdCantidad))
        {   
            $resultDelete = \Dao\Client\CarritoUsuario::deleteProductoCarritoUsuario($UsuarioId, $ProdId);
            $resultUpdate = \Dao\Client\CarritoUsuario::sumarProductoInventarioAnonimo($ProdId, $ProdCantidad);

            if($resultDelete && $resultUpdate)
            {
                \Utilities\Site::redirectToWithMsg("index.php?page=carrito", "Producto Eliminado con Éxito");
            }
        }
    }
}