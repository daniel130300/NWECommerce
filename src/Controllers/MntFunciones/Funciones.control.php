<?php 

namespace Controllers\MntFunciones;

class Funciones extends \Controllers\PrivateController
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
        $dataview["items"] = \Dao\MntFunciones\Funciones::getAll();
        \Views\Renderer::render("mntFunciones/funciones", $dataview);
    }
}

// index.php?page=mntFunciones_funciones