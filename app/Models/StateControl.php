<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StateControl extends Model
{
    use HasFactory;
    protected $table = 'states_controls';
    public function vehicule()
    {
        return $this->hasOne(Vehicule::class,'id','id_vehicule');
    }
    public function employe()
    {
        return $this->hasOne(Employe::class,'id','id_employe');
    }
}
