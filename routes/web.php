<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
Route::get('/users', [UserController::class,'list']);
Route::post('/import_user', [UserController::class,'import_user'])->name('import_user');
Route::get('/export_user', [UserController::class,'export_user'])->name('export_user');

Route::get('/export_user_pdf', [UserController::class,'export_user_pdf'])->name('export_user_pdf');

