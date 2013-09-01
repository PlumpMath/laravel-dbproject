<?php

class Role extends Eloquent {
    protected $guarded = array();

    public static $rules = array();

    public function permissions()
    {
        return $this->belongsToMany('Permission');
    }

    public function users()
    {
        return $this->belongsToMany('User');
    }
}