<?php

class ClassesController extends BaseController {

    protected $layout = null;
    protected $names = array(

                              'singular' => null,
                              'plural'   => null,

                              );

    /**
     * ex. 'key' => 'sort|edit|create|show'
     */
    protected $fields = array(
                              'key' => 'options'
                              );
    
    public function __construct()
    {
        parent::construct();

        //        $this->beforeFilter('auth.permission');
    }

    public function index()
    {
        return '';
    }

    public function create()
    {
    }

    public function store()
    {
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update($id)
    {
    }

    public function destroy($id)
    {
    }

}