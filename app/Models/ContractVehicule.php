<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractVehicule extends Model
{
    use HasFactory;
    protected $table = 'contracts_vehicules';

    public function vehicule()
    {
        return $this->hasOne(Vehicule::class,'id','id_vehicule');
    }
}
