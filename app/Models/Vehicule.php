<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
	use HasFactory;


	public function contract_vehicule()
	{
		return $this->hasMany(ContractVehicule::class, 'id_vehicule');
	}

	public function states_controls()
	{
		return $this->hasMany(StateControl::class, 'id_vehicule');
	}

	public function conformity_control()
	{
		return $this->hasMany(ConformityControl::class, 'id_vehicule');
	}
	public function conformity_controlActualYear()
	{
		return $this->conformity_control()->whereYear('date', '=', date('Y'))->exists();
	}
	public function conformity_controlFirstSemester()
	{
		return $this->conformity_control()
					->whereYear('date', '=', date('Y'))
					->whereDate('date','<=', date('Y-06-30'))
            		->whereDate('date','>=', date('Y-01-01'))
					->exists();
	}
	public function conformity_controlSecondSemester()
	{
		return $this->conformity_control()
					->whereYear('date', '=', date('Y'))
					->whereDate('date','<=', date('Y-12-31'))
            		->whereDate('date','>=', date('Y-07-01'))
					->exists();
	}

	public function isValid()
	{
		if($this->type == 'leger')
		{	
			$result = $this->conformity_controlActualYear() ? 1 : 0;

		} else {
			if (date('m') < 7) {
				$result = $this->conformity_controlFirstSemester() ? 1 : 0;
			} else {
				$result = $this->conformity_controlSecondSemester() && $this->conformity_controlFirstSemester() ? 1 : 0;
			}
		}
		return $result;
	}
}
