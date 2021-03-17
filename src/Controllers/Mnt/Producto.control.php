<?php 
namespace Controllers\Mnt;

class Producto extends \Controllers\PublicController
{
    
    private $invPrdId = 0;
    private $invPrdBrCod = "";
    private $invPrdDsc = "";
    private $invPrdTip = "";
    private $invPrdCodInt = "";
    private $invPrdFactor ="";
    private $invPrdVnd = "";
    private $invPrdEst = "";

    private $invPrdTip_EQG = "";
    private $invPrdTip_HGB = "";
    private $invPrdTip_BRA = "";
    private $invPrdTip_YE = "";

    private $invPrdFactor_1 = "";
    private $invPrdFactor_2 = "";
    private $invPrdFactor_3 = "";
    private $invPrdFactor_4 = "";

    private $invPrdVnd_DL = "";
    private $invPrdVnd_HL = "";
    private $invPrdVnd_JC = "";
    private $invPrdVnd_AG = "";

    private $invPrdEst_ACT = "";
    private $invPrdEst_INA = "";


    private $mode_dsc = "";
    private $mode_adsc = array(
        "INS" => "Nuevo Producto",
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
        $this->invPrdId= isset($_GET["invPrdId"]) ? $_GET["invPrdId"] : 0;

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
                    if (\Dao\Mnt\Productos::insert($this->invPrdBrCod, $this->invPrdCodInt, $this->invPrdDsc, 
                    $this->invPrdTip, $this->invPrdEst, $this->invPrdFactor, $this->invPrdVnd)) 
                    {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_productos",
                            "¡Producto Agregado Satisfactoriamente!"
                        );
                    }
                    break;
                    case "UPD":
                    if (\Dao\Mnt\Productos::update($this->invPrdBrCod, $this->invPrdCodInt, $this->invPrdDsc, 
                    $this->invPrdTip, $this->invPrdEst, $this->invPrdFactor, $this->invPrdVnd, $this->invPrdId)) 
                    {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_productos",
                            "¡Producto Actualizado Satisfactoriamente!"
                        );
                    }
                    break;
                    case "DEL":
                    if (\Dao\Mnt\Productos::delete($this->invPrdId)) 
                    {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_productos",
                            "¡Producto Eliminado Satisfactoriamente!"
                        );
                    }
                    break;
                }
            }
        } 
        
        $dataview = get_object_vars($this);
        \Views\Renderer::render("mnt/producto", $dataview);
    }
    
    private function _load()
    {
        $_data = \Dao\Mnt\Productos::getOne($this->invPrdId);
        if ($_data) 
        {
            $this->invPrdId = $_data["invPrdId"];
            $this->invPrdBrCod = $_data["invPrdBrCod"];
            $this->invPrdDsc = $_data["invPrdDsc"];
            $this->invPrdTip = $_data["invPrdTip"];
            $this->invPrdCodInt = $_data["invPrdCodInt"];
            $this->invPrdFactor = $_data["invPrdFactor"];
            $this->invPrdVnd = $_data["invPrdVnd"];
            $this->invPrdEst = $_data["invPrdEst"];

            $this->_setViewData();
        }
    }

    private function _loadPostData()
    {
        $this->invPrdId = isset($_POST["invPrdId"]) ? $_POST["invPrdId"] : "";
        $this->invPrdBrCod = isset($_POST["invPrdBrCod"]) ? $_POST["invPrdBrCod"] : "";
        $this->invPrdDsc = isset($_POST["invPrdDsc"]) ? $_POST["invPrdDsc"] : "";
        $this->invPrdTip = isset($_POST["invPrdTip"]) ? $_POST["invPrdTip"] : "";
        $this->invPrdCodInt =isset($_POST["invPrdCodInt"]) ? $_POST["invPrdCodInt"] : "";
        $this->invPrdFactor =isset($_POST["invPrdFactor"]) ? $_POST["invPrdFactor"] : "";
        $this->invPrdVnd = isset($_POST["invPrdVnd"]) ? $_POST["invPrdVnd"] : "";
        $this->invPrdEst =isset($_POST["invPrdEst"]) ? $_POST["invPrdEst"] : "ACT";

        //validaciones
        //aplicar todas la reglas de negocio

        if (\Utilities\ArrUtils::validarCampoVacío($this->invPrdBrCod)) 
        {
            $this->aErrors[] = "¡El código de barra no puede ir vacio!";
        }

        if (\Utilities\ArrUtils::validarCampoVacío($this->invPrdDsc)) 
        {
            $this->aErrors[] = "¡La descripción del producto no puede ir vacia!";
        }

        if (\Utilities\ArrUtils::validarCampoVacío($this->invPrdCodInt)) 
        {
            $this->aErrors[] = "¡Las unidades del producto no pueden ir vacias!";
        }

        if (\Utilities\ArrUtils::validarSoloNumeros($this->invPrdCodInt)) 
        {
            $this->aErrors[] = "¡Las unidades del producto no puede contener letras, solo números!";
        }
        
        $this->hasErrors = (count($this->aErrors) > 0);
        $this->_setViewData();
    }


    private function _setViewData()
    {
        $this->invPrdTip_EQG = ($this->invPrdTip === "EQG") ? "selected" : "";
        $this->invPrdTip_HGB = ($this->invPrdTip === "HGB") ? "selected" : "";
        $this->invPrdTip_BRA = ($this->invPrdTip === "BRA") ? "selected" : "";
        $this->invPrdTip_YE = ($this->invPrdTip === "YE") ? "selected" : "";

        $this->invPrdFactor_1 = ($this->invPrdFactor === "1") ? "selected" : "";
        $this->invPrdFactor_2 = ($this->invPrdFactor === "2") ? "selected" : "";
        $this->invPrdFactor_3 = ($this->invPrdFactor === "3") ? "selected" : "";
        $this->invPrdFactor_4 = ($this->invPrdFactor === "4") ? "selected" : "";

        $this->invPrdVnd_DL = ($this->invPrdVnd === "DL") ? "selected" : "";
        $this->invPrdVnd_HL = ($this->invPrdVnd === "HL") ? "selected" : "";
        $this->invPrdVnd_JC = ($this->invPrdVnd === "JC") ? "selected" : "";
        $this->invPrdVnd_AG = ($this->invPrdVnd === "AG") ? "selected" : "";
        
        $this->invPrdEst_ACT = ($this->invPrdEst === "ACT") ? "selected" : "";
        $this->invPrdEst_INA = ($this->invPrdEst === "INA") ? "selected" : "";

        $this->mode_dsc = sprintf(
            $this->mode_adsc[$this->mode],
            $this->invPrdId,
            $this->invPrdDsc
        );

        $this->disabled = ($this->mode == "INS" || $this->mode =="DEL" || $this->mode =="DSP") ? "disabled" : "";
        $this->readonly = ($this->mode =="DEL" || $this->mode=="DSP") ? "readonly" : "";
        $this->showaction = !($this->mode == "DSP");
    }    
}

?>
