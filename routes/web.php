<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DataTableAjaxCRUDController;
use App\Http\Controllers\UserController;

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

    Route::get('/spaces/add', [AdminController::class, 'addSpace'])->name('admin.spaces.add');
    Route::post('/spaces/add', [AdminController::class, 'storeSpace'])->name('admin.spaces.store');
    Route::post('/spaces/price', [AdminController::class, 'getPrice'])->name('admin.spaces.price');
    Route::post('/spaces/price/update', [AdminController::class, 'updatePrice'])->name('admin.spaces.price.update');
    Route::post('/spaces/facility/update', [AdminController::class, 'updateFacility'])->name('admin.spaces.facility.update');
    Route::post('/spaces/phone/update', [AdminController::class, 'updatePhone'])->name('admin.spaces.phone.update');
    Route::post('/spaces/address/update', [AdminController::class, 'updateAddress'])->name('admin.spaces.address.update');
    Route::post('/spaces/openClose/update', [AdminController::class, 'updateOpenClose'])->name('admin.spaces.openClose.update');

    Route::get('/gallery', [AdminController::class, 'gallery'])->name('admin.gallery');
    Route::post('/gallery/add', [AdminController::class, 'addGallery'])->name('admin.gallery.add');
    Route::post('/galerry/delete', [AdminController::class, 'deleteGallery'])->name('admin.gallery.delete');

    Route::get('/jadwal', [AdminController::class, 'jadwal'])->name('admin.jadwal');
    Route::post('/jadwal/add', [AdminController::class, 'addJadwal'])->name('admin.jadwal.add');
    Route::post('/jadwal/get', [AdminController::class, 'getJadwal'])->name('admin.jadwal.get');
    Route::post('jadwal/delete', [AdminController::class, 'deleteJadwal'])->name('admin.jadwal.delete');
});

Route::get('/', [UserController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/caritempat', [UserController::class, 'cariTempat'])->name('caritempat');
    Route::get('detailtempat/{id}/{type?}', [UserController::class, 'detailTempat'])->name('detailtempat');
    Route::post('rating/store', [UserController::class, 'storeRating'])->name('review.store');
    Route::get('review/{id}', [UserController::class, 'checkRating'])->name('review.check');
});
