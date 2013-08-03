<?php

Route::get('/', function () {
        return View::make('home', array('title' => 'myafterschoolprograms'));
    });

Route::post('/', function () {
        $userdata = array(

                          'email'    => Input::get('email'),
                          'password' => Input::get('password'),

                          );

        if (Auth::attempt($userdata, true)) {
            return Redirect::to('/users/'.Auth::user()->id);
        } else {
            return Redirect::to('/')->with('login_errors', true);
        }
    });

Route::get('/users/{id}', function ($id) {
        if (Auth::guest()){
            return Redirect::to('/');
        } else {
            if (Auth::user()->id != $id) {
                return Redirect::to('/');
            } else {
                return View::make('users.index', array('title' => Auth::user()->first_name." ".Auth::user()->last_name." | myafterschoolprograms"));
            }
        }
    });