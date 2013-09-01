<?php

class LateSignUp extends Resource {
    protected $guarded = [
    	'user_id',
    	'class_session_id'
    ];

    public static $rules = [];

    protected $table = 'latesignups';

    protected $relations_to = [
    	'User',
    	'ClassSession',
    ];

    public function user() {
        return $this->belongsTo('User');
    }

    public function class_session() {
        return $this->belongsTo('ClassSession');
    }
}