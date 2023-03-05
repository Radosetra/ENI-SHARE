<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\VoteController;

//publication
Route::get('/publications', [PublicationController::class, 'index']);
Route::post('/publications', [PublicationController::class, 'store']);
Route::get('/publications/{id}', [PublicationController::class, 'show']);
Route::put('/publications/{id}', [PublicationController::class, 'update']);
Route::delete('/publications/{id}', [PublicationController::class, 'destroy']);
Route::post('/publications/search', [PublicationController::class, 'search']);

// //Comment
Route::get('/publications/{pub_id}/comments', [CommentController::class, 'index'])->name('publications.comments');
Route::post('/comments', [CommentController::class, 'store']);
Route::put('/comments/{com_id}', [CommentController::class, 'edit'])->middleware('auth:api');
Route::delete('/comments/{com_id}', [CommentController::class, 'delete'])->middleware('auth:api');

// //Vote
Route::get('/posts/{postId}/votes', 'App\Http\Controllers\VoteController@index');
Route::post('votes', [VoteController::class, 'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
