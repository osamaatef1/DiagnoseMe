<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Symptom;
use App\Traits\Responser;
use Illuminate\Http\Request;

class SymptomController extends Controller
{
    use Responser;
    public function __construct(){
        $this->middleware('admin')->only('store');
    }

    public function index(){
        $symptoms = Symptom::all();
        return $this->responseSuccess("Symptoms Returned !" , $symptoms);
    }


    public function store(Request $request){
        try {
            $sym = Symptom::create([
               'name' => $request['name']
            ]);
            return $this->responseSuccess('Symptom Added' , $sym);
        }catch (\Exception $e){
            return $this->responseFailed('Something Went Wrong !',null);
        }
    }
}
