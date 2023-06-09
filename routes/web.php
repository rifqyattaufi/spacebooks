<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DataTableAjaxCRUDController;

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

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('admin')->group(function () {
    Route::get('/login', [LoginController::class, 'adminIndex'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'adminAuthenticate'])->name('admin.login.authenticate');
    Route::get('/register', [RegisterController::class, 'adminIndex'])->name('admin.register');
    Route::post('/register', [RegisterController::class, 'adminStore'])->name('admin.register.store');
});

Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/spaces/add', [AdminController::class, 'addSpace'])->name('admin.spaces.add');
    Route::post('/spaces/add', [AdminController::class, 'storeSpace'])->name('admin.spaces.store');
    Route::post('/spaces/price', [AdminController::class, 'getPrice'])->name('admin.spaces.price');
    Route::post('/spaces/price/update', [AdminController::class, 'updatePrice'])->name('admin.spaces.price.update');
    Route::post('/spaces/facility/update', [AdminController::class, 'updateFacility'])->name('admin.spaces.facility.update');
});

Route::get('/', function () {
    return view('welcome');
});
Route::get('/caritempat', function () {
    return view('cariTempat');
});
Route::get('/detailtempat', function () {
    return view('detailTempat');
});
Route::get('/tambahtempat', function () {
    return view('tambahTempat');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
