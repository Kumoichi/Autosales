<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ListSelectionController;
use App\Http\Controllers\SendingController;
use App\Http\Controllers\SelectedDateController;


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



Route::get('/designs', function () {
    return view('design');
});


Route::get('/login', [CustomAuthController::class, 'login'])->middleware('alreadyLoggedIn');

Route::post('/login-user', [CustomAuthController::class,'loginUser'])->name('login-user');
Route::get('/dashboard', [CustomAuthController::class, 'dashboard'])->middleware('isLoggedIn');
Route::get('/logout',[CustomAuthController::class, 'logout']);
Route::get('/listselection',[ListSelectionController::class, 'listselection']);


// SendingController
Route::get('/targetselection',[SendingController::class, 'targetselection']);

// Route to handle form submission from the target selection page
Route::post('/handle-target-selection', [SendingController::class, 'handleTargetSelection'])->name('handle.target.selection');

// Route to show the content selection page
Route::get('/contentselection', [SendingController::class, 'showContentSelectionPage'])->name('contentselection');

// Route to handle form submission from the content selection page
Route::post('/handle-content-selection', [SendingController::class, 'handleContentSelection'])->name('handle.content.selection');

// Route to show the summary page
Route::get('/summary-page/{targetName}', [SendingController::class, 'showSummaryPage'])->name('summary-page');


Route::get('/templateselection',[SendingController::class, 'templateselection']);

Route::get('/timeselection',[SendingController::class, 'timeselection']);
Route::get('/get-target-name', [SendingController::class, 'targetName'])->name('get-target-name');
Route::get('/another-page', [SendingController::class, 'anotherPage'])->name('another-page');
// Route::get('/summary-page', [SendingController::class, 'showSummaryPage'])->name('summary-page');








Route::get('/select-date', [SelectedDateController::class, 'showForm'])->name('show.date.form');
Route::post('/save-date', [SelectedDateController::class, 'saveDateAndTime'])->name('save.date');


Route::get('/testingpage', [CustomAuthController::class, 'testingpage']);
