<?php 
namespace Controllers\Mnt;

class Cliente extends \Controllers\PublicController
{
    private $clientid = 0;
    private $clientname = "";
    private $clientgender = "";
    private $clientphone1 = "";
    private $clientphone2 = "";
    private $clientemail ="";
    private $clientIdnumber = "";
    private $clientbio = "";
    private $clientstatus = "";
    private $clientusercreates = 1;

    private $clientstatus_ACT = "";
    private $clientstatus_INA = "";

    private $clientgender_MAS = "";
    private $clientgender_FEM = "";

    private $mode_dsc = "";
    private $mode_adsc = array(
        "INS" => "Nuevo Cliente",
        "UPD" => "Editar %s %s",
        "DEL" => "Eliminar %s %s",
        "DSP" => "%s %s"
    );

    private $disabled = "";
    private $readonly = "";
    private $showaction= true;

    private $hasErrors = false;
    private $aErrors = array();

    public function run() :void
    {
        
        $this->mode = isset($_GET["mode"]) ? $_GET["mode"] : "";
        $this->clientid = isset($_GET["clientid"]) ? $_GET["clientid"] : 0;

        if (!$this->isPostBack()) 
        {
            if ($this->mode !== "INS") 
            {
                $this->_load();
            } else 
            {
                $this->mode_dsc = $this->mode_adsc[$this->mode];
            }
        }
        else 
        {
            $this->_loadPostData();
            if (!$this->hasErrors) 
            {
                switch ($this->mode)
                {
                    case "INS":
                    if (\Dao\Mnt\Clientes::insert($this->clientname, $this->clientgender, $this->clientphone1, 
                    $this->clientphone2, $this->clientemail, $this->clientIdnumber, $this->clientbio, 
                    $this->clientstatus, $this->clientusercreates)) 
                    {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_clientes",
                            "¡Cliente Agregado Satisfactoriamente!"
                        );
                    }
                    break;
                    case "UPD":
                    if (\Dao\Mnt\Clientes::update($this->clientname, $this->clientgender, $this->clientphone1, 
                    $this->clientphone2, $this->clientemail, $this->clientIdnumber, $this->clientbio, 
                    $this->clientstatus, $this->clientid)) 
                    {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_clientes",
                            "¡Cliente Actualizado Satisfactoriamente!"
                        );
                    }
                    break;
                    case "DEL":
                    if (\Dao\Mnt\Clientes::delete($this->clientid)) 
                    {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_clientes",
                            "¡Cliente Eliminado Satisfactoriamente!"
                        );
                    }
                    break;
                }
            }
        } 
        
        $dataview = get_object_vars($this);
        \Views\Renderer::render("mnt/cliente", $dataview);
    }
    
    private function _load()
    {
        $_data = \Dao\Mnt\Clientes::getOne($this->clientid);
        if ($_data) 
        {
            $this->clientid = $_data["clientid"];
            $this->clientname = $_data["clientname"];
            $this->clientgender = $_data["clientgender"];
            $this->clientphone1 = $_data["clientphone1"];
            $this->clientphone2 = $_data["clientphone2"];
            $this->clientemail = $_data["clientemail"];
            $this->clientIdnumber = $_data["clientIdnumber"];
            $this->clientbio = $_data["clientbio"];
            $this->clientstatus = $_data["clientstatus"];
            $this->_setViewData();
        }
    }

    private function _loadPostData()
    {
        $this->clientid = isset($_POST["clientid"]) ? $_POST["clientid"] : "";
        $this->clientname = isset($_POST["clientname"]) ? $_POST["clientname"] : "";
        $this->clientgender = isset($_POST["clientgender"]) ? $_POST["clientgender"] : "";
        $this->clientphone1 = isset($_POST["clientphone1"]) ? $_POST["clientphone1"] : "";
        $this->clientphone2 = isset($_POST["clientphone2"]) ? $_POST["clientphone2"] : "";
        $this->clientemail = isset($_POST["clientemail"]) ? $_POST["clientemail"] : "";
        $this->clientIdnumber = isset($_POST["clientIdnumber"]) ? $_POST["clientIdnumber"] : "";
        $this->clientbio = isset($_POST["clientbio"]) ? $_POST["clientbio"] : "";
        $this->clientstatus = isset($_POST["clientstatus"]) ? $_POST["clientstatus"] : "ACT";

        //validaciones
        //aplicar todas la reglas de negocio

        if (\Utilities\ArrUtils::validarCampoVacío($this->clientIdnumber)) 
        {
            $this->aErrors[] = "¡La identidad del cliente no puede ir vacia!";
        }

        if (\Utilities\ArrUtils::validarSoloNumeros($this->clientIdnumber)) 
        {
            $this->aErrors[] = "¡La identidad del cliente no puede contener letras, solo números!";
        }

        if (\Utilities\ArrUtils::validarCampoVacío($this->clientname)) 
        {
            $this->aErrors[] = "¡El nombre del cliente no puede ir vacio!";
        }

        if (\Utilities\ArrUtils::validarSoloLetras($this->clientname)) 
        {
            $this->aErrors[] = "¡El nombre del cliente no puede contener números, solo letras!";
        }

        if (\Utilities\ArrUtils::validarCampoVacío($this->clientbio)) 
        {
            $this->aErrors[] = "¡La biografía del cliente no puede ir vacia!";
        }

        if (\Utilities\ArrUtils::validarCampoVacío($this->clientphone1)) 
        {
            $this->aErrors[] = "¡El primer telefono del cliente no puede ir vacio!";
        }

        if (\Utilities\ArrUtils::validarCampoVacío($this->clientemail)) 
        {
            $this->aErrors[] = "¡El correo del cliente no puede ir vacio!";
        }
        
        $this->hasErrors = (count($this->aErrors) > 0);
        $this->_setViewData();
    }


    private function _setViewData()
    {
        $this->clientstatus_ACT = ($this->clientstatus === "ACT") ? "selected" : "";
        $this->clientstatus_INA = ($this->clientstatus === "INA") ? "selected" : "";

        $this->clientgender_MAS = ($this->clientgender === "MAS") ? "selected" : "";
        $this->clientgender_FEM = ($this->clientgender === "FEM") ? "selected" : "";

        $this->mode_dsc = sprintf(
            $this->mode_adsc[$this->mode],
            $this->clientid,
            $this->clientname
        );

        $this->disabled = ($this->mode == "INS" || $this->mode =="DEL" || $this->mode =="DSP") ? "disabled" : "";
        $this->readonly = ($this->mode =="DEL" || $this->mode=="DSP") ? "readonly" : "";
        $this->showaction = !($this->mode == "DSP");
    }    
}

?>
