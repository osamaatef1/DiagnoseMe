<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConditionController;
use App\Http\Controllers\ConditionsToSymptoms;
use App\Http\Controllers\DiseasePredictController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SymptomController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' =>'admin' ], function(){
    Route::post('store',[App\Http\Controllers\Admin\AdminsController::class,'store']);
    Route::post('',[App\Http\Controllers\Admin\AdminsController::class,'index']);
    Route::post('/delete/{id}',[App\Http\Controllers\Admin\AdminsController::class,'delete']);

});
Route::group(['prefix' =>'user'], function() {
    Route::post('register',[AuthController::class,'register']);
    Route::post('login',[AuthController::class,'login']);
    Route::post('logout',[AuthController::class,'logout']);
});

Route::controller(DoctorsController::class)->prefix('doctor')->group(function (){
    Route::post('store', 'store')->middleware(['auth:api','admin']);
    Route::get('/', 'index');
    Route::get('/{id}', 'oneitem');
    Route::delete('/{id}', 'delete')->middleware('auth:api' , 'admin');
    Route::post('AvailableDays','AvailableDays')->middleware('auth:doctors');

});
Route::get('AvailableDays/{id}' , [DoctorsController::class , 'getAvailableDays']);
Route::get('mySchedules' , [DoctorsController::class , 'schedules'])->middleware('auth:doctors');
Route::controller(AuthController::class)->prefix('doctor')->group(function () {
    Route::post('login' , 'loginDoctor');
    Route::post('register','registerDoctor');
});

Route::controller(SymptomController::class)->prefix('symptoms')->group(function (){
    Route::get('/' , 'index');
    Route::post('/' , 'store')->middleware(['auth:api']);
});

Route::controller(ConditionController::class)->prefix('condition')->group(function (){
    Route::get('/','index');
    Route::get('/{id}','oneCondition');
    Route::post('/','store')->middleware(['auth:api','admin']);
});
Route::controller(ConditionsToSymptoms::class)->middleware('auth:api')->prefix('conditionsToSymptoms')->group(function (){
    Route::post('/','AssignSymptomsToConditions');
});

Route::controller(NewsController::class)->prefix('news')->group(function (){
   Route::get('/' , 'index');
   Route::get('/{id}' , 'selectOne');
   Route::post('/' , 'AddNews')->middleware('auth:api','admin');
    Route::delete('/{id}', 'delete')->middleware('auth:api' , 'admin');

});

Route::controller(ServicesController::class)->prefix('services')->group(function (){
    Route::get('/' , 'index');
    Route::post('/','store')->middleware('auth:api','admin');
    Route::delete('/{id}', 'delete')->middleware('auth:api' , 'admin');

});
Route::controller(ScheduleController::class)->prefix('schedule')->group(function (){
    Route::get('/' , 'index');
    Route::post('/','store')->middleware('auth:api', 'premium');

});

Route::controller(DiseasePredictController::class)->prefix('disease')->group(function (){
   Route::post('predict' , 'predict');
});
Route::controller(\App\Http\Controllers\PremiumController::class)->prefix('Premium')->group(function (){
   Route::post('/user/{id}' , 'makeUserPremium');
   Route::post('/change' , 'makePremium');
});
