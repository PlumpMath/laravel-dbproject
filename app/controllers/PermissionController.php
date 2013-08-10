<?php

class PermissionController extends ResourceController
{
    protected $name = array(
                            'singular' => 'Permission',
                            'plural'   => 'Permissions',
                            );

    protected $field = array(
                             'id'         => null,
                             'resource'   => 'sort|edit|update|index|show'
                             'action'     => 'sort|edit|update|index|show'
                             'created_at' => null,
                             'updated_at' => null,
                             );
}
