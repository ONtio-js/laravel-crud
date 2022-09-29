<?php

use App\Http\Controllers\carController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('/', function () {
//     return view("/cars.index");
// });
Route::resource('cars',carController::class);

// Route::get('/',[carController::class,'index']);
// Route::get('/{id}/edit',[carController::class,'edit']);
// Route::get('/create',[carController::class,'create']);
// Route::post('/',[carController::class,'store']);
// Route::put('/{id}',[carController::class,'update']);
// Route::delete('/{id}',[carController::class,'destroy']);
// Route::get('/{id}',[carController::class,'show']);

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

