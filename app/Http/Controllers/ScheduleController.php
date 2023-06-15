<?php

namespace App\Http\Controllers;

use App\Traits\Responser;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    use Responser;
    public function index(){

    }
    public function store(Request $request)
    {

        try {

            $check = \App\Models\schedule::query()->where([
                'doctor_id' => $request['doctor_id'],
                'date' => $request['date'],
                'time' => $request['time'],
            ])->exists();
            if ($check){
                return $this->responseFailed(422 , "Time Is Reserved");
            }

            $schedule = \App\Models\schedule::create([
                'user_id'=>auth('api')->user()->id,
                'doctor_id'=>$request['doctor_id'],
                'date' => $request['date'],
                'time' => $request['time'],
            ]);
            return $this->responseSuccess('Schedule Added', $schedule);

        } catch (\Exception $e) {
            // return $e->getMessage();
              return $this->responseFailed('Error' , $e);

            //return $e;
        }



    }


}
