@extends('layouts.master')
@include('elements.sidebar')
@include('elements.commands')

@section('body')
  @yield('commands')
  @yield('sidebar')
  <div class='table'>
    <div class='content'>
      <div class='header'>
        <div class='title'>{{ $rows['Name'] }}</div>
        <div class='address'>{{ $rows['Address'].', '.$rows['City'].', '.$rows['State'].' '.$rows['Zip Code'] }} </div>
      </div>
      <h1>Location Details</h1>
      <table>
        <tbody>
          @foreach ($rows as $key =>  $row)
          <tr>
            <td>{{ $key }}</td>
            <td>{{ $row }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <h1>Enrollment Details</h1>
      <table>
        <tbody>
          <tr>
            <td>Number of Sessions</td><td>0</td>
          </tr>
          <tr>
            <td>Current Enrollment</td><td>0 students</td>
          </tr>
          <tr>
            <td>Total Enrollment</td><td>0 students</td>
          </tr>
          <tr>
            <td>Average Enrollment</td><td>0 students</td>
          </tr>
          <tr>
            <td>Current Revenue</td><td>$0</td>
          </tr>
          <tr>
            <td>Total Revenue</td><td>$0</td>
          </tr>      
        </tbody>
      </table>
      <h1>Tasks</h1>
      <a href='#'>Fetch related Students</a>
      <a href='#'>Fetch related Sessions</a>
    </div>
  </div>
  <div class='name'>
    myafterschoolprograms, inc.
  </div>
@stop
