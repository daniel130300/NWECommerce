<?php
namespace Controllers\Client;

class Client extends \Controllers\PrivateController
{
    public function __construct()
    {
        $userInRole = \Utilities\Security::isInRol
        (
            \Utilities\Security::getUserId(),
            "CLIENT"
        );
        parent::__construct();
    }
    public function run() :void
    {
        \Views\Renderer::render("client/client", array());
    }
}
?>
