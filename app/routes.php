<?php

Route::get('/', function () {
        return View::make('home', ['title' => 'Hello World']);
    });

Route::post('/', function () {
        $email = Input::get('email');
        $password = Input::get('password');

        if (Auth::attempt(array('email' => $email, 'password' => $password), true)) {
            return 'Authenticated';
        } else {
            return 'User does not exist.';
        }
    });