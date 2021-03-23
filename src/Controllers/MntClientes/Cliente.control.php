<?php 

namespace Controllers\MntClientes;

class Cliente extends \Controllers\PublicController
{
    private $clientid = 0;
    private $clientname = "";
    private $clientgender = "";
    private $clientphone1 = "";
    private $clientphone2 = "";
    private $clientemail = "";
    private $clientIdnumber = "";
    private $clientbio = "";
    private $clientstatus = "";
    private $clientdatecrt = "";
    private $clientusercreates = "";
    private $clientstatus_ACT = "";
    private $clientstatus_INA = "";
    private $clientgender_M = "";
    private $clientgender_F = "";

    private $mode_dsc = "";
    private $mode_adsc = array(
        "INS" => "Nuevo Cliente",
        "UPD" => "Editar %s %s",
        "DEL" => "Eliminar %s %s",
        "DSP" => "%s %s"
    );

    private $readonly = "";
    private $showaction= true;

    private $hasErrors = false;
    private $aErrors = array();

    public function run() :void
    {
        
        $this->mode = isset($_GET["mode"])?$_GET["mode"]:"";
        $this->clientid = isset($_GET["clientid"])?$_GET["clientid"]:0;
        if (!$this->isPostBack()) {
            if ($this->mode !== "INS") {
                $this->_load();
            } else {
                $this->mode_dsc = $this->mode_adsc[$this->mode];
            }
        } else {
            $this->_loadPostData();
            if (!$this->hasErrors) {
                switch ($this->mode){
                case "INS":
                    if (\Dao\MntClientes\Clientes::insert($this->clientname, $this->clientgender, $this->clientphone1, $this->clientphone2, $this->clientemail, $this->clientIdnumber, $this->clientbio, $this->clientstatus, $this->clientdatecrt, $this->clientusercreates)) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mntClientes_clientes",
                            "¡Cliente Agregado Satisfactoriamente!"
                        );
                    }
                    break;
                case "UPD":
                    if (\Dao\MntClientes\Clientes::update($this->clientname, $this->clientgender, $this->clientphone1, $this->clientphone2, $this->clientemail, $this->clientIdnumber, $this->clientbio, $this->clientstatus, $this->clientdatecrt, $this->clientusercreates, $this->clientid)) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mntClientes_clientes",
                            "¡Cliente Actualizado Satisfactoriamente!"
                        );
                    }
                    break;
                case "DEL":
                    if (\Dao\MntClientes\Clientes::delete($this->clientid)) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mntClientes_clientes",
                            "¡Cliente Eliminado Satisfactoriamente!"
                        );
                    }
                    break;
                }
            }
        }

        $dataview = get_object_vars($this);
        \Views\Renderer::render("mntClientes/cliente", $dataview);
    }

    private function _load()
    {
        $_data = \Dao\MntClientes\Clientes::getOne($this->clientid);
        if ($_data) {
            $this->clientid = $_data["clientid"];
            $this->clientname = $_data["clientname"];
            $this->clientgender = $_data["clientgender"];
            $this->clientphone1 = $_data["clientphone1"];
            $this->clientphone2 = $_data["clientphone2"];
            $this->clientemail = $_data["clientemail"];
            $this->clientIdnumber = $_data["clientIdnumber"];
            $this->clientbio = $_data["clientbio"];
            $this->clientstatus = $_data["clientstatus"];
            $this->clientdatecrt = $_data["clientdatecrt"];
            $this->clientusercreates = $_data["clientusercreates"];
            $this->_setViewData();
        }
    }

    private function _loadPostData()
    {
        $this->clientid = isset($_POST["clientid"]) ? $_POST["clientid"] : 0 ;
        $this->clientname = isset($_POST["clientname"]) ? $_POST["clientname"] : "" ;
        $this->clientgender = isset($_POST["clientgender"]) ? $_POST["clientgender"] : "" ;
        $this->clientphone1 = isset($_POST["clientphone1"]) ? $_POST["clientphone1"] : "" ;
        $this->clientphone2 = isset($_POST["clientphone2"]) ? $_POST["clientphone2"] : "" ;
        $this->clientemail = isset($_POST["clientemail"]) ? $_POST["clientemail"] : "" ;
        $this->clientIdnumber = isset($_POST["clientIdnumber"]) ? $_POST["clientIdnumber"] : "" ;
        $this->clientbio = isset($_POST["clientbio"]) ? $_POST["clientbio"] : "" ;
        $this->clientstatus = isset($_POST["clientstatus"]) ? $_POST["clientstatus"] : "ACT" ;
        $this->clientdatecrt = date('Y/m/d H:i:s');
        $this->clientusercreates = isset($_POST["clientusercreates"]) ? $_POST["clientusercreates"] : "" ;

        //validaciones
        //aplicar todas la reglas de negocio
        if (preg_match('/^\s*$/', $this->clientname)) {
            $this->aErrors[] = "¡El nombre no puede ir vacio!";
        }
        //
        $this->hasErrors = (count($this->aErrors) > 0);
        $this->_setViewData();
    }

    private function _setViewData()
    {
        $this->clientgender_M = ($this->clientgender === "M") ? "selected" : "";
        $this->clientgender_F = ($this->clientgender === "F") ? "selected" : "";
        $this->clientstatus_ACT = ($this->clientstatus === "ACT") ? "selected" : "";
        $this->clientstatus_INA = ($this->clientstatus === "INA") ? "selected" : "";
        $this->mode_dsc = sprintf(
            $this->mode_adsc[$this->mode],
            $this->clientid,
            $this->clientname
        );
        $this->readonly = ($this->mode =="DEL" || $this->mode=="DSP") ? "readonly":"";
        $this->showaction = !($this->mode == "DSP");
    }
}

?>