<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AssistanceController extends Controller
{
    public function index(){
    	$data["titleSection"] = "Reportes de Asistencia";
    	$data["section"] = "asistencia";
    	return view("pages/lists/listReports", $data);
    }
}