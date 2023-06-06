<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Hotel\HotelController;
use App\Http\Controllers\Roomtype\RoomTypeController;
use App\Http\Controllers\Accommodation\AccommodationController;

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
Route::get('/api/hotels', [HotelController::class, 'index']);
Route::post('/api/hotels/create', [HotelController::class, 'create']);
Route::get('/api/hotels/{id}', [HotelController::class, 'show']);
Route::put('/api/hotels/{id}', [HotelController::class, 'update']);
Route::delete('/api/hotels/{id}', [HotelController::class, 'destroy']);

Route::get('/api/room-types', [RoomTypeController::class, 'index']);
Route::post('/api/room-types', [RoomTypeController::class, 'store']);
Route::get('/api/room-types/{id}', [RoomTypeController::class, 'show']);
Route::put('/api/room-types/{id}', [RoomTypeController::class, 'update']);
Route::delete('/api/room-types/{id}', [RoomTypeController::class, 'destroy']);

Route::get('/api/accommodations', [AccommodationController::class, 'index']);
Route::post('/api/accommodations', [AccommodationController::class, 'store']);
Route::get('/api/accommodations/{id}', [AccommodationController::class, 'show']);
Route::put('/api/accommodations/{id}', [AccommodationController::class, 'update']);
Route::delete('/api/accommodations/{id}', [AccommodationController::class, 'destroy']);
