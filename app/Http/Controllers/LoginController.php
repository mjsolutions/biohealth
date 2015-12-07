<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\LoginFormRequest;

use Input;
use Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view("pages/login");
    }

 	public function login(LoginFormRequest $request){
        if (Auth::attempt(['user' => Input::get('usuario'), 'password' => Input::get('clave')])){
            return redirect()->intended('inicio');
        }
        else{
        	return Redirect::to('login')->with([
                'error' => 1,
            ]);
        }
    }

    public function logout(){
    	Auth::logout();
    	return Redirect::to('login');
    }

}