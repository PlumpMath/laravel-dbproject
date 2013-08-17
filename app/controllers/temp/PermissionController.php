<?php

class PermissionController extends BaseController {

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
            $permissions = Permission::all();
            $lists = array();
            $items = array('Resource');

            $options = View::make('_list', array(
                                                 'items' => $items
                                                 ));

            foreach($permissions as $permission) {
                $lists[] = View::make('_list', array(
                                                         'items' => array(
                                                                          'Id' => $permission->id
                                                                         )
                                                         
                                                         ));
            }

            return View::make('_index', array(
                                                   'title' => 'Permissions | myafterschoolprograms', 
                                                   'lists' => $lists,
                                                   'options' => $options,
                                                   'URL' => URL::action('PermissionController@create'),
                                                   'class_name' => 'Permissions',
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
        if (Auth::guest()) {
            return Redirect::to('/');
        } else {
            return View::make('_create', array(
                                                          'class_name' => 'Permissions',
                                                          'title' => 'Create Permission | myafterschoolprograms',
                                                          'URL' => URL::action('PermissionController@store'),
                                                          'inputs' => array(
                                                                            'Resource',
                                                                            'Action',
                                                                            ),
                                               ));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        if (Auth::guest()) {
            return Redirect::to('/');
        } else {
            $v = Validator::make(Input::all(), array('resource' => 'alpha|required',
                                                                        'action' => 'in:create,show,update,destroy,'));
            if ($v->fails()) {
                return Redirect::action('PermissionController@create')->withErrors($v);
            } else {
                $permission = new Permission;
                $permission->resource = Input::get('resource');
                $permission->action = Input::get('action');
                $permission->save();

                return 'Permission Created';
            }
        }
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