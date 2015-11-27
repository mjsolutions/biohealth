<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\EmployeeFormRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

use App\Models\Employee;
use App\Models\Enterprise;
use App\Models\Branch;
use App\Models\Department;
use App\Models\Schedule;
use App\Models\State;
use App\Models\County;
use Input;

class EmployeesController extends Controller
{
    public function index($operationCode = null){
    	$data["titleSection"] = "Lista de Empleados";
    	$data["section"] = "empleados";
    	$data["showButtonAdd"] = 1;
        $data["employees"] = Employee::all();

        if(isset($operationCode)){
            if($operationCode == "agregado"){
                $data["messageAlertTitle"] = "Empleado agregado con éxito!";
            }
            if($operationCode == "editado"){
                $data["messageAlertTitle"] = "Empleado editado con éxito!";
            }
            if($operationCode == "eliminado"){
                $data["messageAlertTitle"] = "Empleado eliminado con éxito!";
            }
        }
    	return view("pages/listEmployees", $data);
    }

    public function showAddForm(){    
    	$data["titleSection"] = "Agregar un Empleado";
   		$data["section"] = "empleados";	

        $data["enterprises"] = Enterprise::all();
        $data["schedules"] = Schedule::all();
        $data["states"] = State::all();

    	return view("pages/formEmployee", $data);
    }

    public function store(EmployeeFormRequest $request){
        $employee = new Employee;
        $employee->name_employee = Input::get('nombre');
        $employee->user = Input::get('usuario');
        $employee->password = Input::get('clave');

        $employee->enterprise_id = Input::get('empresa');
        $employee->branch_id = Input::get('sucursal');
        $employee->department_id = Input::get('departamento');
        $employee->schedule_id = Input::get('horario');
        $employee->state_id = Input::get('estado');
        $employee->county_id = Input::get('municipio');

        $employee->address = Input::get('domicilio');
        $employee->postalcode = Input::get('codigoPostal');
        $employee->phone = Input::get('telefono');
        $employee->cellphone = Input::get('celular');
        $employee->email = Input::get('correo');

        $employee->save();
        return Redirect::to('empleados/agregado');        
    }

    public function delete($id){
        Employee::findOrFail($id)->destroy($id);
        return Redirect::to('empleados/eliminado');    
    }
}


