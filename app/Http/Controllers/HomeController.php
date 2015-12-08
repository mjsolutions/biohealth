<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
    	$data["titleSection"] = "Bienvenido";
    	$data["section"] = "home";
    	$data["showButtonMyInfo"] = 1;
    	return view("pages/home", $data);
    }
}
