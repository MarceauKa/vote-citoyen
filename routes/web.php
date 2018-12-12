<?php

Route::get('/', 'HomeController@index')->name('home');

Route::group([
    'as' => 'account.',
    'prefix' => 'compte',
    'middleware' => 'auth',
], function ($router) {
    $router->get('/', 'AccountController@index')->name('home');
});

Route::group([
    'as' => 'poll.',
    'prefix' => 'sondage',
], function ($router) {
    $router->get('/', 'PollController@index')->name('home');
});

Route::group([
    'as' => 'answer.',
    'prefix' => 'reponse',
    'middleware' => 'auth',
], function ($router) {
    $router::get('/', 'AnswerController@index')->name('home');
});

Auth::routes();
