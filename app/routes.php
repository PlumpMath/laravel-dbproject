<?php

Route::get('/', function ()
{
    if (Auth::check()) {
        $url = [
            'log_out'           => URL::to('/log/out'),
        ];

        $resources = [
            [
                'name'  => 'Locations',
                'url'   => [
                    'index'     => action('LocationController@index'),
                    'search'    => '#',
                    'create'    => action('LocationController@create'),
                ],
            ],
        ];

        $data = [
            'title'     => 'Welcome, '.Auth::user()->first_name.' '.Auth::user()->last_name.'!',
            'url'       => $url,
            'resources' => $resources,
        ];

        return View::make('defaults.home.signed_in', $data);
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

        return View::make('defaults.home.not_signed_in', $data);
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
        'title' => 'Registering -- myafterschoolprograms.com',
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

Route::post('/check_js', function () {
    $v = Validator::make(
        array('js' => Input::get('js')),
        array('js' => 'in:true,false')
    );

    if ($v->passes()) Session::put('js', Input::get('js'));
});

Route::post('/locations/search', 'LocationController@search');
Route::post('/locations/affect', 'LocationController@affect');
Route::get('/locations/{id}/copy', 'LocationController@copy');

Route::resource('locations', 'LocationController');
Route::resource('resources', 'ResourceController');
