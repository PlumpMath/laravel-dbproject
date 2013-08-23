<?php

class LocationController extends BaseController
{
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
        
        return View::make('location.show', array('rows' => $location, 'url_copy' => action('LocationController@copy', $id), 'url_edit' => '#', 'url_destroy' => action('LocationController@destroy', $id)));
        
    }
    
    public function copy($id)
    {
        $resource_to_copy = Location::find($id);
        $array_from_resource = $resource_to_copy->toArray();
        unset($array_from_resource['id']);
        $resource_copied = Location::create($array_from_resource);

        return Redirect::action('LocationController@edit', $resource_copied->id);
    }

    public function edit($id)
    {
    }

    public function update($id)
    {
    }

    public function destroy($id)
    {
        Location::destroy($id);
        
        return View::make('location.destroy');
    }
}
