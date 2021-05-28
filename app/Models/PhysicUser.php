<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhysicUser extends Model
{
    use HasFactory;
      protected $table = 'physics_clients';

    protected $fillable = ['id_client'];
}
