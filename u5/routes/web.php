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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', [H::class, 'index'])->name('home');

Route::prefix('acc')->name('acc-')->group(function () {

    Route::get('/', [A::class, 'index'])->name('index')->middleware('simple'); // all
    Route::get('/create', [A::class, 'create'])->name('create')->middleware('simple'); // show create
    Route::post('/', [A::class, 'store'])->name('store')->middleware('simple'); // create
    Route::get('/show/{account}', [A::class, 'show'])->name('show')->middleware('simple'); // show one
    Route::get('/edit/{account}', [A::class, 'edit'])->name('edit')->middleware('simple'); // show edit
    Route::put('/tax/{account}', [A::class, 'tax'])->name('tax')->middleware('simple'); // tax account
    Route::put('/{account}', [A::class, 'update'])->name('update')->middleware('simple'); // edit
    Route::get('/delete/{account}', [A::class, 'delete'])->name('delete')->middleware('simple'); // show delete
    Route::delete('/{account}', [A::class, 'destroy'])->name('destroy')->middleware('simple'); // destroy



});

Auth::routes();