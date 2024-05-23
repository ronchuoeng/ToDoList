<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDoController;

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

Route::get('/', [ToDoController::class, 'index'])->name('index');
Route::post('/new-task/store', [ToDoController::class, 'store'])->name('store');
Route::post('/update', [ToDoController::class, 'update'])->name('update');
Route::post('/reset-session', [ToDoController::class, 'reset'])->name('reset.session');
Route::delete('/remove', [TodoController::class, 'remove'])->name('remove');