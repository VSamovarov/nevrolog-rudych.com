<?php

use App\Http\Controllers\Feedback\FeedbackAdminApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/feedback/{id}', '\App\Http\Controllers\Feedback\FeedbackAdminApiController@show')->name('feedback.show');


/**
 * Ошибка .если неправильный роутер
 * Должен быть в конце
 */
Route::fallback(function () {
    return response()->json([
        'message' => 'Page Not Found. If error persists, contact info@website.com'
    ], 404);
});