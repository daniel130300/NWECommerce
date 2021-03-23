<?php 

namespace Controllers\MntRoles;

class Roles extends \Controllers\PrivateController
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
        $dataview["items"] = \Dao\MntRoles\Roles::getAll();
        \Views\Renderer::render("mntRoles/roles", $dataview);
    }
}

// index.php?page=mntRoles_roles