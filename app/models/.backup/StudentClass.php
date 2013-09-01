<?php

class StudentClass extends Eloquent {
    protected $table = 'classes';
    protected $guarded = array();

    public static $rules = array();

    public function location() {
        return $this->belongsTo('Location');
    }

    public function children() {
        return $this->belongsToMany('Child');
    }

    public function activity() {
        return $this->belongsTo('Activity');
    }
}