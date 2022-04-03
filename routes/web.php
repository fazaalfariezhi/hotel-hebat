<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\FasilitasHotelController;
use App\Http\Controllers\FasilitasKamarController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\RoomController;
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

// Route::get('/', function () {
//     return view('landing.index');
// });

Route::get('/', [LandingPageController::class, 'index']);

Route::resource('/login', LoginController::class)->name('index','login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout']);

Route::resource('/register', RegisterController::class)->middleware('guest');

//----------------------------------------------TAMU-----------------------------------------------------------------------------
Route::resource('/pemesanan', PemesananController::class)->middleware('tamu');
Route::resource('/receipt', InvoiceController::class)->middleware('tamu')->except('show');
Route::get('/receipt/{pemesanan:invoice_id}', [InvoiceController::class, 'show']);
Route::get('/receipt/{pemesanan:invoice_id}/print', [InvoiceController::class, 'print']);

//----------------------------------------------RESEPSIONIS-----------------------------------------------------------------------------

Route::resource('/beranda', DashboardController::class)->middleware('auth');


Route::resource('/reservation', ReservasiController::class)->middleware('resepsionis');

// -------------------------------------------ADMIN-------------------------------------------------------------------------------------

Route::resource('/kamar', KamarController::class)->middleware('admin');



Route::resource('/fasilitas-kamar', FasilitasKamarController::class)->middleware('admin');

Route::resource('/fasilitas-hotel', FasilitasHotelController::class)->middleware('admin');

Route::resource('/room', RoomController::class);

Route::resource('/fasilitas', FasilitasController::class);

Route::post('/status/{id}', [PemesananController::class, 'status'])->middleware('resepsionis');


Route::get('/getid/{type_kamar}', [PemesananController::class, 'getid']);



