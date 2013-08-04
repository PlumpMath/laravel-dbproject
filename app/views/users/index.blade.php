@extends('layouts.master')

@section('content')
    @include('top_menu')
    <div class='page_wrapper' id='page_wrapper'>
      <div class='actionable_item users'>
              <div class='default icon'></div>
              <h1>Users</h1>
      </div>
      <div class='options'>
        <div class='filter'>
        Filter by
        <div class='select'>
          <ul>
            <li>Date</li>
            <li>Grade</li>
            <li>Time</li>
          </ul>
        </div>
        in
        <div class='select'>
          <ul>
            <li>Desc</li>
            <li>Asc</li>
          </ul>
        </div>
        order
        </div>
        <div class='only_show'>Only show eligible classes</div>
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
