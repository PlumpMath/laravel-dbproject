<?php

Route::get('/', function ()
{
    //urls for the view
    $url = [
        'log_in'    => URL::to('/log/in'),
        'register'  => URL::to('/register'), 
    ];

    //data to make available to the view
    $data = [
        'title' => 'Hello! Welcome to myafterschoolprograms.com',
        'url'   => $url,
    ];

    return View::make('defaults.home', $data);
});

Route::post('/log/in', function () {
    $user = [
        'email'      => Input::get('email'),
        'password'  => Input::get('password'),
    ];

    if (Auth::attempt($user)) {
        //authenticated
        return 'success';
    } else {
        //failed
        return 'failure';
    }
});

Route::get('/register', function () {
    $url = [

    ];

    $data = [
        'title' => '',
        'url'   => $url,
    ];

    return View::make('defaults.register', $data);
});

Route::post('/locations/search', 'LocationController@search');
Route::post('/locations/affect', 'LocationController@affect');
Route::get('/locations/{id}/copy', 'LocationController@copy');

Route::resource('locations', 'LocationController');
