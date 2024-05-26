<?php

use App\Http\Controllers\HomeController;
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



Route::view('/upload', 'Track.index')->name('upload.index');

Route::get('/mp/success', function() {
    return dd(request('collection_status'));
});

Route::get('/mp/pending', function() {
    return dd(request('collection_status'));
});

Route::get('/mp/failure', function() {
    return dd(request('collection_status'));
});