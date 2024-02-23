<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ListSelectionController;
use App\Http\Controllers\SendingController;


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



Route::get('/', function () {
    return view('design');
});


Route::get('/login', [CustomAuthController::class, 'login'])->middleware('alreadyLoggedIn');

Route::post('/login-user', [CustomAuthController::class,'loginUser'])->name('login-user');
Route::get('/dashboard', [CustomAuthController::class, 'dashboard'])->middleware('isLoggedIn');
Route::get('/logout',[CustomAuthController::class, 'logout']);
Route::get('/listselection',[ListSelectionController::class, 'listselection']);
Route::get('/targetselection',[SendingController::class, 'targetselection']);
Route::get('/contentselection',[SendingController::class, 'contentselection']);


Route::get('/testingpage', [CustomAuthController::class, 'testingpage']);
