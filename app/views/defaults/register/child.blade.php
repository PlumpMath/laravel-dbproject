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
                <p class="copy-paragraph-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <p class="copy-paragraph-text">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
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

            @if ($errors->first('school'))
            <div class="input-cllctn-input input input-has-errors">
            @else
            <div class="input-cllctn-input input">
            @endif
                {{ Form::text('school', '', ['class' => 'input-cllctn-input-field input-field']) }}
                {{ Form::label('school', 'School', ['class' => 'input-cllctn-input-lbl input-lbl lbl visible']) }}
            </div>
            @if ($errors->first('school'))
            <div class="input-errors school-errors visible-toggle visible">
                <p>{{ $errors->first('school') }}</p>
            </div>
            @else
            <div class="input-errors school-errors visible-toggle invisible">
            </div>
            @endif

            @if ($errors->first('birthday'))
            <div class="input-cllctn-input input input-has-errors">
            @else
            <div class="input-cllctn-input input">
            @endif
                <i class="input-icon icon icon-calendar"></i>
                <input name="birthday" class="input-cllctn-input-field input-field input-has-icon" />
                {{ Form::label('birthday', 'Birthday', ['class' => 'input-cllctn-input-lbl input-lbl input-has-icon lbl visible']) }}
            </div>
            @if ($errors->first('birthday'))
            <div class="input-errors birthday-errors visible-toggle visible">
                <p>{{ $errors->first('birthday') }}</p>
            </div>
            @else
            <div class="input-errors birthday-errors visible-toggle invisible">
            </div>
            @endif

            @if ($errors->first('grade'))
            <div class="input-cllctn-input input input-small input-has-errors">
            @else
            <div class="input-cllctn-input input input-small">
            @endif
                {{ Form::text('grade', '', ['class' => 'input-cllctn-input-field input-field']) }}
                {{ Form::label('grade', 'Grade', ['class' => 'input-cllctn-input-lbl input-lbl lbl visible']) }}
            </div>

            @if ($errors->first('gender'))
            <div class="input-cllctn-input input input-small input-margin input-has-errors">
            @else
            <div class="input-cllctn-input input input-small input-margin">
            @endif
                <select name="gender" class="input-cllctn-input-field input-field">
                    <option value="none" class="input-default">Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                {{ Form::label('gender', 'Gender', ['class' => 'input-cllctn-input-lbl input-lbl lbl visible']) }}
            </div>

            @if ($errors->first('grade'))
            <div class="input-errors grade-errors visible-toggle visible">
                <p>{{ $errors->first('grade') }}</p>
            </div>
            @else
            <div class="input-errors grade-errors visible-toggle invisible">
            </div>
            @endif

            @if ($errors->first('gender'))
            <div class="input-errors gender-errors visible-toggle visible">
                <p>{{ $errors->first('gender') }}</p>
            </div>
            @else
            <div class="input-errors gender-errors visible-toggle invisible">
            </div>
            @endif

            @if ($errors->first('returning_player'))
            <div class="input-cllctn-input input input-not-text input-has-errors">
            @else
            <div class="input-cllctn-input input input-not-text">
            @endif
                <input type="checkbox" name="returning_player" value="on" class="input-cllctn-input-checkbox input-checkbox" />
                <label for="returning_player" class="input-cllctn-input-checkbox-lbl input-checkbox-lbl lbl visible">Returning Player<i class="btn-input-message icon icon-question-sign"></i></label>
            </div>
            <div class="input-message returning-player-message visible-toggle invisible">
                <p class="input-message-text">Checking this box tells us that your child has been registered and participated in one our classes before.</p>
            </div>
            @if ($errors->first('returning_player'))
            <div class="input-errors returning-player-errors visible-toggle visible">
                <p>{{ $errors->first('returning_player') }}</p>
            </div>
            @else
            <div class="input-errors returning-player-errors visible-toggle invisible">
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
    <script src='{{ asset('js/vendor/typeahead.min.js') }}'></script>
    <script src='{{ asset('js/Validator.js') }}'></script>
    <script>
        Input.defineRule('firstAndLast', function (value) {
            value = (value+'').split(/\s+/);
            return (value.length > 1);
        }, function (name) {return name+' should contain a first and last name.'});

        $('input[name=school]').typeahead({
            name: 'schools',
            prefetch: '{{ asset('js/schools.json') }}'
        });

        $('.btn-input-message').on('click', function (event) {
            myafterschoolprograms.toggleVisibility(event, '.input-message');
        });
        
        $('.form').on('input change', function (event) {
            var inputs = Input.test({
                inputs: Input.all().required()        
            });

            $(event.target).parents('.input').removeClass('input-has-errors');
            myafterschoolprograms.resetVisibility($(inputs.getErrorElement(event.target.name)), 0);
        });

        $('.form').on('submit', function (event) {
            var inputs = Input.test({
                name: Input.get('name').required().firstAndLast(),
                school: Input.get('school').required(),
                birthday: Input.get('birthday').required().date(),
                grade: Input.get('grade').required().numeric(),
                gender: Input.get('gender').required().not('none')
            });
            
            if ( ! inputs.passing()) {
                inputs.report();
                event.preventDefault();
            }
        });
    </script>
@stop
