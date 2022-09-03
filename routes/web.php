<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController as Todo;

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

Route::group(['prefix' => ''], function () {
    Route::get('/', [Todo::class, 'index'])->name('todo');
    Route::get('/create', [Todo::class, 'create'])->name('todo.create');
    Route::post('/store', [Todo::class, 'store'])->name('todo.store');
    Route::get('/edit/{id}', [Todo::class, 'edit'])->name('todo.edit');
    Route::post('/update', [Todo::class, 'update'])->name('todo.update');
    Route::get('/delete/{id}', [Todo::class, 'destroy'])->name('todo.delete');
});
