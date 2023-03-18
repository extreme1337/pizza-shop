<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\UserOrderController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'], function(){
    Route::get('/pizza', [PizzaController::class, 'index'])->name('pizza.index');
    Route::get('/pizza/create', [PizzaController::class, 'create'])->name('pizza.create');
    Route::post('/pizza/store', [PizzaController::class, 'store'])->name('pizza.store');
    Route::get('/pizza/{id}/edit', [PizzaController::class, 'edit'])->name('pizza.edit');
    Route::put('/pizza/{id}/update', [PizzaController::class, 'update'])->name('pizza.update');
    Route::delete('/pizza/{id}/delete', [PizzaController::class, 'destroy'])->name('pizza.destroy');


    //user order
    Route::get('/user/order', [UserOrderController::class, 'index'])->name('user.order');
    Route::post('/order/{id}/status', [UserOrderController::class, 'changeStatus'])->name('order.status');
});


