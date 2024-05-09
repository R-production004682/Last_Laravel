<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(route('customers.index'));
});
Route::resource('products' , ProductCOntroller::class);
Route::resource('customers', CustomerController::class);
Route::resource('orders', OrderController::class, ['except' => ['show']]);
Route::post('shipping', [OrderController::class ,'update_shipping'])->name('orders.shipping');
