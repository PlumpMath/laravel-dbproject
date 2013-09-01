@extends('layouts.master')

@include('elements.footer')

@section('body')
    {{ Form::open([
        'url' => '',
        'id'  => 'Register-Form',
    ]) }}
    {{ Form::close() }}
    <div class="page page-name page-show vert-stretch">
        <div class="vert-outer-wrap vert-stretch">
            <div class="vert-inner-wrap">
                <div class="page-header header">
                    <div class="header-title">
                        <p class="header-title-text">How about your name?</p>
                    </div>
                    <div class="header-sub">
                        <p class="header-title-text">(No middle name, please)</p>
                    </div>
                </div>
                <div class="page-input-cllctn input-cllctn">
                    <div class="page-input-cllctn-input input">
                        {{ Form::text('name', '', ['class' => 'page-input-cllctn-input-field input-field']) }}
                        {{ Form::label('name', 'First &amp; Last Name', ['class' => 'page-input-cllctn-input-lbl input-lbl lbl visible']) }}
                    </div>
                    <div class="page-validation invisible">
                        <p class="page-validation-text">So, this is you? <span class="page-validation-last-name-check"></span>, <span id="page-validation-first-name-check"></span></p>
                    </div>
                    <div class="page-btn btn btn-inactive">
                        <p class="btn-active-text invisible">Yes, that's me</p>
                        <p class="btn-inactive-text visible">...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page page-email page-hide-right vert-stretch">
        <div class="vert-outer-wrap vert-stretch">
            <div class="vert-inner-wrap">
                <div class="page-header header">
                    <div class="header-title">
                        <p class="header-title-text">Which email will you use?</p>
                    </div>
                    <div class="header-sub">
                        <p class="header-title-text">Later, you'll use this email to sign in</p>
                    </div>
                </div>
                <div class="page-input-cllctn input-cllctn">
                    <div class="page-input-cllctn-input input">
                        {{ Form::text('email', '', ['class' => 'page-input-cllctn-input-field input-field']) }}
                        {{ Form::label('email', 'your_email@example.com', ['class' => 'page-input-cllctn-input-lbl input-lbl lbl visible']) }}
                    </div>
                    <div class="page-validation invisible">
                        <p class="page-validation-text">Someone's using that email!</p>
                    </div>
                    <div class="page-btn btn btn-inactive">
                        <p class="btn-active-text invisible">I'll use this one</p>
                        <p class="btn-inactive-text visible">...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page page-pwd page-hide-right vert-stretch">
        <div class="vert-outer-wrap vert-stretch">
            <div class="vert-inner-wrap">
                <div class="page-header header">
                    <div class="header-title">
                        <p class="header-title-text">A password, please</p>
                    </div>
                    <div class="header-sub">
                        <p class="header-title-text">Find out what we're doing to keep you safe.</p>
                    </div>
                </div>
                <div class="page-input-cllctn input-cllctn">
                    <div class="page-input-cllctn-input input">
                        {{ Form::password('password', ['class' => 'page-input-cllctn-input-field input-field']) }}
                        {{ Form::label('pwd', 'Password', ['class' => 'page-input-cllctn-input-lbl input-lbl lbl visible']) }}
                    </div>
                    <div class="page-input-cllctn-pwd-input input">
                        {{ Form::password('password_confirm', ['class' => 'page-input-cllctn-pwd-input-field input-field']) }}
                        {{ Form::label('password_confirm', 'Confirm Password', ['class' => 'page-input-cllctn-pwd-input-lbl input-lbl lbl visible']) }}
                    </div>
                    <div class="page-validation invisible">
                        <div class="page-validation-longer-than-six invisible">
                            <p class="page-validation-longer-than-six-text">Whoops, your password is only <span class="page-validation-longer-than-six-number-of-characters"></span> character<span class="page-validation-longer-than-six-more-than-one visible">s</span> long. Only <span class="page-validation-longer-than-six-number-to-go"></span> more to go.</p>
                        </div>
                        <div class="page-validation-must-match invisible">
                            <p class="page-validation-must-match-text"><span class="page-validation-must-match-and-longer-than-six invisible">Also, </span><span class="page-valdiation-must-match-only visible">Make sure </span>the two passwords match.</p>
                        </div>
                    </div>
                    <div class="page-btn btn btn-inactive">
                        <p class="btn-active-text invisible">Don't peek!</p>
                        <p class="btn-inactive-text visible">...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page page-address page-hide-right vert-stretch">
        <div class="vert-outer-wrap vert-stretch">
            <div class="vert-inner-wrap">
                <div class="page-header header">
                    <div class="header-title">
                        <p class="header-title-text">And finally, your address?</p>
                    </div>
                    <div class="header-sub">
                        <p class="header-title-text">We'll use this to ease class selection, later.</p>
                    </div>
                </div>
                <div class="page-input-cllctn input-cllctn">
                    <div class="page-input-cllctn-input input">
                        {{ Form::text('address', '', ['class' => 'page-input-cllctn-input-field input-field']) }}
                        {{ Form::label('address', 'Street Address', ['class' => 'page-input-cllctn-input-lbl input-lbl lbl visible']) }}
                    </div>
                    <div class="page-input-cllctn-input input">
                        {{ Form::text('city', '', ['class' => 'page-input-cllctn-input-field input-field']) }}
                        {{ Form::label('city', 'City', ['class' => 'page-input-cllctn-input-lbl input-lbl lbl visible']) }}
                    </div>
                    <div class="page-input-cllctn-input input">
                        {{ Form::text('state', '', ['class' => 'page-input-cllctn-input-field input-field']) }}
                        {{ Form::label('state', 'State', ['class' => 'page-input-cllctn-input-lbl input-lbl lbl visible']) }}
                    </div>
                    <div class="page-input-cllctn-input input">
                        {{ Form::text('zip_code', '', ['class' => 'page-input-cllctn-input-field input-field']) }}
                        {{ Form::label('zip_code', 'State', ['class' => 'page-input-cllctn-input-lbl input-lbl lbl visible']) }}
                    </div>
                    <div class="page-validation invisible">
                        <p class="page-validation-longer-than-six-text"></p>
                    </div>
                    <div class="page-btn btn btn-inactive">
                        <p class="btn-active-text invisible">Don't peek!</p>
                        <p class="btn-inactive-text visible">...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @yield('footer')

@stop

@section('scripts')
    <script src='{{ asset('js/Validator.js') }}'></script>
    <script>
        Input.get('name').required().alphadash().verbose();
        Input.get('email').required().email().verbose();
        Input.get('password').required().min(6).matches('password_confirm').verbose();
        Input.get('address').required().verbose();
        Input.get('city').required().verbose();
        Input.get('state').required().in(myafterschoolprograms.states).size(2).verbose();
        Input.get('zip_code').required().numeric().size(5).verbose();
    </script>
@stop
