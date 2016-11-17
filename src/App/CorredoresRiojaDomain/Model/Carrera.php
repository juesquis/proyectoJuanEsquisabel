<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\CorredoresRiojaDomain\Model;

class Carrera {
    
    private $Id;
    private $Nombre;
    private $Descripcion;
    private $FechaCelebracion;
    private $Distancia;
    private $FechaLimiteInscripcion;
    private $NumeroMaximoParticipantes;
    private $Imagen;
    private $Slug;
    private $Organizacion;
    
    function __construct($Id, $Nombre, $Descripcion, $FechaCelebracion, $Distancia, $FechaLimiteInscripcion, $NumeroMaximoParticipantes, $Imagen,$organizacion) {
        $this->Id = $Id;
        $this->Nombre = $Nombre;
        $this->Descripcion = $Descripcion;
        $this->FechaCelebracion = $FechaCelebracion;
        $this->Distancia = $Distancia;
        $this->FechaLimiteInscripcion = $FechaLimiteInscripcion;
        $this->NumeroMaximoParticipantes = $NumeroMaximoParticipantes;
        $this->Imagen = $Imagen;
        $this->Organizacion=$organizacion;
        $this->Slug = $this->getSlug($Nombre); 
    }

    
    static public function getSlug($cadena, $separador = '-'){
        // Código copiado de http://cubiq.org/the-perfect-php-clean-url-generator
        $slug = iconv('UTF-8', 'ASCII//TRANSLIT', $cadena);
        $slug = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $slug);
        $slug = strtolower(trim($slug, $separador));
        $slug = preg_replace("/[\/_|+ -]+/", $separador, $slug);
        return $slug;
    }
    
    function getId() {
        return $this->Id;
    }

    function getNombre() {
        return $this->Nombre;
    }

    function getDescripcion() {
        return $this->Descripcion;
    }

    function getFechaCelebracion() {
        return $this->FechaCelebracion;
    }

    function getDistancia() {
        return $this->Distancia;
    }

    function getFechaLimiteInscripcion() {
        return $this->FechaLimiteInscripcion;
    }

    function getNumeroMaximoParticipantes() {
        return $this->NumeroMaximoParticipantes;
    }

    function getImagen() {
        return $this->Imagen;
    }
    
    function getOrganizacion() {
        return $this->Organizacion;
    }
   

    public function __toString() {
        return "Id: ".$this->Id." Nombre: ".$this->Nombre." Descripcion: ".$this->Descripcion." Fecha celebración: ".$this->FechaCelebracion->format('Y-m-d H:i:s')." Distancia: ".$this->Distancia." Fecha límite inscripción: ".$this->FechaLimiteInscripcion->format('Y-m-d H:i:s')." Número máximo participantes: ".$this->NumeroMaximoParticipantes." Slug: ".$this->Slug." Organizacion: ".$this->Organizacion;
    }
    

}
