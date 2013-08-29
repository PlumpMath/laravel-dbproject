@extends('layouts.master')

@section('content')
    @include('top_menu')
    <!-- PAGE WRAPPER -->
    <!--
        ::TODO::
        
        Replace with a foreach and partials, going through a user's permissions
        and populating this list with their capabilities
    
    -->
    <div class='page_wrapper' id='page_wrapper'>
      <div class='actionable_item classes'>
        <div class='left'>
          <a href='{{ URL::to('/classes') }}'>
              <div class='default icon'></div>
              <h1>Classes</h1>
          </a>
        </div>
        <div class='right'>
            Search for a class
            
            {{ Form::open(array('url' => URL::to('/classes/search'))) }}
            {{ Form::text('Search') }}
            {{ Form::close() }}
        </div>
      </div>
      <div class='actionable_item locations'>
        <div class='left'>
             <a href='{{ URL::to('/locations') }}'>
                <div class='default icon'></div>
                <h1>Locations</h1>
             </a>
        </div>
        <div class='right'>
            Search for a location
            
            {{ Form::open(array('url' => URL::to('/locations/search'))) }}
            {{ Form::text('Search') }}
            {{ Form::close() }}
        </div>
      </div>
      <div class='actionable_item permissions'>
        <a href='{{ URL::to('/permissions') }}'>
            <div class='default icon'></div>
            <h1>Permissions</h1>
        </a>
      </div>
      <div class='actionable_item roles'>
        <a href='{{ URL::to('/roles') }}'>
            <div class='default icon'></div>
            <h1>Roles</h1>
        </a>
      </div>
      <div class='actionable_item users'>
        <div class='left'>
            <a href='{{ URL::to('/users') }}'>
                <div class='default icon'></div>
                <h1>Users</h1>
            </a>
        </div>
        <div class='right'>
            Search for a user
            
            {{ Form::open(array('url' => URL::to('/users/search'))) }}
            {{ Form::text('Search') }}
            {{ Form::close() }}
        </div>
      </div>
      <div class='the_manual'>
          <h1>The Manual</h1>
          <p>Looking for something? Have an unanswerable question? <a href='{{ URL::to('/the_manual') }}'>Check The Manual.</a></p>
      </div>
      <div class='tasks'>
        <h1>Tasks</h1>
        <h2>Recent Tasks</h2>
        <ul>
            <li>Task 1</li>
            <li>Task 2</li>
        </ul>
        <h2>Common Tasks</h2>
        <ul>
            <li>Some Tasks</li>
            <li>Like this one</li>
        </ul>
      </div>
    </div>
@stop

@section('scripts')
    <script>
        var page_wrapper = $("#page_wrapper");
        var timing = 500;
        $("#expand_menu").on("click", function () {
            if (!page_wrapper.hasClass("page_push_end")) {
                page_wrapper.addClass("page_push");
                setTimeout(function () {
                    page_wrapper.addClass("page_push_end");
                }, 1);
            } else {
                page_wrapper.removeClass("page_push_end");
                setTimeout(function () {
                    page_wrapper.removeClass("page_push");
                }, timing);        
            }
        });
    </script>
@stop
