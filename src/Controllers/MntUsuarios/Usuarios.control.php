<?php 

namespace Controllers\MntUsuarios;

class Usuarios extends \Controllers\PrivateController
{
    public function __construct()
    {
        //$userInRole = \Utilities\Security::isInRol(
        //    \Utilities\Security::getUserId(),
        //    "ADMIN"
        //);
        parent::__construct();
    }

    public function run() :void
    {
        $dataview = array();
        $dataview["items"] = \Dao\MntUsuarios\Usuarios::getAll();
        \Views\Renderer::render("mntUsuarios/usuarios", $dataview);
    }
}

// index.php?page=mntUsuarios_usuarios