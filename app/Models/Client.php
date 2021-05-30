<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
  use HasFactory;

  protected $fillable = ['id_user'];

  public function isPhysic()
  {
    return PhysicClient::where('id_client', $this->id_user)->exists();
  }

  public function user()
  {
    return $this->hasOne(User::class, 'id', 'id_user');
  }

  public function moralClient()
  {
    return $this->hasOne(MoralClient::class, 'id_client', 'id_user');
  }

  public function physicClient()
  {
    return $this->hasOne(PhysicClient::class, 'id_client', 'id_user');
  }

  /* public function user()
    {
        return $this->belongsTo(User::class,'id_user');
    } */
}
