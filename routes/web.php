<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Master\ItemController;
use App\Http\Controllers\Master\UserController;
use App\Http\Controllers\Transaction\SaleController;
use Illuminate\Support\Facades\Auth;
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
    return Auth::check() ? redirect()->route('home') : redirect()->route('login');
});

Auth::routes();

// Route::middleware(['auth'])->group(function () {
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('users', UserController::class);
Route::resource('items', ItemController::class);
Route::resource('sales', SaleController::class);
// });
