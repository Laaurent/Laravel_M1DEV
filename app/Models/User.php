<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
	use HasFactory, Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'email',
		'password',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	public function getAuthType()
	{
		return $this->user_type;
	}

	public function getAuthName()
	{
		return $this->name;
	}

	public function isClient()
	{
		if ($this->getAuthType() == 'client')
			return true;
		return false;
	}

	/* public function client()
	{
		return Client::where('id_user', $this->id)->first();
	} */

	public function client()
    {
        return $this->hasOne(Client::class,'id_user')->first();
    }
}
