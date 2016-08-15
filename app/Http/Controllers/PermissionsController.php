<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\PermissionFormRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

use App\Models\Permission;
use Input;


class PermissionsController extends Controller
{
    public function index($operationCode = null){
    	$data["titleSection"] = "Lista de Permisos";
    	$data["section"] = "permisos";
    	$data["showButtonAdd"] = 1;
    	$data["pagination"] = Permission::paginate(15);

        if(isset($operationCode)){
            if($operationCode == "agregado"){
                $data["messageAlertTitle"] = "Permiso agregado con éxito!";
            }
            if($operationCode == "editado"){
                $data["messageAlertTitle"] = "Permiso editado con éxito!";
            }
            if($operationCode == "eliminado"){
                $data["messageAlertTitle"] = "Permiso eliminado con éxito!";
            }
        }
        return view("pages/lists/listPermissions", $data);
    }

    public function showAddForm(){    
    	$data["titleSection"] = "Agregar un Permiso";
   		$data["section"] = "permisos";
        $data["buttonSaveFormText"] = "Agregar";        
    	return view("pages/forms/formPermission", $data);
    }

    public function store(PermissionFormRequest $request){
        //Save new Permission
        $permission = new Permission;
        $permission->name = Input::get('permiso');
        $permission->display_name = Input::get('nombre');
        $permission->description = Input::get('descripcion');
        $permission->save();
        return Redirect::to('permisos/agregado');
    }

    public function showEditForm($id){
        $data["titleSection"] = "Editar Permiso";
        $data["section"] = "permisos";
        $data["buttonSaveFormText"] = "Guardar";
        $data["permission"] = Permission::findOrFail($id);
        
        return view("pages/edits/editPermission", $data);
    }

    public function update(PermissionFormRequest $request, $id){
        //Update Permission
        $permission = Permission::findOrFail($id);
        $permission->name = Input::get('permiso');
        $permission->display_name = Input::get('nombre');
        $permission->description = Input::get('descripcion');
        $permission->save();        
        return Redirect::to('permisos/editado');    
    }

    public function delete($id){
        Permission::findOrFail($id)->delete($id);
        return Redirect::to('permisos/eliminado');    
    }
}
