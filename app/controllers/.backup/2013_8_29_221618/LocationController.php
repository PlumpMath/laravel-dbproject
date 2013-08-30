<?php

class LocationController extends BaseController
{
    public function index()
    {
        if (isset($delete)) dd($delete);
        $locations = Location::all()->toArray();

        return View::make('location.index', array('title' => 'Locations | myafterschoolprograms', 'locations' => $locations, 'date' => 'none', 'name' => 'Location', 'url_edit' => '#', 'url_destroy' => '', 'url_create' => action('LocationController@create'),'url_copy' => '', 'url_update' => '', 'url_mass' => action('LocationController@affect')));
    }

    public function create()
    {
        $filleables = array(
                            'Name',
                            'Contact Name',
                            'Phone',
                            'Capacity',
                            'Address',
                            'City',
                            'State',
                            'Zip Code',
                            'Status',
                            'Notes',
                            );
        
        return View::make('location.create', array('filleables' => $filleables, 'url_copy' => '', 'url_edit' => '#', 'url_destroy' => '', 'url_update' => '', 'title' => 'Creating a Location | myafterschoolprograms', 'url_create' => '', 'url_store' => action('LocationController@store')));
        
    }

    public function store()
    {
        $location = new Location;

        $inputs = Input::all();
        $updateables = array(
                            'name',
                            'contact_name',
                            'phone',
                            'capacity',
                            'address',
                            'city',
                            'state',
                            'zip_code',
                            'status',
                            'notes',
                            );

        foreach($updateables as $updateable) {
            $input = Input::get($updateable);

            if ($input) {
                if ($updateable === 'phone') {
                    $location->$updateable = preg_replace("/[^0-9]/", "", $input);
                } else if ($updateable === 'status') {
                    if ($input = 'Active') {
                        $input = 1;
                    } else {
                        $input = 0;
                    }
                    $location->$updateable = $input;
                } else {
                    $location->$updateable = $input;
                }
            }
        }

        $location->save();

        return Redirect::action('LocationController@show', $location->id);
    }


    public function affect()
    {
        $locations = json_decode(Input::get('locations_to_affect'));
        $isCopy = (Input::get('copy_submit', false) === '') ? true : false;
        $isEdit = (Input::get('edit_submit', false) === '') ? true : false;
        $isDelete = (Input::get('delete_submit', false) === '') ? true : false;

        foreach($locations as $id) {
            if ($isCopy) {
                $resource_to_copy = Location::find($id);
                $array_from_resource = $resource_to_copy->toArray();
                unset($array_from_resource['id']);
                $resource_copied = Location::create($array_from_resource);                
            } else if ($isEdit) {
                
            } else if ($isDelete) {
                Location::destroy($id);
            }
        }

        return Redirect::action('LocationController@index');
    }

    public function search()
    {
        if (!Input::has('request')) return;
        $request = explode(' ', strtolower(Input::get('request')));
        $results = array();
        $locations = Location::all();

        foreach($locations as $location) {
            $location = $location->toArray();
            foreach($location as $var => $value) {
                foreach($request as $word) {
                    if (strpos(strtolower($value), $word) > -1) {
                        $results[] = array('id' => $location['id'],
                                           'name' => $location['name'],
                                           'address' => $location['address'],
                                           'search_value' => $value,
                                           'search_key' => $var,
                                           'url_show' => action('LocationController@show', $location['id'])
                                           );
                    }
                }
            }
        }

        return (json_encode($results));
    }

    public function show($id)
    {
        $location = Location::find($id)->toArray();
        
        foreach ($location as $key => $row) {
            unset($location[$key]);
            $key = ucwords(implode(' ', explode('_', $key)));
            
            switch ($key) {
            case 'Phone':
                $row = '<a href=\'tel:+1'.$row.'\'>('.substr($row, 0, 3).') '.substr($row, 3, 3).'-'.substr($row, 6, 4).'</a>';
                break;
            case 'Capacity':
                $row = $row.' per class';
                break;
            case 'Status':
                if ($row = 1) {
                    $row = 'Active';
                } else {
                    $row = 'Inactive';
                }
            }
            
            $location[$key] = $row;
        }
        
        return View::make('location.show', array('rows' => $location, 'url_copy' => action('LocationController@copy', $id), 'url_edit' => action('LocationController@edit', $id), 'url_update' => action('LocationController@update', $id), 'url_destroy' => action('LocationController@destroy', $id), 'title' => $location['Name'].' | myafterschoolprograms', 'url_create' => ''));
        
    }
    
    public function copy($id)
    {
        $resource_to_copy = Location::find($id);
        $array_from_resource = $resource_to_copy->toArray();
        unset($array_from_resource['id']);
        $resource_copied = Location::create($array_from_resource);

        return Redirect::action('LocationController@show', $resource_copied->id);
    }

    public function edit($id)
    {
        $location = Location::find($id)->toArray();
        
        foreach ($location as $key => $row) {
            unset($location[$key]);
            $key = ucwords(implode(' ', explode('_', $key)));
            
            switch ($key) {
            case 'Phone':
                $row = '('.substr($row, 0, 3).') '.substr($row, 3, 3).'-'.substr($row, 6, 4);
                break;
            case 'Status':
                if ($row = 1) {
                    $row = 'Active';
                } else {
                    $row = 'Inactive';
                }
            }
            
            $location[$key] = $row;
        }
        
        return View::make('location.edit', array('rows' => $location, 'url_copy' => action('LocationController@copy', $id), 'url_edit' => '#', 'url_destroy' => action('LocationController@destroy', $id), 'url_update' => action('LocationController@update', $id), 'title' => $location['Name'].' | myafterschoolprograms', 'url_create' => ''));
        
    }

    public function update($id)
    {
        $location = Location::find($id);

        $inputs = Input::all();
        $updateables = array(
                            'name',
                            'contact_name',
                            'phone',
                            'capacity',
                            'address',
                            'city',
                            'state',
                            'zip_code',
                            'status',
                            'notes',
                            );

        foreach($updateables as $updateable) {
            $input = Input::get($updateable);

            if ($input) {
                if ($updateable === 'phone') {
                    $location->$updateable = preg_replace("/[^0-9]/", "", $input);
                } else if ($updateable === 'status') {
                    if ($input = 'Active') {
                        $input = 1;
                    } else {
                        $input = 0;
                    }
                    $location->$updateable = $input;
                } else {
                    $location->$updateable = $input;
                }
            }
        }

        $location->save();

        return Redirect::action('LocationController@show', $id);
    }

    public function destroy($id)
    {
        Location::destroy($id);
        
        return Redirect::action('LocationController@index', array('delete' => 1));
    }
}
