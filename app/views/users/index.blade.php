@extends('layouts.master')

@section('content')
    <!-- TOP MENU -->
    <div class='top_menu'>
        <div class='left'>
            <h1>Hello, <span class='bold'>Mr. {{ Auth::user()->last_name }}</span></h1>
        </div>
        <div class='right'>
            <div class='expand_menu'></div>
        </div>
    </div>
    <!-- HIDDEN MENU -->
    <div class='hidden_menu'>
        <ul>
            <li><div id='personal_settings_icon' class='icon'></div>Personal Settings</li>
            <li><div id='sign_out_icon' class='icon'></div>Sign out</li>
        </ul>
    </div>

@stop
