@section('resource')
<div class='options'>
  <div class='filter'>
    Filter by
    <div class='select'>
      {{ $options }}
    </div>
    in
    <div class='select'>
      <ul>
        <li>Asc</li>
        <li>Desc</li>
      </ul>
    </div>
    order
  </div>
</div>
<div class='list'>
  @if (count($members) === 0)
  <ul>
    <li class='empty'>There are no {{ strtolower($resource) }}.<a href='{{ $url_create }}'> Create one?</a></li>
  </ul>
  @else
  @foreach ($members as $member)
  {{ $member }}
  @endforeach
  @endif
</div>
@stop
