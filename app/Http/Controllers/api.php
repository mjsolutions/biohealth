<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\State;
use App\Models\County;
use App\Models\Branch;
use Input;


class api extends Controller
{
    public function getCountiesByStateId($stateId)
    {
        return County::select("id", "nombre")->where("estado_id", "=", $stateId)->get();
    }

    public function getBranchesByEnterpriseId($enterpriseId)
    {
        return Branch::select("id", "name_branch")->where("enterprise_id", "=", $enterpriseId)->get();
    }
}
