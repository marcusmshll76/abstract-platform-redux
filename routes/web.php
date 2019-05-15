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
Route::post('/login', 'SessionController@doLogin');
Route::get('/register', 'SessionController@getRegister');
Route::post('/register', 'SessionController@doRegister');
Route::get('/logout', 'SessionController@doLogout');

// Onboarding
Route::get('/welcome', 'WelcomeController@userType');
Route::post('/welcome', 'WelcomeController@setUserType');
Route::get('/welcome/overview', 'WelcomeController@allSet');

// Sponsors
Route::get('/sponsor/welcome', 'SponsorController@welcome');

// Investor Servicing
Route::get('/investor-servicing/k1', 'InvestorServicingController@k1');

// Account Settings
/*******************
    * ******* Account Verification
**************/
Route::get('/account-settings/verification', 'AccountSettingsController@verification');
Route::post('/account-settings/verification/create', 'AccountSettingsController@createVerification');

/*******************
    * ******* Bio (About the Sponsor)
**************/
Route::get('/account-settings/verification/bio', 'AccountSettingsController@bio');
Route::post('/account-settings/verification/bio/create', 'AccountSettingsController@createBio');

/*******************
    * ******* Principles (Meet The Principles, Property Owners, and Fund Managers)
**************/
Route::get('/account-settings/verification/principles', 'AccountSettingsController@principles');
Route::post('/account-settings/verification/principles/create', 'AccountSettingsController@createPrinciples');

/*******************
     * ******* References (Professional References)
     **************/
Route::get('/account-settings/verification/references', 'AccountSettingsController@references');
Route::post('/account-settings/verification/references/create', 'AccountSettingsController@createReferences');

/*******************
     * ******* Diligence (Sponsor Diligence with Ease)
     **************/
Route::get('/account-settings/verification/diligence', 'AccountSettingsController@diligence');
Route::post('/account-settings/verification/diligence/create', 'AccountSettingsController@createDiligence');

/*******************
     * ******* Preview
     **************/
Route::get('/account-settings/verification/preview', 'AccountSettingsController@preview');
Route::post('/account-settings/verification/preview/create', 'AccountSettingsController@submitPreview');

Route::get('/account-settings/wallets', 'AccountSettingsController@wallets');
Route::get('/account-settings/privacy', 'AccountSettingsController@privacy');
Route::post('/account-settings/privacy', 'AccountSettingsController@updatePrivacy');
Route::get('/account-settings/password', 'AccountSettingsController@passwordAnd2FA');
Route::post('/account-settings/password', 'AccountSettingsController@updatePassword');