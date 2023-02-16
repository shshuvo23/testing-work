<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Stock_inController;
use App\Http\Controllers\Stock_outController;
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

Route::get('/', [ProductController::class, 'index'])->name('product.add');
Route::post('/Product/add', [ProductController::class, 'create'])->name('product.create');
Route::get('/product/manage', [ProductController::class, 'manage'])->name('product.manage');

Route::get('/Product/stock_in', [Stock_inController::class, 'index'])->name('product.stock-in');
Route::post('/Product/stock_in', [Stock_inController::class, 'create'])->name('product.stock-in-add');
Route::get('/Product/stock_in/manage', [Stock_inController::class, 'manage'])->name('product.stock-in-manage');

Route::get('/Product/stock_out', [Stock_outController::class, 'index'])->name('product.stock-out');
Route::post('/Product/stock_out', [Stock_outController::class, 'create'])->name('product.stockout-remove');



