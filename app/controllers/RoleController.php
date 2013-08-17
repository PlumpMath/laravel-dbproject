<?php

class RoleController extends ResourceController
{
    protected $name = array(
                            'singular' => 'Role',
                            'plural'   => 'Roles',
                            );

    protected $field = array(
                             'id'          => null,
                             'name'        => 'indexable|create|read|update',
                             'permissions' => 'create|update',
                             'users'       => 'create|update',
                             'created_at'  => null,
                             'updated_at'  => null,
                             );

    protected $rules = array(
                             'name'   => 'required|alpha',
                             );
}
