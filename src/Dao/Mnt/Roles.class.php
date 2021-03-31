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
        $insstr = "INSERT INTO roles (RolId, RolDsc, RolEst) values (:RolId, :RolDsc, :RolEst);";
        return self::executeNonQuery(
            $insstr,
            array("RolId"=>$RolId, 
                "RolDsc"=>Estados::ACTIVO, 
                "RolEst"=>$RolEst
            )
        );
    }

    public static function update($rolesdsc, $rolesest, $rolescod)
    {
        $updsql = "UPDATE roles SET rolesdsc=:rolesdsc, rolesest=:rolesest where rolescod=:rolescod;";
        return self::executeNonQuery(
            $updsql,
            array(
                "rolesdsc"=>$rolesdsc, 
                "rolesest"=>$rolesest,
                "rolescod" => $rolescod
            )
        );
    }
    public static function delete( $rolescod)
    {
        $delsql = "delete from roles where rolescod=:rolescod;";
        return self::executeNonQuery(
            $delsql,
            array( "rolescod" => $rolescod)
        );
    }

}

?>