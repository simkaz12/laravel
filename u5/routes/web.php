<?php

use App\Http\Controllers\AccountController as A;
use App\Http\Controllers\HomeController as H;
use Illuminate\Support\Facades\Route;


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

Route::prefix('acc')->name('acc-')->group(function () {

    Route::get('/', [A::class, 'index'])->name('index'); // all
    Route::get('/create', [A::class, 'create'])->name('create'); // show create
    Route::post('/', [A::class, 'store'])->name('store'); // create
    Route::get('/show/{account}', [A::class, 'show'])->name('show'); // show one
    Route::get('/edit/{account}', [A::class, 'edit'])->name('edit'); // show edit
    Route::get('/transfer/{account}', [A::class, 'transfer'])->name('transfer'); // show edit
    Route::put('/{account}', [A::class, 'update'])->name('update'); // edit
    Route::get('/delete/{account}', [A::class, 'delete'])->name('delete'); // show delete
    Route::delete('/{account}', [A::class, 'destroy'])->name('destroy'); // destroy



});

Auth::routes();

Route::get('/home', [H::class, 'index'])->name('home');