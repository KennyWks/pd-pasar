<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
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

Route::get('/', [ClientController::class, 'index']);


Route::get('/admn-pg/dashboard', [AdminController::class, 'index']);
Route::get('/admn-pg/pasar', [AdminController::class, 'pasar']);

//produk
Route::get('/admn-pg/produk', [AdminController::class, 'produk']);
//harga
Route::get('/admn-pg/harga', [AdminController::class, 'harga']);