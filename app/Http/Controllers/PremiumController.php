<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\Responser;
use Illuminate\Http\Request;

class PremiumController extends Controller
{
    use Responser;
//    public function __construct(){
//    $this->middleware('admin')->only($this->makeUserPremium($id));
//}
    public function makeUserPremium($id)
    {
        try {


        $user = User::find($id);

        if ($user) {
            $user->premium = 1;
            $user->save();

            return $this->responseSuccess('User Is Premium Now' , '') ;
        }
 }catch (\Exception $e){
            return $this->responseFailed("User not found!" , $e->getMessage()) ;

        }
    }

    public function makePremium(){
        try {
            $user = auth('api')->user();
            $user->update(['premium'=>1]);
          return  $this->responseSuccess('You Are Premium Now !' , $user->premium);
        }catch (\Exception $e){
            return $this->responseSuccess('Sorry! Something Went Wrong' , $e->getMessage());
        }

    }


}
