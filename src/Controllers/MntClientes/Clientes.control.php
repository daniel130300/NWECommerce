<?php 

namespace Controllers\MntClientes;

class Clientes extends \Controllers\PublicController
{
    public function run() :void
    {
        $dataview = array();
        $dataview["items"] = \Dao\MntClientes\Clientes::getAll();
        \Views\Renderer::render("mntClientes/clientes", $dataview);
    }
}

// index.php?page=mntClientes_clientes