<?php

namespace App\Traits;

use http\Env\Request;

trait ImageUploader
{

    public function uploadImage($request , $placeMove , $model , $attribute , $key = "image"){
        $image = $request->file($key);
        $img = time()  . rand(1000 , 20000) . "." . $image->getClientOriginalExtension();
        $image->move(storage_path("app/public/" . $placeMove) , $img);
        $model->update([$attribute => $placeMove . $img]);
    }
       public function uploadimg(\Illuminate\Support\Facades\Request $request){
        $image = $request->file('image')->getClientOriginalExtension();
        $path = $request->file("image")->storeAs('users',$image,'');

    }

}
