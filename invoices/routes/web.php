<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController as I;

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

Route::prefix('invoices')->name('invoices-')->group(function () {
    Route::get('/', [I::class, 'index'])->name('index'); // all invoices
    Route::get('/show/{invoice}', [I::class, 'show'])->name('show'); // show one inv

    Route::get('/create', [I::class, 'create'])->name('create'); // show create
    Route::get('/edit/{invoice}', [I::class, 'edit'])->name('edit'); // show edit
    Route::get('/delete/{invoice}', [I::class, 'delete'])->name('delete'); // show delete

    Route::post('/', [I::class, 'store'])->name('store'); // store new
    Route::put('/{invoice}', [I::class, 'update'])->name('update'); // update
    Route::delete('/{invoice}', [I::class, 'destroy'])->name('destroy'); // delete
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');