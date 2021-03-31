<?php

    namespace Controllers\Admin;

    class FuncionesRoles extends \Controllers\PublicController
    {

        private $UsuarioBusqueda = "";
        public function run() :void
        {
            $dataview = array();

            if ($this->isPostBack()) 
            {   
                $this->UsuarioBusqueda = isset($_POST["UsuarioBusqueda"]) ? $_POST["UsuarioBusqueda"] : "";

                if(!empty($this->UsuarioBusqueda))
                {
                    $dataview["items"] = \Dao\Mnt\FuncionesRoles::searchFuncionesRoles($this->UsuarioBusqueda);
                }
                else
                {
                    $dataview["items"] = \Dao\Mnt\FuncionesRoles::getAll();
                }
            } 
            else
            {   
                $dataview["items"] = \Dao\Mnt\FuncionesRoles::getAll();
            }
            
            \Views\Renderer::render("admin/funcionesroles", $dataview);
        } 
    }
?>