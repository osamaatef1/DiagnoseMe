<?php

namespace App\Traits;

trait ImageUploader
{

    public function uploadImage($request , $placeMove , $model , $attribute , $key = "image"){
        $image = $request->file($key);
        $img = time()  . rand(1000 , 20000) . "." . $image->getClientOriginalExtension();
        $image->move(storage_path("app/public/" . $placeMove) , $img);
        $model->update([$attribute => $placeMove . $img]);
    }

}
