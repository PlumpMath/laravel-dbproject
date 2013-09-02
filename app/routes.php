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
            [
                'name'  => 'Users',
                'url'   => [
                    'index'     => action('UserController@index'),
                    'search'    => '#',
                    'create'    => action('UserController@create'),
                ],
            ],
            [
                'name'  => 'Late Sign Ups',
                'url'   => [
                    'index'     => action('LateSignUpController@index'),
                    'search'    => '#',
                    'create'    => action('LateSignUpController@create'),
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

    if (Auth::attempt($user)) {
        return Redirect::intended('/');
    } else {
        return Redirect::to('/');
    }

    /*
    if (Auth::attempt($user)) {
        $ip = $_SERVER['REMOTE_ADDR'];

        if (filter_var($ip, FILTER_VALIDATE_IP)) {
            $geo_info = file_get_contents('http://ipinfo.io/'.$ip);
            $location = $geo_info['hostname'];

            Auth::user()->last_logged_in_from = $ip;
            Auth::user()->last_logged_in_at = $location;
            Auth::user()->save();
        }
    }
    */
});

Route::get('/log/out', function () {
    Auth::logout();

    return Redirect::to('/');
});

Route::get('/register', function () {
    $url = [
        'check_email'   => URL::to('/is_email_unique'),
        'verify'        => URL::to('/verify'),
    ];

    $data = [
        'title' => 'Registering -- myafterschoolprograms.com',
        'url'   => $url,
    ];

    return View::make('defaults.register', $data);
});

Route::post('/verify', function () {
    $name       = explode(' ', Input::get('name'), 2);
    $first_name = $name[0];
    $last_name  = $name[1];

    $data = [
        'first_name'    => $first_name,
        'last_name'     => $last_name,
        'email'         => Input::get('email'),
        'phone'         => Input::get('phone'),
        'password'      => Input::get('password'),
        'address'       => Input::get('address'),
        'city'          => Input::get('city'),
        'state'         => Input::get('state'),
        'zip_code'      => Input::get('zip_code'),
        'status'        => 2,
        'remember'      => 0,
    ];
        
    $user = new User;

    if ($user->validate($data)) {

        $user->first_name   = $data['first_name'];
        $user->last_name    = $data['last_name'];
        $user->email        = $data['email'];
        $user->phone        = $data['phone'];
        $user->password     = $data['password'];
        $user->address      = $data['address'];
        $user->city         = $data['city'];
        $user->state        = $data['state'];
        $user->zip_code     = $data['zip_code'];
        $user->status       = $data['status'];
        $user->remember     = $data['remember'];

        $user->save(); 

        $verification = new Verification;

        $verification->hash = md5(mt_rand(0, 65535));
        $verification->verified_on = null;

        $verification->save();

        $user->verification()->save($verification);

        $url = [
            'activate' => URL::to('/activate/{hash}', $verification->hash)
        ];       
    }

    $data = [
        'title' => 'Verifying your account -- myafterschoolprograms.com',
        'url'   => $url,
    ];

    return View::make('defaults.verify', $data);
});

Route::get('/activate/{hash}', function ($hash) {
    $verification = Verification::where('hash', '=', $hash)->first();

    if (is_null($verification)) App::abort('404');  

    $url = [
    ];

    $data = [
        'title' => 'Account Activation -- myafterschoolprograms.com',
        'url'   => $url,
    ];

    return View::make('defaults.activate', $data);
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
Route::resource('users', 'UserController');
Route::resource('latesignups', 'LateSignUpController');
