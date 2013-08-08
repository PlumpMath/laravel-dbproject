<?php

class LocationController extends BaseController {

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
            $locations = Location::all();
            $lists = array();
            $items = array('Address');

            $options = View::make('_list', array(
                                                 'items' => $items
                                                 ));

            foreach($locations as $location) {
                $lists[] = View::make('_list', array(
                                                         'items' => array(
                                                                          'address' => $location->street_address.', '.$location->town.', '.$location->state.' '.$location->zip_code,
                                                                         )
                                                         
                                                         ));
            }

            return View::make('_index', array(
                                                   'title' => 'Locations | myafterschoolprograms', 
                                                   'lists' => $lists,
                                                   'options' => $options,
                                                   'URL' => URL::action('LocationController@create'),
                                                   'class_name' => 'Locations',
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
        return 'A form to create a location.';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        return 'Add a newly created location.';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return 'Show a specific location';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return 'A form to edit a specific location';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        return 'Edits a specific location';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        return 'Destroy a location';
    }

}