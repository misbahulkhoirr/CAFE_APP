<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboard\MenuController;
use App\Http\Controllers\AdminDashboard\UserController;
use App\Http\Controllers\LoginAdmin\LoginController;
use App\Http\Controllers\AdminDashboard\KategoriController;
use App\Models\Menu;

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

//route home
Route::get('/', function () {
    return view('home', [
        'title' => "Home",
        'menu' => Menu::all()
    ]);
});

//Route login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'auth']);
Route::post('/logout', [LoginController::class, 'logout']);

// route halaman admin dashboard
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard.index', [
        'title' => 'Dashboard'
    ]);
})->middleware('auth');

// route CRUD user
Route::resource('/admin/user', UserController::class)->except('show')->middleware('user');

// route CRUD kategori  & slug kategori otomatis
Route::resource('/admin/kategori', KategoriController::class)->except('show')->middleware('auth');
Route::get('/admin/kategoris/kategoriSlug', [KategoriController::class, 'kategoriSlug']); //membuatslugotomatis

// route CRUD Menu  & slug menu otomatis
Route::resource('/admin/menu', MenuController::class)->middleware('auth');
Route::get('/admin/menus/slugMenu', [MenuController::class, 'slugMenu']); //membuatslugotomatis
