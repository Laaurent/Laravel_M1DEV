<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoralClient extends Model
{
	use HasFactory;
	protected $table = 'morals_clients';

	protected $fillable = ['id_client'];

	public function client()
	{
		return $this->hasOne(Client::class, 'id_user', 'id_client');
	}
}
