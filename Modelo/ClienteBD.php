<?php

require_once __DIR__ . '/Cliente.php';
require_once __DIR__ . '/GenericoBD.php';

class ClienteBD {

    // Funcion que realiza obtiene todos los clientes de la base de datos
    public static function getClientes() {
        
        $conexion=GenericoBD::abrir();
        
        $query = "SELECT * FROM cliente";
        
        $rs = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

        $clientes = [];
        $fila = mysqli_fetch_array($rs);
        
        while ($fila != null){
            $t = new Cliente($fila["id_cliente"], $fila["nombre"], $fila["direccion"], $fila["correo"]);
            array_push($clientes, $t);
            $fila = mysqli_fetch_array($rs);
        }
        
        GenericoBD::cerrar($conexion);
        
        $_SESSION["clientes"] = $clientes;
    }

    // Funcion que obtiene todos los datos del cliente según el ID de incidencia
    public static function buscarClientePorID($id){
        
        $conexion = GenericoBD::abrir();
        
        $query = "SELECT c.* FROM cliente c JOIN incidencia i on i.id_cliente = c.id_cliente WHERE i.id_incidencia = ".$id." ";
        
        $rs = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
        $fila = mysqli_fetch_array($rs);

        if ($rs != null){
            $c = new Cliente($fila["id_cliente"], $fila["nombre"], $fila["direccion"], $fila["correo"]);
        }
        
        GenericoBD::cerrar($conexion);
       
        return $c;
    }

    // Funcion que modifica los datos del cliente según su ID
    public static function modificarCliente($c){

        $conexion = GenericoBD::abrir();

        $query1 = "UPDATE cliente SET nombre = '".$c->getNombre()."', direccion = '".$c->getDireccion()."', correo = '".$c->getCorreo()."' WHERE id_cliente = ".$c->getId_cliente()." ";
        
        $rs = mysqli_query($conexion, $query1) or die(mysqli_error($conexion));

        GenericoBD::cerrar($conexion);

        ($rs) ? $mensaje = "Modificación completada con éxito." : $mensaje = "La modificación no se ha realizado correctamente.";
        formPrincipal::fPrincipal($mensaje);

    }

}
