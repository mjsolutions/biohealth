<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReportsController extends Controller
{
    public function index(){
    	$data["titleSection"] = "Reportes de Asistencia";
    	$data["section"] = "reportes";
    	return view("pages/lists/listReports", $data);
    }
}