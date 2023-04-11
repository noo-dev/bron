<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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
Route::get('/rooms', [PageController::class, 'rooms'])->name('roomsPage');

