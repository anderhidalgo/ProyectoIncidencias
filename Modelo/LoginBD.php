<?php


/**
 * Description of LoginBD
 *
 * @author 2GDAW05
 */
require_once __DIR__ . "/GenericoBD.php";
require_once __DIR__ . "/../Vista/formLogin.php";
require_once __DIR__ . "/../Vista/formPrincipal.php";
require_once __DIR__ . "/Tecnico.php";

// Metodo que comprueba si las variables de session estan abiertas. Si no lo estan, las abre
if (session_status() != 2) {
    session_start();
}

class LoginBD {

    // Funcion que busca si los datos proporcionados por el tecnico para logearse son validos
    public static function logueo() {
        
        $conexion=GenericoBD::abrir();

        $nombre=$_POST["nombre"];
        $contrasena=$_POST["contrasena"];

        //consulta en la base de datos

        $consulta="SELECT * FROM tecnico WHERE nombre='".$nombre."' AND contrasena='".$contrasena."'";

        $resultado = mysqli_query($conexion, $consulta);

        $fila = mysqli_fetch_array($resultado);
        

        //Cuando encuentra algun resultado va al formulario principal si no vuelve al login y nos mostrara un error
        if($resultado->num_rows != 0) {

            $tecni = new Tecnico($fila['id_tecnico'],$fila['nombre'],$fila['apellidos'],$fila['contrasena']);

            $_SESSION["tecnico"] = serialize($tecni);

            formPrincipal::fPrincipal(null);
            //header('Location: ../Vista/formPrincipal.php');

        }
        
        else
        {
            //Me lleva a index si falla lo he cambiado por un mensaje de error
            //header('Location: ../index.php');
            formLogin::fInicio("<label style='color: red'>ERROR</label>: El usuario no existe", true);
        }


        GenericoBD::cerrar($conexion);
        
        
    }
    
    
    
}
