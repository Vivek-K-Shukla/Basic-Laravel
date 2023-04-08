<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\LoginController;

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
    return view('welcome');
});

Route::get('/sendmail',[MailController::class,'index']);

Route::get('/register',[LoginController::class,'register']);
Route::post('/register-save',[LoginController::class,'register_save']);
Route::get('/login',[LoginController::class,'login']);
Route::post('/login-save',[LoginController::class,'login_save']);
Route::get('/dashboard',[LoginController::class,'dashboard']);
Route::get('/logout',[LoginController::class,'logout']);
Route::get('/reset-password',[LoginController::class,'reset_password']);
Route::post('/reset-password-submit',[LoginController::class,'reset_password_submit']);
Route::get('/resetform/{token}',[LoginController::class,'reset_form']);
Route::post('/resetsubmit',[LoginController::class,'reset_submit']);
Route::get('/changepassword',[LoginController::class,'change_password']);
Route::post('/changepassword-submit',[LoginController::class,'changepassword_submit']);


Route::get('/adduser',[CrudController::class,'add_user']);
Route::post('/user-save',[CrudController::class,'user_save']);
Route::get('/dashboard',[CrudController::class,'dashboard']);
Route::get('/delete/{id}',[CrudController::class,'delete_user']);
Route::get('/edit/{id}',[CrudController::class,'edit_user']);
Route::post('/update-user',[CrudController::class,'update_user']);
Route::get('search',[CrudController::class,'search']);

