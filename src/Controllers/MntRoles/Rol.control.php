<?php 

namespace Controllers\MntRoles;

class Rol extends \Controllers\PrivateController
{
    public function __construct()
    {
        //$userInRole = \Utilities\Security::isInRol(
        //    \Utilities\Security::getUserId(),
        //    "ADMIN"
        //);
        parent::__construct();
    }
    
    private $rolescod = "";
    private $rolesdsc = "";
    private $rolesest = "";
    private $rolesest_ACT = "";
    private $rolesest_INA = "";

    private $mode_dsc = "";
    private $mode_adsc = array(
        "INS" => "Nuevo Rol",
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
        $this->rolescod = isset($_GET["rolescod"])?$_GET["rolescod"]:"";
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
                    if (\Dao\MntRoles\Roles::insert($this->rolescod, $this->rolesdsc, $this->rolesest)) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mntRoles_roles",
                            "¡Rol Agregado Satisfactoriamente!"
                        );
                    }
                    break;
                case "UPD":
                    if (\Dao\MntRoles\Roles::update($this->rolesdsc, $this->rolesest, $this->rolescod)) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mntRoles_roles",
                            "¡Rol Actualizado Satisfactoriamente!"
                        );
                    }
                    break;
                case "DEL":
                    if (\Dao\MntRoles\Roles::delete($this->rolescod)) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mntRoles_roles",
                            "¡Rol Eliminado Satisfactoriamente!"
                        );
                    }
                    break;
                }
            }
        }

        $dataview = get_object_vars($this);
        \Views\Renderer::render("mntRoles/rol", $dataview);
    }

    private function _load()
    {
        $_data = \Dao\MntRoles\Roles::getOne($this->rolescod);
        if ($_data) {
            $this->rolescod = $_data["rolescod"];
            $this->rolesdsc = $_data["rolesdsc"];
            $this->rolesest = $_data["rolesest"];
            $this->_setViewData();
        }
    }

    private function _loadPostData()
    {
        $this->rolescod = isset($_POST["rolescod"]) ? $_POST["rolescod"] : "" ;
        $this->rolesdsc = isset($_POST["rolesdsc"]) ? $_POST["rolesdsc"] : "" ;
        $this->rolesest = isset($_POST["rolesest"]) ? $_POST["rolesest"] : "" ;

        //validaciones
        //aplicar todas la reglas de negocio
        if (preg_match('/^\s*$/', $this->rolesdsc)) {
            $this->aErrors[] = "¡La descripcion no puede ir vacia!";
        }
        //
        $this->hasErrors = (count($this->aErrors) > 0);
        $this->_setViewData();
    }

    private function _setViewData()
    {
        $this->rolesest_ACT = ($this->rolesest === "ACT") ? "selected" : "";
        $this->rolesest_INA = ($this->rolesest === "INA") ? "selected" : "";
        $this->mode_dsc = sprintf(
            $this->mode_adsc[$this->mode],
            $this->rolescod,
            $this->rolesdsc
        );
        $this->readonly = ($this->mode =="DEL" || $this->mode=="DSP") ? "readonly":"";
        $this->showaction = !($this->mode == "DSP");
    }
}

?>