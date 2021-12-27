<?php

use App\Http\Controllers\ForumController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use AlesZatloukal\GoogleSearchApi\GoogleSearchApi;
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
    // $parameters = array(
    //     'start' => 1,// start from the 10th results,
    //     'num' => 10, // number of results to get, 10 is maximum and also default value
    //     'searchType' => 'image', // number of results to get, 10 is maximum and also default value
    // );
    // $api = new GoogleSearchApi();
    // $res = $api->getResults('shalat',$parameters);
    // $info = $api->getRawResult();
    // foreach($res as $r){
    //     echo $r->title;
    //     echo '<br>';
    //     echo '<img src="'.$r->link.'" alt="" srcset="">';
    //     echo '<br>';
    //     // echo $r->pagemap->imageobject->url;
    // }
    // dd($info);
})->name('home');
Route::get('/pass', function () {
    return view('pages.mail.reset-password');
})->name('reset.password.index');

Route::get('/lupa-password', function () {
    return view('auth.forgot-password');
})->name('reset.password.index');
Route::post('/reset/password', [LupaPasswordController::class, 'reset'])->name('reset.password.store');
Route::get('/reset/{email}/update', [LupaPasswordController::class, 'update'])->name('reset.password.update');

Route::group(['middleware' => ['auth','checkRole:admin,user']], function(){
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');

    // Reset Password


    // Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/store', [ProfileController::class, 'store'])->name('profile.store');

    // Forum
    Route::post('/forum/store', [ForumController::class, 'store'])->name('forum.store');
    Route::post('/forum/add/comment', [ForumController::class, 'add_comment'])->name('forum.add.comment');
    Route::post('/forum/vote', [ForumController::class, 'forum_vote'])->name('forum.vote');
    Route::post('/forum/vote/comment', [ForumController::class, 'komentar_vote'])->name('komentar.vote');
});

Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');



require __DIR__.'/auth.php';
