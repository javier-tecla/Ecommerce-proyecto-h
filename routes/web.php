<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjustesController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('auth');

Route::get('/admin/ajustes', [App\Http\Controllers\AjusteController::class, 'index'])->name('admin.ajustes.index')->middleware('auth');

Route::post('/admin/ajustes/create', [App\Http\Controllers\AjusteController::class, 'store'])->name('admin.ajustes.store')->middleware('auth');

