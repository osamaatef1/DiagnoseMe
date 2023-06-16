<?php

namespace App\Http\Controllers;

use App\Models\Condition;
use App\Models\ConditionSymptoms;
use App\Models\Symptom;
use App\Traits\Responser;
use Illuminate\Http\Request;

class DiseasePredictController extends Controller
{
    use Responser;
    public function predict(Request $request){
        $scores = [];
        $conditions = Condition::all();
        foreach ($conditions as $condition){
            $scores[$condition['id']] = [
              'condition' => $condition['overview'],
              'score' => 0
            ];
        }
        $symptoms = $request['symptoms'];
        foreach ($symptoms as $symptom){
            $symptomDiseases = ConditionSymptoms::where('symptom_id' , $symptom)->get();
            foreach ($symptomDiseases as $symptomDisease){
                $condition = Condition::find($symptomDisease['condition_id']);
                $symptomsCount = $condition->symptomsCount();
                $finalIncreasing = (1 / $symptomsCount) * 100;
                $scores[$symptomDisease['condition_id']]['score'] += $finalIncreasing;
            }
        }
        return $this->responseSuccess( 'Successfully Returned' , array_values($scores));
    }
}
