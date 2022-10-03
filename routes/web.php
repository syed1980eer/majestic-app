<?php

use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\ItemController;
use App\Http\Controllers\Backend\LinkedController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\PDFController;
use App\Models\Customer;
use App\Models\Linked;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\DB;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('users', UserController::class);
Route::resource('products', ProductController::class);
Route::resource('items', ItemController::class);
Route::resource('customers', CustomerController::class);
Route::resource('linked', LinkedController::class);
Route::resource('orders', OrderController::class);

Route::get('orders.export', [OrderController::class, 'export'])->name('export');
Route::post('mht_order_pdf', [OrderController::class, 'mht_order_pdf'])->name('mht_order_pdf');
