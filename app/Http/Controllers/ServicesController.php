<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddServiceRequest;
use App\Models\Service;
use App\Traits\ImageUploader;
use App\Traits\Responser;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    use ImageUploader;
    use Responser;
    public function index(){
        $servicrs = Service::query()->paginate(10);
        return response()->json($servicrs);
    }
    public function store(AddServiceRequest $request){
        try {


            $services = Service::create([
                'name' => $request['name'],
                'description' => $request['description'],
            ]);
            if ($request->has('image')) {
                $this->uploadImage($request, 'services', $services, 'image');
            }
            return $this->responseSuccess('Services Added!' , $services );
        }
        catch (\Exception $e){
            return $this->responseFailed('Something Went Wrong' , $e);

        }
    }

    public function delete($id)
    {
        try {
            Service::find($id)->delete();
            //
            return \response()->json(['Message' => 'deleted', 'status' => '200']);
        } catch (\Exception $e) {
            //  return back()->with('error' , "Something Went Wrong");
            return $this->responseFailed('Failed', $e);
        }
    }

}
