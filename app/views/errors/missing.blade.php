@extends('layouts.master')

@include('elements.footer')

@section('body')
    <div class="missing vert-outer-wrap vert-stretch">
        <div class="vert-inner-wrap">
            <div class="copy">
                <div class="copy-title copy-title-big">
                    <i class="icon icon-remove-sign"></i>
                </div>
                <div class="copy-title">
                    <p class="copy-title-text">Oops! Wasn't something here just a moment ago?</p>
                </div>
                <div class="copy-sub">
                    <p class="copy-sub-text">In any case...</p>
                </div>
                <div class="copy-paragraph">
                    <p class="copy-paragraph-text">It seems fate has had you stumble into some crepuscular recess of this website. Perhaps it's wise to <a class="missing-retrace" href="{{ $url['home'] }}">retrace your steps</a> and hope nothing follows you out...</p>
                </div>
            </div>
        </div>
    </div>

    @yield('footer')

@stop

@section('scripts')
    <script>
        $('.missing-retrace').on('click', function (event) {
            event.preventDefault();
            history.back();
        });
    </script>
@stop
