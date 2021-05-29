<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;
     protected $fillable = ['id_user','first_name','last_name'];
     
    public function contract()
    {
        return $this->hasMany(Contract::class,'id');
    }
    public function states_controls()
    {
        return $this->hasMany(StateControl::class,'id');
    }
}
