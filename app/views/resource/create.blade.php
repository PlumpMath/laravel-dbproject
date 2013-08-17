@extends('layouts.resource')

@section('resource')
      <div class='create'>
        <h1>Create {{ $resource }}</h1>
        {{ Form::open(array('url'=> $url_store)) }}
        @foreach($fields as $key => $field)
        {{ Form::text(strtolower($field), $names[$key]) }}
        @endforeach
        {{ Form::submit('Create') }} 
        {{ Form::close() }}
      </div>
@stop

