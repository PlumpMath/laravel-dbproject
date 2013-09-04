@extends('layouts.master')

@include('elements.footer')

@section('body')
    <div class="vert-outer-wrap vert-stretch">
        <div class="vert-inner-wrap">
            <!-- sign-up block -->
            <div class="sign-up visible-toggle visible">
                <!-- sign-up elem -->
                <div class="sign-up-elem">
                    <div class="sign-up-btn btn btn-link btn-active">
                        <a class="btn-link-text" href="{{ $url['register'] }}">Get Started</a>
                    </div>
                    <!-- sign-up elem -->
                    <div class="sign-up-log-in">
                        <p class="sign-up-log-in-text">Have an account? <a class="sign-up-log-in-link" href="{{ $url['log_in'] }}">Sign in</a></p>
                    </div>
                </div>
                <div class="sign-up-elem">
                    <div class="sign-up-header copy">
                        <!-- header elem -->
                        <div class="copy-sub">
                            <p class="copy-sub-text">Lorem ipsum dolor sit amet,</p>
                        </div>
                        <!-- header elem -->
                        <div class="copy-title">
                            <p class="copy-title-text">&ldquo;Consectetur adipisicing?&rdquo;</p>
                        </div>
                        <!-- header elem -->
                        <div class="copy-sub">
                            <p class="copy-sub-text">Sed do eiusmod tempor?</p>
                        </div>
                        <!-- header elem -->
                        <div class="copy-title">
                            <p class="copy-title-text">Incididunt ut labore et.</p>
                        </div>
                        <!-- header elem -->
                        <div class="copy-paragraph">
                            <p class="copy-paragraph-text">Dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat.</p>
                            <p class="copy-paragraph-text">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        </div>
                    </div>
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
                    <div class="input-errors email-errors visible-toggle invisible">
                    </div>
                    <!-- log-in elem -->
                    <div class="log-in-form-pwd-input input">
                        {{ Form::password('password', ['class' => 'log-in-form-pwd-input-field input-field']) }}
                        {{ Form::label('password', 'Password', ['class' => 'log-in-form-pwd-input-lbl input-lbl lbl visible']) }}
                    </div>
                    <div class="input-errors password-errors visible-toggle invisible">
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
        //Once 'Sign In' is clicked, switch buttons for form        
        $('.sign-up-log-in-link').on('click', function (event) {
            myafterschoolprograms.toggleVisibility(event, '.visible-toggle');
        });

        $('.form').on('input change', function (event) {
            var inputs = Input.test({
                inputs: Input.all().required()        
            });

            $(event.target).parent().removeClass('input-has-errors');
            myafterschoolprograms.resetVisibility($(inputs.getErrorElement(event.target.name)), 0);
        });

        $('.form').on('submit', function (event) {
            var inputs = Input.test({
                email: Input.get('email').required(),
                password: Input.get('password').required()
            });
            
            if ( ! inputs.passing()) {
                inputs.report();
                event.preventDefault();
            }
        });
    </script>
@stop
