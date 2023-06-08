<?php

namespace App\Models;

use CodeIgniter\Model;

class vehiculoModelo extends Model
{
    protected $table = 'vehiculo';
    public function getVehiculos($placa = false)
    {
        if ($placa === false) {
            return $this->findAll();
        }

        return $this->where(['placa' => $placa])->first();
    }
    public function getByPlaca($placa)
    {   
                return $this->where(['placa' => $placa]);
    }
    protected $allowedFields = ['placa', 'color', 'modelo','clase'];
}