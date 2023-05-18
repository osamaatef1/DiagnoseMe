<?php

use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
require __DIR__.'/auth.php';


Route::middleware('auth')->group(function () {
    Route::view('/' , 'admin.index')->name('home');
    Route::view('/dashboard' , 'admin.index')->name('home');

    Route::controller(AdminsController::class)->prefix('admins')->group(function (){
        Route::get('/' , 'index')->name('admins.index');
        Route::get('/create' , 'create')->name('admins.create');
        Route::post('/' , 'store')->name('admins.store');
        Route::get('/{id}' , 'edit')->name('admins.edit');
        Route::post('/{id}' , 'update')->name('admins.update');
        Route::delete('/{id}' , 'delete')->name('admins.delete');
    });
    Route::controller(DoctorsController::class)->prefix('doctors')->group(function (){
        Route::get('/' , 'index')->name('doctors.index');
        Route::get('/create' , 'create')->name('doctors.create');
        Route::post('/' , 'store')->name('doctors.store');
        Route::get('/{id}' , 'edit')->name('doctors.edit');
        Route::post('/{id}' , 'update')->name('doctors.update');
        Route::delete('/{id}' , 'delete')->name('doctors.delete');
    });







});


