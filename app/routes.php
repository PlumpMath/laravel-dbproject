<?php

Route::get('/', function ()
{
    if (Auth::check()) {
        return '';
    } else {
        //urls for the view
        $url = [
            'log_in'        => URL::to('/log/in'),
            'register'      => URL::to('/register'),
        ];

        //data to make available to the view
        $data = [
            'title' => 'Hello! Welcome to myafterschoolprograms.com',
            'url'   => $url,
        ];

        return View::make('defaults.home', $data);
    }
});

Route::post('/log/in', function () {
    $user = [
        'email'      => Input::get('email'),
        'password'  => Input::get('password'),
    ];

    Auth::attempt($user);

    return Redirect::to('/');
});

Route::get('/log/out', function () {
    Auth::logout();

    return Redirect::to('/');
});

Route::get('/register', function () {
    $url = [
        'check_email'   => URL::to('/is_email_unique'),
    ];

    $data = [
        'title' => '',
        'url'   => $url,
    ];

    return View::make('defaults.register', $data);
});

Route::post('/is_email_unique', function () {
    $v = Validator::make(
        array('email' => Input::get('email')),
        array('email' => 'unique:users')
    );

    $b = ($v->passes()) ? 'true' : 'false';

    return $b;
});

Route::post('/locations/search', 'LocationController@search');
Route::post('/locations/affect', 'LocationController@affect');
Route::get('/locations/{id}/copy', 'LocationController@copy');

Route::resource('locations', 'LocationController');
