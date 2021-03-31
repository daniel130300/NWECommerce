<?php

namespace Dao\Mnt;

class Pedidos extends \Dao\Table
{
    public static function getAll()
    {
        return self::obtenerRegistros("SELECT v.*, u.UsuarioNombre FROM Ventas v INNER JOIN usuarios u on v.UsuarioId = u.UsuarioId;", array());
    }

    public static function getOne($VentaId)
    {
        $sqlstr = "SELECT v.*, u.UsuarioNombre FROM Ventas v INNER JOIN usuarios u on v.UsuarioId = u.UsuarioId WHERE VentaId=:VentaId;";
        return self::obtenerUnRegistro($sqlstr, array("VentaId"=>$VentaId));
    }

    public static function insert($CategoriaNom, $CategoriaEst)
    {
        $insstr = "INSERT INTO categorias (CategoriaNom, CategoriaEst) VALUES (:CategoriaNom, :CategoriaEst);";
        return self::executeNonQuery(
            $insstr,
            array("CategoriaNom"=>$CategoriaNom, "CategoriaEst"=>$CategoriaEst)
        );
    }

    public static function update($CategoriaNom, $CategoriaEst, $CategoriaId)
    {
        $updsql = "UPDATE categorias SET CategoriaNom=:CategoriaNom, CategoriaEst=:CategoriaEst WHERE CategoriaId=:CategoriaId;";
        return self::executeNonQuery(
            $updsql,
            array("CategoriaNom" => $CategoriaNom, "CategoriaEst" => $CategoriaEst, "CategoriaId" => $CategoriaId)
        );
    }

    public static function delete($CategoriaId)
    {
        $delsql = "DELETE FROM categorias WHERE CategoriaId=:CategoriaId;";
        return self::executeNonQuery(
            $delsql,
            array("CategoriaId" => $CategoriaId)
        );
    }

    static public function searchPedidos($UsuarioBusqueda)
    {
        $sqlstr = "SELECT v.*, u.UsuarioNombre FROM Ventas v INNER JOIN usuarios u on v.UsuarioId = u.UsuarioId 
        WHERE VentaId LIKE :UsuarioBusqueda OR VentaFecha LIKE :UsuarioBusqueda OR VentaISV LIKE :UsuarioBusqueda 
        OR VentaEst LIKE :UsuarioBusqueda OR VentaTipoPago LIKE :UsuarioBusqueda OR VentaPagoEnvio LIKE :UsuarioBusqueda 
        OR v.ClienteDireccion LIKE :UsuarioBusqueda OR v.ClienteTelefono LIKE :UsuarioBusqueda OR UsuarioNombre LIKE :UsuarioBusqueda;";
        
        return self::obtenerRegistros($sqlstr, array("UsuarioBusqueda"=>"%".$UsuarioBusqueda."%"));
    }
}

?>
