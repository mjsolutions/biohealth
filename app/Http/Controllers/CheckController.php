<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CheckFormRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

use App\Models\Employee;
use App\Models\Check;
use Input;
use Carbon\Carbon;

class CheckController extends Controller
{
    public function index($operationCode = null){
    	$data["titleSection"] = "Reloj Checador";
        return view("pages/check", $data);
    }   

    public function check(CheckFormRequest $request){
        $employee = Employee::findOrFail(Input::get('usuario'));
        $lastCheck = Check::select("id","current_date")->where("employee_id", "=", $employee->id)->orderBy('id', 'desc')->first();
        $currentDateTime = Carbon::now();        

        if($lastCheck != null){
            //Regular Check
            if($currentDateTime->format("Y-m-d") == $lastCheck->current_date){
                //Employee already checked entrance
                $check = Check::findOrFail($lastCheck->id);
                $check->departure = $currentDateTime->toTimeString();
                $check->save();
            }
            else{
                //Save new Check
                $check = new Check;
                $employee = Employee::findOrFail(Input::get('usuario'));
                $currentDateTime = Carbon::now();
                $check->employee_id = $employee->id;
                $check->type_schedule = $employee->schedule->type;
                $check->current_date = $currentDateTime->format("Y-m-d");
                $check->day_number = $this->dayToNumber($currentDateTime->format("l"));
                $check->entrance = $currentDateTime->toTimeString();
                $check->save();

            }
        }
        else{
            //First Time Check
            //Save new Check
            $check = new Check;
            $employee = Employee::findOrFail(Input::get('usuario'));
            $currentDateTime = Carbon::now();
            $check->employee_id = $employee->id;
            $check->type_schedule = $employee->schedule->type;
            $check->current_date = $currentDateTime->format("Y-m-d");
            $check->day_number = $this->dayToNumber($currentDateTime->format("l"));
            $check->entrance = $currentDateTime->toTimeString();
            $check->save();

        }        
        return Redirect::to('checar');    
    }

    public function dayToNumber($nameDay){
        switch ($nameDay) {
            case 'Monday':
                return 1;                
            break;
            case 'Tuesday':
                return 2;                
            break;
            case 'Wednesday':
                return 3;
            break;
            case 'Thursday':
                return 4;
            break;
            case 'Friday':
                return 5;
            break;
            case 'Saturday':
                return 6;
            break;
            case 'Sunday':
                return 7;
            break;            
        }
    }
 
}

