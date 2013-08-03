@extends('layouts.master')

@section('content')
    <!-- BANNER  -->
    <div class='banner'>
      <h1>myafterschoolprograms, inc.</h1>
    </div>
    <!-- REGISTER -->
    <div class='register'>
      <h1>This is our catch line. Snazzy.</h1>
      <p>Now some supporting text to move you to the button.</p>
    </div>
    <!-- LOG IN -->
    <div class='log_in'>
        {{ Form::open(['url' => '/']) }}
        {{ Form::email('email', 'example@gmail.com') }}{{ Form::password('password') }}{{ Form::submit('Sign In') }}
        {{ Form::close() }}
    <!-- ERRORS -->
        @if (Session::has('login_errors'))
        <div class='errors'><p>Username or password incorrect.</p></div>
        @endif
    </div>
    <!-- ABOUT US -->
    <div class='about_us'>
      <h1>Some killer copy about our programs.</h1>
      <p>You want to know more? Me too!</p>
    </div>
    <!-- OUR LOCATIONS -->
    <div class='locations'>
        <h1>Wherever you may be.</h1>
        <p>With over 6 locations, we're bringing our home to yours.</p>
    </div>
@stop
