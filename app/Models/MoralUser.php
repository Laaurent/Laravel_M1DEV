<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoralUser extends Model
{
    use HasFactory;
    protected $table = 'morals_clients';

    protected $fillable = ['id_client'];
}
