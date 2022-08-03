<?php

use App\Http\Controllers\IndexController;
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

Route::get('/', [IndexController::class,'index']);
Route::get('tour/{slug_category}/{slug_country}', [IndexController::class,'country'])->name('country');
Route::get('du-lich/{slug_country}/{slug_tour}', [IndexController::class,'tour'])->name('tour');
Route::post('older',[IndexController::class,'older'])->name('older');
Route::get('loc-tour', [IndexController::class,'loc'])->name('loc');