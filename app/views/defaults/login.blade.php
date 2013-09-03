@extends('layouts.master')

@include('elements.footer')

@section('body')
    <div class="vert-outer-wrap vert-stretch">
        <div class="vert-inner-wrap">
            <!-- log-in block -->
            <div class="log-in visible">
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
                    <div class="input-errors email-errors visible-toggle invisible">
                    </div>
                    <!-- log-in elem -->
                    <div class="log-in-form-pwd-input input">
                        {{ Form::password('password', ['class' => 'log-in-form-pwd-input-field input-field']) }}
                        {{ Form::label('password', 'Password', ['class' => 'log-in-form-pwd-input-lbl input-lbl lbl visible']) }}
                    </div>
                    <div class="input-errors password-errors visible-toggle invisible">
                    </div>
                    <div class="input-errors general-errors visible-toggle {{ $errors }}">
                        <p>Email and/or Password is incorrect :(</p>
                    </div>
                    <!-- log-in elem -->
                    <button class="log-in-form-btn btn btn-active">
                        <p class="btn-active-text visible">Sign In</p>
                    </button>
                {{ Form::close()}}
            </div>
        </div>
    </div>

    @yield('footer')

@stop

@section('scripts')
    <script src='{{ asset('js/Validator.js') }}'></script>
    <script>
        $('.form').on('input change', function (event) {
            var inputs = Input.test({
                inputs: Input.all().required()        
            });

            $(event.target).parent().removeClass('input-has-errors');
            myafterschoolprograms.resetVisibility($(inputs.getErrorElement(event.target.name)), 0);
        });

        $('.form').on('submit', function (event) {
            var inputs = Input.test({
                email: Input.get('email').required().email(),
                password: Input.get('password').required()
            });
            
            if ( ! inputs.passing()) {
                inputs.report();
                event.preventDefault();
            }
        });
    </script>
@stop
