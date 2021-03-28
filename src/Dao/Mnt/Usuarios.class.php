<?php

namespace Dao\Mnt;

class Usuarios extends \Dao\Table
{
    public static function getAll()
    {
        return self::obtenerRegistros("SELECT * FROM usuarios;", array());
    }

    public static function getOne($UsuarioId)
    {
        $sqlstr = "SELECT * FROM usuarios WHERE UsuarioId = :UsuarioId;";
        return self::obtenerUnRegistro($sqlstr, array("UsuarioId"=>$UsuarioId));
    }

    public static function insert($UsuarioEmail, $UsuarioNombre, $UsuarioPswd, $UsuarioPswdEst, $UsuarioPswdExp,
    $UsuarioEst, $UsuarioActCod, $UsuarioTipo)
    {
        $insstr = "INSERT INTO `usuarios` (`UsuarioEmail`, `UsuarioNombre`, `UsuarioPswd`,
            `UsuarioFching`, `UsuarioPswdEst`, `UsuarioPswdExp`, `UsuarioEst`, `UsuarioActCod`,
            `UsuarioPswdChg`, `UsuarioTipo`)
            VALUES
            (:UsuarioEmail, :UsuarioNombre, :UsuarioPswd, now(), :UsuarioPswdEst, 
            :UsuarioPswdExp, :UsuarioEst, :UsuarioActCod, now(), :UsuarioTipo);";

        return self::executeNonQuery(
            $insstr,
            array("UsuarioEmail"=>$UsuarioEmail, "UsuarioNombre"=>$UsuarioNombre, "UsuarioPswd"=>$UsuarioPswd, 
            "UsuarioPswdEst"=>$UsuarioPswdEst, "UsuarioPswdExp"=>$UsuarioPswdExp, "UsuarioEst"=>$UsuarioEst,
            "UsuarioActCod"=>$UsuarioActCod, "UsuarioTipo"=>$UsuarioTipo)
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
}

?>
