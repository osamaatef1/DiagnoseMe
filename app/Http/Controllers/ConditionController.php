<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Condition;
use App\Models\Service;
use App\Traits\Responser;
use Illuminate\Http\Request;

class ConditionController extends Controller
{
    use Responser;
    public function __construct(){
        $this->middleware('admin')->only('store');
    }


    public function index(){
        $conditions = Condition::query()->paginate(10);
        return response($conditions);
    }
    public function oneCondition($id){
        $condition = Condition::find($id);
        return response($condition);
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
    public function delete($id){
        try {
            Service::find($id)->delete();

            return \response()->json(['Message'=>'deleted' , 'status'=>'200']);
        }catch (\Exception $e){
            return $this->responseFailed('Failed' , $e);
        }
    }
}
