<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

/**
 * $ curl laravel-spike.dev:8888/authtest
 * $ curl --user firstuser:first_password laravel-spike.dev:8888/authtest
 */
Route::get('/authtest', array('before' => 'apiauth', function()
{
    return View::make('hello');
}));

/**
 * api v1, examples in controller class
 */
Route::group(array('prefix' => 'api/v1'), function() {
    // Route::resource('url', 'UrlController');
    Route::controller('url', 'UrlController');
});
