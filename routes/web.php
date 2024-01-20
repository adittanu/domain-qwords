<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// route utama
Route::get('/', [homeController::class, 'index']);
// konfigurasi
Route::get('/konfigurasi', [homeController::class, 'konfigurasi']);
// route get "/api/whois?domain=" + domain; ke controller homeController
Route::get('/api/whois', [homeController::class, 'getWhoisOnline']);
// check login
Route::get('/api/check-login', [homeController::class, 'getLogin']);


