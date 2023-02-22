<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Stock_inController;
use App\Http\Controllers\Stock_outController;
use App\Http\Controllers\DynamicTableController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\OptionController;
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
// Route::get('/', [HomeController::class, 'index']);

Route::get('/', [ProductController::class, 'index'])->name('product.add');
Route::post('/Product/add', [ProductController::class, 'create'])->name('product.create');
Route::get('/product/manage', [ProductController::class, 'manage'])->name('product.manage');
Route::get('/product/detail/{id}', [ProductController::class, 'details'])->name('product.detail');
Route::post('/product/search', [ProductController::class, 'manage'])->name('product.search');

Route::get('/Product/stock_in', [Stock_inController::class, 'index'])->name('product.stock-in');
Route::post('/Product/stock_in', [Stock_inController::class, 'create'])->name('product.stock-in-add');
Route::get('/Product/stock_in/manage', [Stock_inController::class, 'manage'])->name('product.stock-in-manage');

Route::get('/Product/stock_out', [Stock_outController::class, 'index'])->name('product.stock-out');
Route::post('/Product/stock_out', [Stock_outController::class, 'create'])->name('product.stockout-remove');

Route::get('/Dynamictable', [DynamicTableController::class, 'index'])->name('daynamicTable');
Route::get('/Dynamictable/create', [DynamicTableController::class, 'create'])->name('daynamicTable.create');
Route::get('/Daynamictabl/add', [DynamicTableController::class, 'table'])->name('dynamic.table');


Route::get('/question', [QuestionController::class, 'index'])->name('question');
Route::get('/question/add', [QuestionController::class, 'addquestion'])->name('question.add');

Route::get('/option/add', [OptionController::class, 'addOption'])->name('question.option');



