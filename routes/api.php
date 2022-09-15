<?php
use App\Http\Controllers\Api\auth\LoginController;
use App\Http\Controllers\Api\auth\RegisterController;
use App\Http\Controllers\Api\Task;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
// Part One
Route::get('count', [TaskController::class,'CountTwoNum']);
Route::get('input', [TaskController::class,'alphabetic']);


// Part Two
Route::post('/register', [RegisterController::class , 'register'])->name('register');
Route::post('/login', [LoginController::class , 'login'])->name('login');
Route::group(['middleware'=>'auth:sanctum'],function(){
    Route::get('/users', [UserController::class , 'index']);
    Route::get('user/details/{id}', [UserController::class , 'show']);
    Route::post('user/update/{id}', [UserController::class , 'update']);
    Route::post('user/delete/{id}', [UserController::class , 'destroy']);
});
