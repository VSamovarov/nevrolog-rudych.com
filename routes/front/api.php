<?php

use App\Http\Controllers\Feedback\FeedbackSubmitController;
use App\Http\Controllers\OembedApiController;
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
Route::post('feedback-form', FeedbackSubmitController::class);
Route::get('oembed', OembedApiController::class);