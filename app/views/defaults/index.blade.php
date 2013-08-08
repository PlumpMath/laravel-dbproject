@extends('layouts.master')

@section('content')
    @include('top_menu')
    <div class='page_wrapper' id='page_wrapper'>
      <div class='actionable_item {{ strtolower($class_name) }}'>
              <div class='default icon'></div>
              <h1>{{ $class_name }}</h1>
      </div>
      <div class='options'>
        <div class='filter'>
        Filter by
        <div class='select'>
             {{ $options }}
        </div>
        in
        <div class='select'>
          <ul>
            <li>Asc</li>
            <li>Desc</li>
          </ul>
        </div>
        order
        </div>
        </div>
      <div class='list'>
        @if (count($lists) === 0)
            <ul>
              <li class='empty'>There are no {{ strtolower($class_name) }}.<a href='{{ $URL }}'> Create one?</a></li>
            </ul>
        @else
            @foreach ($lists as $list)
                {{ $list }}
            @endforeach
        @endif
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
