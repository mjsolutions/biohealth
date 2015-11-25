<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\EnterpriseFormRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

use App\Models\Enterprise;
use App\Models\Branch;
use App\Models\State;
use App\Models\County;
use Input;

class EnterprisesController extends Controller
{	
    public function index($operationCode = null){
    	$data["titleSection"] = "Lista de Empresas";
   		$data["section"] = "empresas";
    	$data["showButtonAdd"] = 1;
        $data["enterprises"] = Enterprise::all();

        if(isset($operationCode)){
            if($operationCode == "agregado"){
                $data["messageAlertTitle"] = "Empresa agregada con éxito!";
            }
            if($operationCode == "editado"){
                $data["messageAlertTitle"] = "Empresa editada con éxito!";
            }
            if($operationCode == "eliminado"){
                $data["messageAlertTitle"] = "Empresa eliminada con éxito!";
            }
        }
    	return view("pages/listEnterprises", $data);
    }

    public function showAddForm(){    
    	$data["titleSection"] = "Agregar una Empresa";
   		$data["section"] = "empresas";	
        $data["states"] = State::all();  

    	return view("pages/formEnterprise", $data);
    }

    public function store(EnterpriseFormRequest $request){

        //Save new Enterprise
        $enterprise = new Enterprise;
        $enterprise->name_enterprise = Input::get('nombre');
        $enterprise->rfc = Input::get('rfc');
        $enterprise->save();

        //Save new Branch
        $branch = new Branch;
        $branch->enterprise_id = $enterprise->id;
        $branch->name_branch = "Matriz";
        $branch->address = Input::get('direccion');
        $branch->postalcode = Input::get('codigoPostal');
        $branch->state_id = Input::get('estado');
        $branch->county_id = Input::get('municipio');
        $branch->phone = Input::get('telefono');
        $branch->save();

        return Redirect::to('empresas/agregado');    
    }


    public function delete($id){
        Enterprise::findOrFail($id)->destroy($id);
        return Redirect::to('empresas/eliminado');    
    }




}

