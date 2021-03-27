<?php 

namespace Controllers\MntUsuarios;

use Dao\Dao;

class Usuario extends \Controllers\PublicController
{
    public function __construct()
    {
        //$userInRole = \Utilities\Security::isInRol(
        //    \Utilities\Security::getUserId(),
        //    "ADMIN"
        //);
        parent::__construct();
    }

    private $usercod = 0;
    private $useremail = "";
    private $username = "";
    private $userpswd = "";
    private $userfching = "";
    private $userpswdest = "";
    private $userpswdexp = "";
    private $userest = "";
    private $useractcod = "";
    private $userpswdchg = "";
    private $usertipo = "";
    private $userest_ACT = "";
    private $userest_INA = "";
    private $usertipo_PBL = "";
    private $usertipo_ADM = "";
    private $usertipo_AUD = "";

    private $mode_dsc = "";
    private $mode_adsc = array(
        "INS" => "Nuevo Usuario",
        "UPD" => "Editar %s %s",
        "DEL" => "Eliminar %s %s",
        "DSP" => "%s %s"
    );

    private $readonly = "";
    private $displayPwd = "block";
    private $display = "none";
    private $showaction= true;

    private $hasErrors = false;
    private $aErrors = array();

    public function run() :void
    {

        $this->mode = isset($_GET["mode"])?$_GET["mode"]:"";
        $this->usercod = isset($_GET["usercod"])?$_GET["usercod"]:"";
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
                    if (\Dao\Security\Security::newUsuario($this->useremail, $this->userpswd)) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mntUsuarios_usuarios",
                            "¡Usuario Agregado Satisfactoriamente!"
                        );
                    }
                    break;
                case "UPD":
                    if (\Dao\MntUsuarios\Usuarios::update($this->useremail, $this->username, $this->userpswdest, $this->userpswdexp, $this->userest, $this->useractcod, $this->userpswdchg, $this->usertipo, $this->usercod)) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mntUsuarios_usuarios",
                            "¡Usuario Actualizado Satisfactoriamente!"
                        );
                    }
                    break;
                case "DEL":
                    if (\Dao\MntUsuarios\Usuarios::delete($this->usercod)) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mntUsuarios_usuarios",
                            "¡Usuario Eliminado Satisfactoriamente!"
                        );
                    }
                    break;
                }
            }
        }

        $dataview = get_object_vars($this);
        \Views\Renderer::render("mntUsuarios/usuario", $dataview);
    }

    private function _load()
    {
        $_data = \Dao\MntUsuarios\Usuarios::getOne($this->usercod);
        if ($_data) {
            $this->usercod = $_data["usercod"];
            $this->useremail = $_data["useremail"];
            $this->username = $_data["username"];
            $this->userfching = $_data["userfching"];
            $this->userpswdest = $_data["userpswdest"];
            $this->userpswdexp = $_data["userpswdexp"];
            $this->userest = $_data["userest"];
            $this->useractcod = $_data["useractcod"];
            $this->userpswdchg = $_data["userpswdchg"];
            $this->usertipo = $_data["usertipo"];
            $this->_setViewData();
        }
    }

    private function _loadPostData()
    {

        if ($this->mode == "INS") {

            $this->usercod = isset($_POST["usercod"]) ? $_POST["usercod"] : 0 ;
            $this->useremail = isset($_POST["useremail"]) ? $_POST["useremail"] : "" ;
            $this->userpswd = isset($_POST["userpswd"]) ? $_POST["userpswd"] : "";

            //validaciones
            //aplicar todas la reglas de negocio
            if (\Utilities\Validators::IsEmpty($this->useremail)) {
                $this->aErrors[] = "Correo no puede ir vacio";
            }
            if (!\Utilities\Validators::IsValidEmail($this->useremail)) {
                $this->aErrors[] = "Correo no es válido";
            }
            if (!\Utilities\Validators::IsValidPassword($this->userpswd)) {
                $this->aErrors[] = "Contraseña debe ser almenos 8 caracteres, 1 número, 1 mayúscula, 1 símbolo especial";
            }

        } else {

            $this->usercod = isset($_POST["usercod"]) ? $_POST["usercod"] : 0 ;

            $_info = \Dao\MntUsuarios\Usuarios::getOne($this->usercod);

            $this->useremail = isset($_POST["useremail"]) ? $_POST["useremail"] : "" ;
            $this->username = isset($_POST["username"]) ? $_POST["username"] : "" ;
            $this->userfching = isset($_POST["userfching"]) ? $_POST["userfching"] : $_info["userfching"];
            $this->userpswdest = isset($_POST["userpswdest"]) ? $_POST["userpswdest"] : $_info["userpswdest"];
            $this->userpswdexp = isset($_POST["userpswdexp"]) ? $_POST["userpswdexp"] : $_info["userpswdexp"];
            $this->userest = isset($_POST["userest"]) ? $_POST["userest"] : $_info["userest"];
            $this->userpswdchg = isset($_POST["userpswdchg"]) ? $_POST["userpswdchg"] : $_info["userpswdchg"];
            $this->usertipo = isset($_POST["usertipo"]) ? $_POST["usertipo"] : "" ;

            if ($this->usercod != 0) {
                $this->userfching = isset($_POST["userfching"]) ? $_POST["userfching"] : $_info["userfching"];
            } else {
                $this->userfching = date('Y/m/d H:i:s');
            }

            if ($_info["useremail"] != $this->useremail){
                $this->useractcod = hash("sha256", $this->useremail.time());
            } else {
                $this->useractcod = isset($_POST["useractcod"]) ? $_POST["useractcod"] : $_info["useractcod"];
            }

            //validaciones
            //aplicar todas la reglas de negocio
            if (\Utilities\Validators::IsEmpty($this->useremail)) {
                $this->aErrors[] = "Correo no puede ir vacio";
            }
            if (!\Utilities\Validators::IsValidEmail($this->useremail)) {
                $this->aErrors[] = "Correo no es válido";
            }
            if (\Utilities\Validators::IsEmpty($this->username)) {
                $this->aErrors[] = "El nombre no puede ir vacio";
            }
            //
        }

        $this->hasErrors = (count($this->aErrors) > 0);
        $this->_setViewData();
    }

    private function _setViewData()
    {
        $this->userest_ACT = ($this->userest === "ACT") ? "selected" : "";
        $this->userest_INA = ($this->userest === "INA") ? "selected" : "";
        $this->usertipo_PBL = ($this->usertipo === "PBL") ? "selected" : "";
        $this->usertipo_ADM = ($this->usertipo === "ADM") ? "selected" : "";
        $this->usertipo_AUD = ($this->usertipo === "AUD") ? "selected" : "";
        $this->mode_dsc = sprintf(
            $this->mode_adsc[$this->mode],
            $this->usercod,
            $this->useremail
        );
        $this->display = ($this->mode != "INS") ? "block" : "none";
        $this->displayPwd = ($this->mode != "INS") ? "none" : "block";
        $this->readonly = ($this->mode =="DEL" || $this->mode=="DSP") ? "readonly":"";
        $this->showaction = !($this->mode == "DSP");
    }
}

?>