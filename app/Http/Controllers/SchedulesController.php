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
    	return view("pages/lists/listSchedules", $data);
    }

    public function showAddForm(){    
    	$data["titleSection"] = "Agregar un Horario";
   		$data["section"] = "horarios";
        $data["buttonSaveFormText"] = "Agregar";
    	return view("pages/forms/formSchedule", $data);
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
                $tiempo_total_semanal = ( (($comida - $entrada) + ($salida - $regreso)) * $numDiasSeleccionados);
                $schedule->total_time = (($tiempo_total_semanal / 60) / 60); //Conversion a minutos: /60... y a horas de nuevo: /60
            }
            else{
                //Horarios distintos para los dias marcados
                $diasSeleccionados = Input::get('diasFijo');
                $tiempo_total_semanal = 0;
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

                    $tiempo_total_diario = ( (($comida - $entrada) + ($salida - $regreso)) );

                    $tiempo_total_semanal += $tiempo_total_diario;                  
                }
                $schedule->total_time = (($tiempo_total_semanal / 60) / 60); //Conversion a minutos: /60... y a horas de nuevo: /60
            }
        }

        if(Input::get('tipo') == 2){
            //Horario Variable
            $schedule->break = 0; //Los horarios variable no tienen hora de comida
            $numDiasSeleccionados = 0;
            $horasSemanales = 0;
            $diasSeleccionados = Input::get('diasVariable');
            $horasDiarias = strtotime("1970-01-01 ".Input::get('horasDiarias'));


            foreach ($diasSeleccionados as $diaSeleccionado) {
                $x = "".$diaSeleccionado;
                $schedule->{"start_".$x} = date("00:00:00");
                $schedule->{"end_".$x} = date("23:59:59");
                $numDiasSeleccionados++;
            }

            $horasSemanales = $horasDiarias*$numDiasSeleccionados;


            $schedule->total_time = (($horasSemanales / 60) / 60);
        }

        $schedule->save();
        return Redirect::to('horarios/agregado');
    }


    public function showEditForm($id){    
        $data["titleSection"] = "Editar Horario";
        $data["section"] = "horarios";
        $data["buttonSaveFormText"] = "Guardar";
        $data["schedule"] = Schedule::findOrFail($id);

        if($data["schedule"]->type == 2){
            //descomponer totalTime / diasLaboralesGuardados
            $diasLaboralesGuardados = 0;
            for($x=1; $x<=7; $x++){
                if($data["schedule"]->{"start_".$x} != null){
                    $diasLaboralesGuardados++;
                }                
            }
            $horas = ($data["schedule"]->total_time / $diasLaboralesGuardados);
            $minutos = ($data["schedule"]->total_time % $diasLaboralesGuardados); //Minutos es el residuo de la division... si es 0 se multiplica por 30 y aun es 0 y si es 1 significa que el dia tiene X hras y 30 minutos
            $data["horasPorDia"] = date("h:i", mktime($horas, $minutos*30, 0, 1, 1, 1970));
        }        
        return view("pages/edits/editSchedule", $data);
    }

    public function update(ScheduleFormRequest $request, $id){

        //Save new Schedule
        $schedule = Schedule::findOrFail($id);
        $schedule->name_schedule = Input::get('nombre');
        $schedule->type = Input::get('tipo');

        for($x=1; $x<=7; $x++){
            //Limpiar dias asignando null a todo el registro
            $schedule->{"start_".$x} = null;
            $schedule->{"entrance_".$x} = null;
            $schedule->{"break_".$x} = null;
            $schedule->{"return_".$x} = null;
            $schedule->{"departure_".$x} = null;
            $schedule->{"end_".$x} = null;
        }

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
                $tiempo_total_semanal = ( (($comida - $entrada) + ($salida - $regreso)) * $numDiasSeleccionados);
                $schedule->total_time = (($tiempo_total_semanal / 60) / 60); //Conversion a minutos: /60... y a horas de nuevo: /60
            }
            else{
                //Horarios distintos para los dias marcados
                $diasSeleccionados = Input::get('diasFijo');
                $tiempo_total_semanal = 0;
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

                    $tiempo_total_diario = ( (($comida - $entrada) + ($salida - $regreso)) );

                    $tiempo_total_semanal += $tiempo_total_diario;                  
                }
                $schedule->total_time = (($tiempo_total_semanal / 60) / 60); //Conversion a minutos: /60... y a horas de nuevo: /60
            }
        }

        if(Input::get('tipo') == 2){
            //Horario Variable
            $schedule->break = 0; //Los horarios variable no tienen hora de comida
            $numDiasSeleccionados = 0;
            $horasSemanales = 0;
            $diasSeleccionados = Input::get('diasVariable');
            $horasDiarias = strtotime("1970-01-01 ".Input::get('horasDiarias'));

            foreach ($diasSeleccionados as $diaSeleccionado) {
                $x = "".$diaSeleccionado;
                $schedule->{"start_".$x} = date("00:00:00");
                $schedule->{"end_".$x} = date("23:59:59");
                $numDiasSeleccionados++;
            }
            $horasSemanales = $horasDiarias*$numDiasSeleccionados;
            $schedule->total_time = (($horasSemanales / 60) / 60);
        }

        $schedule->save();
        return Redirect::to('horarios/editado');
    }

    public function delete($id){
        Schedule::findOrFail($id)->destroy($id);
        return Redirect::to('horarios/eliminado');    
    }
}


