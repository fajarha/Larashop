<?php

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

//menjadikan halaman awal homepage
Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//menghapus registrasi dan menghalikan ke halaman login
Route::match(["GET", "POST"], "/register", function () {
    return redirect("/login");
})->name("register");

//menghubungkan controller user resource ke dunia luar
Route::resource("users", "UserController");

//menghubungkan controller category resource ke dunia luar
//pembuatan route yang diluar dari function yang telah tersedia "resource"
//harus sebelum dari route resource
Route::get('/ajax/categories/search', 'CategoryController@ajaxSearch');
Route::delete('/Categories/{category}/delete-permanent', 'CategoryController@deletePermanent')->name('categories.delete-permanent');
Route::get('/categories/{id}/restore', 'CategoryController@restore')->name('categories.restore');
Route::get('/categories/trash', 'CategoryController@trash')->name('categories.trash');
Route::resource('categories', 'CategoryController');

//route ke book
Route::resource('books', 'BookController');
