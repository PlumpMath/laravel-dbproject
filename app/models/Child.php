<?php

class Child extends Eloquent {
    protected $guarded = array();

    public static $rules = array();

    public function user() {
        return $this->belongsTo('User');
    }

    public function classes() {
        return $this->belongsToMany('Class');
    }
}