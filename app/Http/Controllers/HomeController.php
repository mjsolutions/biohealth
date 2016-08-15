<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Models\Employee;
use Auth;
use App;
use Input;

class HomeController extends Controller
{
    public function index($operationCode = null){
    	$data["titleSection"] = "Bienvenido";
    	$data["section"] = "inicio";
    	$data["showButtonChangePassword"] = 1;
    	if(isset($operationCode)){
            if($operationCode == "exito"){
                $data["messageAlertTitle"] = "Clave cambiada con éxito!";
            }
        }
    	return view("pages/home", $data);
    }

    public function showChangePassword($id){
    	if(Auth::user()->id == $id){
    		$data["titleSection"] = "Cambiar Clave";
	    	$data["section"] = "inicio";
	    	$data["buttonSaveFormText"] = "Guardar";
	    	return view("pages/changePassword", $data);
    	}
    	else{
    		App::abort(404);
    	}
    }

    public function changePassword(ChangePasswordRequest $request, $id){
    	if(Auth::user()->id == $id){
    		$employee = Employee::findOrFail($id);
    		if(password_verify(Input::get('clave'), $employee->password)){
    			$employee->password = bcrypt(Input::get('nuevaClave'));
    			$employee->save();
    			return Redirect::to('inicio/exito');
            }
            else{
                return Redirect::to('inicio/cambiar-clave/'.Auth::user()->id)->withErrors(array("error" => "La clave actual es incorrecta"));
            }
    	}
    	else{
    		App::abort(404);
    	}
    }
}
