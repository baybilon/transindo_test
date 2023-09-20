<?php

use App\Http\Controllers\TrashController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerSave'])->name('register.save');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginAction'])->name('login.action');

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Route::get('logout', 'logout')->middleware('auth')->name('logout');


Route::get('/trash', [TrashController::class, 'index'])->name('trash.index');
Route::get('/trash/create', [TrashController::class, 'create'])->name('trash.create');
Route::post('/trash', [TrashController::class, 'save'])->name('trash.save');
Route::delete('/trash/delete/{row}', [TrashController::class, 'delete'])->name('trash.delete');
Route::get('/trash/edit/{row}', [TrashController::class, 'edit'])->name('trash.edit');
Route::put('/trash/edit/{row}', [TrashController::class, 'update'])->name('trash.update');