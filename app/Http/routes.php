<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});

Route::auth();

Route::get('/vacancy', ['as'=>'vacancy', 'uses'=>'VacancyController@index']);
Route::post('/vacancy', ['as'=>'vacancy', 'uses'=>'VacancyController@store']);
Route::delete('/vacancy/{vacancy}', ['as'=>'vacancy', 'uses'=>'VacancyController@destroy']);
Route::get('/vacancy/show/{vacancy}', ['as'=>'vacancy', 'uses'=>'VacancyController@show']);
Route::get('/vacancy/approve/{vacancy}', ['as'=>'vacancy', 'uses'=>'VacancyController@approve']);
Route::get('/vacancy/delete/{vacancy}', ['as'=>'vacancy', 'uses'=>'VacancyController@delete']);

Route::get('/resume', ['as'=>'resume', 'uses'=>'ResumeController@index']);
Route::post('/resume', ['as'=>'resume', 'uses'=>'ResumeController@store']);
Route::delete('/resume/{resume}', ['as'=>'resume', 'uses'=>'ResumeController@destroy']);
Route::get('/resume/show/{resume}', ['as'=>'resume', 'uses'=>'ResumeController@show']);