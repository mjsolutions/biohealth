<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{
	protected $fillable = array('id', 'nombre');

	public function state() {
        return $this->belongsTo('App\Models\State'); // this matches the Eloquent model
    }
}