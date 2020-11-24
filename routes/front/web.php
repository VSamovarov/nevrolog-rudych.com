<?php

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


Route::get('/', function () {
  return view('front.pages.main');
});
Route::get('/posts', function () {
  return view('front.pages.index-posts');
});


// Route::get('/test', TestController::class);
Route::get('/test', function () {
  return view('front.pages.coming-soon');
});
// Route::get('/linkstorage', function () {
//     $targetFolder = storage_path("app/public");
//     $linkFolder = $_SERVER['DOCUMENT_ROOT'] . '/storage';
//     symlink($targetFolder, $linkFolder);
// });