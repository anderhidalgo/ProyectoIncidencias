<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Historico
 *
 * @author 2GDAW06
 */
class Historico {

    private $id_historico;
    private $anotacion;
    private $fecha_hora;

    private $incidencia;
    private $tecnico;
    
    function __construct($id_historico, $anotacion, $fecha_hora, $incidencia = null, $tecnico) {
        $this->id_historico = $id_historico;
        $this->anotacion = $anotacion;
        $this->fecha_hora = $fecha_hora;
        $this->incidencia = $incidencia;
        $this->tecnico = $tecnico;
    }
    
    function getId_historico() {
        return $this->id_historico;
    }

    function getAnotacion() {
        return $this->anotacion;
    }

    function getFecha_hora() {
        return $this->fecha_hora;
    }

    function getIncidencia() {
        return $this->incidencia;
    }

    function getTecnico() {
        return $this->tecnico;
    }

    function setId_historico($id_historico) {
        $this->id_historico = $id_historico;
    }

    function setAnotacion($anotacion) {
        $this->anotacion = $anotacion;
    }

    function setFecha_hora($fecha_hora) {
        $this->fecha_hora = $fecha_hora;
    }

    function setIncidencia($incidencia) {
        $this->incidencia = $incidencia;
    }

    function setTecnico($tecnico) {
        $this->tecnico = $tecnico;
    }
  
    
}
