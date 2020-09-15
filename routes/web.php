<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'RegisterAParticipantController')->name('welcome');
Route::post('/', 'RegisterAParticipantController@registerResults')->name('registerResults');
Route::get('/{level}', 'LevelResultsController')->name('results');
Route::get('/overall', 'RegisterAParticipantController')->name('overall');


