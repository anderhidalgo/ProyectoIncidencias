<?php

require_once __DIR__ . "/GenericoBD.php";
require_once __DIR__ . "/Incidencia.php";
require_once __DIR__ . "/../Vista/formPrincipal.php";
require_once __DIR__ . "/../Vista/formRegistro.php";

if (session_status() != 2) {
    session_start();
}
/**
 * Description of IncidenciaBD
 *
 * @author 2GDAW05
 */

class IncidenciaBD {

    // Funcion que inserta una incidencia en la base de datos
    public static function registro ($i){
        
        $conexion=GenericoBD::abrir();

        $consulta ="INSERT INTO Incidencia VALUES (null, '{$i->getDesc_breve()}', '{$i->getDesc_detallada()}', null, '{$i->getPrioridad()}', 'abierta', '{$i->getCategoria()}', {$i->getCliente()->getId_cliente()}, {$i->getTecnico()->getId_tecnico()})";

        $rs = mysqli_query($conexion, $consulta) or die (mysqli_error($conexion));

        if(mysqli_affected_rows($conexion) == 1){
            GenericoBD::cerrar($conexion);
            formPrincipal::fPrincipal("Incidencia registrada con exito.");
        }
        else{
            GenericoBD::cerrar($conexion);
            formRegistro::fRegistro();

        }
 
    }

    // Funcion que obtiene todos los datos de las incidencias abiertas para después mostrarlas en una tabla
    public static function listar(){
        
        $conexion=GenericoBD::abrir();
        
        $query = "SELECT i.*, c.*, t.*, c.nombre as nombre_cliente FROM incidencia i JOIN cliente c on i.id_cliente = c.id_cliente JOIN tecnico t on i.id_tecnico = t.id_tecnico WHERE i.estado='abierta'";
        
        $rs = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
        
        $incidencias = [];
        $fila = mysqli_fetch_array($rs);
        
        while ($fila != null){
            $c = new Cliente ($fila["id_cliente"], $fila["nombre_cliente"],$fila["direccion"],$fila["correo"]);
            $t = new Tecnico ($fila["id_tecnico"], $fila["nombre"],$fila["apellidos"],$fila["contrasena"]);
            $i = new Incidencia($fila["id_incidencia"], $fila["desc_breve"], $fila["desc_detallada"], $fila["fecha_hora"], $fila["prioridad"], $fila["estado"], $fila["categoria"], $c, $t);
            array_push($incidencias, $i);
            $fila = mysqli_fetch_array($rs);
            
        }
        
        GenericoBD::cerrar($conexion);

        return $incidencias;
        
    }


    // Funcion que obtiene todos los datos de las incidencias cerradas para después mostrarlas en una tabla
    public static function listarCerradas(){
        
        $conexion=GenericoBD::abrir();
        
        $query = "SELECT i.*, c.*, t.*, c.nombre as nombre_cliente FROM incidencia i JOIN cliente c on i.id_cliente = c.id_cliente JOIN tecnico t on i.id_tecnico = t.id_tecnico WHERE i.estado='cerrada'";
        
        $rs = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
        
        $incidenciasC = [];
        $fila = mysqli_fetch_array($rs);
        
        while ($fila != null){
            $c = new Cliente ($fila["id_cliente"], $fila["nombre_cliente"],$fila["direccion"],$fila["correo"]);
            $t = new Tecnico ($fila["id_tecnico"], $fila["nombre"],$fila["apellidos"],$fila["contrasena"]);
            $i = new Incidencia($fila["id_incidencia"], $fila["desc_breve"], $fila["desc_detallada"], $fila["fecha_hora"], $fila["prioridad"], $fila["estado"], $fila["categoria"], $c, $t);
            array_push($incidenciasC, $i);
            $fila = mysqli_fetch_array($rs);
            
        }
        
        GenericoBD::cerrar($conexion);

        return $incidenciasC;
        
    }

    // Funcion que modifica el estado de una incidencia según su ID
    public static function modificarEstado($id) {
         
        $conexion=GenericoBD::abrir();

        $consulta = "UPDATE incidencia SET estado ='cerrada' WHERE id_incidencia =".$id." ";
        
        $rs = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));

        GenericoBD::cerrar($conexion);

        if ($rs) {
            formListado::tablaincidencias();
        } else {
            $mensaje = "La incidencia no se ha cerrado.";
            formPrincipal::fPrincipal($mensaje);
        }

    }

    //-------------------------------------------------------------------------------------------------

    // A PARTIR DE AQUÍ, LAS FUNCIONES QUE OBTIENEN LOS DATOS PARA LA GRAFICA Y LAS DEVUELVEN A LA VISTA RETORNANDO

    // TECNICOS //

    public static function numIncidencias(){

        $conexion=GenericoBD::abrir();

        $query = "SELECT COUNT(*) FROM incidencia";

        $rs = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

        GenericoBD::cerrar($conexion);

        return mysqli_fetch_array($rs)[0];

    }
    
    public static function numIncidenciasLuis(){

        $conexion=GenericoBD::abrir();

        $query = "SELECT COUNT(*) FROM incidencia WHERE id_tecnico = 1";

        $rs = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

        GenericoBD::cerrar($conexion);

        return mysqli_fetch_array($rs)[0];

    }

    public static function numIncidenciasAlberto(){

        $conexion=GenericoBD::abrir();

        $query = "SELECT COUNT(*) FROM incidencia WHERE id_tecnico = 2";

        $rs = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

        GenericoBD::cerrar($conexion);

        return mysqli_fetch_array($rs)[0];

    }

    public static function numIncidenciasMarta(){

        $conexion=GenericoBD::abrir();

        $query = "SELECT COUNT(*) FROM incidencia WHERE id_tecnico = 3";

        $rs = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

        GenericoBD::cerrar($conexion);

        return mysqli_fetch_array($rs)[0];

    }

    public static function numIncidenciasLaura(){

        $conexion=GenericoBD::abrir();

        $query = "SELECT COUNT(*) FROM incidencia WHERE id_tecnico = 4";

        $rs = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

        GenericoBD::cerrar($conexion);

        return mysqli_fetch_array($rs)[0];

    }


    public static function numIncidenciasAsier(){

        $conexion=GenericoBD::abrir();

        $query = "SELECT COUNT(*) FROM incidencia WHERE id_tecnico = 5";

        $rs = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

        GenericoBD::cerrar($conexion);

        return mysqli_fetch_array($rs)[0];

    }

    // CLIENTES //

    public static function numIncidenciasMichelin(){

        $conexion=GenericoBD::abrir();

        $query = "SELECT COUNT(*) FROM incidencia WHERE id_cliente = 1";

        $rs = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

        GenericoBD::cerrar($conexion);

        return mysqli_fetch_array($rs)[0];

    }

    public static function numIncidenciasMercedes(){

        $conexion=GenericoBD::abrir();

        $query = "SELECT COUNT(*) FROM incidencia WHERE id_cliente = 2";

        $rs = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

        GenericoBD::cerrar($conexion);

        return mysqli_fetch_array($rs)[0];

    }

    public static function numIncidenciasParque(){

        $conexion=GenericoBD::abrir();

        $query = "SELECT COUNT(*) FROM incidencia WHERE id_cliente = 3";

        $rs = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

        GenericoBD::cerrar($conexion);

        return mysqli_fetch_array($rs)[0];

    }

    public static function numIncidenciasEgibide(){

        $conexion=GenericoBD::abrir();

        $query = "SELECT COUNT(*) FROM incidencia WHERE id_cliente = 4";

        $rs = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

        GenericoBD::cerrar($conexion);

        return mysqli_fetch_array($rs)[0];

    }


    public static function numIncidenciasAidazu(){

        $conexion=GenericoBD::abrir();

        $query = "SELECT COUNT(*) FROM incidencia WHERE id_cliente = 5";

        $rs = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

        GenericoBD::cerrar($conexion);

        return mysqli_fetch_array($rs)[0];

    }
    
}
