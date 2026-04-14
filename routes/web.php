<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Admin\AdminReportController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RiwayatController;
use App\Http\Controllers\RiwayatUserController;

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

//USER
Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});


Route::get('/about', function () {
    return view('about');
});

Route::get('/about-w', function () {
    return view('about-w');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/report', [ReportController::class, 'create'])->name('report.create');
    Route::post('/report', [ReportController::class, 'store'])->name('report.store');
    Route::prefix('api')->group(function () {
        Route::get('/reports/{id}', [ReportController::class, 'show']);
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profil', [ProfileController::class, 'index'])
        ->name('profile.index');

    Route::post('/profil/upload-photo', [ProfileController::class, 'uploadPhoto'])
        ->name('profile.upload-photo');

    Route::delete('/profil/delete-photo', [ProfileController::class, 'deletePhoto'])
        ->name('profile.delete-photo');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/riwayat', [RiwayatUserController::class, 'index'])->name('riwayat');
    Route::prefix('api')->group(function () {
        Route::get('/riwayat/{id}', [RiwayatUserController::class, 'show']);
    });
});


// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Contact Admin
Route::get('/contact-admin', [AuthController::class, 'showContactAdmin'])
    ->name('contact.admin');

// logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


//Admin
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    // Admin dashboard
    Route::get('/', [AdminController::class, 'index'])->name('admin.admin');
    Route::prefix('admin')->group(function () {
        Route::get('/pdf-dash-report', [AdminController::class, 'exportPDF']);
    });

    // report-ad
    Route::get('/report-ad', [AdminReportController::class, 'index'])->name('admin.report');

    // API Report
    Route::prefix('api')->group(function () {
        Route::get('/reports', [AdminReportController::class, 'getReports']);
        Route::get('/reports/{id}', [AdminReportController::class, 'show']);
        Route::put('/reports/{id}/status', [AdminReportController::class, 'updateStatus']);
        Route::delete('/reports/{id}', [AdminReportController::class, 'destroy']);
    });

    // Riwayat
    Route::get('/riwayat-ad', [RiwayatController::class, 'index'])->name('admin.riwayat-ad');
    Route::get('/riwayat-ad/print/{id}', [RiwayatController::class, 'printPDF'])->name('admin.riwayat.print');

    // API
    Route::prefix('api')->group(function () {
        Route::delete('/riwayat/{id}', [RiwayatController::class, 'destroy']);
    });

    // user-ad
    Route::get('/user-ad', [UserController::class, 'index'])->name('admin.user');

    // API User (AJAX)
    Route::prefix('api')->group(function () {
        Route::get('/users',                      [UserController::class, 'getUsers']);
        Route::post('/users',                     [UserController::class, 'store']);
        Route::put('/users/{id}',                 [UserController::class, 'update']);
        Route::post('/users/{id}/reset-password', [UserController::class, 'resetPassword']);
        Route::delete('/users/{id}',              [UserController::class, 'destroy']);
        Route::delete('/users/{id}/delete-photo', [UserController::class, 'deleteUserPhoto']);
    });
});
