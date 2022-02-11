<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReserveController;

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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/detail', [HomeController::class, 'detail'])->name('detail');
Route::post('/reserve', [ReserveController::class, 'reserve'])->name('reserve');
Route::get('/thanks', [ReserveController::class, 'thanks'])->name('thanks');
Route::get('/serch', [HomeController::class, 'serch'])->name('serch');