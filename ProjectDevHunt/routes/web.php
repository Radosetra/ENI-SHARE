<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PublicationTagController;
use App\Http\Controllers\UserSkillController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

// admin
Route::get('/admin', function(){
    return view('admin');
});

// users
Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{user}', [UserController::class, 'update']);
Route::delete('/users/{user}', [UserController::class, 'destroy']);

//Comment
Route::prefix('comments')->group(function () {

    Route::get('/publication/{pub_id}', [CommentController::class, 'index']);
    Route::post('/', [CommentController::class, 'create']);
    Route::put('/{com_id}', [CommentController::class, 'edit']);
    Route::delete('/{com_id}', [CommentController::class, 'delete']);

});


// publication_tag
Route::post('/publication_tags', [PublicationTagController::class, 'store']);
Route::get('/publication_tags/{id}', [PublicationTagController::class, 'show']);
Route::put('/publication_tags/{id}', [PublicationTagController::class, 'update']);
Route::delete('/publication_tags/{id}', [PublicationTagController::class, 'destroy']);

//tags
Route::get('/tags', [TagController::class, 'index'])->name('tags.index');
Route::get('/tags/create', [TagController::class, 'create'])->name('tags.create');
Route::post('/tags', [TagController::class, 'store'])->name('tags.store');
Route::get('/tags/{tag}', [TagController::class, 'show'])->name('tags.show');
Route::get('/tags/{tag}/edit', [TagController::class, 'edit'])->name('tags.edit');
Route::put('/tags/{tag}', [TagController::class, 'update'])->name('tags.update');
Route::delete('/tags/{tag}', [TagController::class, 'destroy'])->name('tags.destroy');

//skill
Route::get('/skills', [SkillController::class, 'index'])->name('skills.index');
Route::get('/skills/{skill}', [SkillController::class, 'show'])->name('skills.show');
Route::get('/skills/create', [SkillController::class, 'create'])->name('skills.create');
Route::post('/skills', [SkillController::class, 'store'])->name('skills.store');
Route::get('/skills/{skill}/edit', [SkillController::class, 'edit'])->name('skills.edit');
Route::put('/skills/{skill}', [SkillController::class, 'update'])->name('skills.update');
Route::delete('/skills/{skill}', [SkillController::class, 'destroy'])->name('skills.destroy');

// //UserSkill
Route::get('/user-skills', [UserSkillController::class, 'index']);
Route::get('/user-skills/{userSkill}', [UserSkillController::class, 'show']);
Route::post('/user-skills', [UserSkillController::class, 'store']);
Route::put('/user-skills/{userSkill}', [UserSkillController::class, 'update']);
Route::delete('/user-skills/{userSkill}', [UserSkillController::class, 'destroy']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
