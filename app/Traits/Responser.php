<?php

namespace App\Traits;

trait Responser
{

    public function responseSuccess($message , $data){
        return response()->json([
           'status' => 200,
           'message' => $message,
           'data' => $data
        ] , 200);
    }

    public function responseFailed($message , $data){
        return response()->json([
            'status' => 403,
            'message' => $message,
            'data' => $data
        ] , 403);
    }
}
