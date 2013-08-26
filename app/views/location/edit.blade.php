@extends('layouts.master')
@include('elements.sidebar')

@section('body')
  <div class='commands'>
    <a href='{{ $url_copy }}'>
      <div class='copy icon'>
        <i class='icon-copy'></i>
        <p>copy?</p>
      </div>
    </a>
    <a href='{{ $url_edit }}'>
      <div class='edit icon'>
        <i class='icon-edit'></i>
        <p>edit?</p>
      </div>
    </a>
    {{ Form::open(array('url' => $url_destroy, 'method' => 'delete')) }} 
    <button type='submit'>
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
        <div class='address red'>Editing</div>
        <div class='title'>{{ $rows['Name'] }}</div>
        <div class='address'>{{ $rows['Address'].', '.$rows['City'].', '.$rows['State'].' '.$rows['Zip Code'] }} </div>
      </div>
      <h1>Location Details</h1>
      {{ Form::open(array('url' => $url_update, 'method' => 'put')) }}
      <table>
        <tbody>
          @foreach ($rows as $key =>  $row)
          <tr>
            <td>{{ $key }}</td>
            @if ($key === 'Created At' || $key === 'Updated At')
            <td>{{ $row }}</td>
            @else
            <td>{{ Form::text($key, $row) }}</td>
            @endif
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ Form::close() }}
    </div>
  </div>
  <div class='name'>
    myafterschoolprograms, inc.
  </div>
@stop
