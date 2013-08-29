@extends('layouts.master')

@include('elements.footer')

@section('body')
    {{ Form::open([
        'url' => '',
        'id'  => 'Register-Form',
    ]) }}
    {{ Form::close() }}
    <div id="Name-Page" class="page show">
        <div class="horizontal-center-wrapper">
            <div class="vertical-center-outer-wrapper">
                <div class="vertical-center-inner-wrapper">
                    <div id="Header" class="header">
                        <div class="heading">
                            <p>How about your name?</p>
                        </div>
                        <div class="subheading">
                            <p>(No middle name, please)</p>
                        </div>
                    </div>
                    <div id="Name-Input" class="input-collection input-wrapper">
                        {{ Form::text('name') }}
                        {{ Form::label('name', 'First &amp; Last Name', ['class' => 'visible']) }}
                        <div id="Name-Check" class="invisible">
                            <p>So, this is you? <span id="Last-Name-Check"></span>, <span id="First-Name-Check"></span></p>
                        </div>
                        <button class="inactive">
                            <p class="active-option invisible">Yes, that's me</p>
                            <p class="inactive-option visible">Still Typing...</p>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="Email-Page" class="page hide-right">
        <div class="horizontal-center-wrapper">
            <div class="vertical-center-outer-wrapper">
                <div class="vertical-center-inner-wrapper">
                    <div id="Header" class="header">
                        <div class="heading">
                            <p>Which email would you like to use?</p>
                        </div>
                        <div class="subheading">
                            <p>Your email is what you use to sign in, once you've registered.</p>
                        </div>
                    </div>
                    <div id="Email-Input" class="input-collection input-wrapper">
                        {{ Form::text('email') }}
                        {{ Form::label('email', 'youremail@example.com', ['class' => 'visible']) }}
                        <button class="inactive">
                            <p class="active-option invisible">Next!</p>
                            <p class="inactive-option visible">Still Typing...</p>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="Password-Page" class="page hide-right">
        <div class="horizontal-center-wrapper">
            <div class="vertical-center-outer-wrapper">
                <div class="vertical-center-inner-wrapper">
                    <div id="Header" class="header">
                        <div class="heading">
                            <p>Password, please</p>
                        </div>
                        <div class="subheading">
                            <p>Concerned? <a href='#'>Read</a> what we're doing to keep you safe.</p>
                        </div>
                    </div>
                    <div id="Password-Input-Collection" class="input-collection">
                        <div id="Password-Input" class="input-wrapper">
                            {{ Form::password('password') }}
                            {{ Form::label('password', 'Password', ['class' => 'visible']) }}
                        </div>
                        <div id="Confirm-Password-Input" class="input-wrapper">
                            {{ Form::password('confirm_password') }}
                            {{ Form::label('confirm_password', 'Confirm Password', ['class' => 'visible']) }}
                            <div id="Password-Check" class="invisible">
                                <p class='longer-than-six invisible'>Just make sure it's longer than six characters.</p>
                                <p class='must-match invisible'><span class='check-and invisible'>Also, t</span><span class='check-no-and visible'>T</span>he two passwords must match.</p>
                            </div>
                            <button class="inactive">
                                <p class="active-option invisible">Next!</p>
                                <p class="inactive-option visible">Still Typing...</p>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="Address-Page" class="page hide-right">
        <div class="horizontal-center-wrapper">
            <div class="vertical-center-outer-wrapper">
                <div class="vertical-center-inner-wrapper">
                    <div id="Header" class="header">
                        <div class="heading">
                            <p>Where do you live?</p>
                        </div>
                    </div>
                    <div id="Address-Input-Collection" class="input-collection">
                        <div id="Address-Input" class="input-wrapper">
                            {{ Form::text('address') }}
                            {{ Form::label('address', 'Street Address', ['class' => 'visible']) }}
                        </div>
                        <div id="City-Input" class="input-wrapper">
                            {{ Form::text('city') }}
                            {{ Form::label('city', 'City', ['class' => 'visible']) }}
                        </div>
                        <div id="State-Input" class="input-wrapper">
                            {{ Form::text('State') }}
                            {{ Form::label('State', 'State', ['class' => 'visible']) }}
                        </div>
                        <div id="Zip-Code-Input" class="input-wrapper">
                            {{ Form::text('zip_code') }}
                            {{ Form::label('zip_code', 'Zip', ['class' => 'visible']) }}
                        </div>
                        <div>
                            <div id="Address-Check" class="invisible">
                            </div>
                            <button class="inactive">
                                <p class="active-option invisible">Done!</p>
                                <p class="inactive-option visible">Still Typing...</p>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @yield('footer')

@stop

@section('scripts')
    <script>
        //Name Button activation
        $('#Name-Input').on('input', function () {
            var name = $('#Name-Input input').val().trim().split(/ (.+)?/),
                has_first_and_last = (name.length > 1 && name[1].length > 0);

            myafterschoolprograms.resetVisibility('#Name-Check', has_first_and_last);
            myafterschoolprograms.toggleButton('#Name-Input button', has_first_and_last);

            if (has_first_and_last) {
                $('#First-Name-Check').html(name[0]);
                $('#Last-Name-Check').html(name[1]);
            }

        });

        //Email Button activation
        $('#Email-Input').on('input', function () {
            var email = $('#Email-Input input').val().trim(),
                email_reg_exp = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i,
                is_an_email = email_reg_exp.test(email);

            myafterschoolprograms.toggleButton('#Email-Input button', is_an_email);
        });

        //Password Button activation
        $('#Password-Input-Collection').on('input', function () {
            var password = $('#Password-Input input').val(),
                confirm_password = $('#Confirm-Password-Input input').val(),
                are_filled = (confirm_password.length > 0 && password.length > 0),
                are_matching = (password === confirm_password),
                are_longer_than_six = (password.length >= 6);

            myafterschoolprograms.resetVisibility('#Password-Check', (are_filled && (!are_matching || !are_longer_than_six)));
            myafterschoolprograms.resetVisibility('.longer-than-six', are_filled && !are_longer_than_six);
            myafterschoolprograms.resetVisibility('.check-and', are_filled && !are_longer_than_six);
            myafterschoolprograms.resetVisibility('.check-no-and', are_filled && are_longer_than_six);
            myafterschoolprograms.resetVisibility('.must-match', are_filled && !are_matching);

            myafterschoolprograms.toggleButton('#Password-Input-Collection button', (are_matching && are_longer_than_six));
        });

        //Address Button activation
        $('#Address-Input-Collection').on('input', function () {
            var address = $('#Address-Input input').val().trim(),
                city = $('#City-Input input').val().trim(),
                state = $('#State-Input input').val().trim(),
                zip = $('#Zip-Code-Input input').val().trim(),
                is_state = ($.inArray(state, myafterschoolprograms.states) > -1),
                is_zip = (/^\d+$/.test(zip)),
                are_filled = (address.length > 0 && city.length > 0 && state.length > 0 && zip.length > 0);

                console.log(is_zip+' '+is_state+' '+are_filled)

            myafterschoolprograms.toggleButton('#Address-Input-Collection button', is_state && is_zip && are_filled);
        });

        $('.page button').on('click', function () {
            if ($(this).hasClass('active')) {
                $(this).parents('.page').toggleClass('show hide-left');
                $(this).parents('.page').next().toggleClass('hide-right show');
            }
        });
    </script>
@stop
