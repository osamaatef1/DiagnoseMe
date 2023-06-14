<?php

namespace App\Http\Controllers;

use App\Traits\Responser;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    use Responser;
    public function index(){
        $schedule = \App\Models\schedule::query()->paginate(10);
        return $schedule;
    }
    public function store(Request $request){
        try {
            $schedule = \App\Models\schedule::create([
                'date'=>$request['date'],
                'time'=>$request['time'],
            ]);
            return $this->responseSuccess('Schedule Added' , $schedule);

        }catch (\Exception $e){

          //  return $this->responseFailed('Error' , $e);
            return $e;
        }

    }
}
