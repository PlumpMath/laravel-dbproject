@extends('layouts.master')

@section('content')
    @include('top_menu')
    <div class='page_wrapper' id='page_wrapper'>
      <div class='actionable_item {{ strtolower($class_name) }}'>
              <div class='default icon'></div>
              <h1>{{ $class_name }}</h1>
      </div>

      <div class='create'>
        <h1>Create {{ $class_name }}</h1>
        {{ Form::open(array('url'=> $URL)) }}
        @foreach($inputs as $input)
        {{ Form::text(strtolower($input), $input) }}
        @endforeach
        {{ Form::submit('Create') }} 
        {{ Form::close() }}
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

