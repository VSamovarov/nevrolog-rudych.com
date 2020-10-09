<?php

use App\Entity\Feedback\Feedback;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
});


Route::get('/feedback', function () {
    $data = Feedback::paginate();
    return Inertia::render(
        'Feedback/Index',
        ['items' => $data]
    );
})->name('feedback.index');


Route::get('/test', function () {
    return Inertia::render('Test', ['data' => ['1']]);
})->name('test');