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
        $sqlstr = "Select * from usuarios where usercod = :usercod;";
        return self::obtenerUnRegistro($sqlstr, array("usercod"=>$usercod));
    }
}
?>
