<?php

require_once __DIR__ . "/../Vista/formLogin.php";
require_once __DIR__ . "/../Vista/formPrincipal.php";
require_once __DIR__ . "/../Vista/formRegistro.php";
require_once __DIR__ . "/../Vista/formListado.php";
require_once __DIR__ . "/../Vista/formModificarTecnico.php";
require_once __DIR__ . "/../Vista/formModificarCliente.php";
require_once __DIR__ . "/../Vista/formSeguimiento.php";


require_once __DIR__ . "/../Modelo/LoginBD.php";
require_once __DIR__ . "/../Modelo/IncidenciaBD.php";

// EL ROUTER ES NUESTRO ARCHIVO PHP QUE CONTIENE LAS FUNCIONES EN LAS QUE SE DIRIGEN LOS DATOS DE LA VISTA AL CONTROLADOR, COMO TAMBIEN MOVERSE ENTRE LAS VISTAS

// Del formLogin al controlador
if(isset($_POST["entrar"])){
    Controlador::login();   
}

// Nos lleva al formulario de registro de incidencia
elseif(isset($_POST["botonregistro"])) {
    formRegistro::fRegistro();
}

// Nos lleva al controlador, pasándole por post como parametro los datos que se deben insertar de incidencia
elseif(isset($_POST["registrar"])) {
    Controlador::registrarIncidencia($_POST);
}

// Nos lleva al controlador, pasándole por post como parametro los datos que se deben ingresar de historico
elseif(isset($_POST["insertAnotacion"])) {
    Controlador::registrarAnotacion($_POST);
}

// Nos lleva al formulario del listado de incidencias
elseif(isset($_POST["listado"])) {
    formListado::tablaincidencias();
}

// Nos lleva a la pagina principal
elseif(isset($_POST["volver"])) {
    formPrincipal::fPrincipal(null);
}

// Nos lleva al formulario del listado de incidencias
elseif(isset($_POST["volverAlListado"])) {
    formListado::tablaincidencias();
}

// Nos lleva al formulario para modificar el tecnico asignado, pasandole como parametro el ID de incidencia
elseif(isset($_GET["modificar_tecnico"])) {
    $id = $_GET["modificar_tecnico"];
    formModificarTecnico::modificacionTecnico($id);
}

// Nos lleva al formulario para modificar datos del cliente, pasandole como parametro el ID de incidencia
elseif(isset($_GET["modificar_cliente"])) {
    $id = $_GET["modificar_cliente"];
    formModificarCliente::modificacionCliente($id);
}

// Nos lleva al controlador, pasandole por get como parametro el ID de incidencia
elseif(isset($_GET["cerrar_incidencia"])) {
    $id = $_GET["cerrar_incidencia"];
    Controlador::modificarEstado($id);
}

// Nos lleva al formulario del seguimiento de una incidencia, pasandole con get como parametro el ID de incidencia
elseif(isset ($_GET["seguimiento"])) {
    $id_incidencia = $_GET["seguimiento"];
    formSeguimiento::historico($id_incidencia);
}

// Nos lleva al controlador, pasandole los datos por post para modificar los datos del cliente
elseif(isset($_POST["modificarCliente"])) {
    Controlador::modificarCliente($_POST);
}

// Nos lleva al controlador, pasandole con post como parametros para modificar el tecnico asignado
elseif(isset($_POST["modificarTecnico"])) {
    Controlador::modificarTecnico($_POST["tecnico"], $_POST["id_incidencia"]);
}

// Nos destruye todas las sesiones y nos lleva directamente al formulario de login
elseif (isset($_POST["sesioncerrar"])){
   session_destroy();
    //$_SESSION["tecnico"]);
   header("location: ../index.php");
}

?>