<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\CorredoresRiojaDomain\Model;
use App\CorredoresRiojaDomain\Model\Carrera;
use \App\CorredoresRiojaDomain\Model\Corredor;

class Participante {
    
    private $Dorsal;
    private $Tiempo;
    private $Carrera;
    private $Corredor;
    
    function __construct($Dorsal, $Tiempo,Carrera $carrera,Corredor $corredor) {
        $this->Dorsal = $Dorsal;
        $this->Tiempo = $Tiempo;
        $this->Carrera = $carrera;
        $this->Corredor = $corredor;
    }
    
    function getDorsal() {
        return $this->Dorsal;
    }

    function getTiempo() {
        return $this->Tiempo;
    }

    function getCarrera() {
        return $this->Carrera;
    }

    function getCorredor() {
        return $this->Corredor;
    }


     
    public function __toString() {
        return "Dorsal: ".$this->Dorsal." Tiempo: ".$this->Tiempo." Carrera: ".$this->Carrera;
    }


    
}