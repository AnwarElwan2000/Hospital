<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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
// HomeController
Route::get('/',[HomeController::class , 'index']);
Route::get('/home',[HomeController::class , 'redirect'])->middleware(['auth','verified']);
Route::post('/appointment',[HomeController::class , 'appointment']);
Route::get('/my_appointment',[HomeController::class ,'my_appointment']);
Route::get('/cancel_appointment/{id}',[HomeController::class , 'cancel_appointment']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// AdminController
Route::get('/add_doctor_view',[AdminController::class , 'Add_Doctor']);
Route::post('/upload_doctor',[AdminController::class , 'upload_doctor']);
Route::get('/show_appointment',[AdminController::class , 'show_appointment']);
Route::get('/approved/{id}',[AdminController::class , 'approved']);
Route::get('/canceled/{id}',[AdminController::class , 'canceled']);
Route::get('/show_doctors',[AdminController::class , 'show_doctors']);
Route::get('/delete_doctor/{id}',[AdminController::class , 'delete_doctor']);
Route::get('/update_doctor/{id}',[AdminController::class , 'update_doctor']);
Route::post('/edit_doctor/{id}',[AdminController::class , 'edit_doctor']);
Route::get('/email_view/{id}',[AdminController::class , 'email_view']);
Route::post('/SendEmail/{id}',[AdminController::class , 'SendEmail']);


require __DIR__.'/auth.php';
