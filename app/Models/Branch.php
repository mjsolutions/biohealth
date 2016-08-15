<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    // MASS ASSIGNMENT -------------------------------------------------------
    // define which attributes are mass assignable (for security)
    // we only want these 3 attributes able to be filled
    protected $fillable = array('id_enterprise', 'name_branch', 'address', 'postalcode', 'state', 'county', 'phone');

    // DEFINE RELATIONSHIPS --------------------------------------------------
    // each Branch BELONGS TO an Enterprise
    public function enterprise() {
        return $this->belongsTo('App\Models\Enterprise'); // this matches the Eloquent model
    }

    // DEFINE RELATIONSHIPS --------------------------------------------------
    // each Branch BELONGS TO a State
    public function state() {
        return $this->belongsTo('App\Models\State'); // this matches the Eloquent model
    }

    // DEFINE RELATIONSHIPS --------------------------------------------------
    // each Branch BELONGS TO a County
    public function county() {
        return $this->belongsTo('App\Models\County'); // this matches the Eloquent model
    }
}
