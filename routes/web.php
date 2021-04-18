<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
Route::resource('users',  App\Http\Controllers\UserController::class);
Route::get('users/{id}/reset',  'App\Http\Controllers\UserController@ResetPassword')->name('users.reset');
Route::put('users/update/{id}',  'App\Http\Controllers\UserController@updatePassword')->name('users.updatePassword');
Route::resource('hospitals',  App\Http\Controllers\HospitalsController::class);
Route::get('hospitals/create/room',  'App\Http\Controllers\HospitalsController@createRoom')->name('hospitals.createRoom');

});