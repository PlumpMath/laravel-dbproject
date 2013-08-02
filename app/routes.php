<?php

Route::get('/', function () {
        return View::make('home', ['title' => 'Hello World']);
    });
