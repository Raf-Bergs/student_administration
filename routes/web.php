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
//multiline

//Route::get('/', function () {
//    return view('home');
//});

//single line notation
Route::view('/','home');
Route::get('course','CourseController@index');
Route::get('course/{id}','CourseController@show')->middleware(['auth']);
Route::view('test','test.test');


Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index')->name('home');
