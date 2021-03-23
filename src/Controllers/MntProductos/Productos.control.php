<?php 

namespace Controllers\MntProductos;

class Productos extends \Controllers\PublicController
{
    public function run() :void
    {
        $dataview = array();
        $dataview["items"] = \Dao\MntProductos\Productos::getAll();
        \Views\Renderer::render("mntProductos/productos", $dataview);
    }
}

// index.php?page=mntProductos_productos