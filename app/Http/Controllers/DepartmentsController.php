<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\DepartmentFormRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

class DepartmentsController extends Controller
{
    public function index(){
    	$data["titleSection"] = "Lista de Departamentos";
    	$data["section"] = "departamentos";
    	$data["showButtonAdd"] = 1;
    	return view("pages/listDepartments", $data);
    }

    public function showAddForm(){    
    	$data["titleSection"] = "Agregar un Departamento";
   		$data["section"] = "departamentos";	
    	return view("pages/formDepartment", $data);
    }

    public function store(DepartmentFormRequest $request){
        return Redirect::to('departamentos')->with('message', 'Departamento agregado con éxito!');    
    }
}
