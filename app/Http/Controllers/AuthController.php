<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\RegisterRequestApi;
use App\Http\Resources\UserResourse;
use App\Models\User;
use App\Models\Users;
use App\Traits\Responser;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Throwable;
use function Webmozart\Assert\Tests\StaticAnalysis\email;

class AuthController extends Controller
{

    use Responser;
    public function login()
    {
        $credentials = request(['email', 'password']);
        $token = \auth()->guard('api')->attempt($credentials);
        if (!$token) {
            return $this->responseFailed("UnAuthorized" , null);
        }
        $user = auth()->guard('api')->user();

        return $this->responseSuccess("Logged In Successfully" , [
            'user' => new UserResourse($user),
            'token' => $token,
        ]);
    }

      //*********************************************Register**************************************************??//

    public function register(RegisterRequest $request)
    {
        try {

            $user = User::create([
                'first_name' => $request['first_name'],
                'last_name' => $request['last_name'],
                'username' => $request['username'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'phone_number' => $request['phone_number'],
                'role'=>$request['role'],
                'premium'=>$request['premium'],
            ]);
//            $credentials = $request->only('email', 'password');
//            Auth::guard('api')->attempt($credentials);
            $credentials = request(['email', 'password']);
            $token = \auth()->guard('api')->attempt($credentials);
            return $this->responseSuccess('User Registerd', [$user,'token'=>$token]);
        }
        catch
            (\Exception $e){
             //   return $this->responseFailed("Failed", $e);

    return $e;
            }



        }

            //*******************************************LOG OUT********************************************//
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

//        public function register(RegisterRequestApi $request){
//            try {
//                User::create([
//                    'first_name' => $request['first_name'],
//                    'last_name'=>$request['last_name'],
//                    'username'=>$request['username'],
//                    'email'=>$request['email'],
//                    'password'=>Hash::make($request['password']),
//                    'phone_number'=>$request['phone_number']
//                ]);
//
//                $credentials = $request->only('email', 'password');
//                Auth::guard('api')->attempt($credentials);
//                return response()->json([
//                    'status' => 'success',
//                    'token' => true,
//                   'statu'=> '200'
//                ]);
//            }catch (\Exception $e){
//                return response()->json([
//                    'status' => 'error',
//                    'token' => false,
//                ], 401);
//            }
//        }

    }
