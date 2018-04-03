<?php

require_once __DIR__ . '/Historico.php';
require_once __DIR__ . '/GenericoBD.php';


class HistoricoBD {

    // Funcion que obtiene los datos de un historico según el ID de incidencia
    public static function getHistoricoByIdIncidencia($id_incidencia, $id_tecnico){
        
        $conexion = GenericoBD::abrir();
        
        $query = "SELECT h.*, t.*, i.desc_breve
                  FROM historico h 
                  JOIN tecnico t on t.id_tecnico = h.id_tecnico
                  JOIN incidencia i on i.id_incidencia = h.id_incidencia             
                  WHERE h.id_incidencia = {$id_incidencia} ";

        $listahistoricos = [];
        $rs = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
        $fila = mysqli_fetch_array($rs);

        while ($fila != null){
            $i = new Incidencia($id_incidencia, $fila["desc_breve"]);
            $t = new Tecnico($id_tecnico, $fila['nombre'], $fila['apellidos'], $fila['contrasena']);
            $h = new Historico($fila["id_historico"], $fila["anotacion"], $fila["fecha_hora"], $i, $t);
            $listahistoricos[] = $h;
            $fila = mysqli_fetch_array($rs);
        }
        
        GenericoBD::cerrar($conexion);
       
        return $listahistoricos;
        
    }

    // Funcion que inserta un historico en la base de datos
    public static function insert($h){

        $conexion=GenericoBD::abrir();

        $consulta ="INSERT INTO historico VALUES (null, '".$h->getAnotacion()."', null, ".$h->getIncidencia()->getId_incidencia().", ".$h->getTecnico()->getId_tecnico().")";

        $rs = mysqli_query($conexion, $consulta) or die (mysqli_error($conexion));

        if(mysqli_affected_rows($conexion) == 1){
            //GenericoBD::cerrar($conexion);
            //formSeguimiento::historico($h->getIncidencia()->getId_incidencia());
            formSeguimiento::historico($h->getIncidencia()->getId_incidencia());
        }
        else{
            GenericoBD::cerrar($conexion);
            $mensaje = "Error en la inserción de anotación.";
            formPrincipal::fPrincipal($mensaje);

        }




    }

    
}

?>