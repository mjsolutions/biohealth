<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\State;
use App\Models\County;
use App\Models\Branch;
use App\Models\Department;
use Jenssegers\Date\Date;
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

    public function getDepartmentsByBranchId($branchId)
    {
        return Department::select("id", "name_department")->where("branch_id", "=", $branchId)->get();
    }

    public function getServerTime()
    {
        $currentDateTime = Date::now();        
        return response()->json([
            'time' => $currentDateTime->format("H:i")." Hrs.", 
            'date' => $currentDateTime->format("l j")." de ".$currentDateTime->format("F")." de ".$currentDateTime->format("Y")
            ]);
    }
}
