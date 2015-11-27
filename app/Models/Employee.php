<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    // MASS ASSIGNMENT -------------------------------------------------------
    // define which attributes are mass assignable (for security)
    // we only want these 3 attributes able to be filled
    protected $fillable = array('name_employee', 'user', 'password', 'enterprise_id', 'branch_id', 'department_id', 'schedule_id', 'address', 'postalcode', 'state_id', 'county_id', 'phone', 'cellphone', 'email');

    // DEFINE RELATIONSHIPS --------------------------------------------------
    // each Employee BELONGS TO a Enterprise
    public function enterprise() {
        return $this->belongsTo('App\Models\Enterprise'); // this matches the Eloquent model
    }

    // each Employee BELONGS TO a Branch
    public function branch() {
        return $this->belongsTo('App\Models\Branch'); // this matches the Eloquent model
    }

    // each Employee BELONGS TO a Department
    public function department() {
        return $this->belongsTo('App\Models\Department'); // this matches the Eloquent model
    }

    // each Employee BELONGS TO a Schedule
    public function schedule() {
        return $this->belongsTo('App\Models\Schedule'); // this matches the Eloquent model
    }    

    // each Employee BELONGS TO a State
    public function state() {
        return $this->belongsTo('App\Models\State'); // this matches the Eloquent model
    }

    // each Employee BELONGS TO a County
    public function county() {
        return $this->belongsTo('App\Models\County'); // this matches the Eloquent model
    }


}