<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    // MASS ASSIGNMENT -------------------------------------------------------
    // define which attributes are mass assignable (for security)
    // we only want these 3 attributes able to be filled
    protected $fillable = array('employee_id', 'type_schedule', 'current_date', 'day_number', 'entrance', 'break', 'return', 'departure', 'activity_report');

    // DEFINE RELATIONSHIPS --------------------------------------------------
    // each Employee BELONGS TO a Enterprise
    public function employee() {
        return $this->belongsTo('App\Models\Employee'); // this matches the Eloquent model
    }  


}