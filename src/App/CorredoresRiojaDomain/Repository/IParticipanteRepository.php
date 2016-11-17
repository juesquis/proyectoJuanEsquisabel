<?php

namespace App\CorredoresRiojaDomain\Repository;
use App\CorredoresRiojaDomain\Model\Participante;
use App\CorredoresRiojaDomain\Model\Carrera;
use App\CorredoresRiojaDomain\Model\Corredor;

interface IParticipanteRepository {
    public function registrarParticipante(Corredor $corredor, Carrera $carrera);
    public function buscarParticipacionCarreras(Carrera $carrera,Participantes $participantes);
    public function buscarParticipantes(Carrera $carrera);
    public function buscarCarreraDispCorredor(Corredor $corredor);
    public function buscarCarreraNoDispCorredor(Corredor $corredor);
    public function comprobarCorredorCarrera(Participante $participante,Carrera $carrera);
    public function actualizarTiempoCorredorCarrera(Participante $participante,  Carrera $carrera, $tiempo);
    public function eliminarParticipacion(Corredor $corredor, Carrera $carrera);
}
