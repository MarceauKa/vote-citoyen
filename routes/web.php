<?php

// Home et pages statiques
Route::get('/', 'HomeController@index')->name('home');
Route::get('conditions-generales-utilisation', 'HomeController@terms')->name('terms');

// Auth
Auth::routes();

// Page publiques
Route::get('vote/{id}/{name}', 'PollController@show')->name('poll.show');
Route::get('propositions', 'ProposalController@proposals')->name('proposal.all');

// Mon compte
Route::group([
    'as' => 'account.',
    'prefix' => 'compte',
    'middleware' => 'auth',
], function ($router) {
    $router->get('/', 'AccountController@index')->name('home');
    $router->put('/', 'AccountController@update')->name('update');
    $router->put('/mot-de-passe', 'AccountController@password')->name('password');
    $router->put('/email', 'AccountController@email')->name('email');
    $router->get('/supprimer-compte', 'AccountController@delete')->name('delete');
});

// Propositions
Route::group([
    'as' => 'proposal.',
    'prefix' => 'proposition',
    'middleware' => 'auth',
], function ($router) {
    $router->get('creer', 'ProposalController@create')->middleware('auth')->name('create');
    $router->post('creer', 'ProposalController@store')->middleware('auth')->name('store');
});

// Réponses aux votes
Route::group([
    'as' => 'answer.',
    'prefix' => 'voter',
    'middleware' => 'auth',
], function ($router) {
    $router->post('{id}', 'AnswerController@store')->name('store');
});

