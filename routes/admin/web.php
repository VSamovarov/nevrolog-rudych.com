<?php

use App\Entity\Feedback\Feedback;
use App\Http\Controllers\Feedback\FeedbackAdminController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
