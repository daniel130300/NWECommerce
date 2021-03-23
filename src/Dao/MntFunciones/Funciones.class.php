<?php

namespace Dao\MntFunciones;

class Funciones extends \Dao\Table
{
    public static function getAll()
    {
        return self::obtenerRegistros("SELECT * from funciones;", array());
    }

    public static function getOne($fncod)
    {
        $sqlstr = "Select * from funciones where fncod=:fncod;";
        return self::obtenerUnRegistro($sqlstr, array("fncod"=>$fncod));
    }

    public static function insert($fncod, $fndsc, $fnest, $fntyp)
    {
        $insstr = "INSERT INTO funciones (fncod, fndsc, fnest, fntyp) VALUES (:fncod, :fndsc, :fnest, :fntyp);";
        return self::executeNonQuery(
            $insstr,
            array("fncod"=>$fncod, 
                "fndsc"=>$fndsc, 
                "fnest"=>$fnest,
                "fntyp"=>$fntyp
            )
        );
    }
    public static function update($fncod, $fndsc, $fnest, $fntyp)
    {
        $updsql = "UPDATE funciones SET fndsc=:fndsc, fnest=:fnest, fntyp=:fntyp WHERE fncod=:fncod;";
        return self::executeNonQuery(
            $updsql,
            array(
                "fncod"=>$fncod, 
                "fndsc"=>$fndsc, 
                "fnest"=>$fnest,
                "fntyp"=>$fntyp
            )
        );
    }
    public static function delete( $fncod)
    {
        $delsql = "delete from funciones where fncod=:fncod;";
        return self::executeNonQuery(
            $delsql,
            array( "fncod" => $fncod)
        );
    }

}

?>