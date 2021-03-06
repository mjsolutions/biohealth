<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\DepartmentFormRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

use App\Models\Enterprise;
use App\Models\Branch;
use App\Models\Department;
use Input;

class DepartmentsController extends Controller
{
    public function index($operationCode = null){
    	$data["titleSection"] = "Lista de Departamentos";
    	$data["section"] = "departamentos";
    	$data["showButtonAdd"] = 1;
        $data["pagination"] = Department::paginate(15);

        if(isset($operationCode)){
            if($operationCode == "agregado"){
                $data["messageAlertTitle"] = "Departamento agregado con éxito!";
            }
            if($operationCode == "editado"){
                $data["messageAlertTitle"] = "Departamento editado con éxito!";
            }
            if($operationCode == "eliminado"){
                $data["messageAlertTitle"] = "Departamento eliminado con éxito!";
            }
        }        
    	return view("pages/lists/listDepartments", $data);
    }

    public function showAddForm(){    
    	$data["titleSection"] = "Agregar un Departamento";
   		$data["section"] = "departamentos";
        $data["buttonSaveFormText"] = "Guardar";
        $data["enterprises"] = Enterprise::all();
    	return view("pages/forms/formDepartment", $data);
    }

    public function store(DepartmentFormRequest $request){
        //Save new Department
        $department = new Department;
        $department->enterprise_id = Input::get('empresa');
        $department->branch_id = Input::get('sucursal');
        $department->name_department = Input::get('nombre');
        $department->save();
        return Redirect::to('departamentos/agregado');
    }

    public function showEditForm($id){
        $data["titleSection"] = "Editar Departamento";
        $data["section"] = "departamentos";
        $data["buttonSaveFormText"] = "Guardar";
        $data["department"] = Department::findOrFail($id);
        $data["enterprises"] = Enterprise::all();
        $data["branches"] = Branch::where('enterprise_id', '=', $data["department"]->enterprise_id)->get();        
        return view("pages/edits/editDepartment", $data);
    }

    public function update(DepartmentFormRequest $request, $id){
        //Update Department
        $department = Department::findOrFail($id);
        $department->enterprise_id = Input::get('empresa');
        $department->branch_id = Input::get('sucursal');
        $department->name_department = Input::get('nombre');
        $department->save();
        return Redirect::to('departamentos/editado');    
    }

    public function delete($id){
        Department::findOrFail($id)->destroy($id);
        return Redirect::to('departamentos/eliminado');    
    }

}
