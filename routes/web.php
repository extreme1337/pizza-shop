<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\FrontendController;
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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [FrontendController::class, 'index'])->name('frontpage');
Route::get('/pizza/{id}', [FrontendController::class, 'show'])->name('pizza.show');
Route::get('/order/store', [FrontendController::class, 'store'])->name('order.store');

Route::group(['prefix'=>'admin','middleware'=>['auth','admin']], function(){
    Route::get('/pizza', [PizzaController::class, 'index'])->name('pizza.index');
    Route::get('/pizza/create', [PizzaController::class, 'create'])->name('pizza.create');
    Route::post('/pizza/store', [PizzaController::class, 'store'])->name('pizza.store');
    Route::get('/pizza/{id}/edit', [PizzaController::class, 'edit'])->name('pizza.edit');
    Route::put('/pizza/{id}/update', [PizzaController::class, 'update'])->name('pizza.update');
    Route::delete('/pizza/{id}/delete', [PizzaController::class, 'destroy'])->name('pizza.destroy');


    //user order
    Route::get('/user/order', [UserOrderController::class, 'index'])->name('user.order');
    Route::post('/order/{id}/status', [UserOrderController::class, 'changeStatus'])->name('order.status');

    //customers
    Route::get('/customer', [UserOrderController::class, 'customers'])->name('customers');
});


