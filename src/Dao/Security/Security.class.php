<?php
namespace Dao\Security;

if (version_compare(phpversion(), '7.4.0', '<')) {
        define('PASSWORD_ALGORITHM', 1);  //BCRYPT
} else {
    define('PASSWORD_ALGORITHM', '2y');  //BCRYPT
}
/*
usercod     bigint(10) AI PK
useremail   varchar(80)
username    varchar(80)
userpswd    varchar(128)
userfching  datetime
userpswdest char(3)
userpswdexp datetime
userest     char(3)
useractcod  varchar(128)
userpswdchg varchar(128)
usertipo    char(3)

 */

use Exception;

class Security extends \Dao\Table
{
    static public function newUsuario($UsuarioEmail, $UsuarioPswd)
    {
        if (!\Utilities\Validators::IsValidEmail($UsuarioEmail)) {
            throw new Exception("Correo no es válido");
        }
        if (!\Utilities\Validators::IsValidPassword($UsuarioPswd)) {
            throw new Exception("Contraseña debe ser almenos 8 caracteres, 1 número, 1 mayúscula, 1 símbolo especial");
        }

        $newUser = self::_usuarioStruct();
        //Tratamiento de la Contraseña
        $hashedPassword = self::_hashPassword($UsuarioPswd);

        unset($newUser["UsuarioId"]);
        unset($newUser["UsuarioFching"]);
        unset($newUser["UsuarioPswdChg"]);

        $newUser["UsuarioEmail"] = $UsuarioEmail;
        $newUser["UsuarioNombre"] = "John Doe";
        $newUser["UsuarioPswd"] = $hashedPassword;
        $newUser["UsuarioPswdEst"] = Estados::ACTIVO;
        $newUser["UsuarioPswdExp"] = date('Y-m-d', time() + 7776000);  //(3*30*24*60*60) (m d h mi s)
        $newUser["UsuarioEst"] = Estados::ACTIVO;
        $newUser["UsuarioActCod"] = hash("sha256", $UsuarioEmail.time());
        $newUser["UsuarioTipo"] = UsuarioTipo::PUBLICO;

        $sqlIns = "INSERT INTO `usuarios` (`UsuarioEmail`, `UsuarioNombre`, `UsuarioPswd`,
            `UsuarioFching`, `UsuarioPswdEst`, `UsuarioPswdExp`, `UsuarioEst`, `UsuarioActCod`,
            `UsuarioPswdChg`, `UsuarioTipo`)
            VALUES
            ( :UsuarioEmail, :UsuarioNombre, :UsuarioPswd,
            now(), :UsuarioPswdEst, :UsuarioPswdExp, :UsuarioEst, :UsuarioActCod,
            now(), :UsuarioTipo);";

        return self::executeNonQuery($sqlIns, $newUser);

    }

    static public function getUsuarioByEmail($UsuarioEmail)
    {
        $sqlstr = "SELECT * from `usuarios` where `UsuarioEmail` = :UsuarioEmail ;";
        $params = array("UsuarioEmail"=>$UsuarioEmail);

        return self::obtenerUnRegistro($sqlstr, $params);
    }
    
    static private function _saltPassword($UsuarioPswd)
    {
        return hash_hmac(
            "sha256",
            $UsuarioPswd,
            \Utilities\Context::getContextByKey("PWD_HASH")
        );
    }

    static private function _hashPassword($password)
    {
        return password_hash(self::_saltPassword($password), PASSWORD_ALGORITHM);
    }

    static public function verifyPassword($raw_password, $hash_password)
    {
        return password_verify(
            self::_saltPassword($raw_password),
            $hash_password
        );
    }


    static private function _usuarioStruct()
    {
        return array(
            "UsuarioId"      => "",
            "UsuarioEmail"    => "",
            "UsuarioNombre"     => "",
            "UsuarioPswd"     => "",
            "UsuarioFching"   => "",
            "UsuarioPswdEst"  => "",
            "UsuarioPswdExp"  => "",
            "UsuarioEst"      => "",
            "UsuarioActCod"   => "",
            "UsuarioPswdChg"  => "",
            "UsuarioTipo"     => "",
        );
    }

    static public function getFeature($FuncionId)
    {
        $sqlstr = "SELECT * from funciones where FuncionId=:FuncionId;";
        $featuresList = self::obtenerRegistros($sqlstr, array("FuncionId"=>$FuncionId));
        return count($featuresList) > 0;
    }

    static public function addNewFeature($FuncionId, $FuncionDsc, $FuncionEst, $FuncionTipo)
    {
        $sqlins = "INSERT INTO `funciones` (`FuncionId`, `FuncionDsc`, `FuncionEst`, `FuncionTipo`)
            VALUES (:FuncionId , :FuncionDsc , :FuncionEst , :FuncionTipo);";

        return self::executeNonQuery(
            $sqlins,
            array(
                "FuncionId" => $FuncionId,
                "FuncionDsc" => $FuncionDsc,
                "FuncionEst" => $FuncionEst,
                "FuncionTipo" => $FuncionTipo
            )
        );
    }

    static public function getFeatureByUsuario($UsuarioId, $FuncionId)
    {
        $sqlstr = "select * from funcionesroles a inner join rolesusuarios b on a.RolId = b.RolId 
        where a.FuncionRolEst = 'ACT' and b.UsuarioId=:UsuarioId and a.FuncionId=:FuncionId limit 1;";
        $resultados = self::obtenerRegistros(
            $sqlstr,
            array(
                "UsuarioId"=> $UsuarioId,
                "FuncionId" => $FuncionId
            )
        );
        return count($resultados) > 0;
    }

    static public function getRol($RolId)
    {
        $sqlstr = "SELECT * from roles where RolId=:RolId;";
        $featuresList = self::obtenerRegistros($sqlstr, array("RolId" => $RolId));
        return count($featuresList) > 0;
    }

    static public function addNewRol($RolId, $RolDsc, $RolEst)
    {
        $sqlins = "INSERT INTO `roles` (`RolId`, `RolDsc`, `RolEst`)
    VALUES (:RolId, :RolDsc, :RolEst);";

        return self::executeNonQuery(
            $sqlins,
            array(
                "RolId" => $RolId,
                "RolDsc" => $RolDsc,
                "RolEst" => $RolEst
            )
        );
    }

    static public function getRolesByUsuario($UsuarioId, $RolId)
    {
        $sqlstr = "select * from roles a inner join
        rolesusuarios b on a.RolId = b.RolId where a.RolEst = 'ACT'
        and b.UsuarioId=:UsuarioId and a.RolId=:RolId limit 1;";
        $resultados = self::obtenerRegistros(
            $sqlstr,
            array(
                "UsuarioId" => $UsuarioId,
                "RolId" => $RolId
            )
        );
        return count($resultados) > 0;
    }


    private function __construct()
    {
    }
    private function __clone()
    {
    }
}


?>
