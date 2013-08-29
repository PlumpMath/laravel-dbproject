<?php

class UserController extends BaseController {

    protected $name = array(
                  'singular' => 'Users',
                  'plural' => 'User',
                  );

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
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
                                                          'class_name' => $this->name['plural'],
                                                          'title' => 'Create '.$this->name['singular'].' | myafterschoolprograms',
                                                          'URL' => URL::action($this->name['singular'].'Controller@store'),
                                                          'inputs' => array(
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
                return Redirect::action($this->name['singular'].'Controller@create')->withErrors($v);
            } else {
                $user = new User;
                $user->resource = Input::get('resource');
                $user->action = Input::get('action');
                $user->save();

                return 'User Created';
            }
        }
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