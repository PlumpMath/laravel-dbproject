<?php

class ActivityController extends ResourceController
{
    protected $name = array(
                            'singular' => 'Activity',
                            'plural'   => 'Activities',
                            );

    protected $field = array(
                             'id'         => null,
                             'name'       => 'indexable|create|read|update',
                             'classes'    => null,
                             'users'      => null,
                             'locations'  => null,
                             'created_at' => null,
                             'updated_at' => null,
                             );

    protected $rules = array(
                             'name' => 'required|alpha',
                             );
}
