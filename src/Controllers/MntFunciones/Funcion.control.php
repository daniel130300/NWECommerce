<?php 

namespace Controllers\MntFunciones;

class Funcion extends \Controllers\PrivateController
{
    public function __construct()
    {
        //$userInRole = \Utilities\Security::isInRol(
        //    \Utilities\Security::getUserId(),
        //    "ADMIN"
        //);
        parent::__construct();
    }

    private $fncod = "";
    private $fndsc = "";
    private $fnest = "";
    private $fntyp = "";
    private $fnest_ACT = "";
    private $fnest_INA = "";
    private $fntyp_CTR = "";
    private $fntyp_SPR = "";

    private $mode_dsc = "";
    private $mode_adsc = array(
        "INS" => "Nueva Funcion",
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
        $this->fncod = isset($_GET["fncod"])?$_GET["fncod"]:"";
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
                    if (\Dao\MntFunciones\Funciones::insert($this->fncod, $this->fndsc, $this->fnest, $this->fntyp)) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mntFunciones_funciones",
                            "¡Función Agregada Satisfactoriamente!"
                        );
                    }
                    break;
                case "UPD":
                    if (\Dao\MntFunciones\Funciones::update($this->fndsc, $this->fnest, $this->fntyp , $this->fncod)) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mntFunciones_funciones",
                            "¡Función Actualizada Satisfactoriamente!"
                        );
                    }
                    break;
                case "DEL":
                    if (\Dao\MntFunciones\Funciones::delete($this->fncod)) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mntFunciones_funciones",
                            "¡Función Eliminada Satisfactoriamente!"
                        );
                    }
                    break;
                }
            }
        }

        $dataview = get_object_vars($this);
        \Views\Renderer::render("mntFunciones/funcion", $dataview);
    }

    private function _load()
    {
        $_data = \Dao\MntFunciones\Funciones::getOne($this->fncod);
        if ($_data) {
            $this->fncod = $_data["fncod"];
            $this->fndsc = $_data["fndsc"];
            $this->fnest = $_data["fnest"];
            $this->fntyp = $_data["fntyp"];
            $this->_setViewData();
        }
    }

    private function _loadPostData()
    {
        $this->fncod = isset($_POST["fncod"]) ? $_POST["fncod"] : "" ;
        $this->fndsc = isset($_POST["fndsc"]) ? $_POST["fndsc"] : "" ;
        $this->fnest = isset($_POST["fnest"]) ? $_POST["fnest"] : "" ;
        $this->fntyp = isset($_POST["fntyp"]) ? $_POST["fntyp"] : "" ;

        //validaciones
        //aplicar todas la reglas de negocio
        if (preg_match('/^\s*$/', $this->fndsc)) {
            $this->aErrors[] = "¡La descripcion no puede ir vacia!";
        }
        //
        $this->hasErrors = (count($this->aErrors) > 0);
        $this->_setViewData();
    }

    private function _setViewData()
    {
        $this->fntyp_CTR = ($this->fntyp === "CTR") ? "selected" : "";
        $this->fntyp_SPR = ($this->fntyp === "SPR") ? "selected" : "";
        $this->fnest_ACT = ($this->fnest === "ACT") ? "selected" : "";
        $this->fnest_INA = ($this->fnest === "INA") ? "selected" : "";
        $this->mode_dsc = sprintf(
            $this->mode_adsc[$this->mode],
            $this->fncod,
            $this->fndsc
        );
        $this->readonly = ($this->mode =="DEL" || $this->mode=="DSP") ? "readonly":"";
        $this->showaction = !($this->mode == "DSP");
    }
}

?>