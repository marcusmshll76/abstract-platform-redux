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


/*******************
    * ******* Security Flow
**************/
//step 1
Route::get('/security-flow/step-1/choose', 'SecurityFlow@choose');
Route::get('/security-flow/step-1/upload-photos', 'SecurityFlow@upload');
Route::get('/security-flow/step-1/details', 'SecurityFlow@details');
Route::get('/security-flow/step-1/highlights', 'SecurityFlow@highlights');

Route::post('/security-flow/step-1/create/{details?}', 'SecurityFlow@saveData');
Route::post('/security-flow/step-1/create/{highlights?}', 'SecurityFlow@saveData');
//step 2
Route::get('/security-flow/step-2/ownership', 'SecurityFlow@ownership');
Route::post('/security-flow/step-2/create/{ownership?}', 'SecurityFlow@saveData');
//step 3
Route::get('/security-flow/step-3/diligence', 'SecurityFlow@diligence');
//step 4
Route::get('/security-flow/step-4/key-points', 'SecurityFlow@keyPoints');



// Route::post('/account-settings/verification/create', 'AccountSettingsController@createVerification');

Route::get('/account-settings/wallets', 'AccountSettingsController@wallets');
Route::get('/account-settings/privacy', 'AccountSettingsController@privacy');
Route::post('/account-settings/privacy', 'AccountSettingsController@updatePrivacy');
Route::get('/account-settings/password', 'AccountSettingsController@passwordAnd2FA');
Route::post('/account-settings/password', 'AccountSettingsController@updatePassword');