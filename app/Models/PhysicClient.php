<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhysicClient extends Model
{
	use HasFactory;
	protected $table = 'physics_clients';

	protected $fillable = ['id_client'];

	public function client()
	{
		return $this->hasOne(Client::class, 'id_user', 'id_client');
	}
}
