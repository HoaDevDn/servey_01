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

Route::get('/login-page', function () {
    return view('user.login');
});

Auth::routes();

Route::group(['prefix' => '/', 'middleware' => 'guest'], function () {

    Route::get('/register', 'Auth\RegisterController@getRegister');

    Route::post('/register', [
        'as' => 'register-user',
        'uses' => 'Auth\RegisterController@register',
    ]);

    Route::get('/login', 'Auth\LoginController@getLogin');

    Route::post('login', [
        'as' => 'login-user',
        'uses' => 'Auth\LoginController@login',
    ]);

    Route::get('/redirect/{provider}', 'User\SocialAuthController@redirect');

    Route::get('/callback/{provider}', 'User\SocialAuthController@callback');
});

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => '/admin', 'middleware' => 'admin'], function () {
    Route::resource('/survey/', 'Admin\SurveyController', ['only' => ['index']]);

    Route::post('/destroy-survey', 'Admin\SurveyController@destroySurvey');

    Route::post('/survey-update-feature', 'Admin\SurveyController@updateFeature');

    Route::post('/survey-change-feature', 'Admin\SurveyController@changeFeature');

    Route::resource('user', 'Admin\UserController', ['only' => ['index', 'update', 'show']]);

    Route::post('/block-user', 'Admin\UserController@blockUser');

    Route::post('/active-user', 'Admin\UserController@activeUser');
});

Route::group(['prefix' => 'survey', 'middleware' => 'auth'], function () {

    Route::post('/delete-survey', 'User\SurveyController@delete');

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
        'as' => 'create',
        'uses' => 'User\SurveyController@create',
    ]);
    Route::post('/invite-user', 'User\MailController@sendMail');

    Route::get('/invite-user', 'User\MailController@index');

    Route::post('/result', 'User\SurveyController@result');
});
