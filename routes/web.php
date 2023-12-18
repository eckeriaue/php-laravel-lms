<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', function (Request $req) {
    return view('home');
});


Route::get('/testpage', function (Request $req) {
    return view('testpage');
});

Route::get('/login', function (Request $req) {
    return view('login');
});