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

Route::post('/templateselection',[SendingController::class, 'handleTemplateSelection'])->name('handle.template.selection');
Route::get('/templateselection',[SendingController::class, 'templateselection'])->name('handle.template.selection');

Route::post('/handle-target-selection', [SendingController::class, 'handleTargetSelection'])->name('handle.target.selection');
Route::get('/targetselection',[SendingController::class, 'targetselection']);

Route::get('/contentselection', [SendingController::class, 'showContentSelectionPage'])->name('contentselection');
Route::get('/summary-page/{targetName}', [SendingController::class, 'showSummaryPage'])->name('summary-page');
Route::get('/timeselection',[SendingController::class, 'timeselection']);


Route::get('/select-date', [SelectedDateController::class, 'showForm'])->name('show.date.form');
Route::post('/save-date', [SelectedDateController::class, 'saveDateAndTime'])->name('save.date');

Route::post('/listselection', [ListSelectionController::class, 'handleListSelection'])->name('handle.list.selection');
Route::post('/handle-test-selection', [ListSelectionController::class, 'handleTestSelection'])->name('handle.test.selection');


//practice controllers
Route::get('/testingpage', [CustomAuthController::class, 'testingpage']);
Route::get('/get-target-name', [SendingController::class, 'targetName'])->name('get-target-name');
Route::get('/another-page', [SendingController::class, 'anotherPage'])->name('another-page');
Route::get('/getsession-page', [ListSelectionController::class, 'getSessionData'])->name('getsession-page');


Route::post('/submit-form', [SendingController::class, 'submitForm'])->name('submit.form');




Route::get('/modal-page', [SendingController::class, 'modalPage'])->name('modal-page');
Route::post('/handle-modal-selection', [ListSelectionController::class, 'handleModalSelection'])->name('handle.modal.selection');


// Route::get('/summary-page', [SendingController::class, 'showSummaryPage'])->name('summary-page');

