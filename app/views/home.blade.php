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
        {{ Form::email('email', 'example@gmail.com') }}{{ Form::password('password') }}
        {{ Form::close() }}
    </div>
    <!-- ABOUT US -->
    <div>
    </div>
    <!-- OUR LOCATIONS -->
    <div class='locations'>
        <h1>Wherever you may be.</h1>
        <p>With over 6 locations, we're bringing our home to yours.</p>
    </div>
@stop
