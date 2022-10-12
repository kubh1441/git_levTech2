<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;//外部にあるPostControllerクラスをインポート
use App\Http\Controllers\CategoryController;

Route::group(['middleware' => ['auth']], function() {
    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::post('/posts', [PostController::class, 'store']);
    Route::get('/posts/create', [PostController::class, 'create']);
    Route::get('/posts/{post}', [PostController::class, 'show']);
    Route::put('/posts/{post}', [PostController::class, 'update']);
    Route::delete('/posts/{post}', [PostController::class,'delete']);
    Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
    Route::get('/categories/{category}', [CategoryController::class,'index']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
