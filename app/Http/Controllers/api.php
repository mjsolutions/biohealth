<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\State;
use App\Models\County;
use Input;


class api extends Controller
{
    public function getCountiesByStateId($stateId)
    {
        return County::select("id", "nombre")->where("estado_id", "=", $stateId)->get();
    }
}
