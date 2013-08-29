@extends('layouts.master')

@include('elements.sidebar')
@include('elements.footer')

@section('body')
	@yield('footer')
	@yield('sidebar')
@stop

@section('scripts')
@stop
