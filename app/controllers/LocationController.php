<?php

class LocationController extends ResourceController
{
    protected $name = array(
                            'singular' => 'Location',
                            'plural'   => 'Locations',
                            );

    protected $field = array(
                             'id'             => null,
                             'name'           => 'indexable|create|read|update',
                             'phone'          => 'create|update',
                             'capacity'       => 'indexable|create|read|update',
                             'street_address' => 'create|update',
                             'city'           => 'create|update',
                             'zip_code'       => 'create|update',
                             'created_at'     => null,
                             'updated_at'     => null,
                             );

    protected $rules = array(
                             'name'           => 'required|alpha_dash',
                             'phone'          => 'required|numeric',
                             'capacity'       => 'required|integer',
                             'street_address' => 'required|alpha_dash',
                             'city'           => 'required|alpha|size:2',
                             'zip_code'       => 'requried|numeric',
                             );
}
