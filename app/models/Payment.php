<?php

class Location extends Eloquent {
    protected $guarded = array();

    public static $rules = array();

    public function user() {
        return $this->belongsTo('User');
    }

    public function child() {
        return $this->belongsTo('Child');
    }

    public function session() {
        return $this->belongsTo('Session');
    }
}