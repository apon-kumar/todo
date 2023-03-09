<?php

use App\Http\Controllers\TodoController;
use App\Http\Controllers\userController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/todos', [TodoController::class, 'index'])->name('todos.index');

Route::post('/todos/create', [TodoController::class, 'store']);

Route::get('/todos/create', [TodoController::class, 'create']);

Route::get('/todos/{todo}/edit', [TodoController::class, 'edit']);

Route::patch('/todos/{todo}/update', [TodoController::class, 'update'])->name('todos.update');

Route::put('/todos/{todo}/complete', [TodoController::class, 'complete'])->name('todos.complete');

Route::delete('/todos/{todo}/incomplete', [TodoController::class, 'incomplete'])->name('todos.incomplete');

Route::delete('/todos/{todo}/delete', [TodoController::class, 'delete'])->name('todos.delete');

Route::get('/todos/{todo}/show', [TodoController::class, 'show'])->name('todos.show');


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::post('/upload', [userController::class, 'uploadAvatar']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
