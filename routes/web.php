<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// Logo
$router->get('/asset/logo', [
    'as' => 'logo',
    'uses' => 'AssetController@logo',
]);

// Favicon
$router->get('/asset/favicon', [
    'as' => 'favicon',
    'uses' => 'AssetController@favicon',
]);

// Team Pics
$router->get('/asset/team/{name}', [
    'as' => 'team',
    'uses' => 'AssetController@team',
]);

// Social Icons
$router->get('/asset/social/{icon}', [
    'as' => 'social',
    'uses' => 'AssetController@social',
]);

// This encompasess every single paint and noise url that could be out there pointing towards some dead link right now
$router->get('/{route:.*}', function () use ($router) {
    return view('index');
});
