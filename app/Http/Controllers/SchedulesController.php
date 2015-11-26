<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ScheduleFormRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

use App\Models\Schedule;
use Input;

class SchedulesController extends Controller
{
    public function index($operationCode = null){
    	$data["titleSection"] = "Lista de Horarios";
    	$data["section"] = "horarios";
    	$data["showButtonAdd"] = 1;
        $data["schedules"] = Schedule::all();

        if(isset($operationCode)){
            if($operationCode == "agregado"){
                $data["messageAlertTitle"] = "Horario agregado con éxito!";
            }
            if($operationCode == "editado"){
                $data["messageAlertTitle"] = "Horario editado con éxito!";
            }
            if($operationCode == "eliminado"){
                $data["messageAlertTitle"] = "Horario eliminado con éxito!";
            }
        }
    	return view("pages/listSchedules", $data);
    }

    public function showAddForm(){    
    	$data["titleSection"] = "Agregar un Horario";
   		$data["section"] = "horarios";	
    	return view("pages/formSchedule", $data);
    }

    public function store(ScheduleFormRequest $request){

        //Save new Schedule
        $schedule = new Schedule;
        $schedule->name_schedule = Input::get('nombre');
        $schedule->type = Input::get('tipo');

        if(Input::get('tipo') == 1){
            //Horario Fijo
            $schedule->break = 1; //Los horarios fijos tienen hora de comida
            if(Input::get('mismoHorarioTodosDias')){
                //Mismo Horario para todos los dias
                $entrada = strtotime("1970-01-01 ".Input::get('entrance_x'));
                $comida = strtotime("1970-01-01 ".Input::get('break_x'));
                $regreso = strtotime("1970-01-01 ".Input::get('return_x'));
                $salida = strtotime("1970-01-01 ".Input::get('departure_x'));
                $numDiasSeleccionados = 0;
                $diasSeleccionados = Input::get('diasFijo');
                foreach ($diasSeleccionados as $diaSeleccionado) {
                    $x = "".$diaSeleccionado;
                    $schedule->{"start_".$x} = date("00:00:00");
                    $schedule->{"entrance_".$x} = Input::get('entrance_x');
                    $schedule->{"break_".$x} = Input::get('break_x');
                    $schedule->{"return_".$x} = Input::get('return_x');
                    $schedule->{"departure_".$x} = Input::get('departure_x');
                    $schedule->{"end_".$x} = date("23:59:59");
                    $numDiasSeleccionados++;
                }
                $total_time_schedule = ( (($comida - $entrada) + ($salida - $regreso)) * $numDiasSeleccionados);
                $schedule->total_time = (($total_time_schedule / 60) / 60); //Conversion a minutos: /60... y a horas de nuevo: /60
            }
            else{
                //Horarios distintos para los dias marcados
                $diasSeleccionados = Input::get('diasFijo');
                $numDiasSeleccionados = 0;
                $total_time_schedule = 0;
                foreach ($diasSeleccionados as $diaSeleccionado) {
                    $dia = "".$diaSeleccionado;
                    $entrada = strtotime("1970-01-01 ".Input::get('entrance_'.$dia));
                    $comida = strtotime("1970-01-01 ".Input::get('break_'.$dia));
                    $regreso = strtotime("1970-01-01 ".Input::get('return_'.$dia));
                    $salida = strtotime("1970-01-01 ".Input::get('departure_'.$dia));
                    $schedule->{"start_".$dia} = date("00:00:00");
                    $schedule->{"entrance_".$dia} = Input::get('entrance_'.$dia);
                    $schedule->{"break_".$dia} = Input::get('break_'.$dia);
                    $schedule->{"return_".$dia} = Input::get('return_'.$dia);
                    $schedule->{"departure_".$dia} = Input::get('departure_'.$dia);
                    $schedule->{"end_".$dia} = date("23:59:59");

                    $total_time_per_day = ( (($comida - $entrada) + ($salida - $regreso)) );

                    $total_time_schedule += $total_time_per_day;

                    $numDiasSeleccionados++;
                }
                $schedule->total_time = (($total_time_schedule / 60) / 60); //Conversion a minutos: /60... y a horas de nuevo: /60
            }
        }

        if(Input::get('tipo') == 2){
            //Horario Variable
            $schedule->break = 0; //Los horarios variable no tienen hora de comida
        }

        $schedule->save();
        return Redirect::to('horarios/agregado');
    }

    public function delete($id){
        Schedule::findOrFail($id)->destroy($id);
        return Redirect::to('horarios/eliminado');    
    }
}

