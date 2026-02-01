<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/login', function () {
    return view('login');
});
Route::get('/learnmore', function () {
    return view('learnmore');
});
Route::get('/profil', function () {
    return view('profil');
});


//Admin
Route::get('/login-ad', function () {
    return view('login-ad');
});
Route::get('/admin', function () {
    return view('admin');
});
Route::get('/report-ad', function () {
    return view('report-ad');
});
Route::get('/riwayat-ad', function () {
    return view('riwayat-ad');
});
Route::get('/user-ad', function () {
    return view('user-ad');
});