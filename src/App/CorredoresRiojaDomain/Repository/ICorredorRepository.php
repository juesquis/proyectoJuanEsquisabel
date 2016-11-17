<?php

namespace App\CorredoresRiojaDomain\Repository;
use App\CorredoresRiojaDomain\Model\Corredor;
interface ICorredorRepository {
    //put your code here
    public function registrarCorredor(Corredor $corredor);
    public function actualizarCorredor(Corredor $corredor);
    public function eliminarCorredor(Corredor $corredor);
    public function buscaCorredor($dni);
    public function corredoresDisponibles();
}
