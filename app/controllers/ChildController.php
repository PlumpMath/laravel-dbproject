<?php

class PermissionController extends ResourceController
{
    protected $name = array(
                            'singular' => 'Permission',
                            'plural'   => 'Permissions',
                            );

    protected $field = array(
                             'id'         => null,
                             'resource'   => 'indexable|create|read|update',
                             'action'     => 'indexable|create|read|update',
                             'created_at' => null,
                             'updated_at' => null,
                             );

    protected $rules = array(
                             'resource'   => 'required|alpha',
                             'action'     => 'required|alpha',
                             );
}
