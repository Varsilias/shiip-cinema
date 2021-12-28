<?php

use Illuminate\Support\Facades\Auth;
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
});

Route::get('/test','MovieController@index');


//cinema
Route::group(['middleware' => 'auth'],function(){

    Route::group(['prefix' => 'cinema'],function(){
        Route::get('/','CinemaController@index')->name('cinema');
        Route::get('/create','CinemaController@showCreateCinema')->name('cinema.create');
        Route::post('/create','CinemaController@createCinema');
        Route::get('/edit/{id}','CinemaController@showEditCinema')->name('cinema.edit');
        Route::post('/edit/{id}','CinemaController@updateCinema');
        Route::get('/delete/{id}','CinemaController@deleteCinema')->name('cinema.delete');
    });


    //show
    Route::group(['prefix' => 'show'],function(){
        Route::get('/','CinemaController@showIndex')->name('show');
        Route::get('/create','CinemaController@showAddShow')->name('cinema.show');
        Route::post('/create','CinemaController@addShow');
        Route::get('/edit/{id}/{my}','CinemaController@showEditShow')->name('show.edit');
        Route::post('/edit/{id}/{my}','CinemaController@updateShow');
        Route::get('/delete/{id}/{my}','CinemaController@deleteShow')->name('show.delete');
    });


    //movie
    Route::group(['prefix' => 'movie'],function(){
        Route::get('/','MovieController@index')->name('movie');
        Route::get('/create','MovieController@showCreateMovie')->name('create.movie');
        Route::post('/create','MovieController@createMovie');
        Route::get('/edit/{id}','MovieController@showEditMovie')->name('movie.edit');
        Route::post('/edit/{id}','MovieController@updateMovie')->name('movie.update');
        Route::get('/delete/{id}','MovieController@deleteMovie')->name('movie.delete');
    });


});

Auth::routes();

Route::get('/home', 'CinemaController@showIndex')->name('home');
