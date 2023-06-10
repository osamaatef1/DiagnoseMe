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
        $servicrs = Service::all();
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
}
