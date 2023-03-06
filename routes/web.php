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

Route::get('/todos/{id}/edit', [TodoController::class, 'edit']);

Route::patch('/todos/{id}/update', [TodoController::class, 'update'])->name('todos.update');

Route::put('/todos/{id}/complete', [TodoController::class, 'complete'])->name('todos.complete');

Route::delete('/todos/{id}/incomplete', [TodoController::class, 'incomplete'])->name('todos.incomplete');

Route::delete('/todos/{id}/delete', [TodoController::class, 'delete'])->name('todos.delete');


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::post('/upload', [userController::class, 'uploadAvatar']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
