<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HosoController as ctr;
use App\Http\Controllers\CvController as cvCtr;

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
    return view('upload');
});
Route::post('/upload', [ctr::class, 'imgUpload'])->name('upload');

// View route
Route::get('suahoso/', [ctr::class, 'suahosoIndex']);
Route::get('hoso/', [ctr::class, 'hosoIndex']);
Route::get('cv/', [cvCtr::class, 'cvIndex']);
Route::get('suacv/', [cvCtr::class, 'suacvIndex']);
// Resource route
Route::post('suahoso/', [ctr::class, 'suahosoStore'])->name('suahosoStore');
