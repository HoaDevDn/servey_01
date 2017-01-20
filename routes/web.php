<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login1', function () {
    return view('user.login');
});

Auth::routes();

Route::post('/delete-survey', 'User\SurveyController@delete');

Route::get('/home', 'HomeController@index');

Route::get('/redirect/{provider}', 'User\SocialAuthController@redirect');

Route::get('/callback/{provider}', 'User\SocialAuthController@callback');

Route::get('/logout', 'Auth\LoginController@logout');

Route::post('/login', 'Auth\LoginController@login');

Route::get('/home', 'User\SurveyController@getHome');

Route::get('/create', 'User\SurveyController@createSurvey');

Route::get('/answer/{id}', 'User\SurveyController@answerSurvey');

Route::post('radio-answer', 'User\SurveyController@radioAnswer');

Route::post('other-radio', 'User\SurveyController@otherRadio');

Route::post('checkbox-answer', 'User\SurveyController@checkboxAnswer');

Route::post('other-checkbox', 'User\SurveyController@otherCheckbox');

Route::post('radio-question', 'User\SurveyController@radioQuestion');

Route::post('checkbox-question', 'User\SurveyController@checkboxQuestion');

Route::post('short-question', 'User\SurveyController@shortQuestion');

Route::post('long-question', 'User\SurveyController@longQuestion');

Route::post('/create', [
    'as' => 'demo',
    'uses' => 'User\SurveyController@demo',
]);
Route::get('demo', 'User\MailController@sendMail');

Auth::routes();

Route::group(['prefix' => '/', 'middleware' => 'guest'], function () {
    Route::get('/register-user', 'Auth\RegisterController@getRegister');

    Route::post('/register-user', [
        'as' => 'register-user',
        'uses' => 'Auth\RegisterController@register',
    ]);

    Route::get('/login-user', 'Auth\LoginController@getLogin');

    Route::post('login-user', [
        'as' => 'login-user',
        'uses' => 'Auth\LoginController@login',
    ]);

    Route::get('/redirect/{provider}', 'User\SocialAuthController@redirect');

    Route::get('/callback/{provider}', 'User\SocialAuthController@callback');
});

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index');
