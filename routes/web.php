<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\Login;
use App\Http\Controllers\Api\RoutesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {
    Route::get('/test', [AdminController::class, 'test'])->name('admin');
    Route::get('/getToken', [AdminController::class, 'getToken'])->name('aa');
});

Route::post('api/login',[Login::class, 'login'])->name('loginApi');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/api/test', [AdminController::class, 'sanctumTest'])->name('sanctum');
    Route::post('/api/setlocation', [RoutesController::class, 'startLocation'])->name('setlocation');
});