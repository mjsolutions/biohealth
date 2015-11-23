<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\EnterpriseFormRequest;

use Illuminate\Support\Facades\Redirect;

use App\Http\Controllers\Controller;



class EnterprisesController extends Controller
{	
    public function index(){
    	$data["titleSection"] = "Lista de Empresas";
   		$data["section"] = "empresas";
    	$data["showButtonAdd"] = 1;
    	return view("pages/listEnterprises", $data);
    }

    public function showAddForm(){    
    	$data["titleSection"] = "Agregar una Empresa";
   		$data["section"] = "empresas";	
    	return view("pages/formEnterprise", $data);
    }

    public function saveEnterprise(EnterpriseFormRequest $request){
        return Redirect::to('empresas')->with('message', 'Empresa agregada con éxito!');    
    }
}
