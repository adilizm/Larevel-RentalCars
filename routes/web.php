<?php

use App\Http\Controllers\Car_controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Manage_Employs;
use App\Models\Sliders;
use Facade\FlareClient\View;
use app\Http\Controllers\PublicController;

Auth::routes();


Route::resource('employer', 'App\Http\Controllers\Manage_Employs')->middleware('auth');
Route::resource('brand', 'App\Http\Controllers\BrandController')->middleware('auth');
Route::resource('car', 'App\Http\Controllers\Car_controller')->middleware('auth');
Route::resource('slider', 'App\Http\Controllers\sliders_controller')->middleware('auth');
Route::get('/{model?}', ['App\Http\Controllers\PublicController','index'])->name('carselected');
Route::resource('/', 'App\Http\Controllers\PublicController')->name('index','index');
//Route::view('select', 'public_view\Car_Select');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
