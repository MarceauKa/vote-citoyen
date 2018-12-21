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
    'middleware' => 'auth',
], function ($router) {
    $router->get('proposition/creer', 'ProposalController@create')->name('proposal.create');
    $router->post('proposition/creer', 'ProposalController@store')->name('proposal.store');

    $router->post('soutenir/{id}', 'SupportController@store')->name('support.store');
    $router->post('voter/{id}', 'AnswerController@store')->name('answer.store');
});

// Admin
Route::group([
    'namespace' => 'Admin',
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['auth', 'can:access-admin'],
], function ($router) {
    $router->get('users', 'UsersController@index')->name('users');

    $router->get('polls', 'PollsController@index')->name('polls');
    $router->get('polls/{id}', 'PollsController@edit')->name('polls.edit');
    $router->post('polls/{id}', 'PollsController@update')->name('polls.update');
    $router->get('polls/{id}/clear-supports', 'PollsController@clearSupports')->name('polls.clear-supports');
    $router->get('polls/{id}/clear-answers', 'PollsController@clearAnswers')->name('polls.clear-answers');
    $router->get('polls/{id}/delete', 'PollsController@delete')->name('polls.delete');

});


