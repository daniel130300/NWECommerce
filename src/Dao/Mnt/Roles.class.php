<?php

namespace Dao\Mnt;

use Dao\Security\Estados;

class Roles extends \Dao\Table
{

    public static function getAll()
    {
        return self::obtenerRegistros("SELECT * FROM roles;", array());
    }

    public static function getOne($RolId)
    {
        $sqlstr = "SELECT * FROM roles WHERE RolId=:RolId;";
        return self::obtenerUnRegistro($sqlstr, array("RolId"=>$RolId));
    }

    public static function insert($RolId, $RolDsc, $RolEst)
    {
        $insstr = "INSERT INTO roles (RolId, RolDsc, RolEst) VALUES (:RolId, :RolDsc, :RolEst);";
        return self::executeNonQuery(
            $insstr,
            array("RolId"=>$RolId=uniqid(), 
                "RolDsc"=>$RolDsc, 
                "RolEst"=>Estados::ACTIVO
            )
        );
    }

    public static function update($RolDsc, $RolEst, $RolId)
    {
        $updsql = "UPDATE roles SET RolDsc=:RolDsc, RolEst=:RolEst WHERE RolId=:RolId;";
        return self::executeNonQuery(
            $updsql,
            array(
                "RolDsc"=>$RolDsc, 
                "RolEst"=>$RolEst,
                "RolId" => $RolId
            )
        );
    }
    public static function delete( $RolId)
    {
        $delsql = "DELETE FROM roles WHERE RolId=:RolId;";
        return self::executeNonQuery(
            $delsql,
            array( "RolId" => $RolId)
        );
    }

}

?>