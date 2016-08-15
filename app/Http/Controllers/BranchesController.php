<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\BranchFormRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

use App\Models\Enterprise;
use App\Models\Branch;
use App\Models\State;
use App\Models\County;
use Input;

class BranchesController extends Controller
{
    public function index($operationCode = null){
    	$data["titleSection"] = "Lista de Sucursales";
    	$data["section"] = "sucursales";
    	$data["showButtonAdd"] = 1;
    	$data["pagination"] = Branch::paginate(15);

        if(isset($operationCode)){
            if($operationCode == "agregado"){
                $data["messageAlertTitle"] = "Sucursal agregada con éxito!";
            }
            if($operationCode == "editado"){
                $data["messageAlertTitle"] = "Sucursal editada con éxito!";
            }
            if($operationCode == "eliminado"){
                $data["messageAlertTitle"] = "Sucursal eliminada con éxito!";
            }
        }
        return view("pages/lists/listBranches", $data);
    }

    public function showAddForm(){    
    	$data["titleSection"] = "Agregar una Sucursal";
   		$data["section"] = "sucursales";
        $data["buttonSaveFormText"] = "Agregar";
        $data["enterprises"] = Enterprise::all();
        $data["states"] = State::all();
    	return view("pages/forms/formBranch", $data);
    }

    public function store(BranchFormRequest $request){
        //Save new Branch
        $branch = new Branch;
        $branch->enterprise_id = Input::get('empresa');
        $branch->name_branch = Input::get('nombre');
        $branch->address = Input::get('direccion');
        $branch->postalcode = Input::get('codigoPostal');
        $branch->state_id = Input::get('estado');
        $branch->county_id = Input::get('municipio');
        $branch->phone = Input::get('telefono');
        $branch->save();

        return Redirect::to('sucursales/agregado');
    }

    public function showEditForm($id){
        $data["titleSection"] = "Editar Sucursal";
        $data["section"] = "sucursales";
        $data["buttonSaveFormText"] = "Guardar";
        $data["branch"] = Branch::findOrFail($id);
        $data["enterprises"] = Enterprise::all();
        $data["states"] = State::all();        
        $data["counties"] = County::where('estado_id', '=', $data["branch"]->state_id)->get();
        return view("pages/edits/editBranch", $data);
    }

    public function update(BranchFormRequest $request, $id){
        //Update Branch
        $branch = Branch::findOrFail($id);
        $branch->enterprise_id = Input::get('empresa');
        $branch->name_branch = Input::get('nombre');
        $branch->address = Input::get('direccion');
        $branch->postalcode = Input::get('codigoPostal');
        $branch->state_id = Input::get('estado');
        $branch->county_id = Input::get('municipio');
        $branch->phone = Input::get('telefono');
        $branch->save();
        return Redirect::to('sucursales/editado');    
    }

    public function delete($id){
        Branch::findOrFail($id)->destroy($id);
        return Redirect::to('sucursales/eliminado');    
    }
}
