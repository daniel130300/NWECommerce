<?php

namespace Utilities;

class Site
{
    public static function configure()
    {
        $donenv = new \Utilities\DotEnv("parameters.env");
        \Utilities\Context::setArrayToContext($donenv->load());
        date_default_timezone_set(\Utilities\Context::getContextByKey("TIMEZONE"));
    }
    public static function getPageRequest()
    {
        $pageRequest = "index";
        if (\Utilities\Security::isLogged()) 
        {
            $usuario = \Dao\Security\Security::getUsuariobyId(\Utilities\Security::getUserId());
            
            if(!empty($usuario))
            {
                if($usuario["UsuarioTipo"] !== "PBL")
                {
                    $pageRequest = "admin\\admin";
                }
            }
        }
        if (isset($_GET["page"])) {
            $pageRequest = str_replace(array("_", "-", "."), "\\", $_GET["page"]);
        }
        Context::setArrayToContext($_GET);
        Context::setContext("request_uri", $_SERVER["REQUEST_URI"]);
        return "Controllers\\" . $pageRequest;
    }
    public static function redirectTo($url)
    {
        header("Location:".$url);
        die();
    }
    public static function redirectToWithMsg($url, $msg)
    {
        echo '<script>alert("'.$msg. '");';
        echo ' window.location.assign("'.$url.'");</script>';
        die();
    }
    public static function addLink($href)
    {
        $tmpLinks = \Utilities\Context::getContextByKey("SiteLinks");
        if ($tmpLinks === "") {
            $tmpLinks = array($href);
        } else {
            $tmpLinks[] = $href;
        }
        \Utilities\Context::setContext("SiteLinks", $tmpLinks);
    }
    public static function addBeginScript($src)
    {
        $tmpSrcs = \Utilities\Context::getContextByKey("BeginScripts");
        if ($tmpSrcs === "") {
            $tmpSrcs = array($src);
        } else {
            $tmpSrcs[] = $src;
        }
        \Utilities\Context::setContext("BeginScripts", $tmpSrcs);
    }
    public static function addEndScript($src)
    {
        $tmpSrcs = \Utilities\Context::getContextByKey("EndScripts");
        if ($tmpSrcs === "") {
            $tmpSrcs = array($src);
        } else {
            $tmpSrcs[] = $src;
        }
        \Utilities\Context::setContext("EndScripts", $tmpSrcs);
    }
}
?>
