<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConformityControl extends Model
{
    use HasFactory;
    protected $table = 'conformities_controls';
    public function vehicule()
    {
        return $this->hasOne(Vehicule::class,'id','id_vehicule');
    }
}
