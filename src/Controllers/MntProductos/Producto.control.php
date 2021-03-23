<?php 

namespace Controllers\MntProductos;

class Producto extends \Controllers\PublicController
{
    private $invPrdId = 0;
    private $invPrdBrCod = 0;
    private $invPrdCodInt = 0;
    private $invPrdDsc = "";
    private $invPrdTip = "";
    private $invPrdEst = "";
    private $invPrdPadre = 0;
    private $invPrdFactor = 0;
    private $invPrdVnd = "";
    private $invPrdEst_ACT = "";
    private $invPrdEst_INA = "";
    private $invPrdVnd_SI = "";
    private $invPrdVnd_NO = "";

    private $mode_dsc = "";
    private $mode_adsc = array(
        "INS" => "Nuevo Producto",
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
        $this->invPrdId = isset($_GET["invPrdId"])?$_GET["invPrdId"]:0;
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
                    if (\Dao\MntProductos\Productos::insert($this->invPrdBrCod, $this->invPrdCodInt, $this->invPrdDsc, $this->invPrdTip, $this->invPrdEst, $this->invPrdPadre, $this->invPrdFactor, $this->invPrdVnd)) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mntProductos_productos",
                            "¡Producto Agregado Satisfactoriamente!"
                        );
                    }
                    break;
                case "UPD":
                    if (\Dao\MntProductos\Productos::update($this->invPrdBrCod, $this->invPrdCodInt, $this->invPrdDsc, $this->invPrdTip, $this->invPrdEst, $this->invPrdPadre, $this->invPrdFactor, $this->invPrdVnd, $this->invPrdId)) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mntProductos_productos",
                            "¡Producto Actualizado Satisfactoriamente!"
                        );
                    }
                    break;
                case "DEL":
                    if (\Dao\MntProductos\Productos::delete($this->invPrdId)) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mntProductos_productos",
                            "¡Producto Eliminado Satisfactoriamente!"
                        );
                    }
                    break;
                }
            }
        }

        $dataview = get_object_vars($this);
        \Views\Renderer::render("mntProductos/producto", $dataview);
    }

    private function _load()
    {
        $_data = \Dao\MntProductos\Productos::getOne($this->invPrdId);
        if ($_data) {
            $this->invPrdId = $_data["invPrdId"];
            $this->invPrdBrCod = $_data["invPrdBrCod"];
            $this->invPrdCodInt = $_data["invPrdCodInt"];
            $this->invPrdDsc = $_data["invPrdDsc"];
            $this->invPrdTip = $_data["invPrdTip"];
            $this->invPrdEst = $_data["invPrdEst"];
            $this->invPrdPadre = $_data["invPrdPadre"];
            $this->invPrdFactor = $_data["invPrdFactor"];
            $this->invPrdVnd = $_data["invPrdVnd"];
            $this->_setViewData();
        }
    }

    private function _loadPostData()
    {
        $this->invPrdId = isset($_POST["invPrdId"]) ? $_POST["invPrdId"] : 0 ;
        $this->invPrdBrCod = isset($_POST["invPrdBrCod"]) ? $_POST["invPrdBrCod"] : "" ;
        $this->invPrdCodInt = isset($_POST["invPrdCodInt"]) ? $_POST["invPrdCodInt"] : "" ;
        $this->invPrdDsc = isset($_POST["invPrdDsc"]) ? $_POST["invPrdDsc"] : "" ;
        $this->invPrdTip = isset($_POST["invPrdTip"]) ? $_POST["invPrdTip"] : "" ;
        $this->invPrdEst = isset($_POST["invPrdEst"]) ? $_POST["invPrdEst"] : "" ;
        $this->invPrdPadre = isset($_POST["invPrdPadre"]) ? $_POST["invPrdPadre"] : "" ;
        $this->invPrdFactor = isset($_POST["invPrdFactor"]) ? $_POST["invPrdFactor"] : "" ;
        $this->invPrdVnd = isset($_POST["invPrdVnd"]) ? $_POST["invPrdVnd"] : "ACT" ;

        //validaciones
        //aplicar todas la reglas de negocio
        if (preg_match('/^\s*$/', $this->invPrdDsc)) {
            $this->aErrors[] = "¡El nombre no puede ir vacio!";
        }
        //
        $this->hasErrors = (count($this->aErrors) > 0);
        $this->_setViewData();
    }

    private function _setViewData()
    {
        $this->invPrdVnd_SI = ($this->invPrdVnd === "SI") ? "selected" : "";
        $this->invPrdVnd_NO = ($this->invPrdVnd === "NO") ? "selected" : "";
        $this->invPrdEst_ACT = ($this->invPrdEst === "ACT") ? "selected" : "";
        $this->invPrdEst_INA = ($this->invPrdEst === "INA") ? "selected" : "";
        $this->mode_dsc = sprintf(
            $this->mode_adsc[$this->mode],
            $this->invPrdId,
            $this->invPrdDsc
        );
        $this->readonly = ($this->mode =="DEL" || $this->mode=="DSP") ? "readonly":"";
        $this->showaction = !($this->mode == "DSP");
    }
}

?>