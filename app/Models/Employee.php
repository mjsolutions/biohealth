<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    // MASS ASSIGNMENT -------------------------------------------------------
    // define which attributes are mass assignable (for security)
    // we only want these 3 attributes able to be filled
    protected $fillable = array('id_enterprise', 'name_branch', 'address', 'postalcode', 'state', 'county', 'phone');

    // DEFINE RELATIONSHIPS --------------------------------------------------
    // each Employee BELONGS TO a Schedule
    public function schedule() {
        return $this->belongsTo('App\Models\Schedule'); // this matches the Eloquent model
    }    
}