<?php

use App\Http\Controllers\Feedback\FeedbackAdminApiController;
use App\Http\Controllers\Post\PostApiAdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Common\Api\UploadTmpFilesController;
use App\Http\Controllers\Post\AddImageToContentPostApiAdminController;

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

Route::get('/feedback/{id}', [FeedbackAdminApiController::class, 'show'])->name('feedback.show');

Route::patch('/feedback/{id}/viewed-status', [FeedbackAdminApiController::class, 'viewedStatus'])->name('feedback.viewed-status');
Route::delete('/feedback/{id}/delete', [FeedbackAdminApiController::class, 'destroy'])->name('feedback.destroy');
Route::patch('/feedback/{id}/restore', [FeedbackAdminApiController::class, 'restore'])->name('feedback.restore');


Route::get('/post', [PostApiAdminController::class,'index'])->middleware(['localizer-api'])->name('post.index');

Route::delete('/post/{id}/delete', [PostApiAdminController::class, 'destroy'])->name('post.destroy');

Route::patch('/post/{id}/restore', [PostApiAdminController::class, 'restore'])->name('post.restore');


Route::post('/files/upload', UploadTmpFilesController::class)->name('tmp-files-upload');
Route::post('/post/{id}/add-image', AddImageToContentPostApiAdminController::class)->name('post.add-image');

/**
 * Ошибка, если неправильный роутер
 * Должен быть в конце
 */
Route::fallback(function () {
  return response()->json([
    'message' => 'Page Not Found. If error persists, contact info@website.com'
  ], 404);
});
