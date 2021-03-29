<?php

    namespace Controllers\Admin;

    class Usuarios extends \Controllers\PrivateController
    {
        public function __construct()
        {
            $userInRole = \Utilities\Security::isInRol(
                \Utilities\Security::getUserId(),
                "ADMIN"
            );
            parent::__construct();
        }
    
        private $UsuarioBusqueda = "";
        public function run() :void
        {

            if ($this->isPostBack()) 
            {   
                $this->UsuarioBusqueda = isset($_POST["UsuarioBusqueda"]) ? $_POST["UsuarioBusqueda"] : "";

                if(!empty($this->UsuarioBusqueda))
                {
                    $dataview["items"] = \Dao\Security\Security::searchUsuarios($this->UsuarioBusqueda);
                }
                else
                {
                    $dataview["items"] = \Dao\Mnt\Usuarios::getAll();
                }
            } 
            else
            {   
                $dataview = array();
                $dataview["items"] = \Dao\Mnt\Usuarios::getAll();
            }
            
            \Views\Renderer::render("admin/usuarios", $dataview);
        } 
    }
?>