<?php

Route::get('/', function () {
        return View::make('home', ['title' => 'Hello World']);
    });

Route::post('/', function () {
        $userdata = array(

                          'email'    => Input::get('email'),
                          'password' => Input::get('password'),

                          );

        if (Auth::attempt($userdata, true)) {
            return Redirect::to('/users/'.Auth::user()->id.'/');
        } else {
            return Redirect::to('/')->with('login_errors', true);
        }
    });