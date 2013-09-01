@extends('layouts.no_vertical_fill')

@include('elements.footer')

@section('body')
    <div class="register wrap">
        {{ Form::open(['url' => '', 'class' => 'form']) }}
        <div class="input-cllctn">
            <div class="input-cllctn-input input">
                {{ Form::text('name', '', ['class' => 'input-cllctn-input-field input-field']) }}
                {{ Form::label('name', 'First &amp; Last Name', ['class' => 'input-cllctn-input-lbl input-lbl lbl visible']) }}
            </div>
            <div class="input-errors name-errors">
            </div>
            <div class="input-cllctn-input input">
                {{ Form::text('email', '', ['class' => 'input-cllctn-input-field input-field']) }}
                {{ Form::label('email', 'youremail@example.com', ['class' => 'input-cllctn-input-lbl input-lbl lbl visible']) }}
            </div>
            <div class="input-errors email-errors">
            </div>
            <div class="input-cllctn-input input">
                {{ Form::text('phone', '', ['class' => 'input-cllctn-input-field input-field']) }}
                {{ Form::label('phone', '(555) 555-5555', ['class' => 'input-cllctn-input-lbl input-lbl lbl visible']) }}
            </div>
            <div class="input-errors phone-errors">
            </div>
            <div class="input-cllctn-input input">
                {{ Form::password('password', ['class' => 'input-cllctn-input-field input-field']) }}
                {{ Form::label('password', 'Password', ['class' => 'input-cllctn-input-lbl input-lbl lbl visible']) }}
            </div>
            <div class="input-errors password-errors">
            </div>
            <div class="input-cllctn-input input input-small">
                {{ Form::password('password_confirm', ['class' => 'input-cllctn-input-field input-field']) }}
                {{ Form::label('password_confirm', 'Confirm Password', ['class' => 'input-cllctn-input-lbl input-lbl lbl visible']) }}
            </div>
            <div class="input-errors password-confirm-errors">
            </div>
            <div class="input-cllctn-input input input-small">
                {{ Form::text('address', '', ['class' => 'input-cllctn-input-field input-field']) }}
                {{ Form::label('address', 'Street Address', ['class' => 'input-cllctn-input-lbl input-lbl lbl visible']) }}
            </div>
            <div class="input-errors address-errors">
            </div>
            <div class="input-cllctn-input input">
                {{ Form::text('city', '', ['class' => 'input-cllctn-input-field input-field']) }}
                {{ Form::label('city', 'City', ['class' => 'input-cllctn-input-lbl input-lbl lbl visible']) }}
            </div>
            <div class="input-errors city-errors">
            </div>
            <div class="input-cllctn-input input input-small">
                {{ Form::text('state', '', ['class' => 'input-cllctn-input-field input-field']) }}
                {{ Form::label('state', 'State', ['class' => 'input-cllctn-input-lbl input-lbl lbl visible']) }}
            </div>
            <div class="input-cllctn-input input input-small">
                {{ Form::text('zip_code', '', ['class' => 'input-cllctn-input-field input-field']) }}
                {{ Form::label('zip_code', 'Zip', ['class' => 'input-cllctn-input-lbl input-lbl lbl visible']) }}
            </div>
            <div class="input-errors state-errors">
            </div>
            <div class="input-errors zip-code-errors">
            </div>
            <div class="form-btn-wrap">
                <button class="form-btn btn btn-inactive">
                    <p class="btn-inactive-text visible">Nevermind...</p>
                    <p class="btn-active-text invisible">All done!</p>
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
        Input.defineFormat('password', function (value) { return value;});
        Input.defineFormat('password_confirm', function (value) { return value;});

        Input.defineFormat('state', function (value) {

            value = value.trim().toUpperCase();

            var index = $.inArray(value, myafterschoolprograms.states.full);

            if (index > -1) value = myafterschoolprograms.states.abbreviations[index];

            return value;
        });

        $('.form').on('submit', function (event) {
            event.preventDefault();

            var inputs = {
                name: Input.get('name').required().alphadash(),
                email: Input.get('email').required().email(),
                phone: Input.get('phone').required().numeric().size(10),
                password: Input.get('password').required().min(6).matches('password_confirm'),
                address: Input.get('address').required(),
                city: Input.get('city').required(),
                state: Input.get('state').required().in(myafterschoolprograms.states.abbreviations).size(2),
                zip_code: Input.get('zip_code').required().numeric().size(5),
                getErrorElement: function (name) {
                    var name = name.split('_').join('-');

                    return '.'+name+'-errors';
                },
                passing: function () {
                    var pass = true;

                    for (i in this) {
                        if (this[i].hasOwnProperty('passes')) {
                            pass = pass && this[i].passes;
                        }
                    }

                    return pass;
                },
                report: function () {
                    var output = '',
                        element,
                        msg;

                    for (i in this) {
                        if (this[i].hasOwnProperty('errors')) {
                            element = this.getErrorElement(i)
                            output = '';

                            for (error in this[i].errors) {
                                msg = this[i].errors[error].message;

                                output += '<p>'+msg+'</p>';
                            }

                            $(element).html(output);
                        }
                    }
                }
            }

            if ( ! inputs.passing()) {
                inputs.report();
            }
        });
    </script>
@stop
