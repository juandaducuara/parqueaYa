<?php

namespace App\Models;

use CodeIgniter\Model;

class NewModels extends Model
{
    protected $table = 'vehiculo';
    public function getVehiculos($placa = false)
    {
        if ($placa === false) {
            return $this->findAll();
        }

        return $this->where(['placa' => $placa])->first();
    }
    protected $allowedFields = ['placa', 'color', 'modelo','clase'];
}
