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
        $validator = new Validator($data, $this->rules);

        if ($v->fails()) {
            $this->errors = $validator->errors;
            return false;
        } 

        return true;
    }

    // }}}
}

// }}}
