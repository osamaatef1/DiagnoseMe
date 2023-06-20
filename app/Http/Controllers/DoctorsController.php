<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Http\Resources\AvailableDaysResource;
use App\Http\Resources\ScheduleResource;
use App\Models\Doctor;
use App\Traits\ImageUploader;
use App\Traits\Responser;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class DoctorsController extends Controller
{
    use ImageUploader;
    use Responser;
    public function index()
    {
      //  $doctors =  Doctor::all();
        $doctors =  Doctor::query()->paginate(10);
        return response($doctors);
    }
    public function oneitem($id){
       $Doctor = Doctor::find($id);
       return response($Doctor);
    }



    public function store(AddDoctorRequest $request)
    {
        try {
            $doctor = Doctor::create([
                'name' => $request['name'],
                'address' => $request['address'],
                'Specialization' => $request['Specialization'],
                'info' => $request['info'],
                'PhoneNumber' => $request['PhoneNumber'],

            ]);
            if ($request->has('image')){
                $this->uploadImage($request,'doctors',$doctor,'image');
            }

            return response()->json($doctor);

        } catch (\Exception $e) {
            return $this->responseFailed("Something Went Wrong",$e);
        //    return back()->with('error', "Something Went Wrong");

        }
    }

    public function edit($id)
    {
        return view('admin.doctors.edit', [
            'doctor' => Doctor::find($id)
        ]);
    }
    public function update(UpdateDoctorRequest $request , $id){
        try {
            $doctor = Doctor::find($id);
            $doctor->update([
                'name'=>$request['name'],
                'address'=>$request['address'],
                'info'=>$request['info'],
                'PhoneNumber'=>$request['PhoneNumber']
            ]);
                }
        catch (\Exception $exception){
            return back()->with('error' , "Something Went Wrong");
         //   return $exception;
        }

    }
    public function delete($id){
        try {
            Doctor::find($id)->delete();
           //
            return \response()->json(['Message'=>'deleted' , 'status'=>'200']);
        }catch (\Exception $e){
          //  return back()->with('error' , "Something Went Wrong");
    return $this->responseFailed('Failed' , $e);
        }
    }

    public function schedules(){
        $schedules = auth('doctors')->user()->schedules;
        return $this->responseSuccess('Successfully Done' , ScheduleResource::collection($schedules));
    }

    public function AvailableDays(Request $request ){
        try{
        $doctor = auth('doctors')->user();
        $doctor->update([
            'AvailableDays'=>$request['AvailableDays'],

        ]);
        return $this->responseSuccess('Available days Added!' , $doctor->AvailableDays);

        }catch(\Exception $e){
            return $this->responseFailed('Error' , $e->getMessage());

            }
    }

    public function getAvailableDays($id){
        $Doctor = Doctor::find($id);
        return $this->responseSuccess('Returned',[
            'Days' => $Doctor->AvailableDays
        ]);

    }
}
