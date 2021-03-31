<?php 

namespace Controllers\Admin;

class FuncionRol extends \Controllers\PublicController
{
    private $RolId = 0;
    private $FuncionId = "";
    private $FuncionRolEst = "";
    private $FuncionExp = "";
    private $FuncionRolEst_ACT = "";
    private $FuncionRolEst_INA = "";

    private $mode = "";
    private $mode_dsc = "";
    private $mode_adsc = array(
        "INS" => "Añadir Funciones a Rol",
        "UPD" => "Editar Rol: %s Función: %s",
        "DEL" => "Eliminar Rol: %s Función: %s",
        "DSP" => "Visualizar Rol: %s Función: %s"
    );
    private $minimumDate = "";

    private $onlyDisplayIns = true;
    private $notDisplayIns = false;
    private $allInfoDisplayed = false;
    private $disabled = "";
    private $readonly = "";
    private $showaction= true;

    private $hasErrors = false;
    private $aErrors = array();

    private $roles = array();
    private $funciones = array();

    public function run() :void
    {
        $this->roles = \Dao\Mnt\FuncionesRoles::getRoles();
        $this->funciones = \Dao\Mnt\FuncionesRoles::getFunciones();

        $this->minimumDate = date('Y-m-d', time() + 31104000);  //(12*30*24*60*60) (m d h mi s));
        $this->mode = isset($_GET["mode"])?$_GET["mode"]:"";
        $this->RolId = isset($_GET["RolId"])?$_GET["RolId"]:"";
        $this->FuncionId = isset($_GET["FuncionId"])?$_GET["FuncionId"]:"";

        if (!$this->isPostBack()) 
        {
            if ($this->mode !== "INS") 
            {
                $this->_load();
            } 
            else 
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
                        if (\Dao\Mnt\FuncionesRoles::insert($this->RolId, $this->FuncionId, $this->FuncionExp)) 
                        {
                            \Utilities\Site::redirectToWithMsg(
                                "index.php?page=admin_funcionesroles",
                                "¡Funcion por Rol Agregada Satisfactoriamente!"
                            );
                        }
                    break;

                    case "UPD":
                        if (\Dao\Mnt\FuncionesRoles::update($this->RolId, $this->FuncionId, $this->FuncionRolEst, $this->FuncionExp)) 
                        {
                            \Utilities\Site::redirectToWithMsg(
                                "index.php?page=admin_funcionesroles",
                                "¡Funcion por Rol Actualizada Satisfactoriamente!"
                            );
                        }
                    break;

                    case "DEL":
                        if (\DAO\Mnt\FuncionesRoles::delete($this->RolId, $this->FuncionId)) 
                        {
                            \Utilities\Site::redirectToWithMsg(
                                "index.php?page=admin_funcionesroles",
                                "¡Funcion por Rol Eliminada Satisfactoriamente!"
                            );
                        }
                    break;
                }
            }
        }

        $dataview = get_object_vars($this);
        \Views\Renderer::render("admin/funcionrol", $dataview);
    }

    private function _load()
    {
        $_data = \Dao\Mnt\FuncionesRoles::getOne($this->RolId, $this->FuncionId);
        if ($_data) 
        {
            $this->RolId = $_data["RolId"];
            $this->FuncionId = $_data["FuncionId"];
            $this->FuncionRolEst = $_data["FuncionRolEst"];

            $date = isset($_data["FuncionExp"]) ? $_data["FuncionExp"] : "";
            $this->FuncionExp = date("Y-m-d", strtotime($date));

            $this->_setViewData();
        }
    }

    private function _loadPostData()
    {
        $this->RolId = isset($_POST["RolId"]) ? $_POST["RolId"] : 0 ;
        $this->FuncionId = isset($_POST["FuncionId"]) ? $_POST["FuncionId"] : "" ;
        $this->FuncionRolEst = isset($_POST["FuncionRolEst"]) ? $_POST["FuncionRolEst"] : "";
        $this->FuncionExp = isset($_POST["FuncionExp"]) ? $_POST["FuncionExp"] : "";

        if (\Utilities\Validators::IsEmpty($this->RolId)) 
        {
            $this->aErrors[] = "El rol no puede ir vacío.";
        }

        if (\Utilities\Validators::IsEmpty($this->FuncionId)) 
        {
            $this->aErrors[] = "La funcion no puede ir vacía.";
        }

        if (\Utilities\Validators::IsEmpty($this->FuncionExp)) 
        {
            $this->aErrors[] = "La fecha de expiración no puede ir vacía.";
        }

        $this->hasErrors = (count($this->aErrors) > 0);
        $this->_setViewData();
    }

    private function _setViewData()
    {
        $this->FuncionRolEst_ACT = ($this->FuncionRolEst === "ACT") ? "selected" : "";
        $this->FuncionRolEst_INA = ($this->FuncionRolEst === "INA") ? "selected" : "";

        $this->mode_dsc = sprintf(
            $this->mode_adsc[$this->mode],
            $this->RolId,
            $this->FuncionId
        );

        $this->onlyDisplayIns = ($this->mode=="INS") ? true: false;
        $this->notDisplayIns = ($this->mode=="INS") ? false : true;
        $this->disabled = ($this->mode == "INS" || $this->mode =="DEL" || $this->mode =="DSP") ? "disabled" : "";
        $this->readonly = ($this->mode =="DEL" || $this->mode=="DSP") ? "readonly" : "";
        $this->allInfoDisplayed = ($this->mode =="DEL" || $this->mode=="DSP") ? true : false;
        $this->showaction = !($this->mode == "DSP");
    }
}

?>