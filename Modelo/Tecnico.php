<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tecnico
 *
 * @author 2GDAW06
 */
class Tecnico {
    //put your code here
    private $id_tecnico;
    private $nombre;
    private $apellidos;
    private $contrasena;
    
    function __construct($id_tecnico, $nombre = null, $apellidos = null, $contrasena = null) {
        $this->id_tecnico = $id_tecnico;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->contrasena = $contrasena;
    }

    
    function getId_tecnico() {
        return $this->id_tecnico;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getContrasena() {
        return $this->contrasena;
    }

    function setId_tecnico($id_tecnico) {
        $this->id_tecnico = $id_tecnico;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }


    
}
