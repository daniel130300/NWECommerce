<?php

namespace Dao\Mnt;

class Usuarios extends \Dao\Table
{
    public static function getAll()
    {
        return self::obtenerRegistros("SELECT * from usuarios;", array());
    }

    public static function getOne($usercod)
    {
        $sqlstr = "SELECT * FROM usuarios WHERE usercod = :usercod;";
        return self::obtenerUnRegistro($sqlstr, array("usercod"=>$usercod));
    }

    public static function insert($useremail, $username, $userpswd, $userpswdest, $userpswdexp,
    $userest, $useractcod, $usertipo)
    {
        $insstr = "INSERT INTO `usuarios` (`useremail`, `username`, `userpswd`,
            `userfching`, `userpswdest`, `userpswdexp`, `userest`, `useractcod`,
            `userpswdchg`, `usertipo`)
            VALUES
            (:useremail, :username, :userpswd, now(), :userpswdest, 
            :userpswdexp, :userest, :useractcod, now(), :usertipo);";

        return self::executeNonQuery(
            $insstr,
            array("useremail"=>$useremail, "username"=>$username, "userpswd"=>$userpswd, 
            "userpswdest"=>$userpswdest, "userpswdexp"=>$userpswdexp, "userest"=>$userest,
            "useractcod"=>$useractcod, "usertipo"=>$usertipo)
        );
    }
    
    public static function update($invPrdBrCod, $invPrdCodInt, $invPrdDsc, $invPrdTip, $invPrdEst, 
    $invPrdFactor, $invPrdVnd, $invPrdId)
    {
        $updsql = "update productos set invPrdBrCod = :invPrdBrCod, invPrdCodInt = :invPrdCodInt, 
        invPrdDsc = :invPrdDsc, invPrdTip = :invPrdTip, invPrdEst = :invPrdEst, 
        invPrdFactor = :invPrdFactor, invPrdVnd = :invPrdVnd where invPrdId = :invPrdId;";
        return self::executeNonQuery(
            $updsql,
            array("invPrdBrCod"=>$invPrdBrCod, "invPrdCodInt"=>$invPrdCodInt, "invPrdDsc"=>$invPrdDsc, 
            "invPrdTip"=>$invPrdTip, "invPrdEst"=>$invPrdEst, "invPrdFactor"=>$invPrdFactor, 
            "invPrdVnd"=>$invPrdVnd, "invPrdId"=>$invPrdId)
        );
    }

    public static function delete($invPrdId)
    {
        $delsql = "delete from productos where invPrdId=:invPrdId;";
        return self::executeNonQuery(
            $delsql,
            array("invPrdId" => $invPrdId)
        );
    }

}

?>
