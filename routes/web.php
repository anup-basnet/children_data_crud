<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChildController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ChildController::class, 'index'])->name('child.index');
Route::get('/create', [ChildController::class, 'create'])->name('child.create');
Route::post('/', [ChildController::class, 'store'])->name('child.store');
Route::get('/{child}/edit', [ChildController::class, 'edit'])->name('child.edit');
Route::put('/{child}/update', [ChildController::class, 'update'])->name('child.update');
Route::delete('/{child}/delete', [ChildController::class, 'delete'])->name('child.delete');
