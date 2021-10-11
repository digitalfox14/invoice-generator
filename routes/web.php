<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\InvoiceController;
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
    return view('invoice-generator');
});

Auth::routes();

//Route::get('/form', [App\Http\Controllers\HomeController::class, 'data'])->name('form');
Route::post('/form',[InvoiceController::class, 'store'])->name('invoice.store');
Route::get('/download/{id}/pdf',[InvoiceController::class, 'index'])->name('invoice.index');
Route::get('/invoice/1/download',[InvoiceController::class, 'show'])->name('invoice.show');