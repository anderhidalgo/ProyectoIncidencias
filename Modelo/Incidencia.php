<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Incidencia
 *
 * @author 2GDAW06
 */
class Incidencia {
    //put your code here
    
    private $id_incidencia;
    private $desc_breve;
    private $desc_detallada;
    private $fecha_hora;
    private $prioridad;
    private $estado;
    private $categoria;
    
    private $cliente;
    private $tecnico;
    
    function __construct($id_incidencia, $desc_breve = null, $desc_detallada = null, $fecha_hora = null, $prioridad = null, $estado = null, $categoria = null, $cliente = null, $tecnico = null) {
        $this->id_incidencia = $id_incidencia;
        $this->desc_breve = $desc_breve;
        $this->desc_detallada = $desc_detallada;
        $this->fecha_hora = $fecha_hora;
        $this->prioridad = $prioridad;
        $this->estado = $estado;
        $this->categoria = $categoria;
        $this->cliente = $cliente;
        $this->tecnico = $tecnico;
        
    }


    function getId_incidencia() {
        return $this->id_incidencia;
    }

    function getDesc_breve() {
        return $this->desc_breve;
    }

    function getDesc_detallada() {
        return $this->desc_detallada;
    }

    function getFecha_hora() {
        return $this->fecha_hora;
    }

    function getPrioridad() {
        return $this->prioridad;
    }

    function getEstado() {
        return $this->estado;
    }

    function getCategoria() {
        return $this->categoria;
    }

    function getCliente() {
        return $this->cliente;
    }

    function getTecnico() {
        return $this->tecnico;
    }

    function setId_incidencia($id_incidencia) {
        $this->id_incidencia = $id_incidencia;
    }

    function setDesc_breve($desc_breve) {
        $this->desc_breve = $desc_breve;
    }

    function setDesc_detallada($desc_detallada) {
        $this->desc_detallada = $desc_detallada;
    }

    function setFecha_hora($fecha_hora) {
        $this->fecha_hora = $fecha_hora;
    }

    function setPrioridad($prioridad) {
        $this->prioridad = $prioridad;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    function setTecnico($tecnico) {
        $this->tecnico = $tecnico;
    }


   
}
