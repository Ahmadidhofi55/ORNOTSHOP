<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\merekController;
use App\Http\Controllers\ordermasukController;
use App\Http\Controllers\orderprosesController;
use App\Http\Controllers\orderselesaiController;
use App\Http\Controllers\productController;
use App\Http\Controllers\produkController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\userController;
use App\Models\orderselesai;
use Illuminate\Routing\RouteGroup;
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
    return view('welcome');
});

Auth::routes();

Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/profil/edit',[ProfilController::class,'edit'])->name('profil.edit');
    //update profil
    Route::put('/profil/update',[ProfilController::class,'update'])->name('profil.update');
    Route::resource('produk', produkController::class);
    //Route::get('/produk', [produkController::class, 'detail'])->name('produk.index');
    //kategori
    Route::resource('/kategori', kategoriController::class);
    //merek
    Route::resource('/merek', merekController::class)->except([
        'show'
    ]);

    //order mannagement
    Route::resource('/ordermasuk', ordermasukController::class);
    Route::resource('/orderproses',orderprosesController::class);
    Route::resource('/orderselesai',orderselesaiController::class);
});

