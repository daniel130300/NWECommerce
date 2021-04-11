<?php

namespace Controllers;

class DireccionEntrega extends PublicController
{

    private $DireccionDepartamento = "";
    private $DireccionCiudad = "";
    private $Direccion1 = "";
    private $Direccion2 = "";
    private $NumeroTelefonoCelular = "";

    public function run() :void
    {

        $UsuarioId = \Utilities\Security::getUserId();
        $getProductos = \Dao\Client\CarritoUsuario::getProductosCarritoUsuario($UsuarioId);
       
        if($this->isPostBack())
        {
            $this->_loadPostData();
        }

        if(empty($UsuarioId))
        {
            \Utilities\Site::redirectToWithMsg("index.php?page=sec_login", "Es necesario iniciar sesión para continuar");
        }
        else
        {
            \Utilities\Site::redirectTo("index.php");
        }
        //$dataview = get_object_vars($this);
            //\Views\Renderer::render("direccionentrega", $dataview);
    }

    private function _loadPostData()
    {
        $this->DireccionDepartamento = isset($_POST["DireccionDepartamento"]) ? $_POST["DireccionDepartamento"] : "";
        $this->DireccionCiudad = isset($_POST["DireccionCiudad"]) ? $_POST["DireccionCiudad"] : "";
        $this->Direccion1 = isset($_POST["Direccion1"]) ? $_POST["Direccion1"] : "";
        $this->Direccion2 = isset($_POST["Direccion2"]) ? $_POST["Direccion2"] : "";
        $this->NumeroTelefonoCelular = isset($_POST["NumeroTelefonoCelular"]) ? $_POST["NumeroTelefonoCelular"] : "";

        if (\Utilities\Validators::IsEmpty($this->DireccionDepartamento)) 
        {
            $this->aErrors[] = "¡El departamento no puede ir vacío!";
        }

        if (!\Utilities\Validators::ValidarSoloLetras($this->DireccionDepartamento)) 
        {
            $this->aErrors[] = "¡El departamento ingresado no es válido!";
        }

        if (\Utilities\Validators::IsEmpty($this->DireccionCiudad)) 
        {
            $this->aErrors[] = "¡La ciudad no puede ir vacía!";
        }

        if (!\Utilities\Validators::ValidarSoloLetras($this->DireccionCiudad)) 
        {
            $this->aErrors[] = "¡La ciudad ingresada no es válida!";
        }

        if (\Utilities\Validators::IsEmpty($this->Direccion1)) 
        {
            $this->aErrors[] = "¡La dirección 1 no puede ir vacía!";
        }

        if (\Utilities\Validators::IsEmpty($this->NumeroTelefonoCelular)) 
        {
            $this->aErrors[] = "¡El télefono o celular no puede ir vacío!";
        }

        if (!\Utilities\Validators::ValidarTelefonoCelular($this->NumeroTelefonoCelular)) 
        {
            $this->aErrors[] = "¡El número de télefono o celular no es válido!";
        }

        $this->hasErrors = (count($this->aErrors) > 0);
    }
}
?>