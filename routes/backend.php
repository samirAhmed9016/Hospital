<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\DoctorController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::get('/Dashboard_admin', [DashboardController::class, 'index']);




Route::middleware('auth:admin')->group(function () {
    Route::post('logout/admin', [AdminController::class, 'destroy'])->name('logout.admin');
    // Route::resource('sections', [SectionController::class]);
});




Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {


        Route::get('/dashboard/user', function () {
            return view('dashboard.User.dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard.user');


        Route::get('/dashboard/admin', function () {
            return view('dashboard.Admin.dashboard');
        })->middleware(['auth:admin', 'verified'])->name('dashboard.admin');


        Route::middleware(['auth:admin'])->group(function () {
            Route::resource('sections', SectionController::class);
            Route::resource('doctors', DoctorController::class);
        });







        require __DIR__ . '/auth.php';
    }
);



























require __DIR__ . '/auth.php';
