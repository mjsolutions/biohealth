<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\RoleFormRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

use App\Models\Role;
use App\Models\Permission;
use App\Models\RoleRelatedPermissions;
use Input;

class RolesController extends Controller
{
    public function index($operationCode = null){
    	$data["titleSection"] = "Lista de Roles";
    	$data["section"] = "roles";
    	$data["showButtonAdd"] = 1;
    	$data["pagination"] = Role::paginate(15);

        if(isset($operationCode)){
            if($operationCode == "agregado"){
                $data["messageAlertTitle"] = "Rol agregado con éxito!";
            }
            if($operationCode == "editado"){
                $data["messageAlertTitle"] = "Rol editado con éxito!";
            }
            if($operationCode == "eliminado"){
                $data["messageAlertTitle"] = "Rol eliminado con éxito!";
            }
            if($operationCode == "agregados"){
                $data["messageAlertTitle"] = "Permisos relacionados con éxito!";
            }
        }
        return view("pages/lists/listRoles", $data);
    }

    public function showAddForm(){    
    	$data["titleSection"] = "Agregar un Rol";
   		$data["section"] = "roles";
        $data["buttonSaveFormText"] = "Agregar";
        $data["permissions"] = Permission::all();
    	return view("pages/forms/formRole", $data);
    }

    public function store(RoleFormRequest $request){
        //Save new Role
        $role = new Role;
        $role->name = Input::get('rol');
        $role->display_name = Input::get('nombre');
        $role->description = Input::get('descripcion');
        $role->save();

        //Relate permissions to role
        if(Input::get('permisos')){
            $role->attachPermissions(Input::get('permisos'));
        }
        return Redirect::to('roles/agregado');
    }

    public function showEditForm($id){
        $data["titleSection"] = "Editar Rol";
        $data["section"] = "roles";
        $data["buttonSaveFormText"] = "Guardar";
        $data["role"] = Role::findOrFail($id);
        $data["permissions"] = Permission::all();
        $data["permissionsSelected"] = RoleRelatedPermissions::where("role_id", "=", $id)->get();
        return view("pages/edits/editRole", $data);
    }

    public function update(RoleFormRequest $request, $id){
        //Update Role
        $role = Role::findOrFail($id);
        $role->name = Input::get('rol');
        $role->display_name = Input::get('nombre');
        $role->description = Input::get('descripcion');
        $role->save();

        //Delete Related permissions to role        
        RoleRelatedPermissions::where("role_id", "=", $id)->delete();        

        //Relate permissions to role
        if(Input::get('permisos')){
            $role->attachPermissions(Input::get('permisos'));
        }
        return Redirect::to('roles/editado');    
    }

    public function showRelatePermissionsForm($id){
        $data["titleSection"] = "Relacionar Permisos";
        $data["section"] = "roles";
        $data["buttonSaveFormText"] = "Guardar";
        $data["role"] = Role::findOrFail($id);
        $data["permissions"] = Permission::all();
        $data["permissionsSelected"] = RoleRelatedPermissions::where("role_id", "=", $id)->get();
        return view("pages/forms/formRolePermissions", $data);
    }

    public function relatePermissions($id){
        //Delete Related permissions to role        
        RoleRelatedPermissions::where("role_id", "=", $id)->delete();        

        //Relate permissions to role
        $role = Role::findOrFail($id);
        if(Input::get('permisos')){
            $role->attachPermissions(Input::get('permisos'));
        }            
        return Redirect::to('roles/agregados');
    }    

    public function delete($id){
        Role::findOrFail($id)->delete($id);
        return Redirect::to('roles/eliminado');    
    }
}
