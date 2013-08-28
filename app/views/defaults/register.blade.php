@extends('layouts.master')

@include('elements.footer')

@section('body')
    {{ Form::open([
        'url' => '',
        'id'  => 'Register-Form',
    ]) }}
    {{ Form::close() }}
    <div id="Name-Page" class="page">
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
                    <div id="Name-Input" class="input-wrapper">
                        {{ Form::text('name') }}
                        {{ Form::label('name', 'First &amp; Last Name', ['class' => 'visible']) }}
                        <div id="Name-Check" class="invisible">
                            <p>So, this is you? <span id="Last-Name-Check"></span>, <span id="First-Name-Check"></span></p>
                        </div>
                        <button class="inactive">
                            <p class="active-option invisible">Yes, that's me</p>
                            <p class="inactive-option visible">We'll wait for a name</p>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @yield('footer')

@stop

@section('scripts')
    <script>
        $('#Name-Input').on('input', function (event) {
            var name = $('#Name-Input input').val().trim().split(/ (.+)?/),
                has_first_and_last = (name.length > 1 && name[1].length > 0);

            console.log(name)

            myafterschoolprograms.resetVisibility('#Name-Check', has_first_and_last);
            myafterschoolprograms.toggleButton('#Name-Input button', has_first_and_last);

            if (has_first_and_last) {
                $('#First-Name-Check').html(name[0]);
                $('#Last-Name-Check').html(name[1]);
            }

        });
    </script>
@stop
