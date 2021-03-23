<?php

use App\Http\Controllers\Orders_controller;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::middleware(['auth',])->group(function () {
    Route::get('orders/edite_outCars/{id}', [Orders_controller::class, 'end_rent'])->name('end_rent');
    Route::get('orders/RunningOrders', [Orders_controller::class, 'RunningOrders'])->name('RunningOrders');

    Route::get('orders/edit2/{id}', [Orders_controller::class, 'edit2'])->name('edit2');
    Route::put('orders/update2/{id}', [Orders_controller::class, 'update2'])->name('update2');
    Route::get('orders/Confermed', [Orders_controller::class, 'confirmed_list'])->name('confirmedorders');
    Route::resource('Order', 'App\Http\Controllers\Orders_controller');
    Route::resource('brand', 'App\Http\Controllers\BrandController')->middleware('Is_Admin_middleware');
    Route::resource('car', 'App\Http\Controllers\Car_controller')->middleware('Is_Admin_middleware');
    Route::resource('slider', 'App\Http\Controllers\sliders_controller')->middleware('Is_Admin_middleware');
    Route::resource('employer', 'App\Http\Controllers\Manage_Employs')->middleware('Is_Owner_middleware');
});


Auth::routes();
Route::get('/{model?}', ['App\Http\Controllers\PublicController', 'index'])->name('carselected');
Route::resource('/', 'App\Http\Controllers\PublicController')->name('index', 'index');


//Route::view('select', 'public_view\Car_Select');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
