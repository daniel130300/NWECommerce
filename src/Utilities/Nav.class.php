<?php

    namespace Utilities;


    class Nav
    {
        private function __construct()
        {
            
        }

        private function __clone()
        {
            
        }
        
        public static function setNavContext()
        {
            $tmpNAVIGATION = array();
            $userID = \Utilities\Security::getUserId();

            if (\Utilities\Security::isAuthorized($userID, "Controllers\Admin\Admin")) 
            {
                $tmpNAVIGATION[] = array(
                    "nav_url"=>"index.php?page=admin_admin",
                    "nav_icon"=>"",
                    "nav_label"=>"Inicio"
                );
            }

            if (\Utilities\Security::isAuthorized($userID, "Controllers\Client\Client")) 
            {
                $tmpNAVIGATION[] = array(
                    "nav_url"=>"index.php?page=client_client",
                    "nav_icon"=>"",
                    "nav_label"=>"Inicio"
                );
            }

            if (\Utilities\Security::isAuthorized($userID, "Controllers\Admin\Usuarios")) 
            {
                $tmpNAVIGATION[] = array(
                    "nav_url"=>"index.php?page=admin_usuarios",
                    "nav_icon"=>"",
                    "nav_label"=>"Gestión de Usuarios"
                );
            }

            if (\Utilities\Security::isAuthorized($userID, "Controllers\Admin\Categorias")) 
            {
                $tmpNAVIGATION[] = array(
                    "nav_url"=>"index.php?page=admin_categorias",
                    "nav_icon"=>"",
                    "nav_label"=>"Gestión de Categorías"
                );
            }
            
            \Utilities\Context::setContext("NAVIGATION", $tmpNAVIGATION);
        } 

    }
?>