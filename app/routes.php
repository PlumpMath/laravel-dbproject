<?php
Route::get('/', function ()
{
    if (Auth::attempt(array('email' => 'admin', 'password' => 'admin'))) {
        return 'Logged in.';
    } else {
        return 'Well, shit\'s fucked up.';
    }
});

Route::resource('permissions', 'PermissionController');
Route::resource('roles', 'RoleController');
Route::resource('users', 'UserController');
Route::resource('locations', 'LocationController');
Route::resource('activities', 'ActivityController');
Route::resource('coupons', 'CouponController');
Route::resource('children', 'ChildController');


/** /
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

Route::get('/logout', function() {
        if (!Auth::guest()) {
            Auth::logout();
        }

        return Redirect::to('/');
    });

// USERS

Route::get('/users', function () {
        if (Auth::guest()) {
            return Redirect::to('/');
        } else {
            $users = User::all();
            $lists = array();
            $items = array('Name', 'Email');

            $options = View::make('_list', array(
                                                 'items' => $items
                                                 ));

            foreach($users as $user) {
                $lists[] = View::make('_list', array(
                                                         'items' => array(
                                                                          'name' => $user->first_name.' '.$user->last_name,
                                                                          'email' => $user->email,
                                                                          'delete' => 'Delete',
                                                                          'edit' => 'Edit'
                                                                         )
                                                         
                                                         ));
            }

            return View::make('_index', array(
                                                   'title' => 'Users | myafterschoolprograms', 
                                                   'lists' => $lists,
                                                   'options' => $options,
                                                   'class_name' => 'Users',
                                              ));
        }
    });

Route::get('/users/{id}', function ($id) {
        if (Auth::guest()){
            return Redirect::to('/');
        } else {
            if (Auth::user()->id != $id) {
                return Redirect::to('/');
            } else {
                return View::make('users.show', array('title' => Auth::user()->first_name.' '.Auth::user()->last_name.' | myafterschoolprograms'));
            }
        }
    });

Route::post('/classes/search', function () {
        return 'Search Classes';
    });

Route::post('/locations/search', function () {
        return 'Search Locations';
    });

Route::post('/users/search', function () {
        return 'Search Users';
    });

Route::get('/the_manual', function() {
        return 'THE MANUAL';
    });

//Resources

Route::resource('children', 'ChildController');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');

Route::resource('locations', 'LocationController');
/**/
