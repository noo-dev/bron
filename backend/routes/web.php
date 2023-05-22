<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StaffDepartmentController;

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

/* =================== FRONT ROUTES ====================== */

Route::get('/', [PageController::class, 'index'])->name('homePage');
Route::get('/login', [CustomerController::class, 'login'])->name('login.form');
Route::post('/login', [CustomerController::class, 'loginPost'])->name('login.post');
Route::get('/logout', [CustomerController::class, 'logout'])->name('logout');
Route::get('/register', [CustomerController::class, 'register'])->name('register.form');
Route::post('/check', [BookingController::class, 'check'])->name('checkBooking');
Route::get('/rooms', [PageController::class, 'rooms'])->name('roomsPage');
Route::get('/dashboard', [PageController::class, 'dashboard'])->name('front.dashboard');

// booking routes
Route::get('booking/success', [BookingController::class, 'bookingPaymentSuccess']);
Route::get('booking/fail', [BookingController::class, 'bookingPaymentFail']);

/* ============= ADMIN ROUTES ================= */

Route::group(['prefix' => 'adminka'], function() {
    Route::get('/', [PageController::class, 'admin'])->name('adminka');

    // login & register
    Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/auth', [AdminController::class, 'auth'])->name('admin.auth');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    // CRUD operations
    Route::resource('room-types', RoomTypeController::class);
    Route::resource('rooms', RoomController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('departments', StaffDepartmentController::class);

    Route::get('staffs/payment/{id}', [StaffController::class, 'payment'])->name('staff.payment');
    Route::post('/staffs/payment/{id}', [StaffController::class, 'payment_store'])->name('staffs.payment.store');

    Route::resource('staffs', StaffController::class);


    // delete roomtype image (ajax request)
    Route::get('/roomtypeimage/delete/{id}', [RoomTypeController::class, 'delete_image'])->name('delete.rti');
});

// Booking routes
Route::resource('adminka/bookings', BookingController::class);
Route::get('adminka/bookings/check/available-rooms', [BookingController::class, 'check_available_rooms']);
