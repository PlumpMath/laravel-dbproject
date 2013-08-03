@extends('layouts.master')

@section('content')
    <!-- TOP MENU -->
    <div class='top_menu'>
        <div class='left'>
            <h1>Hello, <span class='bold'>Mr. {{ Auth::user()->last_name }}</span></h1>
        </div>
        <div class='right'>
            <div class='expand_menu' id='expand_menu'></div>
        </div>
    </div>
    <!-- HIDDEN MENU -->
    <div class='hidden_menu' id='hidden_menu'>
        <ul>
            <li><div id='personal_settings_icon' class='icon'></div>Personal Settings</li>
            <li><div id='sign_out_icon' class='icon'></div>Sign out</li>
        </ul>
    </div>
    <!-- PAGE WRAPPER -->
    <div class='page_wrapper' id='page_wrapper'>
      <div class='register'>
        <h1>This is some filler content.</h1>
        <p>And you thought this wouldn't be filler content, but it is.</p>
      </div>
      <div class='register'>
        <h1>This is some filler content.</h1>
        <p>And you thought this wouldn't be filler content, but it is.</p>
      </div>
    </div>
@stop

@section('scripts')
    <script>
        var page_wrapper = $("#page_wrapper");
        $("#expand_menu").on("click", function () {
            if (!page_wrapper.hasClass("page_push_end")) {
                page_wrapper.addClass("page_push");
                setTimeout(function () {
                    page_wrapper.addClass("page_push_end");
                }, 500);
            } else {
                page_wrapper.removeClass("page_push_end");
                setTimeout(function () {
                    page_wrapper.removeClass("page_push");
                }, 500);        
            }
        });
    </script>
@stop
