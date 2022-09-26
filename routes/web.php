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

Route::get('/czczczxc', [IndexController::class,'index']);
Route::get('tour/{slug_category}/{slug_country}', [IndexController::class,'country'])->name('country');
Route::get('du-lich/{slug_country}/{slug_tour}', [IndexController::class,'tour'])->name('tour');
Route::post('older',[IndexController::class,'older'])->name('older');
Route::get('loc-tour', [IndexController::class,'loc'])->name('loc');
Route::get('cam-nang-du-lich',[IndexController::class,'blogs'])->name('blogs');
Route::get('cam-nang-du-lich/{slug_blog}',[IndexController::class,'blog'])->name('blog');
Route::post('honeymoon',[IndexController::class,'honeymoon'])->name('honeymoon');
Route::get('lien-he',[IndexController::class,'contact'])->name('contact');
Route::post('postcontact',[IndexController::class,'postcontact'])->name('postcontact');
Route::post('comment-blog',[IndexController::class,'comment_blog'])->name('comment_blog');
Route::post('comment-comment',[IndexController::class,'comment_comment'])->name('comment_comment');