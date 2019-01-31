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

Auth::routes(['verify' => true]);

Route::get('/', function () {
	return view('home');
} );

Route::get('/dashboard', "DashboardController@index")->middleware('auth');

Route::get('/json/frames', 'DashboardController@getFrames');

Route::get('/atom/new', 'AtomController@new')->middleware('verified')->name('newAtom');

Route::get('/atom/edit', 'AtomController@edit')->middleware('verified');

Route::get('/atom/preview/{id}', 'AtomController@preview')->name('preview');
