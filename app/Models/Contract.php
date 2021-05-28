<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    public function contract_vehicule()
    {
        return $this->hasMany(ContractVehicule::class,'id_contract');
    }
}
