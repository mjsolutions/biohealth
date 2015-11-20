<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SchedulesController extends Controller
{
    public function index(){
    	$data["titleSection"] = "Lista de Horarios";
    	$data["section"] = "horarios";
    	$data["showButtonAdd"] = 1;
    	return view("pages/listSchedules", $data);
    }

    public function showAddForm(){    
    	$data["titleSection"] = "Agregar un Horario";
   		$data["section"] = "horarios";	
    	return view("pages/formSchedule", $data);
    }
}
