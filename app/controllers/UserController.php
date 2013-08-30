<?php

class UserController extends ResourceController
{
    // {{{ forDisplay

    /**
     * Formats data for display
     *
     * Expects to be chained with format  
     *
     * @return  array containing data for display
     */

    public function forDisplay()
    {
        $__output = [];

        if (isset($this->bin['resource'][0])) {
            //bin holds a list of all locations
            foreach ($this->bin['resource'] as $resource) {
                $__output[] = [
                    'name'  => $resource['first_name'].' '.$resource['last_name'],
                    'id'    => $resource['id'],
                    'info'  => $resource['email'],
                ];
            }
        } else {
            //bin holds one location
            foreach ($this->bin['resource'] as $key => $value) {
                switch ($key) {
                    case 'phone':
                        $value = '('.substr($value, 0, 3).') '.substr($value, 3, 3).'-'.substr($value, 6, 4);
                        break;
                    case 'stay_logged_in':
                        $value = ($value === 1) ? 'Yes' : 'No';
                        break;
                    case 'active':
                        $value = ($value === 1) ? 'Active' : 'Inactive';
                        break;
                }
                $__output[$this->format($key)->asKey()] = $value;
            }            
        }

        return $__output;
    }

    // }}}
    // {{{ name

    /**
     * Gets a name value to use
     *
     * @return  name
     */

    public function name($resource)
    {
        return $resource['first_name'].' '.$resource['last_name'];
    }

    // }}}
    // {{{ info

    /**
     * Gets an info value
     *
     * @return  gets an info value
     */

    public function info($resource)
    {
        return $resource['email'];
    }

    // }}}
}
