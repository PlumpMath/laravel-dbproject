@extends('layouts.master')
@include('elements.sidebar')
@include('elements.commands')

@section('body')
  @yield('commands')
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
            @if ($key === 'Id' || $key === 'Created At' || $key === 'Updated At')
            <td>{{ $row }}</td>
            @elseif ($key === 'Notes')
            <td>{{ Form::textarea('notes', $row, array('class' => 'unchanged edit', 'form' => 'update')) }}</td>
            @else
            <td>{{ Form::text(implode('_', explode(' ', strtolower($key))), $row, array('class'=> 'unchanged edit', 'form' => 'update')) }}</td>
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
