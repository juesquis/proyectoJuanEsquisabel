<?php

namespace App\CorredoresRiojaDomain\Repository;
use App\CorredoresRiojaDomain\Model\Organizacion;
use App\CorredoresRiojaDomain\Model\Carrera;

interface ICarreraRepository {
    public function registrarCarrera(Carrera $carrera);
    public function actualizarCarrera(Carrera $carrera);
    public function eliminarCarrera(Carrera $carrera);
    public function buscarCarreraSlug($slug);
    public function buscarCarreraOrgDisputadas(Organizacion $organizacion,$fecha);
    public function buscarCarreraOrgNoDisputadas(Organizacion $organizacion,$fecha);
    public function carrerasDisponibles();
    public function buscarCarreraDisputadas($fecha);
    public function buscarCarreraNoDisputadas($fecha);
    
}
