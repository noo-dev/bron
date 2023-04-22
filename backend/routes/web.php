<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CustomerController;

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

Route::get('/adminka', function () {
    return view('admin.index');
});

Route::get('/', [PageController::class, 'index'])->name('homePage');
Route::post('/check', [BookingController::class, 'check'])->name('checkBooking');
Route::get('/rooms', [PageController::class, 'rooms'])->name('roomsPage');

Route::group(['prefix' => 'adminka'], function() {
    Route::get('/', [PageController::class, 'admin']);

    // login & register
    Route::get('/login', [AdminController::class, 'login']);
    Route::post('/auth', [AdminController::class, 'auth'])->name('admin.auth');

    // CRUD operations
    Route::resource('room-types', RoomTypeController::class);
    Route::resource('rooms', RoomController::class);
    Route::resource('customers', CustomerController::class);
});
