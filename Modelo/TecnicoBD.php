<?php


require_once __DIR__ . '/Tecnico.php';
require_once __DIR__ . '/GenericoBD.php';


class TecnicoBD {

    // Funcion que obtiene todos los tecnicos de la base de datos
    public static function getTecnicos(){
        
        $conexion=GenericoBD::abrir();
        
        $query = "SELECT * FROM tecnico";
        
        $rs = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
        
        
        $listado = [];
        $fila = mysqli_fetch_array($rs);
        
        while ($fila != null){
            $t = new Tecnico($fila["id_tecnico"], $fila["nombre"], $fila["apellidos"], $fila["contrasena"]);
            array_push($listado, $t);
            $fila = mysqli_fetch_array($rs);
        }
        
        GenericoBD::cerrar($conexion);
       
        
        $_SESSION["tecnicos"] = $listado;
        
    }

    // Funcion que obtiene el nombre del tecnico según el ID de incidencia
    public static function buscarNombreTecnicoPorID($id){
        $conexion = GenericoBD::abrir();
        
        $query = "SELECT UPPER(t.nombre) FROM tecnico t JOIN incidencia i on i.id_tecnico = t.id_tecnico WHERE i.id_incidencia = ".$id." ";
        
        $rs = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

        GenericoBD::cerrar($conexion);
       
        return mysqli_fetch_array($rs)[0];
    }

    // Funcion que modifica en la tabla incidencia el tecnico asignado a ella segun el ID de incidencia
    public static function modificarTecnico($id_tecnico, $id_incidencia){
        
        $conexion = GenericoBD::abrir();

        $query1 = "UPDATE incidencia SET id_tecnico = $id_tecnico WHERE id_incidencia = $id_incidencia";
        
        $rs = mysqli_query($conexion, $query1) or die(mysqli_error($conexion));

        GenericoBD::cerrar($conexion);

        ($rs) ? $mensaje = "Modificación completada con éxito." : $mensaje = "La modificación no se ha realizado correctamente.";
        formPrincipal::fPrincipal($mensaje);

    }
    
}
