<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BranchesController extends Controller
{
    public function index(){
    	$data["titleSection"] = "Lista de Sucursales";
    	$data["section"] = "sucursales";
    	$data["showButtonAdd"] = 1;
    	return view("pages/listBranches", $data);
    }

    public function showAddForm(){    
    	$data["titleSection"] = "Agregar una Sucursal";
   		$data["section"] = "sucursales";	
    	return view("pages/formBranch", $data);
    }
}
