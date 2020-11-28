<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\{Route, Auth};

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

Route::get('/', [FrontController::class, 'index'])->name('home');
Route::post('/', [FrontController::class, 'search'])->name('cari');
Route::get('blogs/{id?}', [FrontController::class, 'blogs'])->name('blog');
Route::get('blog/{id}', [FrontController::class, 'detail'])->name('berita');
Route::get('tentang', [FrontController::class, 'about'])->name('about');


Auth::routes();
Route::redirect('home', '/admin/home');
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('home', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::resource('berita', NewsController::class);
    Route::resource('pengguna', UserController::class);
    Route::resource('kategori', CategoryController::class);
});
