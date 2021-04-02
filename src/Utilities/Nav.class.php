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

            if (\Utilities\Security::isAuthorized($userID, "Controllers\Admin\Usuarios")) 
            {
                $tmpNAVIGATION[] = array(
                    "nav_url"=>"index.php?page=admin_usuarios",
                    "nav_icon"=>"",
                    "nav_label"=>"Usuarios"
                );
            }
            
            if (\Utilities\Security::isAuthorized($userID, "Controllers\Admin\RolesUsuarios")) 
            {
                $tmpNAVIGATION[] = array(
                    "nav_url"=>"index.php?page=admin_rolesusuarios",
                    "nav_icon"=>"",
                    "nav_label"=>"Roles para Usuarios"
                );
            }

            if (\Utilities\Security::isAuthorized($userID, "Controllers\Admin\Roles")) 
            {
                $tmpNAVIGATION[] = array(
                    "nav_url"=>"index.php?page=admin_roles",
                    "nav_icon"=>"",
                    "nav_label"=>"Roles"
                );
            }

            if (\Utilities\Security::isAuthorized($userID, "Controllers\Admin\FuncionesRoles")) 
            {
                $tmpNAVIGATION[] = array(
                    "nav_url"=>"index.php?page=admin_funcionesroles",
                    "nav_icon"=>"",
                    "nav_label"=>"Funciones para Roles"
                );
            }

            if (\Utilities\Security::isAuthorized($userID, "Controllers\Admin\Categorias")) 
            {
                $tmpNAVIGATION[] = array(
                    "nav_url"=>"index.php?page=admin_categorias",
                    "nav_icon"=>"",
                    "nav_label"=>"Categorías"
                );
            }

            if (\Utilities\Security::isAuthorized($userID, "Controllers\Admin\Pedidos")) 
            {
                $tmpNAVIGATION[] = array(
                    "nav_url"=>"index.php?page=admin_pedidos",
                    "nav_icon"=>"",
                    "nav_label"=>"Pedidos Pendientes"
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
            
            \Utilities\Context::setContext("NAVIGATION", $tmpNAVIGATION);
        } 

    }
?>