<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CheckFormRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Models\Employee;
use App\Models\Check;
use Input;
use Jenssegers\Date\Date;
use Carbon\Carbon;
use Session;


class CheckController extends Controller
{
    public function index($operationCode = null){
    	$data["titleSection"] = "Reloj Checador";
        $currentDateTime = Date::now();
        $data["displayTime"] = $currentDateTime->format("H:i")." Hrs.";
        $data["displayDate"] = $currentDateTime->format("l j")." de ".$currentDateTime->format("F")." de ".$currentDateTime->format("Y");
        return view("pages/check", $data);
    }   

    public function check(CheckFormRequest $request){
        if($this->authEmployee(Input::get('usuario'), Input::get('clave'))){
            //User exists and the password is valid
            $employee = Employee::find(Input::get('usuario'));
            $lastCheck = Check::select("id", "type_schedule", "current_date", "break", "return", "departure", "activity_report")->where("employee_id", "=", $employee->id)->orderBy('id', 'desc')->first();
            $currentDateTime = Carbon::now();

            if($lastCheck != null){
                //Regular Check
                if($currentDateTime->format("Y-m-d") == $lastCheck->current_date){
                    //Employee already checked entrance
                    $check = Check::find($lastCheck->id);
                    if($lastCheck->type_schedule == 1){
                        //Fixed Schedule                        
                        if($lastCheck->break == null){
                            $check->break = $currentDateTime->toTimeString();
                            $check->save();
                            return Redirect::to('checador')->with([
                                'user' => $employee->name_employee,
                                'type-check' => 'departure',
                                'time-check' => "Salida: ".$currentDateTime->format("H:i")." Hrs",
                            ]);
                        }
                        else if($lastCheck->return == null){
                            $check->return = $currentDateTime->toTimeString();
                            $check->save();
                            return Redirect::to('checador')->with([
                                'user' => $employee->name_employee,
                                'type-check' => 'entrance',
                                'time-check' => "Entrada: ".$currentDateTime->format("H:i")." Hrs",
                            ]);
                        }
                        if($lastCheck->departure == null){
                            //Variable Schedule: show Activity Report Form 
                            $randomToken = str_random(20);
                            $check->token = $randomToken;
                            $check->save();
                            return Redirect::to('checador')->with([
                                'token' => $lastCheck->id.":".$randomToken,
                                'user' => $employee->name_employee,
                                'type-check' => 'report',                                
                            ]);
                        }
                        else{
                            return Redirect::to('checador')->with([
                                'user' => $employee->name_employee,
                                'type-check' => 'done',
                                'time-check' => "El empleado ya checó su salida",
                            ]);
                        }
                    }
                    else if($lastCheck->type_schedule == 2){
                        if($lastCheck->departure == null){
                            //Variable Schedule: show Activity Report Form 
                            $randomToken = str_random(20);
                            $check->token = $randomToken;
                            $check->save();
                            return Redirect::to('checador')->with([
                                'token' => $lastCheck->id.":".$randomToken,
                                'user' => $employee->name_employee,
                                'type-check' => 'report',                                
                            ]);
                        }
                        else{
                            return Redirect::to('checador')->with([
                                'user' => $employee->name_employee,
                                'type-check' => 'done',
                                'time-check' => "El empleado ya checó su salida",
                            ]);
                        }                                                
                    }                
                }
                else{
                    //Save new regular Check
                    $this->newCheck();
                    return Redirect::to('checador')->with([
                        'user' => $employee->name_employee,
                        'type-check' => 'entrance',
                        'time-check'=> "Entrada: ".$currentDateTime->format("H:i")." Hrs",
                    ]);
                }
            }
            else{
                //Save new first Time Check
                $this->newCheck();
                return Redirect::to('checador')->with([
                    'user' => $employee->name_employee,
                    'type-check' => 'entrance',
                    'time-check'=> "Entrada: ".$currentDateTime->format("H:i")." Hrs",
                ]);
            }            
        }
        else{
             //Auth fails user not exists or password wrong
            return Redirect::to('checador')->with('error', 'No. de Empleado o Clave incorrectos!');
        }        
    }

    public function submitActivityReport(){
         $token = Input::get('tokenCheck');
         $tokenItems = explode(":", $token); //item[0] = idCheck, item[2] = tokenCheck
         $check = Check::find($tokenItems[0]);
         $currentDateTime = Carbon::now();

         if($check->token == $tokenItems[1]){
            $check->departure = $currentDateTime->toTimeString();
            $check->activity_report = Input::get('reporteActividades');            
            $check->save();
            return Redirect::to('checador')->with([
                    'user' => $check->employee->name_employee,
                    'type-check' => 'departure',
                    'time-check'=> "Salida: ".$currentDateTime->format("H:i")." Hrs",
                ]);
         }
         else{
            return Redirect::to('checador')->with('error', 'La información que intenta modficar está corrupta!');
         }         
    }

    protected function dayToNumber($nameDay){
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

    protected function newCheck(){
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

    protected function authEmployee($idEmployee, $password){
        try{
            $employee = Employee::findOrFail($idEmployee);
            if($employee->password == $password){
                return true;
            }
            else{
                return false;
            }
        }        
        catch(ModelNotFoundException $event){
            return false;
        }        
    }
 
}

