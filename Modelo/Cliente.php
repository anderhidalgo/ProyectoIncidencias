<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cliente
 *
 * @author 2GDAW06
 */
class Cliente {
    
    private $id_cliente;
    private $nombre;
    private $direccion;
    private $correo;



    function __construct($id_cliente, $nombre = null, $direccion = null, $correo = null) {
        $this->id_cliente = $id_cliente;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->correo = $correo;
    }


    function getId_cliente() {
        return $this->id_cliente;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getCorreo() {
        return $this->correo;
    }

    function setId_cliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }



    
}
