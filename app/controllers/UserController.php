<?php

class UserController extends ResourceController
{
    protected $name = array(
                            'singular' => 'User',
                            'plural'   => 'Users',
                            );

    protected $field = array(
                             'id'                  => null,
                             'name'                => 'indexable|read',
                             'email'               => 'indexable|create|read|update',
                             'password'            => 'create|update',
                             'phone'               => 'create|update',
                             'first_name'          => 'indexable|create|update',
                             'last_name'           => 'indexable|create|update',
                             'street_address'      => 'create|update',
                             'city'                => 'create|update',
                             'state'               => 'create|update',
                             'zip_code'            => 'create|update',
                             'last_logged_in_from' => null,
                             'last_logged_in_at'   => null,
                             'stay_logged_in'      => null,
                             'active'              => null,
                             'deleted_at'          => null,
                             'created_at'          => null,
                             'updated_at'          => null,
                             );

    protected $rules = array(
                             'email' => 'unique:users|required|email',
                             'password' => 'required|alpha_dash',
                             'phone'    => 'required|numeric',
                             'first_name' => 'required|alpha',
                             'last_name' => 'required|alpha',
                             'street_address' => 'required|alpha_dash',
                             'city' => 'required|alpha_dash',
                             'state' => 'required|alpha|size:2',
                             'zip_code' => 'required|numeric',
                             );

    protected function getFieldFromResource($resource, $field)
    {
        if ($field === 'name') {
            return $resource->first_name.' '.$resource->last_name;
        } else {
            return $resource->$field;
        }
    }
}
