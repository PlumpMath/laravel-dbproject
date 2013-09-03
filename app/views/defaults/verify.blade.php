@extends('layouts.master')

@include('elements.footer')

@section('body')
    <div class="verify vert-outer-wrap vert-stretch">
        <div class="vert-inner-wrap">
        	<div class="copy">
        		<div class="copy-title">
        			<p class="copy-title-text">Verifying your email</p>
        		</div>
        		<div class="copy-paragraph">
        			<p class="copy-paragraph-text">We&rsquo;ve sent you an email containing a link to activate your account. It may take a few minutes for the email to arrive.</p>
                    <p class="copy-paragraph-text">Would you like us to <a href="{{ $url['another_email'] }}">send another?</a></p>
        		</div>
        	</div>
        </div>
    </div>
@stop
