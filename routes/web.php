<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\PendingPostController;
use App\Http\Controllers\PostController;
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

Auth::routes();
Route::get('/' , [PagesController::class , 'index']);

Route::get('/blogs_cat/{id}' , [PagesController::class , 'showPost']);
Route::resource('/blog' , PostController::class);
Route::resource('/pending' , PendingPostController::class)->middleware('checkStatus');