<?php 
namespace Controllers\Admin;

use Dao\Security\Estados;

class Pedido extends \Controllers\PublicController
{
   /* public function __construct()
    {
        
        $userInRole = \Utilities\Security::isInRol(
            \Utilities\Security::getUserId(),
            "ADMIN"
        );
        
        parent::__construct();
    }*/

    private $VentaId = 0;
    private $VentaFecha = "";
    private $VentaISV = "";
    private $VentaEst = "";
    private $VentaTipoPago = "";
    private $VentaPagoEnvio = "";
    private $ClienteDireccion = "";
    private $ClienteTelefono = "";
    private $UsuarioNombre = "";

    private $mode_dsc = "";
    private $mode_adsc = array(
        "UPD" => "Editar Venta Código: %s Nombre del Cliente: %s",
        "DSP" => "Visualizar Venta Código: %s Nombre del Cliente: %s"
    );

    private $readonly = "";
    private $showaction= true;
    private $notDisplayIns= false;

    private $hasErrors = false;
    private $aErrors = array();

    public function run() :void
    {
        $this->mode = isset($_GET["mode"])?$_GET["mode"]:"";
        $this->VentaId = isset($_GET["VentaId"])?$_GET["VentaId"]:0;
        if (!$this->isPostBack()) 
        {
            $this->_load();
            $this->mode_dsc = $this->mode_adsc[$this->mode];
           // var_dump($this->mode);
            //die();
        } 
        else 
        { 
            switch ($this->mode)
            {
                case "UPD":
                    if (\Dao\Mnt\Pedidos::update($this->VentaId)) 
                    {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=admin_pedidos",
                            "¡Estado del Pedido Actualizado Satisfactoriamente!"
                        );
                    }
                break;
            }
            
        }

        $dataview = get_object_vars($this);
        \Views\Renderer::render("admin/pedido", $dataview);
    }

    private function _load()
    {
        $_data = \Dao\Mnt\Pedidos::getOne($this->VentaId);
        if ($_data) 
        {
            $this->VentaId = $_data["VentaId"];
            $this->VentaFecha = $_data["VentaFecha"];
            $this->VentaISV = $_data["VentaISV"];
            $this->VentaEst = $_data["VentaEst"];
            $this->VentaTipoPago = $_data["VentaTipoPago"];
            $this->VentaPagoEnvio = $_data["VentaPagoEnvio"];
            $this->ClienteDireccion = $_data["ClienteDireccion"];
            $this->ClienteTelefono = $_data["ClienteTelefono"];
            $this->UsuarioNombre = $_data["UsuarioNombre"];
            $this->_setViewData();
        }
    }

    private function _setViewData()
    {
        $this->mode_dsc = sprintf(
            $this->mode_adsc[$this->mode],
            $this->VentaId,
            $this->UsuarioNombre
        );

        $this->notDisplayIns = ($this->mode=="INS") ? false : true;
        $this->readonly = ($this->mode =="DEL" || $this->mode=="DSP") ? "readonly":"";
        $this->showaction = !($this->mode == "DSP");
    }
}

?>
