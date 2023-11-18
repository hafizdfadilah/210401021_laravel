<?php

use App\Http\Controllers\artikelcontrol;
use App\Http\Controllers\authorcontrol;
use App\Http\Controllers\kategoricontrol;
use App\Http\Controllers\katergoricontrol;
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
Route::resource('artikel', artikelcontrol::class);
Route::resource('author', authorcontrol::class);
Route::resource('kategori', kategoricontrol::class );