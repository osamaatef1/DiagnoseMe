<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Condition;
use App\Traits\Responser;
use Illuminate\Http\Request;

class ConditionController extends Controller
{
    use Responser;
    public function index(){
        $conditions = Condition::all();
        return response($conditions);
    }
    public function store(Request $request){
        $this->middleware('admin');
        try {
            $condition = Condition::create([
                'overview' => $request['overview'],
                'risks' => $request['risks'],
                'symptoms' => $request['symptoms'],
                'diagnosis' => $request['diagnosis'],
                'prognosis' => $request['prognosis'],
                'treatment' => $request['treatment'],

            ]);
            return $this->responseSuccess('Condition Added' , $condition);

        } catch (\Exception $e) {
            return $this->responseFailed("Failed", $e);
        }
    }
}
