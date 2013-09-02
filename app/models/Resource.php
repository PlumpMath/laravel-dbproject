<?php

// {{{ Resource

class Resource extends Eloquent {
 
    // {{{ properties

    public static $rules = [];

    protected $errors;
    protected $relations_to;

    // }}}
    // {{{ errors

    /**
     * Gets errors
     *
     * @return errors   errors returned from validation
     */

    public function errors() {
        return $this->errors;
    }

    // }}}
    // {{{ relations

    /**
     * Gets models this model is related to
     *
     * @return array    array containing strings of models
     */

    public function relations() {
    	return $this->relations_to;
    }

    // }}}
    // {{{ validate

    /**
     * Validates array of data with $this->rules
     *
     * @return boolean   pass or fail
     */

    public function validate($data) {
        $class = get_class($this);

        $validator = Validator::make($data, $class::$rules);

        if ( ! $validator->fails()) {
            $this->errors = $validator->messages();
            return false;
        } 

        return true;
    }

    // }}}
}

// }}}
