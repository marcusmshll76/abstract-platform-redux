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
    return view('welcome');
});

// Sessions
Route::get('/login', 'SessionController@getLogin');
Route::get('/register', 'SessionController@getRegister');
Route::post('/register', 'SessionController@doRegister');

// Onboarding
Route::get('/welcome', 'WelcomeController@userType');
Route::post('/welcome', 'WelcomeController@setUserType');
Route::get('/welcome/overview', 'WelcomeController@allSet');

// Sponsors
Route::get('/sponsor/welcome', 'SponsorController@welcome');