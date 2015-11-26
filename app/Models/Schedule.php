<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    // MASS ASSIGNMENT -------------------------------------------------------
    // define which attributes are mass assignable (for security)
    // we only want these 3 attributes able to be filled
    protected $fillable = array('id_enterprise', 'name_branch', 'address', 'postalcode', 'state', 'county', 'phone');

    // DEFINE RELATIONSHIPS --------------------------------------------------
    // each Schedule HAS MANY Employees
    public function employee() {
        return $this->hasMany('App\Models\Employee'); // this matches the Eloquent model
    }    
}
