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

// This encompasess every single paint and noise url that could be out there pointing towards some dead link right now
$router->get('/{route:.*}', function () use ($router) {
    return view('index');
});
