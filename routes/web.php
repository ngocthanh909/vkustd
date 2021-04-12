<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HosoController as ctr;
use App\Http\Controllers\CvController as cvCtr;
use App\Http\Controllers\DonTuController as dtCtr;
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
//     return view('upload');
// });
Route::post('/upload', [ctr::class, 'imgUpload'])->name('upload');

// View route
Route::get('suahoso/', [ctr::class, 'suahosoIndex']);
Route::get('hoso/', [ctr::class, 'hosoIndex']);
Route::get('cv/', [cvCtr::class, 'cvIndex']);
Route::get('cv2/', [cvCtr::class, 'cvIndexV2']);
Route::get('suacv/', [cvCtr::class, 'suacvIndex']);
// Resource route
Route::post('suahoso/', [ctr::class, 'suahosoStore'])->name('suahosoStore');
// VIEW ROUTE
Route::view('/', 'index/index');
Route::get('/taodon', [dtCtr::class, 'themDonIndex']);
Route::get('/ajax/ajaxtruong', [dtCtr::class, 'ajaxTruong'])->name('ajaxTruong');


Route::post('/admin/maudon/store', [dtCtr::class, 'maudonStore'])->name('maudon.Store');
Route::post('/admin/maudon/truong/store', [dtCtr::class, 'truongStore'])->name('truong.Store');
Route::get('/sv/nopdon/{donid}', [dtCtr::class, 'nopdonIndex']);
Route::post('/sv/nopdon/{donid}', [dtCtr::class, 'nopdonStore'])->name('nopdon.Store');