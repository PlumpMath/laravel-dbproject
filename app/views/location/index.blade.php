@extends('layouts.master')
@include('elements.sidebar')
@section('body')
  <div class='commands hidden'>
    {{ Form::open(array('url' => action('LocationController@store'))) }}
    <input type='hidden' value='' id='locations_to_affect' name='locations_to_affect'>
    <button type='submit' name='copy_submit' class='location_submit'>
      <div class='copy icon'>
        <i class='icon-copy'></i>
        <p>copy?</p>
      </div>
    </button>
    <button type='submit' name='delete_submit' class='location_submit'>
      <div class='delete icon'>
        <i class='icon-trash'></i>
        <p>delete?</p>
      </div>
    </button>
    {{ Form::close() }}
  </div>
@yield('sidebar')
<div class='table'>
  <div class='content'>
    <div class='header'>
      <div class='title'>Locations</div>
      <div class='address'>Last modified: {{ $date }}</div>
    </div>
    {{ Form::open(array('url' => action('LocationController@index'), 'class' => 'search')) }}
    <i class='icon-search'></i>
    {{ Form::text('search') }}
    {{ Form::close() }}
    <table class='index'>
      <tbody>
        @foreach ($locations as $location)
          <tr>
            <td><a href='#{{ strtolower(implode('_', explode(' ', $location['name']))) }}_checkbox' class='location_checkbox'><i class='icon-circle-blank' id='{{ $location['id'] }}'></i></a></td>
              <td><a href='{{ action($name.'Controller@show', $location['id']) }}'>
{{ $location['name'] }}</a></td>
              <td><a href='{{ action($name.'Controller@show', $location['id']) }}'>{{ $location['address'] }}</a></td>
            </a>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<div class='name'>
  myafterschoolprograms, inc.
</div>
@stop

@section('scripts')
<script src='{{ asset('js/vendor/json_parse.js') }} '></script>
<script>
  $('.location_submit').on('click', function(event) {
      var locations = $('.icon-ok');
      var value = '{';
      for(var i=0; i < locations.length; i++) {
          value += '"'+i+'": "'+$(locations[i]).attr('id')+'",';
      }
      value = value.slice(0,-1)+'}';
      $('#locations_to_affect').val(value); 
  });

  $('.location_checkbox').on('click', function(event) {
      event.preventDefault();
      $(this).children().toggleClass('icon-circle-blank icon-ok');
      var someAreChecked = ($('.icon-ok').length === 0);
      var commands = $('.commands');

      if ((someAreChecked || !$(commands).hasClass('show')) && (!someAreChecked || !$(commands).hasClass('hidden'))) {
          $(commands).toggleClass('hidden show');
      }
  });
</script>
@stop
