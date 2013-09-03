<?php

Route::get('/', function ()
{
    if (Auth::check()) {
        $url = [
            'home'      => URL::to('/'),
            'log_out'   => URL::to('/log/out'),
            'verify'    => URL::to('/verify'),
        ];

        $data = [
            'title'     => 'Welcome, '.Auth::user()->first_name.' '.Auth::user()->last_name.' -- myafterschoolprograms',
            'url'       => $url,
        ];

        return View::make('defaults.home.signed_in', $data);
    } else {
        //urls for the view
        $url = [
            'home'        => URL::to('/'),
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

Route::get('/log/in', function () {
    $url = [
        'home'        => URL::to('/'),
        'log_in' => URL::to('/log/in'),
    ];

    $data = [
        'url'   => $url,
        'title' => 'Log in -- myafterschoolprograms.com'
    ];

    if (Session::has('auth_failed')) {
        $data['errors'] = 'visible';
        Session::forget('auth_failed');
    } else {
        $data['errors'] = 'invisible';
    }

    return View::make('defaults.login', $data);
});

Route::post('/log/in', function () {
    $user = [
        'email'     => Input::get('email'),
        'password'  => Input::get('password'),
    ];

    if (Auth::attempt($user)) {
    /*
        $ip = $_SERVER['REMOTE_ADDR'];

        if (filter_var($ip, FILTER_VALIDATE_IP)) {
            $geo_info = file_get_contents('http://ipinfo.io/'.$ip);
            $location = $geo_info['hostname'];

            Auth::user()->last_logged_in_from = $ip;
            Auth::user()->last_logged_in_at = $location;
            Auth::user()->save();
        }
    */
        return Redirect::intended('/');
    } else {
        return Redirect::to('/log/in')->with('auth_failed', true);
    }
});

Route::get('/log/out', function () {
    Auth::logout();

    return Redirect::to('/');
});

Route::get('/register', function () {
    $url = [
        'home'          => URL::to('/'),
        'check_email'   => URL::to('/is_email_unique'),
        'verify'        => URL::to('/verify'),
    ];

    $data = [
        'title' => 'Registering -- myafterschoolprograms.com',
        'url'   => $url,
    ];
    if (Session::has('errors')) {
        $data['errors'] = Session::get('errors');
        Session::forget('errors');
    }

    return View::make('defaults.register', $data);
});

Route::post('/verify', function () {
    $name       = explode(' ', Input::get('name'), 2);
    $first_name = $name[0];
    $last_name  = (isset($name[1])) ? $name[1] : '';

    $data = [
        'first_name'        => $first_name,
        'last_name'         => $last_name,
        'email'             => Input::get('email'),
        'phone'             => Input::get('phone'),
        'password'          => Input::get('password'),
        'password_confirm' => Input::get('password_confirm'),
        'address'           => Input::get('address'),
        'city'              => Input::get('city'),
        'state'             => Input::get('state'),
        'zip_code'          => Input::get('zip_code'),
        'status'            => 2,
        'remember'          => 0,
    ];
    
    $validator = Validator::make($data, User::$rules);

    if ($validator->passes()) {
        $user = new User;

        $user->first_name   = $data['first_name'];
        $user->last_name    = $data['last_name'];
        $user->email        = $data['email'];
        $user->phone        = $data['phone'];
        $user->password     = Hash::make($data['password']);
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
            'home'          => URL::to('/'),
            'activate'      => URL::to('/activate/{hash}', $verification->hash),
            'another_email' => '',
        ]; 
        $data = [
            'title' => 'Verifying your account -- myafterschoolprograms.com',
            'url'   => $url,
        ];

        return View::make('defaults.verify', $data);      
    }

    return Redirect::to('/register')->withErrors($validator)->withInput(Input::except(['password','password_confirm']));
});

Route::get('/activate/{hash}', function ($hash) {
    $verification = Verification::where('hash', '=', $hash)->first();

    Auth::loginUsingId($verification->user_id);

    $user = Auth::user();

    if ($user->status === 2) {
        $user->status = 1;
        $user->save();
    } else {
        App::abort('404');
    }

    if (is_null($verification)) App::abort('404');

    $url = [
        'home' => URL::to('/'),
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

App::missing(function ($exception) {
    $url = [
        'home' => URL::to('/')
    ];

    $data = [
        'url' => $url,
        'title' => '404 -- myafterschoolprograms'
    ];

    return Response::view('errors.missing', $data, 404);
});
