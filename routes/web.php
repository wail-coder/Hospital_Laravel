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

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

// Broadcast::channel('/dashboard', function ($notifications) {
   
//     // info("Load from chanell");
    
//     // return (int) auth()->user()->id != (int) $notifications->user_id;

// });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', 'App\Http\Controllers\UserController@showDashboard')->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
Route::resource('users',  App\Http\Controllers\UserController::class);
Route::get('users/{id}/reset',  'App\Http\Controllers\UserController@ResetPassword')->name('users.reset');
Route::put('users/update/{id}',  'App\Http\Controllers\UserController@updatePassword')->name('users.updatePassword');
Route::resource('hospitals',  App\Http\Controllers\HospitalsController::class);
Route::post('buildings/store/{id}',  'App\Http\Controllers\BuildingsController@store')->name('buildings.storee');
Route::resource('buildings',  App\Http\Controllers\BuildingsController::class);
Route::get('buildings/{id}/floor',  'App\Http\Controllers\BuildingsController@showFloors')->name('buildings.showFloors');
Route::get('hospitals/{id}/create/building/step_1',  'App\Http\Controllers\BuildingsController@createFirstStep')->name('buildings.createFirstStep');
Route::post('hospitals/{id}/create/building/step_1',  'App\Http\Controllers\BuildingsController@storeFirstStep')->name('buildings.storeFirstStep');
Route::get('hospitals/{id}/create/building/step_2',  'App\Http\Controllers\BuildingsController@createSecondStep')->name('buildings.createSecondStep');
Route::post('hospitals/{id}/create/building/step_2',  'App\Http\Controllers\BuildingsController@storeSecondStep')->name('buildings.storeSecondStep');
Route::get('hospitals/{id}/create/building/step_2/room',  'App\Http\Controllers\BuildingsController@createThirdStep')->name('buildings.createThirdStep');
Route::post('hospitals/{id}/create/building/step_2/room',  'App\Http\Controllers\BuildingsController@storeRoomStep')->name('buildings.storeRoomStep');
Route::get('hospitals/{id}/create/building/Confirm',  'App\Http\Controllers\BuildingsController@createLastStep')->name('buildings.createLastStep');
Route::post('hospitals/{id}/create/building/Confirm',  'App\Http\Controllers\BuildingsController@storeLastStep')->name('buildings.storeLastStep');
Route::delete('hospitals/{id_h}/destroy/building/{id_b}',  'App\Http\Controllers\BuildingsController@destroy')->name('buildings.destroy');
Route::get('hospitals/create/floor',  'App\Http\Controllers\HospitalsController@createFloor')->name('hospitals.createFloor');
Route::get('hospitals/create/room',  'App\Http\Controllers\HospitalsController@createRoom')->name('hospitals.createRoom');
Route::resource('groups',  App\Http\Controllers\GroupsController::class);
Route::post('groups/create/step_1',  'App\Http\Controllers\GroupsController@storeFirstStep')->name('groups.storeFirstStep');
Route::get('groups/create/step_1',  'App\Http\Controllers\GroupsController@createFirstStep')->name('groups.createFirstStep');
Route::get('groups/create/step_2',  'App\Http\Controllers\GroupsController@createSecondStep')->name('groups.createSecondStep');
Route::post('groups/create/step_2',  'App\Http\Controllers\GroupsController@storeSecondStep')->name('groups.storeSecondStep');
Route::get('groups/create/confirm',  'App\Http\Controllers\GroupsController@createThirdStep')->name('groups.createThirdStep');
Route::post('groups/create/confirm',  'App\Http\Controllers\GroupsController@storeThirdStep')->name('groups.storeThirdStep');
Route::get('groups/{id}/assign/rooms/step_1',  'App\Http\Controllers\GroupsController@assignFirstStep')->name('groups.assignFirstStep');
Route::post('groups/{id}/assign/rooms/step_1',  'App\Http\Controllers\GroupsController@storeAssignFirstStep')->name('groups.storeAssignFirstStep');
Route::get('groups/{id}/assign/rooms/step_2',  'App\Http\Controllers\GroupsController@assignSecondStep')->name('groups.assignSecondStep');
Route::post('groups/{id}/assign/rooms/step_2',  'App\Http\Controllers\GroupsController@storeAssignSecondStep')->name('groups.storeAssignSecondStep');
Route::get('groups/{id}/assign/rooms/step_3',  'App\Http\Controllers\GroupsController@assignThirdStep')->name('groups.assignThirdStep');
Route::post('groups/{id}/assign/rooms/step_3',  'App\Http\Controllers\GroupsController@storeAssignThirdStep')->name('groups.storeAssignThirdStep');
Route::get('groups/{id}/assign/rooms/confirm',  'App\Http\Controllers\GroupsController@assignConfirmStep')->name('groups.assignConfirmStep');
Route::post('groups/{id}/assign/rooms/confirm',  'App\Http\Controllers\GroupsController@storeAssignConfirmStep')->name('groups.storeAssignConfirmStep');
Route::post('/dashboard',  'App\Http\Controllers\UserController@sendNotifications')->name('users.sendNotifications');


});