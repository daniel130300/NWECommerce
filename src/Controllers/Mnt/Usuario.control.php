<?php 
namespace Controllers\Mnt;

class Usuario extends \Controllers\PublicController
{
    private $usercod = 0;
    private $useremail = "";
    private $username = "";
    private $userpswd = "";
    private $userfching = "";
    private $userpswdest ="";
    private $userpswdexp = "";
    private $userest = "";
    private $useractcod = "";
    private $userpswdchg = "";
    private $usertipo = "";

    private $mode_dsc = "";
    private $mode_adsc = array(
        "INS" => "Nuevo Usuario",
        "UPD" => "Editar %s %s",
        "DEL" => "Eliminar %s %s",
        "DSP" => "%s %s"
    );

    private $disabled = "";
    private $readonly = "";
    private $displayonly = false;

    private $hasErrors = false;
    private $aErrors = array();

    public function run() :void
    {
        $this->mode = isset($_GET["mode"]) ? $_GET["mode"] : "";
        $this->usercod = isset($_GET["usercod"]) ? $_GET["usercod"] : 0;

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
            switch ($this->mode)
            {
                case "INS":
                    $this->insertUsuario();
                    if (!$this->hasErrors) 
                    {
                        $hashedPassword = $this->_hashPassword($this->userpswd);
                        $this->useractcod = ($this->useremail)!="" ? hash("sha256", $this->useremail.time()) : "";

                        if (\Dao\Mnt\Usuarios::insert($this->useremail, $this->username, 
                        $this->userpswd, $this->userpswdest, $this->userpswdexp, $this->userest, 
                        $this->useractcod, $this->usertipo)) 
                        {
                            \Utilities\Site::redirectToWithMsg(
                                "index.php?page=mnt_usuarios",
                                "¡Usuario Agregado Satisfactoriamente!"
                            );
                        }
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

            }
        }
        
        $dataview = get_object_vars($this);
        \Views\Renderer::render("mnt/usuario", $dataview);
    }
    
    private function _load()
    {
        $_data = \Dao\Mnt\Usuarios::getOne($this->usercod);
        if ($_data) 
        {
            $this->usercod = $_data["usercod"];
            $this->useremail = $_data["useremail"];
            $this->username = $_data["username"];
            $this->userpswd = "";

            $userfchingdate = $_data["userfching"];
            $userfchingresult = $userfchingdate->format('Y-m-d H:i:s');

            if ($userfchingresult) 
            {
                $this->userfching = $userfchingresult;
            } 
            else 
            { 
                $this->userfching = "Hora desconocida";
            }
            
            $userpswdexpdate = $_data["userpswdexp"];
            $userpswdexpresult = $userpswdexpdate->format('Y-m-d H:i:s');

            if ($userpswdexpresult) 
            {
                $this->userpswdexp = $userpswdexpresult;
            } 
            else 
            { 
                $this->userpswdexp = "Hora desconocida";
            }

            $this->userest = $_data["userest"];
            $this->userpswdchg = $_data["userpswdchg"];
            $this->usertipo = $_data["usertipo"];
            $this->_setViewData();
        }
    }

    private function insertUsuario()
    {
        $this->usercod = isset($_POST["usercod"]) ? $_POST["usercod"] : "";
        $this->useremail = isset($_POST["useremail"]) ? $_POST["useremail"] : "";
        $this->username = isset($_POST["username"]) ? $_POST["username"] : "";
        $this->userpswd = isset($_POST["userpswd"]) ? $_POST["userpswd"] : "";

        //Campos predefinidos
        $this->userpswdest = \Dao\Security\Estados::ACTIVO;
        $this->userpswdexp = date('Y-m-d', time() + 7776000);
        $this->userest =  \Dao\Security\Estados::ACTIVO;
        $this->usertipo = isset($_POST["usertipo"]) ? $_POST["usertipo"] : "";

        //validaciones
        //aplicar todas la reglas de negocio

        if (\Utilities\Validators::IsEmpty($this->useremail)) 
        {
            $this->aErrors[] = "¡El correo del usuario no puede ir vacío!";
        }

        if (\Utilities\Validators::IsValidEmail($this->useremail)) 
        {
            $this->aErrors[] = "El correo ingresado para el usuario no es válido! Un formato adecuado para el correo es: example@example.com";
        }

        if (\Utilities\Validators::IsEmpty($this->username)) 
        {
            $this->aErrors[] = "¡El nombre del usuario no puede ir vacio!";
        }

        if (\Utilities\Validators::validarSoloLetras($this->username)) 
        {
            $this->aErrors[] = "¡El nombre del usuario solo puede contener letras!";
        }

        if (\Utilities\Validators::IsEmpty($this->userpswd)) 
        {
            $this->aErrors[] = "¡La contraseña del usuario no puede ir vacía!";
        }

        if (\Utilities\Validators::IsValidPassword($this->userpswd)) 
        {
            $this->aErrors[] = "¡La contraseña debe contener al menos 8 caracteres, 1 número, 1 mayúscula, 1 símbolo especial!";
        }
        
        $this->hasErrors = (count($this->aErrors) > 0);
        $this->_setViewData();
    }

    private function editarUsuario()
    {
        $this->usercod = isset($_POST["usercod"]) ? $_POST["usercod"] : "";
        $this->useremail = isset($_POST["useremail"]) ? $_POST["useremail"] : "";
        $this->username = isset($_POST["username"]) ? $_POST["username"] : "";
        $this->userpswd = isset($_POST["userpswd"]) ? $_POST["userpswd"] : "";

        //Campos predefinidos
        $this->userpswdest = \Dao\Security\Estados::ACTIVO;
        $this->userpswdexp = date('Y-m-d', time() + 7776000);
        $this->userest =  \Dao\Security\Estados::ACTIVO;
        $this->usertipo = isset($_POST["usertipo"]) ? $_POST["usertipo"] : "";

        //validaciones
        //aplicar todas la reglas de negocio

        if (\Utilities\Validators::IsEmpty($this->useremail)) 
        {
            $this->aErrors[] = "¡El correo del usuario no puede ir vacío!";
        }

        if (\Utilities\Validators::IsValidEmail($this->useremail)) 
        {
            $this->aErrors[] = "El correo ingresado para el usuario no es válido! Un formato adecuado para el correo es: example@example.com";
        }

        if (\Utilities\Validators::IsEmpty($this->username)) 
        {
            $this->aErrors[] = "¡El nombre del usuario no puede ir vacio!";
        }

        if (\Utilities\Validators::validarSoloLetras($this->username)) 
        {
            $this->aErrors[] = "¡El nombre del usuario solo puede contener letras!";
        }

        if (\Utilities\Validators::IsEmpty($this->userpswd)) 
        {
            $this->aErrors[] = "¡La contraseña del usuario no puede ir vacía!";
        }

        if (\Utilities\Validators::IsValidPassword($this->userpswd)) 
        {
            $this->aErrors[] = "¡La contraseña debe contener al menos 8 caracteres, 1 número, 1 mayúscula, 1 símbolo especial!";
        }
        
        $this->hasErrors = (count($this->aErrors) > 0);
        $this->_setViewData();
    }

       
    static private function _saltPassword($password)
    {
        return hash_hmac(
            "sha256",
            $password,
            \Utilities\Context::getContextByKey("PWD_HASH")
        );
    }

    static private function _hashPassword($password)
    {
        return password_hash(self::_saltPassword($password), PASSWORD_ALGORITHM);
    }

    private function _setViewData()
    {
        $this->mode_dsc = sprintf(
            $this->mode_adsc[$this->mode],
            $this->usercod,
            $this->username
        );

        $this->disabled = ($this->mode == "INS" || $this->mode =="DEL" || $this->mode =="DSP") ? "disabled" : "";
        $this->readonly = ($this->mode =="DEL" || $this->mode=="DSP") ? "readonly" : "";
        $this->displayonly = ($this->mode == "DSP");
    }    
}
?>
