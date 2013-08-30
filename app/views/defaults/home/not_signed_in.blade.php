@extends('layouts.master')

@include('elements.footer')

@section('body')
    <div class="vert-outer-wrap vert-stretch">
        <div class="vert-inner-wrap">
            <!-- sign-up block -->
            <div class="sign-up visible-toggle visible">
                <!-- sign-up elem & header block -->
                <div class="sign-up-header header">
                    <!-- header elem -->
                    <div class="header-title">
                        <p class="header-title-text">There&rsquo;s never too much play time!</p>
                    </div>
                    <!-- header elem -->
                    <div class="header-sub">
                        <p class="header-sub-text">Our after school programs keep the fun going</p>
                    </div>
                </div>
                <!-- sign-up elem -->
                <div class="sign-up-btn btn btn-link btn-active">
                    <a class="btn-link-text" href="{{ $url['register'] }}">Get Started</a>
                </div>
                <!-- sign-up elem -->
                <div class="sign-up-log-in">
                    <p class="sign-up-log-in-text">Have an account? <a class="sign-up-log-in-link" href="{{ $url['log_in'] }}">Sign in</a></p>
                </div>
            </div>
            <!-- log-in block -->
            <div class="log-in visible-toggle invisible">
                {{ Form::open([
                    'url'   => $url['log_in'],
                    'name'  => 'log-in',
                    'class' => 'log-in-form form'
                ]) }}
                    <!-- log-in elem -->
                    <div class="log-in-form-title">
                        <p class="log-in-form-title-text">Sign in</p>
                    </div>
                    <!-- log-in elem -->
                    <div class="log-in-form-email-input input">
                        {{ Form::text('email', '', ['class' => 'log-in-form-email-input-field input-field']) }}
                        {{ Form::label('email', 'Email', ['class' => 'log-in-form-email-input-lbl input-lbl lbl visible']) }}
                    </div>
                    <!-- log-in elem -->
                    <div class="log-in-form-pwd-input input">
                        {{ Form::password('password', ['class' => 'log-in-form-pwd-input-field input-field']) }}
                        {{ Form::label('password', 'Password', ['class' => 'log-in-form-pwd-input-lbl input-lbl lbl visible']) }}
                    </div>
                    <!-- log-in elem -->
                    <button class="log-in-form-btn btn btn-inactive">
                        <p class="btn-inactive-text visible">Nevermind...</p>
                        <p class="btn-active-text invisible">Sign In</p>
                    </button>
                {{ Form::close()}}
            </div>
        </div>
    </div>

    @yield('footer')

@stop

@section('scripts')
    <script>
        //Once 'Sign In' is clicked, switch buttons for form        
        $('.sign-up-log-in-link, .log-in-form-btn').on('click', function (event) {
            myafterschoolprograms.toggleVisibility(event, '.visible-toggle');
        });

        $('.log-in-form').on('input', function () {
            myafterschoolprograms.toggleButton(
                '.log-in-form-btn',
                ($('.log-in-form-email-input-field').val() !== '' && $('.log-in-form-pwd-input-field').val() !== '')
            );

            if ($('.log-in-form-email-input-field').val() !== '' && $('.log-in-form-pwd-input-field').val() !== '') {
                $('.log-in-form-btn').off('click');
            } else {       
                $('.log-in-form-btn').on('click', function (event) {
                    myafterschoolprograms.toggleVisibility(event, 'div');
                });                
            }
        });
    </script>
@stop
