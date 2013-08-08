<?php

class RoleController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if (Auth::guest()) {
            return Redirect::to('/');
        } else {
            $roles = Role::all();
            $lists = array();
            $items = array('Name');

            $options = View::make('_list', array(
                                                 'items' => $items
                                                 ));

            foreach($roles as $role) {
                $lists[] = View::make('_list', array(
                                                         'items' => array(
                                                                          'Id' => $role->id
                                                                         )
                                                         
                                                         ));
            }

            return View::make('_index', array(
                                                   'title' => 'Roles | myafterschoolprograms', 
                                                   'lists' => $lists,
                                                   'options' => $options,
                                                   'URL' => URL::action('RoleController@create'),
                                                   'class_name' => 'Roles',
                                              ));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}