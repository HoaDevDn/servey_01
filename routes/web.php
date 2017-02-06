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

    Route::get('/register', 'User\SurveyController@register');

    Route::post('/register', [
        'as' => 'register-user',
        'uses' => 'Auth\RegisterController@register',
    ]);

    Route::get('/login', 'SurveyController@getHome');

    Route::post('/login', [
        'as' => 'login-user',
        'uses' => 'Auth\LoginController@login',
    ]);

    Route::get('/redirect/{provider}', 'User\SocialAuthController@redirect');

    Route::get('/callback/{provider}', 'User\SocialAuthController@callback');
});

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'SurveyController@getHome');

Route::group(['prefix' => '/supper-admin', 'middleware' => 'supperadmin'], function () {
    Route::resource('/request', 'Admin\RequestController', [
        'only' => [
            'index',
        ],
    ]);
    Route::post('/request/update/{id}', 'Admin\RequestController@update');

    Route::post('/request/delete', 'Admin\RequestController@destroy');
});

Route::group(['prefix' => '/admin', 'middleware' => 'admin'], function () {

    Route::resource('/dashboard', 'Admin\DashboardController', [
        'only' => ['index']
    ]);

    Route::resource('/survey', 'Admin\SurveyController', [
        'only' => ['index', 'update']
    ]);

    Route::post('/destroy-survey', 'Admin\SurveyController@destroySurvey');

    Route::resource('/user', 'Admin\UserController', [
        'only' => ['index', 'update', 'show']
    ]);

    Route::post('/change-status-user/{status}', 'Admin\UserController@changeStatus');

    Route::get('/search', 'Admin\UserController@search');

    Route::resource('/request', 'Admin\RequestController', ['only' => 'store']);

    // Route::get('/request/destroy/{id?}', 'Admin\RequestController@destroy');

    Route::post('/request/cancel', 'Admin\RequestController@cancel');
});

Route::group(['prefix' => '/survey', 'middleware' => 'auth'], function () {

    Route::get('/invite/send', 'SurveyController@inviteUser');

    Route::get('/invite/{token}', [
        'as' => 'invite',
        'uses' => 'SurveyController@answer',
    ]);

    Route::post('/delete-survey', 'SurveyController@delete');

    Route::post('/mark-survey', 'User\LikeController@markLike');

    Route::get('/list-invited', 'SurveyController@getInviteSurvey');

    Route::get('/create', 'SurveyController@createSurvey');

    Route::post('radio-answer', 'SurveyController@radioAnswer');

    Route::post('other-radio', 'SurveyController@otherRadio');

    Route::post('checkbox-answer', 'SurveyController@checkboxAnswer');

    Route::post('other-checkbox', 'SurveyController@otherCheckbox');

    Route::post('radio-question', 'SurveyController@radioQuestion');

    Route::post('checkbox-question', 'SurveyController@checkboxQuestion');

    Route::post('short-question', 'SurveyController@shortQuestion');

    Route::post('long-question', 'SurveyController@longQuestion');

    Route::post('/create', [
        'as' => 'create',
        'uses' => 'SurveyController@create',
    ]);

    Route::post('/invite-user', 'SurveyController@inviteUser');

    Route::get('/survey-private', 'SurveyController@listSurveyUser');

    Route::get('/user/detail', 'User\UserController@show');

    Route::post('/user/update', 'User\UserController@update');
});

Route::post('/text-other', 'SurveyController@textOther');

Route::post('/text-popup', 'SurveyController@getPopup');

Route::post('/survey/result/{token}', 'User\ResultController@result');

Route::resource('/survey/answer', 'SurveyController', [
    'only' => ['show']
]);

Route::get('/chart-result/{token}', 'SurveyController@viewChart');

Route::get('/view/chart/{token}', 'SurveyController@viewChart');

Route::get('autocomplete', 'SurveyController@autocomplete');

Route::post('search', 'SurveyController@search');
