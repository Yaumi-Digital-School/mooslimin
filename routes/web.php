<?php

use App\Http\Controllers\ForumController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
})->name('home');

Route::group(['middleware' => ['auth','checkRole:admin,user']], function(){
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/store', [ProfileController::class, 'store'])->name('profile.store');

    Route::post('/forum/store', [ForumController::class, 'store'])->name('forum.store');
    Route::post('/forum/add/comment', [ForumController::class, 'add_comment'])->name('forum.add.comment');
    Route::post('/forum/vote', [ForumController::class, 'forum_vote'])->name('forum.vote');
    Route::post('/forum/vote/comment', [ForumController::class, 'komentar_vote'])->name('komentar.vote');
});

Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');



require __DIR__.'/auth.php';
