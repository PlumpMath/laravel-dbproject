<ul>
  <a href='{{ $url_show }}'>
    @foreach($items as $class => $item)
    <li class='{{ $class }}'>{{ $item }}</li>
    @endforeach
  </a>
  {{ Form::open(array('action' => array($controller.'@destroy', $id), 'method' => 'delete')) }}
  <button type='submit' class='delete'>
    Delete
  </button>
  {{ Form::close() }}
  <a href='{{ $url_edit }}'>
    <li class='edit'>Edit</li>
  </a>
</ul>
