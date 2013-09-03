@extends('layouts.no_vertical_fill')

@include('elements.footer')

@section('body')
    <div class="register register-child">
        <div class="copy">
            <div class="copy-title">
                <p class="copy-title-text">You made it!</p>
            </div>
            <div class="copy-sub">
                <p class="copy-sub-text">Now let's sign up your kids</p>
            </div>
            <div class="copy-paragraph">
                <p class="copy-paragraph-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat.</p>
            </div>
        </div>
        {{ Form::open(['url' => $url['verify'], 'class' => 'form']) }}
        <div class="input-cllctn">
            @if ($errors->first('first_name') || $errors->first('last_name'))
            <div class="input-cllctn-input input input-has-errors">
            @else
            <div class="input-cllctn-input input">
            @endif
                {{ Form::text('name', '', ['class' => 'input-cllctn-input-field input-field']) }}
                {{ Form::label('name', 'First &amp; Last Name', ['class' => 'input-cllctn-input-lbl input-lbl lbl visible']) }}
            </div>
            @if ($errors->first('first_name'))
            <div class="input-errors name-errors visible-toggle visible">
                <p>Name is required.</p>
            </div>
            @elseif ($errors->first('last_name'))
            <div class="input-errors name-errors visible-toggle visible">
                <p>Name should contain a first and last name.</p>
            </div>
            @else
            <div class="input-errors name-errors visible-toggle invisible">
            </div>
            @endif
            @if ($errors->first('email'))
            <div class="input-cllctn-input input input-has-errors">
            @else
            <div class="input-cllctn-input input">
            @endif
                {{ Form::text('email', '', ['class' => 'input-cllctn-input-field input-field']) }}
                {{ Form::label('email', 'youremail@example.com', ['class' => 'input-cllctn-input-lbl input-lbl lbl visible']) }}
            </div>
            @if ($errors->first('email'))
            <div class="input-errors email-errors visible-toggle visible">
                <p>{{ $errors->first('email') }}</p>
            </div>
            @else
            <div class="input-errors email-errors visible-toggle invisible">
            </div>
            @endif
            @if ($errors->first('phone'))
            <div class="input-cllctn-input input input-has-errors">
            @else
            <div class="input-cllctn-input input">
            @endif
                {{ Form::text('phone', '', ['class' => 'input-cllctn-input-field input-field']) }}
                {{ Form::label('phone', 'Phone', ['class' => 'input-cllctn-input-lbl input-lbl lbl visible']) }}
            </div>
            @if ($errors->first('phone'))
            <div class="input-errors phone-errors visible-toggle visible">
                <p>{{ $errors->first('phone') }}</p>
            </div>
            @else
            <div class="input-errors phone-errors visible-toggle invisible">
            </div>
            @endif
            @if ($errors->first('password'))
            <div class="input-cllctn-input input input-has-errors">
            @else
            <div class="input-cllctn-input input">
            @endif
                {{ Form::password('password', ['class' => 'input-cllctn-input-field input-field']) }}
                {{ Form::label('password', 'Password', ['class' => 'input-cllctn-input-lbl input-lbl lbl visible']) }}
            </div>
            @if ($errors->first('password'))
            <div class="input-errors password-errors visible-toggle visible">
                <p>{{ $errors->first('password') }}</p>
            </div>
            @else
            <div class="input-errors password-errors visible-toggle invisible">
            </div>
            @endif
            <div class="input-cllctn-input input">
                {{ Form::password('password_confirm', ['class' => 'input-cllctn-input-field input-field']) }}
                {{ Form::label('password_confirm', 'Confirm Password', ['class' => 'input-cllctn-input-lbl input-lbl lbl visible']) }}
            </div>
            @if ($errors->first('address'))
            <div class="input-cllctn-input input input-has-errors">
            @else
            <div class="input-cllctn-input input">
            @endif
                {{ Form::text('address', '', ['class' => 'input-cllctn-input-field input-field']) }}
                {{ Form::label('address', 'Street Address', ['class' => 'input-cllctn-input-lbl input-lbl lbl visible']) }}
            </div>
            @if ($errors->first('address'))
            <div class="input-errors address-errors visible-toggle visible">
                <p>{{ $errors->first('address') }}</p>
            </div>
            @else
            <div class="input-errors address-errors visible-toggle invisible">
            </div>
            @endif
            @if ($errors->first('city'))
            <div class="input-cllctn-input input input-has-errors">
            @else
            <div class="input-cllctn-input input">
            @endif
                {{ Form::text('city', '', ['class' => 'input-cllctn-input-field input-field']) }}
                {{ Form::label('city', 'City', ['class' => 'input-cllctn-input-lbl input-lbl lbl visible']) }}
            </div>
            @if ($errors->first('city'))
            <div class="input-errors city-errors visible-toggle visible">
                <p>{{ $errors->first('city') }}</p>
            </div>
            @else
            <div class="input-errors city-errors visible-toggle invisible">
            </div>
            @endif
            @if ($errors->first('state'))
            <div class="input-cllctn-input input input-small input-has-errors">
            @else
            <div class="input-cllctn-input input input-small">
            @endif
                {{ Form::text('state', '', ['class' => 'input-cllctn-input-field input-field']) }}
                {{ Form::label('state', 'State', ['class' => 'input-cllctn-input-lbl input-lbl lbl visible']) }}
            </div>
            @if ($errors->first('zip_code'))
            <div class="input-cllctn-input input input-small input-margin input-has-errors">
            @else
            <div class="input-cllctn-input input input-small input-margin">
            @endif
                {{ Form::text('zip_code', '', ['class' => 'input-cllctn-input-field input-field']) }}
                {{ Form::label('zip_code', 'Zip', ['class' => 'input-cllctn-input-lbl input-lbl lbl visible']) }}
            </div>
            @if ($errors->first('state'))
            <div class="input-errors state-errors visible-toggle visible">
                <p>{{ $errors->first('state') }}</p>
            </div>
            @else
            <div class="input-errors state-errors visible-toggle invisible">
            </div>
            @endif
            @if ($errors->first('zip_code'))
            <div class="input-errors zip-code-errors visible-toggle visible">
                <p>{{ $errors->first('zip_code') }}</p>
            </div>
            @else
            <div class="input-errors zip-code-errors visible-toggle invisible">
            </div>
            @endif
            <div class="form-btn-wrap">
                <button class="form-btn btn btn-active">
                    <p class="btn-active-text visible">Sign up</p>
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
