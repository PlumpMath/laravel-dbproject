<?php

class ResourceController extends BaseController {

    //name of resource in plural and singular
    protected $name = array(
                              'singular' => 'Resource',
                              'plural'   => 'Resources',
                              );

    /**
     * ex. 'key' => 'indexable|create|read|update'
     */
    protected $field = array(
                              'key' => 'actions'
                              );

    public function __construct()
    {
        //check that user has proper permissions
        $this->beforeFilter('auth.permission');

        //protect against csrf
        $this->beforeFilter('csrf', array('on' => 'post'));

        $this->controller  = $this->name['singular'].'Controller';
        $this->url_create  = URL::action($this->controller.'@create');
        $this->url_destroy = null;
        $this->url_edit    = null;
        $this->url_index   = URL::action($this->controller.'@index');
        $this->url_show    = null;
        $this->url_store   = URL::action($this->controller.'@store');
        $this->url_update  = null;
    }

    protected function fieldHasAction($key, $action) 
    {
        $actions = explode('|', $this->field[$key]);

        foreach($actions as $a) {
            if ($a === $action) return true;
        }

        return false;
    }

    protected function getFieldsWithAction($action, $format = false) 
    {
        $output = array();

        foreach($this->field as $key => $actions) {
            if ($this->fieldHasAction($key, $action)) {
                if ($format === true) {
                    $output[] = $this->formatField($key);
                } else {
                    $output[] = $key;
                }
            }
        }

        return $output;
    }

    protected function getFieldFromResource($resource, $field)
    {
        return $resource->$field;
    }

    protected function formatField($str)
    {
        $pieces = explode('_', $str);
        
        foreach($pieces as $key => $piece) {
            $pieces[$key] = ucfirst($piece);
        }
        
        return implode(' ', $pieces);
    }

    public function index()
    {
        $title     = $this->name['plural'].' | myafterschoolprograms';

        $resource = $this->name['singular'];
        $resources = $resource::paginate(5);

        $options   = View::make('elements.list', array(
                                                       'items' => $this->getFieldsWithAction('indexable', true),
                                                        ));
        $members = array();
        $fieldsToShow = $this->getFieldsWithAction('read');
        foreach($resources as $resource) {
            $items = array();
            foreach($fieldsToShow as $field) {
                $items[$field] = $this->getFieldFromResource($resource, $field);
            }

            $members[] = View::make('resource.list', array(
                                                           'items'      => $items,
                                                           'url_show'   => action($this->controller.'@show', $resource->id),
                                                           'controller' => $this->controller,
                                                           'id'         => $resource->id,
                                                           'url_edit'   => action($this->controller.'@edit', $resource->id),
                                                           ));
        }

        return View::make('resource.index', array(
                                                  'title'       => $title,
                                                  'members'     => $members,
                                                  'links'       => $resources->links(),
                                                  'options'     => $options,
                                                  'url_create'  => $this->url_create,
                                                  'resource'    => $this->name['plural'],
                                                  ));
    }

    public function create()
    {
        $title  = 'Creating '.$this->name['plural'].' | myafterschoolprograms';
        $fields = $this->getFieldsWithAction('create');
        $names  = array();

        foreach ($fields as $field) {
            $names[] = $this->formatField($field);
        }

        return View::make('resource.create', array(
                                                   'title'     => $title,
                                                   'fields'    => $fields,
                                                   'names'     => $names,
                                                   'url_index' => $this->url_index,
                                                   'url_store' => $this->url_store,
                                                   'resource'  => $this->name['plural'],
                                                   ));
    }

    public function store()
    {
        $title = 'Created '.$this->name['singular'].' | myafterschoolprograms';

        $inputs = Input::all();
        $validate_resource = Validator::make($inputs, $this->rules);
        
        if ($validate_resource->fails()) {
            return Redirect::action($this->controller.'@create')->withErrors($validate_resource);
        } else {
            $resource = new $this->name['singular'];
            
            foreach($this->getFieldsWithAction('create') as $field) {
                $resource->$field = Input::get($field);
            }

            $resource->save();

            return View::make('resource.store', array(
                                                      'title'    => $title,
                                                      'resource' => $this->name['plural'],
                                                      ));
        }
    }

    public function show($id)
    {
        $title = 'Showing '.$this->name['singular'].' | myafterschoolprograms';
    }

    public function edit($id)
    {
        $title = 'Editing '.$this->name['singular'].' | myafterschoolprograms';

        $resource = $this->name['singular'];
        $resource = $resource::find($id);

        return View::make('resource.edit', array(
                                                 'title'    => $title,
                                                 'resource' => $this->name['plural'],
                                                 ));
    }

    public function update($id)
    {
        $title = 'Updating '.$this->name['singular'].' | myafterschoolprograms';

        $resource = $this->name['singular'];
        $resource = $resource::find($id);
    }

    public function destroy($id)
    {
        $title = 'Deleting '.$this->name['singular'].' | myafterschoolprograms';

        $resource = $this->name['singular'];
        $resource::destroy($id);

        return View::make('resource.destroy', array(
                                                    'title' => $title,
                                                    'resource' => $this->name['plural'],
                                                    'type' => $this->name['singular'],
                                                    ));
    }

}