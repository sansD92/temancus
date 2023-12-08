<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware(['auth'])->group(function () {
    Route::namespace('App\Http\Controllers')->group(function() {
        Route::resource('discussions', DiscussionsController::class)
        ->only(['create', 'store', 'edit', 'update', 'destroy']);
        Route::post('discussions/{discussion}/like', 'LikeController@discussionLike')
        ->name('discussions.like.like');
        Route::post('discussions/{discussion}/unlike', 'LikeController@discussionUnLike')
        ->name('discussions.like.unlike');
    });
});

Route::namespace('App\Http\Controllers\Auth')->group(function(){
    Route::get('login', 'LoginController@show')->name('login');
    Route::post('login', 'LoginController@login')->name('auth.login');
    Route::post('logout', 'LoginController@logout')->name('auth.logout');
    Route::get('sign-up', 'SignUpController@show')->name('auth.sign-up');
    Route::post('sign-up', 'SignUpController@Sign_up')->name('auth.sign-up.sign-up');
});

Route::namespace('App\Http\Controllers')->group(function(){
    Route::resource('discussions', DiscussionsController::class)
    ->only(['index', 'show']);
    Route::get('discussions/categories/{category}', 'CategoryController@show')
    ->name('discussions.categories.show');

});




// Route::get('discussion/show', function () {
//     return view('pages.disscusion.show');
// })->name('show');

Route::get('answer/1', function () {
    return view('pages.answer.form');
})->name('answer.edit');
Route::get('users/adjiesandy', function () {
    return view('pages.users.show');
})->name('user.show');
Route::get('users/adjiesandy/edit', function () {
    return view('pages.users.form');
})->name('user.edit');
