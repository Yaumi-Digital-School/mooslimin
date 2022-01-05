<?php

use App\Http\Controllers\ForumController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LupaPasswordController;

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

Route::get('/pass', function () {
    return view('pages.mail.reset-password');
})->name('reset.password.index.pass');

Route::get('/lupa-password', function () {
    return view('auth.forgot-password');
})->name('reset.password.index');

Route::post('/reset/password', [LupaPasswordController::class, 'reset'])->name('reset.password.store');
Route::post('/reset/password/done', [LupaPasswordController::class, 'reset_done'])->name('reset.password.store.done');
Route::get('/reset/{email}/edit', [LupaPasswordController::class, 'edit'])->name('reset.password.edit');
Route::post('/reset/update', [LupaPasswordController::class, 'update'])->name('reset.password.update');
Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');

Route::group(['middleware' => ['auth','checkRole:admin,user']], function(){
    // Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/store', [ProfileController::class, 'store'])->name('profile.store');

    // Forum
    Route::post('/forum/store', [ForumController::class, 'store'])->name('forum.store');
    Route::post('/forum/add/comment', [ForumController::class, 'add_comment'])->name('forum.add.comment');
    Route::post('/forum/vote', [ForumController::class, 'forum_vote'])->name('forum.vote');
    Route::post('/forum/vote/comment', [ForumController::class, 'komentar_vote'])->name('komentar.vote');
});




require __DIR__.'/auth.php';
