@extends('layouts.master')
@include('elements.sidebar')
@include('elements.commands')

@section('body')
  <div class='commands'>
    <a href='{{ $url_create }}'>
      <div class='create icon'>
        <i class='icon-file-text-alt'></i>
        <p>new?</p>
      </div>
    </a>
{{ Form::open(array('url' => $url_mass)) }}
    <input type='hidden' value='' id='locations_to_affect' name='locations_to_affect'>
    <button type='submit' name='copy_submit' class='location_submit'>
      <div class='copy icon'>
        <i class='icon-copy'></i>
        <p>copy?</p>
      </div>
    </button>
    <a href='{{ $url_edit }}'>
      <div class='edit icon'>
        <i class='icon-edit'></i>
        <p>edit?</p>
      </div>
    </a>
    <button type='submit' name='delete_submit' class='location_submit'>
      <div class='delete icon'>
        <i class='icon-trash'></i>
        <p>delete?</p>
      </div>
    </button>
{{ Form::close() }}
    {{ Form::open(array('url' => $url_update, 'id' => 'update', 'method' => 'put')) }} 
    <button type='submit'>
      <div class='save icon inactive'>
        <i class='icon-save'></i>
        <p>save?</p>
      </div>
    </button>
    {{ Form::close() }}
    <a href=''>
      <div class='cancel icon inactive'>
        <i class='icon-ban-circle'></i>
        <p>cancel?</p>
      </div>
    </a>
  </div>
@yield('sidebar')
<div class='table'>
  <div class='content'>
    <div class='header'>
      <div class='title'>Locations</div>
      <div class='address'>Last modified: {{ $date }}</div>
    </div>
    {{ Form::open(array('url' => action('LocationController@index'), 'id' => 'search_form')) }}
    <i class='icon-search'></i>
    <input class='input_search' name='search' type='text'>
    {{ Form::close() }}
    <h1 class='search_results hide'>Search Results</h1>
    <table class='search_results hide index'>
      <tbody id='search_results'>
      </tbody>
    </table>
    <table class='index'>
      <tbody>
        @foreach ($locations as $location)
          <tr>
            <td><a href='#{{ strtolower(implode('_', explode(' ', $location['name']))) }}_checkbox' class='location_checkbox'><i class='icon-circle-blank' id='{{ $location['id'] }}'></i></a></td>
              <td><a href='{{ action($name.'Controller@show', $location['id']) }}'>
{{ $location['name'] }}</a></td>
              <td><a href='{{ action($name.'Controller@show', $location['id']) }}'>{{ $location['address'] }}</a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
    @if (isset($delete))
       <p>Entries Deleted.</p>
    @endif
  </div>
</div>
<div class='name'>
  myafterschoolprograms, inc.
</div>
@stop

@section('scripts')
<script src='{{ asset('js/vendor/json_parse.js') }} '></script>
<script>
  $('#search_form').submit(function(event) {
      event.preventDefault();
      if ($('.input_search').val() !== '') {
      $.ajax({
          type: "POST",
          url: '{{ action('LocationController@search') }}',
          data: {request: $('.input_search').val()},
          success: function(data) {
              if (data === '[]') {
                  $('#search_results').html("<tr class='empty'><td>No results :(</td></tr>");
              } else {
                  var result = '';
                  data = JSON.parse(data);
                  var cls = (data.length === 1) ? "only_one" : "";
                  $.each(data, function(i, val) {
                      result += "<tr class='"+cls+"'><td><a href='"+"' class='location_checkbox added'><i class='icon-circle-blank' id='"+val['id']+"'></i></a></td><td><a href='"+val['url_show']+"'>"+val['name']+"</a></td><td><a href='"+val['url_show']+"'><span class='white'>"+val['search_key']+": </span>"+val['search_value']+"</a></td></tr>";
                  });
                  $('#search_results').html(result);
                  $('.added').on('click', handleCheckboxes);
                  $('.added').removeClass('added');
              }
              if ($('.search_results').hasClass('hide')) {
                  $('.search_results').toggleClass('hide show');
              }
          }
      });
      }
  });
</script>
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
</script>
<script>
  var handleCheckboxes = function(event) {
      event.preventDefault();
      $(this).children().toggleClass('icon-circle-blank icon-ok');
  }

  $('.location_checkbox').on('click', handleCheckboxes);
</script>
@stop
