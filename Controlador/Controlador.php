<?php

require_once __DIR__ . "/../Vista/formListado.php";
require_once __DIR__ . "/../Modelo/IncidenciaBD.php";
require_once __DIR__ . "/../Modelo/HistoricoBD.php";

class Controlador {

    // ESTE ES EL ARCHIVO PHP QUE CONECTA DIRECTAMENTE CON EL MODELO, EL ROUTER Y LA BASE DE DATOS DE LA APLICACION WEB

    // Funcion que nos lleva a LoginBD para logearse
    public static function login(){
        LoginBD::logueo();
    }

    // Funcion que nos lleva a IncidenciasBD para insertar una incidencia
    public static function registrarIncidencia($post){
        $c = new Cliente($post["cliente"]);
        $t = new Tecnico($post["tecnico"]);
        $i = new Incidencia(null, $post["descripcionbre"], $post["descripciondet"] ,null ,$post["prioridad"], "abierta" , $post["categoria"], $c, $t);

        IncidenciaBD::registro($i);
    }

    // Funcion que nos lleva a HistoricoBD para insertar un seguimiento a una incidencia
    public static function registrarAnotacion($post){
        $t = new Tecnico($post["id_tecnico"]);
        $i = new Incidencia($post["id_incidencia"]);
        $h = new Historico(null, $post["anotacion"], null, $i, $t);
        
        HistoricoBD::insert($h);
    }

    // Funcion que nos lleva a IncidenciaBD que modifica el estado de 1 incidencia, pasandole como parametro el ID de incidencia
    public static function modificarEstado($id){
        IncidenciaBD::modificarEstado($id);
    }

    // Funcion que nos lleva a TecnicoBD que modifica el ID de tecnico asignado a 1 incidencia, pasandole como parametro los IDs de incidencia y de tecnico
    public static function modificarTecnico($id_tecnico, $id_incidencia){
        TecnicoBD::modificarTecnico($id_tecnico, $id_incidencia);
    }

    // Funcion que nos lleva a IncidenciaBD donde obtenemos todas las incidencias abiertas de la base de datos
    public static function getIncidencias(){
        return IncidenciaBD::listar();
    }

    // Funcion que nos lleva a IncidenciaBD donde obtenemos todas las incidencias cerradas de la base de datos
    public static function getIncidenciasCerradas(){
        return IncidenciaBD::listarCerradas();
    }

    /*public static function getModificarTecnico(){
        return IncidenciaBD::modificarTecnico();
    }*/

    // Funcion que nos lleva a TecnicoBD donde obtenemos el nombre de un tecnico segun el ID de incidencia, el cual se pasa por parametro
    public static function buscarNombreTecnicoPorID($id){
        return TecnicoBD::buscarNombreTecnicoPorID($id);
    }

    // Funcion que nos lleva a ClienteBD donde obtenemos los datos de un cliente segun el ID de incidencia, el cual se pasa por parametro
    public static function buscarClientePorID($id){
        return ClienteBD::buscarClientePorID($id);
    }

    // Funcion que nos lleva a HistoricoBD donde obtenemos todos los datos de historico, tecnico y la descripcion breve de incidencia segun el ID de incidencia, el cual le pasamos como parametro
    public static function getHistoricoByIdIncidencia($id_incidencia, $id_tecnico){
        return HistoricoBD::getHistoricoByIdIncidencia($id_incidencia, $id_tecnico);
    }

    // Funcion que nos lleva a ClienteBD donde modificamos los datos de un cliente en particular, pasandole como parametro el objeto de cliente
    public static function modificarCliente($post){
        $c = new Cliente($post["id_cliente"], $post["nombre"], $post["direccion"], $post["correo"]);
        ClienteBD::modificarCliente($c);
    }

    //------------------------------------------------------------------

    // FUNCIONES DE LA GRÁFICA PARA OBTENER LOS DATOS A MOSTRAR

    public static function numIncidencias(){
        return IncidenciaBD::numIncidencias();
    }

    public static function numIncidenciasLuis(){
        return IncidenciaBD::numIncidenciasLuis();
    }

    public static function numIncidenciasAlberto(){
        return IncidenciaBD::numIncidenciasAlberto();
    }

    public static function numIncidenciasMarta(){
        return IncidenciaBD::numIncidenciasMarta();
    }

    public static function numIncidenciasLaura(){
        return IncidenciaBD::numIncidenciasLaura();
    }

    public static function numIncidenciasAsier(){
        return IncidenciaBD::numIncidenciasAsier();
    }

    public static function numIncidenciasMichelin(){
        return IncidenciaBD::numIncidenciasMichelin();
    }

    public static function numIncidenciasMercedes(){
        return IncidenciaBD::numIncidenciasMercedes();
    }

    public static function numIncidenciasParque(){
        return IncidenciaBD::numIncidenciasParque();
    }

    public static function numIncidenciasEgibide(){
        return IncidenciaBD::numIncidenciasEgibide();
    }

    public static function numIncidenciasAidazu(){
        return IncidenciaBD::numIncidenciasAidazu();
    }

}
