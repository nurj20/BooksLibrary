<?php

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
    return view('home');
});

Route::get('/catalog', 'BookController@index');
Route::get('/reserve/{book}', 'BooksReservedController@create'); // book being reserved
Route::get('/reserved/{user}', 'BooksReservedController@index');// shows all books reserved by user
Route::get('/borrowed/{user}', 'BooksBorrowedController@index');// shows books borrowed by user
Route::patch('/reserve/{book}', 'BooksReservedController@update');//status change from reser to borrow

Route::patch('/borrowed/{user}', 'BookController@update'); // update return date
Route::get('/charges/{user}', function(){
        return view('user.penality');
});
Route::get('/search', 'BookController@search');
Auth::routes();

