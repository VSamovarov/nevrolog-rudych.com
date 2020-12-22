<?php

use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Artisan;
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


Route::get('/', [PostController::class,'slug'])->name('main-page');
// Route::get('/posts', function () {
//   return view('front.pages.index-posts');
// });


// Route::get('/test', TestController::class);


Route::get('/{type}', [PostController::class,'index'])->where('type','news|articles|faq')->name('post.index');
Route::get('/{slug}', [PostController::class,'slug'])->name('slug-page');
Route::get('/{type}/{id}', [PostController::class,'show'])->name('post.show');