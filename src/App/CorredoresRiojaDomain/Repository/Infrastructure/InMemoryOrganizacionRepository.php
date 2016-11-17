<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\CorredoresRiojaDomain\Repository\Infrastructure;
use App\CorredoresRiojaDomain\Repository\IOrganizacionRepository;
use App\CorredoresRiojaDomain\Model\Organizacion;
/**
 * Description of InMemoryOrganizacionRepository
 *
 * @author juanesquisabel
 */
class InMemoryOrganizacionRepository implements IOrganizacionRepository{
    //put your code here
    private $organizaciones;
    
     public function __construct() {
         $this ->organizaciones[] = new Organizacion("1","Organizacion1", "descripción de la organizacion 1","org1@gmail.com","org1");
         $this ->organizaciones[] = new Organizacion("2","Organizacion 2", "descripción de la organizacion 2","org2@gmail.com","org2");
         $this ->organizaciones[] = new Organizacion("3","Organizacion 3", "descripción de la organizacion 3","org3@gmail.com","org3");
    }
    
    public function registrarOrganizacion(Organizacion $organizacion){
        
    }
    public function actualizarOrganizacion(Organizacion $organizacion){
        
    }
    public function eliminarOrganizacion(Organizacion $organizacion){
        
    }
    public function buscarOrganizacionSlug($slug){
        foreach ($this->organizaciones as $org){
            if($org->getSlug($org->getNombre())== $org->getSlug($slug)){
                return $org;
            }
        }
        return "no hay ninguna organizacion con ese slug";
    }
    public function buscarOrganizacionEmail($email){
        
    }
    public function organizacionesDisponibles(){
        
    }
}
