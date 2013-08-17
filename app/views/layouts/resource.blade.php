@extends('layouts.master')

@include('elements.header')

@section('content')
    <div class='page_wrapper' id='page_wrapper'>
      <div class='actionable_item {{ strtolower($resource) }}'>
              <div class='default icon'></div>
              <h1>{{ $resource }}</h1>
      </div>
      @yield('resource')
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
