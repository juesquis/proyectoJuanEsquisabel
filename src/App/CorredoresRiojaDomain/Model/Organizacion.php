<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\CorredoresRiojaDomain\Model;

class Organizacion {
    
    private $Id;
    private $Nombre;
    private $Descripcion;
    private $Email;
    private $Password;
    private $Salt;
    private $Slug;
    
    function __construct($Id, $Nombre, $Descripcion, $Email, $Password) {
        $this->Id = $Id;
        $this->Nombre = $Nombre;
        $this->Descripcion = $Descripcion;
        $this->Email = $Email;
        $this->Password = $Password;
        $this->Salt = md5(time());
        $this->Slug = $this->getSlug( $Nombre); 
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

    function getEmail() {
        return $this->Email;
    }

    function getPassword() {
        return $this->Password;
    }

    function getSalt() {
        return $this->Salt;
    }


   public function __toString() {
        return "Id: ".$this->Id." Nombre: ".$this->Nombre." Descripcion: ".$this->Descripcion." Email: ".$this->Email." Password: ".$this->Password." Salt: ".$this->Salt." Slug: ".$this->Slug;
    }
    

}