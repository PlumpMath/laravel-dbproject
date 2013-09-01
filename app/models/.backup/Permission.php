<?php

class Permission extends Eloquent {
    protected $guarded = array();

    public static $rules = array();

    public function roles()
    {
        return $this->belongsToMany('Role');
    }
}
