<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

// {{{ User

class User extends Resource implements UserInterface, RemindableInterface {

    // {{{ properties

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password'];

    protected $relations_to = [
        'LateSignUp',
        'Verification',
    ];

    public static $rules = [
        'first_name'    => 'required|alphadash',
        'last_name'     => 'required|alphadash',
        'email'         => 'required|email',
        'phone'         => 'required|numeric|size:10',
        'password'      => 'required|min:6|confirmed',
        'address'       => 'required',
        'city'          => 'required',
        'state'         => 'required',
        'zip_code'      => 'required|numeric|size:5',
    ];

    // }}}
    // {{{ getAuthIdentifier

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    // }}}
    // {{{ getAuthPassword

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    // }}}
    // {{{ getReminderEmail

    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->email;
    }

    // }}}
    // {{{ latesignups

    /**
     * Get the user's latesignups
     *
     * @return collection of latesignups
     */

    public function latesignups()
    {
        return $this->hasMany('LateSignUps');
    }

    // }}}
    // {{{ verification

    /**
     * Get the user's latesignups
     *
     * @return collection of latesignups
     */

    public function verification()
    {
        return $this->hasOne('verification');
    }

    // }}}
}

// }}}
