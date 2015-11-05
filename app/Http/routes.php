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

get('/sites', [ 'as' => 'sites.index', 'uses' => 'SiteController@index', ]);
post('/sites', [ 'as' => 'sites.store', 'uses' => 'SiteController@store', ]);
get('/sites/create', [ 'as' => 'sites.create', 'uses' => 'SiteController@create', ]);
put('/sites/{id}', [ 'as' => 'sites.update', 'uses' => 'SiteController@update', ]);
get('/sites/{id}/edit', [ 'as' => 'sites.edit', 'uses' => 'SiteController@edit', ]);
