<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    // MASS ASSIGNMENT -------------------------------------------------------
    // define which attributes are mass assignable (for security)
    // we only want these 3 attributes able to be filled
    protected $fillable = array('name_department');

    // DEFINE RELATIONSHIPS --------------------------------------------------
    // each Department BELONGS TO a Branch
    public function branch() {
        return $this->belongsTo('App\Models\Branch'); // this matches the Eloquent model
    }    

    // each Department BELONGS TO a Enterprise
    public function Enterprise() {
        return $this->belongsTo('App\Models\Enterprise'); // this matches the Eloquent model
    } 
   
}
