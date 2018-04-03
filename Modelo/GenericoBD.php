<?php

/**
 * Description of GenericoBD
 *
 * @author 2GDAW06
 */
abstract class GenericoBD {

    // Funcion que realiza la conexion con la base de datos
    public static function abrir(){
        $conexion = mysqli_connect("localhost", "root", null, "proyecto");
        return $conexion;
    }

    // Funcion que realiza la desconexion con la base de datos
    public static function cerrar($conexion){
        mysqli_close($conexion);
    }
    
}
