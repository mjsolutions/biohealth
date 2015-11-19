<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EmployeesController extends Controller
{
    public function index(){
    	$data["titleSection"] = "Lista de Empleados";
    	$data["section"] = "empleados";
    	$data["showButtonAdd"] = 1;
    	return view("pages/listEmployees", $data);
    }
}