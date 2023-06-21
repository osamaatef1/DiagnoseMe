<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\Responser;
use Illuminate\Http\Request;

class PremiumController extends Controller
{
    use Responser;
    public function __construct(){
    $this->middleware('admin');
}
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

}
