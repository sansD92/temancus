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

Route::get('login', function () {
    return view('pages.auth.login');
})->name('login');

Route::get('sign-up', function () {
    return view('pages.auth.sign-up');
})->name('sign-up');

Route::get('disscusion', function () {
    return view('pages.disscusion.index');
})->name('disscusion');
Route::get('disscusion/show', function () {
    return view('pages.disscusion.show');
})->name('show');
Route::get('disscusion/create', function () {
    return view('pages.disscusion.form');
})->name('disscusion.create');
Route::get('answer/1', function () {
    return view('pages.answer.form');
})->name('answer.edit');
Route::get('users/adjiesandy', function () {
    return view('pages.users.show');
})->name('user.show');
Route::get('users/adjiesandy/edit', function () {
    return view('pages.users.form');
})->name('user.edit');
