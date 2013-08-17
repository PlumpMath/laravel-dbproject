<?php

class Location extends Eloquent {
    protected $guarded = array();

    public static $rules = array();

    public function classes() {
        return $this->hasMany('Class');
    }

    public function activities() {
        return $this->belongsToMany('Activity');
    }
}