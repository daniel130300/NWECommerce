<?php 
  namespace Utilities;

  class ArrUtils
  {

    /**
     * Combina el arreglo de origen con el arreglo destino donde las llaves
     * del destino coinciden con las llaves del origen.
     *
     * @param array $origin  Arreglo de Origen
     * @param array $destiny Arreglo de Destino
     *
     * @return void
     */
    public static function mergeArrayTo(&$origin, &$destiny)
    {
        if (is_array($origin) && is_array($destiny)) {
            foreach ($origin as $okey => $ovalue) {
                if (isset($destiny[$okey])) {
                    $destiny[$okey] = $ovalue;
                }
            }
        }
    }

    /**
     * Combina el arreglo de origen con el arreglo destino donde las llaves
     * del destino coinciden con las llaves del origen y agregando las 
     * llaves no existentes a las de origen.
     *
     * @param array $origin  Arreglo de Origen
     * @param array $destiny Arreglo de Destino
     *
     * @return void
     */
    public static function mergeFullArrayTo(&$origin, &$destiny)
    {
        if (is_array($origin) && is_array($destiny)) {
            foreach ($origin as $okey => $ovalue) {
                $destiny[$okey] = $ovalue;
            }
        }
    }

    public static function validarCampoVacío($field)
    {
        if (preg_match('/^\s*$/', $field)) 
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public static function validarCorreo($field)
    {
        if (filter_var($field, FILTER_VALIDATE_EMAIL)) 
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public static function validarSoloNumeros($field)
    {
        if (!preg_match('/^[0-9]+$/', $field)) 
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public static function validarSoloLetras($field)
    {
        if (!preg_match ("/^[a-zA-Z\s]+$/", $field)) 
        {
            return true;
        }
        else
        {
            return false;
        }
    }


    private function __construct()
    {
      
    }
  }

?>
