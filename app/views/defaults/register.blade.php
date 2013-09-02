@extends('layouts.no_vertical_fill')

@include('elements.footer')

@section('body')
    <div class="register">
        <div class="copy">
            <div class="copy-title">
                <p class="copy-title-text">Thanks for your interest!</p>
            </div>
            <div class="copy-sub">
                <p class="copy-sub-text">Signing up is &hellip;</p>
            </div>
            <div class="copy-paragraph">
                <p class="copy-paragraph-text">&hellip; cooler than cool<br/>&hellip; smoother than silk.<br/>And only 5 minutes.</p>
            </div>
            <div class="copy-sub">
                <p class="copy-sub-text">About Us</p>
            </div>
            <div class="copy-paragraph">
                <p class="copy-paragraph-text">There's fun in exercise that can create healthy choices. See the reasons why to enroll your child.</p>
            </div>
        </div>
        {{ Form::open(['url' => '', 'class' => 'form']) }}
        <div class="input-cllctn">
            <div class="input-cllctn-input input">
                {{ Form::text('name', '', ['class' => 'input-cllctn-input-field input-field']) }}
                {{ Form::label('name', 'First &amp; Last Name', ['class' => 'input-cllctn-input-lbl input-lbl lbl visible']) }}
            </div>
            <div class="input-errors name-errors visible-toggle invisible">
            </div>
            <div class="input-cllctn-input input">
                {{ Form::text('email', '', ['class' => 'input-cllctn-input-field input-field']) }}
                {{ Form::label('email', 'youremail@example.com', ['class' => 'input-cllctn-input-lbl input-lbl lbl visible']) }}
            </div>
            <div class="input-errors email-errors visible-toggle invisible">
            </div>
            <div class="input-cllctn-input input">
                {{ Form::text('phone', '', ['class' => 'input-cllctn-input-field input-field']) }}
                {{ Form::label('phone', 'Phone', ['class' => 'input-cllctn-input-lbl input-lbl lbl visible']) }}
            </div>
            <div class="input-errors phone-errors visible-toggle invisible">
            </div>
            <div class="input-cllctn-input input">
                {{ Form::password('password', ['class' => 'input-cllctn-input-field input-field']) }}
                {{ Form::label('password', 'Password', ['class' => 'input-cllctn-input-lbl input-lbl lbl visible']) }}
            </div>
            <div class="input-errors password-errors visible-toggle invisible">
            </div>
            <div class="input-cllctn-input input input-small">
                {{ Form::password('password_confirm', ['class' => 'input-cllctn-input-field input-field']) }}
                {{ Form::label('password_confirm', 'Confirm Password', ['class' => 'input-cllctn-input-lbl input-lbl lbl visible']) }}
            </div>
            <div class="input-errors password-confirm-errors visible-toggle invisible">
            </div>
            <div class="input-cllctn-input input input-small">
                {{ Form::text('address', '', ['class' => 'input-cllctn-input-field input-field']) }}
                {{ Form::label('address', 'Street Address', ['class' => 'input-cllctn-input-lbl input-lbl lbl visible']) }}
            </div>
            <div class="input-errors address-errors visible-toggle invisible">
            </div>
            <div class="input-cllctn-input input">
                {{ Form::text('city', '', ['class' => 'input-cllctn-input-field input-field']) }}
                {{ Form::label('city', 'City', ['class' => 'input-cllctn-input-lbl input-lbl lbl visible']) }}
            </div>
            <div class="input-errors city-errors visible-toggle invisible">
            </div>
            <div class="input-cllctn-input input input-small">
                {{ Form::text('state', '', ['class' => 'input-cllctn-input-field input-field']) }}
                {{ Form::label('state', 'State', ['class' => 'input-cllctn-input-lbl input-lbl lbl visible']) }}
            </div>
            <div class="input-cllctn-input input input-small input-margin">
                {{ Form::text('zip_code', '', ['class' => 'input-cllctn-input-field input-field']) }}
                {{ Form::label('zip_code', 'Zip', ['class' => 'input-cllctn-input-lbl input-lbl lbl visible']) }}
            </div>
            <div class="input-errors state-errors visible-toggle invisible">
            </div>
            <div class="input-errors zip-code-errors visible-toggle invisible">
            </div>
            <div class="form-btn-wrap">
                <button class="form-btn btn btn-inactive">
                    <p class="btn-inactive-text visible">Nevermind</p>
                    <p class="btn-active-text invisible">Sign up</p>
                </button>
            </div>
        </div>
        {{ Form::close() }}
    </div>
    @yield('footer')

@stop

@section('scripts')
    <script src='{{ asset('js/Validator.js') }}'></script>
    <script>
        Input.defineFormat('password', function (value) {return value;});
        Input.defineFormat('password_confirm', function (value) {return value;});
        Input.defineFormat('state', function (value) {
            value = value.trim().toUpperCase();
            var index = $.inArray(value, myafterschoolprograms.states.full);
            if (index > -1) value = myafterschoolprograms.states.abbreviations[index];
            return value;
        });

        Input.defineRule('firstAndLast', function (value) {
            value = (value+'').split(/\s+/);
            return (value.length > 1);
        }, function (name) {return name+' should contain a first and last name.'});

        $('.form').on('input change', function (event) {
            var inputs = Input.test({
                inputs: Input.all().required()        
            });

            myafterschoolprograms.toggleButton($('.btn'), inputs.passing());
            $(event.target).parent().removeClass('input-has-errors');
            myafterschoolprograms.resetVisibility($(inputs.getErrorElement(event.target.name)), 0);
        });

        $('.form').on('submit', function (event) {
            var inputs = Input.test({
                name: Input.get('name').required().firstAndLast(),
                email: Input.get('email').required().email(),
                phone: Input.get('phone').required().numeric().size(10),
                password: Input.get('password').required().max(6).matches('password_confirm'),
                address: Input.get('address').required(),
                city: Input.get('city').required(),
                state: Input.get('state').required().in(myafterschoolprograms.states.abbreviations),
                zip_code: Input.get('zip_code').required().numeric().size(5),
            });
            
            if ( ! inputs.passing()) {
                inputs.report();
                event.preventDefault();
            }
        });
    </script>
@stop
