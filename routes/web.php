<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


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
Route::get('/home', function () {
    return view('home');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/about-w', function () {
    return view('about-w');
});
Route::get('/report', function () {
    return view('report');
});

Route::get('/learnmore', function () {
    return view('learnmore');
});
Route::get('/profil', function () {
    return view('profil');
});


// login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


//Admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.admin');
    })->name('admin.admin');

    Route::get('/admin.report-ad', function () {
        return view('admin.report-ad');
    });

    Route::get('/admin.riwayat-ad', function () {
        return view('admin.riwayat-ad');
    });

    Route::get('/admin.user-ad', function () {
        return view('admin.user-ad');
    });
});
