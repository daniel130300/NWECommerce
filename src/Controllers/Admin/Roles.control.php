<?php 

namespace Controllers\Admin;

class Roles extends \Controllers\PublicController
{
    /*
    public function __construct()
    {
        //$userInRole = \Utilities\Security::isInRol(
        //    \Utilities\Security::getUserId(),
        //    "ADMIN"
        //);
        parent::__construct();
    }
    */

    public function run() :void
    {
        $dataview = array();
        $dataview["items"] = \Dao\Mnt\Roles::getAll();
        \Views\Renderer::render("admin/roles", $dataview);
    }
}

// index.php?page=mntRoles_roles