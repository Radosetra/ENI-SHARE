<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
// Route::put('/publications/{id}', 'PublicationController@update');
// Route::delete('/publications/{id}', 'PublicationController@destroy');
Route::resource('publications', 'App\Http\Controllers\PublicationController');

//Comment
// Route::get('/publications/{id}/comments', 'CommentController@index');
// Route::post('/comments', 'CommentController@store');
Route::resource('comments', 'App\Http\Controllers\CommentController');


//Vote
Route::post('/votes', 'App\Http\Controllers\VoteController@vote');
Route::get('/votes/{post_id}', 'App\Http\Controllers\VoteController@getVotes');




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
