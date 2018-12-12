<?php

// Home et pages publiques
Route::get('/', 'HomeController@index')->name('home');
Route::get('conditions-generales-utilisation', 'HomeController@terms')->name('terms');

// Auth
Auth::routes();

// Sondages
Route::get('archives', 'PollController@archives')->name('poll.archives');
Route::get('propositions', 'PollController@proposals')->name('poll.proposals');
Route::get('sondage/{id}/{name}', 'PollController@show')->name('poll.show');
Route::get('proposition/{id}/{name}', 'PollController@proposal')->name('proposal.show');

// Mon compte
Route::group([
    'as' => 'account.',
    'prefix' => 'compte',
    'middleware' => 'auth',
], function ($router) {
    $router->get('/', 'AccountController@index')->name('home');
});

// Réponses aux sondages
Route::group([
    'as' => 'answer.',
    'prefix' => 'reponse',
    'middleware' => 'auth',
], function ($router) {
    $router->post('{id}', 'AnswerController@store')->name('store');
});

