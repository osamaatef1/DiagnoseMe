<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ConditionSymptoms;
use App\Traits\Responser;
use Illuminate\Http\Request;

class ConditionsToSymptoms extends Controller
{
    use Responser;
    public function AssignSymptomsToConditions(Request $request){
        $exists = ConditionSymptoms::where([
            'condition_id' => $request['condition_id'],
            'symptom_id' => $request['symptom_id'],
        ])->exists();
        if ($exists){
            return $this->responseFailed("Already Exists !" , []);
        }
        $assign = ConditionSymptoms::create([
            'condition_id'=>$request['condition_id'],
            'symptom_id'=>$request['symptom_id']
        ]);
        return $this->responseSuccess("Assigned" , []);
    }
}
