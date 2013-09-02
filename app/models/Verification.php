<?php

// {{{ Location

class Verification extends Resource {

	// {{{ properties

    protected $guarded = [];

    public static $rules = [];

    // }}}
    // {{{ user

    public function user()
    {
    	return $this->belongsTo('User');
    }

    // }}}
}

// }}}
