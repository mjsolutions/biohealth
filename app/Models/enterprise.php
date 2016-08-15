<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    // MASS ASSIGNMENT -------------------------------------------------------
    // define which attributes are mass assignable (for security)
    // we only want these 3 attributes able to be filled
    protected $fillable = array('name_enterprise', 'rfc');

    // DEFINE RELATIONSHIPS --------------------------------------------------
    // each enterprise HAS MANY branches
    public function branch() {
        return $this->hasMany('App\Models\Branch'); // this matches the Eloquent model
    }

    public function department(){
        return $this->hasManyThrough('App\Models\Branch', 'App\Models\Department');
    }

    
}
