<?php

namespace Dao\MntUsuarios;

class Usuarios extends \Dao\Table
{
    public static function getAll()
    {
        return self::obtenerRegistros("SELECT * from usuario;", array());
    }

    public static function getOne($usercod)
    {
        $sqlstr = "Select * from usuario where usercod=:usercod;";
        return self::obtenerUnRegistro($sqlstr, array("usercod"=>$usercod));
    }

    public static function update($useremail, $username, $userpswdest, $userpswdexp, $userest, $useractcod, $userpswdchg, $usertipo, $usercod)
    {
        $updsql = "UPDATE usuario SET useremail=:useremail, username=:username, userpswdest=:userpswdest, userpswdexp=:userpswdexp, userest=:userest, useractcod=:useractcod, userpswdchg=:userpswdchg, usertipo=:usertipo WHERE usercod=:usercod;";
        return self::executeNonQuery(
            $updsql,
            array(
                "useremail"=>$useremail, 
                "username"=>$username,
                "userpswdest"=>$userpswdest,
                "userpswdexp"=>$userpswdexp,
                "userest"=>$userest,
                "useractcod"=>$useractcod,
                "userpswdchg"=>$userpswdchg,
                "usertipo"=>$usertipo,
                "usercod"=>$usercod
            )
        );
    }
    public static function delete( $usercod)
    {
        $delsql = "delete from usuario where usercod=:usercod;";
        return self::executeNonQuery(
            $delsql,
            array( "usercod" => $usercod)
        );
    }

}

?>