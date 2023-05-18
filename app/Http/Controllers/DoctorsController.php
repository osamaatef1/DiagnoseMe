<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Models\Doctor;
use App\Traits\Responser;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class DoctorsController extends Controller
{
    use Responser;
    public function index()
    {
        $doctors =  Doctor::all();
        return response($doctors);
    }

    public function create()
    {
        return view('admin.doctors.create');
    }

    public function store(AddDoctorRequest $request)
    {
        try {
            $doctor = Doctor::create([
                'name' => $request['name'],
                'address' => $request['address'],
                'info' => $request['info'],
                'PhoneNumber' => $request['PhoneNumber'],

            ]);
          //  return to_route('doctors.index')->with('message', "Doctor Added!");
            return response()->json($doctor);

        } catch (\Exception $e) {
            return back()->with('error', "Something Went Wrong");
           // return $e;
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
            // return to_route('doctors.index')->with('message' , "Doctor Deleted !");
            return \response()->json(['Message'=>'deleted' , 'status'=>'200']);
        }catch (\Exception $e){
          //  return back()->with('error' , "Something Went Wrong");
    return $this->responseFailed('Failed' , $e);
        }
    }
}
