@extends('layouts.master')

@include('elements.footer')

@section('body')
    <div class="verify vert-outer-wrap vert-stretch">
        <div class="vert-inner-wrap">
        	<div class="copy">
                <div class="copy-title copy-title-big">
                    <i class="icon icon-ok"></i>
                </div>
        		<div class="copy-title">
        			<p class="copy-title-text">Great :)</p>
        		</div>
                <div class="copy-sub">
                    <p class="copy-sub-text">{{ $child->first_name}}'s now a registered player!</p>
                </div>
        		<div class="copy-paragraph">
        			<p class="copy-paragraph-text">Shall we <a href="{{ $url['sign_up'] }}">sign @if($child->gender === 'male'){{ 'him' }}@else{{ 'her' }}@endif up</a> for a class?</br>... or <a href="{{ $url['register'] }}">register</a> another child?</p>
        		</div>
        	</div>
        </div>
    </div>

    @yield('footer')

@stop
