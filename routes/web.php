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

Route::domain('{sub}.abstract.test')->group(function () {
    /*******************
        * ******* Investor Servicing, Sub Domain
    **************/
    Route::get('/choose-investment', 'SubInvestorServicingController@choose');
    Route::get('/reports', 'SubInvestorServicingController@reports');
    Route::get('/dashboard/investors', 'SubInvestorDashboardController@investor');
    Route::get('/dashboard/bank-account', 'SubInvestorDashboardController@bank');
    Route::get('/dashboard/electronic-consent', 'SubInvestorDashboardController@consent');
    Route::get('/dashboard/password-two-factor', 'SubInvestorDashboardController@password');
});


Route::get('/', function () {
    $hostname = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : $_SERVER['SERVER_NAME'];
    return view('welcome')->with('hostname', explode('.', $hostname, 2)[0]);
});

// Sessions
Route::get('/login', 'SessionController@getLogin')->name('login');
Route::post('/login', 'SessionController@doLogin');
Route::get('/register', 'SessionController@getRegister');
Route::post('/register', 'SessionController@doRegister');
Route::get('/logout', 'SessionController@doLogout');
Route::get('/forget-password', 'SessionController@getForget');
Route::post('/forget-password', 'SessionController@doForget');
Route::get('/reset-password', 'SessionController@getResetPassword');

// Onboarding
Route::get('/welcome', 'WelcomeController@userType');
Route::post('/welcome', 'WelcomeController@setUserType');
Route::get('/welcome/overview', 'WelcomeController@allSet');

// Sponsors
Route::get('/sponsor/welcome', 'SponsorController@welcome');
Route::get('/sponsor/introduction', 'SponsorController@intro');

// Account Settings
// Account Verification
Route::get('/account-settings/verification', 'AccountSettingsController@verification');
Route::post('/account-settings/verification/create', 'AccountSettingsController@createVerification');

// Bio (About the Sponsor)
Route::get('/account-settings/verification/bio', 'AccountSettingsController@bio');
Route::post('/account-settings/verification/bio/create', 'AccountSettingsController@createBio');

// Principles (Meet The Principles, Property Owners, and Fund Managers)

Route::get('/account-settings/verification/principles', 'AccountSettingsController@principles');
Route::post('/account-settings/verification/principles/create', 'AccountSettingsController@createPrinciples');

// References (Professional References)
Route::get('/account-settings/verification/references', 'AccountSettingsController@references');
Route::post('/account-settings/verification/references/create', 'AccountSettingsController@createReferences');

// Diligence (Sponsor Diligence with Ease)

Route::get('/account-settings/verification/diligence', 'AccountSettingsController@diligence');
Route::post('/account-settings/verification/diligence/create', 'AccountSettingsController@createDiligence');

// Preview
Route::get('/account-settings/verification/preview', 'AccountSettingsController@preview');
Route::post('/account-settings/verification/preview/create', 'AccountSettingsController@submitPreview');

Route::get('/account-settings/wallets', 'AccountSettingsController@wallets');
Route::get('/account-settings/privacy', 'AccountSettingsController@privacy');
Route::post('/account-settings/privacy', 'AccountSettingsController@updatePrivacy');
Route::get('/account-settings/password', 'AccountSettingsController@passwordAnd2FA');
Route::post('/account-settings/password', 'AccountSettingsController@updatePassword');

// Get Principles
Route::get('/principles/get', 'AccountSettingsController@getPrinciples');

// Save Data
Route::post('/account-settings/create/{principles?}', 'AccountSettingsController@saveData');

Route::get('/tax-documents/{type?}/{rand?}/{id?}', 'SubInvestorServicingController@tax');

/*******************
    * ******* Security Flow
**************/
//step 1
Route::get('/security-flow/step-1/choose', 'SecurityFlow@choose');
Route::get('/security-flow/step-1/upload-photos', 'SecurityFlow@upload');
Route::get('/security-flow/step-1/details', 'SecurityFlow@details');
Route::get('/security-flow/step-1/highlights', 'SecurityFlow@highlights');
//step 2
Route::get('/security-flow/step-2/ownership', 'SecurityFlow@ownership');
//step 3
Route::get('/security-flow/step-3/diligence', 'SecurityFlow@diligence');
//step 4
Route::get('/security-flow/step-4/key-points', 'SecurityFlow@keyPoints');
//step 5
Route::get('/security-flow/step-5/capital-stack', 'SecurityFlow@capitalStack');
//step 6
Route::get('/security-flow/step-6/meet-sponsors', 'SecurityFlow@meetSponsors');
//step 7
Route::get('/security-flow/step-7/preview', 'SecurityFlow@preview');
Route::get('/security-flow/preview', 'SecurityFlow@final');

// save post data into a session
Route::post('/security-flow/step-1/create/{details?}', 'SecurityFlow@saveData');
Route::post('/security-flow/step-1/create/{highlights?}', 'SecurityFlow@saveData');
Route::post('/security-flow/step-2/create/{ownership?}', 'SecurityFlow@saveData');
Route::post('/security-flow/step-4/create/{keyPoints?}', 'SecurityFlow@saveData');
Route::post('/security-flow/step-5/create/{capitalStack?}', 'SecurityFlow@saveData');
Route::post('/security-flow/step-6/create/{meetSponsors?}', 'SecurityFlow@saveData');
Route::post('/security-flow/step-7/create/preview', 'SecurityFlow@submitPreview');


/*******************
    * ******* Security Fund Flow
**************/
//step 1
Route::get('/security-fund-flow/step-1/choose', 'SecurityFundFlow@choose');
Route::get('/security-fund-flow/step-1/details', 'SecurityFundFlow@details');
Route::get('/security-fund-flow/step-1/details-no', 'SecurityFundFlow@detailsno');
Route::get('/security-fund-flow/step-1/upload-photos', 'SecurityFundFlow@upload');
Route::get('/security-fund-flow/step-1/highlights', 'SecurityFundFlow@highlights');
//step 2
Route::get('/security-fund-flow/step-2/ownership', 'SecurityFundFlow@ownership');
//step 3
Route::get('/security-fund-flow/step-3/diligence', 'SecurityFundFlow@diligence');
//step 4
Route::get('/security-fund-flow/step-4/key-points', 'SecurityFundFlow@keyPoints');
//step 5
Route::get('/security-fund-flow/step-5/capital-stack', 'SecurityFundFlow@capitalStack');
//step 6
Route::get('/security-fund-flow/step-6/meet-sponsors', 'SecurityFundFlow@meetSponsors');
//step 7
Route::get('/security-fund-flow/step-7/preview', 'SecurityFundFlow@preview');
Route::get('/security-fund-flow/preview', 'SecurityFundFlow@final');

// save post data into a session
Route::post('/security-fund-flow/step-1/create/{details?}', 'SecurityFundFlow@saveData');
Route::post('/security-fund-flow/step-1/create/{highlights?}', 'SecurityFundFlow@saveData');
Route::post('/security-fund-flow/step-2/create/{ownership?}', 'SecurityFundFlow@saveData');
Route::post('/security-fund-flow/step-4/create/{keyPoints?}', 'SecurityFundFlow@saveData');
Route::post('/security-fund-flow/step-5/create/{capitalStack?}', 'SecurityFundFlow@saveData');
Route::post('/security-fund-flow/step-6/create/{meetSponsors?}', 'SecurityFundFlow@saveData');
Route::post('/security-fund-flow/step-7/create/preview', 'SecurityFundFlow@submitPreview');

// Property
Route::post('/property/create/new', 'Property@submitPreview');

/*******************
    * ******* Investor Servicing
**************/
Route::get('/investor-servicing/k1', 'InvestorServicingController@k1');
Route::get('/investor-servicing/choose-investment', 'InvestorServicingController@choose');
Route::get('/investor-servicing/cap-table-mgmt/{type?}/{rand?}/{id?}', 'InvestorServicingController@captable');
Route::get('/investor-servicing/reports/{type?}/{rand?}/{id?}', 'InvestorServicingController@reports');
Route::get('/investor-servicing/upload-new-property', 'Property@newProperty');
Route::get('/investor-servicing/tax-document', 'InvestorServicingController@tax');
Route::get('/investor-servicing/reports/dt/{type?}/{rand?}/{id?}', 'InvestorServicingController@dst');
Route::get('/ownership-snapshot/{type?}/{rand?}/{id?}', 'InvestorServicingController@ownershipCap');

Route::post('/reports/create/new', 'InvestorServicingController@reportsCreate');

// Distributions
Route::post('/distributions/create/new', 'Distributions@submitDistributions');
Route::get('/investor-servicing/distributions/{type?}/{rand?}/{id?}', 'Distributions@distributions');
Route::get('/investor-servicing/distributions/preview/{type?}/{rand?}/{id?}', 'Distributions@preview');
Route::post('/distributions/preview/new', 'Distributions@download');

// Tax
Route::get('/investor-servicing/tax-document/{type?}/{rand?}/{id?}', 'InvestorServicingController@tax');
Route::post('/tax/create/new', 'InvestorServicingController@taxCreate');

/*******************
    * ******* Files
**************/

Route::get('/getFiles', 'FilesController@retrieve');
Route::get('/destroy/file', 'FilesController@destroy');
Route::resource('files', 'FilesController', ['only' => ['store']]);

// Diligence
Route::get('/files/diligence/check', 'FilesController@checkDir');
// Test Files
Route::get('/testCap', 'FilesController@readDocFiles');

/*******************
    * ******* Box API
**************/

Route::get('/box/access-token', 'BoxController@generateAccessToken');

// Folders
Route::get('/box/rootfolder', 'BoxController@rootFolder');
Route::get('/box/folder/items/{id?}', 'BoxController@getFolderItems');
Route::post('/box/folder/create', 'BoxController@createFolder');
Route::post('/box/folder/update', 'BoxController@updateFolder');
Route::get('/box/folder/delete/{id?}', 'BoxController@deleteFolder');
Route::get('/box/folder/trash/{id?}', 'BoxController@permanentDeleteFolder');
Route::post('/box/folder/copy', 'BoxController@copyFolder');

// Files
Route::get('/box/file/{id?}', 'BoxController@getFileInfo');
Route::post('/box/file/update', 'BoxController@updateFileInfo');
Route::get('/box/file/download/{id?}', 'BoxController@downloadFile');
Route::resource('/box/file/upload', 'BoxController', ['only' => ['uploadFile']]);
Route::get('/box/file/delete/{id?}', 'BoxController@deleteFile');
Route::post('/box/file/replace', 'BoxController@updateFile');
Route::post('/box/file/copy', 'BoxController@copyFile');
Route::get('/box/file/embed/{id?}', 'BoxController@getEmbedLink');
Route::get('/box/file/thumbnail/{id?}', 'BoxController@getThumbnail');
