<?php

App::before(function($request)
{
	
});


App::after(function($request, $response)
{
	//
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::guest('/');
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

Route::filter('auth.permission', function()
{
    $not_allowed = true;

    if (Auth::check()) {
        $route = Route::currentRouteName();
        
        $user = Auth::user();
        $roles = $user->roles;

        foreach($roles as $role) {
            $permissions = $role->permissions;
            foreach($permissions as $permission) {
                if ($permission->resource.'.'.$permission->action === $route) {
                    $not_allowed = false;
                }
            }
        }
    }

    if ($not_allowed === true) return Redirect::to('/');
});

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});