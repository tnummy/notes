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

Route::get('/', function () {
    return view('welcome')->with('navVisibility', 0);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/notes/create', 'NoteController@create')->name('createNote');
Route::post('/notes/store', 'NoteController@store')->name('storeNote');
Route::get('/notes/edit/{id}', 'NoteController@edit')->name('editNote');
Route::post('/notes/update', 'NoteController@update')->name('updateNote');
Route::post('/notes/delete', 'NoteController@delete')->name('deleteNote');

Route::get('/asteroids', function () {
    return view('fun/asteroids');
})->name('asteroids');