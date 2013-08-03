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
            <li><div id='sign_out_icon' class='icon'></div><a href='{{ URL::to('/logout'); }}'>Sign out</a></li>
        </ul>
    </div>
    <!-- PAGE WRAPPER -->
    <div class='page_wrapper' id='page_wrapper'>
      <div class='actionable_item classes'>
        <div class='default icon'></div>
        <h1>Classes</h1>
      </div>
      <div class='actionable_item locations'>
        <div class='default icon'></div>
        <h1>Locations</h1>
      </div>
      <div class='actionable_item permissions'>
        <div class='default icon'></div>
        <h1>Permissions</h1>
      </div>
      <div class='actionable_item roles'>
        <div class='default icon'></div>
        <h1>Roles</h1>
      </div>
      <div class='actionable_item users'>
        <div class='default icon'></div>
        <h1>Users</h1>
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
