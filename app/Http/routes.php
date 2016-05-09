<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/api/register', 'TokenAuthController@register');
Route::post('/api/authenticate', 'TokenAuthController@authenticate');
Route::get('/api/authenticate/user', 'TokenAuthController@getAuthenticatedUser');

Route::get('/users', 'UserController@getAllUsers');
Route::get('/users/{id}', 'UserController@getUser');
Route::post('/users', 'UserController@createUser');
Route::put('/users/{id}', 'UserController@updateUser');
Route::delete('/users/{id}', 'UserController@deleteUser');

Route::get('/scores', 'ScoreController@getAllScores');
Route::get('/scores/{id}', 'ScoreController@getScore');
Route::post('/scores', 'ScoreController@createScore');
Route::put('/scores/{userid}', 'ScoreController@updateScore');
Route::delete('/scores/{userid}', 'ScoreController@deleteScore');

Route::get('/invites', 'InviteController@getAllInvites');
Route::get('/invites/{id}', 'InviteController@getInvite');
Route::post('/invites', 'InviteController@createInvite');
Route::put('/invites/{id}', 'InviteController@updateInvite');
Route::delete('/invites/{id}', 'InviteController@deleteInvite');

Route::get('/invitedPlayers', 'InvitedPlayerController@getAllInvitedPlayers');
Route::get('/invitedPlayers/{id}', 'InvitedPlayerController@getInvitedPlayer');
Route::get('/invitedPlayers/uid/{userid}', 'InvitedPlayerController@getInvitedPlayerByUserId');
Route::post('/invitedPlayers', 'InvitedPlayerController@createInvitedPlayer');
Route::put('/invitedPlayers/{id}/{userid}', 'InvitedPlayerController@updateInvitedPlayer');
Route::delete('/invitedPlayers/{id}/{userid}', 'InvitedPlayerController@deleteInvitedPlayer');
