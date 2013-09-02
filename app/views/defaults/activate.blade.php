@extends('layouts.master')

@include('elements.footer')

@section('body')
    <div class="verify vert-outer-wrap vert-stretch">
        <div class="vert-inner-wrap">
        	<div class="copy">
        		<div class="copy-title">
        			<p class="copy-title-text">Account activated!</p>
        		</div>
        		<div class="copy-paragraph">
        			<p class="copy-paragraph-text">We&rsquo;re redirecting you to your homepage in <span class="countdown-seconds"></span> <span class="countdown-ellipsis"></span></p>
                    <p class="copy-paragraph-text">Alternatively, you could click <a href="{{ $url['home'] }}">here</a> to go there now.</p>
                </div>
        	</div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        (function (window) {
            var url = '{{ $url['home'] }}',
                seconds_to_redirect = 10,
                countdown_seconds = $('.countdown-seconds'),
                countdown_ellipsis = $('.countdown-ellipsis'),
                redirect = setInterval(function () {
                seconds_to_redirect--;

                if (seconds_to_redirect === 0) {
                    clearInterval(redirect);
                    window.location.replace = url;
                }
            }, 1000)
        })(window)
    </script>
@stop
