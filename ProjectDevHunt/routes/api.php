<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\VoteController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// web.php

//Publication
// Route::get('/publications', 'PublicationController@index');
// Route::post('/publications', 'PublicationController@store');
// Route::get('/publications/{id}', 'PublicationController@show');
// Route::delete('/publications/{id}', 'PublicationController@destroy');
Route::put('/publications/{id}', [PublicationController::class, 'store']);
Route::resource('publications', PublicationController::class);

//Comment
// Route::get('/publications/{id}/comments', 'CommentController@index');
// Route::post('/comments', 'CommentController@store');
Route::get('/publications/{pub_id}/comments', [CommentController::class, 'index'])->name('publications.comments');
Route::post('/comments', [CommentController::class, 'create']);
Route::put('/comments/{com_id}', [CommentController::class, 'edit'])->middleware('auth:api');
Route::delete('/comments/{com_id}', [CommentController::class, 'delete'])->middleware('auth:api');



//Vote
Route::get('/votes/{post_id}', [VoteController::class, 'index']);
Route::post('/votes', [VoteController::class, 'store']);




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
