<?php

use App\Http\Controllers\Feedback\FeedbackAdminController;
use App\Http\Controllers\Post\PostAdminController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// });

Route::get('/', [FeedbackAdminController::class, 'index'])->name('home');
Route::resource('/feedback', FeedbackAdminController::class)->except('destroy');
Route::post('/feedback/mass-actions', [FeedbackAdminController::class, 'massActions'])->name('feedback.mass-actions');

Route::resource('/post', PostAdminController::class)->except(['destroy', 'edit', 'show'])->middleware(['check-type-post']);
Route::get('/post/{id}/edit', [PostAdminController::class, 'edit'])->name('post.edit');