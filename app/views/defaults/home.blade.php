@extends('layouts.master')

@include('elements.footer')

@section('body')
    <div class="horizontal-center-wrapper">
        <div class="vertical-center-outer-wrapper">
            <div class="vertical-center-inner-wrapper">
                <div id="Header" class="header visible"> 
                    <div class="heading">
                        <p>There&rsquo;s never too much play time!</p>
                    </div>
                    <div class="subheading">
                        <p>Our after school programs keep the fun going</p>
                    </div>
                </div>
                <div id="Sign-Up">
                    <div class="visible">
                        <button class="link active">
                            <a href="{{ $url['register'] }}">Get Started</a>
                        </button>
                    </div>
                </div>
                <div id="Log-In">
                    <div class="visible">
                        <p class="log-in">Have an account? <a class="log-in" href="{{ $url['log_in'] }}">Sign in</a></p>
                    </div>
                    <div class="animate form-wrapper invisible">
                        {{ Form::open([
                            'url' => $url['log_in'],
                            'name' => 'log-in',
                        ]) }}
                            <div class="heading">
                                <p>Sign in</p>
                            </div>
                            <div id="Email-Input" class="input-wrapper">
                                {{ Form::text('email') }}
                                {{ Form::label('email', 'Email', ['class' => 'visible']) }}
                            </div>
                            <div id="Password-Input" class="input-wrapper">
                                {{ Form::password('password') }}
                                {{ Form::label('password', 'Password', ['class' => 'visible']) }}
                            </div>
                            <button class="inactive">
                                <p class="inactive-option visible">Nevermind...</p>
                                <p class="active-option invisible">Sign In</p>
                            </button>
                        {{ Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @yield('footer')

@stop

@section('scripts')
    <script>
        //Once 'Sign In' is clicked, switch buttons for form        
        $('a.log-in, button.inactive').on('click', function (event) {
            myafterschoolprograms.toggleVisibility(event, 'div');
        });

        $('#Log-In').on('input', function () {
            myafterschoolprograms.toggleButton(
                '#Log-In button',
                ($('#Email-Input input').val() !== '' && $('#Password-Input input').val() !== '')
            );

            if ($('#Email-Input input').val() !== '' && $('#Password-Input input').val() !== '') {
                $('#Log-In button').off('click');
            } else {       
                $('#Log-In button').on('click', function (event) {
                    myafterschoolprograms.toggleVisibility(event, 'div');
                });                
            }
        });
    </script>
@stop
