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
        			<p class="copy-paragraph-text">We&rsquo;re redirecting you to the homepage in <br/><span class="countdown-seconds">10 seconds</span> <span class="countdown-ellipsis">...</span></p>
                    <p class="copy-paragraph-text">Alternatively, you could click <a href="{{ $url['home'] }}">here</a> to go there now.</p>
                </div>
        	</div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        (function () {
            var url                 = '{{ $url['home'] }}',
                seconds_to_redirect = 11,
                ellipsis            = '',
                seconds             = 'seconds',
                countdown_seconds   = $('.countdown-seconds'),
                countdown_ellipsis  = $('.countdown-ellipsis'),
                redirect            = setInterval(function () {
                    seconds_to_redirect--;
                    seconds = (seconds_to_redirect === 1) ? 'second' : 'seconds';
                    countdown_seconds.html(seconds_to_redirect+' '+seconds);

                    if (seconds_to_redirect <= 0) {
                        clearInterval(redirect);
                        window.location = url;
                    }
                }, 1000);

            setInterval(function() {
                if (ellipsis.length === 3) {
                    ellipsis = '';
                } else {
                    ellipsis += '.';
                }

                console.log(ellipsis);

                countdown_ellipsis.html(ellipsis);
            }, 750)

        })()
    </script>
@stop
